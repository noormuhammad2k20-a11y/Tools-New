<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>



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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>