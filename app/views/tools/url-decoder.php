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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Encoded Input</label>
                        <select id="decode-mode" class="form-select form-select-sm w-auto border-2 shadow-sm rounded-pill px-3">
                            <option value="component">Decode All (decodeURIComponent)</option>
                            <option value="uri">Decode Structure (decodeURI)</option>
                        </select>
                    </div>
                    <textarea id="input-text" class="form-control border-2 rounded-4 p-4" rows="12" placeholder="Paste the encoded %20 URL string here..."></textarea>
                    
                    <div class="form-check form-switch mt-3 d-inline-block">
                        <input class="form-check-input" type="checkbox" id="plus-to-space" checked>
                        <label class="form-check-label small fw-bold text-muted" for="plus-to-space">Convert '+' to spaces</label>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-text').value = ''; document.getElementById('output-text').value = '';"><i class="fa-solid fa-trash me-2"></i>Clear</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Decoded Output</label>
                        <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm" onclick="copyResult()"><i class="fa-regular fa-copy me-2"></i>Copy All</button>
                    </div>
                    <textarea id="output-text" class="form-control bg-light border-0 rounded-4 p-4" rows="12" readonly placeholder="Your readable decoded text will appear here..." style="font-family: var(--font-mono);"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Making Sense of URL Decoding</h2>
                    <p class="lead">When data is transmitted over the internet via Uniform Resource Locators (URLs), special characters and spaces are often transformed into percent-encoded strings like <code>%20</code>. Our <strong>URL Decoder</strong> allows you to reverse this process, converting cryptic web addresses and API payloads back into readable plain text.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why URL Decoding is Necessary</h3>
                    <p>Developers, marketers, and security analysts frequently encounter encoded data in log files, database entries, and analytics dashboards. Interpreting a massive string of randomly encoded letters and numbers is nearly impossible for the human eye. By decoding URLs, you can clearly see:</p>
                    <ul>
                        <li><strong>Search queries:</strong> Identify exactly what users searched for on your platform (e.g., transforming <code>q=shoes%20and%20socks</code> into <code>q=shoes and socks</code>).</li>
                        <li><strong>Tracking parameters:</strong> Clean up UTM tags and affiliate IDs to ensure marketing campaigns are properly configured.</li>
                        <li><strong>API Payloads:</strong> Debug complex, multi-variable HTTP GET requests sent by client applications.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Advanced Customization</h3>
                    <p>Our tool supports multiple Javascript decoding standards. Utilizing <code>decodeURIComponent</code>, we ensure that every single percent-encoded character is aggressively parsed back to its original state. Alternatively, using <code>decodeURI</code> keeps structural URL markings intact. Additionally, we provide an automatic toggle to convert `+` signs into spaces, a common practice for <code>application/x-www-form-urlencoded</code> forms.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Guaranteed Client-Side Parsing</h3>
                    <p>Because URLs frequently contain sensitive authentication tokens or personally identifiable information (PII), we do not send any input data to our servers. Every byte of decoding is performed inside your local device's memory processor using native DOM APIs.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #1d4ed8, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(29, 78, 216, 0.15); border-color: #1d4ed8; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const mode = document.getElementById('decode-mode');
    const plusToSpace = document.getElementById('plus-to-space');

    function decode() {
        let val = input.value;
        if (!val) {
            output.value = '';
            return;
        }

        if (plusToSpace.checked) {
            val = val.replace(/\+/g, ' ');
        }

        try {
            if (mode.value === 'component') {
                output.value = decodeURIComponent(val);
            } else {
                output.value = decodeURI(val);
            }
        } catch (e) {
            output.value = 'Malformed URI: The input contains invalid percent-encoding.';
        }
    }

    input.addEventListener('input', decode);
    mode.addEventListener('change', decode);
    plusToSpace.addEventListener('change', decode);

    window.copyResult = () => {
        if (!output.value || output.value.startsWith('Malformed URI')) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Decoded text copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>