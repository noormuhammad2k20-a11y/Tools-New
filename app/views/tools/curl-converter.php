

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






