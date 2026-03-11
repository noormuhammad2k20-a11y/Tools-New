<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block lowercase italic">Forward Text</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-medium" placeholder="The quick brown fox..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Word-Reversed Result</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none font-sans" readonly placeholder="fox brown quick The..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100/50 text-center">
            <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Structure Logic</h4>
            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest leading-relaxed">This tool preserves individual word spelling while reordering the entire sentence structure from bottom to top.</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');

    function reverse() {
        const val = input.value.trim();
        if(!val) { output.value = ''; return; }
        
        const res = val.split('\n').map(line => {
            return line.split(' ').reverse().join(' ');
        }).join('\n');
        
        output.value = res;
    }

    input.addEventListener('input', reverse);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        copyBtn.innerText = 'Copied!';
        setTimeout(() => copyBtn.innerText = 'Copy', 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
