

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
                        <h5 class="fw-bold mb-4">Geometry Config</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Pattern Type</label>
                            <select id="pat-type" class="form-select">
                                <option value="dots">Polka Dots</option>
                                <option value="grid">Square Grid</option>
                                <option value="diagonal">Diagonal Lines</option>
                                <option value="cross">Crosshatch</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Foreground Color</label>
                            <input type="color" id="pat-color" class="form-control form-control-color w-100" value="#d97706">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Size / Spacing <span><span id="p-size-val">20</span>px</span>
                            </label>
                            <input type="range" id="pat-size" class="form-range" min="5" max="100" value="20">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Stroke / Radius <span><span id="p-stroke-val">2</span>px</span>
                            </label>
                            <input type="range" id="pat-stroke" class="form-range" min="1" max="20" value="2">
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div id="pat-preview" class="rounded-4 shadow-sm mb-4 flex-grow-1 border" style="min-height: 250px;"></div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Copy-Paste SVG CSS</h6>
                            <pre id="pat-code" class="text-warning m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace; font-size: 0.85rem; max-height: 120px; overflow-y: auto;"></pre>
                            <button onclick="copyCode()" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-4 rounded-pill">
                                <i class="fa-solid fa-copy me-1"></i> Copy CSS
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
const preview = document.getElementById('pat-preview');
const codeEl = document.getElementById('pat-code');
const typeSelect = document.getElementById('pat-type');
const colorIn = document.getElementById('pat-color');
const sizeIn = document.getElementById('pat-size');
const strokeIn = document.getElementById('pat-stroke');

function updatePattern() {
    const type = typeSelect.value;
    const color = colorIn.value;
    const size = parseInt(sizeIn.value);
    const stroke = parseInt(strokeIn.value);
    
    document.getElementById('p-size-val').textContent = size;
    document.getElementById('p-stroke-val').textContent = stroke;

    let patternContent = '';
    
    switch(type) {
        case 'dots':
            patternContent = `<circle cx="${size/2}" cy="${size/2}" r="${stroke}" fill="${color}" />`;
            break;
        case 'grid':
            patternContent = `<path d="M ${size} 0 L 0 0 0 ${size}" fill="none" stroke="${color}" stroke-width="${stroke}" />`;
            break;
        case 'diagonal':
            patternContent = `<path d="M-1,1 l2,-2 M0,${size} l${size},-${size} M${size-1},${size+1} l2,-2" stroke="${color}" stroke-width="${stroke}" />`;
            break;
        case 'cross':
            patternContent = `<path d="M ${size} 0 L 0 0 0 ${size}" fill="none" stroke="${color}" stroke-width="${stroke}" /><path d="M-1,1 l2,-2 M0,${size} l${size},-${size} M${size-1},${size+1} l2,-2" stroke="${color}" stroke-width="${stroke}" />`;
            break;
    }

    const svgString = `<svg xmlns='http://www.w3.org/2000/svg' width='${size}' height='${size}'>${patternContent}</svg>`;
    const base64Svg = btoa(svgString);
    const cssUrl = `url("data:image/svg+xml;base64,${base64Svg}")`;

    preview.style.backgroundImage = cssUrl;
    codeEl.textContent = `background-image: ${cssUrl};`;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Pattern CSS copied!');
}

[typeSelect, colorIn, sizeIn, strokeIn].forEach(el => el.addEventListener('input', updatePattern));
updatePattern();
</script>






