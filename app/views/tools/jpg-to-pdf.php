

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container">
        

        <!-- Tool Form -->
        <div class="card p-4">
            <form id="jpgToPdfForm">
                <div class="form-group mb-4">
                    <label>Select Images (JPG, PNG, WebP)</label>
                    <div id="dropZone" style="border: 2px dashed var(--border); border-radius: 12px; padding: 2rem; text-align: center; background: var(--bg-body); cursor: pointer; transition: 0.3s;">
                        <i class="fa-solid fa-images" style="font-size: 2.5rem; color: var(--primary); margin-bottom: 1rem;"></i>
                        <p id="fileNameDisplay">Click or Drag &amp; Drop Images Here</p>
                        <input type="file" id="imageInput" accept="image/*" multiple style="display: none;">
                    </div>
                </div>

                <div id="imagePreview" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 10px; margin-bottom: 1.5rem;"></div>

                <div id="actionArea" style="display: none;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem;">
                        <i class="fa-solid fa-file-pdf"></i> Generate PDF Document
                    </button>
                </div>
            </form>
        </div>

        <div id="processLoader" style="display: none; text-align: center; padding: 2rem;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top: 1rem;">Converting images to PDF... 100% Secure &amp; Local.</p>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    const form = document.getElementById('jpgToPdfForm');
    const imageInput = document.getElementById('imageInput');
    const dropZone = document.getElementById('dropZone');
    const preview = document.getElementById('imagePreview');
    const actionArea = document.getElementById('actionArea');
    const processLoader = document.getElementById('processLoader');

    let selectedFiles = [];

    // Drag and Drop Logic
    dropZone.onclick = () => imageInput.click();
    imageInput.onchange = (e) => handleFiles(e.target.files);
    dropZone.ondragover = (e) => { e.preventDefault(); dropZone.style.borderColor = 'var(--primary)'; };
    dropZone.ondragleave = () => { dropZone.style.borderColor = 'var(--border)'; };
    dropZone.ondrop = (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'var(--border)';
        handleFiles(e.dataTransfer.files);
    };

    function handleFiles(files) {
        const arr = Array.from(files).filter(f => f.type.startsWith('image/'));
        selectedFiles = [...selectedFiles, ...arr];
        renderPreview();
    }

    function renderPreview() {
        preview.innerHTML = '';
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const div = document.createElement('div');
                div.style.position = 'relative';
                div.innerHTML = `
                    <img src="${e.target.result}" style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border);">
                    <button onclick="removeImage(${index})" style="position: absolute; top: -5px; right: -5px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; font-size: 10px; cursor: pointer;">✕</button>
                `;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
        actionArea.style.display = selectedFiles.length > 0 ? 'block' : 'none';
        document.getElementById('fileNameDisplay').innerText = `${selectedFiles.length} image(s) selected`;
    }

    window.removeImage = (index) => {
        selectedFiles.splice(index, 1);
        renderPreview();
    };

    form.onsubmit = async (e) => {
        e.preventDefault(); // IMPORTANT: Stops the AJAX POST to the PHP backend
        
        if (selectedFiles.length === 0) return;

        actionArea.style.display = 'none';
        processLoader.style.display = 'block';

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF();

        try {
            for (let i = 0; i < selectedFiles.length; i++) {
                const file = selectedFiles[i];
                const imageData = await readFileAsDataURL(file);
                
                // Add new page for subsequent images
                if (i > 0) pdf.addPage();

                // Get image dimensions to fit page
                const imgProps = pdf.getImageProperties(imageData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imageData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
            }

            pdf.save('images_to_document.pdf');
            showToast('PDF successfully generated!', 'success');
        } catch (err) {
            console.error(err);
            showToast('Error generating PDF. Please try again.', 'error');
        } finally {
            processLoader.style.display = 'none';
            actionArea.style.display = 'block';
        }
    };

    function readFileAsDataURL(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = (e) => resolve(e.target.result);
            reader.onerror = (e) => reject(e);
            reader.readAsDataURL(file);
        });
    }
</script>






