

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card shadow-lg border-0 rounded-4 p-4 overflow-hidden">
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-dark px-3 py-2 shadow-sm" style="font-size: 0.8rem; letter-spacing: 1px;">ULTRA BST PRO</span>
            </div>

            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Research Parameters</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Academic Topic</label>
                            <input type="text" id="ai-topic" class="form-control" placeholder="e.g. Socio-economic impact of AI in 2025">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Academic Style</label>
                            <select id="ai-style" class="form-select">
                                <option value="apa">APA (Scholarly)</option>
                                <option value="mla">MLA (Humanities)</option>
                                <option value="chicago">Chicago (History)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Depth of Analysis</label>
                            <select id="ai-depth" class="form-select">
                                <option value="overview">Executive Overview</option>
                                <option value="deep">Deep Quantitative Analysis</option>
                                <option value="critical">Critical Literature Review</option>
                            </select>
                        </div>

                        <button id="btn-essay-generate" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">
                            Assemble Research <i class="fa-solid fa-microscope ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-dark mb-3" role="status"></div>
                        <h6 class="fw-bold">Scanning Academic Databases...</h6>
                    </div>

                    <div id="ai-result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border flex-grow-1 p-4 overflow-auto" id="essay-body" style="font-family: 'Times New Roman', serif; font-size: 1.1rem; min-height: 480px;">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-scroll fa-4x mb-3"></i>
                                <h5>Your thesis starts here.</h5>
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



<style>
.text-gradient-dark { background: linear-gradient(45deg, #0f172a, #475569); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const topicIn = document.getElementById('ai-topic');
const genBtn = document.getElementById('btn-essay-generate');
const loading = document.getElementById('ai-loading');
const body = document.getElementById('essay-body');

genBtn.addEventListener('click', async () => {
    if(!topicIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 3000));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const topic = topicIn.value;
    const style = document.getElementById('ai-style').value.toUpperCase();
    
    body.innerHTML = `
        <div class="text-center mb-5">
            <h4 class="fw-bold mb-1">${topic}</h4>
            <div class="small text-muted">Format: ${style} Standard</div>
        </div>
        <p class="mb-4">The phenomenon of <strong>${topic}</strong> has garnered significant scholarly attention in recent years. This essay explores the multifaceted dimensions of this subject, proposing that a systematic approach is necessary to mitigate long-term impacts while maximizing potential gains.</p>
        <p class="mb-4 fw-bold">I. Introduction & Thesis</p>
        <p class="mb-4">Theoretical frameworks suggests that ${topic} operates within a complex ecosystem of historical precedents and modern technological shifts...</p>
        <p class="mb-4 fw-bold">II. Methodological Review</p>
        <p class="mb-4">Recent empirical studies (Author et al., 2024) indicate that the primary variables influencing ${topic} correlate strongly with institutional adaptability...</p>
        <div class="mt-5 pt-4 border-top">
            <h6 class="fw-bold">Draft Citations (${style}):</h6>
            <div class="small italic text-muted">A. Smith (2025). The structural evolution of ${topic}. Academic Press.</div>
        </div>
    `;
});
</script>






