<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4 align-items-center">
                <div class="col-md-7">
                    <div class="row g-3">
                        <div class="col-4">
                            <label class="form-label small fw-bold text-danger">Red (0-255)</label>
                            <input type="number" id="r-val" class="form-control form-control-lg text-center" value="59" min="0" max="255">
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-bold text-success">Green (0-255)</label>
                            <input type="number" id="g-val" class="form-control form-control-lg text-center" value="130" min="0" max="255">
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-bold text-primary">Blue (0-255)</label>
                            <input type="number" id="b-val" class="form-control form-control-lg text-center" value="246" min="0" max="255">
                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="range" class="form-range" id="rgb-range-r" min="0" max="255" value="59">
                        <input type="range" class="form-range mt-2" id="rgb-range-g" min="0" max="255" value="130">
                        <input type="range" class="form-range mt-2" id="rgb-range-b" min="0" max="255" value="246">
                    </div>
                </div>
                <div class="col-md-5 text-center border-start">
                    <div id="color-preview" class="shadow-sm rounded-4 mx-auto mb-3" style="width: 140px; height: 140px; background: rgb(59, 130, 246); border: 5px solid white;"></div>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <h2 id="hex-output" class="mb-0 font-monospace fw-bold text-primary">#3b82f6</h2>
                        <button class="btn btn-sm btn-link text-muted p-0" onclick="copyHex()"><i class="fa-solid fa-copy fa-lg"></i></button>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Converting Light to Logic: RGB to HEX</h2>
                    <p class="lead">Computers and screens use combinations of Red, Green, and Blue light to create millions of colors. This is known as the RGB color model. However, for web coding (HTML/CSS), designers often prefer the hexadecimal format. Our <strong>RGB to HEX Converter</strong> provides an intuitive way to translate these numerical light intensities into clean web strings.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the Translation</h3>
                    <p>The translation is purely mathematical. Each color value (0-255) is converted into a two-digit hexadecimal base-16 number. For instance, the value <code>255</code> becomes <code>FF</code>, and <code>0</code> becomes <code>00</code>. By combining these three pairs, you get a six-digit HEX string that tells the browser exactly how to render the color.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">When to Use RGB</h3>
                    <p>While HEX is great for static stylesheets, RGB is often superior when working with <strong>Dynamic UI</strong> components. Modern CSS frameworks and Javascript libraries use RGB values to programmatically calculate brightness, contrast, and hover effects. It is also the native language of graphic platforms like Figma and Photoshop.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Tips for Modern Web Lighting</h3>
                    <ol>
                        <li><strong>Stay Consistent:</strong> Pick one color model and stick to it within your CSS file to improve readability for other developers.</li>
                        <li><strong>Use Color Variables:</strong> Define your brand colors at the top of your CSS file using variables (e.g., <code>--primary-color: #3b82f6;</code>) to make updates easy.</li>
                        <li><strong>Mind the Contrast:</strong> Use our preview box to ensure your chosen color is vibrant enough for the intended background.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Client-Side Performance</h3>
                    <p>Efficiency is key. Our converter runs <strong>instantly on your machine</strong>. We don't send your color choices to any remote server, ensuring that your branding assets and design experiments remain private. It's the fastest and safest digital laboratory for your next design project.</p>
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
input[type=range]::-webkit-slider-runnable-track { height: 8px; border-radius: 4px; }
#rgb-range-r::-webkit-slider-runnable-track { background: #fee2e2; }
#rgb-range-g::-webkit-slider-runnable-track { background: #dcfce7; }
#rgb-range-b::-webkit-slider-runnable-track { background: #dbeafe; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputs = ['r-val', 'g-val', 'b-val'];
    const ranges = ['rgb-range-r', 'rgb-range-g', 'rgb-range-b'];
    const preview = document.getElementById('color-preview');
    const output = document.getElementById('hex-output');

    function componentToHex(c) {
        var hex = parseInt(c).toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }

    function rgbToHex(r, g, b) {
        return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
    }

    function update() {
        const r = document.getElementById('r-val').value;
        const g = document.getElementById('g-val').value;
        const b = document.getElementById('b-val').value;

        const hex = rgbToHex(r, g, b);
        preview.style.backgroundColor = hex;
        output.textContent = hex;

        document.getElementById('rgb-range-r').value = r;
        document.getElementById('rgb-range-g').value = g;
        document.getElementById('rgb-range-b').value = b;
    }

    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', (e) => {
            let val = parseInt(e.target.value);
            if(val > 255) e.target.value = 255;
            if(val < 0) e.target.value = 0;
            update();
        });
    });

    ranges.forEach(id => {
        document.getElementById(id).addEventListener('input', (e) => {
            const val = e.target.value;
            const targetId = id.replace('rgb-range-', '') + '-val';
            document.getElementById(targetId).value = val;
            update();
        });
    });

    window.copyHex = () => {
        const temp = document.createElement('input');
        temp.value = output.textContent;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('HEX value copied!');
    };

    update();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>