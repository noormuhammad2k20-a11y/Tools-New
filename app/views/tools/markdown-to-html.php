<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>

<!-- Tool Interface -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Input -->
            <div class="flex flex-col">
                <div class="flex justify-between items-center mb-4 px-1">
                    <label class="text-xs font-black text-gray-400 uppercase tracking-widest">Markdown Source</label>
                    <button id="clear-btn" class="text-[10px] font-black text-gray-300 hover:text-red-400 uppercase tracking-widest transition-colors">Clear</button>
                </div>
                <textarea id="markdown-input" class="w-full h-[500px] p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm font-mono placeholder-gray-400 resize-none outline-none" placeholder="# Hello World\n\nThis is **bold** and *italic*..."></textarea>
            </div>

            <!-- Preview/Output -->
            <div class="flex flex-col">
                <div class="flex justify-between items-center mb-4 px-1">
                    <div class="flex gap-4">
                        <button id="tab-preview" class="tab-btn text-xs font-black text-primary uppercase tracking-widest border-b-2 border-primary pb-1">Preview</button>
                        <button id="tab-html" class="tab-btn text-xs font-black text-gray-400 uppercase tracking-widest border-b-2 border-transparent pb-1 hover:text-gray-600 transition-all">HTML Code</button>
                    </div>
                    <button id="copy-btn" class="text-[10px] font-black text-primary hover:text-primary-hover uppercase tracking-widest transition-colors">Copy HTML</button>
                </div>
                
                <div id="preview-area" class="w-full h-[500px] p-8 bg-white border border-gray-100 rounded-2xl overflow-y-auto prose prose-sm prose-primary max-w-none shadow-inner border-dashed">
                    <!-- HTML Preview -->
                </div>
                
                <textarea id="html-output" class="hidden w-full h-[500px] p-6 bg-slate-900 border border-transparent rounded-2xl text-emerald-400 text-xs font-mono resize-none outline-none shadow-inner" readonly></textarea>
            </div>
        </div>

        <div class="flex items-center gap-4 p-6 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary text-xl">
                <i class="fa-brands fa-markdown"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-1 leading-relaxed decoration-gray-200 decoration-2 underline underline-offset-4">Full GFM Support</h4>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">GitHub Flavored Markdown with tables, task lists, and strikethrough enabled.</p>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('markdown-input');
    const preview = document.getElementById('preview-area');
    const output = document.getElementById('html-output');
    const tabPrev = document.getElementById('tab-preview');
    const tabHtml = document.getElementById('tab-html');
    const copyBtn = document.getElementById('copy-btn');

    const converter = new showdown.Converter({
        tables: true,
        tasklists: true,
        strikethrough: true,
        ghCodeBlocks: true
    });

    function update() {
        const text = input.value;
        const html = converter.makeHtml(text);
        preview.innerHTML = html || '<p class="text-gray-300 italic">Formatting result will appear here...</p>';
        output.value = html;
    }

    input.addEventListener('input', update);

    tabPrev.addEventListener('click', () => {
        tabPrev.className = "tab-btn text-xs font-black text-primary uppercase tracking-widest border-b-2 border-primary pb-1";
        tabHtml.className = "tab-btn text-xs font-black text-gray-400 uppercase tracking-widest border-b-2 border-transparent pb-1 hover:text-gray-600 transition-all";
        preview.classList.remove('hidden');
        output.classList.add('hidden');
    });

    tabHtml.addEventListener('click', () => {
        tabHtml.className = "tab-btn text-xs font-black text-primary uppercase tracking-widest border-b-2 border-primary pb-1";
        tabPrev.className = "tab-btn text-xs font-black text-gray-400 uppercase tracking-widest border-b-2 border-transparent pb-1 hover:text-gray-600 transition-all";
        output.classList.remove('hidden');
        preview.classList.add('hidden');
    });

    copyBtn.addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = copyBtn.innerText;
        copyBtn.innerText = 'COPIED!';
        setTimeout(() => copyBtn.innerText = original, 2000);
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; update(); input.focus(); });

    update();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>