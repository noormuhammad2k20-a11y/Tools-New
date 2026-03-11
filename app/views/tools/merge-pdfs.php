<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container">
        

        <div id="dropZone" style="border: 2px dashed var(--border); border-radius: 12px; padding: 3rem; text-align: center; background: var(--bg-body); cursor: pointer; transition: 0.3s; margin-bottom: 2rem;">
            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h3>Click or Drag &amp; Drop PDFs here</h3>
            <p>Select multiple PDF files to merge them into one</p>
            <input type="file" id="pdfInput" multiple accept=".pdf" style="display: none;">
        </div>

        <div id="fileList" style="margin-bottom: 2rem;"></div>

        <div id="actionArea" style="display: none; text-align: center;">
            <button id="mergeBtn" class="btn btn-primary btn-lg" style="padding: 1rem 3rem; font-size: 1.2rem;">
                <i class="fa-solid fa-object-group"></i> Merge PDFs Now
            </button>
        </div>

        <div id="processLoader" style="display: none; text-align: center; padding: 2rem;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top: 1rem;">Merging your PDFs... Processing locally for privacy.</p>
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
    const fileList = document.getElementById('fileList');
    const mergeBtn = document.getElementById('mergeBtn');
    const actionArea = document.getElementById('actionArea');
    const processLoader = document.getElementById('processLoader');

    let selectedFiles = [];

    dropZone.onclick = () => pdfInput.click();

    pdfInput.onchange = (e) => handleFiles(e.target.files);

    dropZone.ondragover = (e) => { e.preventDefault(); dropZone.style.borderColor = 'var(--primary)'; };
    dropZone.ondragleave = () => { dropZone.style.borderColor = 'var(--border)'; };
    dropZone.ondrop = (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'var(--border)';
        handleFiles(e.dataTransfer.files);
    };

    function handleFiles(files) {
        const newFiles = Array.from(files).filter(f => f.type === 'application/pdf');
        selectedFiles = [...selectedFiles, ...newFiles];
        renderFileList();
    }

    function renderFileList() {
        fileList.innerHTML = selectedFiles.map((file, index) => `
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--bg-card); border: 1px solid var(--border); border-radius: 8px; margin-bottom: 0.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <i class="fa-solid fa-file-pdf" style="color: #ef4444; font-size: 1.5rem;"></i>
                    <div>
                        <div style="font-weight: 600;">${file.name}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                    </div>
                </div>
                <button onclick="removeFile(${index})" style="background: none; border: none; color: #ef4444; cursor: pointer;"><i class="fa-solid fa-trash"></i></button>
            </div>
        `).join('');
        
        actionArea.style.display = selectedFiles.length > 1 ? 'block' : 'none';
    }

    window.removeFile = (index) => {
        selectedFiles.splice(index, 1);
        renderFileList();
    };

    mergeBtn.onclick = async () => {
        if (selectedFiles.length < 2) return;
        
        actionArea.style.display = 'none';
        processLoader.style.display = 'block';

        try {
            const mergedPdf = await PDFLib.PDFDocument.create();
            
            for (const file of selectedFiles) {
                const arrayBuffer = await file.arrayBuffer();
                const donorPdf = await PDFLib.PDFDocument.load(arrayBuffer);
                const copiedPages = await mergedPdf.copyPages(donorPdf, donorPdf.getPageIndices());
                copiedPages.forEach((page) => mergedPdf.addPage(page));
            }

            const pdfBytes = await mergedPdf.save();
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            
            const link = document.createElement('a');
            link.href = url;
            link.download = 'merged_document.pdf';
            link.click();

            showToast('Success! Your PDFs have been merged.', 'success');
        } catch (error) {
            console.error(error);
            showToast('Error merging PDFs. Please check your files.', 'error');
        } finally {
            processLoader.style.display = 'none';
            actionArea.style.display = 'block';
        }
    };
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>