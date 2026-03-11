<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold small text-uppercase tracking-wider text-muted">Raw SQL Query</label>
                <div id="editor-container" style="height: 300px; border: 2px solid #e2e8f0; border-radius: 12px; overflow: hidden;"></div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <label class="form-label small fw-bold">SQL Dialect</label>
                    <select id="sql-dialect" class="form-select border-2">
                        <option value="sql">Standard SQL</option>
                        <option value="mysql">MySQL</option>
                        <option value="postgresql">PostgreSQL</option>
                        <option value="sqlite">SQLite</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold">Indentation</label>
                    <select id="sql-indent" class="form-select border-2">
                        <option value="2">2 Spaces</option>
                        <option value="4" selected>4 Spaces</option>
                        <option value="\t">Tabs</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end gap-2">
                    <button id="format-btn" class="btn btn-primary btn-lg flex-grow-1 rounded-pill shadow">Format Query <i class="fa-solid fa-wand-sparkles ms-2"></i></button>
                    <button id="clear-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Reset</button>
                </div>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top d-none">
                <div class="mb-4 animate-fade-in">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-success small text-uppercase">Formatted Result</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-success" onclick="copyFormatted()">Copy All</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="downloadSQL()">Download .sql</button>
                        </div>
                    </div>
                    <div id="output-editor" style="height: 350px; border: 2px solid #e2e8f0; border-radius: 12px; overflow: hidden;"></div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering SQL Readability with Pro Formatting</h2>
                    <p class="lead">Writing complex SQL queries is hard enough—reading them shouldn't be. Our Pro SQL Formatter is designed to transform messy, single-line database queries into clean, structured, and easy-to-understand code that follows industry best practices.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Query Formatting Matters</h3>
                    <p>Messy SQL is the leading cause of production errors and slow code reviews. By using a consistent formatting standard, you benefit from:</p>
                    <ul>
                        <li><strong>Faster Debugging:</strong> Quickly identify logical errors in JOINs and WHERE clauses.</li>
                        <li><strong>Better Collaboration:</strong> Make your queries understandable for your team members and DBAs.</li>
                        <li><strong>Performance Audits:</strong> Visualizing the query structure makes it easier to spot missing indexes or redundant subqueries.</li>
                        <li><strong>Standard Compliance:</strong> Ensure your SQL adheres to dialect-specific conventions for MySQL, Postgres, and more.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Dialect-Specific Intelligent Indentation</h3>
                    <p>Not all SQL is created equal. Our tool intelligently adjusts its formatting logic based on the selected dialect. Whether you're working with MySQL's backticks, PostgreSQL's strict type casting, or SQLite's lightweight syntax, our engine ensures that keywords are capitalized, clauses are properly indented, and logical operators are aligned for maximum clarity.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Premium Editor Experience</h3>
                    <p>We've integrated a high-performance code editor with full syntax highlighting. This allows you to edit your queries in real-time with line numbering and brackets matching. The entire process happens in your browser, meaning your proprietary database schemas and sensitive query logic are never uploaded to a server.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs/loader.min.js"></script>
<script src="https://unpkg.com/sql-formatter@12.2.4/dist/sql-formatter.min.js"></script>
<script>
require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs' }});

require(['vs/editor/editor.main'], function() {
    const inputEditor = monaco.editor.create(document.getElementById('editor-container'), {
        value: 'SELECT u.id, u.username, p.title FROM users u LEFT JOIN posts p ON u.id = p.author_id WHERE u.active = 1 AND p.status = \'published\' ORDER BY p.created_at DESC LIMIT 10;',
        language: 'sql',
        theme: 'vs-light',
        automaticLayout: true,
        minimap: { enabled: false },
        fontSize: 14,
        padding: { top: 15 }
    });

    let outputEditor = null;

    const formatBtn = document.getElementById('format-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const dialectSelect = document.getElementById('sql-dialect');
    const indentSelect = document.getElementById('sql-indent');

    formatBtn.addEventListener('click', () => {
        const sql = inputEditor.getValue().trim();
        if (!sql) return showToast('Please enter a SQL query', 'error');

        try {
            const formatted = sqlFormatter.format(sql, {
                language: dialectSelect.value,
                indent: indentSelect.value === '\\t' ? '\t' : ' '.repeat(parseInt(indentSelect.value)),
                uppercase: true
            });

            wrapper.classList.remove('d-none');
            
            if (!outputEditor) {
                outputEditor = monaco.editor.create(document.getElementById('output-editor'), {
                    value: formatted,
                    language: 'sql',
                    theme: 'vs-light',
                    readOnly: true,
                    automaticLayout: true,
                    minimap: { enabled: false },
                    fontSize: 14,
                    padding: { top: 15 }
                });
            } else {
                outputEditor.setValue(formatted);
            }

            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (err) {
            showToast('Formatting error: ' + err.message, 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        inputEditor.setValue('');
        wrapper.classList.add('d-none');
    });

    window.copyFormatted = () => {
        if (!outputEditor) return;
        const val = outputEditor.getValue();
        const temp = document.createElement('textarea');
        temp.value = val;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('SQL copied!');
    };

    window.downloadSQL = () => {
        if (!outputEditor) return;
        const val = outputEditor.getValue();
        const blob = new Blob([val], { type: 'text/sql' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `query-${new Date().getTime()}.sql`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>