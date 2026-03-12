<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Length</label>
                    <input type="number" id="str-len" value="16" min="1" max="1024" class="p-3 bg-gray-50 border border-gray-100 rounded-xl font-bold text-gray-700">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex items-center gap-2 p-3 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white transition-all group">
                        <input type="checkbox" checked id="opt-alpha" class="w-4 h-4 text-primary rounded border-gray-300">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-primary">Letters</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white transition-all group">
                        <input type="checkbox" checked id="opt-num" class="w-4 h-4 text-primary rounded border-gray-300">
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest group-hover:text-primary">Numbers</span>
                    </label>
                </div>
            </div>

            <div class="flex items-end">
                <button id="gen-btn" class="w-full py-8 bg-primary text-white rounded-xl font-black uppercase tracking-[0.2em] shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                    <i class="fa-solid fa-dice text-2xl group-hover:rotate-12 transition-transform"></i>
                    Generate String
                </button>
            </div>
        </div>

        <div class="relative">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 block">Generated Result</label>
            <div id="output-display" class="w-full min-h-[120px] p-6 bg-gray-900 border border-transparent rounded-2xl text-emerald-400 text-2xl font-mono break-all flex items-center justify-center text-center shadow-inner">
                Click Generate...
            </div>
            <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-white/10 text-white hover:bg-white/20 text-[10px] font-black uppercase rounded-lg transition-all">Copy</button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('output-display');
    const genBtn = document.getElementById('gen-btn');
    const copyBtn = document.getElementById('copy-btn');

    function generate() {
        const len = parseInt(document.getElementById('str-len').value) || 16;
        const alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        const num = "0123456789";
        
        let charset = "";
        if(document.getElementById('opt-alpha').checked) charset += alpha;
        if(document.getElementById('opt-num').checked) charset += num;
        
        if(!charset) { display.innerText = "Select Options"; return; }
        
        let res = "";
        for(let i=0; i<len; i++) {
            res += charset.charAt(Math.floor(Math.random() * charset.length));
        }
        display.innerText = res;
    }

    genBtn.addEventListener('click', generate);
    copyBtn.addEventListener('click', () => {
        if(display.innerText.includes('Generate')) return;
        navigator.clipboard.writeText(display.innerText);
        const original = copyBtn.innerText;
        copyBtn.innerText = 'Copied!';
        setTimeout(() => copyBtn.innerText = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
