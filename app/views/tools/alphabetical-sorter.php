

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Input List (One per line)</label>
                        <textarea id="text-input" class="form-control" rows="15" placeholder="Zebra\nApple\nMonkey\nBanana..."></textarea>
                    </div>
                    <div class="bg-light p-3 rounded-3 border mb-4">
                        <label class="form-label fw-bold small">Sorting Options</label>
                        <div class="d-flex gap-3 mt-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort-dir" id="sort-asc" value="asc" checked>
                                <label class="form-check-label" for="sort-asc">A to Z</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort-dir" id="sort-desc" value="desc">
                                <label class="form-check-label" for="sort-desc">Z to A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sort-case" value="1">
                                <label class="form-check-label" for="sort-case">Case Sensitive</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button id="process-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                            Sort List <i class="fa-solid fa-sort ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">Sorted Result</label>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                        <textarea id="text-output" class="form-control bg-light" rows="15" readonly placeholder="Sorted results will appear here..."></textarea>
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
    const button = document.getElementById('process-btn');

    button.addEventListener('click', () => {
        const text = input.value.trim();
        if (!text) return showToast('Please enter text', 'error');

        const dir = document.querySelector('input[name="sort-dir"]:checked').value;
        const caseSens = document.getElementById('sort-case').checked;
        
        const lines = text.split(/\r?\n/).filter(line => line.trim() !== "");
        
        lines.sort((a, b) => {
            let valA = caseSens ? a : a.toLowerCase();
            let valB = caseSens ? b : b.toLowerCase();
            
            if (valA < valB) return dir === 'asc' ? -1 : 1;
            if (valA > valB) return dir === 'asc' ? 1 : -1;
            return 0;
        });
        
        output.value = lines.join('\n');
        showToast('List Sorted!');
    });
});

function copyResult() {
    const val = document.getElementById('text-output').value;
    if (!val) return;
    navigator.clipboard.writeText(val).then(() => {
        showToast('Sorted text copied!');
    });
}
</script>






