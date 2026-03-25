

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






