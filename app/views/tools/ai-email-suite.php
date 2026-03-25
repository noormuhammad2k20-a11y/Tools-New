

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-purple px-3 py-2 shadow-sm text-white" style="font-size: 0.8rem; letter-spacing: 1px; background: #9333ea;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #9333ea 0%, #7e22ce 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-envelope-open-text fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-purple">AI Email Marketing Suite</h1>
                    <p class="text-muted mb-0 lead">Nail your newsletters and cold outreach. Generate high-open subject lines and persuasive email body copy instantly.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <label class="form-label small fw-bold">Email Goal / Campaign Context</label>
                        <textarea id="email-ctx" class="form-control mb-4" rows="6" placeholder="e.g. Announcing our 50% Black Friday sale on all premium plans..."></textarea>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Email Type</label>
                            <select id="email-type" class="form-select">
                                <option value="promo">Promotional / Sale</option>
                                <option value="welcome">Welcome Sequence</option>
                                <option value="cold">Cold Outreach</option>
                                <option value="reminder">Abandoned Cart</option>
                            </select>
                        </div>

                        <button id="btn-email" class="btn btn-purple text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: #9333ea;">
                            Craft Email Campaign <i class="fa-solid fa-paper-plane ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="email-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-purple mb-3" style="color: #9333ea;"></div>
                        <h6 class="fw-bold">Polishing Subject Lines...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="email-body">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-inbox fa-4x mb-3"></i>
                                <h5>Your next campaign starts here.</h5>
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
.text-gradient-purple { background: linear-gradient(45deg, #9333ea, #7e22ce); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const ctxIn = document.getElementById('email-ctx');
const body = document.getElementById('email-body');
const loading = document.getElementById('email-loading');
const btn = document.getElementById('btn-email');

btn.addEventListener('click', async () => {
    if(!ctxIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 2000));
    loading.classList.remove('d-flex');
    loading.classList.add('get d-none');

    const type = document.getElementById('email-type').value;
    
    let html = `
        <div class="mb-4">
            <h6 class="fw-bold mb-2">Subject Line Options:</h6>
            <div class="list-group">
                <div class="list-group-item bg-light border-0 rounded-3 mb-2">🔥 Big News: Our Biggest Sale Ever is Here!</div>
                <div class="list-group-item bg-light border-0 rounded-3">Wait... You missed this? (50% OFF Inside)</div>
            </div>
        </div>
        <div class="p-4 bg-white border rounded-4 shadow-sm" style="font-family: 'Inter', sans-serif;">
            <p>Hi [Name],</p>
            <p>I hope you're having a great week!</p>
            <p>I wanted to reach out because we've just launched our most significant update yet. If you've been looking to scale your business with less effort, this is for you.</p>
            <p><strong>For a limited time, you can get 50% off all our premium plans.</strong></p>
            <p>Simply use the code <strong>BLACKFRIDAY</strong> at checkout.</p>
            <p>Best,<br>The Team</p>
        </div>
    `;
    body.innerHTML = html;
});
</script>






