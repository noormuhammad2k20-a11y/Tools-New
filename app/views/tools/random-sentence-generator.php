

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Sentence Count</label>
                <input type="number" id="qty-input" value="5" min="1" max="50" 
                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 focus:ring-4 focus:ring-primary/5 outline-none transition-all">
            </div>
            <div class="flex items-end">
                <button id="gen-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-wand-sparkles"></i>
                    Generate Sentences
                </button>
            </div>
        </div>

        <div class="relative group">
            <div id="output-list" class="w-full min-h-[400px] p-8 bg-gray-50 border border-gray-100 rounded-3xl text-slate-600 text-lg leading-relaxed font-serif whitespace-pre-wrap transition-all group-hover:bg-white group-hover:shadow-lg group-hover:shadow-primary/5 shadow-inner">
                <!-- Sentences will appear here -->
            </div>
            <div class="absolute top-4 right-4 outline-none">
                <button id="copy-btn" class="px-6 py-2.5 bg-white border border-gray-100 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl shadow-sm hover:border-primary transition-all flex items-center gap-2">
                    <i class="fa-solid fa-copy"></i>
                    Copy
                </button>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qty-input');
    const genBtn = document.getElementById('gen-btn');
    const output = document.getElementById('output-list');

    const subjects = ["The curious cat", "A mysterious traveler", "The software engineer", "A golden retriever", "The hidden treasure", "A distant star", "The ancient map", "A young artist", "The old lighthouse", "A stormy night"];
    const actions = ["discovered", "explored", "repaired", "noticed", "celebrated", "invented", "translated", "protected", "chased", "studied"];
    const objects = ["the lost artifact", "a complex algorithm", "the mountain trail", "a forgotten melody", "the city skyline", "a dusty journal", "the colorful garden", "a secret message", "the ocean waves", "a bright future"];

    function generate() {
        const qty = parseInt(qtyInput.value) || 5;
        let res = [];
        for(let i=0; i<qty; i++) {
            const s = subjects[Math.floor(Math.random() * subjects.length)];
            const a = actions[Math.floor(Math.random() * actions.length)];
            const o = objects[Math.floor(Math.random() * objects.length)];
            res.push(`${s} ${a} ${o}.`);
        }
        output.innerText = res.join('\n\n');
    }

    genBtn.addEventListener('click', generate);
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    generate();
});
</script>





