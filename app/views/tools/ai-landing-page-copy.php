

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-blue px-3 py-2 shadow-sm text-white" style="font-size: 0.8rem; letter-spacing: 1px; background: #2563eb;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-desktop fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-blue">AI Landing Page Copy</h1>
                    <p class="text-muted mb-0 lead">Turn visitors into customers. Generate full structural copy including Hero headlines, Benefit sections, and Social Proof triggers.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <label class="form-label small fw-bold">What is your main offer?</label>
                        <textarea id="lp-offer" class="form-control mb-4" rows="6" placeholder="e.g. A SaaS platform that automates tax filing for freelancers and digital nomads..."></textarea>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Landing Page Style</label>
                            <select id="lp-style" class="form-select">
                                <option value="modern">Modern & Minimal</option>
                                <option value="authoritative">Authoritative (Enterprise)</option>
                                <option value="playful">Playful (Startup)</option>
                            </select>
                        </div>

                        <button id="btn-lp" class="btn btn-blue text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: #2563eb;">
                            Build My Page Copy <i class="fa-solid fa-drafting-compass ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="lp-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-blue mb-3" style="color: #2563eb;"></div>
                        <h6 class="fw-bold">Structuring Your High-Value Page...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="lp-body">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-browser fa-4x mb-3"></i>
                                <h5>Your landing page architecture awaits.</h5>
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
.text-gradient-blue { background: linear-gradient(45deg, #2563eb, #1e40af); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const offerIn = document.getElementById('lp-offer');
const body = document.getElementById('lp-body');
const loading = document.getElementById('lp-loading');
const btn = document.getElementById('btn-lp');

btn.addEventListener('click', async () => {
    if(!offerIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 2500));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    let html = `
        <div class="section mb-5 p-4 border rounded-4 bg-light">
            <span class="badge bg-primary mb-2">SECTION: HERO</span>
            <h3 class="fw-bold">Stop Dreaded Tax Season in Its Tracks.</h3>
            <p class="lead">The smartest way for nomads to stay compliant, without the headache. Automated, accurate, and available globally.</p>
            <button class="btn btn-primary px-4">Start Your Free Trial</button>
        </div>
        <div class="section mb-5">
             <span class="badge bg-secondary mb-2">SECTION: THE PROBLEM</span>
             <h4 class="fw-bold">Taxes should't be your second job.</h4>
             <p>As a freelancer, you're building a business, not an accounting firm. We take the weight off your shoulders so you can focus on your craft.</p>
        </div>
        <div class="section mb-2">
             <span class="badge bg-info mb-2">SECTION: THREE PILLARS</span>
             <div class="row g-3">
                 <div class="col-4 small fw-bold">1. Zero-Entry Automation</div>
                 <div class="col-4 small fw-bold">2. Global Compliance</div>
                 <div class="col-4 small fw-bold">3. Real-time Reports</div>
             </div>
        </div>
    `;
    body.innerHTML = html;
});
</script>






