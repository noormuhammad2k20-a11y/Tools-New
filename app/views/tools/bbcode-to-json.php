

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
                        <label class="form-label fw-bold">BBCode Input</label>
                        <textarea id="bbcode-input" class="form-control" rows="15" placeholder="[b]Bold Text[/b]\n[url=https://google.com]Link[/url]"></textarea>
                    </div>
                    <div class="d-grid">
                        <button id="convert-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                            Convert BBCode <i class="fa-solid fa-sync ms-2"></i>
                        </button>
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
                                <div id="bb-preview" class="bg-white p-3 rounded-3 border overflow-auto" style="height: 380px;">
                                    <p class="text-muted">Live preview will appear here...</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="html-panel" role="tabpanel">
                                <div class="bg-dark p-3 rounded-3 border overflow-auto" style="height: 335px;">
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bbcode-input');
    const preview = document.getElementById('bb-preview');
    const htmlOut = document.getElementById('html-output');
    const btn = document.getElementById('convert-btn');

    btn.addEventListener('click', () => {
        const bb = input.value;
        if (!bb.trim()) return showToast('Please enter BBCode', 'error');

        const html = parseBBCode(bb);
        preview.innerHTML = html;
        htmlOut.textContent = html;
        Prism.highlightElement(htmlOut);
        showToast('Converted!');
    });

    function parseBBCode(text) {
        let res = text
            .replace(/\[b\](.*?)\[\/b\]/gi, '<strong>$1</strong>')
            .replace(/\[i\](.*?)\[\/i\]/gi, '<em>$1</em>')
            .replace(/\[u\](.*?)\[\/u\]/gi, '<u>$1</u>')
            .replace(/\[s\](.*?)\[\/s\]/gi, '<strike>$1</strike>')
            .replace(/\[url=(.*?)\](.*?)\[\/url\]/gi, '<a href="$1" target="_blank">$2</a>')
            .replace(/\[url\](.*?)\[\/url\]/gi, '<a href="$1" target="_blank">$1</a>')
            .replace(/\[img\](.*?)\[\/img\]/gi, '<img src="$1" class="img-fluid" />')
            .replace(/\[color=(.*?)\](.*?)\[\/color\]/gi, '<span style="color:$1;">$2</span>')
            .replace(/\[size=(.*?)\](.*?)\[\/size\]/gi, '<span style="font-size:$1px;">$2</span>')
            .replace(/\[quote\](.*?)\[\/quote\]/gi, '<blockquote class="blockquote">$1</blockquote>')
            .replace(/\[code\]([\s\S]*?)\[\/code\]/gi, '<pre class="bg-light p-2"><code>$1</code></pre>')
            .replace(/\n/g, '<br>');
        return res;
    }
});

function copyHtml() {
    const html = document.getElementById('html-output').textContent;
    if (!html) return;
    navigator.clipboard.writeText(html).then(() => {
        showToast('HTML copied!');
    });
}
</script>






