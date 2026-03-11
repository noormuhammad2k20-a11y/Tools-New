<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="fpt-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="fpt-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Flattening Security <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Lock</span></h4>
        <div class="row g-4 align-items-end">
            <div class="col-md-8">
                <div class="bg-light p-3 rounded border">
                    <div class="form-check text-success fw-bold">
                        <input class="form-check-input bg-success" type="checkbox" checked disabled>
                        <label class="form-check-label">Merge AcroForm Text Fields</label>
                    </div>
                    <div class="form-check text-success fw-bold mt-2">
                        <input class="form-check-input bg-success" type="checkbox" checked disabled>
                        <label class="form-check-label">Bake Radio/Checkbox States into Canvas</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button type="button" onclick="flattenPdf()" class="btn btn-primary px-4 py-3 rounded-pill fw-bold w-100">Flatten Document <i class="fa-solid fa-lock ms-2"></i></button>
            </div>
        </div>
    </div>
    
    <div id="fpt-status" class="text-center text-primary fw-bold" style="display:none;padding:1.5rem;"></div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the Flatten PDF Tool?</h2>
        <p>The Flatten PDF Tool is a critical document security utility designed to strip interactive fields (AcroForms), floating comments, and editable layers from a PDF, merging their visual states permanently into the document's base canvas. Utilizing the `pdf-lib` core library, this tool essentially "bakes in" any typed form data.</p>
        <p>This is legally and operationally required before transmitting signed contracts, employment W-4s, or medical intake forms. Unflattened PDFs can be easily altered by malicious parties by double-clicking the form field. Flattening mathematically removes the field objects while painting the text directly onto the page architecture, ensuring the data is locked.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Final Audit:</strong> Always double check that your checkboxes and drop-downs represent the final desired state before flattening. This process is irreversible on the resulting output file.</li>
                <li class="mb-1"><strong>Cross-Platform Compatibility:</strong> Native Mac preview (Preview.app) sometimes fails to display interactive form text from Adobe Acrobat. Flattening the PDF using this tool guarantees your document looks exactly the same on any device.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-compress text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">AcroForm Eradication</h4><p class="text-muted small mb-0">Completely removes the interactive bounding boxes of inputs.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-print text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Print-Ready State</h4><p class="text-muted small mb-0">Rasterizes appearances to guarantee accurate ink plotting on professional printers.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-shield-virus text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Tamper Prevention</h4><p class="text-muted small mb-0">Precludes downstream recipients from editing the values you typed.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-user-lock text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Total Sovereignty</h4><p class="text-muted small mb-0">Files are processed logically inside your browser RAM, guaranteeing absolute confidentiality.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Will flattening reduce the file size?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Yes, marginally. By removing the complex JavaScript dictionaries and interactive metadata tied to forms, the document tree becomes slightly smaller and much faster to open on mobile devices.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Does it flatten text annotations (comments)?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">The core `pdf-lib` method specifically targets fields (text inputs, checkboxes, radios, drop-downs). Standard popup-comment annotations may be ignored depending on their implementation by the original authoring software.</div></div>
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
<script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
<script>
let activeFptFile = null;

PdfDevPro.buildDropZone('fpt-drop-zone', {accept: 'application/pdf', title: 'PDF document', icon: '🗜️', onFiles: files => {
    activeFptFile = files[0];
    document.getElementById('fpt-controls').style.display = 'block';
    PdfDevPro.toast('PDF initialized for flattening.');
}});

async function flattenPdf() {
    if(!activeFptFile) return;
    const status = document.getElementById('fpt-status');
    status.style.display = 'block';
    
    try {
        status.textContent = 'Loading form structures...';
        const fileBuffer = await PdfDevPro.readFileAsArrayBuffer(activeFptFile);
        const { PDFDocument } = PDFLib;
        
        const pdfDoc = await PDFDocument.load(fileBuffer);
        const form = pdfDoc.getForm();
        
        status.textContent = 'Merging fields into page canvas...';
        // pdf-lib form flatten method
        form.flatten();
        
        status.textContent = 'Rebuilding document tree...';
        const pdfBytes = await pdfDoc.save();
        const blob = new Blob([pdfBytes], { type: 'application/pdf' });
        
        const filename = activeFptFile.name.replace('.pdf', '_flattened.pdf');
        PdfDevPro.downloadBlob(blob, filename);
        
        status.innerHTML = `<span class="text-success">✅ Successfully locked and flattened PDF forms!</span>`;
    } catch(e) {
        status.innerHTML = `<span class="text-danger">Error: Document may be encrypted or lacks forms. (${e.message})</span>`;
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>