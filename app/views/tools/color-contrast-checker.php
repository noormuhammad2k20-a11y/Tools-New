

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-uppercase text-muted">Foreground Color (Text)</label>
                    <div class="input-group">
                        <input type="color" id="fg-color" class="form-control form-control-color" value="#ffffff" title="Choose your color">
                        <input type="text" id="fg-hex" class="form-control font-monospace text-uppercase" value="#FFFFFF" maxlength="7">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-uppercase text-muted">Background Color</label>
                    <div class="input-group">
                        <input type="color" id="bg-color" class="form-control form-control-color" value="#2563eb" title="Choose your color">
                        <input type="text" id="bg-hex" class="form-control font-monospace text-uppercase" value="#2563EB" maxlength="7">
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div id="preview-box" class="h-100 p-5 rounded-4 d-flex align-items-center justify-content-center text-center shadow-sm" style="background-color: #2563eb; color: #ffffff; min-height: 250px; border: 1px solid #e2e8f0;">
                        <div>
                            <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Aa</h2>
                            <p class="mb-0 fs-5">Can you read this text clearly?</p>
                            <small class="opacity-75 d-block mt-2">Example of how your selected colors look together.</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pro-card bg-light border-0 rounded-4 p-4 h-100">
                        <h4 class="fw-bold mb-4">Contrast Ratio</h4>
                        <div class="d-flex align-items-end mb-4">
                            <span id="ratio-display" class="display-4 fw-bold text-primary mb-0 me-2" style="font-variant-numeric: tabular-nums;">4.5</span>
                            <span class="fs-4 text-muted mb-2">: 1</span>
                        </div>
                        
                        <div class="vstack gap-3">
                            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-3 shadow-sm border">
                                <div>
                                    <h6 class="fw-bold mb-1">WCAG AA Normal Text</h6>
                                    <small class="text-muted">Requires 4.5:1 ratio</small>
                                </div>
                                <span id="badge-aa-normal" class="badge bg-success rounded-pill px-3 py-2 fs-6">PASS</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-3 shadow-sm border">
                                <div>
                                    <h6 class="fw-bold mb-1">WCAG AAA Normal Text</h6>
                                    <small class="text-muted">Requires 7.0:1 ratio</small>
                                </div>
                                <span id="badge-aaa-normal" class="badge bg-danger rounded-pill px-3 py-2 fs-6">FAIL</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-3 shadow-sm border">
                                <div>
                                    <h6 class="fw-bold mb-1">WCAG AA Large Text</h6>
                                    <small class="text-muted">Requires 3.0:1 ratio (18pt+)</small>
                                </div>
                                <span id="badge-aa-large" class="badge bg-success rounded-pill px-3 py-2 fs-6">PASS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Importance of Color Contrast</h2>
                    <p class="lead">Web accessibility is a critical component of modern web design. Our <strong>Color Contrast Checker Pro</strong> evaluates the relative luminance of your foreground (text) and background colors to determine if they meet the rigorous Web Content Accessibility Guidelines (WCAG) established by the W3C.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the Ratios</h3>
                    <p>The contrast ratio is calculated using a mathematical formula that compares the perceived brightness of two colors. The ratio ranges from 1:1 (no contrast, e.g., white on white) to 21:1 (maximum contrast, e.g., black on white).</p>
                    <ul>
                        <li><strong>Level AA (Minimum Standard):</strong> Requires a contrast ratio of at least <strong>4.5:1</strong> for normal text (under 18pt regular or 14pt bold). Large text requires a ratio of at least <strong>3.0:1</strong>.</li>
                        <li><strong>Level AAA (Enhanced Standard):</strong> Requires a contrast ratio of at least <strong>7.0:1</strong> for normal text, and <strong>4.5:1</strong> for large text. This is often required for government applications and healthcare platforms.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Designing for Visual Impairments</h3>
                    <p>Approximately 1 in 12 men and 1 in 200 women suffer from some form of color vision deficiency (color blindness). Low contrast text is not just an inconvenience—it actively prevents users with low vision or presbyopia from consuming your content. Ensuring compliance not only improves user experience but also boosts your SEO metrics by extending your accessible audience reach.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Real-Time Evaluation</h3>
                    <p>Our tool runs completely on the client side using pure Javascript math algorithms. As you drag the color picker or type in Hex codes, the relative luminance is instantly calculated in your browser, providing instant PASS/FAIL feedback without any server latency.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #3b82f6, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.form-control-color { width: 3rem !important; height: 3rem; padding: 0.375rem; border-top-right-radius: 0; border-bottom-right-radius: 0; cursor: pointer; }
#fg-hex, #bg-hex { font-weight: bold; border-top-left-radius: 0; border-bottom-left-radius: 0; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const fgInput = document.getElementById('fg-color');
    const bgInput = document.getElementById('bg-color');
    const fgHex = document.getElementById('fg-hex');
    const bgHex = document.getElementById('bg-hex');
    
    const previewBox = document.getElementById('preview-box');
    const ratioDisplay = document.getElementById('ratio-display');
    
    const badgeAANormal = document.getElementById('badge-aa-normal');
    const badgeAAANormal = document.getElementById('badge-aaa-normal');
    const badgeAALarge = document.getElementById('badge-aa-large');

    // Hex to RGB
    function hexToRgb(hex) {
        let shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, (m, r, g, b) => r + r + g + g + b + b);
        let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    // Calculate Relative Luminance
    function getLuminance(r, g, b) {
        let a = [r, g, b].map(function (v) {
            v /= 255;
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return a[0] * 0.2126 + a[1] * 0.7152 + a[2] * 0.0722;
    }

    // Update UI
    function updateContrast() {
        let fgColor = fgHex.value;
        let bgColor = bgHex.value;

        // Apply to preview
        previewBox.style.color = fgColor;
        previewBox.style.backgroundColor = bgColor;

        let fgRgb = hexToRgb(fgColor);
        let bgRgb = hexToRgb(bgColor);

        if (fgRgb && bgRgb) {
            let l1 = getLuminance(fgRgb.r, fgRgb.g, fgRgb.b);
            let l2 = getLuminance(bgRgb.r, bgRgb.g, bgRgb.b);

            let lightest = Math.max(l1, l2);
            let darkest = Math.min(l1, l2);

            let ratio = (lightest + 0.05) / (darkest + 0.05);
            let roundedRatio = ratio.toFixed(2);
            
            ratioDisplay.textContent = roundedRatio;

            // Set Badges
            updateBadge(badgeAANormal, ratio >= 4.5);
            updateBadge(badgeAAANormal, ratio >= 7.0);
            updateBadge(badgeAALarge, ratio >= 3.0);
        }
    }

    function updateBadge(badge, isPass) {
        if (isPass) {
            badge.textContent = 'PASS';
            badge.className = 'badge bg-success rounded-pill px-3 py-2 fs-6';
        } else {
            badge.textContent = 'FAIL';
            badge.className = 'badge bg-danger rounded-pill px-3 py-2 fs-6';
        }
    }

    // Event Listeners
    fgInput.addEventListener('input', (e) => { fgHex.value = e.target.value.toUpperCase(); updateContrast(); });
    bgInput.addEventListener('input', (e) => { bgHex.value = e.target.value.toUpperCase(); updateContrast(); });
    
    fgHex.addEventListener('input', (e) => { let v = e.target.value; if(v.length===7 && v.startsWith('#')) { fgInput.value = v; updateContrast(); } });
    bgHex.addEventListener('input', (e) => { let v = e.target.value; if(v.length===7 && v.startsWith('#')) { bgInput.value = v; updateContrast(); } });

    // Initial load
    updateContrast();
});
</script>






