<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">CSV Content / List</label>
                <textarea id="input-data" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="Item1, Item2, Item3..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">New-Line List</label>
                <textarea id="output-data" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none" readonly placeholder="Result..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-4">
            <div class="flex-grow flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Detect Separator</label>
                <div class="flex gap-2">
                    <button data-sep="," class="sep-btn px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-md transition-all">Comma (,)</button>
                    <button data-sep=";" class="sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all">Semicolon (;)</button>
                    <button data-sep="|" class="sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all">Pipe (|)</button>
                </div>
            </div>
            <div class="flex items-end">
                <button id="exec-btn" class="px-8 py-3 bg-primary text-white rounded-xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:bg-primary-hover transition-all">Convert</button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('output-data');
    const sepBtns = document.querySelectorAll('.sep-btn');
    const execBtn = document.getElementById('exec-btn');
    let separator = ',';

    function process() {
        const val = input.value;
        if(!val) { output.value = ''; return; }
        
        const lines = val.split(separator).map(l => l.trim()).filter(l => l.length > 0);
        output.value = lines.join('\n');
    }

    sepBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            sepBtns.forEach(b => {
                b.className = "sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all";
            });
            btn.className = "sep-btn px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-md transition-all";
            separator = btn.dataset.sep;
            process();
        });
    });

    execBtn.addEventListener('click', process);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
