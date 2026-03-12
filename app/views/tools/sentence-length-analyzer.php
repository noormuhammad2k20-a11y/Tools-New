<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-48 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste text here to analyze sentence lengths..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div id="results-area" class="hidden">
            <!-- Summary Row -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8 text-center">
                <div class="bg-blue-50/50 border border-blue-100/50 p-6 rounded-2xl">
                    <div id="res-avg" class="text-3xl font-black text-blue-600">0</div>
                    <div class="text-[10px] font-bold text-blue-400 uppercase tracking-widest mt-1">Avg Word Count</div>
                </div>
                <div class="bg-purple-50/50 border border-purple-100/50 p-6 rounded-2xl">
                    <div id="res-longest" class="text-3xl font-black text-purple-600">0</div>
                    <div class="text-[10px] font-bold text-purple-400 uppercase tracking-widest mt-1">Longest (Words)</div>
                </div>
                <div class="bg-gray-50 border border-gray-100 p-6 rounded-2xl">
                    <div id="res-shortest" class="text-3xl font-black text-gray-600">0</div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Shortest (Words)</div>
                </div>
            </div>

            <!-- Visualization Area -->
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-chart-bar text-primary"></i>
                    Sentence Flow Map
                </h3>
                <div id="flow-map" class="flex flex-wrap gap-2 items-end min-h-[100px]">
                    <!-- Visual map of sentences -->
                </div>
                <div class="mt-6 pt-6 border-t border-gray-50 text-xs text-gray-400 italic">
                    Each bar represents a sentence. The height indicates word count relative to the average.
                </div>
            </div>
        </div>

        <div id="empty-state" class="text-center py-12">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300 text-3xl">
                <i class="fa-solid fa-ruler"></i>
            </div>
            <p class="text-gray-400 font-medium">Analysis will appear as you type...</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const area = document.getElementById('results-area');
    const empty = document.getElementById('empty-state');
    
    function update() {
        const text = input.value;
        if(!text.trim()) {
            area.classList.add('hidden');
            empty.classList.remove('hidden');
            return;
        }

        area.classList.remove('hidden');
        empty.classList.add('hidden');

        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const counts = sentences.map(s => s.trim().split(/\s+/).length);
        
        if(!counts.length) return;

        const sum = counts.reduce((a, b) => a + b, 0);
        const avg = (sum / counts.length).toFixed(1);
        const max = Math.max(...counts);
        const min = Math.min(...counts);

        document.getElementById('res-avg').innerText = avg;
        document.getElementById('res-longest').innerText = max;
        document.getElementById('res-shortest').innerText = min;

        const map = document.getElementById('flow-map');
        map.innerHTML = counts.map(count => {
            const h = Math.min(Math.max((count / max) * 80, 20), 100);
            let color = "bg-primary";
            if(count > 25) color = "bg-orange-400"; // Long sentence
            if(count < 8) color = "bg-blue-400"; // Short sentence
            
            return `<div class="w-3 ${color} rounded-t-sm transition-all duration-500 shadow-sm" style="height: ${h}px" title="${count} words"></div>`;
        }).join('');
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>