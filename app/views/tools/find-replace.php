

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Input Text</label>
                        <textarea id="text-input" class="form-control" rows="10" placeholder="Paste your text here..."></textarea>
                    </div>
                    
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Find</label>
                                <input type="text" id="find-str" class="form-control" placeholder="Search for...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Replace with</label>
                                <input type="text" id="replace-str" class="form-control" placeholder="Replace with...">
                            </div>
                        </div>
                        
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="case-sens">
                                <label class="form-check-label small" for="case-sens">Case Sensitive</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is-regex">
                                <label class="form-check-label small" for="is-regex">Use Regex</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="replace-all" checked>
                                <label class="form-check-label small" for="replace-all">Replace All</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button id="process-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                Execute Replace <i class="fa-solid fa-bolt ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3 h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">Resulting Text</label>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                        <textarea id="text-output" class="form-control bg-light h-100" rows="20" readonly style="min-height: 400px;"></textarea>
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
    const input = document.getElementById('text-input');
    const output = document.getElementById('text-output');
    const findStr = document.getElementById('find-str');
    const replaceStr = document.getElementById('replace-str');
    const button = document.getElementById('process-btn');

    button.addEventListener('click', () => {
        const text = input.value;
        const find = findStr.value;
        const replace = replaceStr.value;
        if (!text) return showToast('Please enter input text', 'error');
        if (find === "") return showToast('Please enter search string', 'error');

        const isRegex = document.getElementById('is-regex').checked;
        const caseSens = document.getElementById('case-sens').checked;
        const replaceAll = document.getElementById('replace-all').checked;

        try {
            let result = "";
            if (isRegex) {
                let flags = replaceAll ? "g" : "";
                if (!caseSens) flags += "i";
                const regex = new RegExp(find, flags);
                result = text.replace(regex, replace);
            } else {
                if (replaceAll) {
                    // Modern JS has replaceAll, fallback for older browsers
                    if (text.replaceAll) {
                        result = caseSens ? text.replaceAll(find, replace) : text.replace(new RegExp(find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'gi'), replace);
                    } else {
                        result = text.replace(new RegExp(find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), caseSens ? 'g' : 'gi'), replace);
                    }
                } else {
                    result = caseSens ? text.replace(find, replace) : text.replace(new RegExp(find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), 'i'), replace);
                }
            }
            output.value = result;
            showToast('Search & Replace Complete!');
        } catch (e) {
            showToast('Regex Error: ' + e.message, 'error');
        }
    });
});

function copyResult() {
    const val = document.getElementById('text-output').value;
    if (!val) return;
    navigator.clipboard.writeText(val).then(() => {
        showToast('Result copied!');
    });
}
</script>






