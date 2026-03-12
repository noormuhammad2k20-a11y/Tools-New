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
                        <label class="form-label fw-bold">Source JSON</label>
                        <textarea id="json-input" class="form-control font-monospace" rows="15" placeholder='{"server": "prod", "ports": [80, 443]}...' style="background: #f8fafc;"></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button id="convert-btn" class="btn btn-primary px-5 rounded-pill shadow">Convert to YAML <i class="fa-solid fa-arrow-right ms-2"></i></button>
                        <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">YAML Output</label>
                        <textarea id="yaml-output" class="form-control font-monospace bg-dark text-warning border-0" rows="15" readonly></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark rounded-pill px-4" onclick="copyResult()">Copy YAML</button>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridging Data Formats: JSON to YAML</h2>
                    <p class="lead">Data interchange formats are the foundation of interoperability. While JSON is preferred for API communication due to its strict structure, YAML (YAML Ain't Markup Language) is the preferred choice for configuration files (like Docker, Kubernetes, and CI/CD pipelines) because of its human-centric readability. Our <strong>JSON to YAML Converter</strong> makes the bridge between these two seamless.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Convert JSON to YAML?</h3>
                    <p>The primary advantage of YAML over JSON is its simplicity for human editing. YAML eliminates the need for curly braces, brackets, and excessive quotes, using indentation to define hierarchy. Converting a complex JSON configuration into YAML often results in a file that is significantly shorter and much easier to maintain.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Key Features of our Converter</h3>
                    <ul>
                        <li><strong>Recursive Mapping:</strong> Deeply nested JSON objects and arrays are correctly mapped to their YAML equivalent indentation levels.</li>
                        <li><strong>Type Awareness:</strong> Boolean values, nulls, and numeric types are preserved across formats.</li>
                        <li><strong>Instant Validation:</strong> Our tool verifies your JSON syntax before attempting conversion, preventing errors.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Developer Privacy Focus</h3>
                    <p>Configuration files often contain secrets or sensitive architecture details. By performing the conversion entirely on the client side using JavaScript, we ensure that your structural data never leaves your browser. This makes our tool safe for enterprise use where data residency and security are paramount.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #4f46e5, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#yaml-output { color: #facc15 !important; font-size: 13px; line-height: 1.6; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/4.1.0/js-yaml.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('json-input');
    const output = document.getElementById('yaml-output');
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
            const parsed = JSON.parse(val);
            const yaml = jsyaml.dump(parsed, {
                indent: 2,
                lineWidth: -1,
                noRefs: true
            });
            output.value = yaml;
            statusMsg.classList.add('d-none');
        } catch (e) {
            updateStatus('Invalid JSON: ' + e.message, 'danger');
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
        showToast('YAML copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>