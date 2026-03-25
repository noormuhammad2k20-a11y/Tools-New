

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row gx-5">
                <!-- Configuration Options -->
                <div class="col-lg-5 mb-4 mb-lg-0 border-end pe-lg-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                        <h5 class="fw-bold mb-0 text-muted">Shadow Properties</h5>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" id="sh-inset">
                            <label class="form-check-label fw-bold small text-muted" for="sh-inset">Inset (Inner)</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-bold small mb-0">Horizontal Offset (X)</label>
                            <span class="badge bg-light text-dark shadow-sm border" id="val-x">10px</span>
                        </div>
                        <input type="range" class="form-range" id="sh-x" min="-100" max="100" value="10">
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-bold small mb-0">Vertical Offset (Y)</label>
                            <span class="badge bg-light text-dark shadow-sm border" id="val-y">10px</span>
                        </div>
                        <input type="range" class="form-range" id="sh-y" min="-100" max="100" value="10">
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-bold small mb-0">Blur Radius</label>
                            <span class="badge bg-light text-dark shadow-sm border" id="val-blur">20px</span>
                        </div>
                        <input type="range" class="form-range" id="sh-blur" min="0" max="150" value="20">
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label fw-bold small mb-0">Spread Radius</label>
                            <span class="badge bg-light text-dark shadow-sm border" id="val-spread">0px</span>
                        </div>
                        <input type="range" class="form-range" id="sh-spread" min="-100" max="100" value="0">
                    </div>

                    <div class="row gx-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Shadow Color</label>
                            <input type="color" id="sh-color-hex" class="form-control form-control-color w-100 border-2" value="#000000">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Opacity</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="range" class="form-range" id="sh-opacity" min="0" max="1" step="0.01" value="0.25">
                                <span class="badge bg-light text-dark shadow-sm border" id="val-opacity" style="min-width: 45px;">0.25</span>
                            </div>
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted mt-4">Demo Context</h5>
                    <div class="row gx-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Box Background</label>
                            <input type="color" id="bg-box" class="form-control form-control-color w-100 border-2" value="#ffffff">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Page Background</label>
                            <input type="color" id="bg-page" class="form-control form-control-color w-100 border-2" value="#f8fafc">
                        </div>
                    </div>

                </div>

                <!-- Preview Output -->
                <div class="col-lg-7 ps-lg-4 d-flex flex-column">
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-muted small text-uppercase tracking-wider">Live Sandbox</label>
                    </div>

                    <div id="demo-env" class="flex-grow-1 rounded-4 d-flex justify-content-center align-items-center border overflow-hidden mb-4" style="min-height: 350px; background-color: #f8fafc;">
                        <div id="demo-box" class="d-flex justify-content-center align-items-center fw-bold text-muted" style="width: 250px; height: 250px; background-color: #ffffff; border-radius: 20px;">
                            Preview Module
                        </div>
                    </div>

                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark small text-uppercase tracking-wider mb-0"><i class="fa-brands fa-css3-alt me-2 text-primary"></i>Generated CSS</label>
                            <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm" onclick="copyCss()"><i class="fa-regular fa-copy me-2"></i>Copy Rule</button>
                        </div>
                        <textarea id="out-css" class="form-control bg-dark text-light border-0 rounded-4 p-4 shadow-sm" rows="3" readonly style="font-family: var(--font-mono); font-size: 15px; resize: none;"></textarea>
                    </div>

                </div>
            </div>

            <!-- Presets -->
            <div class="mt-5 border-top pt-4">
                <h6 class="fw-bold text-muted small text-uppercase tracking-wider mb-3">Professional UI Presets</h6>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-sm btn-outline-secondary" onclick="preset(0, 4, 6, -1, 0.1, false)"><i class="fa-solid fa-shapes me-1"></i> Subtle Hover</button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="preset(0, 10, 25, -5, 0.2, false)"><i class="fa-brands fa-apple me-1"></i> macOS Window</button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="preset(0, 2, 4, 0, 0.08, false)"><i class="fa-solid fa-note-sticky me-1"></i> Card Border</button>
                    <button class="btn btn-sm btn-outline-secondary" onclick="preset(0, 5, 20, 0, 0.5, true)"><i class="fa-brands fa-neos me-1"></i> Neumorphic Inset</button>
                </div>
            </div>

        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Architecture of Depth Perception</h2>
                    <p class="lead">Flat design is dead. Modern Web 3.0 interfaces rely heavily on Z-axis elevation to communicate visual hierarchy, interactivity, and focal points to users. Our <strong>Pro CSS Box Shadow Generator</strong> enables frontend engineers to dynamically calculate volumetric light sources without writing clunky, error-prone hexadecimal syntax.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the 5 Axes</h3>
                    <p>The <code>box-shadow</code> CSS property allows an almost infinite combination of parameters. Understanding the fundamental order of operations is crucial:</p>
                    <ol>
                        <li><strong>Inset (Optional):</strong> Flips the shadow to render <i>inside</i> the bounding box constraints.</li>
                        <li><strong>Horizontal Offset X:</strong> Pushes the shadow right (positive) or left (negative).</li>
                        <li><strong>Vertical Offset Y:</strong> Pushes the shadow down (positive) or up (negative).</li>
                        <li><strong>Blur Radius:</strong> Controls the gradient softness. A value of `0` creates a harsh, 8-bit retro shadow.</li>
                        <li><strong>Spread Radius:</strong> Physically inflates or deflates the core shadow mass before blur is applied.</li>
                        <li><strong>Color (RGBA):</strong> Defines the pigment and alpha transparency channel simultaneously.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why RGBA is Superior to HEX</h3>
                    <p>Historically, developers used solid Hexadecimal colors (like `#cccccc`) for shadows. This caused catastrophic visual conflicts when a light-grey shadow hovered over a dark-grey background image—the shadow looked like solid paint rather than actual light occlusion. By utilizing `rgba(0, 0, 0, 0.25)`, the shadow mathematically darkens whatever specific pixels sit directly beneath it, simulating true physics.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #4f46e5, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
