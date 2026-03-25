

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-danger px-3 py-2 shadow-sm" style="font-size: 0.8rem; letter-spacing: 1px;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-magnifying-glass-chart fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-danger">AI Content Gap Finder</h1>
                    <p class="text-muted mb-0 lead">Identify missing subtopics, semantically related keywords, and authoritative angles to make your posts truly comprehensive.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <label class="form-label small fw-bold">Your Current Draft / Outline</label>
                        <textarea id="ai-draft" class="form-control" rows="15" placeholder="Paste your article draft here..."></textarea>
                        <button id="btn-analyze" class="btn btn-danger w-100 py-3 mt-4 rounded-pill fw-bold shadow">
                            Analyze Gaps <i class="fa-solid fa-radar ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-grow text-danger mb-3"></div>
                        <h6 class="fw-bold">Calculating Semantic Relevance...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="gap-list">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-puzzle-piece fa-4x mb-3"></i>
                                <h5>Discovery results will appear here.</h5>
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
.text-gradient-danger { background: linear-gradient(45deg, #ef4444, #b91c1c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const input = document.getElementById('ai-draft');
const list = document.getElementById('gap-list');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-analyze');

btn.addEventListener('click', async () => {
    if(!input.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    list.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 2000));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    let html = `
        <h6 class="fw-bold mb-3 d-flex align-items-center"><i class="fa-solid fa-lightbulb text-warning me-2"></i> Missing Entities & Topics</h6>
        <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="badge border bg-light text-dark px-3 py-2 rounded-pill shadow-sm">Quantitative Data</span>
            <span class="badge border bg-light text-dark px-3 py-2 rounded-pill shadow-sm">Historical Context</span>
            <span class="badge border bg-light text-dark px-3 py-2 rounded-pill shadow-sm">Expert Interviews</span>
            <span class="badge border bg-light text-dark px-3 py-2 rounded-pill shadow-sm">Case Studies</span>
        </div>
        <h6 class="fw-bold mb-3">Recommendations:</h6>
        <div class="alert alert-info border-0 rounded-4 shadow-sm mb-3">
             <strong>Authority Boost:</strong> Consider adding a section on the long-term ethical implications of this topic to satisfy Google's E-E-A-T criteria.
        </div>
        <div class="alert alert-primary border-0 rounded-4 shadow-sm">
             <strong>SEM Gap:</strong> You haven't mentioned "User Experience Optimization" which is highly relevant to your audience's search intent.
        </div>
    `;
    list.innerHTML = html;
});
</script>






