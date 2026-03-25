

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container">
        

        <div id="dropZone" style="border: 2px dashed var(--border); border-radius: 12px; padding: 3rem; text-align: center; background: var(--bg-body); cursor: pointer; transition: 0.3s; margin-bottom: 2rem;">
            <i class="fa-solid fa-rotate" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h3>Select PDF to Rotate</h3>
            <p id="fileNameDisplay">Choose a file to rotate all pages</p>
            <input type="file" id="pdfInput" accept=".pdf" style="display: none;">
        </div>

        <div id="rotateOptions" style="display: none; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem; margin-bottom: 2rem; text-align: center;">
            <label style="display: block; font-weight: 600; margin-bottom: 1rem;">Choose Rotation Angle</label>
            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 2rem;">
                <button onclick="setRotation(90)" class="btn btn-outline rotate-btn" data-angle="90">90° Right</button>
                <button onclick="setRotation(180)" class="btn btn-outline rotate-btn" data-angle="180">180° Flip</button>
                <button onclick="setRotation(270)" class="btn btn-outline rotate-btn" data-angle="270">90° Left</button>
            </div>
            <button id="processBtn" class="btn btn-primary" style="width: 100%;">Apply Rotation &amp; Download</button>
        </div>

        <div id="processLoader" style="display: none; text-align: center; padding: 2rem;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top: 1rem;">Rotating pages... Fast and local.</p>
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
    const rotateOptions = document.getElementById('rotateOptions');
    const processBtn = document.getElementById('processBtn');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const processLoader = document.getElementById('processLoader');

    let currentFile = null;
    let currentAngle = 90;

    dropZone.onclick = () => pdfInput.click();
    pdfInput.onchange = (e) => handleFile(e.target.files[0]);

    function handleFile(file) {
        if (!file || file.type !== 'application/pdf') return;
        currentFile = file;
        fileNameDisplay.innerHTML = `<strong>Selected:</strong> ${file.name}`;
        rotateOptions.style.display = 'block';
    }

    function setRotation(angle) {
        currentAngle = angle;
        document.querySelectorAll('.rotate-btn').forEach(btn => {
            btn.classList.toggle('btn-primary', parseInt(btn.dataset.angle) === angle);
            btn.classList.toggle('btn-outline', parseInt(btn.dataset.angle) !== angle);
        });
    }

    processBtn.onclick = async () => {
        if (!currentFile) return;

        rotateOptions.style.display = 'none';
        processLoader.style.display = 'block';

        try {
            const arrayBuffer = await currentFile.arrayBuffer();
            const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
            const pages = pdfDoc.getPages();
            
            pages.forEach(page => {
                const { rotation } = page.getRotation();
                page.setRotation(PDFLib.degrees(rotation + currentAngle));
            });

            const pdfBytes = await pdfDoc.save();
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            
            const link = document.createElement('a');
            link.href = url;
            link.download = `rotated_${currentFile.name}`;
            link.click();
            showToast('Rotation applied!', 'success');
        } catch (error) {
            console.error(error);
            showToast('Error processing PDF.', 'error');
        } finally {
            processLoader.style.display = 'none';
            rotateOptions.style.display = 'block';
        }
    };
</script>






