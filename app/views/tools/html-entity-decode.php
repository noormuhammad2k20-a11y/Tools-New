<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Encoded HTML Entities</label>
                <textarea id="encoded-input" class="form-control font-monospace" rows="10" placeholder="Paste encoded entities here (e.g., &amp;lt;b&amp;gt;Hello&amp;lt;/b&amp;gt;)"></textarea>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="decode-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Decode Now <i class="fa-solid fa-unlock-keyhole ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Decoded Result (Plain Text)</label>
                    <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy Decoded</button>
                </div>
                <textarea id="decoded-output" class="form-control font-monospace bg-dark text-info border-0" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Restoring Readable Text from HTML Entities</h2>
                    <p class="lead">HTML entities are shorthand notations used to represent characters that have special meaning in HTML or cannot be easily typed on a keyboard. Our <strong>HTML Entity Decoder</strong> is an essential utility for developers and content managers who need to translate those technical codes back into human-readable text.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding Decryption vs. Decoding</h3>
                    <p>It is important to note that decoding is not decryption. Decoding is a deterministic transformation from a standardized format (like entity names or numeric codes) back to the original UTF-8 or ASCII character. This is commonly needed when inspecting database outputs, analyzing web traffic, or debugging server responses.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common Entities You Might Encounter</h3>
                    <ul>
                        <li><code>&amp;amp;</code> becomes <code>&amp;</code></li>
                        <li><code>&amp;lt;</code> becomes <code>&lt;</code></li>
                        <li><code>&amp;gt;</code> becomes <code>&gt;</code></li>
                        <li><code>&amp;quot;</code> becomes <code>"</code></li>
                        <li><code>&amp;copy;</code> becomes <code>©</code></li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">When Decoding is Useful</h3>
                    <ol>
                        <li><strong>Content Migration:</strong> Cleaning up text extracted from legacy CMS databases that stored encoded strings.</li>
                        <li><strong>API Debugging:</strong> Reading JSON or XML responses where string data has been prematurely escaped.</li>
                        <li><strong>Scraping & Analysis:</strong> Normalizing data harvested from web pages for use in machine learning or text processing.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Professional Privacy Standard</h3>
                    <p>We believe your data should stay yours. Our decoder runs <strong>100% locally in your web browser</strong>. No strings or code snippets are ever transmitted to our servers, making it safe for processing proprietary business logic, private user data, or sensitive configuration strings.</p>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('encoded-input');
    const output = document.getElementById('decoded-output');
    const decodeBtn = document.getElementById('decode-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function decodeHTML(str) {
        const txt = document.createElement('textarea');
        txt.innerHTML = str;
        return txt.value;
    }

    decodeBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        output.value = decodeHTML(val);
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Decoded text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>