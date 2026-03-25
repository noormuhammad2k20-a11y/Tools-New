

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <!-- Hero Section -->
        

        <div class="row g-4">
            <!-- Left: cURL Input -->
            <div class="col-lg-5">
                <div class="pro-card shadow-lg border-0 rounded-4 p-4 h-100">
                    <h5 class="fw-bold mb-3 text-uppercase small tracking-widest text-primary">cURL Command</h5>
                    <textarea id="curl-input" class="form-control font-monospace mb-4" rows="12" placeholder="curl -X POST 'https://api.example.com/v1/data' -H 'Content-Type: application/json' -d '{\" key style="font-size: 13px;"></textarea>
                    
                    <button id="convert-btn" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold shadow">
                        Generate Code <i class="fa-solid fa-sync ms-2"></i>
                    </button>
                    <button class="btn btn-link text-muted w-100 mt-2 text-decoration-none small" onclick="clearAll()">Reset Tool</button>
                </div>
            </div>

            <!-- Right: Code Output -->
            <div class="col-lg-7">
                <div class="pro-card shadow-lg border-0 rounded-4 p-4" id="result-wrapper" style="display: none;">
                    <ul class="nav nav-pills mb-3 gap-2" id="codeTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#js-tab">JavaScript</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#php-tab">PHP</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link rounded-pill px-4" data-bs-toggle="pill" data-bs-target="#py-tab">Python</button>
                        </li>
                    </ul>

                    <div class="tab-content border-top pt-3">
                        <div class="tab-pane fade show active" id="js-tab">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-soft-primary text-primary">Fetch API</span>
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyCode('js-code')">Copy JS</button>
                            </div>
                            <div class="bg-dark rounded-4 p-3 shadow-inner">
                                <pre><code id="js-code" class="text-light small" style="font-family: 'Fira Code', monospace; line-height: 1.5; white-space: pre-wrap;"></code></pre>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="php-tab">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-soft-primary text-primary">cURL Extension</span>
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyCode('php-code')">Copy PHP</button>
                            </div>
                            <div class="bg-dark rounded-4 p-3 shadow-inner">
                                <pre><code id="php-code" class="text-light small" style="font-family: 'Fira Code', monospace; line-height: 1.5; white-space: pre-wrap;"></code></pre>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="py-tab">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-soft-primary text-primary">Requests Library</span>
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyCode('py-code')">Copy Python</button>
                            </div>
                            <div class="bg-dark rounded-4 p-3 shadow-inner">
                                <pre><code id="py-code" class="text-light small" style="font-family: 'Fira Code', monospace; line-height: 1.5; white-space: pre-wrap;"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridge Terminal commands to Production Code</h2>
                    <p class="lead">cURL is the universal language of HTTP requests in the terminal, but translating those manual commands into robust application code can be tedious. Whether you're debugging an API response or integrating a third-party service, our <strong>Curl to Code Converter</strong> bridges the gap instantly. Turn raw bash strings into clean snippets for your JavaScript, PHP, or Python codebase.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I convert API keys safely?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Absolutely. No data is sent to the server. All parsing and code generation happens 100% on your local machine using JavaScript.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Curl to Code Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "JavaScript Fetch conversion",
    "PHP cURL code generation",
    "Python Requests support",
    "Header & Header parsing",
    "Local secure execution"
  ]
}
</script>
<style>
.text-gradient-primary { background: linear-gradient(45deg, #0f172a, #334155); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.bg-soft-primary { background: rgba(15, 23, 42, 0.05); }
#code-output code { font-family: 'Fira Code', 'Courier New', monospace; }
pre { margin-bottom: 0; }
.tab-content { min-height: 350px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const curlInput = document.getElementById('curl-input');
    const convertBtn = document.getElementById('convert-btn');
    const wrapper = document.getElementById('result-wrapper');

    function parseCurl(curl) {
        const result = {
            url: '',
            method: 'GET',
            headers: {},
            data: ''
        };

        // Normalize string
        curl = curl.trim().replace(/\\\n/g, ' ');

        // Extract URL (usually the first string that looks like one)
        const urlMatch = curl.match(/(?:https?|ftp):\/\/[^\'\" ]+/);
        if (urlMatch) result.url = urlMatch[0];

        // Extract Method
        const methodMatch = curl.match(/-X\s+([A-Z]+)/i);
        if (methodMatch) result.method = methodMatch[1].toUpperCase();

        // Extract Headers
        const headerMatches = curl.matchAll(/-H\s+['"]([^'"]+)['"]/g);
        for (const match of headerMatches) {
            const parts = match[1].split(':');
            if (parts.length >= 2) {
                result.headers[parts[0].trim()] = parts.slice(1).join(':').trim();
            }
        }

        // Extract Data
        const dataMatch = curl.match(/-d\s+['"]([^'"]+)['"]/);
        if (dataMatch) {
            result.data = dataMatch[1];
            if (result.method === 'GET') result.method = 'POST';
        }

        return result;
    }

    function generateJS(parsed) {
        let code = `fetch('${parsed.url}', {\n`;
        code += `  method: '${parsed.method}',\n`;
        
        if (Object.keys(parsed.headers).length > 0) {
            code += `  headers: {\n`;
            for (const [k, v] of Object.entries(parsed.headers)) {
                code += `    '${k}': '${v}',\n`;
            }
            code += `  },\n`;
        }

        if (parsed.data) {
            code += `  body: JSON.stringify(${parsed.data})\n`;
        }
        
        code += `})\n.then(response => response.json())\n.then(data => console.log(data))\n.catch(error => console.error('Error:', error));`;
        return code;
    }

    function generatePHP(parsed) {
        let code = `<?php\n\n$ch = curl_init();\n\n`;
        code += `curl_setopt($ch, CURLOPT_URL, '${parsed.url}');\n`;
        code += `curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\n`;
        code += `curl_setopt($ch, CURLOPT_CUSTOMREQUEST, '${parsed.method}');\n`;

        if (Object.keys(parsed.headers).length > 0) {
            code += `curl_setopt($ch, CURLOPT_HTTPHEADER, [\n`;
            for (const [k, v] of Object.entries(parsed.headers)) {
                code += `    '${k}: ${v}',\n`;
            }
            code += `]);\n`;
        }

        if (parsed.data) {
            code += `curl_setopt($ch, CURLOPT_POSTFIELDS, '${parsed.data}');\n`;
        }

        code += `\n$response = curl_exec($ch);\n\nif(curl_errno($ch)) {\n    echo 'Curl error: ' . curl_error($ch);\n}\n\ncurl_close($ch);\nvar_dump($response);`;
        return code;
    }

    function generatePython(parsed) {
        let code = `import requests\nimport json\n\nurl = '${parsed.url}'\n\n`;
        
        const headers = JSON.stringify(parsed.headers, null, 4);
        code += `headers = ${headers}\n\n`;

        if (parsed.data) {
            code += `payload = ${parsed.data}\n\n`;
            code += `response = requests.request('${parsed.method}', url, headers=headers, data=payload)\n\n`;
        } else {
            code += `response = requests.request('${parsed.method}', url, headers=headers)\n\n`;
        }

        code += `print(response.text)`;
        return code;
    }

    convertBtn.addEventListener('click', () => {
        const val = curlInput.value.trim();
        if(!val) return;

        const parsed = parseCurl(val);
        
        document.getElementById('js-code').textContent = generateJS(parsed);
        document.getElementById('php-code').textContent = generatePHP(parsed);
        document.getElementById('py-code').textContent = generatePython(parsed);

        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    window.clearAll = () => {
        curlInput.value = '';
        wrapper.style.display = 'none';
        curlInput.focus();
    };

    window.copyCode = (id) => {
        const text = document.getElementById(id).textContent;
        const dummy = document.createElement('textarea');
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        showToast('Snippet copied to clipboard!');
    };
});
</script>






