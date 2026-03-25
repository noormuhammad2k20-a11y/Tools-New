

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-database fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Describe your query</label>
                    <textarea id="request-input" class="form-control" rows="4" placeholder="e.g. Find the top 5 customers with most orders from last year..."></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-bold small text-uppercase">Database Type</label>
                        <select id="db-select" class="form-select rounded-pill px-3">
                            <option value="mysql">MySQL</option>
                            <option value="pg">PostgreSQL</option>
                            <option value="sqlserver">SQL Server</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate SQL <i class="fa-solid fa-code ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-3" role="status"></div>
                <h5 class="fw-bold">Building Query Schema...</h5>
                <p class="text-muted small">Converting natural language to structured database commands.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Generated SQL Query</h5>
                    <button id="copy-btn" class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm">Copy SQL</button>
                </div>
                <div class="position-relative">
                    <pre id="sql-result" class="p-4 bg-dark text-white border-0 rounded-4 font-monospace h6 lh-lg mb-0 shadow-lg" style="overflow-x: auto;"></pre>
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
        const requestInput = document.getElementById('request-input');
        const dbSelect = document.getElementById('db-select');
        const resultWrapper = document.getElementById('result-wrapper');
        const resultBox = document.getElementById('sql-result');

        btn.addEventListener('click', async () => {
            const request = requestInput.value.trim();
            if(!request) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const sql = AITools.generateSql(request);
                resultBox.innerText = sql;
                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 900);
        });

        document.getElementById('copy-btn').addEventListener('click', () => {
            navigator.clipboard.writeText(resultBox.innerText);
            alert('SQL Copied!');
        });
    });
</script>






