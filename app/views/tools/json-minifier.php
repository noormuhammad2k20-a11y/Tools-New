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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Raw JSON Input</label>
                        <button class="btn btn-sm btn-outline-secondary" onclick="loadSample()">Sample</button>
                    </div>
                    <textarea id="input-json" class="form-control border-2 rounded-4 p-4" rows="14" placeholder="Paste your formatted JSON object here..." style="font-family: var(--font-mono);"></textarea>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-json').value = ''; document.getElementById('output-json').value = ''; updateMetrics();"><i class="fa-solid fa-trash me-2"></i>Clear</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Minified JSON</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyResult()">Copy JSON</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <textarea id="output-json" class="form-control bg-light border-0 rounded-4 p-4" rows="14" readonly placeholder="Your minified JSON will appear here..." style="font-family: var(--font-mono);"></textarea>

                    <div class="d-flex justify-content-between align-items-center mt-3 p-3 bg-light rounded-3 border">
                        <div class="text-center">
                            <strong class="d-block text-muted small">Original Size</strong>
                            <span id="orig-size" class="fw-bold">0 Bytes</span>
                        </div>
                        <div class="text-center">
                            <strong class="d-block text-muted small">Minified Size</strong>
                            <span id="min-size" class="fw-bold text-success">0 Bytes</span>
                        </div>
                        <div class="text-center">
                            <strong class="d-block text-muted small">Saved</strong>
                            <span id="saved-pct" class="fw-bold text-primary">0%</span>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Reducing JSON Payload Sizes</h2>
                    <p class="lead">JSON (JavaScript Object Notation) is the undisputed standard for data exchange across web APIs and microservices. Because human-readable JSON files contain significant amounts of indentation and line breaks, they use up unnecessary bandwidth. Our <strong>Pro JSON Minifier</strong> instantly strips these characters to create ultra-compact transmission strings.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Minify JSON for APIs?</h3>
                    <p>When engineering high-throughput API endpoints, minimizing the bytes transferred over the HTTP wire is crucial. A highly nested, formatted JSON document often consists of 30-40% pure whitespace characters (spaces, tabs, carriage returns).</p>
                    <ul>
                        <li><strong>Faster Response Times:</strong> Sending minified JSON payloads directly reduces physical transmission time across the network, reducing Time to First Byte (TTFB) on client applications.</li>
                        <li><strong>Lower Bandwidth Costs:</strong> Dropping your payload size by 30% on an API that serves millions of requests a day can have a massive impact on AWS egress billing.</li>
                        <li><strong>Client-Side Parsing:</strong> Most client-side languages (like JS `JSON.parse()`) execute parsing algorithms faster on single-line minified structures.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Guaranteed Safe Minification</h3>
                    <p>Instead of relying on fragile Regex replacements, our minifier utilizes the browser's native Javascript engine to strictly parse the data into an actual object tree, and then re-serializes it without any spacing arguments. This guarantees that strings containing legitimate newline characters (`\n`) within their values are perfectly preserved and not accidentally stripped.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Ultimate Security & Privacy</h3>
                    <p>JSON documents frequently house highly confidential information, ranging from user auth tokens to PII (Personally Identifiable Information). Our architecture guarantees 100% local execution. By parsing the data exclusively within your Chrome or Firefox JS ecosystem, we eliminate any risk of server-side data snooping or logging.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15); border-color: #2563eb; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-json');
    const output = document.getElementById('output-json');
    const origSize = document.getElementById('orig-size');
    const minSize = document.getElementById('min-size');
    const savedPct = document.getElementById('saved-pct');

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    window.updateMetrics = () => {
        const inBytes = new Blob([input.value]).size;
        const outBytes = new Blob([output.value]).size;
        
        origSize.textContent = formatBytes(inBytes);
        minSize.textContent = formatBytes(outBytes);

        if (inBytes > 0 && outBytes > 0 && outBytes <= inBytes) {
            const pct = ((inBytes - outBytes) / inBytes) * 100;
            savedPct.textContent = pct.toFixed(1) + '%';
        } else {
            savedPct.textContent = '0%';
        }
    }

    function minifyJSON() {
        const val = input.value;
        if (!val.trim()) {
            output.value = '';
            updateMetrics();
            return;
        }

        try {
            const parsed = JSON.parse(val);
            // Re-stringify with no space arguments
            output.value = JSON.stringify(parsed);
            output.classList.remove('text-danger');
        } catch (e) {
            output.value = 'Invalid JSON: ' + e.message;
            output.classList.add('text-danger');
        }
        
        updateMetrics();
    }

    input.addEventListener('input', minifyJSON);

    window.loadSample = () => {
        input.value = `{\n  "metadata": {\n    "version": "1.0",\n    "status": "active"\n  },\n  "users": [\n    {\n      "id": 1,\n      "name": "John Doe",\n      "email": "john@example.com"\n    },\n    {\n      "id": 2,\n      "name": "Jane Smith",\n      "email": "jane@example.com"\n    }\n  ]\n}`;
        minifyJSON();
    };

    window.copyResult = () => {
        if (!output.value || output.value.startsWith('Invalid JSON')) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Minified JSON copied!');
    };

    window.downloadResult = () => {
        if (!output.value || output.value.startsWith('Invalid JSON')) return showToast('Nothing to download', 'error');
        const blob = new Blob([output.value], { type: 'application/json' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `minified-${new Date().getTime()}.json`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>