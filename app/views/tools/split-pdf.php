

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






