<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                
                <!-- Left Configuration UI -->
                <div class="col-lg-5 mb-4 mb-lg-0 border-end pe-lg-4">
                    
                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted">Gradient Type</h5>
                    <div class="btn-group w-100 mb-4 shadow-sm" role="group">
                        <input type="radio" class="btn-check" name="grad-type" id="type-linear" value="linear" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="type-linear">Linear</label>

                        <input type="radio" class="btn-check" name="grad-type" id="type-radial" value="radial" autocomplete="off">
                        <label class="btn btn-outline-primary" for="type-radial">Radial</label>
                    </div>

                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted">Colors</h5>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Color 1 (Start)</label>
                            <input type="color" id="color-1" class="form-control form-control-color w-100 border-2" value="#4f46e5" title="Choose your color">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Color 2 (End)</label>
                            <input type="color" id="color-2" class="form-control form-control-color w-100 border-2" value="#ec4899" title="Choose your color">
                        </div>
                    </div>

                    <div id="angle-container">
                        <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted">Direction / Angle</h5>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <input type="range" class="form-range flex-grow-1" id="grad-angle" min="0" max="360" value="45">
                            <div class="input-group input-group-sm" style="width: 80px;">
                                <input type="number" class="form-control text-center fw-bold text-primary" id="grad-angle-num" value="45" min="0" max="360">
                                <span class="input-group-text bg-light">&deg;</span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-outline-secondary w-100 mt-4 rounded-pill shadow-sm" onclick="randomizeColors()"><i class="fa-solid fa-shuffle me-2"></i>Randomize Colors</button>
                    
                </div>

                <!-- Right Visual Output -->
                <div class="col-lg-7 ps-lg-4 d-flex flex-column">
                    
                    <!-- Preview Box -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase tracking-wider">Live Preview</label>
                        <div id="preview-box" class="w-100 rounded-4 shadow-sm border border-2 border-primary border-opacity-25" style="height: 250px; background: linear-gradient(45deg, #4f46e5, #ec4899);"></div>
                    </div>
                
                    <!-- Output Code -->
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark small text-uppercase tracking-wider mb-0"><i class="fa-brands fa-css3-alt me-2 text-primary"></i>CSS Code</label>
                            <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm" onclick="copyCSS()"><i class="fa-regular fa-copy me-2"></i>Copy String</button>
                        </div>
                        
                        <textarea id="out-css" class="form-control bg-dark text-white border-0 rounded-4 p-4 shadow-sm" rows="3" readonly style="font-family: var(--font-mono); font-size: 15px; resize: none;"></textarea>
                    </div>

                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Psychology of CSS Gradients</h2>
                    <p class="lead">Gradients have made a massive resurgence in modern Web 3.0 and SaaS design (often referred to as 'Glassmorphism' or 'Aurora' design). Transitioning smoothly between brand colors creates a perception of depth, premium quality, and emotional resonance. Our <strong>Pro CSS Gradient Generator</strong> takes the mathematical guesswork out of orientation degrees and hex-code interpolations.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Linear vs. Radial Architectures</h3>
                    <ul>
                        <li><strong>Linear Gradients:</strong> Provide a straight-line transition calculated along a 360-degree axis. A 90-degree angle pushes colors perfectly from left to right. A 180-degree angle pushes them vertically from top to bottom. Linear designs are heavily utilized on landing page hero-banners (where text overlays the gradient) or sleek call-to-action buttons.</li>
                        <li><strong>Radial Gradients:</strong> Emerge organically from a central origin point, expanding outward in an elliptical or perfectly circular pattern. These mimic the physics of spotlights or natural light sources, making them incredible for simulating glowing orbs behind UI components.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Browser Pre-fixing & Best Practices</h3>
                    <p>Historically, developers needed to write a tangled mess of <code>-webkit-</code>, <code>-moz-</code>, and <code>-o-</code> vendor prefixes for Internet Explorer 9 compatibility. Because modern evergreen browsers all adhere to contemporary W3C CSS3 modules, our generator outputs standard, un-prefixed background properties, significantly decreasing your stylesheet's un-minified weight.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #8b5cf6, #f43f5e); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
input[type="color"] { cursor: pointer; height: 50px; padding: 5px; }
input[type="range"] { cursor: pointer; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const typeRadios = document.querySelectorAll('input[name="grad-type"]');
    const color1 = document.getElementById('color-1');
    const color2 = document.getElementById('color-2');
    const slider = document.getElementById('grad-angle');
    const num = document.getElementById('grad-angle-num');
    const angleContainer = document.getElementById('angle-container');
    const preview = document.getElementById('preview-box');
    const outCss = document.getElementById('out-css');

    function updateGradient() {
        const type = document.querySelector('input[name="grad-type"]:checked').value;
        const c1 = color1.value;
        const c2 = color2.value;
        let cssString = '';

        if (type === 'linear') {
            angleContainer.style.opacity = '1';
            angleContainer.style.pointerEvents = 'auto';
            const deg = slider.value;
            cssString = `linear-gradient(${deg}deg, ${c1}, ${c2})`;
        } else {
            angleContainer.style.opacity = '0.3';
            angleContainer.style.pointerEvents = 'none';
            cssString = `radial-gradient(circle, ${c1}, ${c2})`;
        }

        // Apply
        preview.style.background = cssString;
        
        // Output text
        outCss.value = `background: ${c1};\nbackground: ${cssString};`;
    }

    // Bindings
    typeRadios.forEach(r => r.addEventListener('change', updateGradient));
    color1.addEventListener('input', updateGradient);
    color2.addEventListener('input', updateGradient);
    
    slider.addEventListener('input', () => {
        num.value = slider.value;
        updateGradient();
    });

    num.addEventListener('input', () => {
        let val = parseInt(num.value, 10);
        if (isNaN(val)) val = 0;
        if (val > 360) val = 360;
        if (val < 0) val = 0;
        num.value = val;
        slider.value = val;
        updateGradient();
    });

    // Randomize function
    window.randomizeColors = () => {
        color1.value = '#' + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0');
        color2.value = '#' + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0');
        slider.value = Math.floor(Math.random() * 360);
        num.value = slider.value;
        updateGradient();
    };

    window.copyCSS = () => {
        outCss.select();
        document.execCommand('copy');
        showToast('CSS Copied successfully!');
    };

    // Initialize
    updateGradient();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>