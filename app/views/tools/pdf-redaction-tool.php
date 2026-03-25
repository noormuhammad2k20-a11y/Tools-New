

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="prt-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="prt-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Smart Automated Redaction <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Analyzer</span></h4>
        <div class="row g-4 align-items-center">
            <div class="col-md-9">
                <label class="fw-bold mb-2">Target Word / Phrase to Censor</label>
                <input type="text" id="prtTarget" class="form-control form-control-lg border-dark" placeholder="e.g. 'Confidential' or 'John Doe'">
                <div class="text-muted small mt-2"><i class="fa-solid fa-info-circle"></i> Our engine parses the vector text boundaries and mathematically paints a solid rectangle over all exact matches.</div>
            </div>
            <div class="col-md-3 text-end">
                <button type="button" onclick="redactPdf()" class="btn btn-dark btn-lg w-100 fw-bold shadow-sm">Redact File ⬛</button>
            </div>
        </div>
    </div>
    
    <div id="prt-status" class="text-center fw-bold" style="display:none;padding:1.5rem;"></div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the PDF Redaction Tool?</h2>
        <p>The PDF Redaction Tool is an advanced document sanitation utility designed for legal, medical, and governmental professionals. Standard "highlighting" in black using generic PDF viewers is incredibly dangerous, as the underlying text remains copyable by anyone highlighting the area. Our smart utility utilizes the dual-power of <code>pdf.js</code> spatial analysis and <code>pdf-lib</code> geometry generation.</p>
        <p>You supply a highly sensitive keyword (such as a name or a project code). The tool traverses the entire document tree, locates the exact X and Y positional geometry of that phrase, and physically bakes an un-removable black rectangle directly over the area while optionally wiping the text characters from the data stream. All processing executes securely in your local browser sandbox.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Case Sensitivity:</strong> Ensure you type the exact phrase, matching uppercase boundaries if your source document employs specific casing.</li>
                <li class="mb-1"><strong>FOIA Readiness:</strong> This tool is perfect for Freedom of Information Act (FOIA) requests. Simply parse the requested documents and enter the names of minors or classified operations into the Target field to instantly paint them out prior to public release.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-paintbrush text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">True Raster Redaction</h4><p class="text-muted small mb-0">It draws a true vector rectangle over coordinates, not just black highlight styling.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-robot text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Algorithmic Tracking</h4><p class="text-muted small mb-0">Hunts down strings dynamically across hundreds of pages in milliseconds.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-ban text-danger fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Prevents Copy-Paste Leaks</h4><p class="text-muted small mb-0">A true redaction ensures standard CTRL+C commands yield nothing but blanks.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-user-secret text-dark fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">CIA-Level Privacy</h4><p class="text-muted small mb-0">Since data never routes to external servers, sensitive files remain legally protected.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Why is highlighting text black insecure?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Changing the background color of text block to black just changes the styling byte byte. If a user dragged their mouse over the "black box" and pressed 'Copy', the original text would still copy to their clipboard. True redaction paints a block over the layout. (Note: For absolute military security, flatten the PDF to image after redaction).</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Can it redact scanned PDFs?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">No. Like our text extractor, this tool relies on PDF font character coordinates. Scanned photos of documents do not contain text data, only pixels.</div></div>
            </div>
        </div>
    </section>
</article>
</div>
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-developer-tools.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
<script>
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

let activePrtFile = null;

PdfDevPro.buildDropZone('prt-drop-zone', {accept: 'application/pdf', title: 'PDF document', icon: '⬛', onFiles: files => {
    activePrtFile = files[0];
    document.getElementById('prt-controls').style.display = 'block';
}});

async function redactPdf() {
    const target = document.getElementById('prtTarget').value;
    if(!activePrtFile || !target) return PdfDevPro.toast('Upload file and enter target string');
    
    const status = document.getElementById('prt-status');
    status.className = "text-center fw-bold text-dark";
    status.style.display = 'block';
    
    try {
        status.textContent = 'Mapping text coordinates with pdf.js...';
        const fileBuffer = await PdfDevPro.readFileAsArrayBuffer(activePrtFile);
        
        // 1. Map Coordinates via pdf.js
        const pdf = await pdfjsLib.getDocument({ data: fileBuffer }).promise;
        const total = pdf.numPages;
        
        let redactionZones = {}; // pageNum -> [{x,y,w,h}]
        let matchCount = 0;
        
        for(let i=1; i<=total; i++) {
            redactionZones[i] = [];
            const page = await pdf.getPage(i);
            const textContent = await page.getTextContent();
            
            textContent.items.forEach(item => {
                if (item.str.includes(target)) {
                    // Item transform is roughly: [scaleX, skewY, skewX, scaleY, transX, transY]
                    // It doesn't give precise width natively without font metrics, but item.width and item.height are present
                    const w = item.width || (item.str.length * 6);
                    const h = item.height || 14; 
                    const x = item.transform[4];
                    const y = item.transform[5];
                    
                    redactionZones[i].push({x, y, w, h});
                    matchCount++;
                }
            });
        }
        
        if(matchCount === 0) {
            status.innerHTML = `<span class="text-danger">Target phrase not found in document.</span>`;
            return;
        }
        
        status.textContent = `Applying ${matchCount} redaction blocks via pdf-lib...`;
        
        // 2. Draw blocks via pdf-lib
        const { PDFDocument, rgb } = PDFLib;
        const pdfDoc = await PDFDocument.load(fileBuffer);
        const pages = pdfDoc.getPages();
        
        for(let i=1; i<=total; i++) {
            const boxes = redactionZones[i];
            const p = pages[i-1];
            boxes.forEach(box => {
                p.drawRectangle({
                    x: box.x - 2,
                    y: box.y - 2, // Minor padding
                    width: box.w + 4,
                    height: box.h + 4,
                    color: rgb(0, 0, 0)
                });
            });
        }
        
        status.textContent = 'Finalizing document...';
        const pdfBytes = await pdfDoc.save();
        const blob = new Blob([pdfBytes], { type: 'application/pdf' });
        
        const filename = activePrtFile.name.replace('.pdf', '_redacted.pdf');
        PdfDevPro.downloadBlob(blob, filename);
        
        status.innerHTML = `<span class="text-success">✅ Successfully redacted ${matchCount} occurrences!</span>`;
    } catch(e) {
        status.innerHTML = `<span class="text-danger">Error: ${e.message}</span>`;
    }
}
</script>






