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
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Paste cURL Command</label>
                        <textarea id="curl-input" class="form-control" rows="12" placeholder="curl https://api.example.com/v1 -X POST -H 'Content-Type: json' -d '{\"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Output Language</label>
                        <select id="lang-select" class="form-select">
                            <option value="javascript">JavaScript (Fetch)</option>
                            <option value="python">Python (Requests)</option>
                            <option value="php">PHP (Guzzle/cURL)</option>
                            <option value="go">Go (Native)</option>
                        </select>
                    </div>

                    <div class="d-grid mt-4">
                        <button id="convert-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                            Convert Code <i class="fa-solid fa-code ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">Source Code Output</label>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                        <div id="code-output-container" class="bg-dark p-3 rounded-3" style="height: 400px; overflow: auto;">
                            <pre class="mb-0 text-white"><code id="code-output" class="language-javascript">// Converted code will appear here...</code></pre>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-go.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const curlInput = document.getElementById('curl-input');
    const langSelect = document.getElementById('lang-select');
    const convertBtn = document.getElementById('convert-btn');
    const codeOutput = document.getElementById('code-output');

    convertBtn.addEventListener('click', () => {
        const curl = curlInput.value.trim();
        const lang = langSelect.value;
        if (!curl) return showToast('Please enter cURL command', 'error');

        // Simple heuristic parser (A real implementation would use a proper parser library)
        const result = convertCurl(curl, lang);
        
        codeOutput.className = `language-${lang}`;
        codeOutput.textContent = result;
        Prism.highlightElement(codeOutput);
        showToast('Code Converted!');
    });
});

function convertCurl(curl, lang) {
    if (!curl.toLowerCase().startsWith('curl')) return '// Error: Command must start with "curl"';
    
    // Placeholder logic for demonstration - a real tool would use a library like curlconverter-js
    const urlMatch = curl.match(/https?:\/\/[^\s'"]+/);
    const url = urlMatch ? urlMatch[0] : 'https://api.example.com';
    const method = curl.includes('-X POST') ? 'POST' : 'GET';

    switch(lang) {
        case 'javascript':
            return `fetch("${url}", {\n  method: "${method}",\n  headers: {\n    "Content-Type": "application/json"\n  }\n})\n.then(res => res.json())\n.then(console.log);`;
        case 'python':
            return `import requests\n\nurl = "${url}"\nresponse = requests.${method.toLowerCase()}(url)\nprint(response.json())`;
        case 'php':
            return `<?php\n\n$ch = curl_init();\ncurl_setopt($ch, CURLOPT_URL, "${url}");\ncurl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\ncurl_setopt($ch, CURLOPT_CUSTOMREQUEST, "${method}");\n\n$response = curl_exec($ch);\ncurl_close($ch);\necho $response;`;
        case 'go':
            return `package main\n\nimport (\n  "fmt"\n  "net/http"\n)\n\nfunc main() {\n  resp, _ := http.${method === 'GET' ? 'Get' : 'Post'}("${url}", "", nil)\n  fmt.Println(resp.Status)\n}`;
        default:
            return '// Language not supported yet';
    }
}

function copyResult() {
    const code = document.getElementById('code-output').textContent;
    if (code.includes('// Converted')) return;
    navigator.clipboard.writeText(code).then(() => {
        showToast('Copied to clipboard!');
    });
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>