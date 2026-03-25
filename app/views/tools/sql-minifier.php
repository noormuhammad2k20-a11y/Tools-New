

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Raw SQL Query</label>
                    </div>
                    <textarea id="input-sql" class="form-control border-2 rounded-4 p-4" rows="12" placeholder="SELECT * \nFROM users \nWHERE id = 1;"></textarea>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-sql').value = ''; document.getElementById('output-sql').value = ''; updateMetrics();"><i class="fa-solid fa-trash me-2"></i>Clear</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Single-Line Output</label>
                        <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm" onclick="copyResult()"><i class="fa-regular fa-copy me-2"></i>Copy String</button>
                    </div>
                    <textarea id="output-sql" class="form-control bg-light border-0 rounded-4 p-4" rows="12" readonly placeholder="SELECT * FROM users WHERE id = 1;" style="font-family: var(--font-mono);"></textarea>

                    <div class="d-flex justify-content-between align-items-center mt-3 p-3 bg-light rounded-3 border">
                        <div class="text-center">
                            <span id="saved-pct" class="fw-bold text-success fs-5">0% Size Reduction</span>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Condensing SQL Queries for Application Code</h2>
                    <p class="lead">Writing database queries in a formatted, multi-line structure is fantastic for code readability. However, when placing those queries into programming languages like Java, PHP, or Python, large multi-line strings can sometimes break linting rules or require excessive string concatenation blocks. Our <strong>SQL Minifier</strong> solves this instantly.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How SQL Minification Works</h3>
                    <p>The minification algorithm parses the raw query and executes several optimization routines:</p>
                    <ul>
                        <li><strong>Line Break Removal:</strong> Strips all carriage returns and newlines, collapsing the query onto a single horizontal axis.</li>
                        <li><strong>Comment Stripping:</strong> Safely removes standard inline comments (`-- comment`) and block comments (`/* comment */`) which cause execution fatal errors if pushed onto a single line without removal.</li>
                        <li><strong>Whitespace Collapsing:</strong> Reduces multiple sequential space characters into a single space, maintaining standard SQL spacing syntax.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">ORMs vs Raw Queries</h3>
                    <p>While Object-Relational Mappers (ORMs) handle query construction dynamically, many high-performance enterprise applications rely on highly tuned raw SQL queries for speed. Compacting these queries before inserting them into <code>PreparedStatements</code> or Javascript string literals prevents runtime spacing errors and keeps your application repository size down.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Safe Client-Side Parsing</h3>
                    <p>Your database queries map your proprietary schema design. It is highly unsafe to paste production queries into external APIs. Our Pro SQL Minifier operates completely locally in your browser leveraging RegEx engines, guaranteeing that your table architecture and table variables are never exposed to remote servers.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #0ea5e9, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15); border-color: #0ea5e9; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-sql');
    const output = document.getElementById('output-sql');
    const savedPct = document.getElementById('saved-pct');

    window.updateMetrics = () => {
        const inLen = input.value.length;
        const outLen = output.value.length;
        
        if (inLen > 0) {
            const pct = ((inLen - outLen) / inLen) * 100;
            savedPct.textContent = pct.toFixed(1) + '% Size Reduction';
        } else {
            savedPct.textContent = '0% Size Reduction';
        }
    }

    function minify() {
        let sql = input.value;
        if (!sql) {
            output.value = '';
            updateMetrics();
            return;
        }

        try {
            // Remove block comments /* ... */
            sql = sql.replace(/\/\*[\s\S]*?\*\//g, '');
            
            // Remove line comments -- ...
            sql = sql.replace(/--.*?\n/g, '\n');
            sql = sql.replace(/--.*?$/gm, '');

            // Replace new lines and tabs with spaces
            sql = sql.replace(/(\r\n|\n|\r|\t)/gm, " ");

            // Replace multiple spaces with a single space
            sql = sql.replace(/\s+/g, ' ');

            // Remove spaces around operators if safe (Optional, here we just trim around basic symbols but SQL needs spaces around AND/OR, so we stick to trimming outer bounds)
            output.value = sql.trim();
        } catch (e) {
            output.value = 'Error minifying SQL.';
        }
        
        updateMetrics();
    }

    input.addEventListener('input', minify);

    window.copyResult = () => {
        if (!output.value) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Minified SQL copied to clipboard!');
    };
});
</script>






