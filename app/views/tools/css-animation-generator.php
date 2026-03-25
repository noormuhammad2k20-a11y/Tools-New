

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
                        <h5 class="fw-bold mb-4">Animation Config</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Select Preset</label>
                            <select id="ani-preset" class="form-select">
                                <option value="bounce">Bounce</option>
                                <option value="pulse">Pulse</option>
                                <option value="shake">Shake</option>
                                <option value="spin">Spin</option>
                                <option value="fadeIn">Fade In</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                Duration <span><span id="dur-val">2</span>s</span>
                            </label>
                            <input type="range" id="ani-dur" class="form-range" min="0.1" max="5" step="0.1" value="2">
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Timing Function</label>
                            <select id="ani-timing" class="form-select">
                                <option value="ease">Ease</option>
                                <option value="linear">Linear</option>
                                <option value="ease-in-out">Ease In Out</option>
                                <option value="cubic-bezier(0.68, -0.55, 0.27, 1.55)">Bouncy</option>
                            </select>
                        </div>

                        <button onclick="restartAni()" class="btn btn-warning w-100 py-3 rounded-pill fw-bold text-white shadow-sm">
                            <i class="fa-solid fa-play me-2"></i> Restart Animation
                        </button>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 d-flex align-items-center justify-content-center border" style="min-height: 250px;">
                            <div id="ani-preview" style="width: 80px; height: 80px; background: #f59e0b; border-radius: 15px;"></div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Keyframes Code</h6>
                            <pre id="ani-code" class="text-warning m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace; font-size: 0.9rem;"></pre>
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
const preview = document.getElementById('ani-preview');
const codeEl = document.getElementById('ani-code');
const presetSelect = document.getElementById('ani-preset');
const durIn = document.getElementById('ani-dur');
const timingSelect = document.getElementById('ani-timing');
const dynamicStyles = document.getElementById('ani-dynamic-styles');
const durVal = document.getElementById('dur-val');

const presets = {
    bounce: `@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-30px);}
  60% {transform: translateY(-15px);}
}`,
    pulse: `@keyframes pulse {
  0% {transform: scale(1);}
  50% {transform: scale(1.1);}
  100% {transform: scale(1);}
}`,
    shake: `@keyframes shake {
  0%, 100% {transform: translateX(0);}
  10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
  20%, 40%, 60%, 80% {transform: translateX(10px);}
}`,
    spin: `@keyframes spin {
  from {transform: rotate(0deg);}
  to {transform: rotate(360deg);}
}`,
    fadeIn: `@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}`
};

function updateAnimation() {
    const preset = presetSelect.value;
    const dur = durIn.value;
    const timing = timingSelect.value;
    
    durVal.textContent = dur;

    const keyframes = presets[preset];
    const styles = `${keyframes}\n\n.animate {\n  animation: ${preset} ${dur}s ${timing} infinite;\n}`;
    
    dynamicStyles.innerHTML = styles;
    preview.className = '';
    // Trigger reflow
    void preview.offsetWidth;
    preview.className = 'animate';
    
    codeEl.textContent = styles;
}

function restartAni() {
    preview.className = '';
    void preview.offsetWidth;
    preview.className = 'animate';
}

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Animation CSS copied!');
}

[presetSelect, durIn, timingSelect].forEach(el => el.addEventListener('input', updateAnimation));
updateAnimation();
</script>






