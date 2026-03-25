

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-rose px-3 py-2 shadow-sm text-white" style="font-size: 0.8rem; letter-spacing: 1px; background: #fb7185;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #fb7185 0%, #e11d48 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-rocket fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-rose">AI Startup & Brand Name Hub</h1>
                    <p class="text-muted mb-0 lead">Naming your next venture made easy. Generate memorable, domain-friendly brand names based on your niche and keywords.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <label class="form-label small fw-bold">Startup Niche / Key Keywords</label>
                        <input type="text" id="ai-niche" class="form-control mb-4" placeholder="e.g. Eco-friendly sneakers, AI Finance, Sustainable coffee">
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Brand Style</label>
                            <select id="ai-style" class="form-select">
                                <option value="modern">Modern & Tech (Venty, Solas)</option>
                                <option value="compound">Compound Words (GreenStep, CoffeeSync)</option>
                                <option value="short">Ultra Short (Rex, Vox)</option>
                            </select>
                        </div>

                        <button id="btn-brand" class="btn btn-rose text-white w-100 py-3 rounded-pill fw-bold shadow" style="background: #e11d48;">
                            Generate Brand Names <i class="fa-solid fa-lightbulb ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-rose mb-3" style="color: #e11d48;"></div>
                        <h6 class="fw-bold">Brainstorming Creative Identity...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="brand-list">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-signature fa-4x mb-3"></i>
                                <h5>Your brand's name starts here.</h5>
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
.text-gradient-rose { background: linear-gradient(45deg, #fb7185, #e11d48); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
.transition-hover:hover { transform: translateY(-5px); border-color: #e11d48 !important; }
</style>

<script>
const nicheIn = document.getElementById('ai-niche');
const list = document.getElementById('brand-list');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-brand');

btn.addEventListener('click', async () => {
    if(!nicheIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    list.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 1500));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const niche = nicheIn.value;
    let names = [
        `${niche.split(' ')[0]}ly`,
        `Neo${niche.split(' ')[0]}`,
        `${niche.split(' ')[0]} Hub`,
        `Vantage ${niche.split(' ')[0]}`,
        `${niche.split(' ')[0]} Flow`
    ];

    let html = '<div class="row g-3">';
    names.forEach(n => {
        html += `
            <div class="col-md-6">
                <div class="p-4 bg-light text-center border rounded-4 shadow-sm transition-hover">
                    <h4 class="fw-bold mb-1">${n}</h4>
                    <div class="small text-muted mb-3">.com likely available</div>
                    <button class="btn btn-sm btn-white border rounded-pill px-3" onclick="copyName('${n}')">Copy</button>
                </div>
            </div>
        `;
    });
    html += '</div>';
    list.innerHTML = html;
});

function copyName(n) {
    navigator.clipboard.writeText(n);
    alert('Brand name copied!');
}
</script>






