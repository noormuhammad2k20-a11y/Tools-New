<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Card -->
        <div class="bg-gray-50 border border-secondary/10 rounded-3xl p-8 mb-8 text-center transition-all duration-300">
            <div id="big-result" class="text-7xl font-black text-primary mb-2">0</div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Total Sentences</div>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your paragraphs here..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <!-- Meta Data -->
        <div class="p-5 bg-gray-50 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 shadow-sm">
                    <i class="fa-solid fa-text-height text-primary"></i>
                </div>
                <div>
                    <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Averge Words/Sent</div>
                    <div id="stat-avg" class="text-lg font-bold text-gray-900">0.0</div>
                </div>
            </div>
            <p class="text-gray-500 text-sm max-w-sm text-center md:text-right">A healthy average for web readability is between 15-20 words per sentence.</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const result = document.getElementById('big-result');
    const statAvg = document.getElementById('stat-avg');

    function update() {
        const text = input.value;
        if(!text.trim()) {
            result.innerText = '0';
            statAvg.innerText = '0.0';
            return;
        }

        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        
        result.innerText = sentences.length.toLocaleString();
        statAvg.innerText = sentences.length ? (words.length / sentences.length).toFixed(1) : '0.0';
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
