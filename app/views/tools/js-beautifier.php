

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-js" class="w-full h-96 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm font-mono placeholder-gray-400 resize-none outline-none" placeholder="function hello() { console.log('world'); }"></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <div class="flex p-1 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <button id="format-btn" class="px-6 py-2 bg-primary text-white rounded-lg font-bold shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all">Beautify</button>
                    <button id="minify-btn" class="px-6 py-2 text-gray-500 hover:text-primary font-bold rounded-lg transition-all border-l border-gray-100 ml-1">Minify</button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary text-xl font-black">JS</div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 mb-1">Script Analyzer</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest" id="size-badge">0 B</p>
                    </div>
                </div>
                <button id="copy-btn" class="px-5 py-2.5 bg-primary text-white text-[10px] font-black uppercase rounded-lg shadow-lg shadow-primary/20 hover:scale-105 transition-all">Copy JS</button>
            </div>

            <div class="p-6 bg-amber-50/50 border border-amber-100 rounded-2xl flex items-center gap-3">
                <i class="fa-solid fa-triangle-exclamation text-amber-500 animate-pulse"></i>
                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest leading-relaxed">Note: Advanced minification (obfuscation) is not applied here to preserve variable integrity.</p>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-js');
    const formatBtn = document.getElementById('format-btn');
    const minifyBtn = document.getElementById('minify-btn');
    const sizeBadge = document.getElementById('size-badge');

    function updateSize() {
        const val = input.value;
        sizeBadge.innerText = val ? (val.length < 1024 ? val.length + ' B' : (val.length/1024).toFixed(2) + ' KB') : '0 B';
    }

    // Simple JS Beautifier Logic (Regex based)
    function beautifyJS(js) {
        return js
            .replace(/\s+/g, ' ')
            .replace(/\{/g, ' {\n    ')
            .replace(/\}/g, '\n}\n')
            .replace(/;/g, ';\n    ')
            .replace(/\s*\n\s*\}/g, '\n}')
            .trim();
    }

    function minifyJS(js) {
        return js
            .replace(/\/\*[\s\S]*?\*\/|([^\\:]|^)\/\/.*$/gm, '$1') // remove comments
            .replace(/\s+/g, ' ')
            .replace(/\s*([\{\};:,=+\-\*\/%&|^!<>?])\s*/g, '$1')
            .trim();
    }

    formatBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        input.value = beautifyJS(val);
        updateSize();
    });

    minifyBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        input.value = minifyJS(val);
        updateSize();
    });

    input.addEventListener('input', updateSize);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; updateSize(); input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





