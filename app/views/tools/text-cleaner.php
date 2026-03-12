<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Left: Dirty Text -->
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">Dirty Input</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-300 resize-none outline-none font-mono" placeholder="Paste messed up text here..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <!-- Right: Clean Text -->
            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Clean Result</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm resize-none outline-none font-mono" readonly placeholder="Clean text will appear here..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    <i class="fa-solid fa-copy mr-1"></i> Copy
                </button>
            </div>
        </div>

        <!-- Cleaning Controls -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <button data-type="numbers" class="clean-type flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-sm transition-all group">
                <i class="fa-solid fa-hashtag text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold text-gray-600">Numbers</span>
            </button>
            <button data-type="punctuation" class="clean-type flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-sm transition-all group">
                <i class="fa-solid fa-quote-right text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold text-gray-600">Punctuation</span>
            </button>
            <button data-type="special" class="clean-type flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-sm transition-all group">
                <i class="fa-solid fa-at text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold text-gray-600">Special Chars</span>
            </button>
            <button data-type="emojis" class="clean-type flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-sm transition-all group">
                <i class="fa-solid fa-face-smile text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold text-gray-600">Emojis</span>
            </button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const clearBtn = document.getElementById('clear-btn');
    const copyBtn = document.getElementById('copy-btn');
    const btns = document.querySelectorAll('.clean-type');

    function clean(type) {
        let text = input.value;
        if(!text) return;

        switch(type) {
            case 'numbers':
                text = text.replace(/[0-9]/g, '');
                break;
            case 'punctuation':
                text = text.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, '');
                break;
            case 'special':
                text = text.replace(/[^a-zA-Z0-9\s]/g, '');
                break;
            case 'emojis':
                text = text.replace(/([\u2700-\u27BF]|[\uE000-\uF8FF]|\uD83C[\uDC00-\uDFFF]|\uD83D[\uDC00-\uDFFF]|[\u2011-\u26FF]|\uD83E[\uDD10-\uDDFF])/g, '');
                break;
        }
        output.value = text;
    }

    btns.forEach(btn => {
        btn.addEventListener('click', () => clean(btn.dataset.type));
    });

    input.addEventListener('input', () => {
        output.value = input.value;
    });

    clearBtn.addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    copyBtn.addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
