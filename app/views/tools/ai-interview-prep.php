

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-slate px-3 py-2 shadow-sm text-white" style="font-size: 0.8rem; letter-spacing: 1px; background: #334155;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #334155 0%, #1e293b 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-user-tie fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-slate">AI Job Interview Prep</h1>
                    <p class="text-muted mb-0 lead">Secure your dream job. Practice with AI-generated mock interview questions and optimal answers tailored to your target role.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <label class="form-label small fw-bold">Target Job Title</label>
                        <input type="text" id="ai-job" class="form-control mb-3" placeholder="e.g. Senior Software Engineer, Marketing Manager">
                        
                        <label class="form-label small fw-bold">Experience Level</label>
                        <select id="ai-level" class="form-select mb-4">
                            <option value="entry">Entry Level / Junior</option>
                            <option value="mid">Mid-Senior Level</option>
                            <option value="director">Director / Executive</option>
                        </select>

                        <button id="btn-prep" class="btn btn-slate text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: #1e293b;">
                            Generate Interview Prep <i class="fa-solid fa-graduation-cap ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-slate mb-3"></div>
                        <h6 class="fw-bold">Simulating Interview Scenarios...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="prep-body">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-person-chalkboard fa-4x mb-3"></i>
                                <h5>Your mock session starts here.</h5>
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
.bg-slate { background-color: #334155 !important; }
.text-slate { color: #334155 !important; }
.text-gradient-slate { background: linear-gradient(45deg, #334155, #1e293b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const jobIn = document.getElementById('ai-job');
const body = document.getElementById('prep-body');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-prep');

btn.addEventListener('click', async () => {
    if(!jobIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 2000));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const job = jobIn.value;
    const questions = [
        `Can you describe a time you faced a significant challenge in a ${job} role?`,
        `What are the top 3 trends in the industry you're currently watching?`,
        `How do you prioritize your workload when managing multiple high-priority tasks?`
    ];

    let html = `<h6>Interview Questions for <strong>${job}</strong>:</h6><hr>`;
    questions.forEach((q, i) => {
        html += `
            <div class="p-3 bg-light rounded-4 mb-3 border shadow-sm">
                <div class="fw-bold text-slate mb-2">Q${i+1}: ${q}</div>
                <div class="small text-muted mb-2"><strong>AI Suggested Tip:</strong> Focus on the S.T.A.R method (Situation, Task, Action, Result) when answering.</div>
            </div>
        `;
    });
    body.innerHTML = html;
});
</script>






