

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
                        <h5 class="fw-bold mb-4">Input Base64</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Paste Base64 String</label>
                            <textarea id="b64-in" class="form-control" rows="8" placeholder="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg=="></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Size (px)</label>
                            <input type="number" id="b64-size" class="form-control" value="100">
                        </div>

                        <button id="b64-gen" class="btn btn-dark w-100 py-3 rounded-pill fw-bold">
                            <i class="fa-solid fa-wand-magic me-2"></i> Generate Pattern
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div id="b64-preview" class="rounded-4 shadow-sm mb-4 flex-grow-1 border" style="min-height: 250px; background-size: 100px;"></div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">CSS Code</h6>
                            <pre id="b64-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace; font-size: 0.8rem; max-height: 150px; overflow-y: auto;"></pre>
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
const input = document.getElementById('b64-in');
const sizeIn = document.getElementById('b64-size');
const preview = document.getElementById('b64-preview');
const codeEl = document.getElementById('b64-code');
const genBtn = document.getElementById('b64-gen');

function updatePattern() {
    const val = input.value.trim();
    const size = sizeIn.value;
    if(!val) return;

    preview.style.backgroundImage = `url("${val}")`;
    preview.style.backgroundSize = `${size}px`;
    
    const css = `background-image: url("${val}");\nbackground-size: ${size}px;\nbackground-repeat: repeat;`;
    codeEl.textContent = css;
}

genBtn.addEventListener('click', updatePattern);

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Pattern CSS copied!');
}
</script>






