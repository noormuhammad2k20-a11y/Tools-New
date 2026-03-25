<!-- Tool Interface -->
<div class="card border-0 shadow-sm transition-all" style="border-radius: var(--radius-md); overflow: hidden;">
    <div class="card-body p-6 sm:p-10">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label id="input-label" class="form-label fw-bold text-muted text-uppercase small tracking-widest mb-0">BBCode Source</label>
                    <button id="clear-btn" class="btn btn-link text-danger text-decoration-none p-0 small fw-bold uppercase-tracking-widest"><i class="fa-solid fa-trash me-1"></i>Clear</button>
                </div>
                <textarea id="bbcode-input" class="form-control bg-light border-0 shadow-inner font-monospace p-4" style="height: 350px; resize: none;" placeholder="[b]Bold[/b] [i]Italic[/i]"></textarea>
            </div>

            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label id="output-label" class="form-label fw-bold text-pro text-uppercase small tracking-widest mb-0">HTML Result</label>
                    <button id="copy-btn" class="btn btn-pro btn-sm rounded-pill px-4 fw-black text-uppercase tracking-wider shadow-sm">Copy Code</button>
                </div>
                <textarea id="html-output" class="form-control bg-white border shadow-sm rounded-4 p-4 font-monospace" style="height: 350px; resize: none; font-size: 13px;" readonly placeholder="Code will appear here..."></textarea>
            </div>
        </div>

        <div class="mt-5 p-6 bg-dark rounded-4 shadow-lg border border-transparent relative overflow-hidden group">
            <h4 class="text-xs font-black text-pro-light uppercase tracking-widest mb-4 opacity-75">Live Preview</h4>
            <div id="preview-area" class="text-white text-sm min-h-[100px] prose prose-invert prose-sm max-w-none">
                <p class="text-muted italic opacity-50">Preview will render here...</p>
            </div>
            <div class="position-absolute bottom-0 end-0 m-0 opacity-10 pointer-events-none" style="transform: translate(20%, 20%);">
                <i class="fa-solid fa-eye text-white" style="font-size: 120px;"></i>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bbcode-input');
    const output = document.getElementById('html-output');
    const preview = document.getElementById('preview-area');
    function bbcodeToHtml(str) {
        if(!str) return "";
        let res = str;
        const tags = [
            { bb: /\[b\](.*?)\[\/b\]/gi, html: '<strong>$1</strong>' },
            { bb: /\[i\](.*?)\[\/i\]/gi, html: '<em>$1</em>' },
            { bb: /\[u\](.*?)\[\/u\]/gi, html: '<u>$1</u>' },
            { bb: /\[s\](.*?)\[\/s\]/gi, html: '<strike>$1</strike>' },
            { bb: /\[url\](.*?)\[\/url\]/gi, html: '<a href="$1">$1</a>' },
            { bb: /\[url=(.*?)\](.*?)\[\/url\]/gi, html: '<a href="$1">$2</a>' },
            { bb: /\[img\](.*?)\[\/img\]/gi, html: '<img src="$1" />' },
            { bb: /\[color=(.*?)\](.*?)\[\/color\]/gi, html: '<span style="color:$1">$2</span>' },
            { bb: /\[size=(.*?)\](.*?)\[\/size\]/gi, html: '<span style="font-size:$1px">$2</span>' },
            { bb: /\[code\](.*?)\[\/code\]/gi, html: '<code>$1</code>' }
        ];
        tags.forEach(t => res = res.replace(t.bb, t.html));
        return res.replace(/\n/g, '<br>');
    }
    function update() {
        const html = bbcodeToHtml(input.value);
        output.value = html;
        preview.innerHTML = html || '<p class="text-muted italic opacity-50">Preview will render here...</p>';
    }
    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; update(); input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.value).then(() => showToast('HTML Copied!'));
    });
});
</script>



