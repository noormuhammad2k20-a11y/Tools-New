<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="e2h-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="e2h-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">DOM Injection Settings <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Styling</span></h4>
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <label class="fw-bold mb-2">CSS Table Framework</label>
                <select id="e2hStyle" class="form-control fw-bold"><option value="none" selected>Semantic HTML (No CSS)</option><option value="bootstrap">Bootstrap 5 Data-Table</option><option value="tailwind">Tailwind CSS Classes</option></select>
            </div>
            <div class="col-md-7 text-end">
                <button type="button" onclick="generateExcelHtml()" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">Compile HTML DOM <i class="fa-solid fa-code ms-2"></i></button>
            </div>
        </div>
    </div>
    
    <div id="e2h-results" style="display:none;">
        <h5 class="fw-bold small mb-2 text-muted">GENERATED HTML MARKUP</h5>
        <textarea id="e2hCode" class="form-control font-monospace text-light bg-dark border-0 p-3 rounded-3" rows="12" readonly style="font-size:0.85rem;"></textarea>
        <div class="d-flex gap-2 mt-2">
            <button class="btn btn-outline-dark fw-bold flex-grow-1" onclick="navigator.clipboard.writeText(document.getElementById('e2hCode').value);PdfDevPro.toast('Copied HTML!');">Copy Code</button>
            <button class="btn btn-dark fw-bold flex-grow-1" onclick="PdfDevPro.downloadTextAsFile(document.getElementById('e2hCode').value, 'table_export.html')">Download .html</button>
        </div>
        
        <h5 class="fw-bold small mb-2 text-muted mt-4">LIVE PREVIEW</h5>
        <div id="e2hPreview" class="bg-white border rounded-3 p-3 overflow-auto" style="max-height:400px;"></div>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the Excel To HTML Converter?</h2>
        <p>The Excel To HTML Converter is a development utility powered by the renowned SheetJS data-parsing engine. It is specifically engineered to bridge the gap between financial analysts dealing strictly in `.xlsx` workbooks and web developers tasked with displaying that tabular data cleanly on the internet. Rather than forcing a developer to manually rewrite spreadsheet rows into HTML `</p><tr>` and `<td>` tags, this tool parses the binary Excel formatting directly in your web-browser and dynamically compiles valid DOM markup.
        <p>This process operates locally, meaning your highly sensitive payroll data or proprietary corporate ledgers are never uploaded to our servers, assuring total adherence to enterprise data-security protocols.</p>
    

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Framework Injection:</strong> If you are pasting the table into a modern web project, use the 'CSS Table Framework' dropdown to auto-inject Bootstrap 5 (`table table-striped`) or Tailwind CSS utility classes directly onto the generated markup, saving you 20 minutes of manual formatting.</li>
                <li class="mb-1"><strong>Multi-Sheet Handling:</strong> This tool defaults to compiling the *first active worksheet* within your Excel file. Ensure your primary data is on Sheet 1 before dragging it into the drop-zone.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-table-cells text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">SheetJS Interpreter</h4><p class="text-muted small mb-0">Decodes legacy `.xls` and modern `.xlsx` binary streams locally.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-code text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Semantic Table HTML</h4><p class="text-muted small mb-0">Constructs perfect thead, tbody, tr, and td relational tags.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-brands fa-bootstrap text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Auto-Styling Injector</h4><p class="text-muted small mb-0">Applies popular CSS framework classes directly onto the root element.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-eye text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Live DOM Preview</h4><p class="text-muted small mb-0">Examine how the browser naturally renders the table before exporting.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Does it import Excel cell background colors and fonts?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">No. The tool is designed to extract raw data and place it into clean, semantic HTML. Inline CSS styling from Excel (like cell backgrounds) creates extremely bloated and hard-to-maintain HTML code. We strip it out for maximum performance.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">What happens to spreadsheet formulas?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">The internal engine automatically calculates and extracts the final mathematical result of the formula at the time of saving. The `<td>` element will contain the printed number, not the `=SUM()` equation.
            
        
    

</td></div></div></div></div></section></td></tr></header></article></div>
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
<script>
let activeE2hData = null;

PdfDevPro.buildDropZone('e2h-drop-zone', {accept: '.xlsx,.xls,.csv', title: 'Spreadsheet', icon: '📈', onFiles: async files => {
    try {
        activeE2hData = await PdfDevPro.readFileAsArrayBuffer(files[0]);
        document.getElementById('e2h-controls').style.display = 'block';
        PdfDevPro.toast('Spreadsheet Parsed Successfully');
    } catch(e) {
        PdfDevPro.toast('Error reading file');
    }
}});

function generateExcelHtml() {
    if(!activeE2hData) return;
    
    try {
        const wb = XLSX.read(activeE2hData, {type: 'array'});
        const wsName = wb.SheetNames[0];
        const ws = wb.Sheets[wsName];
        
        let htmlStr = XLSX.utils.sheet_to_html(ws, { editable: false });
        
        const style = document.getElementById('e2hStyle').value;
        if (style === 'bootstrap') {
            htmlStr = htmlStr.replace('<table>', '<table class="table table-striped table-hover table-bordered">');
        } else if (style === 'tailwind') {
            htmlStr = htmlStr.replace('<table>', '<table class="min-w-full divide-y border text-left text-sm text-gray-500">');
        } else {
            // Add a basic border for semantic preview
            htmlStr = htmlStr.replace('<table>', '<table border="1" style="border-collapse: collapse; width: 100%;">');
        }
        
        // Strip out the html/body tags that sheet_to_html wraps it in
        const match = htmlStr.match(/<table[\s\S]*<\/table>/i);
        if(match) htmlStr = match[0];
        
        document.getElementById('e2hCode').value = htmlStr;
        document.getElementById('e2hPreview').innerHTML = htmlStr;
        document.getElementById('e2h-results').style.display = 'block';
        
        PdfDevPro.toast('HTML Compiled');
    } catch(e) {
        PdfDevPro.toast('Error compiling HTML: ' + e.message);
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>