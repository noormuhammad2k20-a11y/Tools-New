<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="p2i-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="p2i-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Extraction Settings <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Features</span></h4>
        <div class="row g-4">
            <div class="col-md-4">
                <label class="fw-bold mb-2">Output Format</label>
                <select id="p2iFormat" class="form-control"><option value="image/jpeg">JPEG (Smaller)</option><option value="image/png" selected>PNG (Lossless)</option></select>
            </div>
            <div class="col-md-4">
                <label class="fw-bold mb-2">DPI Resolution Scale</label>
                <select id="p2iScale" class="form-control"><option value="1">Standard (72 DPI)</option><option value="2" selected>High (144 DPI)</option><option value="3">Ultra HD (216 DPI)</option></select>
            </div>
            <div class="col-md-4">
                <label class="fw-bold mb-2 text-primary">Target Page Range</label>
                <input type="text" id="p2iRange" class="form-control" placeholder="e.g. 1-5, 8">
            </div>
        </div>
        <div class="mt-4 text-end">
            <button type="button" onclick="extractImages()" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">Extract Pages to Images 🖼️</button>
        </div>
    </div>
    
    <div id="p2i-status" class="text-center text-primary fw-bold" style="display:none;padding:1.5rem;"></div>
    <div id="p2i-results" class="row g-3" style="margin-top:2rem;"></div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the PDF To Image Extractor?</h2>
        <p>The PDF To Image Extractor is a robust rendering engine built directly into your web browser. Utilizing Mozilla's native <code>pdf.js</code> worker core, this tool systematically dissects PDF files and converts their complex vector and text geometries into perfect, high-fidelity raster images (such as JPEG or PNG). Because the extraction logic is entirely local, there are no file-size upload limits or privacy concerns—your business documents remain strictly on your own device.</p>
        <p>This extractor is essential for designers integrating documented elements into graphical suites, administrators converting printable form pages for email deployment, or developers isolating high-resolution slide decks from corporate PDF presentations.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Ultra HD Resolution:</strong> Increase the DPI Resolution Scale to "Ultra HD" to multiply the rendering vector matrix, ensuring fonts and lines stay crispy sharp even when zoomed in.</li>
                <li class="mb-1"><strong>Lossless Output:</strong> Select PNG to ensure zero compression artifacts if you plan on editing the extracted pages later in Photoshop or Figma.</li>
                <li class="mb-1"><strong>Page Targeting:</strong> Got a 100-page document? Use the Target Page Range PRO feature to selectively extract exactly the pages you need (e.g., "1-3, 9, 12").</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-bolt text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Instant Local Render</h4><p class="text-muted small mb-0">Hardware-accelerated canvas API skips upload delays entirely.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-eye text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Vector Clarity</h4><p class="text-muted small mb-0">Adjustable DPI scales ensure text isn't pixelated upon export.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-file-image text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Dual Output Encoders</h4><p class="text-muted small mb-0">Choose between efficient JPEG or perfectly lossless PNG formats.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-lock text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">No Server Tracks</h4><p class="text-muted small mb-0">Completely offline-capable once loaded, securing corporate assets.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">What's the difference between this and "Extract Images"?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">This tool renders the entire physical page layout (text, graphics, tables) into a single image. The Image Extraction tool instead isolates embedded raster objects (like photographs) natively embedded within the PDF without rendering the surrounding text.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Does higher DPI scale affect file size?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Yes. Setting the scale to Ultra HD (216 DPI) will create immensely sharp images, but will drastically increase the pixel count and resulting file size.</div></div>
            </div>
        </div>
    </section>
</article>
</div>
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-developer-tools.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

let activePdfFile = null;
PdfDevPro.buildDropZone('p2i-drop-zone', {accept: 'application/pdf', title: 'PDF document', icon: '📄', onFiles: files => {
    activePdfFile = files[0];
    document.getElementById('p2i-controls').style.display = 'block';
    PdfDevPro.toast('PDF loaded! Ready for rendering.');
}});

async function extractImages() {
    if(!activePdfFile) return;
    const status = document.getElementById('p2i-status');
    const resDiv = document.getElementById('p2i-results');
    status.style.display = 'block';
    resDiv.innerHTML = '';
    
    try {
        status.textContent = 'Parsing PDF document...';
        const fileBuffer = await PdfDevPro.readFileAsArrayBuffer(activePdfFile);
        const pdf = await pdfjsLib.getDocument({ data: fileBuffer }).promise;
        const total = pdf.numPages;
        
        const format = document.getElementById('p2iFormat').value;
        const scale = parseFloat(document.getElementById('p2iScale').value);
        const rangeText = document.getElementById('p2iRange').value;
        
        // Parse range
        let pagesToYield = [];
        if(!rangeText) {
            for(let i=1; i<=total; i++) pagesToYield.push(i);
        } else {
            const parts = rangeText.split(',');
            parts.forEach(p => {
                const rng = p.split('-');
                if(rng.length === 2) {
                    let start = parseInt(rng[0].trim());
                    let end = parseInt(rng[1].trim());
                    for(let i=start; i<=end; i++) if(i>0 && i<=total) pagesToYield.push(i);
                } else {
                    let page = parseInt(p.trim());
                    if(page>0 && page<=total) pagesToYield.push(page);
                }
            });
        }
        
        if(!pagesToYield.length) { throw new Error('Invalid page range selected.'); }
        
        for(const pageNum of pagesToYield) {
            status.textContent = `Rendering page ${pageNum} / ${total}...`;
            const page = await pdf.getPage(pageNum);
            const viewport = page.getViewport({ scale: scale });
            
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            
            await page.render({ canvasContext: ctx, viewport: viewport }).promise;
            
            const dataUrl = canvas.toDataURL(format, 0.95);
            const ext = format === 'image/jpeg' ? 'jpg' : 'png';
            
            resDiv.innerHTML += `
            <div class="col-md-3 text-center">
                <div class="border rounded-3 p-2 bg-white shadow-sm">
                    <img src="${dataUrl}" class="img-fluid rounded mb-2" style="max-height:200px; border:1px solid #eee;">
                    <div class="fw-bold mb-2">Page ${pageNum}</div>
                    <a href="${dataUrl}" download="page_${pageNum}.${ext}" class="btn btn-sm btn-primary w-100">Download</a>
                </div>
            </div>`;
        }
        
        status.innerHTML = `<span class="text-success">✅ Rendered ${pagesToYield.length} pages successfully!</span>`;
        PdfDevPro.toast('Rendering complete!');
    } catch(e) {
        status.innerHTML = `<span class="text-danger">Error: ${e.message}</span>`;
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>