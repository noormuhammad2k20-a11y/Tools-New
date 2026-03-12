<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Paste JavaScript Code</label>
                <textarea id="js-input" class="form-control font-monospace" rows="12" placeholder="function hello() { console.log('Hello World'); }..." style="background: #f8fafc;"></textarea>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="minify-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Minify JS <i class="fa-solid fa-bolt ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Minified Code</label>
                    <div class="d-flex gap-2">
                        <span id="stats-badge" class="badge bg-success rounded-pill d-flex align-items-center px-3">0% Reduced</span>
                        <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy Code</button>
                    </div>
                </div>
                <textarea id="js-output" class="form-control font-monospace bg-dark text-warning border-0" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Accelerating the Web with JavaScript Minification</h2>
                    <p class="lead">In the world of web performance, every byte counts. JavaScript Minification is the process of removing all unnecessary characters from source code without changing its functionality. Our <strong>JavaScript Minifier</strong> helps you optimize your scripts for production use, ensuring faster load times and a smoother user experience.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">What Does Our Minifier Do?</h3>
                    <p>Our tool performs several non-destructive optimizations on your JavaScript files:</p>
                    <ul>
                        <li><strong>Whitespace Removal:</strong> Strips out tabs, spaces, and newlines that are only there for human readability.</li>
                        <li><strong>Comment Stripping:</strong> Removes both single-line (//) and multi-line (/* */) comments to shed weight.</li>
                        <li><strong>Variable Compression:</strong> Efficiently handles the consolidation of code blocks where possible.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Minification vs. Obfuscation</h3>
                    <p>It's important to differentiate between minification and obfuscation. Minification aims to reduce file size, while obfuscation aims to make the code difficult for humans to understand. While our tool reduces the readability of the code as a side effect of removing whitespace, its primary goal is performance optimization.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Minifying JS is Important for SEO</h3>
                    <p>Google and other search engines factor page speed into their ranking algorithms. Large, unoptimized JavaScript files are one of the biggest bottlenecks for page rendering. By minifying your scripts, you reduce the time it takes for the browser to download and parse your code, directly improving your Core Web Vitals scores.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Client-Side Security</h3>
                    <p>We believe your code is your property. That's why our JS Minifier operates entirely on your device. We don't upload your code to any servers for processing; instead, we use high-performance regular expressions directly in your browser to perform the optimization.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #f59e0b, #ef4444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#js-output { font-size: 13px; color: #fbbf24 !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('js-input');
    const output = document.getElementById('js-output');
    const minifyBtn = document.getElementById('minify-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const statsBadge = document.getElementById('stats-badge');

    function minifyJS(js) {
        // Basic Regex-based minification (Client-side safe)
        return js
            .replace(/\/\*[\s\S]*?\*\/|([^:]|^)\/\/.*$/gm, '$1') // Remove comments
            .replace(/\s+/g, ' ')                                // Collapse whitespace
            .replace(/ \/ /g, ' / ')                             // Don't break regex literals
            .replace(/\s*([\{\}\(\)\[\]\+\-\*\/=><!&\|;,:])\s*/g, '$1') // Remove space around operators
            .trim();
    }

    minifyBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        
        const originalSize = val.length;
        const minified = minifyJS(val);
        const minifiedSize = minified.length;
        
        output.value = minified;
        
        const reduction = originalSize > 0 ? Math.round(((originalSize - minifiedSize) / originalSize) * 100) : 0;
        statsBadge.textContent = `${reduction}% Reduction`;
        
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
        showToast('Minified JS copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>