

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
                        <h5 class="fw-bold mb-4">Shape Settings</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Direction</label>
                            <select id="tri-dir" class="form-select">
                                <option value="top">Top</option>
                                <option value="bottom">Bottom</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                                <option value="topleft">Top Left</option>
                                <option value="topright">Top Right</option>
                                <option value="bottomleft">Bottom Left</option>
                                <option value="bottomright">Bottom Right</option>
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Color</label>
                                <input type="color" id="tri-color" class="form-control form-control-color w-100" value="#10b981">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold d-flex justify-content-between">
                                    Size <span><span id="tri-size-val">50</span>px</span>
                                </label>
                                <input type="range" id="tri-size" class="form-range" min="10" max="200" value="50">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border border-dashed" style="min-height: 250px;">
                            <div id="tri-preview"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Generated CSS</h6>
                            <pre id="tri-code" class="text-success m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
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
.border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>

<script>
const preview = document.getElementById('tri-preview');
const codeEl = document.getElementById('tri-code');
const dirSelect = document.getElementById('tri-dir');
const colorInput = document.getElementById('tri-color');
const sizeInput = document.getElementById('tri-size');
const sizeVal = document.getElementById('tri-size-val');

function updateTriangle() {
    const dir = dirSelect.value;
    const color = colorInput.value;
    const size = parseInt(sizeInput.value);
    sizeVal.textContent = size;

    let styles = {
        width: '0',
        height: '0',
        borderStyle: 'solid'
    };

    let cssText = '';

    switch(dir) {
        case 'top':
            styles.borderWidth = `0 ${size}px ${size}px ${size}px`;
            styles.borderColor = `transparent transparent ${color} transparent`;
            break;
        case 'bottom':
            styles.borderWidth = `${size}px ${size}px 0 ${size}px`;
            styles.borderColor = `${color} transparent transparent transparent`;
            break;
        case 'left':
            styles.borderWidth = `${size}px ${size}px ${size}px 0`;
            styles.borderColor = `transparent ${color} transparent transparent`;
            break;
        case 'right':
            styles.borderWidth = `${size}px 0 ${size}px ${size}px`;
            styles.borderColor = `transparent transparent transparent ${color}`;
            break;
        case 'topleft':
            styles.borderWidth = `${size}px ${size}px 0 0`;
            styles.borderColor = `${color} transparent transparent transparent`;
            break;
        case 'topright':
            styles.borderWidth = `0 ${size}px ${size}px 0`;
            styles.borderColor = `transparent ${color} transparent transparent`;
            break;
        case 'bottomleft':
            styles.borderWidth = `${size}px 0 0 ${size}px`;
            styles.borderColor = `transparent transparent transparent ${color}`;
            break;
        case 'bottomright':
            styles.borderWidth = `0 0 ${size}px ${size}px`;
            styles.borderColor = `transparent transparent transparent ${color}`;
            break;
    }

    Object.assign(preview.style, styles);
    
    cssText = `width: 0;\nheight: 0;\nborder-style: solid;\nborder-width: ${styles.borderWidth};\nborder-color: ${styles.borderColor};`;
    codeEl.textContent = cssText;
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Triangle CSS copied!');
}

[dirSelect, colorInput, sizeInput].forEach(el => el.addEventListener('input', updateTriangle));
updateTriangle();
</script>






