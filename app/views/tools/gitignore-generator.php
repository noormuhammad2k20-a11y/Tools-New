<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold">Select Templates</label>
                        <p class="small text-muted mb-3">Choose the technologies you're using for your project.</p>
                        
                        <div class="mb-4 d-flex flex-wrap gap-2">
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-node" value="Node">
                                <label class="form-check-label" for="git-node">Node.js</label>
                            </div>
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-php" value="PHP">
                                <label class="form-check-label" for="git-php">PHP</label>
                            </div>
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-python" value="Python">
                                <label class="form-check-label" for="git-python">Python</label>
                            </div>
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-windows" value="Windows">
                                <label class="form-check-label" for="git-windows">Windows</label>
                            </div>
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-macos" value="macOS">
                                <label class="form-check-label" for="git-macos">macOS</label>
                            </div>
                            <div class="form-check form-check-inline bg-white p-2 border rounded-pill px-3">
                                <input class="form-check-input" type="checkbox" id="git-vscode" value="VSCode">
                                <label class="form-check-label" for="git-vscode">VSCode</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button id="generate-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                Create .gitignore <i class="fa-solid fa-plus ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="pro-card shadow-none border bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">File Content</h5>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                        <div class="bg-light p-3 rounded-3" style="min-height: 300px; max-height: 500px; overflow-y: auto;">
                            <pre class="mb-0"><code id="git-output"># Generated .gitignore will appear here...</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script>
const GIT_TEMPLATES = {
    'Node': 'node_modules/\nnpm-debug.log\nyarn-error.log\n.env\n.env.local\ndist/',
    'PHP': 'vendor/\ncomposer.lock\n.env\n.env.local\n.phpunit.result.cache',
    'Python': '__pycache__/\n*.py[cod]\n*$py.class\n.env\nvenv/',
    'Windows': 'Thumbs.db\nehthumbs.db\nDesktop.ini\n$RECYCLE.BIN/',
    'macOS': '.DS_Store\n.AppleDouble\n.LSOverride\nIcon\r\n\n._*',
    'VSCode': '.vscode/\n.history/\n*.code-workspace\n.vscode-test/'
};

document.addEventListener('DOMContentLoaded', () => {
    const genBtn = document.getElementById('generate-btn');
    const output = document.getElementById('git-output');

    genBtn.addEventListener('click', () => {
        const selected = [];
        document.querySelectorAll('.form-check-input:checked').forEach(cb => {
            selected.push(cb.value);
        });

        if (selected.length === 0) return showToast('Select at least one template', 'error');

        let gitignore = '# Generated by Tools New\n\n';
        selected.forEach(key => {
            gitignore += `### ${key} ###\n${GIT_TEMPLATES[key]}\n\n`;
        });

        output.textContent = gitignore;
        showToast('.gitignore generated!');
    });
});

function copyResult() {
    const text = document.getElementById('git-output').textContent;
    if (text.includes('# Generated')) return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Copied to clipboard!');
    });
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>