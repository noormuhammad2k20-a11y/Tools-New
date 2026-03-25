

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Postman Collection JSON (v2.1)</label>
                        <textarea id="postman-input" class="form-control" rows="15" placeholder="Paste your Postman JSON here..."></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">Swagger / OpenAPI YAML Output</label>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy YAML
                            </button>
                        </div>
                        <div id="output-container" class="bg-light p-3 rounded-3" style="height: 380px; overflow: auto; border: 1px solid var(--border);">
                            <pre class="mb-0"><code id="swagger-output" class="language-yaml"># Converted OpenAPI specification will appear here...</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <button id="convert-btn" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow">
                    Convert to Swagger <i class="fa-solid fa-bolt ms-2"></i>
                </button>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-yaml.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const postmanInput = document.getElementById('postman-input');
    const convertBtn = document.getElementById('convert-btn');
    const swaggerOutput = document.getElementById('swagger-output');

    convertBtn.addEventListener('click', () => {
        const val = postmanInput.value.trim();
        if (!val) return showToast('Please paste Postman JSON', 'error');

        try {
            const postman = JSON.parse(val);
            const swagger = convertToSwagger(postman);
            swaggerOutput.textContent = swagger;
            Prism.highlightElement(swaggerOutput);
            showToast('Converted Successfully!');
        } catch (e) {
            showToast('Error: ' + e.message, 'error');
        }
    });

    function convertToSwagger(postman) {
        const info = postman.info || {};
        let yaml = `openapi: 3.0.0\n`;
        yaml += `info:\n  title: ${info.name || 'Postman Collection'}\n  version: 1.0.0\n`;
        yaml += `paths:\n`;

        const items = postman.item || [];
        items.forEach(item => {
            if (item.request) {
                const req = item.request;
                const method = (req.method || 'GET').toLowerCase();
                const path = '/' + (req.url?.path?.join('/') || '');
                
                yaml += `  ${path}:\n`;
                yaml += `    ${method}:\n`;
                yaml += `      summary: ${item.name || ''}\n`;
                yaml += `      responses:\n        '200':\n          description: Successful response\n`;
            }
        });

        return yaml;
    }
});

function copyResult() {
    const text = document.getElementById('swagger-output').textContent;
    if (text.includes('# Converted')) return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Copied to clipboard!');
    });
}
</script>






