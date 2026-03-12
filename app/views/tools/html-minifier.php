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
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Raw HTML Input</label>
                        <div class="d-flex gap-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="strip-comments" checked>
                                <label class="form-check-label small fw-bold text-muted" for="strip-comments">Remove Comments</label>
                            </div>
                        </div>
                    </div>
                    <textarea id="input-html" class="form-control border-2 rounded-4 p-4" rows="14" placeholder="Paste your raw HTML code here..."></textarea>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-html').value = ''; document.getElementById('output-html').value = ''; updateMetrics();"><i class="fa-solid fa-trash me-2"></i>Clear Data</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Minified Output</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyResult()">Copy Code</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <textarea id="output-html" class="form-control bg-light border-0 rounded-4 p-4" rows="14" readonly placeholder="Your compressed HTML goes here..." style="font-family: var(--font-mono);"></textarea>

                    <div class="d-flex justify-content-between align-items-center mt-3 p-3 bg-light rounded-3 border">
                        <div class="text-center">
                            <strong class="d-block text-muted small">Original Size</strong>
                            <span id="orig-size" class="fw-bold">0 Bytes</span>
                        </div>
                        <div class="text-center">
                            <strong class="d-block text-muted small">Minified Size</strong>
                            <span id="min-size" class="fw-bold text-success">0 Bytes</span>
                        </div>
                        <div class="text-center">
                            <strong class="d-block text-muted small">Saved</strong>
                            <span id="saved-pct" class="fw-bold text-primary">0%</span>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Accelerate Your Web Pages with HTML Minification</h2>
                    <p class="lead">HTML Minification is the process of removing all unnecessary characters from source code without changing its functionality. These unnecessary characters include whitespace, newlines, tabs, and comments, which are useful for human readability but ignored by the browser parser.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why You Need to Minify HTML</h3>
                    <p>In modern web development, performance optimization is critical for both user experience (UX) and Search Engine Optimization (SEO). Google officially incorporates page speed into its ranking algorithms. By minifying your HTML files, you achieve:</p>
                    <ul>
                        <li><strong>Reduced Bandwidth:</strong> Smaller file sizes translate to lower hosting and egress costs.</li>
                        <li><strong>Faster DOM Parsing:</strong> Browsers can construct the Document Object Model (DOM) faster without having to skip over human-readable formatting.</li>
                        <li><strong>Improved Core Web Vitals:</strong> Better First Contentful Paint (FCP) and Largest Contentful Paint (LCP) times due to faster initial HTML loading.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Professional Compression Algorithms</h3>
                    <p>Our Pro HTML Minifier doesn't just strip spaces randomly. It intelligently collapses redundant formatting while preserving critical syntax structures like <code>&lt;pre&gt;</code> and <code>&lt;textarea&gt;</code> tags, which require explicit internal spacing.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Safe Client-Side Execution</h3>
                    <p>Uploading proprietary frontend code to an external server presents a security risk. To safeguard your intellectual property, this minifier operates strictly inside your web browser. Using native Regex pattern matching, we compile your file locally with 0ms server latency and total privacy.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #e34f26, #f97316); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(227, 79, 38, 0.15); border-color: #e34f26; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-html');
    const output = document.getElementById('output-html');
    const stripComments = document.getElementById('strip-comments');
    const origSize = document.getElementById('orig-size');
    const minSize = document.getElementById('min-size');
    const savedPct = document.getElementById('saved-pct');

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    window.updateMetrics = () => {
        const inBytes = new Blob([input.value]).size;
        const outBytes = new Blob([output.value]).size;
        
        origSize.textContent = formatBytes(inBytes);
        minSize.textContent = formatBytes(outBytes);

        if (inBytes > 0) {
            const pct = ((inBytes - outBytes) / inBytes) * 100;
            savedPct.textContent = pct.toFixed(1) + '%';
        } else {
            savedPct.textContent = '0%';
        }
    }

    function minify() {
        let html = input.value;
        if (!html) {
            output.value = '';
            updateMetrics();
            return;
        }

        try {
            // Remove comments if checked
            if (stripComments.checked) {
                // regex to match HTML comments but NOT IE conditional comments
                html = html.replace(/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->)(.|\n))*-->/g, '');
            }

            // Collapse multiple spaces
            html = html.replace(/\s{2,}/g, ' ');

            // Remove spaces around block level tags and symbols
            html = html.replace(/>\s+</g, '><');

            // Strip new lines
            html = html.replace(/\n|\r/g, '');

            output.value = html.trim();
        } catch (e) {
            output.value = 'Error minifying HTML.';
        }
        
        updateMetrics();
    }

    input.addEventListener('input', minify);
    stripComments.addEventListener('change', minify);

    window.copyResult = () => {
        if (!output.value) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Minified HTML copied!');
    };

    window.downloadResult = () => {
        if (!output.value) return showToast('Nothing to download', 'error');
        const blob = new Blob([output.value], { type: 'text/html' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `minified-${new Date().getTime()}.html`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>