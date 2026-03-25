

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-warning px-3 py-2 shadow-sm text-dark" style="font-size: 0.8rem; letter-spacing: 1px;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-bolt fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-warning">AI Viral Headline Creator</h1>
                    <p class="text-muted mb-0 lead">Stop the scroll. Generate click-worthy, psychological-driven headlines for articles, social media, and newsletters.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <label class="form-label small fw-bold">What is your content about?</label>
                        <textarea id="ai-input" class="form-control mb-4" rows="4" placeholder="e.g. A guide to making perfect sourdough bread at home..."></textarea>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Headline Style</label>
                            <select id="ai-style" class="form-select">
                                <option value="listicle">Listicle (The 10 Best...)</option>
                                <option value="clickbait">High Curiosity (You Won't Believe...)</option>
                                <option value="how-to">How-to Guide</option>
                                <option value="controversial">Controversial Angle</option>
                            </select>
                        </div>

                        <button id="btn-gen" class="btn btn-warning w-100 py-3 rounded-pill fw-bold text-dark shadow">
                            Generate Viral Titles <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="ai-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-warning mb-3"></div>
                        <h6 class="fw-bold">Analyzing Viral Patterns...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto" id="title-list">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-heading fa-4x mb-3"></i>
                                <h5>Your winning titles await.</h5>
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
.text-gradient-warning { background: linear-gradient(45deg, #f59e0b, #d97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
.shadow-inner { box-shadow: inset 0 2px 4px rgba(0,0,0,0.05); }
</style>

<script>
const input = document.getElementById('ai-input');
const list = document.getElementById('title-list');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-gen');

btn.addEventListener('click', async () => {
    if(!input.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    list.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 1500));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const topic = input.value;
    const style = document.getElementById('ai-style').value;
    
    let variants = [
        `10 Secrets About ${topic} Everyone is Hiding`,
        `How to Master ${topic} in Less Than 5 Minutes`,
        `The Only Guide to ${topic} You'll Ever Need`,
        `Why Most People Fail at ${topic} (And How to Succeed)`,
        `Is ${topic} the Future of Everything?`
    ];

    let html = '<div class="list-group list-group-flush">';
    variants.forEach(v => {
        html += `
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 py-3 mb-2 rounded-4 bg-light shadow-sm">
                <span class="fw-bold">${v}</span>
                <button class="btn btn-sm btn-white border rounded-pill px-3 shadow-inner" onclick="copyTag('${v}')">Copy</button>
            </div>
        `;
    });
    html += '</div>';
    list.innerHTML = html;
});

function copyTag(txt) {
    navigator.clipboard.writeText(txt);
    alert('Headline copied!');
}
</script>






