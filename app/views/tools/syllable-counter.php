

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Card -->
        <div class="bg-gray-50 border border-secondary/10 rounded-3xl p-8 mb-8 text-center transition-all duration-300">
            <div id="big-result" class="text-7xl font-black text-primary mb-2">0</div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Estimated Syllables</div>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-64 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Enter text to analyze syllable count..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50">
            <h4 class="font-bold text-gray-900 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-blue-500"></i>
                How it works
            </h4>
            <p class="text-sm text-gray-600 leading-relaxed">Our algorithm uses linguistic heuristics to identify vowel clusters and silent patterns, providing a highly accurate estimation for standard English text.</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const result = document.getElementById('big-result');

    function countSyllables(word) {
        word = word.toLowerCase();
        if(word.length <= 3) return 1;
        word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
        word = word.replace(/^y/, '');
        const syl = word.match(/[aeiouy]{1,2}/g);
        return syl ? syl.length : 1;
    }

    function update() {
        const text = input.value;
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        let total = 0;
        words.forEach(w => total += countSyllables(w));
        result.innerText = total.toLocaleString();
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>





