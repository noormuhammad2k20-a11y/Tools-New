<!-- Tool Interface -->
<div class="card border-0 shadow-sm" style="border-radius: var(--radius-md); overflow: hidden;">
    <div class="card-body p-6 sm:p-10">
        <div class="row g-5">
            <!-- Configuration Area -->
            <div class="col-lg-5">
                <div class="d-grid gap-4">
                    <div>
                        <label class="form-label fw-bold text-muted text-uppercase small tracking-widest d-block mb-3">Batch Quantity</label>
                        <div class="input-group input-group-lg bg-light rounded-pill p-1 border">
                            <button onclick="adjustCount(-1)" class="btn btn-link text-decoration-none text-muted px-4"><i class="fa-solid fa-minus"></i></button>
                            <input type="number" id="uuid-count" class="form-control bg-transparent border-0 text-center fw-black shadow-none h-auto py-2" value="5" min="1" max="100">
                            <button onclick="adjustCount(1)" class="btn btn-link text-decoration-none text-muted px-4"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="p-4 rounded-3 border bg-light">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="w-8 h-8 bg-white rounded border d-flex align-items-center justify-content-center shadow-sm text-primary">
                                    <i class="fa-solid fa-font small"></i>
                                </div>
                                <span class="fw-bold text-muted text-uppercase small tracking-wider">Uppercase</span>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" id="uppercase-switch" style="cursor: pointer; width: 40px; height: 20px;">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-muted text-uppercase small tracking-wider mb-0">Raw JSON Input</label>
                    <button class="btn btn-sm btn-link text-decoration-none p-0 fw-bold" onclick="loadSample()">Load Sample</button>
                </div>
                <textarea id="input-json" class="form-control" style="height: 350px; resize: none; font-family: var(--font-mono); font-size: 14px;" placeholder="Paste your formatted JSON object here..."></textarea>
                
                <div class="mt-3">
                    <button class="btn btn-outline-danger btn-sm" onclick="document.getElementById('input-json').value = ''; document.getElementById('output-json').value = ''; updateMetrics();">
                        <i class="fa-solid fa-trash me-1"></i> Clear Input
                    </button>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary text-uppercase small tracking-wider mb-0">Minified Result</label>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-pro" onclick="copyResult()"><i class="fa-solid fa-copy me-1"></i> Copy</button>
                        <button class="btn btn-sm btn-outline-pro" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                    </div>
                </div>
                <textarea id="output-json" class="form-control bg-light" style="height: 350px; resize: none; font-family: var(--font-mono); font-size: 14px;" readonly placeholder="Minified result will appear here..."></textarea>

                <div class="row g-2 mt-2">
                    <div class="col-4">
                        <div class="bg-light border rounded p-2 text-center">
                            <small class="d-block text-muted text-uppercase fw-bold" style="font-size: 10px;">Before</small>
                            <span id="orig-size" class="fw-bold small">0 B</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light border rounded p-2 text-center">
                            <small class="d-block text-muted text-uppercase fw-bold" style="font-size: 10px;">After</small>
                            <span id="min-size" class="fw-bold text-success small">0 B</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light border rounded p-2 text-center">
                            <small class="d-block text-muted text-uppercase fw-bold" style="font-size: 10px;">Saved</small>
                            <span id="saved-pct" class="fw-bold text-primary small">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'UUID Generator',
    'intro_title' => 'Universally Unique Identifiers: The Distributed Identity Standard',
    'intro_content' => 'UUIDs (Universally Unique Identifiers) are 128-bit labels used for information in distributed systems without significant central coordination. Our Professional UUID Generator provides an RFC 4122 compliant utility for generating Version 4 (random) identifiers with maximum entropy. Perfect for database primary keys, session tokens, and microservice tracing, it ensures zero collision probability across global infrastructure architectures.',
    'detailed_title' => 'Cryptographic Randomness and Distributed Integrity',
    'detailed_content' => '<p>True uniqueness in software architecture requires higher-order randomness. Our UUID factory leverages secure cryptographic primitives to provide:</p>
        <ul class="list-unstyled mt-3">
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Hardened CSPRNG Entropy:</strong> Utilizes the hardware-linked Web Crypto API.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>RFC 4122 Compliance:</strong> Strictly follows the standard bit-layout.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Batch Efficiency Modules:</strong> Generate up to 100 identifiers.</li>
            <li><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Stateless Client Generation:</strong> Identifiers are generated in your local browser.</li>
        </ul>',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-json');
    const output = document.getElementById('output-json');
    const origSize = document.getElementById('orig-size');
    const minSize = document.getElementById('min-size');
    const savedPct = document.getElementById('saved-pct');

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(decimals)) + ' ' + sizes[i];
    }

    window.updateMetrics = () => {
        const inBytes = new Blob([input.value]).size;
        const outBytes = new Blob([output.value]).size;
        origSize.textContent = formatBytes(inBytes);
        minSize.textContent = formatBytes(outBytes);
        if (inBytes > 0 && outBytes > 0) {
            const pct = ((inBytes - outBytes) / inBytes) * 100;
            savedPct.textContent = Math.max(0, pct).toFixed(1) + '%';
        } else {
            savedPct.textContent = '0%';
        }
    }

    input.addEventListener('input', () => {
        const val = input.value.trim();
        if (!val) { output.value = ''; updateMetrics(); return; }
        try {
            output.value = JSON.stringify(JSON.parse(val));
            output.classList.remove('text-danger');
        } catch (e) {
            output.value = 'Invalid JSON: ' + e.message;
            output.classList.add('text-danger');
        }
        updateMetrics();
    });

    window.loadSample = () => {
        input.value = JSON.stringify({
            "project": "Tools Pro",
            "features": ["Speed", "Security", "Uptime"],
            "meta": { "version": "2.4.0", "stable": true }
        }, null, 4);
        input.dispatchEvent(new Event('input'));
    };

    window.copyResult = () => {
        if (!output.value || output.value.startsWith('Invalid')) return showToast('Nothing to copy', 'error');
        navigator.clipboard.writeText(output.value).then(() => showToast('Copied to clipboard'));
    };

    window.downloadResult = () => {
        if (!output.value || output.value.startsWith('Invalid')) return;
        const blob = new Blob([output.value], { type: 'application/json' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = `minified-${Date.now()}.json`;
        a.click();
    };
});
</script>



