<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <!-- Drag and Drop Zone -->
            <div id="dropzone" class="border-2 border-primary border-opacity-25 bg-light rounded-4 d-flex flex-column justify-content-center align-items-center p-5 text-center mb-4 transition-all" style="min-height: 200px; border-style: dashed !important; cursor: pointer;">
                <i class="fa-solid fa-file-image fa-3x text-primary mb-3"></i>
                <h4 class="fw-bold text-dark mb-1">Select an Image</h4>
                <p class="text-muted small mb-0">Drag and drop or click to browse (JPG, PNG, WebP, SVG, GIF)</p>
            </div>
            <input type="file" id="file-input" class="d-none" accept="image/*">

            <div class="row gx-5" id="output-area" style="display:none;">
                
                <!-- Preview -->
                <div class="col-lg-4 mb-4 mb-lg-0 border-end pe-lg-4 text-center">
                    <h6 class="text-uppercase fw-bold text-muted small tracking-wider mb-3">Resource Preview</h6>
                    <div class="bg-light border rounded-4 d-flex align-items-center justify-content-center p-2 mb-3 shadow-sm mx-auto" style="height: 250px; overflow: hidden; background-image: radial-gradient(#cbd5e1 1px, transparent 0); background-size: 10px 10px;">
                        <img id="img-preview" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                    </div>
                    
                    <ul class="list-group list-group-flush text-start small border rounded-3 text-muted">
                        <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Name:</span> <span id="meta-name" class="text-truncate" style="max-width: 150px;">-</span></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Resolution:</span> <span id="meta-res">-</span></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="fw-bold">Original Size:</span> <span id="meta-size">-</span></li>
                        <li class="list-group-item d-flex justify-content-between text-primary"><span class="fw-bold">Base64 Size:</span> <span id="meta-b64-size">-</span></li>
                    </ul>

                    <button class="btn btn-outline-secondary w-100 rounded-pill mt-3" onclick="resetApp()"><i class="fa-solid fa-arrow-rotate-right me-2"></i>Reset Canvas</button>
                </div>

                <!-- Code Outputs -->
                <div class="col-lg-8 ps-lg-4">
                    
                    <ul class="nav nav-tabs nav-fill border-0 mb-3" id="codeTabs" role="tablist">
                        <li class="nav-item border-0" role="presentation">
                            <button class="nav-link active fw-bold text-primary rounded-pill border shadow-sm" id="raw-tab" data-bs-toggle="tab" data-bs-target="#raw" type="button" role="tab" aria-selected="true">Raw Content</button>
                        </li>
                        <li class="nav-item border-0" role="presentation">
                            <button class="nav-link fw-bold text-muted rounded-pill border mx-2" id="html-tab" data-bs-toggle="tab" data-bs-target="#html" type="button" role="tab" aria-selected="false">&lt;img&gt; Source</button>
                        </li>
                        <li class="nav-item border-0" role="presentation">
                            <button class="nav-link fw-bold text-muted rounded-pill border" id="css-tab" data-bs-toggle="tab" data-bs-target="#css" type="button" role="tab" aria-selected="false">CSS Background</button>
                        </li>
                    </ul>

                    <div class="bg-dark rounded-4 p-4 shadow-sm position-relative">
                        <div class="d-flex justify-content-end position-absolute top-0 end-0 p-3" style="z-index: 5;">
                            <button class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm" onclick="copyCurrent()"><i class="fa-regular fa-copy me-1"></i> Copy</button>
                        </div>
                        
                        <div class="tab-content" id="codeContent" style="margin-top: 10px;">
                            <div class="tab-pane fade show active" id="raw" role="tabpanel">
                                <textarea id="out-raw" class="form-control bg-transparent text-light border-0 p-0" rows="11" readonly style="font-family: var(--font-mono); font-size: 13px; resize: none; word-break: break-all;"></textarea>
                            </div>
                            <div class="tab-pane fade" id="html" role="tabpanel">
                                <textarea id="out-html" class="form-control bg-transparent text-light border-0 p-0" rows="11" readonly style="font-family: var(--font-mono); font-size: 13px; resize: none; word-break: break-all;"></textarea>
                            </div>
                            <div class="tab-pane fade" id="css" role="tabpanel">
                                <textarea id="out-css" class="form-control bg-transparent text-light border-0 p-0" rows="11" readonly style="font-family: var(--font-mono); font-size: 13px; resize: none; word-break: break-all;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-warning border-0 rounded-4 mt-3 mb-0 d-flex align-items-center p-3 shadow-sm">
                        <i class="fa-solid fa-triangle-exclamation fa-2x me-3 opacity-75"></i>
                        <p class="mb-0 small fw-bold">Base64 encoding expands final file size by roughly ~33%. It prevents render-blocking HTTP requests but should only be used for small SVG icons or micro-thumbnails, not massive photographic hero banners.</p>
                    </div>

                </div>
            </div>
            
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Eliminating HTTP Request Latency</h2>
                    <p class="lead">Every individual <code>&lt;img src="icon.png"&gt;</code> tag on your website forces an external DNS lookup and TCP/IP handshake payload. By utilizing our <strong>Pro Base64 Data URI Converter</strong>, developers can physically inject graphical primitives natively into HTML/CSS markup, absolutely destroying server ping-latency.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Syntax of the Data URI Protocol</h3>
                    <p>Instead of passing a remote web link to an asset, compilers read the `data:` protocol scheme prefix. It acts identically to an image route, built systematically: <code>data:[&lt;mediatype&gt;][;base64],&lt;data&gt;</code>. Because it leverages fundamental alphanumeric character sets, it is implicitly safe to pass through raw REST API payload queries and database architecture uncorrupted.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Architectural Caching Limitations</h3>
                    <p>While compiling base64 eliminates HTTP requests, it bypasses the browser's native `Cache-Control` asset storage. An embedded 2MB image injected via CSS will require downloading every single time the stylesheet initializes. Consequently, professional engineers reserve Data URI encoding strictly for SVG interface icons, small loading GIFs, and 45x45px micro-assets.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #1d4ed8, #f43f5e); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#dropzone.dragover { background-color: #e0f2fe !important; border-color: #0284c7 !important; border-width: 3px !important; }
