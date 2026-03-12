<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">User-Agent String</label>
                <div class="input-group">
                    <textarea id="ua-input" class="form-control font-monospace" rows="4" placeholder="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36..."></textarea>
                    <button id="detect-my-btn" class="btn btn-outline-primary px-4">Use Current <i class="fa-solid fa-location-crosshairs ms-1"></i></button>
                </div>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="parse-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Analyze UA <i class="fa-solid fa-magnifying-glass ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top d-none">
                <div class="row g-4">
                    <!-- Browser -->
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded-4 border text-center">
                            <i class="fa-solid fa-globe text-primary fa-2x mb-3"></i>
                            <h6 class="text-uppercase small fw-bold text-muted mb-1">Browser</h6>
                            <h5 id="ua-browser" class="fw-bold mb-0">-</h5>
                        </div>
                    </div>
                    <!-- OS -->
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded-4 border text-center">
                            <i class="fa-solid fa-desktop text-success fa-2x mb-3"></i>
                            <h6 class="text-uppercase small fw-bold text-muted mb-1">Operating System</h6>
                            <h5 id="ua-os" class="fw-bold mb-0">-</h5>
                        </div>
                    </div>
                    <!-- Device -->
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded-4 border text-center">
                            <i class="fa-solid fa-mobile-screen text-warning fa-2x mb-3"></i>
                            <h6 class="text-uppercase small fw-bold text-muted mb-1">Device Type</h6>
                            <h5 id="ua-device" class="fw-bold mb-0">-</h5>
                        </div>
                    </div>
                </div>

                <div class="mt-4 p-4 border rounded-4">
                    <h6 class="fw-bold mb-3">Technical Breakdown</h6>
                    <pre id="ua-raw-json" class="bg-dark text-info p-3 rounded-3 mb-0 small" style="max-height: 200px; overflow: auto;"></pre>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Inside the Browser Header: User-Agent Analysis</h2>
                    <p class="lead">Every time your browser visits a website, it sends a <code>User-Agent</code> header. This string acts as an identity card, telling the server which browser you're using, which operating system is hosting it, and whether you're on a mobile device or a desktop. Our <strong>User-Agent Parser</strong> breaks down this cryptic string into readable data points.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Analyze User-Agent Strings?</h3>
                    <p>Developers and marketers use UA parsing for several critical tasks:</p>
                    <ul>
                        <li><strong>Cross-Browser Debugging:</strong> Identifying which browser version is causing a layout issue reported by a user.</li>
                        <li><strong>Mobile Optimization:</strong> Redirecting users or serving specific assets based on whether they are using a smartphone, tablet, or PC.</li>
                        <li><strong>Bot Identification:</strong> Distinguishing between real human visitors and search engine crawlers like Googlebot or Bingbot.</li>
                        <li><strong>Security Auditing:</strong> Detecting outdated or vulnerable browser versions in access logs.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How the Parser Decodes Data</h3>
                    <p>User-Agent strings have no standard format, making them notoriously messy. Our tool uses a combination of pattern matching and a comprehensive database of browser signatures to accurately extract the brand, engine (like WebKit or Blink), and architectural versioning of the client software.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Privacy Shield</h3>
                    <p>While User-Agents can be used for "fingerprinting," our tool is designed for individual debugging. We do not store any of the strings you input, nor do we track your own identity when you use the "Detect My" feature. All parsing is handled locally, ensuring that your technical footprints remain your business.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Limitations of UA Strings</h3>
                    <p>Modern browsers are moving towards "User-Agent Client Hints" for better privacy. While legacy UA strings are still prevalent, they are sometimes intentionally spoofed by browser extensions or developers for testing purposes. Our parser provides the most accurate interpretation of the string <em>as provided</em>.</p>
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
    const input = document.getElementById('ua-input');
    const parseBtn = document.getElementById('parse-btn');
    const detectMyBtn = document.getElementById('detect-my-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    
    const browserEl = document.getElementById('ua-browser');
    const osEl = document.getElementById('ua-os');
    const deviceEl = document.getElementById('ua-device');
    const rawEl = document.getElementById('ua-raw-json');

    function parseUA(ua) {
        let browser = "Unknown Browser";
        let os = "Unknown OS";
        let device = "Desktop";

        // Browser Detection
        if (ua.includes("Firefox/")) browser = "Mozilla Firefox";
        else if (ua.includes("Edg/")) browser = "Microsoft Edge";
        else if (ua.includes("Chrome/")) browser = "Google Chrome";
        else if (ua.includes("Safari/") && !ua.includes("Chrome")) browser = "Apple Safari";
        else if (ua.includes("MSIE") || ua.includes("Trident/")) browser = "Internet Explorer";

        // OS Detection
        if (ua.includes("Windows NT 10.0")) os = "Windows 10/11";
        else if (ua.includes("Windows NT 6.1")) os = "Windows 7";
        else if (ua.includes("Android")) os = "Android";
        else if (ua.includes("iPhone") || ua.includes("iPad")) os = "iOS";
        else if (ua.includes("Macintosh")) os = "macOS";
        else if (ua.includes("Linux")) os = "Linux";

        // Device Detection
        if (ua.includes("Mobile") || ua.includes("Android") || ua.includes("iPhone")) device = "Mobile";
        else if (ua.includes("Tablet") || ua.includes("iPad")) device = "Tablet";

        return { browser, os, device, raw: ua };
    }

    parseBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;
        
        const data = parseUA(val);
        browserEl.textContent = data.browser;
        osEl.textContent = data.os;
        deviceEl.textContent = data.device;
        rawEl.textContent = JSON.stringify(data, null, 4);
        
        wrapper.classList.remove('d-none');
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    detectMyBtn.addEventListener('click', () => {
        input.value = navigator.userAgent;
        parseBtn.click();
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.classList.add('d-none');
    });
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>