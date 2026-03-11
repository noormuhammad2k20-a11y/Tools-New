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
                        <h5 class="fw-bold mb-4">Grid Config</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Columns <span><span id="col-val">3</span></span>
                            </label>
                            <input type="range" id="grid-cols" class="form-range" min="1" max="6" value="3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Rows <span><span id="row-val">3</span></span>
                            </label>
                            <input type="range" id="grid-rows" class="form-range" min="1" max="6" value="3">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Column Gap <span><span id="gap-val">20</span>px</span>
                            </label>
                            <input type="range" id="grid-gap" class="form-range" min="0" max="50" value="20">
                        </div>

                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-info-circle text-primary me-2"></i> Preview displays a simulated grid with numbered cells for clarity.
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 p-4 border overflow-auto" style="min-height: 300px;">
                            <div id="grid-preview" style="display: grid; min-height: 250px;"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">CSS Grid Code</h6>
                            <pre id="grid-code" class="text-success m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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


<style>
.bg-primary-soft { background-color: rgba(79, 70, 229, 0.05); }
</style>

<script>
const preview = document.getElementById('grid-preview');
const codeEl = document.getElementById('grid-code');
const colsIn = document.getElementById('grid-cols');
const rowsIn = document.getElementById('grid-rows');
const gapIn = document.getElementById('grid-gap');

const cVal = document.getElementById('col-val');
const rVal = document.getElementById('row-val');
const gVal = document.getElementById('gap-val');

function updateGrid() {
    const cols = colsIn.value;
    const rows = rowsIn.value;
    const gap = gapIn.value;

    cVal.textContent = cols;
    rVal.textContent = rows;
    gVal.textContent = gap;

    preview.style.gridTemplateColumns = `repeat(${cols}, 1fr)`;
    preview.style.gridTemplateRows = `repeat(${rows}, 1fr)`;
    preview.style.gap = `${gap}px`;

    // Clear and add cells
    preview.innerHTML = '';
    for(let i=1; i <= cols * rows; i++) {
        const cell = document.createElement('div');
        cell.className = 'bg-primary-soft border border-primary text-primary d-flex align-items-center justify-content-center rounded fw-bold';
        cell.style.minHeight = '60px';
        cell.textContent = i;
        preview.appendChild(cell);
    }

    const cssText = `.grid-container {\n  display: grid;\n  grid-template-columns: repeat(${cols}, 1fr);\n  grid-template-rows: repeat(${rows}, 1fr);\n  gap: ${gap}px;\n}`;
    codeEl.textContent = cssText;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Grid CSS copied!');
}

[colsIn, rowsIn, gapIn].forEach(el => el.addEventListener('input', updateGrid));
updateGrid();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>