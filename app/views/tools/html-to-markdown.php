<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/turndown@7.1.1/dist/turndown.min.js"></script>

<!-- Tool Interface -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- HTML Input -->
            <div class="flex flex-col">
                <div class="flex justify-between items-center mb-4 px-1">
                    <label class="text-xs font-black text-gray-400 uppercase tracking-widest">HTML Code</label>
                    <button id="clear-btn" class="text-[10px] font-black text-gray-300 hover:text-red-400 uppercase tracking-widest transition-colors">Clear</button>
                </div>
                <textarea id="html-input" class="w-full h-[500px] p-6 bg-slate-900 border border-transparent rounded-2xl text-emerald-400 text-xs font-mono placeholder-emerald-800 resize-none outline-none shadow-inner" placeholder="<h1>Hello</h1><p>World</p>"></textarea>
            </div>

            <!-- Markdown Output -->
            <div class="flex flex-col">
                <div class="flex justify-between items-center mb-4 px-1">
                    <label class="text-xs font-black text-primary uppercase tracking-widest">Markdown Output</label>
                    <button id="copy-btn" class="text-[10px] font-black text-primary hover:text-primary-hover uppercase tracking-widest transition-colors">Copy Markdown</button>
                </div>
                <textarea id="markdown-output" class="w-full h-[500px] p-6 bg-gray-50 border border-gray-200 rounded-2xl text-gray-700 text-sm font-mono resize-none outline-none shadow-inner" readonly placeholder="# Result..."></textarea>
            </div>
        </div>

        <div class="flex items-center gap-4 p-6 bg-blue-50/50 rounded-2xl border border-blue-100/30 group">
            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-500 text-xl group-hover:rotate-12 transition-transform">
                <i class="fa-solid fa-code"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-1 leading-relaxed underline decoration-blue-200 decoration-2 underline-offset-4">Turndown Engine</h4>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Converts raw HTML into clean, optimized Markdown syntax for documentation.</p>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('html-input');
    const output = document.getElementById('markdown-output');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const turndownService = new TurndownService({
        headingStyle: 'atx',
        codeBlockStyle: 'fenced'
    });

    function update() {
        const html = input.value;
        if(!html) { output.value = ''; return; }
        try {
            output.value = turndownService.turndown(html);
        } catch(e) {
            output.value = "Error parsing HTML";
        }
    }

    input.addEventListener('input', update);
    clearBtn.addEventListener('click', () => { input.value = ''; update(); input.focus(); });
    copyBtn.addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        copyBtn.innerText = 'COPIED!';
        setTimeout(() => copyBtn.innerText = 'COPY MARKDOWN', 2000);
    });

    update();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>