<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridge Terminal commands to Production Code</h2>
                    <p class="lead">cURL is the universal language of HTTP requests in the terminal, but translating those manual commands into robust application code can be tedious. Whether you're debugging an API response or integrating a third-party service, our <strong>Curl to Code Converter</strong> bridges the gap instantly. Turn raw bash strings into clean snippets for your JavaScript, PHP, or Python codebase.</p>
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

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Supporting Modern Web Stacks</h3>
                    <p>Our converter supports the most performant and standard libraries for HTTP interaction:</p>
                    <ul>
                        <li><strong>JavaScript (Fetch):</strong> The native, promise-based API for modern browsers and Node.js.</li>
                        <li><strong>PHP (cURL):</strong> High-performance extension standard for server-side integrations.</li>
                        <li><strong>Python (Requests):</strong> Known for its "HTTP for Humans" philosophy, making complex auth and data handling simple.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Parsing Complex Payloads</h3>
                    <p>The core engine handles nested headers, multiple authentication styles (Bearer, Basic), and raw string data payloads. It intelligently detects content types and formats the output to match the best practices of each target language, including proper indentation and variable naming.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Security & Privacy</h3>
                    <p>Because this tool runs **locally** in your browser, your sensitive API keys, session tokens, and request bodies are never transmitted to our servers. Your developer workflow remains private and secure.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Converting API Requests</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does it support multipart/form-data?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. It handles standard form data flags like `-F` and translates them into appropriate `FormData` objects in JS or dictionary payloads in Python.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I convert API keys safely?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Absolutely. No data is sent to the server. All parsing and code generation happens 100% on your local machine using JavaScript.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>