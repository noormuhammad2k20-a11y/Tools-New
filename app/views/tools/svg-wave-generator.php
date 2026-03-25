

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






