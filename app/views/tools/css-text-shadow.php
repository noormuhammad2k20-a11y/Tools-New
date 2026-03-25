

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Shadow Properties</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                X Offset <span><span id="x-val">2</span>px</span>
                            </label>
                            <input type="range" id="ts-x" class="form-range" min="-50" max="50" value="2">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Y Offset <span><span id="y-val">2</span>px</span>
                            </label>
                            <input type="range" id="ts-y" class="form-range" min="-50" max="50" value="2">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Blur Radius <span><span id="blur-val">4</span>px</span>
                            </label>
                            <input type="range" id="ts-blur" class="form-range" min="0" max="50" value="4">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Shadow Color</label>
                                <input type="color" id="ts-color" class="form-control form-control-color w-100" value="#000000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Opacity</label>
                                <input type="range" id="ts-opacity" class="form-range" min="0" max="100" value="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border" style="min-height: 250px;">
                            <h2 id="ts-preview" class="display-3 fw-bold m-0" style="color: #1e293b;">Shadow Text</h2>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">CSS Code</h6>
                            <pre id="ts-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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




<script>
const preview = document.getElementById('ts-preview');
const codeEl = document.getElementById('ts-code');
const xIn = document.getElementById('ts-x');
const yIn = document.getElementById('ts-y');
const blurIn = document.getElementById('ts-blur');
const colorIn = document.getElementById('ts-color');
const opacityIn = document.getElementById('ts-opacity');

const xVal = document.getElementById('x-val');
const yVal = document.getElementById('y-val');
const blurVal = document.getElementById('blur-val');

function hexToRgba(hex, opacity) {
    let r = parseInt(hex.slice(1, 3), 16);
    let g = parseInt(hex.slice(3, 5), 16);
    let b = parseInt(hex.slice(5, 7), 16);
    return `rgba(${r}, ${g}, ${b}, ${opacity / 100})`;
}

function updateShadow() {
    const x = xIn.value;
    const y = yIn.value;
    const blur = blurIn.value;
    const color = hexToRgba(colorIn.value, opacityIn.value);

    xVal.textContent = x;
    yVal.textContent = y;
    blurVal.textContent = blur;

    const shadow = `${x}px ${y}px ${blur}px ${color}`;
    preview.style.textShadow = shadow;
    codeEl.textContent = `text-shadow: ${shadow};`;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Text Shadow copied!');
}

[xIn, yIn, blurIn, colorIn, opacityIn].forEach(el => el.addEventListener('input', updateShadow));
updateShadow();
</script>






