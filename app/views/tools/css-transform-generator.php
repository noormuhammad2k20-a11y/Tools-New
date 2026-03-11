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
                        <h5 class="fw-bold mb-4">Space &amp; Geometry</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Rotate X <span><span id="rx-val">0</span>°</span>
                            </label>
                            <input type="range" id="tra-rx" class="form-range" min="-180" max="180" value="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Rotate Y <span><span id="ry-val">0</span>°</span>
                            </label>
                            <input type="range" id="tra-ry" class="form-range" min="-180" max="180" value="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Rotate Z <span><span id="rz-val">0</span>°</span>
                            </label>
                            <input type="range" id="tra-rz" class="form-range" min="-180" max="180" value="0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Scale <span><span id="sc-val">1.0</span></span>
                            </label>
                            <input type="range" id="tra-sc" class="form-range" min="0.5" max="2.0" step="0.1" value="1.0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Skew X <span><span id="sk-val">0</span>°</span>
                            </label>
                            <input type="range" id="tra-sk" class="form-range" min="-45" max="45" value="0">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border overflow-hidden" style="min-height: 250px; perspective: 1000px;">
                            <div id="tra-preview" style="width: 120px; height: 120px; background: #10b981; border-radius: 20px; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">TRANSFORM</div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Transform CSS</h6>
                            <pre id="tra-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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
const preview = document.getElementById('tra-preview');
const codeEl = document.getElementById('tra-code');
const rxIn = document.getElementById('tra-rx');
const ryIn = document.getElementById('tra-ry');
const rzIn = document.getElementById('tra-rz');
const scIn = document.getElementById('tra-sc');
const skIn = document.getElementById('tra-sk');

const rxVal = document.getElementById('rx-val');
const ryVal = document.getElementById('ry-val');
const rzVal = document.getElementById('rz-val');
const scVal = document.getElementById('sc-val');
const skVal = document.getElementById('sk-val');

function updateTransform() {
    const rx = rxIn.value;
    const ry = ryIn.value;
    const rz = rzIn.value;
    const sc = scIn.value;
    const sk = skIn.value;

    rxVal.textContent = rx;
    ryVal.textContent = ry;
    rzVal.textContent = rz;
    scVal.textContent = sc;
    skVal.textContent = sk;

    const transform = `rotateX(${rx}deg) rotateY(${ry}deg) rotateZ(${rz}deg) scale(${sc}) skewX(${sk}deg)`;
    preview.style.transform = transform;
    codeEl.textContent = `transform: ${transform};`;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Transform CSS copied!');
}

[rxIn, ryIn, rzIn, scIn, skIn].forEach(el => el.addEventListener('input', updateTransform));
updateTransform();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>