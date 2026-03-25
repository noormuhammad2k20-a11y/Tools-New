

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






