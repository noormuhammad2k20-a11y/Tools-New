<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Messy HTML Input</label>
                        <div class="d-flex gap-2">
                            <select id="indent-size" class="form-select form-select-sm border-2 rounded-pill shadow-sm">
                                <option value="2">2 Spaces</option>
                                <option value="4" selected>4 Spaces</option>
                                <option value="tab">Tab Indent</option>
                            </select>
                            <button class="btn btn-sm btn-outline-secondary" onclick="loadSample()">Sample</button>
                        </div>
                    </div>
                    <textarea id="input-html" class="form-control border-2 rounded-4 p-4" rows="14" placeholder="<html><head><title>Unformatted</title></head><body><div><p>Paste here...</p></div></body></html>" style="font-family: var(--font-mono);"></textarea>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('input-html').value = ''; document.getElementById('output-html').value = '';"><i class="fa-solid fa-trash me-2"></i>Clear</button>
                        <button class="btn btn-primary rounded-pill px-5 shadow-sm" onclick="beautifyHTML()"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Beautify Code</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Beautified Output</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyResult()">Copy HTML</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadResult()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <!-- Pro-style display -->
                    <textarea id="output-html" class="form-control bg-light border-0 rounded-4 p-4" rows="14" readonly placeholder="Your cleanly indented HTML DOM tree will appear here..." style="font-family: var(--font-mono); font-size: 14px; line-height: 1.5; white-space: pre;"></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Unpacking Obfuscated and Minified Web Pages</h2>
                    <p class="lead">HTML (HyperText Markup Language) is built on a hierarchical document object model (DOM). When developers generate HTML programmatically via server frameworks or fetch it from compiled React/Vue bundles, the resulting source code is often compressed into a single unreadable line. Our <strong>Pro HTML Beautifier</strong> restructures that chaos perfectly.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Superior AST Parsing Constraints</h3>
                    <p>Beautifying HTML is considerably more complex than CSS because inline elements (like `&lt;span&gt;`, `&lt;strong&gt;`, `&lt;a&gt;`) must not be given block-level indents, lest it causes unwanted visual spacing artifacts in the browser render. Our logic strictly adheres to modern W3C definitions, indenting block elements (`&lt;div&gt;`, `&lt;section&gt;`, `&lt;header&gt;`) while tightly wrapping inline tags.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Mixed Language Support</h3>
                    <p>Modern HTML files rarely exist in isolation. They contain nested `<style>` tags with CSS properties and `<script>` tags layered with Javascript architectures. Our beautification engine is multi-lingual capable; it will automatically pass CSS and Javascript segments to their respective formatting engines within the same execution pass.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Auditing Competitors & Templates</h3>
                    <p>If you're studying an impressive web layout or debugging a scraped template, viewing the raw minified DOM through basic browser tools is an exhausting process. Pasting the document into our beautifier creates an instantly readable map of their <code>div</code> architecture, component structure, and class assignments without relying on external plugins.</p>
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



<script>` tags layered with Javascript architectures. Our beautification engine is multi-lingual capable; it will automatically pass CSS and Javascript segments to their respective formatting engines within the same execution pass.</p>

                    <h3 class="fw-bold h4 mt-5 mb-3">Auditing Competitors & Templates</h3>
                    <p>If you're studying an impressive web layout or debugging a scraped template, viewing the raw minified DOM through basic browser tools is an exhausting process. Pasting the document into our beautifier creates an instantly readable map of their <code>div</code> architecture, component structure, and class assignments without relying on external plugins.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.text-gradient-primary { background: linear-gradient(45deg, #e34f26, #f97316); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(227, 79, 38, 0.15); border-color: #e34f26; }
</style>

<!-- Load js-beautify HTML module -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.9/beautify-html.min.js"></script>
<script>
    const input = document.getElementById('input-html');
    const output = document.getElementById('output-html');
    const indentSelect = document.getElementById('indent-size');

    window.beautifyHTML = () => {
        const val = input.value;
        if (!val.trim()) {
            output.value = '';
            return;
        }

        if (typeof html_beautify === 'undefined') {
            alert('Beautifier library failed to load.');
            return;
        }

        let indent_size = parseInt(indentSelect.value) || 4;
        let indent_char = indentSelect.value === 'tab' ? '\t' : ' ';
        if (indentSelect.value === 'tab') indent_size = 1;

        try {
            output.value = html_beautify(val, {
                indent_size: indent_size,
                indent_char: indent_char,
                wrap_line_length: 120,
                max_preserve_newlines: 2,
                preserve_newlines: true,
                end_with_newline: true,
                indent_inner_html: true,
                extra_liners: ['head', 'body', '/html']
            });
            output.classList.remove('text-danger');
            showToast('HTML Formatted Successfully!', 'success');
        } catch (e) {
            output.value = 'Failed to process HTML.';
            output.classList.add('text-danger');
        }
    };

    window.loadSample = () => {
        input.value = `<!DOCTYPE html><html><head><title>Pro Formatter</title><style>body{color:#000;} h1{font-size:2em;}</style></head><body><div class="container"><header><h1>Welcome to the Pro Tool</h1></header><main><p>This string is highly minified. <strong>Notice how it gets perfectly separated!</strong></p><button onclick="alert('Hello')">Click Me</button></main></div></body></html>`;
        beautifyHTML();
    };

    window.copyResult = () => {
        if (!output.value || output.classList.contains('text-danger')) return showToast('Nothing to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('Beautified HTML copied!');
    };

    window.downloadResult = () => {
        if (!output.value || output.classList.contains('text-danger')) return showToast('Nothing to download', 'error');
        const blob = new Blob([output.value], { type: 'text/html' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `index-formatted-${new Date().getTime()}.html`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>