

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
                        <h5 class="fw-bold mb-4">Shape Mechanics</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Growth Complexity</label>
                            <input type="range" id="blob-complexity" class="form-range" min="1" max="100" value="50">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Fluidity</label>
                            <input type="range" id="blob-fluidity" class="form-range" min="1" max="100" value="50">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Blob Color</label>
                            <input type="color" id="blob-color" class="form-control form-control-color w-100" value="#8b5cf6">
                        </div>

                        <button id="blob-random" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                            <i class="fa-solid fa-shuffle me-2"></i> Randomize Shape
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border" style="min-height: 350px;">
                            <div id="blob-preview" style="width: 250px; height: 250px; background: #8b5cf6; transition: border-radius 0.3s ease;"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Generated Styles</h6>
                            <pre id="blob-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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
const preview = document.getElementById('blob-preview');
const codeEl = document.getElementById('blob-code');
const colorInput = document.getElementById('blob-color');
const complexity = document.getElementById('blob-complexity');
const fluidity = document.getElementById('blob-fluidity');
const randomBtn = document.getElementById('blob-random');

function getRand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function updateBlob() {
    const r1 = getRand(20, 80);
    const r2 = getRand(20, 80);
    const r3 = getRand(20, 80);
    const r4 = getRand(20, 80);
    
    const r5 = getRand(20, 80);
    const r6 = getRand(20, 80);
    const r7 = getRand(20, 80);
    const r8 = getRand(20, 80);

    const borderRadius = `${r1}% ${100-r1}% ${r3}% ${100-r3}% / ${r5}% ${r6}% ${100-r6}% ${100-r5}%`;
    
    preview.style.borderRadius = borderRadius;
    preview.style.background = colorInput.value;
    
    codeEl.textContent = `width: 250px;\nheight: 250px;\nbackground: ${colorInput.value};\nborder-radius: ${borderRadius};`;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Blob CSS copied!');
}

colorInput.addEventListener('input', () => {
    preview.style.background = colorInput.value;
    updateBlob(); // Regenerate shape too
});

randomBtn.addEventListener('click', updateBlob);
[complexity, fluidity].forEach(el => el.addEventListener('input', updateBlob));

updateBlob();
</script>






