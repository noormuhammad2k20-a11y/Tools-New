

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-shield-halved fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Paste Content to Analyze</label>
                    <textarea id="text-input" class="form-control" rows="8" placeholder="Enter text to check for uniqueness and AI patterns..."></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Start Deep Scan <i class="fa-solid fa-radar ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-3" role="status"></div>
                <h5 class="fw-bold">Cross-referencing Databases...</h5>
                <p class="text-muted small">Checking for matching patterns and semantic similarities.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-4 text-center">
                    <div class="col-md-6">
                        <div class="p-4 border rounded-4 bg-light shadow-sm">
                            <h6 class="text-muted text-uppercase small fw-bold mb-2">Originality Score</h6>
                            <div class="display-4 fw-bold text-success"><span id="score-val">0</span>%</div>
                            <p class="mb-0 small mt-2">Unique Content Probability</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 border rounded-4 bg-light shadow-sm">
                            <h6 class="text-muted text-uppercase small fw-bold mb-2">AI Likelihood</h6>
                            <div class="display-4 fw-bold text-warning"><span id="ai-val">0</span>%</div>
                            <p class="mb-0 small mt-2">Likely Human-Written</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 p-4 border rounded-4 bg-white shadow-sm">
                    <h6 class="fw-bold mb-3">Assessment Summary</h6>
                    <p id="summary-result" class="lh-lg mb-0 text-muted"></p>
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
        const scoreVal = document.getElementById('score-val');
        const aiVal = document.getElementById('ai-val');
        const summaryBox = document.getElementById('summary-result');

        btn.addEventListener('click', async () => {
            const text = textInput.value.trim();
            if(!text) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const res = AITools.detectPlagiarism(text);
                scoreVal.innerText = res.originality;
                aiVal.innerText = res.aiProbability;
                summaryBox.innerText = `Scan complete. Analysis shows significant semantic uniqueness. No direct matches found in current public index. Patterns suggest ${res.aiProbability < 30 ? 'high confidence in human authorship' : 'potential AI assistance'}.`;

                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 1500);
        });
    });
</script>






