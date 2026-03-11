<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Paragraph Count</label>
                <div class="flex items-center bg-gray-50 border border-gray-100 rounded-2xl p-1 gap-1">
                    <button id="qty-minus" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-xl hover:bg-gray-50 transition-all shadow-sm text-gray-400 hover:text-primary"><i class="fa-solid fa-minus"></i></button>
                    <input type="number" id="qty-input" value="3" min="1" max="20" class="flex-grow bg-transparent border-none text-center font-black text-gray-700 focus:ring-0 text-lg">
                    <button id="qty-plus" class="w-12 h-12 flex items-center justify-center bg-white border border-gray-100 rounded-xl hover:bg-gray-50 transition-all shadow-sm text-gray-400 hover:text-primary"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>

            <div class="flex items-end">
                <button id="gen-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-align-left text-lg"></i>
                    Generate Paragraphs
                </button>
            </div>
        </div>

        <div class="relative group">
            <div id="output-list" class="w-full min-h-[450px] p-8 bg-gray-50 border border-gray-100 rounded-3xl text-slate-600 text-lg leading-relaxed font-serif whitespace-pre-wrap transition-all group-hover:bg-white group-hover:shadow-lg group-hover:shadow-primary/5 shadow-inner">
                <!-- Paragraphs will appear here -->
            </div>
            <div class="absolute top-4 right-4 flex gap-2">
                <button id="copy-btn" class="px-6 py-2.5 bg-white border border-gray-100 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl shadow-sm hover:border-primary transition-all flex items-center gap-2">
                    <i class="fa-solid fa-copy"></i>
                    Copy All
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
    const genBtn = document.getElementById('gen-btn');
    const output = document.getElementById('output-list');

    const themes = [
        ["The old library", "A quiet morning", "The bustling market", "A lonely traveler", "The distant mountains"],
        ["whispered secrets", "glowed with light", "echoed with laughter", "stood in silence", "changed forever"],
        ["under the silver moon.", "as the sun began to set.", "across the endless plains.", "within the heart of the city.", "beyond the reach of time."]
    ];

    function generateParagraph() {
        let p = "";
        for(let i=0; i<4; i++) {
            const t0 = themes[0][Math.floor(Math.random() * themes[0].length)];
            const t1 = themes[1][Math.floor(Math.random() * themes[1].length)];
            const t2 = themes[2][Math.floor(Math.random() * themes[2].length)];
            p += `${t0} ${t1} ${t2} `;
        }
        return p.trim();
    }

    function generate() {
        const qty = parseInt(qtyInput.value) || 3;
        let res = [];
        for(let i=0; i<qty; i++) res.push(generateParagraph());
        output.innerText = res.join('\n\n');
    }

    genBtn.addEventListener('click', generate);
    document.getElementById('qty-plus').addEventListener('click', () => { qtyInput.value = parseInt(qtyInput.value) + 1; });
    document.getElementById('qty-minus').addEventListener('click', () => { if(qtyInput.value > 1) qtyInput.value = parseInt(qtyInput.value) - 1; });

    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>