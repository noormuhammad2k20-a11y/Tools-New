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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Plain Text Input</label>
                        <select id="encode-mode" class="form-select form-select-sm w-auto border-2 shadow-sm rounded-pill px-3">
                            <option value="component">Escape All (encodeURIComponent)</option>
                            <option value="uri">Keep Structure (encodeURI)</option>
                        </select>
                    </div>
                    <textarea id="input-text" class="form-control border-2 rounded-4 p-4" rows="12" placeholder="Paste the text or URL you want to encode here..."></textarea>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-text').value = ''; document.getElementById('output-text').value = '';"><i class="fa-solid fa-trash me-2"></i>Clear</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Encoded Output</label>
                        <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm" onclick="copyResult()"><i class="fa-regular fa-copy me-2"></i>Copy All</button>
                    </div>
                    <textarea id="output-text" class="form-control bg-light border-0 rounded-4 p-4" rows="12" readonly placeholder="Your encoded URL will appear here..." style="font-family: var(--font-mono);"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering URL Encoding (Percent-Encoding)</h2>
                    <p class="lead">In the architecture of the World Wide Web, Uniform Resource Locators (URLs) are strictly limited to a specific subset of ASCII characters. If you need to transmit data containing spaces, accented letters, or reserved symbols (like <code>&</code>, <code>=</code>, or <code>?</code>), you must use a mechanism known as <strong>URL Encoding</strong> or percent-encoding.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How URL Encoding Works</h3>
                    <p>URL Encoding works by replacing unsafe ASCII characters with a <code>%</code> followed by two hexadecimal digits that represent the ASCII value of the character. For instance:</p>
                    <ul>
                        <li>A space ( ) becomes <code>%20</code> (or sometimes a <code>+</code> depending on the context).</li>
                        <li>An ampersand (<code>&</code>) becomes <code>%26</code>.</li>
                        <li>An equals sign (<code>=</code>) becomes <code>%3D</code>.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">encodeURI vs encodeURIComponent</h3>
                    <p>Our Pro tool offers two distinct encoding modes tailored to developer needs:</p>
                    <ul>
                        <li><strong>Keep Structure (encodeURI):</strong> Use this when you are encoding an entire, working URL. It leaves characters like <code>: / ? # & =</code> untouched so the URL still functions as a valid address.</li>
                        <li><strong>Escape All (encodeURIComponent):</strong> Use this when you are encoding a <em>piece</em> of data that will be inserted <em>into</em> a URL parameter. It aggressively encodes almost everything, ensuring that data characters don't accidentally get interpreted as URL structure characters.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Client-Side Privacy</h3>
                    <p>Whether you are encoding sensitive API keys, OAuth state strings, or proprietary database query parameters, security is paramount. Our URL Encoder processes all text entirely within your local browser. No keystrokes or data strings are ever sent over the network to our servers, ensuring your sensitive development data remains private.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #14b8a6, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.15); border-color: #14b8a6; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const mode = document.getElementById('encode-mode');

    function encode() {
        const val = input.value;
        if (!val) {
            output.value = '';
            return;
        }

        try {
            if (mode.value === 'component') {
                output.value = encodeURIComponent(val);
            } else {
                output.value = encodeURI(val);
            }
        } catch (e) {
            output.value = 'Error encoding data: ' + e.message;
        }
    }

    input.addEventListener('input', encode);
    mode.addEventListener('change', encode);

    window.copyResult = () => {
        if (!output.value) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Encoded URL copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>