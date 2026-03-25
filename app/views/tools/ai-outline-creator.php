

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-teal px-3 py-2 shadow-sm text-white" style="font-size: 0.8rem; letter-spacing: 1px; background: #0d9488;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-list-check fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-teal">AI Bullet Point & Outline Creator</h1>
                    <p class="text-muted mb-0 lead">Turn messy thoughts into structured clarity. Organize your ideas into logical outlines, step-by-step guides, or concise bullet points.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <label class="form-label small fw-bold">Topic or Braindump</label>
                        <textarea id="ai-input" class="form-control mb-4" rows="10" placeholder="Paste your rough notes or a topic here..."></textarea>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Structure Goal</label>
                            <select id="ai-structure" class="form-select">
                                <option value="outline">Full Content Outline</option>
                                <option value="bullets">Key Bullet Points</option>
                                <option value="steps">Step-by-Step Guide</option>
                            </select>
                        </div>

                        <button id="btn-gen" class="btn btn-teal text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: #0d9488;">
                            Structure My Ideas <i class="fa-solid fa-layer-group ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-teal mb-3" style="color: #0d9488;"></div>
                        <h6 class="fw-bold">Drafting Structural Framework...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="out-body" style="font-size: 1.1rem; line-height: 1.7;">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-sitemap fa-4x mb-3"></i>
                                <h5>Logical structure starts here.</h5>
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
.bg-teal { background-color: #0d9488 !important; }
.text-teal { color: #0d9488 !important; }
.text-gradient-teal { background: linear-gradient(45deg, #0d9488, #0f766e); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const input = document.getElementById('ai-input');
const output = document.getElementById('out-body');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-gen');

btn.addEventListener('click', async () => {
    if(!input.value.trim()) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    output.innerHTML = '';

    await new Promise(r => setTimeout(r, 1800));

    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const struct = document.getElementById('ai-structure').value;
    const topic = input.value.split('\n')[0];

    let html = '';
    if(struct === 'outline') {
        html = `
            <div class="mb-4">
                <h5 class="fw-bold text-teal border-bottom pb-2 mb-3">I. Introduction</h5>
                <ul class="ps-3 mb-0">
                    <li>Background on ${topic}</li>
                    <li>Problem Statement & Current Challenges</li>
                    <li>Thesis: Adapting for the future</li>
                </ul>
            </div>
            <div class="mb-4">
                <h5 class="fw-bold text-teal border-bottom pb-2 mb-3">II. Core Analysis</h5>
                <ul class="ps-3 mb-0">
                    <li>Segment Alpha: Environmental factors</li>
                    <li>Segment Beta: Economic viability</li>
                    <li>Comparative analysis of existing solutions</li>
                </ul>
            </div>
        `;
    } else {
        html = `
            <h5 class="fw-bold mb-3">Key Highlights:</h5>
            <div class="d-flex align-items-start gap-3 mb-3">
                <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 25px; height: 25px; font-size: 0.8rem; background: #0d9488;">1</div>
                <div><strong>Clarity:</strong> Distilling the core essence of the topic.</div>
            </div>
            <div class="d-flex align-items-start gap-3">
                 <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 25px; height: 25px; font-size: 0.8rem; background: #0d9488;">2</div>
                 <div><strong>Direction:</strong> Providing a roadmap for execution.</div>
            </div>
        `;
    }
    output.innerHTML = html;
});
</script>






