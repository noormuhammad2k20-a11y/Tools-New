

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-share-nodes fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">What is the post about?</label>
                    <textarea id="text-input" class="form-control" rows="4" placeholder="e.g. Just launched a new AI tool that removes backgrounds instantly..."></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label class="form-label fw-bold small text-uppercase mb-3">Target Platform</label>
                        <div class="row g-3" id="platform-options">
                            <div class="col-md-4">
                                <div class="platform-card active border rounded-4 p-3 text-center cursor-pointer" data-value="ig">
                                    <i class="fa-brands fa-instagram h3 mb-2 text-danger"></i>
                                    <div class="fw-bold">Instagram</div>
                                    <div class="small text-muted">Visual & Tags</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="platform-card border rounded-4 p-3 text-center cursor-pointer" data-value="x">
                                    <i class="fa-brands fa-x-twitter h3 mb-2"></i>
                                    <div class="fw-bold">X / Twitter</div>
                                    <div class="small text-muted">Short & Viral</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="platform-card border rounded-4 p-3 text-center cursor-pointer" data-value="li">
                                    <i class="fa-brands fa-linkedin h3 mb-2 text-primary"></i>
                                    <div class="fw-bold">LinkedIn</div>
                                    <div class="small text-muted">Professional</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate Post <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-3" role="status"></div>
                <h5 class="fw-bold">Crafting Social Copy...</h5>
                <p class="text-muted small">Optimizing engagement and adding relevant emojis/tags.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Your Ready-to-Post Copy</h5>
                    <button id="copy-btn" class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm">Copy Caption</button>
                </div>
                <div id="post-result" class="p-4 bg-light border rounded-4 h5 lh-lg mb-0" style="white-space: pre-wrap;"></div>
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
.cursor-pointer { cursor: pointer; transition: all 0.2s; }
.platform-card:hover { background: #f8fafc; border-color: var(--primary) !important; }
.platform-card.active { border-color: var(--primary) !important; background: var(--primary-glow); box-shadow: 0 0 0 2px var(--primary); }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const platformCards = document.querySelectorAll('.platform-card');
        let selectedPlatform = 'ig';

        platformCards.forEach(card => {
            card.addEventListener('click', () => {
                platformCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');
                selectedPlatform = card.getAttribute('data-value');
            });
        });

        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const textInput = document.getElementById('text-input');
        const resultWrapper = document.getElementById('result-wrapper');
        const resultBox = document.getElementById('post-result');

        btn.addEventListener('click', async () => {
            const text = textInput.value.trim();
            if(!text) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const post = AITools.generateSocialPost(text, selectedPlatform);
                resultBox.innerText = post;
                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 1000);
        });

        document.getElementById('copy-btn').addEventListener('click', () => {
            navigator.clipboard.writeText(resultBox.innerText);
            alert('Caption copied!');
        });
    });
</script>






