<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Controls -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Quantity</label>
                <div class="flex items-center bg-gray-50 border border-gray-100 rounded-2xl p-1 gap-1">
                    <button id="qty-minus" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-xl hover:bg-gray-50 transition-all shadow-sm text-gray-400 hover:text-primary"><i class="fa-solid fa-minus"></i></button>
                    <input type="number" id="qty-input" value="5" min="1" max="50" class="flex-grow bg-transparent border-none text-center font-black text-gray-700 focus:ring-0 text-lg">
                    <button id="qty-plus" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-xl hover:bg-gray-50 transition-all shadow-sm text-gray-400 hover:text-primary"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Type</label>
                <select id="type-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all appearance-none cursor-pointer">
                    <option value="paras">Paragraphs</option>
                    <option value="sentences">Sentences</option>
                    <option value="words">Words</option>
                </select>
            </div>

            <div class="flex items-end">
                <button id="gen-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    Generate
                </button>
            </div>
        </div>

        <!-- Result Area -->
        <div class="relative group">
            <div id="output-text" class="w-full min-h-[400px] p-8 bg-gray-50 border border-gray-100 rounded-3xl text-slate-600 text-lg leading-relaxed font-serif whitespace-pre-wrap transition-all group-hover:bg-white group-hover:border-primary/20 group-hover:shadow-lg group-hover:shadow-primary/5 shadow-inner">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
            </div>
            
            <div class="absolute top-4 right-4 flex gap-2">
                <button id="copy-btn" class="px-6 py-2.5 bg-white border border-gray-100 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl shadow-sm hover:border-primary transition-all flex items-center gap-2">
                    <i class="fa-solid fa-copy"></i>
                    Copy Text
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qty-input');
    const typeSelect = document.getElementById('type-select');
    const genBtn = document.getElementById('gen-btn');
    const output = document.getElementById('output-text');
    const copyBtn = document.getElementById('copy-btn');

    const words = ["lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", "magna", "aliqua", "ut", "enim", "ad", "minim", "veniam", "quis", "nostrud", "exercitation", "ullamco", "laboris", "nisi", "ut", "aliquip", "ex", "ea", "commodo", "consequat", "duis", "aute", "irure", "dolor", "in", "reprehenderit", "in", "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla", "pariatur", "excepteur", "sint", "occaecat", "cupidatat", "non", "proident", "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum"];

    function randomWord() { return words[Math.floor(Math.random() * words.length)]; }

    function generateSentence() {
        const len = 8 + Math.floor(Math.random() * 8);
        let s = [];
        for(let i=0; i<len; i++) s.push(randomWord());
        return s.join(' ').charAt(0).toUpperCase() + s.join(' ').slice(1) + '.';
    }

    function generateParagraph() {
        const len = 3 + Math.floor(Math.random() * 4);
        let p = [];
        for(let i=0; i<len; i++) p.push(generateSentence());
        return p.join(' ');
    }

    function generate() {
        const qty = parseInt(qtyInput.value);
        const type = typeSelect.value;
        let res = [];

        if(type === 'paras') {
            for(let i=0; i<qty; i++) res.push(generateParagraph());
            output.innerText = res.join('\n\n');
        } else if(type === 'sentences') {
            for(let i=0; i<qty; i++) res.push(generateSentence());
            output.innerText = res.join(' ');
        } else {
            for(let i=0; i<qty; i++) res.push(randomWord());
            output.innerText = res.join(' ');
        }
    }

    genBtn.addEventListener('click', generate);
    
    document.getElementById('qty-plus').addEventListener('click', () => { qtyInput.value = parseInt(qtyInput.value) + 1; });
    document.getElementById('qty-minus').addEventListener('click', () => { if(qtyInput.value > 1) qtyInput.value = parseInt(qtyInput.value) - 1; });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });

    // Initial generate
    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>