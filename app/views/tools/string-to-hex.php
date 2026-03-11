<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold small text-uppercase tracking-wider text-muted">Plain Text Input</label>
                <textarea id="input-text" class="form-control font-monospace border-2 rounded-3 p-3 mt-1" rows="5" placeholder="Enter text to encode into HEX..."></textarea>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Output Delimiter</label>
                    <select id="hex-delimiter" class="form-select border-2">
                        <option value=" ">Space (e.g., 48 45 58)</option>
                        <option value="">None (e.g., 484558)</option>
                        <option value=",">Comma (e.g., 48,45,58)</option>
                        <option value="0x">0x Prefix (e.g., 0x48 0x45)</option>
                        <option value="\\x">\x Prefix (e.g., \x48\x45)</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-end gap-2">
                    <button id="convert-btn" class="btn btn-primary btn-lg flex-grow-1 rounded-pill shadow">Convert to HEX <i class="fa-solid fa-arrow-right-long ms-2"></i></button>
                    <button id="clear-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Reset</button>
                </div>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top d-none">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase">Encoded Hexadecimal</label>
                        <div class="form-check form-switch d-inline-block">
                            <input class="form-check-input" type="checkbox" id="upper-switch" checked>
                            <label class="form-check-label small fw-bold text-muted" for="upper-switch">UPPERCASE</label>
                        </div>
                    </div>
                    <textarea id="output-hex" class="form-control font-monospace bg-dark text-info border-0 py-3 mt-1" readonly rows="5" style="border-radius: 12px; letter-spacing: 0.5px;"></textarea>
                    <div class="mt-3 text-end">
                        <button class="btn btn-primary rounded-pill px-4" onclick="copyResult('output-hex')">Copy HEX</button>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Exploring String to Hexadecimal Encoding</h2>
                    <p class="lead">Converting human-readable text into hexadecimal is a standard practice in software development, cybersecurity, and data engineering. Whether you're obfuscating data for transmission or preparing payloads for low-level system testing, our <strong>String to HEX Converter</strong> provides a precise and customizable way to visualize your text as byte-level data.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Professional Customization Options</h3>
                    <p>Unlike basic converters, our Pro version offers full control over the output format. You can choose from common delimiters like spaces or commas, or use programming-specific prefixes like <code>0x</code> (C/Java style) or <code>\x</code> (Python/PHP style). You can also toggle between uppercase and lowercase hex characters to match your specific coding standards.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Key Use Cases for Developers</h3>
                    <ul>
                        <li><strong>Payload Crafting:</strong> Preparing data for API testing and security audits.</li>
                        <li><strong>Embedded Systems:</strong> Converting strings into hex arrays for microcontrollers and firmware.</li>
                        <li><strong>Data Obfuscation:</strong> Hiding recognizable strings from simple automated scanners.</li>
                        <li><strong>Binary File Analysis:</strong> Creating data blocks for comparison with hex editors.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Performance & Security</h3>
                    <p>Designed for fast-paced development environments, our converter handles even large text blocks instantly. By performing the entire encoding process within your browser's local sandbox, we ensure that your internal notes, proprietary keys, and sensitive data strings are never transmitted to any external server. It's the most secure way to handle string-to-hex transformations.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const delimiter = document.getElementById('hex-delimiter');
    const upperSwitch = document.getElementById('upper-switch');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('output-hex');

    function convert() {
        const text = input.value;
        if (!text) return showToast('Please enter text to encode', 'error');

        const delim = delimiter.value;
        const isUpper = upperSwitch.checked;
        
        let hexArr = [];
        for (let i = 0; i < text.length; i++) {
            let h = text.charCodeAt(i).toString(16);
            if (h.length === 1) h = '0' + h;
            if (isUpper) h = h.toUpperCase();
            
            if (delim === '0x' || delim === '\\x') {
                hexArr.push(delim + h);
            } else {
                hexArr.push(h);
            }
        }

        const joinChar = (delim === '0x' || delim === ' ' || delim === ',') ? (delim === '0x' ? ' ' : delim) : '';
        output.value = hexArr.join(joinChar);
        
        wrapper.classList.remove('d-none');
        wrapper.scrollIntoView({ behavior: 'smooth' });
    }

    convertBtn.addEventListener('click', convert);
    upperSwitch.addEventListener('change', () => {
        if (!wrapper.classList.contains('d-none')) convert();
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.classList.add('d-none');
    });

    window.copyResult = (id) => {
        const el = document.getElementById(id);
        el.select();
        document.execCommand('copy');
        showToast('HEX string copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>