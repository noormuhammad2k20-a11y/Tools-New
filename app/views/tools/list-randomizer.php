

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-list" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Enter your items here (one per line)..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="shuffle-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-shuffle transition-transform group-hover:rotate-180"></i>
                    <span>Shuffle List</span>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary text-xl">
                    <i class="fa-solid fa-sort"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-1">List Randomizer</h4>
                    <p id="item-count" class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">0 Items Detected</p>
                </div>
            </div>
            <button id="copy-btn" class="px-5 py-2.5 bg-white border border-gray-200 text-primary text-[10px] font-black uppercase rounded-lg shadow-sm hover:border-primary transition-all flex items-center gap-2">
                <i class="fa-solid fa-copy"></i>
                Copy Result
            </button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const shuffleBtn = document.getElementById('shuffle-btn');
    const countBadge = document.getElementById('item-count');

    function updateCount() {
        const lines = input.value.split('\n').filter(l => l.trim().length > 0);
        countBadge.innerText = lines.length + ' Items Detected';
    }

    shuffleBtn.addEventListener('click', () => {
        let lines = input.value.split('\n').filter(l => l.trim().length > 0);
        if(lines.length < 2) return;
        
        // Fisher-Yates Shuffle
        for (let i = lines.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [lines[i], lines[j]] = [lines[j], lines[i]];
        }
        
        input.value = lines.join('\n');
    });

    input.addEventListener('input', updateCount);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; updateCount(); input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





