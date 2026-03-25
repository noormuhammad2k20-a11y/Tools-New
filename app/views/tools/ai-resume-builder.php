

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <!-- Form Section -->
                <div class="col-lg-5">
                    <div class="pro-card shadow-none border bg-light p-4 rounded-4">
                        <h5 class="fw-bold mb-4"><i class="fa-solid fa-id-card text-primary me-2"></i> Identity</h5>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Full Name</label>
                            <input type="text" id="cv-name" class="form-control" placeholder="Oprah Mckee">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Email Address</label>
                            <input type="email" id="cv-email" class="form-control" placeholder="oprah@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold small">Target Job Title</label>
                            <input type="text" id="cv-title" class="form-control" placeholder="Senior Project Manager">
                        </div>

                        <hr class="my-4 opacity-5">

                        <h5 class="fw-bold mb-4"><i class="fa-solid fa-briefcase text-primary me-2"></i> Experience</h5>
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Work History &amp; Key Skills</label>
                            <textarea id="cv-exp" class="form-control" rows="6" placeholder="- Successfully managed cross-functional teams...\n- Improved efficiency by 20%..."></textarea>
                            <p class="extra-small text-muted mt-2">💡 Tip: Start with your most recent role first</p>
                        </div>

                        <div class="d-grid shadow-premium mt-4">
                            <button id="gen-cv-btn" class="btn btn-primary btn-lg rounded-pill fw-bold">
                                Generate Resume <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="col-lg-7">
                    <div id="preview-box" class="pro-card shadow-sm border bg-white h-100 p-0 overflow-hidden d-flex flex-column">
                        <div class="p-3 bg-light border-bottom d-flex justify-content-between align-items-center">
                            <span class="small fw-bold text-muted"><i class="fa-solid fa-eye me-1"></i> Live Preview</span>
                            <button id="download-cv" class="btn btn-sm btn-dark rounded-pill px-3 d-none" onclick="downloadPDF()">
                                <i class="fa-solid fa-download me-1"></i> Download PDF
                            </button>
                        </div>
                        
                        <div id="cv-content" class="p-5 flex-grow-1 bg-white" style="font-family: 'Inter', sans-serif; font-size: 0.95rem;">
                            <!-- Dynamic Content -->
                            <div class="text-center py-5 opacity-25" id="preview-placeholder">
                                <i class="fa-solid fa-print fa-4x mb-3"></i>
                                <p class="fw-bold fs-5">Resume Preview</p>
                                <p>Fill in the details to generate your document</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('gen-cv-btn');
    const content = document.getElementById('cv-content');
    const download = document.getElementById('download-cv');
    const placeholder = document.getElementById('preview-placeholder');

    btn.addEventListener('click', () => {
        const name = document.getElementById('cv-name').value.trim() || 'Your Name';
        const email = document.getElementById('cv-email').value.trim() || 'email@example.com';
        const title = document.getElementById('cv-title').value.trim() || 'Software Professional';
        const exp = document.getElementById('cv-exp').value.trim();

        if (!exp) return showToast('Please add some experience or skills', 'error');

        btn.disabled = true;
        btn.innerHTML = '<span class="premium-spinner"></span> Creating PDF...';

        setTimeout(() => {
            placeholder.classList.add('d-none');
            // Mocked "AI Summary" generation
            const summary = `Dedicated and results-driven ${title} with extensive experience in leading complex projects. Proven ability to optimize processes and drive cross-functional team success.`;
            
            content.innerHTML = `
                <div style="border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px;">
                    <h1 style="text-transform: uppercase; font-weight: 800; margin-bottom: 5px;">${name}</h1>
                    <p style="color: #666; font-weight: 600;">${title} | ${email}</p>
                </div>
                
                <h5 style="text-transform: uppercase; font-weight: 700; color: #333; margin-bottom: 10px;">Professional Summary</h5>
                <p style="color: #444; margin-bottom: 30px;">${summary}</p>
                
                <h5 style="text-transform: uppercase; font-weight: 700; color: #333; margin-bottom: 10px;">Experience & Skills</h5>
                <div style="color: #444; white-space: pre-wrap;">${exp}</div>
                
                <div style="margin-top: 50px; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                    <h6 style="font-weight: 700;">AI Suggestion:</h6>
                    <p class="small text-muted mb-0">Based on your skills, we recommend mentioning "Agile Methodologies" for more impact.</p>
                </div>
            `;
            
            download.classList.remove('d-none');
            btn.disabled = false;
            btn.innerHTML = 'Generate Resume <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>';
            showToast('Document generated successfully!');
        }, 1200);
    });
});

function downloadPDF() {
    // Note: To generate a real PDF, we would use html2pdf.bundle.min.js
    // For this UI implementation, we demonstrate the flow.
    showToast('PDF Download triggered', 'success');
}
</script>






