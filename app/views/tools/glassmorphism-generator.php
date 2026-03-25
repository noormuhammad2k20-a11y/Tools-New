

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
                        <h5 class="fw-bold mb-4">Glass Physics</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Blur Intensity <span><span id="blur-val">10</span>px</span>
                            </label>
                            <input type="range" id="glass-blur" class="form-range" min="0" max="25" value="10">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Transparency <span><span id="trans-val">0.2</span></span>
                            </label>
                            <input type="range" id="glass-trans" class="form-range" min="0" max="1" step="0.05" value="0.2">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Outline Strength <span><span id="outline-val">0.1</span></span>
                            </label>
                            <input type="range" id="glass-outline" class="form-range" min="0" max="0.5" step="0.01" value="0.1">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Glass Tint</label>
                            <input type="color" id="glass-color" class="form-control form-control-color w-100" value="#ffffff">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="rounded-4 mb-4 flex-grow-1 d-flex align-items-center justify-content-center overflow-hidden position-relative" style="min-height: 350px; background: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?auto=format&amp;fit=crop&amp;q=80&amp;w=1000') center/cover;">
                            <div id="glass-preview" style="width: 280px; height: 180px; border-radius: 20px; display: flex; flex-column; p-4; justify-content: center; align-items: center; text-align: center; color: white;">
                                <div>
                                    <h4 class="fw-bold mb-1">Glass Card</h4>
                                    <p class="small opacity-75 m-0">Dynamic Blur Effect</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Glassmorphic CSS</h6>
                            <pre id="glass-code" class="text-success m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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
const preview = document.getElementById('glass-preview');
const codeEl = document.getElementById('glass-code');
const blurIn = document.getElementById('glass-blur');
const transIn = document.getElementById('glass-trans');
const outlineIn = document.getElementById('glass-outline');
const colorIn = document.getElementById('glass-color');

const bVal = document.getElementById('blur-val');
const tVal = document.getElementById('trans-val');
const oVal = document.getElementById('outline-val');

function hexToRgba(hex, opacity) {
    let r = parseInt(hex.slice(1, 3), 16);
    let g = parseInt(hex.slice(3, 5), 16);
    let b = parseInt(hex.slice(5, 7), 16);
    return `rgba(${r}, ${g}, ${b}, ${opacity})`;
}

function updateGlass() {
    const blur = blurIn.value;
    const trans = transIn.value;
    const outline = outlineIn.value;
    const color = colorIn.value;
    
    bVal.textContent = blur;
    tVal.textContent = trans;
    oVal.textContent = outline;

    const rgba = hexToRgba(color, trans);
    const borderRgba = hexToRgba(color, outline);

    preview.style.background = rgba;
    preview.style.backdropFilter = `blur(${blur}px)`;
    preview.style.webkitBackdropFilter = `blur(${blur}px)`;
    preview.style.border = `1px solid ${borderRgba}`;
    
    const cssText = `background: ${rgba};\nbackdrop-filter: blur(${blur}px);\n-webkit-backdrop-filter: blur(${blur}px);\nborder-radius: 20px;\nborder: 1px solid ${borderRgba};`;
    codeEl.textContent = cssText;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Glass CSS copied!');
}

[blurIn, transIn, outlineIn, colorIn].forEach(el => el.addEventListener('input', updateGlass));
updateGlass();
</script>






