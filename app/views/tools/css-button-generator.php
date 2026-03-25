

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
                        <h5 class="fw-bold mb-4">Button Styling</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Button Text</label>
                            <input type="text" id="btn-text" class="form-control" value="Click Me Now">
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Background</label>
                                <input type="color" id="btn-bg" class="form-control form-control-color w-100" value="#0ea5e9">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Text Color</label>
                                <input type="color" id="btn-color" class="form-control form-control-color w-100" value="#ffffff">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Border Radius <span><span id="radius-val">12</span>px</span>
                            </label>
                            <input type="range" id="btn-radius" class="form-range" min="0" max="50" value="12">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Vertical Padding <span><span id="pv-val">15</span>px</span>
                            </label>
                            <input type="range" id="btn-pv" class="form-range" min="5" max="40" value="15">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Horizontal Padding <span><span id="ph-val">30</span>px</span>
                            </label>
                            <input type="range" id="btn-ph" class="form-range" min="10" max="60" value="30">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border" style="min-height: 250px;">
                            <button id="btn-preview" class="btn-custom">Click Me Now</button>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">CSS Snippet</h6>
                            <pre id="btn-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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
const preview = document.getElementById('btn-preview');
const codeEl = document.getElementById('btn-code');
const textIn = document.getElementById('btn-text');
const bgIn = document.getElementById('btn-bg');
const colorIn = document.getElementById('btn-color');
const radiusIn = document.getElementById('btn-radius');
const pvIn = document.getElementById('btn-pv');
const phIn = document.getElementById('btn-ph');

const rVal = document.getElementById('radius-val');
const pvVal = document.getElementById('pv-val');
const phVal = document.getElementById('ph-val');
const dynamicStyles = document.getElementById('btn-dynamic-styles');

function updateButton() {
    const text = textIn.value;
    const bg = bgIn.value;
    const color = colorIn.value;
    const radius = radiusIn.value;
    const pv = pvIn.value;
    const ph = phIn.value;

    rVal.textContent = radius;
    pvVal.textContent = pv;
    phVal.textContent = ph;

    preview.textContent = text;
    
    const css = `.btn-custom {
    background-color: ${bg};
    color: ${color};
    padding: ${pv}px ${ph}px;
    border-radius: ${radius}px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.btn-custom:hover {
    filter: brightness(1.1);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
.btn-custom:active {
    transform: translateY(0);
}`;

    dynamicStyles.innerHTML = css;
    codeEl.textContent = css;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Button CSS copied!');
}

[textIn, bgIn, colorIn, radiusIn, pvIn, phIn].forEach(el => el.addEventListener('input', updateButton));
updateButton();
</script>






