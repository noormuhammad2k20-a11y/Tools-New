<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="c2p-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="c2p-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Table Formatting <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Formatting</span></h4>
        <div class="row g-4">
            <div class="col-md-4">
                <label class="fw-bold mb-2">Theme Style</label>
                <select id="c2pTheme" class="form-control"><option value="light">Light Grid</option><option value="striped" selected>Zebra Striped</option><option value="dark">Dark Header</option></select>
            </div>
            <div class="col-md-4">
                <label class="fw-bold mb-2">Document Title</label>
                <input type="text" id="c2pTitle" class="form-control" placeholder="E.g., Q3 Financial Report">
            </div>
            <div class="col-md-4">
                <label class="fw-bold mb-2 text-primary"><i class="fa-solid fa-layer-group"></i> Smart Pagination</label>
                <select id="c2pPage" class="form-control border-primary"><option value="auto">Auto-Fit (A4)</option><option value="landscape">Landscape (Wide Data)</option></select>
            </div>
        </div>
        <div class="mt-4 text-end">
            <button type="button" onclick="generatePdfTable()" class="btn btn-primary px-5 py-3 rounded-pill fw-bold">Render PDF Table 📊</button>
        </div>
    </div>
    
    <div id="c2p-status" class="text-center text-primary fw-bold" style="display:none;padding:1.5rem;"></div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the CSV To PDF Table Tool?</h2>
        <p>The CSV To PDF Table generator utilizes the renowned SheetJS and pdf-lib engines to parse raw, unformatted comma-separated values (CSV) and meticulously construct professional, paginated PDF documents. Instead of wrestling with complex spreadsheet software formatting rules to export a presentable printout, this tool handles column width calculations, row wrapping, and header styling natively in your browser.</p>
        <p>Accountants analyzing ledger exports, data scientists sharing tabular datasets, and administrators distributing client rosters rely on this utility to generate clean, readable PDFs that are boardroom-ready without deploying backend server resources.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Landscape Pagination:</strong> If your CSV contains more than 6 columns, switch the Smart Pagination to "Landscape" to prevent text collision and allow data to breathe.</li>
                <li class="mb-1"><strong>Zebra Striping:</strong> The PRO "Zebra Striped" theme applies alternating row background colors, drastically increasing multi-page readability for massive financial ledgers.</li>
                <li class="mb-1"><strong>Custom Titles:</strong> Add a Document Title before rendering. This header will be injected onto the first page of the generated PDF in a bold, professional serif font.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-file-excel text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">SheetJS Core Engine</h4><p class="text-muted small mb-0">Parses CSV, TSV, and delimited text flawlessly, respecting quoted strings.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-file-invoice text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Auto-Pagination</h4><p class="text-muted small mb-0">Intelligently detects A4 page bounds and overflows data to subsequent pages.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-paint-roller text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Theme Presets</h4><p class="text-muted small mb-0">Style tables instantly with corporate-ready Light, Dark, or Striped grids.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-server text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Zero Backend</h4><p class="text-muted small mb-0">Your confidential sales and payroll data never communicates with external servers.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">What happens if a column is too wide?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">The internal engine calculates an proportional grid based on column count. Extremely wide text will currently be truncated or scaled. For extensive datasets, we strongly recommend Landscape printing.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Does this support XLSX documents?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">This specific tool is optimized natively for standard Comma Separated Variable format. If you have an Excel workbook, please export it to CSV format first before processing.</div></div>
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
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
<script>
let csvData = null;
let csvHeaders = [];

PdfDevPro.buildDropZone('c2p-drop-zone', {accept: '.csv', title: 'CSV file', icon: '📊', onFiles: async files => {
    try {
        const text = await PdfDevPro.readFileAsText(files[0]);
        const wb = XLSX.read(text, {type: 'string', raw: true});
        const ws = wb.Sheets[wb.SheetNames[0]];
        const json = XLSX.utils.sheet_to_json(ws, {header: 1}); // Array of arrays
        if(json.length < 1) throw new Error("Empty CSV");
        
        csvHeaders = json[0];
        csvData = json.slice(1);
        
        document.getElementById('c2p-controls').style.display = 'block';
        PdfDevPro.toast(`Loaded ${csvData.length} rows and ${csvHeaders.length} columns.`);
    } catch(e) {
        PdfDevPro.toast('Error reading CSV: ' + e.message);
    }
}});

async function generatePdfTable() {
    if(!csvData) return;
    const status = document.getElementById('c2p-status');
    status.style.display = 'block';
    status.textContent = 'Generating table geometry...';
    
    try {
        const { PDFDocument, rgb, StandardFonts } = PDFLib;
        const pdfDoc = await PDFDocument.create();
        const font = await pdfDoc.embedFont(StandardFonts.Helvetica);
        const fontBold = await pdfDoc.embedFont(StandardFonts.HelveticaBold);
        
        const title = document.getElementById('c2pTitle').value || 'Data Report';
        const theme = document.getElementById('c2pTheme').value;
        const layout = document.getElementById('c2pPage').value;
        
        let pW = layout==='landscape' ? 841.89 : 595.28;
        let pH = layout==='landscape' ? 595.28 : 841.89;
        
        const margins = 40;
        let y = pH - margins;
        
        let page = pdfDoc.addPage([pW, pH]);
        
        // Draw title
        page.drawText(title, { x: margins, y: y, size: 24, font: fontBold, color: rgb(0,0,0) });
        y -= 40;
        
        const colCount = csvHeaders.length || 1;
        const colWidth = (pW - (margins * 2)) / colCount;
        const rowHeight = 20;
        
        // Helper to draw row
        function drawRow(rowArr, isHeader, rowIndex) {
            if (y < margins + rowHeight) {
                // Add new page
                page = pdfDoc.addPage([pW, pH]);
                y = pH - margins;
            }
            
            // bg color
            if(isHeader && theme==='dark') {
                page.drawRectangle({x: margins, y: y - 5, width: pW-(margins*2), height: rowHeight, color: rgb(0.2, 0.2, 0.2)});
            } else if (theme === 'striped' && rowIndex % 2 !== 0 && !isHeader) {
                page.drawRectangle({x: margins, y: y - 5, width: pW-(margins*2), height: rowHeight, color: rgb(0.95, 0.95, 0.95)});
            }
            
            for(let i=0; i<colCount; i++) {
                let cellText = rowArr[i] ? String(rowArr[i]) : '';
                // extremely basic string truncate for simplicity
                if(cellText.length > colWidth / 4) cellText = cellText.substring(0, Math.floor(colWidth / 4)) + '..';
                
                let tC = isHeader ? (theme==='dark' ? rgb(1,1,1) : rgb(0,0,0)) : rgb(0.1, 0.1, 0.1);
                page.drawText(cellText, { x: margins + (i * colWidth) + 2, y: y, size: 10, font: isHeader ? fontBold : font, color: tC });
            }
            y -= rowHeight;
        }
        
        // Header
        drawRow(csvHeaders, true, 0);
        // Data
        for(let i=0; i<csvData.length; i++) {
            drawRow(csvData[i], false, i+1);
        }
        
        const pdfBytes = await pdfDoc.save();
        const blob = new Blob([pdfBytes], { type: 'application/pdf' });
        PdfDevPro.downloadBlob(blob, title.replace(/ /g, '_') + '.pdf');
        
        status.innerHTML = `<span class="text-success">✅ Downloaded PDF Table Successfully!</span>`;
    } catch(e) {
        status.innerHTML = `<span class="text-danger">Error: ${e.message}</span>`;
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>