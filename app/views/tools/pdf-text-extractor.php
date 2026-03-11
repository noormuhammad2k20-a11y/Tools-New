<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="pte-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="pte-controls" style="display:none;margin-bottom:2rem;">
        <div class="d-flex justify-content-between align-items-center bg-light p-3 border rounded-3 mb-3">
            <div>
                <h4 class="mb-1 fs-6 fw-bold">Document Loaded</h4>
                <div class="text-muted small" id="pte-file-info"></div>
            </div>
            <button onclick="extractText()" class="btn btn-primary px-4 fw-bold">Extract Text <i class="fa-solid fa-bolt ms-2"></i></button>
        </div>
        
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="ptePreserve" checked>
            <label class="form-check-label fw-bold text-primary" for="ptePreserve">
                Preserve Line Breaks (PRO Feature)
            </label>
        </div>
    </div>
    
    <div id="pte-status" class="text-center text-primary" style="display:none;padding:1rem;"></div>
    
    <div id="pte-result" style="display:none;">
        <textarea id="pteOutput" class="form-control mb-3 font-monospace bg-white" rows="15" readonly></textarea>
        <div class="text-end">
            <button onclick="PdfDevPro.downloadTextAsFile(document.getElementById('pteOutput').value, 'extracted.txt')" class="btn btn-dark fw-bold px-4">Download .txt</button>
        </div>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the PDF Text Extractor?</h2>
        <p>The PDF Text Extractor is a precision utility that scans binary PDF files and distills them down to pure, copyable Unicode text. By employing the <code>pdf.js</code> rendering engine in text-resolution mode, it bypasses complex layered formatting, embedded graphics, and restrictive font constraints that often prevent standard copy-pasting from desktop PDF readers.</p>
        <p>This tool is heavily utilized by researchers extracting block quotes from academic journals, paralegals copying clauses from digitized legal briefs, and data analysts stripping structured tabular text for downstream processing. Since operations parse within your browser's isolated local memory bounds, privacy guarantees are structurally maintained.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Line Break Preservation:</strong> By default, our PRO algorithm attempts to map physical vertical positioning to logical newline carriages. If you just need a continuous unformatted string of words, toggle this off before extraction.</li>
                <li class="mb-1"><strong>Instant Download:</strong> Instead of highlighting and copying a 50,000-word block from the text area (which can lag browsers), utilize the "Download .txt" feature to instantly save the raw string directly to your local drive.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-file-code text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Raw Text Yield</h4><p class="text-muted small mb-0">Strips styling, colors, and margins yielding clean ASCII/Unicode logic.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-align-left text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Spatial Recognition</h4><p class="text-muted small mb-0">Utilizes spatial coordinates to reconstruct coherent paragraphs.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-bolt text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Multi-Page Unrolling</h4><p class="text-muted small mb-0">Parses 100+ page books iteratively without crashing the primary thread.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-shield-halved text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Offline Security</h4><p class="text-muted small mb-0">Zero data retention. Content stays isolated inside your tab instance.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Will this extract text from scanned images?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">No. This tool parses mathematical font characters embedded in standard PDFs. If your PDF is a "flat" scan (basically an image wrapped in a PDF), you will require an Optical Character Recognition (OCR) engine, which this tool does not currently support via client-side.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Why does the generated text look slightly out of order?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">PDFs do not store logical streams of text; they store absolute X/Y coordinates for characters. Complex magazine layouts, columns, or sidebars can confuse standard reconstruction algorithms, resulting in text that reads left-to-right across columns rather than top-to-bottom.</div></div>
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
PdfDevPro.buildDropZone('pte-drop-zone', {accept: 'application/pdf', title: 'PDF document', icon: '📝', onFiles: files => {
    activePdfFile = files[0];
    document.getElementById('pte-controls').style.display = 'block';
    document.getElementById('pte-file-info').textContent = `${activePdfFile.name} (${PdfDevPro.formatSize(activePdfFile.size)})`;
}});

async function extractText() {
    if(!activePdfFile) return;
    const status = document.getElementById('pte-status');
    const resultBox = document.getElementById('pte-result');
    const output = document.getElementById('pteOutput');
    const preserve = document.getElementById('ptePreserve').checked;
    
    status.style.display = 'block';
    resultBox.style.display = 'none';
    output.value = '';
    
    try {
        status.textContent = 'Parsing Document Streams...';
        const fileBuffer = await PdfDevPro.readFileAsArrayBuffer(activePdfFile);
        const pdf = await pdfjsLib.getDocument({ data: fileBuffer }).promise;
        const total = pdf.numPages;
        
        let fullText = '';
        
        for(let i=1; i<=total; i++) {
            status.textContent = `Extracting Text: Page ${i} / ${total}...`;
            const page = await pdf.getPage(i);
            const textContent = await page.getTextContent();
            
            let lastY = -1;
            let pageText = '';
            
            textContent.items.forEach(item => {
                if (preserve) {
                    // Check Y coordinate to see if it's a new line
                    if (lastY !== item.transform[5] && lastY !== -1) {
                        pageText += '\n';
                    }
                    lastY = item.transform[5];
                }
                pageText += item.str;
            });
            
            fullText += `--- Page ${i} ---\n` + pageText + '\n\n';
        }
        
        output.value = fullText;
        status.style.display = 'none';
        resultBox.style.display = 'block';
        PdfDevPro.toast('Extraction complete!');
        
    } catch(e) {
        status.innerHTML = `<span class="text-danger">Error: ${e.message}</span>`;
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>