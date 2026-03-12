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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Base64 String Input</label>
                        <select id="decode-mode" class="form-select form-select-sm w-auto border-2 shadow-sm rounded-pill px-3">
                            <option value="auto">Auto-detect Encoding</option>
                            <option value="strict">Strict UTF-8</option>
                        </select>
                    </div>
                    <textarea id="input-text" class="form-control border-2 rounded-4 p-4" rows="12" placeholder="Paste your Base64 encoded string here (e.g. 'SGVsbG8gV29ybGQ=')"></textarea>

                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-text').value = ''; document.getElementById('output-text').value = '';"><i class="fa-solid fa-trash me-2"></i>Clear Data</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Decoded Text Data</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyResult()">Copy Text</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <textarea id="output-text" class="form-control bg-light border-0 rounded-4 p-4" rows="12" readonly placeholder="Your raw decoded text data will appear here..." style="font-family: var(--font-mono);"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Understanding Base64 Decoding in Web Systems</h2>
                    <p class="lead">Decoding Base64 allows you to peel back the layer of web-safe ASCII characters and view the true underlying text structure. Whether you're debugging data transmission payloads or translating secure authentication tokens, this <strong>Pro Base64 Decoder</strong> ensures reliable and UTF-8 compliant translation inside your browser environment.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why You Need a Developer-Grade Decoder</h3>
                    <p>Standard Base64 converters often fail when encountering complex character sets (like emojis, Kanji, or mathematical symbols) due to native ASCII conversion limits. We bypass these limitations completely:</p>
                    <ul>
                        <li><strong>Safe Unicode Parsing:</strong> Our engine aggressively forces UTF-8 decoding routines, meaning special multi-byte characters are restored beautifully without corrupted artifact generation (such as ).</li>
                        <li><strong>URL-Safe Reversal:</strong> Certain applications strip out `+` and `/` characters and replace them with `-` and `_` to remain query-safe. We automatically correct these replacements on the fly and restore missing `==` padding automatically.</li>
                        <li><strong>Error Tolerance:</strong> We catch invalid checksum blocks and malformed strings gracefully, providing clean output alerts rather than catastrophic browser crashes.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Security and Auditing Protocols</h3>
                    <p>Security researchers constantly utilize decoding systems to unpack encoded malicious shell programs, or audit data flows in Single Page Applications mapping Redux states. With 100% Client-Side JS logic, your decoded JSON schemas or secure API fragments remain localized to your specific RAM instance, eliminating concerns of server-side data snooping loops.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15); border-color: #10b981; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const mode = document.getElementById('decode-mode');

    function base64ToUtf8(str) {
        // Fix URL-Safe variants
        str = str.replace(/-/g, '+').replace(/_/g, '/');
        // Pad with =
        while (str.length % 4) {
            str += '=';
        }
        return decodeURIComponent(escape(window.atob(str)));
    }

    function decode() {
        const val = input.value.trim();
        if (!val) {
            output.value = '';
            return;
        }

        try {
            output.value = base64ToUtf8(val);
        } catch (e) {
            output.value = 'Malformed input: The provided string is not valid Base64 data.';
        }
    }

    input.addEventListener('input', decode);
    mode.addEventListener('change', decode);

    window.copyResult = () => {
        if (!output.value || output.value.startsWith('Malformed input')) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Decoded text copied!');
    };

    window.downloadResult = () => {
        if (!output.value || output.value.startsWith('Malformed input')) return showToast('Nothing to download', 'error');
        const blob = new Blob([output.value], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `base64-decode-${new Date().getTime()}.txt`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>