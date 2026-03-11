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
                        <h5 class="fw-bold mb-4">Ribbon Options</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Ribbon Text</label>
                            <input type="text" id="rib-text" class="form-control" value="PRO">
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Base Color</label>
                                <input type="color" id="rib-color" class="form-control form-control-color w-100" value="#f43f5e">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Text Color</label>
                                <input type="color" id="rib-text-color" class="form-control form-control-color w-100" value="#ffffff">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Position</label>
                            <select id="rib-pos" class="form-select">
                                <option value="top-right">Top Right</option>
                                <option value="top-left">Top Left</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 border p-5 position-relative overflow-hidden" style="min-height: 250px;">
                            <div id="rib-demo-box" class="w-100 h-100 bg-light rounded shadow-sm border position-relative">
                                <div id="rib-preview" class="ribbon">PRO</div>
                                <div class="p-4"><p class="text-muted small">Example Card Content</p></div>
                            </div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Generated CSS &amp; HTML</h6>
                            <pre id="rib-code" class="text-warning m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
                            <button onclick="copyCode()" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-4 rounded-pill">
                                <i class="fa-solid fa-copy me-1"></i> Copy All
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
const preview = document.getElementById('rib-preview');
const codeEl = document.getElementById('rib-code');
const textInput = document.getElementById('rib-text');
const colorInput = document.getElementById('rib-color');
const textColorInput = document.getElementById('rib-text-color');
const posSelect = document.getElementById('rib-pos');
const dynamicStyles = document.getElementById('rib-dynamic-styles');

function updateRibbon() {
    const text = textInput.value;
    const color = colorInput.value;
    const textColor = textColorInput.value;
    const pos = posSelect.value;
    
    preview.textContent = text;
    
    const isRight = pos === 'top-right';
    
    const css = `.ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
    top: -10px;
    ${isRight ? 'right: -10px;' : 'left: -10px;'}
}
.ribbon::before, .ribbon::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid ${color};
    opacity: 0.7;
}
.ribbon::before {
    top: 0;
    ${isRight ? 'left: 0;' : 'right: 0;'}
}
.ribbon::after {
    bottom: 0;
    ${isRight ? 'right: 0;' : 'left: 0;'}
}
.ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: ${color};
    box-shadow: 0 5px 10px rgba(0,0,0,.1);
    color: ${textColor};
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0,0,0,.2);
    text-transform: uppercase;
    text-align: center;
    ${isRight ? 'left: -25px; top: 30px; transform: rotate(45deg);' : 'right: -25px; top: 30px; transform: rotate(-45deg);'}
}`;

    dynamicStyles.innerHTML = css.replace('.ribbon', '#rib-preview').replace('.ribbon::', '#rib-preview::');
    
    // Preview fix: Use a span child for the actual ribbon text rotated
    preview.innerHTML = `<span>${text}</span>`;

    const htmlCode = `<div class="ribbon"><span>${text}</span></div>`;
    codeEl.textContent = `<style>\n${css}\n</style>\n\n${htmlCode}`;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Ribbon Code copied!');
}

[textInput, colorInput, textColorInput, posSelect].forEach(el => el.addEventListener('input', updateRibbon));
updateRibbon();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>