.nav-tabs .nav-link { transition: all 0.2s ease; }
.nav-tabs .nav-link.active { background-color: var(--primary); color: white !important; border-color: var(--primary) !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const outArea = document.getElementById('output-area');
    
    // Meta
    const imgPreview = document.getElementById('img-preview');
    const metaName = document.getElementById('meta-name');
    const metaRes = document.getElementById('meta-res');
    const metaSize = document.getElementById('meta-size');
    const metaB64Size = document.getElementById('meta-b64-size');

    // Textareas
    const outRaw = document.getElementById('out-raw');
    const outHtml = document.getElementById('out-html');
    const outCss = document.getElementById('out-css');

    // --- Drag and Drop Logic ---
    dropzone.addEventListener('click', () => fileInput.click());

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => dropzone.classList.add('dragover'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, () => dropzone.classList.remove('dragover'), false);
    });

    dropzone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length > 0) processFile(files[0]);
    });

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) processFile(this.files[0]);
    });

    function formatBytes(bytes, decimals = 2) {
        if (!+bytes) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
    }

    function processFile(file) {
        if (!file.type.startsWith('image/')) {
            showToast('Please select a valid image file.', 'error');
            return;
        }

        // Setup Meta
        metaName.textContent = file.name;
        metaSize.textContent = formatBytes(file.size);

        const reader = new FileReader();

        reader.onload = function(e) {
            const result = e.target.result; // Complete Data URI
            
            // Render Preview
            imgPreview.src = result;
            
            imgPreview.onload = function() {
                metaRes.textContent = `${this.naturalWidth} x ${this.naturalHeight} px`;
            };

            // Calculate Base64 size (string length in JS is roughly size in bytes)
            metaB64Size.textContent = formatBytes(result.length);

            // Populate Code Models
            outRaw.value = result;
            outHtml.value = `<img src="${result}" alt="${file.name}" />`;
            outCss.value = `.basset {\n  background-image: url('${result}');\n  background-repeat: no-repeat;\n  background-size: contain;\n}`;

            // Switch UI
            dropzone.style.display = 'none';
            outArea.style.display = 'flex';
            
            showToast('File successfully encoded!', 'success');
        };

        reader.readAsDataURL(file);
    }

    window.copyCurrent = () => {
        const activeTabPane = document.querySelector('.tab-pane.active');
        const textarea = activeTabPane.querySelector('textarea');
        if (textarea && textarea.value) {
            textarea.select();
            document.execCommand('copy');
            showToast('Asset Copied specifically!');
        }
    };

    window.resetApp = () => {
        fileInput.value = '';
        outArea.style.display = 'none';
        dropzone.style.display = 'flex';
        imgPreview.src = '';
        outRaw.value = ''; outHtml.value = ''; outCss.value = '';
    };

});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>