input[type="range"] { cursor: pointer; }
input[type="color"] { cursor: pointer; height: 40px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const shX = document.getElementById('sh-x');
    const shY = document.getElementById('sh-y');
    const shBlur = document.getElementById('sh-blur');
    const shSpread = document.getElementById('sh-spread');
    const shColorHex = document.getElementById('sh-color-hex');
    const shOpacity = document.getElementById('sh-opacity');
    const shInset = document.getElementById('sh-inset');
    
    const uiDemoBox = document.getElementById('demo-box');
    const uiDemoEnv = document.getElementById('demo-env');
    const outCss = document.getElementById('out-css');

    const bgBox = document.getElementById('bg-box');
    const bgPage = document.getElementById('bg-page');

    function hexToRgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : {r: 0, g: 0, b: 0};
    }

    function build() {
        const x = shX.value;
        const y = shY.value;
        const blur = shBlur.value;
        const spread = shSpread.value;
        const opacity = shOpacity.value;
        const insetStr = shInset.checked ? 'inset ' : '';

        // Update Labels
        document.getElementById('val-x').textContent = x + 'px';
        document.getElementById('val-y').textContent = y + 'px';
        document.getElementById('val-blur').textContent = blur + 'px';
        document.getElementById('val-spread').textContent = spread + 'px';
        document.getElementById('val-opacity').textContent = opacity;

        const rgb = hexToRgb(shColorHex.value);
        const rgbaStr = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, ${opacity})`;

        const rule = `${insetStr}${x}px ${y}px ${blur}px ${spread}px ${rgbaStr}`;
        
        // Apply
        uiDemoBox.style.boxShadow = rule;
        outCss.value = `-webkit-box-shadow: ${rule};\n-moz-box-shadow: ${rule};\nbox-shadow: ${rule};`;
        
        // Context
        uiDemoBox.style.backgroundColor = bgBox.value;
        uiDemoEnv.style.backgroundColor = bgPage.value;
    }

    // Attach Context
    bgBox.addEventListener('input', build);
    bgPage.addEventListener('input', build);

    // Attach Shadow Variables
    const controls = [shX, shY, shBlur, shSpread, shColorHex, shOpacity, shInset];
    controls.forEach(c => {
        c.addEventListener('input', build);
    });

    window.preset = (x, y, b, s, o, i) => {
        shX.value = x;
        shY.value = y;
        shBlur.value = b;
        shSpread.value = s;
        shOpacity.value = o;
        shInset.checked = i;
        build();
    };

    window.copyCss = () => {
        outCss.select();
        document.execCommand('copy');
        showToast('CSS Copied to clipboard!');
    };

    // Load Default
    build();
});
</script>






