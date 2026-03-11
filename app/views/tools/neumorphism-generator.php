<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Neumorphic Values</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Base Color (Light/Soft Gray works best)</label>
                            <input type="color" id="neu-color" class="form-control form-control-color w-100" value="#e0e5ec">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Distance <span><span id="dist-val">10</span>px</span>
                            </label>
                            <input type="range" id="neu-dist" class="form-range" min="5" max="50" value="10">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Intensity <span><span id="int-val">0.15</span></span>
                            </label>
                            <input type="range" id="neu-intensity" class="form-range" min="0.05" max="0.3" step="0.01" value="0.15">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Shape Type</label>
                            <div class="d-flex gap-2">
                                <button onclick="setShape('flat')" class="btn btn-outline-primary btn-sm flex-grow-1 active" id="btn-flat">Flat</button>
                                <button onclick="setShape('concave')" class="btn btn-outline-primary btn-sm flex-grow-1" id="btn-concave">Concave</button>
                                <button onclick="setShape('convex')" class="btn btn-outline-primary btn-sm flex-grow-1" id="btn-convex">Convex</button>
                                <button onclick="setShape('inset')" class="btn btn-outline-primary btn-sm flex-grow-1" id="btn-inset">Pressed</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div id="neu-bg" class="rounded-4 mb-4 flex-grow-1 d-flex align-items-center justify-content-center" style="min-height: 350px; background: #e0e5ec;">
                            <div id="neu-preview" style="width: 200px; height: 200px; border-radius: 40px; background: #e0e5ec;"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Copy CSS Output</h6>
                            <pre id="neu-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
                            <button onclick="copyCode()" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-4 rounded-pill">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script>
const preview = document.getElementById('neu-preview');
const bg = document.getElementById('neu-bg');
const codeEl = document.getElementById('neu-code');
const colorIn = document.getElementById('neu-color');
const distIn = document.getElementById('neu-dist');
const intIn = document.getElementById('neu-intensity');

const dVal = document.getElementById('dist-val');
const iVal = document.getElementById('int-val');

let currentShape = 'flat';

function ColorLuminance(hex, lum) {
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
    lum = lum || 0;
    let rgb = "#", c, i;
    for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ("00"+c).substr(c.length);
    }
    return rgb;
}

function updateNeu() {
    const color = colorIn.value;
    const dist = distIn.value;
    const intensity = intIn.value;
    
    dVal.textContent = dist;
    iVal.textContent = intensity;

    const blur = dist * 2;
    const lightColor = ColorLuminance(color, intensity);
    const darkColor = ColorLuminance(color, -intensity);

    bg.style.background = color;
    preview.style.backgroundColor = color;
    
    let shadow = `${dist}px ${dist}px ${blur}px ${darkColor}, -${dist}px -${dist}px ${blur}px ${lightColor}`;
    let gradient = '';

    if(currentShape === 'inset') shadow = `inset ${shadow}`;
    if(currentShape === 'concave') gradient = `linear-gradient(145deg, ${darkColor}, ${lightColor})`;
    if(currentShape === 'convex') gradient = `linear-gradient(145deg, ${lightColor}, ${darkColor})`;

    preview.style.boxShadow = shadow;
    preview.style.background = gradient || color;
    
    let cssText = `border-radius: 40px;\nbackground: ${gradient || color};\nbox-shadow: ${shadow};`;
    codeEl.textContent = cssText;
}

function setShape(type) {
    currentShape = type;
    document.querySelectorAll('.btn-outline-primary').forEach(b => b.classList.remove('active'));
    document.getElementById('btn-' + type).classList.add('active');
    updateNeu();
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Neumorphic CSS copied!');
}

[colorIn, distIn, intIn].forEach(el => el.addEventListener('input', updateNeu));
updateNeu();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>