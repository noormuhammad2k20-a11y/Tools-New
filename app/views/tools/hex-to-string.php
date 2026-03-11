<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold small text-uppercase tracking-wider text-muted">Hexadecimal Input</label>
                <textarea id="input-hex" class="form-control font-monospace border-2 rounded-3 p-3 mt-1" rows="5" placeholder="e.g., 48 65 6c 6c 6f or 48656c6c6f"></textarea>
            </div>

            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="convert-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Convert to Text <i class="fa-solid fa-arrow-right-long ms-2"></i></button>
                <button id="clear-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top d-none">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase">Decoded String</label>
                        <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyResult('output-text')">Copy Text</button>
                    </div>
                    <textarea id="output-text" class="form-control font-monospace bg-light border-0 py-3 mt-1" readonly rows="5" style="border-radius: 12px;"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Demystifying Hexadecimal to String Conversion</h2>
                    <p class="lead">Hexadecimal (Base-16) is a fundamental numbering system in computing that uses sixteen distinct symbols: 0-9 and A-F. Our <strong>HEX to String Converter</strong> allows you to decode these byte-level representations back into human-readable words, enabling you to inspect network traffic, analyze binary files, or debug low-level data streams.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common Applications for Hex Decoding</h3>
                    <ul>
                        <li><strong>Network Protocol Analysis:</strong> Interpreting raw packet captures from tools like Wireshark.</li>
                        <li><strong>Digital Forensics:</strong> Extracting strings and signatures from raw memory dumps or disk images.</li>
                        <li><strong>Malware Analysis:</strong> De-obfuscating hidden strings and shellcode payloads within scripts.</li>
                        <li><strong>Web Security (XSS/SQLi):</strong> Decoding hexadecimal-encoded payloads often used to bypass basic input filters.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How the Conversion Works</h3>
                    <p>In most encoding schemes like ASCII or UTF-8, every character corresponds to a specific byte value. For example, the uppercase letter 'A' is represented by the hexadecimal value <code>41</code>. Our converter takes a sequence of these hex values, splits them appropriately (handling spaces, commas, or continuous strings), and reconstructs the original character array into a clean string.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Privacy & Local Processing</h3>
                    <p>When analyzing potentially sensitive data dumps or proprietary keys, you need a environment you can trust. This Pro tool operates entirely on the client-side. Your hex data is processed locally in your browser's memory and is never transmitted to our servers. This ensures your sensitive analysis remains completely confidential and secure.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-hex');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('output-text');

    convertBtn.addEventListener('click', () => {
        let hex = input.value.trim();
        if (!hex) return showToast('Please enter hex values', 'error');

        // Clean input: remove spaces, commas, and prefixes
        hex = hex.replace(/0x/g, '').replace(/[\s,]/g, '');

        if (hex.length % 2 !== 0) {
            return showToast('Invalid hex length. Must be an even number of characters.', 'error');
        }

        try {
            let str = '';
            for (let i = 0; i < hex.length; i += 2) {
                const charCode = parseInt(hex.substr(i, 2), 16);
                if (isNaN(charCode)) throw new Error('Invalid hex character');
                str += String.fromCharCode(charCode);
            }
            
            output.value = str;
            wrapper.classList.remove('d-none');
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            showToast('Error: Invalid hexadecimal sequence detected.', 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.classList.add('d-none');
    });

    window.copyResult = (id) => {
        const el = document.getElementById(id);
        el.select();
        document.execCommand('copy');
        showToast('Text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>