<!-- Tool Interface -->
<div class="card border-0 shadow-sm transition-all hover-shadow" style="border-radius: var(--radius-md); overflow: hidden;">
    <div class="card-body p-6 sm:p-10">
        <!-- Password Display -->
        <div class="bg-dark rounded-4 p-5 mb-5 text-center relative overflow-hidden group">
            <div id="password-display" class="font-monospace fw-black h1 mb-0 text-info break-all" style="letter-spacing: 0.1em; min-height: 80px; display: flex; align-items: center; justify-content: center;">
                P@ssw0rd123!
            </div>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="bg-light p-4 rounded-4 border mb-4 shadow-inner">
                    <label class="form-label fw-bold text-muted text-uppercase small tracking-widest d-block mb-3">Topic / Post Title</label>
                    <input type="text" id="slug-input" class="form-control form-control-lg border-0 bg-transparent fw-black h2 mb-0" placeholder="e.g. 10 Best Tools for SEO in 2026!">
                </div>

                <div class="bg-white p-4 rounded-4 border shadow-sm relative group">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="form-label fw-bold text-primary text-uppercase small tracking-widest mb-0">SEO-Friendly slug</label>
                        <div class="d-flex gap-2">
                            <button id="copy-btn" class="btn btn-pro btn-sm rounded-pill px-4">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                            <button id="clear-btn" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 32px; height: 32px; padding: 0;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-3 bg-light rounded-3 border">
                        <span id="slug-output" class="text-primary h4 fw-black mb-0 d-block text-break font-monospace"></span>
                    </div>
                    
                    <div class="mt-4 row g-2">
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 border rounded-3 bg-light">
                                <label class="small fw-bold text-muted d-block mb-2 text-uppercase tracking-wider">Separator</label>
                                <select id="slug-sep" class="form-select form-select-sm border-0 bg-transparent fw-bold p-0">
                                    <option value="-">Hyphen (-)</option>
                                    <option value="_">Underscore (_)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 border rounded-3 bg-light">
                                <label class="small fw-bold text-muted d-block mb-2 text-uppercase tracking-wider">Case</label>
                                <select id="slug-case" class="form-select form-select-sm border-0 bg-transparent fw-bold p-0">
                                    <option value="lower">Lowercase</option>
                                    <option value="none">Original</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Password Generator',
    'intro_title' => 'Password Generator: Unbreakable Entropy for Digital Defense',
    'intro_content' => 'A secure password is the primary threshold of your digital identity. Our Professional Password Generator leverages high-entropy randomization to create complex, cryptographically robust strings that outperform traditional human-memorized keys. Whether you require a standard 16-character alphanumeric code or a maximum-security 64-character fortress of unique symbols, our generator provides the precision controls to meet any corporate or personal security mandate.',
    'detailed_title' => 'The Science of High-Entropy Password Selection',
    'detailed_content' => '<p>Human-created passwords often contain cultural patterns, common dates, or predictable keyboard sequences that modern brute-force algorithms exploit in seconds. Our tool eliminates these vectors through several core principles:</p>
        <ul class="list-unstyled mt-3">
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Cryptographic Randomness:</strong> Uses unbiased selection across four distinct character categories.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Zero-Server Architecture:</strong> The generation happens entirely within your browser\'s local execution context.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Custom Bit-Depth Control:</strong> Adjustable length from 6 to 64 characters.</li>
            <li><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Pattern Neutralization:</strong> Removing "predictability" for higher security.</li>
        </ul>'
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('slug-input');
    const output = document.getElementById('slug-output');
    const sepSelect = document.getElementById('slug-sep');
    const caseSelect = document.getElementById('slug-case');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const generate = () => {
        let text = input.value.trim();
        if (!text) {
            output.textContent = 'waiting-for-input...';
            output.classList.add('opacity-50');
            return;
        }
        output.classList.remove('opacity-50');

        const sep = sepSelect.value;
        const isLower = caseSelect.value === 'lower';

        let slug = text
            .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Remove accents
            .replace(/[^\w\s-]/g, '') // Remove non-word chars
            .trim()
            .replace(/[-\s]+/g, sep); // Replace spaces/hyphens with separator

        if (isLower) slug = slug.toLowerCase();
        output.textContent = slug;
    };

    input.addEventListener('input', generate);
    sepSelect.addEventListener('change', generate);
    caseSelect.addEventListener('change', generate);

    copyBtn.addEventListener('click', () => {
        if (!input.value) return;
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Slug copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        generate();
        input.focus();
    });

    generate();
});
</script>



