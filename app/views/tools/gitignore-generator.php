

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






