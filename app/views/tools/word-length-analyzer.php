<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-48 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste text here to analyze word length distribution..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div id="results-area" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Word Length Table -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-text-width text-primary"></i>
                        Length Frequency
                    </h3>
                    <div id="length-table" class="space-y-3">
                        <!-- Rows -->
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="space-y-4">
                    <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50">
                        <div class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-1">Average Length</div>
                        <div id="stat-avg" class="text-3xl font-black text-emerald-600">0.0</div>
                    </div>
                    <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100/50">
                        <div class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-1">Longest Word</div>
                        <div id="stat-longest" class="text-3xl font-black text-indigo-600">-</div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 border-dashed">
                        <p class="text-xs text-gray-500 leading-relaxed italic">Understanding word length helps in tailoring your writing to specific audience reading levels.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="empty-state" class="text-center py-12">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300 text-3xl">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <p class="text-gray-400 font-medium">Distribution results will appear as you type...</p>
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
    const table = document.getElementById('length-table');

    function update() {
        const text = input.value;
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        
        if(!words.length) {
            area.classList.add('hidden');
            empty.classList.remove('hidden');
            return;
        }

        area.classList.remove('hidden');
        empty.classList.add('hidden');

        const freq = {};
        let totalLen = 0;
        let longest = "";

        words.forEach(w => {
            const clean = w.replace(/[^a-zA-Z]/g, '');
            const len = clean.length;
            if(len > 0) {
                freq[len] = (freq[len] || 0) + 1;
                totalLen += len;
                if(clean.length > longest.length) longest = clean;
            }
        });

        const sorted = Object.entries(freq).sort((a,b) => parseInt(a[0]) - parseInt(b[0]));
        const totalWords = words.length;

        document.getElementById('stat-avg').innerText = (totalLen / totalWords).toFixed(1);
        document.getElementById('stat-longest').innerText = longest.length + ' chars';

        table.innerHTML = sorted.map(([len, count]) => {
            const pct = ((count/totalWords)*100).toFixed(1);
            return `
                <div class="flex items-center gap-4 bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                    <div class="w-12 text-xs font-bold text-gray-400 uppercase tracking-tighter">${len} letters</div>
                    <div class="flex-grow">
                        <div class="flex justify-between text-[10px] mb-1">
                            <span class="font-bold text-gray-700">${count} words</span>
                            <span>${pct}%</span>
                        </div>
                        <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-indigo-500 h-full transition-all duration-500" style="width: ${pct}%"></div>
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>