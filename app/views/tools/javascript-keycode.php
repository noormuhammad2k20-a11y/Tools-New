<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        

        <div class="pro-card shadow-lg border-0 rounded-4 p-4 position-relative" id="main-capture-zone">
            
            <!-- Default Landing State -->
            <div id="landing-state" class="d-flex flex-column justify-content-center align-items-center text-center p-5" style="min-height: 400px;">
                <div class="pulse-ring mb-4"><i class="fa-regular fa-keyboard fa-4x text-primary"></i></div>
                <h2 class="fw-bold display-5 text-dark">Press Any Key To Begin...</h2>
                <p class="text-muted lead">The engine will natively capture your hardware input and translate the event architecture.</p>
            </div>

            <!-- Active Output State -->
            <div id="active-state" class="d-none">
                
                <div class="text-center mb-5 mt-3">
                    <h1 id="out-keycode" class="display-1 fw-bold text-primary mb-0" style="font-size: 8rem; line-height: 1; text-shadow: 0 10px 30px rgba(13, 110, 253, 0.2);">65</h1>
                    <p class="text-muted fw-bold text-uppercase tracking-wider">event.keyCode (Deprecated but widely used)</p>
                </div>

                <div class="row gx-4 mb-5">
                    
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card border-0 shadow-sm bg-light h-100 rounded-4 p-4 text-center">
                            <h6 class="text-muted text-uppercase tracking-wider small fw-bold mb-2">event.key</h6>
                            <h3 id="out-key" class="fw-bold text-dark mb-0" style="font-family: var(--font-mono); color: #d946ef !important;">"a"</h3>
                            <small class="text-muted mt-2">The value of the key pressed. (Accounts for Shift/Caps)</small>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card border-0 shadow-sm bg-light h-100 rounded-4 p-4 text-center">
                            <h6 class="text-muted text-uppercase tracking-wider small fw-bold mb-2">event.code</h6>
                            <h3 id="out-code" class="fw-bold text-dark mb-0" style="font-family: var(--font-mono); color: #06b6d4 !important;">"KeyA"</h3>
                            <small class="text-muted mt-2">The physical hardware layout placement. (Ignores Shift/Caps)</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm bg-light h-100 rounded-4 p-4 text-center">
                            <h6 class="text-muted text-uppercase tracking-wider small fw-bold mb-2">event.location</h6>
                            <h3 id="out-loc" class="fw-bold text-dark mb-0" style="font-family: var(--font-mono); color: #f59e0b !important;">0</h3>
                            <small class="text-muted mt-2">Identifies Left vs Right modifiers (e.g. Left Shift vs Right Shift)</small>
                        </div>
                    </div>

                </div>

                <!-- Event Log History -->
                <div class="card border border-2 rounded-4 shadow-sm overflow-hidden">
                    <div class="card-header bg-dark text-white p-3 d-flex justify-content-between align-items-center border-0">
                        <h6 class="fw-bold mb-0 text-uppercase tracking-wider small"><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>Event History Stack</h6>
                        <button class="btn btn-sm btn-outline-light rounded-pill px-3" onclick="clearHistory()">Clear Cache</button>
                    </div>
                    <div class="table-responsive" style="max-height: 250px; overflow-y: auto;">
                        <table class="table table-hover table-borderless align-middle mb-0 text-center" style="font-family: var(--font-mono); font-size: 14px;">
                            <thead class="bg-light border-bottom text-muted small position-sticky top-0 shadow-sm">
                                <tr>
                                    <th>event.key</th>
                                    <th>event.keyCode</th>
                                    <th>event.code</th>
                                </tr>
                            </thead>
                            <tbody id="history-log">
                                <!-- JS Injected Logs -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Event Listener Architectures</h2>
                    <p class="lead">Building immersive web environments, complex HTML5 games, or accessibility-first application interfaces necessitates precise hardware keyboard monitoring. Our <strong>Pro JS Keycode Visualizer</strong> interrupts native DOM propogation pipelines to analyze exact user inputs dynamically.</p>
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Problem With <code>event.keyCode</code></h3>
                    <p>Historically, developers exclusively utilized numerical integer mappings (like `13` for the Enter key or `32` for Spacebar) extracted from the `event.keyCode` property. Modifying components essentially meant writing heavy `switch` statements correlating integers. The W3C Consortium formally deprecated this standard because it failed dramatically when attempting to resolve complex international hardware layouts or AZERTY architectures across the globe.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Modern Approach: <code>event.code</code> vs <code>event.key</code></h3>
                    <ul>
                        <li><strong><code>event.key</code>:</strong> Is the literal printed value requested by the user. If you press 'A' holding the Shift key, `event.key` outputs exactly <code>"A"</code> (capitalized). This is phenomenal for form inputs and text tracking.</li>
                        <li><strong><code>event.code</code>:</strong> Analyzes the physical piece of plastic pushed on the QWERTY layout pad algorithmically, completely ignoring software modifiers. If you press Shift + A, the `event.code` remains stubbornly <code>"KeyA"</code>. This is phenomenal for WASD structural game tracking, ensuring movement logic remains intact regardless of localized laptop language paradigms.</li>
                    </ul>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<style>
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.pulse-ring { width: 120px; height: 120px; border-radius: 50%; display: flex; align-items: center; justify-content: center; animation: pulse 2s infinite; background-color: rgba(13, 110, 253, 0.1); }
@keyframes pulse { 0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.4); } 70% { transform: scale(1); box-shadow: 0 0 0 20px rgba(13, 110, 253, 0); } 100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(13, 110, 253, 0); } }
.history-row { animation: fadeDownIn 0.3s ease forwards; }
@keyframes fadeDownIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const landing = document.getElementById('landing-state');
    const active = document.getElementById('active-state');
    
    // Output nodes
    const oKeycode = document.getElementById('out-keycode');
    const oKey = document.getElementById('out-key');
    const oCode = document.getElementById('out-code');
    const oLoc = document.getElementById('out-loc');
    const hLog = document.getElementById('history-log');

    // Prevent default scrolling for space/arrows if we are focused generally
    // but we don't want to break entirely, just prevent annoying jump down
    window.addEventListener('keydown', function(e) {
        if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1 && e.target == document.body) {
            e.preventDefault();
        }
        
        processKeystroke(e);
    }, false);

    function processKeystroke(e) {
        // Transition state
        if(!landing.classList.contains('d-none')) {
            landing.classList.add('d-none');
            active.classList.remove('d-none');
        }

        const kc = e.keyCode || e.which; // Fallback for older spec
        const k = e.key === ' ' ? '(Space character)' : e.key; // Make space visible
        const c = e.code;
        const l = e.location;

        oKeycode.textContent = kc;
        oKey.textContent = `"${k}"`;
        oCode.textContent = `"${c}"`;
        oLoc.textContent = l;

        // Push to History Stack
        const tr = document.createElement('tr');
        tr.className = 'history-row bg-white border-bottom';
        tr.innerHTML = `
            <td class="fw-bold" style="color: #d946ef;">${k}</td>
            <td class="fw-bold text-dark">${kc}</td>
            <td class="fw-bold" style="color: #06b6d4;">${c}</td>
        `;

        // Prepend (put at top)
        if (hLog.firstChild) {
            hLog.insertBefore(tr, hLog.firstChild);
        } else {
            hLog.appendChild(tr);
        }

        // Limit stack size to 50
        if(hLog.children.length > 50) {
            hLog.removeChild(hLog.lastChild);
        }
    }

    window.clearHistory = () => {
        hLog.innerHTML = '';
        showToast('History sequence purged.');
    }

});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>