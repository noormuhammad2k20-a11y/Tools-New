<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Raw Text / Code</label>
                <textarea id="raw-input" class="form-control font-monospace" rows="10" placeholder="Paste your HTML or text here..."></textarea>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="encode-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Encode Now <i class="fa-solid fa-shield-halved ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Encoded Result</label>
                    <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy Encoded</button>
                </div>
                <textarea id="encoded-output" class="form-control font-monospace bg-dark text-info border-0" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Securing Your Web Content with HTML Encoding</h2>
                    <p class="lead">HTML Entity Encoding is a fundamental security practice in modern web development. It involves converting potentially "dangerous" characters (like <code>&lt;</code>, <code>&gt;</code>, and <code>&amp;</code>) into their entity equivalents (like <code>&amp;lt;</code>, <code>&amp;gt;</code>, and <code>&amp;amp;</code>). Our <strong>HTML Entity Encoder</strong> provides an instant, client-side way to sanitize your strings for use in HTML documents and attributes.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why HTML Encoding is Critical</h3>
                    <p>The primary reason for encoding is to prevent Cross-Site Scripting (XSS) attacks. By encoding user input before displaying it, you ensure that the browser treats the content as literal text rather than executable code. Additionally, encoding is necessary to display special characters that are otherwise reserved by HTML syntax.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common Entity Conversions</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Character</th>
                                    <th>Entity Name</th>
                                    <th>Entity Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>&lt;</td><td>&amp;lt;</td><td>&amp;#60;</td></tr>
                                <tr><td>&gt;</td><td>&amp;gt;</td><td>&amp;#62;</td></tr>
                                <tr><td>&amp;</td><td>&amp;amp;</td><td>&amp;#38;</td></tr>
                                <tr><td>"</td><td>&amp;quot;</td><td>&amp;#34;</td></tr>
                                <tr><td>'</td><td>&amp;apos;</td><td>&amp;#39;</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Best Practices for Developers</h3>
                    <ol>
                        <li><strong>Always Encode:</strong> Treat all user-generated content as untrusted and encode it before insertion into the DOM.</li>
                        <li><strong>Context Matters:</strong> Use the correct type of encoding depending on where the data is being placed (e.g., HTML body vs. HTML attributes).</li>
                        <li><strong>Use Library Support:</strong> While our tool is great for manual checks, use framework-level escaping in production codebases.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Zero-Data Processing</h3>
                    <p>Unlike many online tools, our encoder processes everything <strong>on your machine</strong>. We use standard browser APIs to perform the conversion, ensuring that your raw data and code snippets never touch a remote server. This is the safest way to sanitize proprietary or sensitive data.</p>
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
    const input = document.getElementById('raw-input');
    const output = document.getElementById('encoded-output');
    const encodeBtn = document.getElementById('encode-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function encodeHTML(str) {
        return str.replace(/[\u00A0-\u9999<>&"']/g, function(i) {
            return '&#' + i.charCodeAt(0) + ';';
        });
    }

    encodeBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        output.value = encodeHTML(val);
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
        showToast('Encoded text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>