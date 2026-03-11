/**
 * PDF & Developer Tools PRO - Shared JS Utilities
 * Base utilities for Batch 3 tools: drag-drop zones, file handling, toasts
 */
const PdfDevPro = {
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
     * @param {object} opts - { accept, multiple, onFiles, title, icon }
     */
    buildDropZone(containerId, opts = {}) {
        const container = document.getElementById(containerId);
        if (!container) return;
        const accept = opts.accept || '*/*';
        const multiple = opts.multiple || false;
        const onFiles = opts.onFiles || (() => {});
        const title = opts.title || 'your file';
        const icon = opts.icon || '📄';
        const id = containerId + '-input';

        container.innerHTML = `
            <div id="${containerId}-zone" style="border:2px dashed var(--border);border-radius:20px;padding:3rem 2rem;text-align:center;cursor:pointer;background:var(--bg-body);transition:all .3s;position:relative;">
                <input type="file" id="${id}" accept="${accept}" ${multiple ? 'multiple' : ''} style="position:absolute;inset:0;opacity:0;cursor:pointer;z-index:10;">
                <div style="font-size:3rem;margin-bottom:1rem;">${icon}</div>
                <div style="font-weight:700;font-size:1.1rem;color:var(--text-main);margin-bottom:0.5rem;">Drag & drop ${title}${multiple?'s':''} here</div>
                <div style="color:var(--text-muted);font-size:0.9rem;">or click to browse files</div>
                ${multiple ? '<div style="margin-top:1rem;"><span style="background:linear-gradient(135deg,#2563eb,#3b82f6);color:#fff;padding:0.3rem 0.8rem;border-radius:20px;font-size:0.75rem;font-weight:700;">PRO Batch Upload Supported</span></div>' : ''}
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
            if (files.length) {
                onFiles(multiple ? files : [files[0]]);
                input.value = ''; // reset so same file can be selected again
            }
        });
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

    downloadTextAsFile(content, filename) {
        const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
        this.downloadBlob(blob, filename);
    },

    downloadCanvas(canvas, filename = 'output.png', type = 'image/png', quality = 0.92) {
        canvas.toBlob((blob) => {
            if (blob) this.downloadBlob(blob, filename);
        }, type, quality);
    },

    /**
     * Format file size
     */
    formatSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    },

    /**
     * Load an image file into an Image object
     */
    loadImage(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = new Image();
                img.crossOrigin = "Anonymous";
                img.onload = () => resolve(img);
                img.onerror = reject;
                img.src = e.target.result;
            };
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    },
    
    /**
     * Read file as ArrayBuffer
     */
    readFileAsArrayBuffer(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsArrayBuffer(file);
        });
    },

    /**
     * Read file as Text
     */
    readFileAsText(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsText(file);
        });
    }
};
