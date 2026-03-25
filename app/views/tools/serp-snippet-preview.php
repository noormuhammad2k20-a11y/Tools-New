

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <form action="" method="POST" class="ajax-tool-form">
                        <div class="bg-light p-4 rounded-4 border shadow-sm">
                            <h5 class="fw-bold mb-4">Snippet Settings</h5>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">SEO Title</label>
                                <input type="text" name="title" id="serp-title" class="form-control" placeholder="e.g. Best SEO Tools 2026 - Master Your Strategy" required>
                                <div class="progress mt-1" style="height: 4px;">
                                    <div id="title-prog" class="progress-bar bg-success" style="width: 0%"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-1 small text-muted">
                                    <span>Chars: <span id="title-count">0</span></span>
                                    <span>Optimal: 50-60</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Meta Description</label>
                                <textarea name="desc" id="serp-desc" class="form-control" rows="4" placeholder="Enter a compelling description for your search result..." required></textarea>
                                <div class="progress mt-1" style="height: 4px;">
                                    <div id="desc-prog" class="progress-bar bg-success" style="width: 0%"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-1 small text-muted">
                                    <span>Chars: <span id="desc-count">0</span></span>
                                    <span>Optimal: 120-160</span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Page URL</label>
                                <input type="text" name="url" id="serp-url" class="form-control" placeholder="https://example.com/best-seo-tools" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm">
                                <i class="fa-solid fa-eye me-2"></i> Update Preview
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <div id="toolResultWrapper" style="display: none;">
                        <div class="bg-white p-5 rounded-4 border shadow-lg h-100 d-flex flex-column justify-content-center border-dashed">
                             <div class="text-center mb-4 text-muted small fw-bold text-uppercase opacity-50"><i class="fa-solid fa-desktop me-2"></i> Desktop Search Result Preview</div>
                             <div id="toolResult">
                                 <!-- AJAX Content -->
                             </div>
                        </div>
                    </div>
                    <!-- Empty state -->
                    <div id="empty-preview" class="bg-light p-5 rounded-4 border h-100 d-flex flex-column align-items-center justify-content-center opacity-75">
                         <i class="fa-solid fa-magnifying-glass fa-4x mb-3 text-muted"></i>
                         <p class="h5 fw-bold text-muted">Search Preview</p>
                         <p class="text-muted small text-center px-4">Fill in the SEO title and description to see how your site looks on Google.</p>
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



<style>
.border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const titleInput = document.getElementById('serp-title');
    const descInput = document.getElementById('serp-desc');
    const titleCount = document.getElementById('title-count');
    const descCount = document.getElementById('desc-count');
    const titleProg = document.getElementById('title-prog');
    const descProg = document.getElementById('desc-prog');
    const form = document.querySelector('.ajax-tool-form');
    const emptyPrev = document.getElementById('empty-preview');
    const wrapper = document.getElementById('toolResultWrapper');

    const updateStats = () => {
        const tLen = titleInput.value.length;
        const dLen = descInput.value.length;

        titleCount.textContent = tLen;
        descCount.textContent = dLen;

        // Title progress
        let tPerc = (tLen / 60) * 100;
        titleProg.style.width = Math.min(tPerc, 100) + '%';
        titleProg.className = `progress-bar ${tLen > 65 ? 'bg-danger' : (tLen >= 50 ? 'bg-success' : 'bg-warning')}`;

        // Desc progress
        let dPerc = (dLen / 160) * 100;
        descProg.style.width = Math.min(dPerc, 100) + '%';
        descProg.className = `progress-bar ${dLen > 170 ? 'bg-danger' : (dLen >= 120 ? 'bg-success' : 'bg-warning')}`;
    };

    [titleInput, descInput].forEach(el => el.addEventListener('input', () => {
        updateStats();
        if (titleInput.value && descInput.value) {
            form.dispatchEvent(new Event('submit'));
            emptyPrev.classList.add('d-none');
            wrapper.classList.remove('d-none');
        }
    }));
});
</script>






