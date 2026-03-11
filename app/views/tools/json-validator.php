<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Input JSON Data</label>
                <textarea id="json-input" class="form-control font-monospace" rows="12" placeholder="Paste your raw JSON here..."></textarea>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="validate-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Validate & Format <i class="fa-solid fa-spell-check ms-2"></i></button>
                <button id="minify-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Minify</button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="status-card" class="alert d-none mb-4 rounded-4 border-0">
                <div class="d-flex align-items-center gap-3">
                    <i id="status-icon" class="fa-solid fa-circle-info"></i>
                    <div>
                        <strong id="status-title"></strong>
                        <div id="status-message" class="small"></div>
                    </div>
                </div>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Formatted Results</label>
                    <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy Result</button>
                </div>
                <pre id="json-output" class="p-4 rounded-4 bg-dark text-light border-0 overflow-auto" style="max-height: 500px; font-size: 0.9rem;"></pre>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Importance of Clean JSON</h2>
                    <p class="lead">JSON (JavaScript Object Notation) is the backbone of modern web communication. Whether it's an API payload, a configuration file, or a database record, correctly formatted JSON is non-negotiable. Our <strong>JSON Validator</strong> is a professional-grade tool designed to find subtle syntax errors and turn messy blobs of data into human-readable structures.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Use a Dedicated Validator?</h3>
                    <p>Syntax errors like trailing commas, missing quotes, or mismatched brackets can crash your application. Our tool doesn't just check for "validity"—it provides clear error locations and helps you understand exactly where your JSON went wrong.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Key Features</h3>
                    <ul>
                        <li><strong>RFC 8259 Compliance:</strong> Validating against the latest industry standards for JSON structure.</li>
                        <li><strong>Auto-Formatting:</strong> Instantly indents and beautifies your JSON for better readability.</li>
                        <li><strong>One-Click Minification:</strong> Stripping all whitespace to reduce file size for production use.</li>
                        <li><strong>Detailed Error Reporting:</strong> Highlighting the specific line and character that caused the validation failure.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Privacy First Development</h3>
                    <p>JSON often contains sensitive API keys or user data. That's why our validator is <strong>100% client-side</strong>. Your data never leaves your browser, ensuring that your production secrets and configuration data remain strictly private.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#json-output { white-space: pre-wrap; word-wrap: break-word; }
.json-key { color: #818cf8; }
.json-string { color: #fbbf24; }
.json-number { color: #34d399; }
.json-boolean { color: #f472b6; }
.json-null { color: #94a3b8; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('json-input');
    const output = document.getElementById('json-output');
    const validateBtn = document.getElementById('validate-btn');
    const minifyBtn = document.getElementById('minify-btn');
    const clearBtn = document.getElementById('clear-btn');
    const statusCard = document.getElementById('status-card');
    const statusTitle = document.getElementById('status-title');
    const statusMessage = document.getElementById('status-message');
    const statusIcon = document.getElementById('status-icon');
    const wrapper = document.getElementById('result-wrapper');

    function updateStatus(valid, message) {
        statusCard.className = `alert mb-4 rounded-4 border-0 ${valid ? 'alert-success' : 'alert-danger'}`;
        statusTitle.textContent = valid ? 'Valid JSON' : 'Invalid JSON';
        statusMessage.textContent = message;
        statusIcon.className = `fa-solid ${valid ? 'fa-circle-check' : 'fa-circle-exclamation'}`;
        statusCard.classList.remove('d-none');
    }

    validateBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        try {
            const obj = JSON.parse(val);
            const formatted = JSON.stringify(obj, null, 4);
            output.textContent = formatted;
            wrapper.style.display = 'block';
            updateStatus(true, 'Your JSON is well-formed and valid.');
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            updateStatus(false, e.message);
            wrapper.style.display = 'none';
        }
    });

    minifyBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;
        try {
            const obj = JSON.parse(val);
            output.textContent = JSON.stringify(obj);
            wrapper.style.display = 'block';
            updateStatus(true, 'JSON compressed successfully.');
        } catch (e) {
            updateStatus(false, e.message);
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.textContent = '';
        wrapper.style.display = 'none';
        statusCard.classList.add('d-none');
        input.focus();
    });

    window.copyResult = () => {
        const textToCopy = output.textContent;
        const temp = document.createElement('textarea');
        temp.value = textToCopy;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('JSON copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>