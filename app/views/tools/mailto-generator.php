

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border h-100">
                        <h5 class="fw-bold mb-4">Email Details</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Recipient Email</label>
                            <input type="email" id="mt-email" class="form-control rounded-3" placeholder="hello@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Subject Line</label>
                            <input type="text" id="mt-subject" class="form-control rounded-3" placeholder="Inquiry about services">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">CC Email</label>
                            <input type="email" id="mt-cc" class="form-control rounded-3" placeholder="manager@example.com">
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold">Message Body</label>
                            <textarea id="mt-body" class="form-control rounded-3" rows="5" placeholder="Hi there,\n\nI would like to..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">HTML Snipet &amp; Preview</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy HTML
                            </button>
                        </div>
                        
                        <div class="bg-black p-3 rounded-3 mb-4">
                            <code id="output-code" class="text-success" style="font-family: 'Fira Code', monospace; word-break: break-all;"></code>
                        </div>

                        <div class="mt-2 mb-4">
                            <label class="form-label text-muted small fw-bold text-uppercase">Live Preview (Click to Test)</label>
                            <div class="p-4 rounded-4 bg-white shadow-sm text-center">
                                <a id="preview-link" href="#" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Send Email
                                </a>
                            </div>
                        </div>

                        <div class="mt-auto p-3 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-20">
                            <p class="text-light small mb-0 opacity-75">
                                <i class="fa-solid fa-info-circle me-2"></i> This link will open the default mail client on the user's device.
                            </p>
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
    const inputs = ['mt-email', 'mt-subject', 'mt-cc', 'mt-body'];
    const output = document.getElementById('output-code');
    const preview = document.getElementById('preview-link');
    const copyBtn = document.getElementById('copy-btn');

    const generate = () => {
        const email = document.getElementById('mt-email').value;
        const subject = document.getElementById('mt-subject').value;
        const cc = document.getElementById('mt-cc').value;
        const body = document.getElementById('mt-body').value;

        let mailto = `mailto:${email}?`;
        if (subject) mailto += `subject=${encodeURIComponent(subject)}&`;
        if (cc) mailto += `cc=${encodeURIComponent(cc)}&`;
        if (body) mailto += `body=${encodeURIComponent(body)}&`;
        
        // Remove trailing & or ?
        mailto = mailto.replace(/[&?]$/, '');

        const html = `<a href="${mailto}">Send Email</a>`;
        output.textContent = html;
        preview.href = mailto;
    };

    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', generate);
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('HTML copied!'));
    });

    generate();
});
</script>






