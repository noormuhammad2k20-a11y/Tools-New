<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Condensing SQL Queries for Application Code</h2>
                    <p class="lead">Writing database queries in a formatted, multi-line structure is fantastic for code readability. However, when placing those queries into programming languages like Java, PHP, or Python, large multi-line strings can sometimes break linting rules or require excessive string concatenation blocks. Our <strong>SQL Minifier</strong> solves this instantly.</p>
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
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
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>