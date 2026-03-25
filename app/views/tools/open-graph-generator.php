

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border sticky-top" style="top: 2rem;">
                        <h5 class="fw-bold mb-4">Page Information</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Site Name</label>
                            <input type="text" id="og-site-name" class="form-control rounded-3" placeholder="e.g., My Awesome Blog">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Page Title</label>
                            <input type="text" id="og-title" class="form-control rounded-3" placeholder="e.g., 20 Life Hacks for 2026">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Page URL</label>
                            <input type="url" id="og-url" class="form-control rounded-3" placeholder="https://example.com/page">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Image URL</label>
                            <input type="url" id="og-image" class="form-control rounded-3" placeholder="https://example.com/cover.jpg">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Description</label>
                            <textarea id="og-desc" class="form-control rounded-3" rows="3" placeholder="Enter a brief summary..."></textarea>
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold">Type</label>
                            <select id="og-type" class="form-select rounded-3">
                                <option value="website">Website</option>
                                <option value="article">Article</option>
                                <option value="book">Book</option>
                                <option value="profile">Profile</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">Generated Code</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy HTML
                            </button>
                        </div>
                        <pre id="output-code" class="text-success m-0" style="font-family: 'Fira Code', monospace; font-size: 0.9rem; overflow-x: auto; white-space: pre-wrap;"></pre>
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
    const inputs = ['og-site-name', 'og-title', 'og-url', 'og-image', 'og-desc', 'og-type'];
    const output = document.getElementById('output-code');
    const copyBtn = document.getElementById('copy-btn');

    const generate = () => {
        const site = document.getElementById('og-site-name').value;
        const title = document.getElementById('og-title').value;
        const url = document.getElementById('og-url').value;
        const image = document.getElementById('og-image').value;
        const desc = document.getElementById('og-desc').value;
        const type = document.getElementById('og-type').value;

        let code = `<!-- Open Graph / Facebook -->\n`;
        code += `<meta property="og:type" content="${type || 'website'}">\n`;
        if (url) code += `<meta property="og:url" content="${url}">\n`;
        if (title) code += `<meta property="og:title" content="${title}">\n`;
        if (desc) code += `<meta property="og:description" content="${desc}">\n`;
        if (image) code += `<meta property="og:image" content="${image}">\n`;
        if (site) code += `<meta property="og:site_name" content="${site}">\n`;

        output.textContent = code;
    };

    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', generate);
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Tags copied!'));
    });

    generate(); // Initial call
});
</script>






