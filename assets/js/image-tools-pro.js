/**
 * Image Tools PRO - Shared JS Utilities
 * Drag-drop zones, batch processing, canvas helpers, download managers
 */
const ImgPro = {
    toast(msg) {
        const t = document.createElement('div');
        t.textContent = msg;
        Object.assign(t.style, { position:'fixed', bottom:'2rem', right:'2rem', background:'#1e293b', color:'#fff', padding:'1rem 2rem', borderRadius:'14px', fontWeight:'600', zIndex:'9999', boxShadow:'0 10px 40px rgba(0,0,0,0.2)' });
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    },

    /**
     * Build a drag-and-drop upload zone
     * @param {string} containerId - ID of the container div
     * @param {object} opts - { accept, multiple, onFiles }
     */
    buildDropZone(containerId, opts = {}) {
        const container = document.getElementById(containerId);
        if (!container) return;
        const accept = opts.accept || 'image/*';
        const multiple = opts.multiple || false;
        const onFiles = opts.onFiles || (() => {});
        const id = containerId + '-input';

        container.innerHTML = `
            <div id="${containerId}-zone" style="border:2px dashed var(--border);border-radius:20px;padding:3rem 2rem;text-align:center;cursor:pointer;background:var(--bg-body);transition:all .3s;position:relative;">
                <input type="file" id="${id}" accept="${accept}" ${multiple ? 'multiple' : ''} style="position:absolute;inset:0;opacity:0;cursor:pointer;">
                <div style="font-size:3rem;margin-bottom:1rem;">📁</div>
                <div style="font-weight:700;font-size:1.1rem;color:var(--text-main);margin-bottom:0.5rem;">Drag & drop your image${multiple?'s':''} here</div>
                <div style="color:var(--text-muted);font-size:0.9rem;">or click to browse files</div>
                ${multiple ? '<div style="margin-top:0.75rem;"><span style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;padding:0.3rem 0.8rem;border-radius:20px;font-size:0.75rem;font-weight:700;">PRO Batch Upload</span></div>' : ''}
            </div>`;

        const zone = document.getElementById(containerId + '-zone');
        const input = document.getElementById(id);

        ['dragenter','dragover'].forEach(e => zone.addEventListener(e, ev => { ev.preventDefault(); zone.style.borderColor = 'var(--primary)'; zone.style.background = 'var(--primary-glow)'; }));
        ['dragleave','drop'].forEach(e => zone.addEventListener(e, ev => { ev.preventDefault(); zone.style.borderColor = 'var(--border)'; zone.style.background = 'var(--bg-body)'; }));

        zone.addEventListener('drop', e => {
            const files = Array.from(e.dataTransfer.files);
            if (files.length) onFiles(multiple ? files : [files[0]]);
        });

        input.addEventListener('change', () => {
            const files = Array.from(input.files);
            if (files.length) onFiles(multiple ? files : [files[0]]);
        });
    },

    /**
     * Load an image file and return a canvas + context
     */
    loadImageToCanvas(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = new Image();
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);
                    resolve({ canvas, ctx, img, width: img.width, height: img.height });
                };
                img.onerror = reject;
                img.src = e.target.result;
            };
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    },

    /**
     * Download canvas as image
     */
    downloadCanvas(canvas, filename = 'output.png', type = 'image/png', quality = 0.92) {
        const link = document.createElement('a');
        link.download = filename;
        link.href = canvas.toDataURL(type, quality);
        link.click();
        this.toast('Download started!');
    },

    /**
     * Download a blob
     */
    downloadBlob(blob, filename) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        a.click();
        URL.revokeObjectURL(url);
        this.toast('Download started!');
    },

    /**
     * Format file size
     */
    formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / 1048576).toFixed(1) + ' MB';
    }
};
