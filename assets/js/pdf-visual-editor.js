const VISUAL_TOOLS = ['organize-pdf', 'annotate-pdf', 'sign-pdf', 'extract-pdf-pages'];

document.addEventListener('DOMContentLoaded', () => {
    if (!VISUAL_TOOLS.includes(window.CURRENT_TOOL_SLUG)) return;

    const fileInput = document.querySelector('input[type="file"]');
    const form = document.querySelector('form'); // The main tool form
    const workspace = document.getElementById('pdf-visual-editor-workspace');
    const canvasContainer = document.getElementById('visual-editor-canvas-container');
    const btnCancel = document.getElementById('visual-editor-cancel');
    const btnApply = document.getElementById('visual-editor-apply');
    const toolbar = document.getElementById('visual-editor-toolbar');

    let pdfDoc = null;
    let pageOrder = []; // for organize
    let annotations = {}; // for annotate
    let signatureData = null; // for sign
    let sigCoords = { x: 0, y: 0, page: 1 };

    if (fileInput) {
        fileInput.addEventListener('change', async (e) => {
            const file = e.target.files[0];
            if (!file || file.type !== 'application/pdf') return;

            // Hide form, show workspace
            form.style.display = 'none';
            workspace.style.display = 'block';

            // Generate Toolbar based on Tool
            setupToolbar();

            // Load PDF
            const arrayBuffer = await file.arrayBuffer();
            const loadingTask = pdfjsLib.getDocument({ data: arrayBuffer });

            try {
                pdfDoc = await loadingTask.promise;
                await renderPages();
            } catch (err) {
                console.error(err);
                canvasContainer.innerHTML = '<div style="color:red">Error loading PDF.</div>';
            }
        });
    }

    if (btnCancel) {
        btnCancel.addEventListener('click', () => {
            workspace.style.display = 'none';
            form.style.display = 'block';
            fileInput.value = ''; // clear input
            const preview = document.querySelector('.file-preview');
            if (preview) {
                preview.style.display = 'none';
                document.querySelector('.file-drop-icon').style.display = 'block';
                document.querySelector('.file-drop-msg').style.display = 'block';
            }
        });
    }

    if (btnApply) {
        btnApply.addEventListener('click', () => {
            // Inject hidden inputs into the form before submitting

            if (window.CURRENT_TOOL_SLUG === 'organize-pdf' || window.CURRENT_TOOL_SLUG === 'extract-pdf-pages') {
                injectHiddenInput('page_order', pageOrder.join(','));
            }

            if (window.CURRENT_TOOL_SLUG === 'annotate-pdf') {
                injectHiddenInput('annotations', JSON.stringify(annotations));
            }

            if (window.CURRENT_TOOL_SLUG === 'sign-pdf') {
                if (!signatureData) {
                    alert('Please draw a signature in the toolbar and save it first.');
                    return;
                }
                injectHiddenInput('signature_image', signatureData);
                injectHiddenInput('sig_x', sigCoords.x);
                injectHiddenInput('sig_y', sigCoords.y);
                injectHiddenInput('sig_page', sigCoords.page);
            }

            // Hide workspace, trigger form submit visually
            workspace.style.display = 'none';
            form.style.display = 'block';

            // Find the submit button and click it to trigger native app.js AJAX
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) submitBtn.click();
        });
    }

    function injectHiddenInput(name, value) {
        let el = form.querySelector(`input[name="${name}"]`);
        if (!el) {
            el = document.createElement('input');
            el.type = 'hidden';
            el.name = name;
            form.appendChild(el);
        }
        el.value = value;
    }

    function setupToolbar() {
        toolbar.innerHTML = '';
        if (window.CURRENT_TOOL_SLUG === 'organize-pdf' || window.CURRENT_TOOL_SLUG === 'extract-pdf-pages') {
            toolbar.innerHTML = '<span style="color:var(--text-muted); font-size:1.1rem;">Use the grip area to drag and drop pages to reorder them. Click the trash icon to remove pages.</span>';
        } else if (window.CURRENT_TOOL_SLUG === 'sign-pdf') {
            toolbar.innerHTML = `
                <div style="display:flex; gap:1rem; align-items:center;">
                    <span style="color:var(--text-muted); font-weight:600;">Draw your signature:</span>
                    <canvas id="sig-pad" width="300" height="100" style="border:2px solid var(--border); border-radius:8px; background:#fff; cursor:crosshair;"></canvas>
                    <button type="button" class="btn btn-outline" id="clear-sig-pad">Clear</button>
                    <button type="button" class="btn btn-primary" id="save-sig-pad">Save Signature</button>
                </div>
            `;
            initSignaturePad();
        } else if (window.CURRENT_TOOL_SLUG === 'annotate-pdf') {
            toolbar.innerHTML = `
                <div style="display:flex; gap:1rem; align-items:center;">
                    <span style="color:var(--text-muted); font-weight:600;">Add Text Annotation:</span>
                    <input type="text" id="ann-text" class="form-control" placeholder="Enter text..." style="width:250px;">
                    <input type="color" id="ann-color" value="#dc2626" style="padding:0; height:42px; width:45px; border-radius:8px; cursor:pointer;">
                    <span style="color:var(--text-muted); font-size:0.9rem; margin-left:1rem;">(Click on a PDF page below to place text)</span>
                </div>
            `;
        }
    }

    async function renderPages() {
        canvasContainer.innerHTML = '';
        pageOrder = []; // Reset

        for (let i = 1; i <= pdfDoc.numPages; i++) {
            pageOrder.push(i);
            const wrapper = document.createElement('div');
            wrapper.className = 'pdf-page-wrapper';
            wrapper.style.cssText = 'position:relative; background:#fff; box-shadow:0 4px 6px -1px rgba(0,0,0,0.1); border:1px solid var(--border-light); border-radius:8px; padding:15px; transition:transform 0.2s;';
            wrapper.dataset.pageNum = i;

            // Delete button and drag
            if (window.CURRENT_TOOL_SLUG === 'organize-pdf' || window.CURRENT_TOOL_SLUG === 'extract-pdf-pages') {
                wrapper.draggable = true;
                wrapper.style.cursor = 'grab';

                const delBtn = document.createElement('div');
                delBtn.innerHTML = '✕';
                delBtn.title = 'Remove Page';
                delBtn.style.cssText = 'position:absolute; top:-10px; right:-10px; background:#ef4444; color:#fff; border-radius:50%; width:28px; height:28px; line-height:28px; text-align:center; cursor:pointer; font-size:14px; box-shadow:0 2px 4px rgba(239,68,68,0.3); z-index:10;';
                delBtn.onclick = (e) => {
                    e.stopPropagation();
                    wrapper.remove();
                    updatePageOrder();
                };
                wrapper.appendChild(delBtn);

                wrapper.addEventListener('dragstart', handleDragStart);
                wrapper.addEventListener('dragover', handleDragOver);
                wrapper.addEventListener('drop', handleDrop);
                wrapper.addEventListener('dragend', handleDragEnd);
            }

            const badge = document.createElement('div');
            badge.innerText = `Page ${i}`;
            badge.style.cssText = 'font-size:14px; font-weight:700; color:var(--text-muted); margin-bottom:10px; text-align:left;';
            wrapper.appendChild(badge);

            const canvas = document.createElement('canvas');
            canvas.style.maxWidth = '100%';
            canvas.style.display = 'block';
            canvas.style.border = '1px solid #e2e8f0';

            if (window.CURRENT_TOOL_SLUG === 'annotate-pdf' || window.CURRENT_TOOL_SLUG === 'sign-pdf') {
                canvas.style.cursor = 'crosshair';
            }

            wrapper.appendChild(canvas);
            canvasContainer.appendChild(wrapper);

            // Render PDF Page to Canvas
            const page = await pdfDoc.getPage(i);
            const scale = 1.2; // Nice crisp scale
            const viewport = page.getViewport({ scale: scale });

            canvas.width = viewport.width;
            canvas.height = viewport.height;
            wrapper.style.width = (viewport.width + 32) + 'px'; // 32 is padding + border

            const renderContext = {
                canvasContext: canvas.getContext('2d'),
                viewport: viewport
            };
            await page.render(renderContext).promise;

            // Annotations Interactive Logic
            if (window.CURRENT_TOOL_SLUG === 'annotate-pdf') {
                canvas.addEventListener('click', (e) => {
                    const txt = document.getElementById('ann-text').value;
                    const col = document.getElementById('ann-color').value;
                    if (!txt) { alert('Please enter annotation text in the toolbar first.'); return; }

                    const rect = canvas.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const ctx = canvas.getContext('2d');
                    ctx.font = '24px Helvetica';
                    ctx.fillStyle = col;
                    ctx.fillText(txt, x, y);

                    if (!annotations[`page_${i}`]) annotations[`page_${i}`] = [];
                    const rgb = hexToRgb(col);

                    // TCPDF uses logical coordinates (points), so we adjust scale
                    const logicalX = x / scale;
                    const logicalY = y / scale;

                    annotations[`page_${i}`].push({
                        type: 'text',
                        text: txt,
                        x: logicalX,
                        y: logicalY,
                        size: 16,
                        color: rgb
                    });
                });
            }

            // Sign PDF logic
            if (window.CURRENT_TOOL_SLUG === 'sign-pdf') {
                canvas.addEventListener('click', (e) => {
                    if (!signatureData) { alert('Please save a signature in the toolbar first.'); return; }

                    document.querySelectorAll('.sig-marker').forEach(el => el.remove());

                    const rect = canvas.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    sigCoords = { x: x / scale, y: y / scale, page: i };

                    const marker = document.createElement('div');
                    marker.className = 'sig-marker';
                    marker.style.cssText = `position:absolute; left:${(x + 15)}px; top:${(y + 35)}px; border:2px dashed #0ea5e9; width:150px; height:60px; background:rgba(14,165,233,0.1); display:flex; align-items:center; justify-content:center; color:#0ea5e9; font-weight:bold; pointer-events:none; border-radius:4px; box-shadow:0 0 0 2px rgba(255,255,255,0.8);`;
                    marker.innerText = 'Signature Placed';
                    wrapper.appendChild(marker);
                });
            }
        }
    }

    let draggedItem = null;
    function handleDragStart(e) { draggedItem = this; e.dataTransfer.effectAllowed = 'move'; this.style.opacity = '0.5'; }
    function handleDragOver(e) { if (e.preventDefault) e.preventDefault(); e.dataTransfer.dropEffect = 'move'; return false; }
    function handleDrop(e) {
        if (e.stopPropagation) e.stopPropagation();
        if (draggedItem !== this) {
            const allItems = [...canvasContainer.querySelectorAll('.pdf-page-wrapper')];
            const draggedIdx = allItems.indexOf(draggedItem);
            const dropIdx = allItems.indexOf(this);
            if (draggedIdx < dropIdx) {
                this.parentNode.insertBefore(draggedItem, this.nextSibling);
            } else {
                this.parentNode.insertBefore(draggedItem, this);
            }
            updatePageOrder();
        }
        return false;
    }
    function handleDragEnd(e) { this.style.opacity = '1'; }
    function updatePageOrder() {
        const items = canvasContainer.querySelectorAll('.pdf-page-wrapper');
        pageOrder = [];
        items.forEach(item => pageOrder.push(item.dataset.pageNum));
    }

    function initSignaturePad() {
        const pad = document.getElementById('sig-pad');
        const ctx = pad.getContext('2d');
        let drawing = false;
        ctx.lineWidth = 3; ctx.lineCap = 'round'; ctx.lineJoin = 'round'; ctx.strokeStyle = '#000';

        // Touch events
        pad.addEventListener('touchstart', e => { e.preventDefault(); drawing = true; const touch = e.touches[0]; const rect = pad.getBoundingClientRect(); ctx.beginPath(); ctx.moveTo(touch.clientX - rect.left, touch.clientY - rect.top); });
        pad.addEventListener('touchmove', e => { e.preventDefault(); if (!drawing) return; const touch = e.touches[0]; const rect = pad.getBoundingClientRect(); ctx.lineTo(touch.clientX - rect.left, touch.clientY - rect.top); ctx.stroke(); });
        pad.addEventListener('touchend', e => { e.preventDefault(); drawing = false; });

        // Mouse events
        pad.addEventListener('mousedown', e => { drawing = true; ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY); });
        pad.addEventListener('mousemove', e => { if (!drawing) return; ctx.lineTo(e.offsetX, e.offsetY); ctx.stroke(); });
        window.addEventListener('mouseup', () => drawing = false);

        document.getElementById('clear-sig-pad').onclick = () => { ctx.clearRect(0, 0, pad.width, pad.height); signatureData = null; };
        document.getElementById('save-sig-pad').onclick = () => {
            signatureData = pad.toDataURL('image/png');
            // Give visual feedback
            const btn = document.getElementById('save-sig-pad');
            btn.innerText = 'Saved!';
            btn.classList.replace('btn-primary', 'btn-success');
            setTimeout(() => { btn.innerText = 'Save Signature'; btn.classList.replace('btn-success', 'btn-primary'); }, 2000);
        };
    }

    function hexToRgb(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? [parseInt(result[1], 16), parseInt(result[2], 16), parseInt(result[3], 16)] : [0, 0, 0];
    }
});
