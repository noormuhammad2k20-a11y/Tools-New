

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
                        <h5 class="fw-bold mb-4">Crawler Rules</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Default Action (User-agent: *)</label>
                            <select id="rob-default" class="form-select rounded-3">
                                <option value="allow">Allow All</option>
                                <option value="disallow">Disallow All</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Crawl-Delay (Seconds)</label>
                            <input type="number" id="rob-delay" class="form-control rounded-3" placeholder="e.g., 5 (Optional)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Sitemap URL</label>
                            <input type="url" id="rob-sitemap" class="form-control rounded-3" placeholder="https://domain.com/sitemap.xml">
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold">Blocked Paths (One per line)</label>
                            <textarea id="rob-disallow" class="form-control rounded-3" rows="5" placeholder="/admin/\n/tmp/\n/private/"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">Generated robots.txt</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy Content
                            </button>
                        </div>
                        <pre id="output-code" class="text-warning m-0" style="font-family: 'Fira Code', monospace; font-size: 1rem; overflow-x: auto; white-space: pre-wrap;"></pre>
                        
                        <div class="mt-4 text-center">
                            <a id="download-btn" href="#" class="btn btn-outline-light btn-sm rounded-pill px-4">
                                <i class="fa-solid fa-download me-1"></i> Download File
                            </a>
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
    const inputs = ['rob-default', 'rob-delay', 'rob-sitemap', 'rob-disallow'];
    const output = document.getElementById('output-code');
    const copyBtn = document.getElementById('copy-btn');
    const downloadBtn = document.getElementById('download-btn');

    const generate = () => {
        const def = document.getElementById('rob-default').value;
        const delay = document.getElementById('rob-delay').value;
        const sitemap = document.getElementById('rob-sitemap').value;
        const disallowText = document.getElementById('rob-disallow').value;

        let code = `User-agent: *\n`;
        if (def === 'disallow') {
            code += `Disallow: /\n`;
        } else {
            const lines = disallowText.split('\n').filter(l => l.trim() !== '');
            lines.forEach(line => {
                code += `Disallow: ${line.trim()}\n`;
            });
        }

        if (delay) code += `Crawl-delay: ${delay}\n`;
        if (sitemap) code += `\nSitemap: ${sitemap}\n`;

        output.textContent = code;

        // Update download link
        const blob = new Blob([code], { type: 'text/plain' });
        downloadBtn.href = URL.createObjectURL(blob);
        downloadBtn.download = 'robots.txt';
    };

    inputs.forEach(id => {
        document.getElementById(id).addEventListener('input', generate);
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('robots.txt copied!'));
    });

    generate(); // Initial
});
</script>






