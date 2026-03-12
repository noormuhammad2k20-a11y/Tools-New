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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Plain Text Data</label>
                        <a href="javascript:void(0)" onclick="loadSample()" class="small text-decoration-none">Load Sample</a>
                    </div>
                    <textarea id="input-text" class="form-control border-2 rounded-4 p-4" rows="12" placeholder="Paste your plain text, XML, JSON, or raw data here..."></textarea>
                    
                    <div class="mt-3">
                        <div class="form-check form-switch d-inline-block me-3">
                            <input class="form-check-input" type="checkbox" id="safe-url">
                            <label class="form-check-label small fw-bold text-muted" for="safe-url">URL-Safe Variant (-_ instead of +/)</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-text').value = ''; document.getElementById('output-text').value = '';"><i class="fa-solid fa-trash me-2"></i>Clear Data</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Base64 Representation</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyResult()">Copy Text</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <textarea id="output-text" class="form-control bg-light border-0 rounded-4 p-4" rows="12" readonly placeholder="Your Base64 encoded string will appear here..." style="font-family: var(--font-mono);"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Why Base64 Encoding is Essential</h2>
                    <p class="lead">Base64 is a binary-to-text encoding scheme that represents binary data in an ASCII string format. It translates data into a radix-64 representation. Our <strong>Base64 Encoder</strong> converts standard text into this web-safe format instantly, heavily utilized across email processing, code embedding, and data encapsulation.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Key Development Use Cases</h3>
                    <ul>
                        <li><strong>Data Embedding:</strong> Insert small images or fonts directly into CSS (Data URIs) to reduce the number of HTTP requests.</li>
                        <li><strong>Basic Authentication:</strong> As part of the HTTP protocol, credentials like username and password combinations are traditionally grouped with a colon and then encoded to Base64 before transiting header payloads.</li>
                        <li><strong>JSON Web Tokens (JWT):</strong> Although JWT uses Base64Url variants, Base64 is the foundational framework for building tokenized session states.</li>
                        <li><strong>XML & API Requests:</strong> When transferring raw binary files over XML-RPC or JSON endpoints, converting to Base64 ensures special characters don't corrupt the schema.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">URL-Safe Configuration Support</h3>
                    <p>Standard Base64 contains <code>+</code> and <code>/</code> tags which act as reserved operators within URL syntax trees. If you plan to send this encoded string inside a GET query parameter, you can toggle our "URL-Safe Variant." This replaces the problem signatures entirely, leveraging <code>-</code> and <code>_</code> instead for flawless web routing.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Guaranteed Client-Side Processing</h3>
                    <p>Unlike old server-side software, we ensure uncompromised privacy by executing the encoding exclusively in your browser session. Native bindings guarantee zero latency execution without logging a single trace of your string content.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #f59e0b, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15); border-color: #f59e0b; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const safeUrl = document.getElementById('safe-url');

    function utf8ToBase64(str) {
        return window.btoa(unescape(encodeURIComponent(str)));
    }

    function encode() {
        const val = input.value;
        if (!val) {
            output.value = '';
            return;
        }

        try {
            let b64 = utf8ToBase64(val);
            if (safeUrl.checked) {
                b64 = b64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
            }
            output.value = b64;
        } catch (e) {
            output.value = 'Application encoding error: ' + e.message;
        }
    }

    input.addEventListener('input', encode);
    safeUrl.addEventListener('change', encode);

    window.loadSample = () => {
        input.value = '{"id": 1, "name": "Base64 Encoder Pro", "description": "Highly secure web-safe encoding."}';
        encode();
    };

    window.copyResult = () => {
        if (!output.value) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Base64 string copied!');
    };

    window.downloadResult = () => {
        if (!output.value) return showToast('Nothing to download', 'error');
        const blob = new Blob([output.value], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `base64-encode-${new Date().getTime()}.txt`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>