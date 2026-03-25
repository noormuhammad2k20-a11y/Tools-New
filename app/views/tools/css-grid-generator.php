

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



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






