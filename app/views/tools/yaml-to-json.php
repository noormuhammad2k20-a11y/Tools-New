<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Source YAML</label>
                        <textarea id="yaml-input" class="form-control font-monospace" rows="15" placeholder="api:&#10;  version: 1.0&#10;  endpoints:&#10;    - /users&#10;    - /posts" style="background: #fdf4ff;"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button id="convert-btn" class="btn btn-primary px-5 rounded-pill shadow">Convert to JSON <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">JSON Output</label>
                        <textarea id="json-output" class="form-control font-monospace bg-dark text-info border-0" rows="15" readonly></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark rounded-pill px-4" onclick="copyResult()">Copy JSON</button>
                    </div>
                </div>
            </div>
            <div id="status-msg" class="alert d-none mt-3"></div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Transforming YAML into Actionable JSON</h2>
                    <p class="lead">YAML is excellent for configuration, but most software systems and APIs communicate exclusively in JSON. Our <strong>YAML to JSON Converter</strong> provides a reliable, high-speed way to translate your configuration files into standard data structures ready for integration.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Power of Structural Translation</h3>
                    <p>Converting YAML to JSON isn't just about changing syntax; it's about preparing data for programmatic use. JavaScript, Python, and Go all have native support for JSON, making this conversion essential when you need to ingest a configuration file into a live application environment.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Pro Features for Developers</h3>
                    <ul>
                        <li><strong>Safe Loading:</strong> We use strict YAML loading standards to ensure that no malicious code can be executed during the conversion process.</li>
                        <li><strong>Nested Array Support:</strong> Complex YAML sequences and mappings are automatically flattened into standard JSON arrays and objects.</li>
                        <li><strong>Error Reporting:</strong> If your YAML has indentation errors (the most common issue), our tool provides detailed feedback to help you fix it.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">When to Use YAML to JSON</h3>
                    <p>Developers frequently use this tool when testing Kubernetes manifests, debugging CI/CD pipeline variables, or converting legacy configuration files into modern database seeds. It is a critical utility for any DevOps engineer or full-stack developer working with cloud-native infrastructure.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">100% Client-Side Logic</h3>
                    <p>Security is baked into our design. No data is sent to our servers. All parsing and conversion are handled by your browser's V8 engine using the world-class <code>js-yaml</code> library. Your configurations remain private, and your workflow remains fast.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #a21caf, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#json-output { color: #22d3ee !important; font-size: 13px; line-height: 1.6; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/4.1.0/js-yaml.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('yaml-input');
    const output = document.getElementById('json-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const statusMsg = document.getElementById('status-msg');

    function updateStatus(msg, type = 'danger') {
        statusMsg.textContent = msg;
        statusMsg.className = `alert alert-${type} mt-3 animate-fade-in`;
        statusMsg.classList.remove('d-none');
    }

    convertBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;
        
        try {
            const parsed = jsyaml.load(val);
            output.value = JSON.stringify(parsed, null, 4);
            statusMsg.classList.add('d-none');
        } catch (e) {
            updateStatus('Invalid YAML: ' + e.message, 'danger');
            output.value = '';
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        statusMsg.classList.add('d-none');
    });

    window.copyResult = () => {
        if(!output.value) return;
        output.select();
        document.execCommand('copy');
        showToast('JSON copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>