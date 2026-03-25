

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Page Content / Topic Description</label>
                    <textarea id="text-input" class="form-control" rows="6" placeholder="e.g. A comprehensive guide to the top 10 summer vacation spots in Europe for 2024..."></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate Meta Tags <i class="fa-solid fa-bullseye ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-4" style="width: 3rem; height: 3rem;" role="status"></div>
                <h5 class="fw-bold">Analyzing Content...</h5>
                <p class="text-muted">Extracting keywords and optimizing for click-through rate.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="p-4 border rounded-4 bg-light shadow-sm">
                            <div class="mb-4 pb-4 border-bottom">
                                <h6 class="fw-bold text-uppercase small text-primary mb-2">Meta Title (Recommended: 50-60 chars)</h6>
                                <div id="title-result" class="h5 fw-bold text-primary mb-2"></div>
                                <div class="small text-muted">Length: <span id="title-len">0</span> characters</div>
                            </div>
                            <div class="mb-0">
                                <h6 class="fw-bold text-uppercase small text-primary mb-2">Meta Description (Recommended: 150-160 chars)</h6>
                                <div id="desc-result" class="h6 lh-base mb-2"></div>
                                <div class="small text-muted">Length: <span id="desc-len">0</span> characters</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 d-flex gap-2">
                    <button id="copy-btn" class="btn btn-primary rounded-pill px-5 shadow">
                        <i class="fa-solid fa-copy me-2"></i> Copy All Tags
                    </button>
                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.bg-primary-soft { background-color: rgba(37, 99, 235, 0.05); }
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.tool-icon-circle {
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const textInput = document.getElementById('text-input');
        const resultWrapper = document.getElementById('result-wrapper');
        const titleBox = document.getElementById('title-result');
        const descBox = document.getElementById('desc-result');
        const titleLen = document.getElementById('title-len');
        const descLen = document.getElementById('desc-len');

        btn.addEventListener('click', async () => {
            const text = textInput.value.trim();
            if(!text) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const meta = AITools.generateSeoMeta(text);
                titleBox.innerText = meta.title;
                descBox.innerText = meta.desc;
                titleLen.innerText = meta.title.length;
                descLen.innerText = meta.desc.length;

                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 900);
        });

        document.getElementById('copy-btn').addEventListener('click', () => {
            const text = `Title: ${titleBox.innerText}\nDescription: ${descBox.innerText}`;
            navigator.clipboard.writeText(text);
            alert('Meta tags copied!');
        });
    });
</script>






