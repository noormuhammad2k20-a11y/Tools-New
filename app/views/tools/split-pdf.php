<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container">
        

        <div id="dropZone" style="border: 2px dashed var(--border); border-radius: 12px; padding: 3rem; text-align: center; background: var(--bg-body); cursor: pointer; transition: 0.3s; margin-bottom: 2rem;">
            <i class="fa-solid fa-scissors" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h3>Select PDF to Split</h3>
            <p id="fileNameDisplay">Choose a file to extract pages from</p>
            <input type="file" id="pdfInput" accept=".pdf" style="display: none;">
        </div>

        <div id="splitOptions" style="display: none; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem; margin-bottom: 2rem;">
            <div class="form-group">
                <label>Page Range (e.g., 1-5, 8, 11-13)</label>
                <input type="text" id="pageRange" class="form-control" placeholder="Enter pages to extract...">
                <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.5rem;" id="pageCountDisplay"></p>
            </div>
            <button id="splitBtn" class="btn btn-primary" style="width: 100%;">Extract Selected Pages</button>
        </div>

        <div id="processLoader" style="display: none; text-align: center; padding: 2rem;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top: 1rem;">Extracting pages... Done locally in your browser.</p>
        </div>
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



<script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
<script>
    const pdfInput = document.getElementById('pdfInput');
    const dropZone = document.getElementById('dropZone');
    const splitOptions = document.getElementById('splitOptions');
    const splitBtn = document.getElementById('splitBtn');
    const pageRange = document.getElementById('pageRange');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const pageCountDisplay = document.getElementById('pageCountDisplay');
    const processLoader = document.getElementById('processLoader');

    let currentFile = null;
    let totalPages = 0;

    dropZone.onclick = () => pdfInput.click();
    pdfInput.onchange = (e) => handleFile(e.target.files[0]);

    async function handleFile(file) {
        if (!file || file.type !== 'application/pdf') return;
        currentFile = file;
        fileNameDisplay.innerHTML = `<strong>Selected:</strong> ${file.name}`;
        
        // Peek at page count
        const arrayBuffer = await file.arrayBuffer();
        const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
        totalPages = pdfDoc.getPageCount();
        pageCountDisplay.innerText = `This document has ${totalPages} total pages.`;
        
        splitOptions.style.display = 'block';
    }

    splitBtn.onclick = async () => {
        const rangeStr = pageRange.value.trim();
        if (!rangeStr || !currentFile) return;

        splitOptions.style.display = 'none';
        processLoader.style.display = 'block';

        try {
            const arrayBuffer = await currentFile.arrayBuffer();
            const sourceDoc = await PDFLib.PDFDocument.load(arrayBuffer);
            const newPdf = await PDFLib.PDFDocument.create();
            
            // Parse ranges
            const indices = parseRange(rangeStr, totalPages);
            if (indices.length === 0) throw new Error("Invalid range");

            const copiedPages = await newPdf.copyPages(sourceDoc, indices);
            copiedPages.forEach(page => newPdf.addPage(page));

            const pdfBytes = await newPdf.save();
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            
            const link = document.createElement('a');
            link.href = url;
            link.download = `extracted_${currentFile.name}`;
            link.click();
            showToast('Extraction complete!', 'success');
        } catch (error) {
            console.error(error);
            showToast('Invalid page range or corrupted PDF.', 'error');
        } finally {
            processLoader.style.display = 'none';
            splitOptions.style.display = 'block';
        }
    };

    function parseRange(str, max) {
        const indices = [];
        const parts = str.split(',');
        parts.forEach(part => {
            if (part.includes('-')) {
                const [start, end] = part.split('-').map(n => parseInt(n.trim()));
                for (let i = start; i <= end; i++) {
                    if (i >= 1 && i <= max) indices.push(i - 1);
                }
            } else {
                const val = parseInt(part.trim());
                if (!isNaN(val) && val >= 1 && val <= max) indices.push(val - 1);
            }
        });
        return [...new Set(indices)].sort((a,b) => a-b);
    }
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>