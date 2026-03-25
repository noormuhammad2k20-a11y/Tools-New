

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
                        <h5 class="fw-bold mb-4">Base Branding</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Brand Color (HEX)</label>
                            <div class="input-group">
                                <input type="color" id="base-color-picker" class="form-control form-control-color" value="#3b82f6" style="width: 60px;">
                                <input type="text" id="base-color-text" class="form-control" value="#3b82f6">
                            </div>
                        </div>

                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-wand-magic-sparkles text-primary me-2"></i> The generator uses interpolation and luminance adjustments to build the scale.
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div id="palette-rows" class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 p-4 border grid gap-2">
                            <!-- JS Generated Rows -->
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-white-50 small fw-bold text-uppercase mb-0">Tailwind Config (JSON)</h6>
                                <button onclick="copyCode()" class="btn btn-sm btn-outline-light rounded-pill">
                                    <i class="fa-solid fa-copy me-1"></i> Copy
                                </button>
                            </div>
                            <pre id="palette-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace; font-size: 0.85rem; max-height: 200px; overflow-y: auto;"></pre>
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
const rows = document.getElementById('palette-rows');
const codeEl = document.getElementById('palette-code');
const colorPicker = document.getElementById('base-color-picker');
const colorText = document.getElementById('base-color-text');

function ColorLuminance(hex, lum) {
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    if (hex.length < 6) hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
    lum = lum || 0;
    let rgb = "#", c, i;
    for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ("00"+c).substr(c.length);
    }
    return rgb;
}

const stops = [50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950];
const lums = [0.95, 0.9, 0.75, 0.5, 0.25, 0, -0.2, -0.4, -0.6, -0.8, -0.9];

function updatePalette() {
    const base = colorText.value;
    rows.innerHTML = '';
    let json = {\n  "brand": {\n;
    
    stops.forEach((stop, i) => {
        const hex = ColorLuminance(base, lums[i]);
        const row = document.createElement('div');
        row.className = 'd-flex align-items-center gap-3 p-2 rounded border';
        row.innerHTML = `
            <div class="rounded shadow-sm" style="width: 50px; height: 30px; background: ${hex}; border: 1px solid rgba(0,0,0,0.1)"></div>
            <div class="fw-bold small" style="width: 40px;">${stop}</div>
            <div class="text-muted small font-monospace flex-grow-1">${hex}</div>
            <button class="btn btn-sm btn-light border p-1" onclick="toast('Copied ${hex}'); navigator.clipboard.writeText('${hex}')"><i class="fa-solid fa-copy"></i></button>
        `;
        rows.appendChild(row);
        json += `    "${stop}": "${hex}"${i === stops.length - 1 ? '' : ','}\n`;
    });

    json += "  }\n}";
    codeEl.textContent = json;
}

colorPicker.addEventListener('input', (e) => {
    colorText.value = e.target.value;
    updatePalette();
});

colorText.addEventListener('input', (e) => {
    if(/^#[0-9A-F]{6}$/i.test(e.target.value)) {
        colorPicker.value = e.target.value;
        updatePalette();
    }
});

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Tailwind JSON copied!');
}

updatePalette();
</script>






