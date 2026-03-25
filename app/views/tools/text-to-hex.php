

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">Text Input</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste text here..."></textarea>
            </div>

            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Hex Output</label>
                <textarea id="output-hex" class="w-full h-80 p-6 bg-indigo-50/10 border border-indigo-100 rounded-2xl text-gray-900 text-sm resize-none outline-none font-mono" readonly placeholder="48 65 6C 6C 6F..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:bg-primary-hover transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 items-center justify-between p-6 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 text-indigo-500">
                    <i class="fa-solid fa-hashtag"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900">Hexadecimal Format</h4>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-black">Base-16 Encoding</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button data-sep=" " class="sep-btn px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-md transition-all">Space</button>
                <button data-sep="," class="sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all">Comma</button>
                <button data-sep="" class="sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all">None</button>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-hex');
    const sepBtns = document.querySelectorAll('.sep-btn');
    let separator = ' ';

    function update() {
        const text = input.value;
        if(!text) { output.value = ''; return; }
        output.value = text.split('').map(c => c.charCodeAt(0).toString(16).toUpperCase().padStart(2, '0')).join(separator);
    }

    sepBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            sepBtns.forEach(b => {
                b.className = "sep-btn px-4 py-2 bg-white border border-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:border-primary transition-all";
            });
            btn.className = "sep-btn px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-md transition-all";
            separator = btn.dataset.sep;
            update();
        });
    });

    input.addEventListener('input', update);
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerText;
        document.getElementById('copy-btn').innerText = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerText = original, 2000);
    });
});
</script>





