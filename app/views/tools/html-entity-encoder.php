<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row align-items-center mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="btn-group shadow-sm w-100 w-md-auto" role="group">
                        <input type="radio" class="btn-check" name="mode" id="m-enc" value="encode" autocomplete="off" checked>
                        <label class="btn btn-outline-primary fw-bold px-4" for="m-enc"><i class="fa-solid fa-lock me-2"></i>Encode</label>
                        
                        <input type="radio" class="btn-check" name="mode" id="m-dec" value="decode" autocomplete="off">
                        <label class="btn btn-outline-primary fw-bold px-4" for="m-dec"><i class="fa-solid fa-lock-open me-2"></i>Decode</label>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="document.getElementById('io-box').value=''; processText();"><i class="fa-solid fa-trash-can me-2"></i>Clear Editor</button>
                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 ms-2" onclick="loadSample()"><i class="fa-solid fa-flask me-2"></i>Sample Payload</button>
                </div>
            </div>

            <div class="position-relative mb-4">
                <textarea id="io-box" class="form-control border-2 bg-light rounded-4 p-4 shadow-sm" rows="10" placeholder="Type or paste html script tags, paragraphs, or symbols here..." style="font-family: var(--font-mono); font-size: 15px; resize: vertical; transition: all 0.3s ease;"></textarea>
                <button class="btn btn-primary rounded-circle shadow-lg position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; pointer-events: none;" id="status-icon">
                    <i class="fa-solid fa-arrow-right-arrow-left fa-xl"></i>
                </button>
            </div>
            
            <div class="bg-dark rounded-4 p-4 shadow-sm position-relative border" id="out-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0 text-white" id="out-title"><i class="fa-solid fa-shield-halved me-2 text-success"></i>Converted Output</h5>
                    <button class="btn btn-sm btn-success rounded-pill px-4 shadow-sm fw-bold" onclick="copyResult()"><i class="fa-regular fa-copy me-2"></i>Copy to Clipboard</button>
                </div>
                <textarea id="out-box" class="form-control bg-transparent text-light border-0 p-0" rows="8" readonly style="font-family: var(--font-mono); font-size: 15px; resize: none; word-break: break-all; outline: none !important; box-shadow: none !important;"></textarea>
            </div>

        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Preventing Cross-Site Scripting (XSS)</h2>
                    <p class="lead">If a software application permits users to submit raw input (like a comments section) and subsequently renders that input back to the browser without sanitation, malicious actors can inject JavaScript payloads fundamentally compromising the entire session. The <strong>Pro HTML Entity Encoder</strong> sanitizes reserved operational characters into un-executable string entities mathematically.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the Translation Mechanism</h3>
                    <p>Web browsers natively read the "less than" symbol (<code>&lt;</code>) as the absolute commencement of an HTML tag. When malicious text reads <code>&lt;script&gt;alert(1);&lt;/script&gt;</code>, the browser executes it blindly. By algorithmically encoding the symbol into its formal HTML entity (<code>&amp;lt;</code>), the browser simply prints the character visually upon the screen instead of executing its backend logic.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Core 5 Reserved Primitives</h3>
                    <ul>
                        <li><strong>&amp;</strong> (Ampersand) maps to <code>&amp;amp;</code></li>
                        <li><strong>&lt;</strong> (Less Than) maps to <code>&amp;lt;</code></li>
                        <li><strong>&gt;</strong> (Greater Than) maps to <code>&amp;gt;</code></li>
                        <li><strong>"</strong> (Double Quote) maps to <code>&amp;quot;</code></li>
                        <li><strong>'</strong> (Single Quote) maps to <code>&amp;#39;</code></li>
                    </ul>
                    <p>By forcing these strict translations either on the client-side or backend database persistence layer, web architectures isolate themselves from 99% of structural injection threat vectors autonomously.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #16a34a, #0d9488); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#io-box:focus { border-color: #16a34a !important; box-shadow: 0 0 0 .25rem rgba(22, 163, 74, .25) !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const ioBox = document.getElementById('io-box');
    const outBox = document.getElementById('out-box');
    const rEnc = document.getElementById('m-enc');
    const rDec = document.getElementById('m-dec');
    const stIcon = document.getElementById('status-icon');

    // Natively safe encoding via DOM TextNodes (bulletproof, standard W3C method vs gross Regex)
    function encodeHTML(str) {
        if (!str) return '';
        const elem = document.createElement('textarea');
        elem.textContent = str; // Browser implicitly encodes it internally
        return elem.innerHTML; // Extract the formally encoded string
    }

    // Decoding safely
    function decodeHTML(str) {
        if (!str) return '';
        const elem = document.createElement('textarea');
        elem.innerHTML = str;
        return elem.value;
    }

    window.processText = () => {
        const raw = ioBox.value;
        if (!raw) {
            outBox.value = '';
            stIcon.innerHTML = `<i class="fa-solid fa-arrow-right-arrow-left fa-xl"></i>`;
            return;
        }

        if (rEnc.checked) {
            outBox.value = encodeHTML(raw);
            stIcon.className = 'btn btn-primary rounded-circle shadow-lg position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center';
            stIcon.innerHTML = `<i class="fa-solid fa-lock fa-xl"></i>`;
        } else {
            outBox.value = decodeHTML(raw);
            stIcon.className = 'btn btn-warning rounded-circle shadow-lg position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center';
            stIcon.innerHTML = `<i class="fa-solid fa-lock-open fa-xl text-dark"></i>`;
        }
    };

    ioBox.addEventListener('input', processText);
    rEnc.addEventListener('change', processText);
    rDec.addEventListener('change', processText);

    window.loadSample = () => {
        if (rEnc.checked) {
            ioBox.value = `<!-- Malicious XSS Payload Example -->\n<div class="banner">Welcome, User!</div>\n<script>\n  var hack = "steal_cookies()";\n  document.write('Owned & PWND!');\n</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>