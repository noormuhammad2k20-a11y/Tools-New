<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-48 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste text here to analyze character frequency..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div id="analysis-results" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Top Characters Table -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-list-ol text-primary"></i>
                        Top 10 Characters
                    </h3>
                    <div id="char-table" class="space-y-2">
                        <!-- Rows -->
                    </div>
                </div>

                <!-- Statistics Summary -->
                <div class="space-y-4">
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50">
                        <div class="text-xs font-bold text-blue-400 uppercase tracking-widest mb-1">Unique Characters</div>
                        <div id="stat-unique" class="text-3xl font-black text-blue-600">0</div>
                    </div>
                    <div class="bg-purple-50/50 p-6 rounded-2xl border border-purple-100/50">
                        <div class="text-xs font-bold text-purple-400 uppercase tracking-widest mb-1">Most Frequent</div>
                        <div id="stat-most" class="text-3xl font-black text-purple-600">-</div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 border-dashed">
                        <p class="text-xs text-gray-500 leading-relaxed italic">Analysis includes spaces, punctuation, and special characters to provide a complete cryptographic profile of your text.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="empty-state" class="text-center py-12">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300 text-3xl">
                <i class="fa-solid fa-magnifying-glass-chart"></i>
            </div>
            <p class="text-gray-400 font-medium">Results will appear here as you type...</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const results = document.getElementById('analysis-results');
    const empty = document.getElementById('empty-state');
    const charTable = document.getElementById('char-table');
    const statUnique = document.getElementById('stat-unique');
    const statMost = document.getElementById('stat-most');

    function update() {
        const text = input.value;
        if(!text) {
            results.classList.add('hidden');
            empty.classList.remove('hidden');
            return;
        }

        results.classList.remove('hidden');
        empty.classList.add('hidden');

        const freq = {};
        for (let char of text) {
            freq[char] = (freq[char] || 0) + 1;
        }

        const sorted = Object.entries(freq).sort((a,b) => b[1] - a[1]);
        const total = text.length;

        statUnique.innerText = sorted.length.toLocaleString();
        statMost.innerText = sorted[0][0] === ' ' ? '[Space]' : sorted[0][0];

        charTable.innerHTML = sorted.slice(0, 10).map(([char, count]) => {
            const pct = ((count/total)*100).toFixed(1);
            const label = char === ' ' ? '<span class="text-gray-400">[Space]</span>' : char;
            return `
                <div class="flex items-center gap-4 bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                    <div class="w-8 h-8 flex items-center justify-center bg-gray-50 rounded font-mono font-bold text-primary">${label}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="font-bold text-gray-700">${count} times</span>
                            <span class="text-gray-400">${pct}%</span>
                        </div>
                        <div class="w-full bg-gray-100 h-1 rounded-full overflow-hidden">
                            <div class="bg-primary h-full transition-all duration-500 shadow-[0_0_8px_rgba(37,99,235,0.4)]" style="width: ${pct}%"></div>
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