

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="mb-8">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-medium" placeholder="Paste a long article here to summarize..."></textarea>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mb-8 items-center">
            <div class="flex-grow flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Summary Length</label>
                <div class="flex items-center bg-gray-50 border border-gray-100 rounded-2xl p-2 gap-4">
                    <input type="range" id="length-slider" min="1" max="5" value="3" class="flex-grow h-1.5 bg-gray-100 rounded-lg appearance-none cursor-pointer accent-primary">
                    <span id="len-val" class="text-xs font-black text-primary w-24">3 Sentences</span>
                </div>
            </div>
            <button id="gen-btn" class="px-10 py-5 bg-primary text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-compress text-xl"></i>
                Summarize
            </button>
        </div>

        <div id="output-box" class="hidden p-8 bg-blue-50/10 border border-blue-100 rounded-3xl relative group animate-fade-in shadow-inner">
            <h4 class="text-[10px] font-black text-primary uppercase tracking-[0.4em] mb-4">Extracted Insights</h4>
            <div id="summary-text" class="text-gray-900 text-lg leading-relaxed font-serif"></div>
            <button id="copy-btn" class="absolute top-4 right-4 p-2.5 bg-white border border-gray-100 text-gray-400 hover:text-primary rounded-xl shadow-sm transition-all group-hover:scale-110">
                <i class="fa-solid fa-clone"></i>
            </button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const genBtn = document.getElementById('gen-btn');
    const outputBox = document.getElementById('output-box');
    const outputText = document.getElementById('summary-text');
    const lengthSlider = document.getElementById('length-slider');
    const lenVal = document.getElementById('len-val');

    lengthSlider.addEventListener('input', () => { lenVal.innerText = `${lengthSlider.value} Sentences`; });

    function summarize() {
        const text = input.value.trim();
        if(!text) return;

        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 10);
        if(sentences.length <= 1) {
            outputText.innerText = text;
            outputBox.classList.remove('hidden');
            return;
        }

        // Simple extractive summarization: Pick first, middle, last or first few sentences
        const count = parseInt(lengthSlider.value);
        let summary = [];
        
        if(sentences.length <= count) {
            summary = sentences;
        } else {
            // Basic logic: Select first sentence always, others distributed
            summary.push(sentences[0]);
            const step = Math.floor((sentences.length - 2) / (count - 1));
            for(let i=1; i<count-1; i++) {
                summary.push(sentences[i * step + 1]);
            }
            if(count > 1) summary.push(sentences[sentences.length - 1]);
        }

        outputText.innerText = summary.join('. ') + '.';
        outputBox.classList.remove('hidden');
        outputBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    genBtn.addEventListener('click', summarize);
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(outputText.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check text-emerald-500"></i>';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





