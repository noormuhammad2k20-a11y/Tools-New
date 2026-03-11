<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4 align-items-center">
                <div class="col-md-6 border-end">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">HEX Color Code</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-end-0">#</span>
                            <input type="text" id="hex-input" class="form-control border-start-0 font-monospace" placeholder="3b82f6" maxlength="6" autofocus>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold d-block">Or Pick Visual Color</label>
                        <input type="color" id="color-picker" class="form-control form-control-color w-100" value="#3b82f6">
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div id="color-preview" class="shadow-sm rounded-4 mx-auto mb-3" style="width: 120px; height: 120px; background: #3b82f6; transition: all 0.2s; border: 4px solid white;"></div>
                    <p class="small text-muted fw-bold mb-0">Color Preview</p>
                </div>
            </div>
            
            <div id="result-wrapper" class="mt-4 pt-4 border-top">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-uppercase tracking-wider text-primary">RGB Value</label>
                        <div class="input-group">
                            <input type="text" id="rgb-output" class="form-control font-monospace bg-light border-0" readonly>
                            <button class="btn btn-outline-primary" onclick="copyResult('rgb-output')"><i class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-uppercase tracking-wider text-primary">RGBA (0.5 Alpha)</label>
                        <div class="input-group">
                            <input type="text" id="rgba-output" class="form-control font-monospace bg-light border-0" readonly>
                            <button class="btn btn-outline-primary" onclick="copyResult('rgba-output')"><i class="fa-solid fa-copy"></i></button>
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering Color Models: HEX vs RGB</h2>
                    <p class="lead">In the world of web design, color is expressed in two primary ways: <strong>HEX (Hexadecimal)</strong> and <strong>RGB (Red, Green, Blue)</strong>. While HEX is the industry standard for HTML and CSS stylesheets due to its brevity, RGB provides finer control over transparency and is often used in modern Javascript frameworks and graphic design software. Our <strong>HEX to RGB Converter</strong> bridges these two worlds instantly.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">What is a HEX Color?</h3>
                    <p>A HEX color is a six-digit combination of numbers and letters used to define a color. Each pair of digits represents the intensity of Red, Green, and Blue respectively. For example, <code>#3b82f6</code> represents a specific shade of blue where <code>3b</code> is Red, <code>82</code> is Green, and <code>f6</code> is Blue.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Advantage of RGB & RGBA</h3>
                    <p>RGB uses three values between 0 and 255. The primary advantage of moving from HEX to RGB is the ability to use <strong>RGBA</strong>, where the 'A' stands for Alpha (transparency). This is essential for creating overlays, shadows, and frosted-glass effects common in modern web aesthetics.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Color Conversion Best Practices</h3>
                    <ol>
                        <li><strong>Standardize Your Styles:</strong> Use HEX for solid background colors to keep your CSS file size small.</li>
                        <li><strong>Use RGBA for Transparency:</strong> Avoid the <code>opacity</code> property for elements containing text, as it fades the text too. Use RGBA backgrounds instead.</li>
                        <li><strong>Check Accessibility:</strong> Always verify that your background and text color combinations meet WCAG contrast requirements for readability.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Fast, Safe, and Secure</h3>
                    <p>This conversion tool is built for designers who value privacy. All calculations are performed <strong>locally in your browser</strong> using vanilla JavaScript. No data is sent to a server, ensuring that your unique color palettes and brand guidelines remain confidential.</p>
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
    const hexInput = document.getElementById('hex-input');
    const colorPicker = document.getElementById('color-picker');
    const preview = document.getElementById('color-preview');
    const rgbOutput = document.getElementById('rgb-output');
    const rgbaOutput = document.getElementById('rgba-output');

    function updateColors(hex) {
        if(!hex.startsWith('#')) hex = '#' + hex;
        if(!/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) return;

        let r = 0, g = 0, b = 0;
        if(hex.length === 4) {
            r = parseInt(hex[1] + hex[1], 16);
            g = parseInt(hex[2] + hex[2], 16);
            b = parseInt(hex[3] + hex[3], 16);
        } else if(hex.length === 7) {
            r = parseInt(hex.substring(1, 3), 16);
            g = parseInt(hex.substring(3, 5), 16);
            b = parseInt(hex.substring(5, 7), 16);
        }

        const rgbVal = `rgb(${r}, ${g}, ${b})`;
        const rgbaVal = `rgba(${r}, ${g}, ${b}, 0.5)`;

        preview.style.backgroundColor = hex;
        rgbOutput.value = rgbVal;
        rgbaOutput.value = rgbaVal;
        colorPicker.value = hex.length === 4 ? `#${hex[1]}${hex[1]}${hex[2]}${hex[2]}${hex[3]}${hex[3]}` : hex;
    }

    hexInput.addEventListener('input', (e) => {
        let val = e.target.value;
        if(val.length >= 3) updateColors(val);
    });

    colorPicker.addEventListener('input', (e) => {
        const val = e.target.value;
        hexInput.value = val.substring(1);
        updateColors(val);
    });

    window.copyResult = (id) => {
        const el = document.getElementById(id);
        el.select();
        document.execCommand('copy');
        showToast('Color value copied!');
    };

    updateColors('3b82f6'); // Init
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>