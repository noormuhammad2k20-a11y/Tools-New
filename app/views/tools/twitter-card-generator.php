

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border">
                        <h5 class="fw-bold mb-4">Card Settings</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Card Type</label>
                            <select id="tw-card" class="form-select rounded-3">
                                <option value="summary">Summary</option>
                                <option value="summary_large_image">Summary with Large Image</option>
                                <option value="app">App</option>
                                <option value="player">Player (Video)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Site Username (@handle)</label>
                            <input type="text" id="tw-site" class="form-control rounded-3" placeholder="@yourbrand">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Creator Username</label>
                            <input type="text" id="tw-creator" class="form-control rounded-3" placeholder="@author">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Title</label>
                            <input type="text" id="tw-title" class="form-control rounded-3" placeholder="Page Heading">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Description</label>
                            <textarea id="tw-desc" class="form-control rounded-3" rows="3" placeholder="Summary..."></textarea>
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold">Image URL</label>
                            <input type="url" id="tw-image" class="form-control rounded-3" placeholder="https://domain.com/social.jpg">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">Twitter Meta Tags</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy Code
                            </button>
                        </div>
                        <pre id="output-code" class="text-info m-0" style="font-family: 'Fira Code', monospace; font-size: 0.9rem; overflow-x: auto; white-space: pre-wrap;"></pre>
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
    const inputs = ['tw-card', 'tw-site', 'tw-creator', 'tw-title', 'tw-desc', 'tw-image'];
    const output = document.getElementById('output-code');
    const copyBtn = document.getElementById('copy-btn');

    const generate = () => {
        const card = document.getElementById('tw-card').value;
        const site = document.getElementById('tw-site').value;
        const creator = document.getElementById('tw-creator').value;
        const title = document.getElementById('tw-title').value;
        const desc = document.getElementById('tw-desc').value;
        const image = document.getElementById('tw-image').value;

        let code = `<!-- Twitter -->\n`;
        code += `<meta name="twitter:card" content="${card}">\n`;
        if (site) code += `<meta name="twitter:site" content="${site}">\n`;
        if (creator) code += `<meta name="twitter:creator" content="${creator}">\n`;
        if (title) code += `<meta name="twitter:title" content="${title}">\n`;
        if (desc) code += `<meta name="twitter:description" content="${desc}">\n`;
        if (image) code += `<meta name="twitter:image" content="${image}">\n`;

        output.textContent = code;
    };

    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', generate);
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Twitter tags copied!'));
    });

    generate(); // Initial
});
</script>






