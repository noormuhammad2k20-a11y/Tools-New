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
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Wave Anatomy</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Wave Color</label>
                            <input type="color" id="wave-color" class="form-control form-control-color w-100" value="#0ea5e9">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Complexity <span><span id="comp-val">4</span></span>
                            </label>
                            <input type="range" id="wave-comp" class="form-range" min="1" max="10" value="4">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Height <span><span id="h-val">100</span>px</span>
                            </label>
                            <input type="range" id="wave-height" class="form-range" min="20" max="300" value="100">
                        </div>

                        <button id="wave-random" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                            <i class="fa-solid fa-shuffle me-2"></i> Randomize Path
                        </button>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 border overflow-hidden position-relative d-flex align-items-end" style="min-height: 250px;">
                            <div id="wave-preview" style="width: 100%; line-height: 0;"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">SVG Path Code</h6>
                            <pre id="wave-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace; max-height: 150px; overflow-y: auto;"></pre>
                            <button onclick="copyCode()" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-4 rounded-pill">
                                <i class="fa-solid fa-copy me-1"></i> Copy SVG
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
const preview = document.getElementById('wave-preview');
const codeEl = document.getElementById('wave-code');
const seedIn = document.getElementById('wave-random');
const colorIn = document.getElementById('wave-color');
const compIn = document.getElementById('wave-comp');
const heightIn = document.getElementById('wave-height');

function generateWave() {
    const color = colorIn.value;
    const comp = parseInt(compIn.value);
    const h = parseInt(heightIn.value);
    
    document.getElementById('comp-val').textContent = comp;
    document.getElementById('h-val').textContent = h;

    const width = 1440;
    const step = width / comp;
    let path = `M0,${h/2} `;
    
    for (let i = 0; i <= comp; i++) {
        const x = i * step;
        const y = Math.random() * h;
        const nextX = (i + 1) * step;
        const nextY = Math.random() * h;
        const controlX = x + step / 2;
        
        path += `C${controlX},${y} ${controlX},${nextY} ${nextX},${nextY} `;
    }

    path += `L${width},${h} L0,${h} Z`;
    
    const svg = `<svg viewBox="0 0 1440 ${h}" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width: 100%; height: ${h}px;">
  <path fill="${color}" fill-opacity="1" d="${path}"></path>
</svg>`;

    preview.innerHTML = svg;
    codeEl.textContent = svg;
}

seedIn.addEventListener('click', generateWave);
[colorIn, compIn, heightIn].forEach(el => el.addEventListener('input', generateWave));

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('SVG Wave code copied!');
}

generateWave();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>