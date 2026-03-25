

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-microscope fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Describe the pattern in plain English</label>
                    <input type="text" id="desc-input" class="form-control" placeholder="e.g. Find all emails with gmail.com domain, extract numbers between square brackets...">
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Build Regex Pattern <i class="fa-solid fa-code ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-3" role="status"></div>
                <h5 class="fw-bold">Generating Logic...</h5>
                <p class="text-muted small">Mapping your description to regular expression syntax.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="p-4 border rounded-4 bg-light shadow-sm">
                            <div class="mb-4">
                                <h6 class="fw-bold text-uppercase small text-primary mb-2">Regex Pattern</h6>
                                <div id="pattern-result" class="bg-dark text-white p-3 rounded-3 font-monospace h5 mb-2"></div>
                                <button id="copy-pattern-btn" class="btn btn-sm btn-link text-primary p-0 text-decoration-none fw-bold">
                                    <i class="fa-solid fa-copy me-1"></i> Copy Pattern
                                </button>
                            </div>
                            <div class="mb-0">
                                <h6 class="fw-bold text-uppercase small text-primary mb-2">Test Example</h6>
                                <div id="example-result" class="h6 font-monospace mb-0 p-3 bg-white border rounded-3 text-primary"></div>
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
.font-monospace { font-family: 'Fira Code', 'Courier New', monospace; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const descInput = document.getElementById('desc-input');
        const resultWrapper = document.getElementById('result-wrapper');
        const patternBox = document.getElementById('pattern-result');
        const exampleBox = document.getElementById('example-result');

        btn.addEventListener('click', async () => {
            const desc = descInput.value.trim();
            if(!desc) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const regex = AITools.generateRegex(desc);
                patternBox.innerText = regex.pattern;
                exampleBox.innerText = regex.example;

                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 700);
        });

        document.getElementById('copy-pattern-btn').addEventListener('click', () => {
            navigator.clipboard.writeText(patternBox.innerText);
            alert('Regex copied!');
        });
    });
</script>






