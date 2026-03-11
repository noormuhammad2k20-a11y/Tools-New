<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold small text-uppercase tracking-wider text-muted">YAML Source Code</label>
                    <button class="btn btn-sm btn-outline-secondary" onclick="loadSample()">Load Sample</button>
                </div>
                <!-- Monaco Editor container instead of textarea for Pro feel -->
                <div id="editor-container" style="height: 400px; border: 2px solid #e2e8f0; border-radius: 12px; overflow: hidden;"></div>
            </div>

            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="validate-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Validate YAML <i class="fa-solid fa-check ms-2"></i></button>
                <button id="clear-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Clear Editor</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top d-none">
                <div id="valid-alert" class="alert alert-success d-flex align-items-center border-success d-none shadow-sm rounded-3">
                    <i class="fa-solid fa-circle-check fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-0">Valid YAML Structure</h6>
                        <small>Your configuration is perfectly formatted and syntax-error free.</small>
                    </div>
                </div>

                <div id="error-alert" class="alert alert-danger d-flex align-items-start border-danger d-none shadow-sm rounded-3">
                    <i class="fa-solid fa-circle-exclamation fs-4 me-3 mt-1"></i>
                    <div class="w-100">
                        <h6 class="fw-bold mb-1">Validation Error Detected</h6>
                        <pre id="error-message" class="mb-0 small bg-white p-2 border border-danger rounded text-danger" style="white-space: pre-wrap;"></pre>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Ensuring Flawless YAML Configurations</h2>
                    <p class="lead">YAML (YAML Ain't Markup Language) is a human-readable data-serialization language commonly used for configuration files in modern tech stacks like Docker, Kubernetes, Ansible, and GitHub Actions. Because YAML relies heavily on exact indentation and spacing to dictate structure, it is notoriously easy to introduce syntax errors that crash deployment pipelines. Our <strong>Pro YAML Validator</strong> instantly catches these mistakes.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common YAML Pitfalls</h3>
                    <ul>
                        <li><strong>Tab Characters:</strong> YAML strictly forbids the use of tabs for indentation. Mixing spaces and tabs will instantly invalidate the schema.</li>
                        <li><strong>Incorrect Indentation Levels:</strong> Sibling nodes must be aligned exactly. A single extra space can change an attribute into a child element.</li>
                        <li><strong>Missing Colons & Quotes:</strong> Failing to add a space after a colon, or improperly escaping strings with special characters, breaks the parser.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Intelligent Validation & Parsing</h3>
                    <p>We leverage industry-standard YAML parsing libraries to evaluate your code line-by-line. When an error is detected, the validator acts as a linter—providing the exact line number, column, and description of the trace error so you can fix it immediately within the high-performance integrated code editor.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">100% Local Validation for Security</h3>
                    <p>Configuration files frequently contain environment variables, secure connection strings, and infrastructure architecture schematics. Our Pro validator processes the parsing tree entirely inside your local browser instance. Your proprietary <code>docker-compose.yml</code> files or AWS deployment manifests are completely secure and never leave your machine.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #eab308, #84cc16); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs/loader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/4.1.0/js-yaml.min.js"></script>
<script>
require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.36.1/min/vs' }});
require(['vs/editor/editor.main'], function() {
    
    const editor = monaco.editor.create(document.getElementById('editor-container'), {
        value: '',
        language: 'yaml',
        theme: 'vs-light',
        automaticLayout: true,
        minimap: { enabled: false },
        fontSize: 14,
        padding: { top: 15 }
    });

    const validateBtn = document.getElementById('validate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const validAlert = document.getElementById('valid-alert');
    const errorAlert = document.getElementById('error-alert');
    const errorMsg = document.getElementById('error-message');

    validateBtn.addEventListener('click', () => {
        const yamlString = editor.getValue();
        wrapper.classList.remove('d-none');

        if (!yamlString.trim()) {
            validAlert.classList.add('d-none');
            errorAlert.classList.remove('d-none');
            errorMsg.textContent = "Please enter YAML code to validate.";
            return;
        }

        try {
            // Attempt to load all documents in the YAML string
            jsyaml.loadAll(yamlString);
            
            // If successful
            errorAlert.classList.add('d-none');
            validAlert.classList.remove('d-none');
            showToast('Valid YAML format!', 'success');
        } catch (e) {
            // If failure
            validAlert.classList.add('d-none');
            errorAlert.classList.remove('d-none');
            // js-yaml provides structured error messages
            errorMsg.textContent = e.message;
            showToast('Syntax Error Detected', 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        editor.setValue('');
        wrapper.classList.add('d-none');
    });

    window.loadSample = () => {
        editor.setValue(`server:
  port: 8080
  host: "0.0.0.0"
database:
  username: admin
  password: "secure_password123"
  retries: 3
  active: true`);
        wrapper.classList.add('d-none');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>