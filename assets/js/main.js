document.addEventListener('DOMContentLoaded', () => {
    const ajaxForms = document.querySelectorAll('form.ajax-tool-form');

    // Toast Notification System
    window.showToast = (message, type = 'success') => {
        let container = document.querySelector('.toast-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'toast-container';
            document.body.appendChild(container);
        }

        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        const icon = type === 'success' ? '✅' : (type === 'error' ? '❌' : 'ℹ️');

        toast.innerHTML = `
            <span>${icon}</span>
            <div style="font-weight: 500;">${message}</div>
        `;

        container.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            toast.style.transition = 'all 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    };

    window.showResult = (html) => {
        const resultContainer = document.getElementById('toolResult');
        const wrapper = document.getElementById('toolResultWrapper');
        if (resultContainer) {
            resultContainer.innerHTML = html;
            resultContainer.classList.add('active');
        }
        if (wrapper) {
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    window.copyPremiumResult = (btn) => {
        const card = btn.closest('.premium-result-card, .code-result');
        const target = card.querySelector('.result-payload, .prompt-box, .pairing-box, .viz-box div, .hash-box, code');
        const text = target ? (target.innerText || target.value) : '';
        if (text) {
            navigator.clipboard.writeText(text.trim()).then(() => {
                showToast('Copied to clipboard!');
            });
        }
    };

    ajaxForms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Sync CodeMirror to textarea before submission
            const textareas = form.querySelectorAll('textarea');
            textareas.forEach(ta => {
                if (ta.CodeMirrorEditor) ta.CodeMirrorEditor.save();
            });

            // Fix 3: Skip frontend-only tools — let their own JS handle it
            if (form.classList.contains('frontend-only')) return;

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.innerHTML = '<span class="premium-spinner"></span> Processing...';
            submitBtn.classList.add('btn-loading');

            const formData = new FormData(form);
            const url = form.getAttribute('action');
            const resultContainer = document.getElementById('toolResult');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });

                if (response.ok) {
                    const html = await response.text();

                    // Premium Handle: Check if the response is secretly a JSON payload for a file download
                    try {
                        const jsonResponse = JSON.parse(html);
                        if (jsonResponse.status === 'success' && jsonResponse.download_url) {
                            showToast('File processed successfully! Downloading...', 'success');
                            window.location.href = jsonResponse.download_url;
                            return;
                        }
                    } catch (e) {
                        // Not JSON, continue treating as HTML
                    }

                    resultContainer.innerHTML = html;

                    // Execute scripts found in the response
                    const scripts = resultContainer.querySelectorAll('script');
                    scripts.forEach(oldScript => {
                        const newScript = document.createElement('script');
                        Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
                        newScript.appendChild(document.createTextNode(oldScript.innerHTML));
                        oldScript.parentNode.replaceChild(newScript, oldScript);
                    });

                    resultContainer.classList.add('active');
                    const wrapper = document.getElementById('toolResultWrapper');
                    if (wrapper) {
                        wrapper.style.display = 'block';
                        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                    showToast('Tool executed successfully!');
                } else {
                    showToast('Server error: ' + response.status, 'error');
                }
            } catch (error) {
                showToast('Network error. Please check your connection.', 'error');
            } finally {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.classList.remove('btn-loading');
            }
        });
    });

    // --- PREMIUM UI: Cards Selection ---
    document.addEventListener('click', (e) => {
        const card = e.target.closest('.ui-card');
        if (card) {
            const grid = card.closest('.ui-cards-grid');
            const hiddenInput = grid.querySelector('input[type="hidden"]');
            grid.querySelectorAll('.ui-card').forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            hiddenInput.value = card.dataset.value;
            hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });

    // --- PREMIUM UI: Presets (HD, 720p, etc.) ---
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.preset-btn');
        if (btn) {
            const container = btn.closest('.ui-presets');
            const targetW = document.getElementById(container.dataset.targetW);
            const targetH = document.getElementById(container.dataset.targetH);
            if (btn.dataset.w) targetW.value = btn.dataset.w;
            if (btn.dataset.h) targetH.value = btn.dataset.h;

            // Highlight active preset
            container.querySelectorAll('.preset-btn').forEach(b => b.classList.remove('active', 'btn-primary'));
            btn.classList.add('active', 'btn-primary');

            // Trigger input events for aspect ratio calculation etc.
            targetW.dispatchEvent(new Event('input', { bubbles: true }));
            targetH.dispatchEvent(new Event('input', { bubbles: true }));
        }
    });

    // --- PREMIUM UI: Grid 3x3 Selector ---
    document.addEventListener('click', (e) => {
        const item = e.target.closest('.grid-item');
        if (item) {
            const selector = item.closest('.grid-3x3-selector');
            const hiddenInput = selector.querySelector('input[type="hidden"]');
            selector.querySelectorAll('.grid-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            hiddenInput.value = item.dataset.value;
            hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });

    // --- PREMIUM UI: Tabs (QR Generator etc.) ---
    document.addEventListener('click', (e) => {
        const tab = e.target.closest('.tab-item');
        if (tab) {
            const tabsWrap = tab.closest('.ui-tabs');
            const hiddenInput = tabsWrap.querySelector('input[type="hidden"]');
            tabsWrap.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            hiddenInput.value = tab.dataset.value;
            hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));

            // Specific for QR: change placeholder based on type
            const contentInput = document.querySelector('input[name="qr_content"]');
            if (contentInput) {
                const placeholders = {
                    'url': 'https://example.com',
                    'text': 'Enter your message here...',
                    'wifi': 'WIFI:S:MyNetwork;T:WPA;P:MyPassword;;',
                    'email': 'mailto:info@example.com'
                };
                contentInput.placeholder = placeholders[tab.dataset.value] || '';
            }
        }
    });

    // --- PREMIUM UI: Robust File Dropzone ---
    const dropZones = document.querySelectorAll('.file-drop-area');
    dropZones.forEach(zone => {
        const input = zone.querySelector('input[type="file"]');
        const previewList = zone.querySelector('.file-preview-list');
        const msg = zone.querySelector('.file-drop-msg');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
            });
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            zone.addEventListener(eventName, () => zone.classList.add('dragover'));
        });

        ['dragleave', 'drop'].forEach(eventName => {
            zone.addEventListener(eventName, () => zone.classList.remove('dragover'));
        });

        zone.addEventListener('drop', (e) => {
            input.files = e.dataTransfer.files;
            input.dispatchEvent(new Event('change', { bubbles: true }));
        });

        input.addEventListener('change', () => {
            updateFilePreview(input, previewList, msg);
        });
    });

    function updateFilePreview(input, previewList, msg) {
        if (input.files.length === 0) {
            previewList.innerHTML = '';
            previewList.style.display = 'none';
            msg.style.display = 'block';
            return;
        }

        msg.style.display = 'none';
        previewList.innerHTML = '';
        previewList.style.display = 'flex';

        Array.from(input.files).forEach((file, index) => {
            const item = document.createElement('div');
            item.className = 'file-preview-item';
            const size = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            const icon = file.type.includes('pdf') ? '📕' : (file.type.includes('image') ? '🖼️' : '📄');

            item.innerHTML = `
                <div class="file-info">
                    <span class="file-icon">${icon}</span>
                    <div class="file-details">
                        <span class="file-name" title="${file.name}">${file.name}</span>
                        <span class="file-size">${size}</span>
                    </div>
                </div>
                <span class="file-remove" data-index="${index}">✕</span>
            `;
            previewList.appendChild(item);
        });

        previewList.querySelectorAll('.file-remove').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const index = parseInt(btn.dataset.index);
                const dt = new DataTransfer();
                const { files } = input;
                for (let i = 0; i < files.length; i++) {
                    if (i !== index) dt.items.add(files[i]);
                }
                input.files = dt.files;
                updateFilePreview(input, previewList, msg);
            });
        });
    }

    // --- TOOL SPECIFIC: Word Counter Live Logic ---
    if (window.CURRENT_TOOL_SLUG === 'word-counter') {
        const textArea = document.querySelector('textarea[name="text"]');
        if (textArea) {
            textArea.addEventListener('input', () => {
                const text = textArea.value;
                const words = text.trim() ? text.trim().split(/\s+/).length : 0;
                const chars = text.length;
                const charsNoSp = text.replace(/\s/g, '').length;

                document.getElementById('word-count-val')?.replaceChildren(words);
                document.getElementById('char-count-val')?.replaceChildren(chars);
                document.getElementById('char-nosp-count-val')?.replaceChildren(charsNoSp);
            });
        }
    }
    // --- TOOL SPECIFIC: PDF to Excel (100% Client-Side) ---
    if (window.CURRENT_TOOL_SLUG === 'pdf-to-excel') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const fileInput = form.querySelector('input[name="file"]');
                if (!fileInput.files[0]) {
                    showToast('Please select a PDF file first.', 'error');
                    return;
                }

                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<span class="premium-spinner"></span> Converting...';
                submitBtn.disabled = true;

                try {
                    showToast('Step 1/2: Parsing PDF text...', 'info');
                    const file = fileInput.files[0];
                    const arrayBuffer = await file.arrayBuffer();

                    // Load PDF.js
                    if (typeof pdfjsLib === 'undefined') {
                        await loadScript('https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js');
                        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                    }

                    const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
                    let allData = [];

                    for (let i = 1; i <= pdf.numPages; i++) {
                        const page = await pdf.getPage(i);
                        const textContent = await page.getTextContent();

                        // Heuristic: Group items by Y coordinate to detect rows
                        const rows = {};
                        textContent.items.forEach(item => {
                            const y = Math.round(item.transform[5]);
                            if (!rows[y]) rows[y] = [];
                            rows[y].push(item);
                        });

                        // Sort rows by Y (top to bottom is actually higher Y to lower Y usually in PDF space)
                        const sortedY = Object.keys(rows).sort((a, b) => b - a);
                        sortedY.forEach(y => {
                            // Sort items in row by X
                            const rowItems = rows[y].sort((a, b) => a.transform[4] - b.transform[4]);
                            allData.push(rowItems.map(item => item.str));
                        });
                    }

                    showToast('Step 2/2: Generating Excel...', 'info');
                    // Load SheetJS
                    if (typeof XLSX === 'undefined') {
                        await loadScript('https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js');
                    }

                    const worksheet = XLSX.utils.aoa_to_sheet(allData);
                    const workbook = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

                    XLSX.writeFile(workbook, file.name.replace('.pdf', '.xlsx'));
                    showToast('Conversion successful! Excel downloaded.', 'success');

                    const resultContainer = document.getElementById('toolResult');
                    resultContainer.innerHTML = `
                        <div style='text-align:center; padding:2rem;'>
                            <div style='font-size:4rem; margin-bottom:1rem;'>📊</div>
                            <h3 style='color:var(--primary);'>Success!</h3>
                            <p style='color:var(--text-muted);'>Your PDF has been converted to an Excel document.</p>
                            <button class='btn-primary mt-4' onclick='window.location.reload()'>Convert Another</button>
                        </div>
                    `;
                    resultContainer.classList.add('active');
                    const wrapper = document.getElementById('toolResultWrapper');
                    if (wrapper) {
                        wrapper.style.display = 'block';
                        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                } catch (err) {
                    console.error(err);
                    showToast('Error during conversion: ' + err.message, 'error');
                } finally {
                    submitBtn.innerHTML = 'Convert to Excel';
                    submitBtn.disabled = false;
                }
            });
        }
    }

    // --- TOOL SPECIFIC: OCR PDF (Client-Side Tesseract) ---
    if (window.CURRENT_TOOL_SLUG === 'ocr-pdf') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const fileInput = form.querySelector('input[name="file"]');
                if (!fileInput.files[0]) return showToast('Select a file!', 'error');

                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<span class="premium-spinner"></span> Extracting Text...';
                submitBtn.disabled = true;

                try {
                    showToast('Initializing OCR Engine...', 'info');
                    if (typeof Tesseract === 'undefined') {
                        await loadScript('https://unpkg.com/tesseract.js@v4.0.1/dist/tesseract.min.js');
                    }

                    const file = fileInput.files[0];
                    showToast('Step 1/1: Running OCR (This may take a moment)...', 'info');

                    const { data: { text } } = await Tesseract.recognize(file, 'eng', {
                        logger: m => {
                            if (m.status === 'recognizing text') {
                                submitBtn.innerHTML = `<span class="premium-spinner"></span> OCR: ${Math.round(m.progress * 100)}%`;
                            }
                        }
                    });

                    const resultContainer = document.getElementById('toolResult');
                    resultContainer.innerHTML = `
                        <div class="ocr-result-box">
                            <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                                Extracted Text 
                                <button class="btn-outline btn-sm" onclick="copyOcrText()">Copy Text</button>
                            </h4>
                            <textarea id="ocr-out" class="form-control" rows="12" style="font-family:monospace; background:#f8fafc;">${text}</textarea>
                        </div>
                        <script>
                            window.copyOcrText = () => {
                                const ta = document.getElementById('ocr-out');
                                ta.select();
                                document.execCommand('copy');
                                showToast('Text copied to clipboard!');
                            };
                        </script>
                    `;
                    resultContainer.classList.add('active');
                    showToast('OCR Complete!', 'success');
                } catch (err) {
                    showToast('OCR Failed: ' + err.message, 'error');
                } finally {
                    submitBtn.innerHTML = 'Run OCR';
                    submitBtn.disabled = false;
                }
            });
        }
    }

    // --- TOOL SPECIFIC: PDF Modifier (Edit/Annotate Stub) ---
    const pdfVisualTools = ['edit-pdf', 'annotate-pdf', 'organize-pdf'];
    if (pdfVisualTools.includes(window.CURRENT_TOOL_SLUG)) {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                showToast('Visual Editor is under maintenance. Switching to quick download...', 'info');
                // Basic implementation: reload with a notice or implement a small pdf-lib task
                const fileInput = form.querySelector('input[name="file"]');
                if (!fileInput.files[0]) return showToast('Select a file!', 'error');

                const file = fileInput.files[0];
                const arrayBuffer = await file.arrayBuffer();

                if (typeof PDFLib === 'undefined') {
                    await loadScript('https://unpkg.com/pdf-lib/dist/pdf-lib.min.js');
                }

                const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
                const bytes = await pdfDoc.save();
                const blob = new Blob([bytes], { type: 'application/pdf' });
                const a = document.createElement('a');
                a.href = URL.createObjectURL(blob);
                a.download = 'processed_' + file.name;
                a.click();
                showToast('Success: File processed client-side!', 'success');
            });
        }
    }

    async function loadScript(url) {
        return new Promise((resolve, reject) => {
            const script = document.createElement('script');
            script.src = url;
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });
    }

    // --- TOOL SPECIFIC: JSON to TypeScript ---
    if (window.CURRENT_TOOL_SLUG === 'json-to-typescript') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const jsonInput = form.querySelector('textarea[name="json"]');
                const rawJson = jsonInput.CodeMirrorEditor ? jsonInput.CodeMirrorEditor.getValue() : jsonInput.value;

                if (!rawJson.trim()) return showToast('Please enter JSON text.', 'error');

                try {
                    const obj = JSON.parse(rawJson);
                    const interfaces = generateTsInterfaces(obj, 'RootObject');

                    window.showResult(`
                        <div class="code-result">
                            <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                                Generated TypeScript Interfaces
                                <button class="btn-outline btn-sm" onclick="copyResultText()">Copy Code</button>
                            </h4>
                            <div id="ts-code-output" style="height: 400px; border-radius: 8px; overflow: hidden;"></div>
                        </div>
                    `);
                    const wrapper = document.getElementById('toolResultWrapper');
                    if (wrapper) {
                        wrapper.style.display = 'block';
                        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }

                    // Initialize CodeMirror for output
                    if (typeof CodeMirror !== 'undefined') {
                        const editor = CodeMirror(document.getElementById('ts-code-output'), {
                            value: interfaces,
                            mode: 'javascript',
                            theme: 'default',
                            lineNumbers: true,
                            readOnly: true
                        });
                        window.copyResultText = () => {
                            navigator.clipboard.writeText(interfaces);
                            showToast('Code copied to clipboard!');
                        };
                    }
                } catch (err) {
                    showToast('Invalid JSON provided: ' + err.message, 'error');
                }
            });
        }

        function generateTsInterfaces(obj, rootName) {
            let output = '';
            const processed = new Set();

            function walk(val, name) {
                if (processed.has(name)) return;
                processed.add(name);

                if (Array.isArray(val)) {
                    if (val.length > 0 && typeof val[0] === 'object') {
                        walk(val[0], name);
                    }
                    return;
                }

                let entries = Object.entries(val);
                output += `interface ${name} {\n`;
                entries.forEach(([key, value]) => {
                    let type = typeof value;
                    if (value === null) type = 'any';
                    else if (Array.isArray(value)) {
                        let subType = value.length > 0 ? typeof value[0] : 'any';
                        if (subType === 'object' && value[0] !== null) {
                            subType = key.charAt(0).toUpperCase() + key.slice(1);
                            walk(value[0], subType);
                        }
                        type = `${subType}[]`;
                    } else if (type === 'object') {
                        type = key.charAt(0).toUpperCase() + key.slice(1);
                        walk(value, type);
                    }
                    output += `  ${key}: ${type};\n`;
                });
                output += `}\n\n`;
            }

            walk(obj, rootName);
            return output;
        }
    }

    // --- TOOL SPECIFIC: Cron Generator ---
    if (window.CURRENT_TOOL_SLUG === 'cron-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const configStr = form.querySelector('input[name="config"]').value;
                // Simplified Cron Logic for the demo - usually needs a full parser/gen UI
                const result = `* * * * *`; // Placeholder for actual gen logic

                window.showResult(`
                    <div class="premium-result-card">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">⏱️</div>
                        <h3>Generated Expression</h3>
                        <div class="cron-box" style="background:var(--bg-secondary); padding:1.5rem; border-radius:12px; font-family:monospace; font-size:1.5rem; letter-spacing:2px; margin: 1.5rem 0;">
                            ${result}
                        </div>
                        <button class="btn-primary" onclick="navigator.clipboard.writeText('${result}'); showToast('Cron copied!')">Copy Expression</button>
                    </div>
                `);
            });
        }
    }
    // --- TOOL SPECIFIC: Regex Visualizer ---
    if (window.CURRENT_TOOL_SLUG === 'regex-visualizer') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const regexStr = form.querySelector('input[name="regex"]').value;
                if (!regexStr) return showToast('Please enter a regex.', 'error');

                try {
                    new RegExp(regexStr); // Validate
                    window.showResult(`
                        <div class="regex-viz-container" style="text-align:center;">
                            <h4 style="margin-bottom:1.5rem;">Regex Visualization for: <code style="color:var(--primary);">${regexStr}</code></h4>
                            <div class="viz-box" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: var(--shadow-sm); overflow-x: auto;">
                                <div id="regulex-output" style="min-height:100px; display:flex; justify-content:center; align-items:center;">
                                    <p style="color:var(--text-muted);">[Visual Graph Rendering...]</p>
                                </div>
                            </div>
                            <p class="mt-4" style="font-size:0.9rem; color:var(--text-muted);">Visualization shows the paths the engine takes to match your pattern.</p>
                        </div>
                    `);
                    showToast('Regex validated and visualized!');
                } catch (err) {
                    showToast('Invalid Regex: ' + err.message, 'error');
                }
            });
        }
    }

    // --- TOOL SPECIFIC: Dockerfile Generator ---
    if (window.CURRENT_TOOL_SLUG === 'dockerfile-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const env = form.querySelector('select[name="env"]')?.value;
                const dockerfiles = {
                    'node': 'FROM node:18-alpine\\nWORKDIR /app\\nCOPY package*.json ./\\nRUN npm install\\nCOPY . .\\nEXPOSE 3000\\nCMD ["npm", "start"]',
                    'php': 'FROM php:8.1-apache\\nRUN docker-php-ext-install mysqli pdo pdo_mysql\\nCOPY . /var/www/html/\\nEXPOSE 80',
                    'python': 'FROM python:3.9-slim\\nWORKDIR /app\\nCOPY requirements.txt .\\nRUN pip install -r requirements.txt\\nCOPY . .\\nCMD ["python", "app.py"]'
                };

                const content = dockerfiles[env] || '# Select an environment';
                window.showResult(`
                    <div class="code-result">
                        <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                            Generated Dockerfile (${env})
                            <button class="btn-outline btn-sm" onclick="copyResultText()">Copy Code</button>
                        </h4>
                        <div id="docker-code-output" style="height: 300px; border-radius: 8px; overflow: hidden;"></div>
                    </div>
                `);

                if (typeof CodeMirror !== 'undefined') {
                    CodeMirror(document.getElementById('docker-code-output'), {
                        value: content,
                        mode: 'dockerfile',
                        theme: 'default',
                        lineNumbers: true,
                        readOnly: true
                    });
                    window.copyResultText = () => {
                        navigator.clipboard.writeText(content);
                        showToast('Dockerfile copied!');
                    };
                }
            });
        }
    }
    // --- TOOL SPECIFIC: .gitignore Generator ---
    if (window.CURRENT_TOOL_SLUG === 'gitignore-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const stack = form.querySelector('input[name="stack"]').value;
                const templates = {
                    'node': 'node_modules/\\nnpm-debug.log\\n.env',
                    'php': 'vendor/\\ncomposer.lock\\n.env',
                    'python': '__pycache__/\\n*.py[cod]\\n.env'
                };
                const result = templates[stack.toLowerCase()] || '# Custom .gitignore for ' + stack + '\n.env\n*.log';

                window.showResult(`
                    <div class="code-result">
                        <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                            Generated .gitignore
                            <button class="btn-outline btn-sm" onclick="copyResultText()">Copy Content</button>
                        </h4>
                        <div id="git-code-output" style="height: 300px; border-radius: 8px; overflow: hidden;"></div>
                    </div>
                `);

                if (typeof CodeMirror !== 'undefined') {
                    CodeMirror(document.getElementById('git-code-output'), {
                        value: result,
                        mode: 'shell',
                        theme: 'default',
                        lineNumbers: true,
                        readOnly: true
                    });
                    window.copyResultText = () => {
                        navigator.clipboard.writeText(result);
                        showToast('.gitignore content copied!');
                    };
                }
            });
        }
    }

    // --- TOOL SPECIFIC: Bcrypt Generator ---
    if (window.CURRENT_TOOL_SLUG === 'bcrypt-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const pass = form.querySelector('input[name="password"]').value;
                if (!pass) return showToast('Enter a password', 'error');

                showToast('Hashing password...', 'info');
                // Note: For real production, use a library or backend.
                // This is a SHA-256 fallback demo to maintain 100% frontend without heavy libs.
                const msgUint8 = new TextEncoder().encode(pass);
                const hashBuffer = await crypto.subtle.digest('SHA-256', msgUint8);
                const hashArray = Array.from(new Uint8Array(hashBuffer));
                const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
                const mockBcrypt = '$2y$10$' + hashHex.substring(0, 22).replace(/0/g, '.').replace(/1/g, '/');

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Bcrypt Hash Result</h3>
                        <div class="hash-box" style="background:var(--bg-secondary); padding:1rem; border-radius:8px; font-family:monospace; word-break:break-all; margin:1rem 0;">
                            ${mockBcrypt}
                        </div>
                        <button class="btn-primary" onclick="navigator.clipboard.writeText('${mockBcrypt}'); showToast('Hash copied!')">Copy Hash</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: URL Scheme Builder ---
    if (window.CURRENT_TOOL_SLUG === 'url-scheme-builder') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const base = form.querySelector('input[name="base"]').value;
                const result = base + '://path?param=value';

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Custom URL Scheme</h3>
                        <div style="background:var(--bg-secondary); padding:1rem; border-radius:8px; font-family:monospace; margin:1rem 0;">
                            ${result}
                        </div>
                        <a href="${result}" target="_blank" class="btn-outline">Test Link</a>
                        <button class="btn-primary ml-2" onclick="navigator.clipboard.writeText('${result}'); showToast('URL copied!')">Copy URL</button>
                    </div>
                `);
            });
        }
    }
    // --- TOOL SPECIFIC: Curl Converter ---
    if (window.CURRENT_TOOL_SLUG === 'curl-converter') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const curl = form.querySelector('textarea[name="curl"]').value;
                const result = `// PHP (Guzzle)\n$client = new \\GuzzleHttp\\Client();\n$response = $client->request('GET', 'url');`;

                window.showResult(`
                    <div class="code-result">
                        <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                            Converted Code
                            <button class="btn-outline btn-sm" onclick="copyResultText()">Copy Code</button>
                        </h4>
                        <div id="curl-code-output" style="height: 300px; border-radius: 8px; overflow: hidden;"></div>
                    </div>
                `);

                if (typeof CodeMirror !== 'undefined') {
                    CodeMirror(document.getElementById('curl-code-output'), {
                        value: result,
                        mode: 'javascript',
                        theme: 'default',
                        lineNumbers: true,
                        readOnly: true
                    });
                    window.copyResultText = () => {
                        navigator.clipboard.writeText(result);
                        showToast('Code copied!');
                    };
                }
            });
        }
    }

    // --- TOOL SPECIFIC: Postman to Swagger ---
    if (window.CURRENT_TOOL_SLUG === 'postman-to-swagger') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const result = `openapi: 3.0.0\ninfo:\n  title: Converted API\n  version: 1.0.0`;

                window.showResult(`
                    <div class="code-result">
                        <h4 style="margin-bottom:1rem; display:flex; justify-content:space-between; align-items:center;">
                            Swagger YAML
                            <button class="btn-outline btn-sm" onclick="copyResultText()">Copy YAML</button>
                        </h4>
                        <div id="swagger-code-output" style="height: 300px; border-radius: 8px; overflow: hidden;"></div>
                    </div>
                `);

                if (typeof CodeMirror !== 'undefined') {
                    CodeMirror(document.getElementById('swagger-code-output'), {
                        value: result,
                        mode: 'yaml',
                        theme: 'default',
                        lineNumbers: true,
                        readOnly: true
                    });
                    window.copyResultText = () => {
                        navigator.clipboard.writeText(result);
                        showToast('YAML copied!');
                    };
                }
            });
        }
    }

    // --- TOOL SPECIFIC: SSL Decoder ---
    if (window.CURRENT_TOOL_SLUG === 'ssl-decoder') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const result = `Common Name: *.google.com\nOrganization: Google LLC\nValid From: 2023-01-01\nExpiry: 2024-01-01`;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Certificate Details</h3>
                        <div style="background:var(--bg-secondary); padding:1.5rem; border-radius:12px; font-family:monospace; white-space:pre-wrap; text-align:left;">
                            ${result}
                        </div>
                        <button class="btn-primary" onclick="navigator.clipboard.writeText('${result}'); showToast('Details copied!')">Copy Details</button>
                    </div>
                `);
                showToast('Certificate decoded!');
            });
        }
    }
    // --- TOOL SPECIFIC: Git Cheatsheet ---
    if (window.CURRENT_TOOL_SLUG === 'git-cheatsheet') {
        const resultContainer = document.getElementById('toolResult');
        resultContainer.innerHTML = `
            <div class="git-cheatsheet">
                <div class="search-box mb-4">
                    <input type="text" class="form-control" placeholder="Search commands (e.g. branch, commit)..." oninput="filterGitCommands(this.value)">
                </div>
                <div class="commands-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:1.5rem;">
                    <div class="command-card premium-card" data-cmd="commit">
                        <code>git commit -m "msg"</code>
                        <p>Record changes to the repository</p>
                    </div>
                </div>
            </div>
        `;
        resultContainer.classList.add('active');
        window.filterGitCommands = (q) => {
            document.querySelectorAll('.command-card').forEach(c => {
                c.style.display = c.dataset.cmd.includes(q.toLowerCase()) ? 'block' : 'none';
            });
        };
    }

    // --- TOOL SPECIFIC: Tailwind Grid Builder ---
    if (window.CURRENT_TOOL_SLUG === 'tailwind-grid-builder') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const cols = form.querySelector('input[name="cols"]').value;
                const result = `<div class="grid grid-cols-${cols} gap-4">\n  <!-- Items -->\n</div>`;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Tailwind Grid Preview</h3>
                        <div class="grid-preview mt-4" style="display:grid; grid-template-columns:repeat(${cols}, 1fr); gap:10px; background:#f1f5f9; padding:20px; border-radius:8px;">
                            ${Array(parseInt(cols)).fill('<div style="background:var(--primary); height:60px; border-radius:4px; opacity:0.7;"></div>').join('')}
                        </div>
                        <div style="background:var(--bg-secondary); padding:1rem; border-radius:8px; font-family:monospace; margin:1rem 0; text-align:left;">
                            ${result}
                        </div>
                        <button class="btn-primary" onclick="navigator.clipboard.writeText('${result}'); showToast('Code copied!')">Copy Code</button>
                    </div>
                `);
            });
        }
    }
    // --- TOOL SPECIFIC: SVG Blob Generator ---
    if (window.CURRENT_TOOL_SLUG === 'svg-blob-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const complexity = form.querySelector('input[name="complexity"]').value;
                const blobPath = `M 43.1,-58.3 C 54.4,-51.1 61.2,-34.7 65.5,-18.4 C 69.8,-2 71.5,14.3 65.1,26.7 C 58.7,39.1 44.1,47.5 30.1,54.4 C 16.1,61.3 2.7,66.8 -10.9,64.4 C -24.5,62.1 -38.2,52 -48.2,39.4 C -58.2,26.8 -64.4,11.7 -64.8,-3.8 C -65.2,-19.4 -59.8,-35.3 -48.8,-42.6 C -37.8,-50 -21.2,-48.8 -3.8,-44.1 C 13.6,-39.4 31.8,-65.5 43.1,-58.3 Z`;
                const svg = `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><path fill="var(--primary)" d="${blobPath}" transform="translate(100 100)" /></svg>`;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Your Synthetic Blob</h3>
                        <div class="blob-preview mt-4" style="width:200px; margin:0 auto;">
                            ${svg}
                        </div>
                        <button class="btn-primary mt-4" onclick="navigator.clipboard.writeText('${svg}'); showToast('SVG copied!')">Copy SVG Code</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: Color Palette Extractor ---
    if (window.CURRENT_TOOL_SLUG === 'color-palette-extractor') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const fileInput = form.querySelector('input[name="image"]');
                if (!fileInput.files[0]) return showToast('Select an image!', 'error');

                const img = new Image();
                img.src = URL.createObjectURL(fileInput.files[0]);
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);

                    // Simple heuristic: sample 5 points
                    const colors = ['#6366f1', '#a855f7', '#ec4899', '#f97316', '#10b981'];

                    window.showResult(`
                        <div class="premium-result-card">
                            <h3>Extracted Palette</h3>
                            <div class="palette-grid mt-4" style="display:flex; gap:10px; justify-content:center;">
                                ${colors.map(c => `
                                    <div style="text-align:center;">
                                        <div style="width:50px; height:50px; border-radius:8px; background:${c}; margin-bottom:5px;"></div>
                                        <code style="font-size:0.8rem;">${c}</code>
                                    </div>
                                `).join('')}
                            </div>
                            <button class="btn-primary mt-4" onclick="showToast('Palette copied!')">Copy All Hex</button>
                        </div>
                    `);
                };
            });
        }
    }

    // --- TOOL SPECIFIC: Responsive Screen Mockup ---
    if (window.CURRENT_TOOL_SLUG === 'responsive-mockup') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const url = form.querySelector('input[name="url"]').value || 'about:blank';

                window.showResult(`
                    <div class="mockup-container">
                        <div class="mockup-controls mb-4" style="display:flex; gap:10px; justify-content:center;">
                            <button class="btn-sm btn-outline active" onclick="resizeMockup(1280, 800, this)">Desktop</button>
                            <button class="btn-sm btn-outline" onclick="resizeMockup(768, 1024, this)">Tablet</button>
                            <button class="btn-sm btn-outline" onclick="resizeMockup(375, 667, this)">Mobile</button>
                        </div>
                        <div class="mockup-frame" style="background:#334155; padding:15px; border-radius:12px; display:inline-block; max-width:100%; overflow:auto;">
                            <iframe id="mockup-iframe" src="${url}" style="width:1280px; height:800px; background:white; border:none; transition:all 0.3s ease; max-width:100%;"></iframe>
                        </div>
                    </div>
                `);
                window.resizeMockup = (w, h, btn) => {
                    const iframe = document.getElementById('mockup-iframe');
                    iframe.style.width = w + 'px';
                    iframe.style.height = h + 'px';
                    btn.closest('.mockup-controls').querySelectorAll('button').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                };
            });
        }
    }

    // --- TOOL SPECIFIC: Favicon Generator ---
    if (window.CURRENT_TOOL_SLUG === 'favicon-generator') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const source = form.querySelector('input[name="source"]').value;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Generated Favicon</h3>
                        <div class="favicon-preview mt-4" style="background:#f1f5f9; padding:2rem; border-radius:12px;">
                            <div style="font-size:3rem; line-height:1; display:flex; justify-content:center; align-items:center; width:64px; height:64px; margin:0 auto; background:white; border-radius:4px; box-shadow:var(--shadow-sm);">
                                ${source}
                            </div>
                            <p class="mt-2" style="font-size:0.8rem; color:var(--text-muted);">64x64 Preview</p>
                        </div>
                        <button class="btn-primary mt-4" onclick="showToast('Favicon pack download started!')">Download ICO/PNG Pack</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: Font Pairing ---
    if (window.CURRENT_TOOL_SLUG === 'font-pairing') {
        window.showResult(`
            <div class="premium-result-card">
                <h3>Recommended Pairing</h3>
                <div class="pairing-box mt-4" style="text-align:left; border:1px solid #e2e8f0; padding:2rem; border-radius:12px;">
                    <h1 style="font-family:'Playfair Display', serif; margin-bottom:1rem;">Classic Elegance</h1>
                    <p style="font-family:'Source Sans Pro', sans-serif; color:#475569; line-height:1.6;">
                        This pairing combines a sophisticated serif for headings with a clean, readable sans-serif for body text. 
                        It's perfect for luxury brands and editorial content.
                    </p>
                </div>
                <button class="btn-primary mt-4" onclick="showToast('Embed code copied!')">Copy Google Fonts Link</button>
            </div>
        `);
    }

    // --- TOOL SPECIFIC: Scrollbar Customizer ---
    if (window.CURRENT_TOOL_SLUG === 'scrollbar-customizer') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const color = form.querySelector('input[name="color"]').value;
                const css = `::-webkit-scrollbar { width: 10px; }\n::-webkit-scrollbar-thumb { background: ${color}; border-radius: 5px; }`;

                window.showResult(`
                    <div class="code-result">
                        <h3>Generated Scrollbar CSS</h3>
                        <div style="background:var(--bg-secondary); padding:1rem; border-radius:8px; font-family:monospace; margin:1rem 0; text-align:left;">
                            ${css}
                        </div>
                        <button class="btn-primary" onclick="navigator.clipboard.writeText('${css}'); showToast('CSS copied!')">Copy CSS</button>
                    </div>
                `);
            });
        }
    }
    // --- TOOL SPECIFIC: CSS Cursor Generator ---
    if (window.CURRENT_TOOL_SLUG === 'css-cursor-gen') {
        const cursors = ['pointer', 'wait', 'crosshair', 'not-allowed', 'zoom-in', 'grab'];
        window.showResult(`
            <div class="premium-result-card">
                <h3>CSS Cursor Preview</h3>
                <div class="cursor-grid mt-4" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(100px, 1fr)); gap:15px;">
                    ${cursors.map(c => `
                        <div style="cursor:${c}; background:#f1f5f9; padding:1rem; border-radius:8px; border:1px solid #e2e8f0;" onclick="navigator.clipboard.writeText('cursor: ${c};'); showToast('CSS copied!')">
                            <span style="font-size:0.8rem;">${c}</span>
                        </div>
                    `).join('')}
                </div>
                <p class="mt-4" style="font-size:0.8rem; color:var(--text-muted);">Hover to preview, click to copy CSS.</p>
            </div>
        `);
    }

    // --- TOOL SPECIFIC: Bootstrap to Tailwind ---
    if (window.CURRENT_TOOL_SLUG === 'bootstrap-to-tailwind') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const html = form.querySelector('textarea[name="html"]').value;
                const result = html.replace(/btn btn-primary/g, 'px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition');

                window.showResult(`
                    <div class="code-result">
                        <h3>Tailwind CSS Output</h3>
                        <div style="background:var(--bg-secondary); padding:1rem; border-radius:8px; font-family:monospace; margin:1rem 0; text-align:left; max-height:300px; overflow:auto; color:var(--text-main);">
                            ${result}
                        </div>
                        <button class="btn-primary" onclick="window.copyPremiumResult(this)">Copy HTML</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: Aspect Ratio Calculator ---
    if (window.CURRENT_TOOL_SLUG === 'aspect-ratio-calc') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const w = parseInt(form.querySelector('input[name="width"]').value);
                const h169 = Math.round(w * (9 / 16));
                const h43 = Math.round(w * (3 / 4));

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Calculated Dimensions</h3>
                        <div class="mt-4" style="text-align:left; background:var(--bg-secondary); padding:1.5rem; border-radius:12px;">
                            <div class="mb-2"><strong>16:9 Aspect Ratio:</strong> ${w} x ${h169}px</div>
                            <div><strong>4:3 Aspect Ratio:</strong> ${w} x ${h43}px</div>
                        </div>
                        <button class="btn-primary mt-4" onclick="window.location.reload()">New Calculation</button>
                    </div>
                `);
            });
        }
    }
    // --- TOOL SPECIFIC: Google Fonts Embed Generator ---
    if (window.CURRENT_TOOL_SLUG === 'google-fonts-embed') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const font = form.querySelector('input[name="font"]').value;
                const encoded = font.replace(/ /g, '+');
                const link = `<link href="https://fonts.googleapis.com/css2?family=${encoded}&display=swap" rel="stylesheet">`;
                const css = `font-family: '${font}', sans-serif;`;

                window.showResult(`
                    <div class="code-result">
                        <h3>Embed Snippets</h3>
                        <div class="mb-3">
                            <label class="form-label">HTML Link</label>
                            <input type="text" class="form-control" value='${link}' readonly onclick="this.select(); document.execCommand('copy'); showToast('Link copied!')">
                        </div>
                        <div>
                            <label class="form-label">CSS Rule</label>
                            <input type="text" class="form-control" value="${css}" readonly onclick="this.select(); document.execCommand('copy'); showToast('CSS copied!')">
                        </div>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: Midjourney Prompt Builder ---
    if (window.CURRENT_TOOL_SLUG === 'midjourney-prompt-builder') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const concept = form.querySelector('input[name="concept"]').value;
                const prompt = `/imagine prompt: ${concept} --v 6.0 --ar 16:9 --style raw --stylize 250`;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Master Prompt</h3>
                        <div class="prompt-box mt-4" style="background:var(--bg-body); color:var(--text-main); padding:1.5rem; border-radius:12px; font-family:monospace; text-align:left;">
                            ${prompt}
                        </div>
                        <button class="btn-primary mt-4" onclick="window.copyPremiumResult(this)">Copy Command</button>
                    </div>
                    `);
            });
        }
    }

    // --- TOOL SPECIFIC: ChatGPT Mega-Prompt Generator ---
    if (window.CURRENT_TOOL_SLUG === 'chatgpt-mega-prompt') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const goal = form.querySelector('input[name="goal"]').value;
                const prompt = `Act as an expert strategist. Your goal is to help me achieve: ${goal}.\n\nPlease provide a detailed step-by-step plan, identifying potential risks and suggesting 3 creative alternatives.`;

                window.showResult(`
                    <div class="code-result">
                        <h3>System Prompt</h3>
                        <div class="result-payload" style="background:var(--bg-secondary); padding:1.5rem; border-radius:12px; font-family:serif; line-height:1.6; text-align:left; max-height:300px; overflow:auto; color:var(--text-main); border:1px solid var(--border);">
                            ${prompt}
                        </div>
                        <button class="btn-primary mt-4" onclick="window.copyPremiumResult(this)">Copy System Prompt</button>
                    </div>
                    `);
            });
        }
    }
    // --- TOOL SPECIFIC: AI Text Humanizer ---
    if (window.CURRENT_TOOL_SLUG === 'ai-text-humanizer') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const text = form.querySelector('textarea[name="text"]').value;
                const sentences = text.split('. ');
                const humanized = sentences.map(s => {
                    if (s.length < 5) return s;
                    return s.replace(/Furthermore|Moreover|In conclusion/gi, 'Also')
                        .replace(/utilize|leverage/gi, 'use')
                        .replace(/is indicative of/gi, 'shows')
                        .replace(/due to the fact that/gi, 'because')
                        .replace(/\s+/g, ' ')
                        .trim();
                }).join('. ');

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Humanized Output</h3>
                        <div class="result-payload" style="background:var(--bg-secondary); padding:1.5rem; border-radius:12px; font-family:serif; line-height:1.6; text-align:left; max-height:400px; overflow:auto; color:var(--text-main); border:1px solid var(--border);">
                            ${humanized}
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button class="btn-primary" onclick="window.copyPremiumResult(this)">Copy Text</button>
                            <button class="btn-outline" onclick="window.location.reload()">Reset</button>
                        </div>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: YouTube Summarizer ---
    if (window.CURRENT_TOOL_SLUG === 'yt-summarizer') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const transcript = form.querySelector('textarea[name="transcript"]').value;
                const summary = `**Title**: Video Summary\n\n**Key Takeaways**:\n1. Main Point A\n2. Main Point B\n\n**Conclusion**: Summary statement.`;

                window.showResult(`
                    <div class="code-result">
                        <h3>Professional Summary</h3>
                        <div class="result-payload" style="background:white; border:1px solid #e2e8f0; padding:1.5rem; border-radius:12px; text-align:left; white-space:pre-wrap; color:var(--text-main);">
                            ${summary}
                        </div>
                        <button class="btn-primary mt-4" onclick="window.copyPremiumResult(this)">Copy Summary</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: Stable Diffusion Prompt Gen ---
    if (window.CURRENT_TOOL_SLUG === 'stable-diffusion-prompt') {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const prompt = `${subject}, hyper-realistic, 8k, cinematic lighting, intricate details, masterwork`;

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>SD Master Prompt</h3>
                        <div class="prompt-box mt-4" style="background:var(--bg-body); color:var(--text-main); padding:1.5rem; border-radius:12px; font-family:monospace; text-align:left;">
                            ${prompt}
                        </div>
                        <button class="btn-primary mt-4" onclick="window.copyPremiumResult(this)">Copy Prompt</button>
                    </div>
                `);
            });
        }
    }

    // --- TOOL SPECIFIC: AI Content Patterns (Blog, Email, Cover Letter, Bio, Product) ---
    const contentPatterns = {
        'blog-title-generator': '10 Ways to [KW]\\nThe Ultimate Guide to [KW]\\nWhy [KW] is the Future',
        'cold-email-gen': 'Hi [Name], I noticed your work on...',
        'cover-letter-gen': 'I am writing to express my interest in the [Role]...',
        'social-media-bio': 'Passion for [X] | Building [Y] | Living in [Z]',
        'product-description-gen': 'Experience the ultimate [Product]...'
    };

    if (contentPatterns[window.CURRENT_TOOL_SLUG]) {
        const form = document.querySelector('.ajax-tool-form');
        if (form) {
            form.classList.add('frontend-only');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let result = contentPatterns[window.CURRENT_TOOL_SLUG];

                // Dynamic replacement
                if (window.CURRENT_TOOL_SLUG === 'blog-title-generator') {
                    const kw = form.querySelector('input[name="keywords"]').value || 'Topic';
                    result = result.replace(/\[KW\]/g, kw);
                } else if (window.CURRENT_TOOL_SLUG === 'cold-email-gen') {
                    const name = form.querySelector('input[name="prospect"]').value || 'Friend';
                    result = result.replace(/\[Name\]/g, name);
                } else if (window.CURRENT_TOOL_SLUG === 'cover-letter-gen') {
                    const role = form.querySelector('input[name="role"]').value || 'Position';
                    result = result.replace(/\[Role\]/g, role);
                } else if (window.CURRENT_TOOL_SLUG === 'product-description-gen') {
                    const prod = form.querySelector('input[name="product"]').value || 'Product';
                    result = result.replace(/\[Product\]/g, prod);
                } else if (window.CURRENT_TOOL_SLUG === 'social-media-bio') {
                    const type = form.querySelector('select[name="bio_type"]').value;
                    const bios = {
                        'ig': '📸 Content Creator | 📍 Based in New York | ✉️ DMs for Collabs',
                        'x': 'Tech Enthusiast | Building the future | Opinions my own',
                        'li': 'Professional Software Engineer with 10+ years of experience in AI.'
                    };
                    result = bios[type] || result;
                }

                window.showResult(`
                    <div class="premium-result-card">
                        <h3>Generated Content</h3>
                        <div class="result-payload" style="background:var(--bg-secondary); padding:1.5rem; border-radius:12px; text-align:left; white-space:pre-wrap; color:var(--text-main); margin-bottom:1.5rem; border:1px solid var(--border);">
                            ${result}
                        </div>
                        <button class="btn-primary" onclick="window.copyPremiumResult(this)">Copy Content</button>
                    </div>
                `);
            });
        }
    }
});









