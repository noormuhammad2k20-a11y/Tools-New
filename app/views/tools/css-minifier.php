<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Raw CSS Code</label>
                <textarea id="css-input" class="form-control font-monospace" rows="12" placeholder=".header { padding: 20px; margin-bottom: 30px; }..." style="background: #fdf2f8;"></textarea>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="minify-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Minify CSS <i class="fa-solid fa-compress ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Optimized CSS</label>
                    <div class="d-flex gap-2">
                        <span id="stats-badge" class="badge bg-primary rounded-pill d-flex align-items-center px-3">0 B Saved</span>
                        <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy CSS</button>
                    </div>
                </div>
                <textarea id="css-output" class="form-control font-monospace bg-dark text-info border-0" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Science of CSS Optimization</h2>
                    <p class="lead">CSS files are essential for visual styling, but they often contain a significant amount of "dead weight"—whitespace, comments, and unoptimized shorthand. Our <strong>CSS Minifier Pro</strong> uses intelligent algorithms to strip away this clutter, leaving you with the leanest possible stylesheet for production.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Minify Your CSS?</h3>
                    <p>Performance is a competitive advantage. When a user visits your site, their browser must download and parse all linked CSS before it can render the page correctly (Critical Rendering Path). By reducing your CSS file size by 20-50%, you directly reduce the "Time to First Paint," making your site feel instantaneous.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">What Our Tool Optimizes</h3>
                    <ul>
                        <li><strong>Standard Minification:</strong> Removes all newlines, tabs, and spaces between selectors and properties.</li>
                        <li><strong>Comment Removal:</strong> Strips out <code>/* comments */</code> which are useless for browser rendering.</li>
                        <li><strong>Mishap Prevention:</strong> Unlike aggressive compilers, our tool ensures that complex CSS sequences like custom properties (variables) and calc() functions remain intact.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Best Practices for Deployment</h3>
                    <p>Always keep your "source" CSS file formatted and commented for development. Use our tool only when you are ready to deploy to staging or production. Many modern workflows use build tools to do this automatically, but for quick edits or single-page projects, our online minifier is the fastest solution available.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Private and Secure</h3>
                    <p>Your design system is your secret sauce. Our minifier runs completely client-side, meaning your CSS code never leaves your computer. This provides total privacy and speed, as there is no network latency involved in the minification process.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #db2777, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#css-output { font-size: 13px; color: #6ee7b7 !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('css-input');
    const output = document.getElementById('css-output');
    const minifyBtn = document.getElementById('minify-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const statsBadge = document.getElementById('stats-badge');

    function minifyCSS(css) {
        return css
            .replace(/\/\*[\s\S]*?\*\//g, '')         // Remove comments
            .replace(/\s+/g, ' ')                      // Collapse multiple whitespaces
            .replace(/\s*([\{\}\:\;\,])\s*/g, '$1')    // Remove space around { } : ; ,
            .replace(/\;}/g, '}')                      // Remove last semicolon in a block
            .trim();
    }

    minifyBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        
        const originalSize = val.length;
        const minified = minifyCSS(val);
        const minifiedSize = minified.length;
        
        output.value = minified;
        
        const diff = originalSize - minifiedSize;
        const percent = originalSize > 0 ? Math.round((diff / originalSize) * 100) : 0;
        statsBadge.textContent = `${diff} B Saved (${percent}%)`;
        
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
        showToast('Minified CSS copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>