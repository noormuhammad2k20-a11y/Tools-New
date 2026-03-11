<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                
                <!-- Extract Ratio -->
                <div class="col-lg-6 mb-4 mb-lg-0 border-end pe-lg-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted">1. Find Greatest Common Ratio</h5>
                    <p class="small text-muted mb-3">Enter the absolute width and height (e.g., 1920x1080) to extract its simplified ratio fraction.</p>
                    
                    <div class="row align-items-center mb-4">
                        <div class="col-5">
                            <label class="form-label fw-bold small">Original Width (W1)</label>
                            <input type="number" id="in-w1" class="form-control form-control-lg border-2" value="1920" placeholder="1920">
                        </div>
                        <div class="col-2 text-center text-muted fw-bold display-6 mt-3">:<br></div>
                        <div class="col-5">
                            <label class="form-label fw-bold small">Original Height (H1)</label>
                            <input type="number" id="in-h1" class="form-control form-control-lg border-2" value="1080" placeholder="1080">
                        </div>
                    </div>

                    <div class="alert alert-primary bg-primary bg-opacity-10 border-0 rounded-4 p-4 text-center">
                        <small class="text-primary fw-bold text-uppercase d-block mb-1">Simplified Aspect Ratio</small>
                        <h2 id="out-ratio" class="fw-bold mb-0 text-primary display-5" style="letter-spacing: 2px;">16:9</h2>
                    </div>
                </div>

                <!-- Calculate Missing Dimension -->
                <div class="col-lg-6 ps-lg-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted">2. Scale Proportionally</h5>
                    <p class="small text-muted mb-3">Change either the New Width or New Height below to constrain proportions perfectly.</p>

                    <div class="row align-items-center mb-4">
                        <div class="col-5">
                            <label class="form-label fw-bold small">New Width (W2)</label>
                            <input type="number" id="in-w2" class="form-control form-control-lg border-2 text-success" value="1280" placeholder="1280">
                        </div>
                        <div class="col-2 text-center text-muted fw-bold display-6 mt-3">:<br></div>
                        <div class="col-5">
                            <label class="form-label fw-bold small">New Height (H2)</label>
                            <input type="number" id="in-h2" class="form-control form-control-lg border-2 text-success" value="720" placeholder="720">
                        </div>
                    </div>

                    <div class="bg-light rounded-4 p-4 text-center border">
                        <h5 class="fw-bold text-dark mb-2">Target Common Ratios</h5>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <button class="btn btn-sm btn-outline-secondary" onclick="presetRatio(16,9)">16:9 (HD Video)</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="presetRatio(1,1)">1:1 (Instagram)</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="presetRatio(4,3)">4:3 (Classic TV)</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="presetRatio(9,16)">9:16 (TikTok)</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="presetRatio(21,9)">21:9 (Ultrawide)</button>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Maintaining Visual Fidelity in Responsive UI</h2>
                    <p class="lead">Whenever manipulating images or video frames for responsive websites, enforcing a strict <strong>Aspect Ratio</strong> prevents aggressive distortion, squeezing, or "stretching". Our Pro Calculator uses the Greatest Common Divisor (GCD) math algorithm instantly to ascertain perfect scalar properties.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">What Does 16:9 Actually Mean?</h3>
                    <p>It means that for every 16 units of horizontal width, your screen requires 9 units of vertical height. Therefore, whether the absolute pixel container is massive (<i>e.g. 3840px by 2160px for 4K UHD</i>) scenarios, or incredibly small (<i>e.g. 320px by 180px for a mobile thumbnail</i>), the intrinsic proportion remains mathematically equivalent.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">CSS <code>aspect-ratio</code> Property Integration</h3>
                    <p>Modern frontend web development no longer requires messy "padding-bottom viewport hacks" to maintain video containers. Evergreen browsers fully support the native CSS rule: <code>aspect-ratio: 16 / 9;</code>. By extracting your original image bounds utilizing the tool above, you can confidently inject this CSS layout attribute without rendering engine reflow stutters.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #14b8a6, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
input[type="number"] { font-family: var(--font-mono); font-weight: bold; }
input:focus { border-color: #3b82f6 !important; box-shadow: 0 0 0 4px rgba(59,130,246,0.15); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const uiW1 = document.getElementById('in-w1');
    const uiH1 = document.getElementById('in-h1');
    const outRatio = document.getElementById('out-ratio');
    
    const uiW2 = document.getElementById('in-w2');
    const uiH2 = document.getElementById('in-h2');

    let isTypingW2 = false;

    // GCD Algorithm
    function gcd(a, b) {
        return (b == 0) ? a : gcd(b, a % b);
    }

    function calculateRatio() {
        let w = parseInt(uiW1.value, 10);
        let h = parseInt(uiH1.value, 10);

        if (isNaN(w) || w <= 0) w = 1;
        if (isNaN(h) || h <= 0) h = 1;

        // Special rounding for near misses like 1366x768 usually meant to be 16:9 
        const r = gcd(w, h);
        let rw = w / r;
        let rh = h / r;

        // Custom edge cases that technically don't perfectly divide but are standards
        if (w === 1366 && h === 768) { rw = 16; rh = 9; }
        
        outRatio.textContent = Math.round(rw) + ":" + Math.round(rh);
    }

    // Scale Logic
    function scaleDimension(source) {
        let w1 = parseFloat(uiW1.value);
        let h1 = parseFloat(uiH1.value);
        if (isNaN(w1) || w1 <= 0) w1 = 1;
        if (isNaN(h1) || h1 <= 0) h1 = 1;

        if (source === 'w2') {
            let w2 = parseFloat(uiW2.value);
            if (isNaN(w2)) return;
            // Calculate H2
            let h2 = (h1 / w1) * w2;
            uiH2.value = Math.round(h2);
        } else if (source === 'h2') {
            let h2 = parseFloat(uiH2.value);
            if (isNaN(h2)) return;
            // Calculate W2
            let w2 = (w1 / h1) * h2;
            uiW2.value = Math.round(w2);
        }
    }

    // Bindings
    uiW1.addEventListener('input', () => {
        calculateRatio();
        scaleDimension('w2'); // Cascade update downward
    });
    
    uiH1.addEventListener('input', () => {
        calculateRatio();
        scaleDimension('w2');
    });

    uiW2.addEventListener('input', () => { scaleDimension('w2'); });
    uiH2.addEventListener('input', () => { scaleDimension('h2'); });

    window.presetRatio = (w, h) => {
        uiW1.value = w;
        uiH1.value = h;
        calculateRatio();
        scaleDimension('w2');
    };

    // Initial Run
    calculateRatio();
    scaleDimension('w2');
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>