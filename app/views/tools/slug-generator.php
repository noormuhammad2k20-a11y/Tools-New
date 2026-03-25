

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded-4 border mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Topic / Post Title</label>
                        <input type="text" id="slug-input" class="form-control form-control-lg rounded-3" style="font-size: 1.5rem;" placeholder="e.g. 10 Best Tools for SEO in 2026!">
                    </div>

                    <div class="bg-white p-4 rounded-4 border shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="form-label fw-bold small text-uppercase mb-0">SEO-Friendly slug</label>
                            <div class="d-flex gap-2">
                                <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm">
                                    <i class="fa-solid fa-copy me-1"></i> Copy
                                </button>
                                <button id="clear-btn" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 32px; height: 32px; padding: 0;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-light rounded-3 border">
                            <span id="slug-output" class="text-primary h5 fw-bold mb-0 animate-pulse-slow d-block text-break"></span>
                        </div>
                        
                        <div class="mt-4 row g-2">
                            <div class="col-md-3">
                                <div class="p-2 border rounded-3 bg-light transition-all hover-translate-y">
                                    <label class="small fw-bold text-muted d-block mb-1">Separator</label>
                                    <select id="slug-sep" class="form-select form-select-sm border-0 bg-transparent">
                                        <option value="-">Hyphen (-)</option>
                                        <option value="_">Underscore (_)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-2 border rounded-3 bg-light transition-all hover-translate-y">
                                    <label class="small fw-bold text-muted d-block mb-1">Case</label>
                                    <select id="slug-case" class="form-select form-select-sm border-0 bg-transparent">
                                        <option value="lower">Lowercase</option>
                                        <option value="none">As is</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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
            return;
        }

        const sep = sepSelect.value;
        const isLower = caseSelect.value === 'lower';

        let slug = text
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
    });

    generate();
});
</script>






