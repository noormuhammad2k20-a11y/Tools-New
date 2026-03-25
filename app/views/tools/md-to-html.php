

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
                        <label class="form-label fw-bold">Markdown Input</label>
                        <textarea id="md-input" class="form-control" rows="15" placeholder="# Hello World\n\nThis is **Markdown**..."></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <ul class="nav nav-tabs border-0 mb-3 bg-light p-1 rounded-pill" id="resultTabs" role="tablist" style="width: fit-content;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill px-4 fw-bold border-0" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview-panel" type="button" role="tab">Preview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill px-4 fw-bold border-0" id="html-tab" data-bs-toggle="tab" data-bs-target="#html-panel" type="button" role="tab">HTML Code</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="resultTabsContent">
                            <div class="tab-pane fade show active" id="preview-panel" role="tabpanel">
                                <div id="md-preview" class="bg-white p-3 rounded-3 border overflow-auto" style="height: 380px;">
                                    <p class="text-muted">Live preview will appear here...</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="html-panel" role="tabpanel">
                                <div class="bg-dark p-3 rounded-3 border overflow-auto" style="height: 380px;">
                                    <pre class="mb-0 text-white"><code id="html-output" class="language-html"></code></pre>
                                </div>
                                <div class="mt-2 text-end">
                                    <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyHtml()">Copy HTML</button>
                                </div>
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const mdInput = document.getElementById('md-input');
    const preview = document.getElementById('md-preview');
    const htmlOutput = document.getElementById('html-output');

    mdInput.addEventListener('input', () => {
        const md = mdInput.value;
        if (!md.trim()) {
            preview.innerHTML = '<p class="text-muted">Live preview will appear here...</p>';
            htmlOutput.textContent = '';
            return;
        }

        const html = marked.parse(md);
        preview.innerHTML = html;
        htmlOutput.textContent = html;
        Prism.highlightElement(htmlOutput);
    });
});

function copyHtml() {
    const html = document.getElementById('html-output').textContent;
    if (!html) return;
    navigator.clipboard.writeText(html).then(() => {
        showToast('HTML copied!');
    });
}
</script>






