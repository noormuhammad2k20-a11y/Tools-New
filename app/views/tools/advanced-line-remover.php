

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 font-mono resize-none outline-none" placeholder="Paste your list here..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <!-- Controls Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="space-y-4">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Remove Lines Starting With</label>
                    <div class="flex gap-2">
                        <input type="text" id="prefix-val" class="flex-grow p-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none text-sm font-bold text-gray-700" placeholder="e.g. // or #">
                        <button id="rem-prefix" class="px-4 py-3 bg-gray-900 text-white rounded-xl font-bold text-xs hover:bg-black transition-colors">Execute</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Remove Lines Ending With</label>
                    <div class="flex gap-2">
                        <input type="text" id="suffix-val" class="flex-grow p-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none text-sm font-bold text-gray-700" placeholder="e.g. .log or ;">
                        <button id="rem-suffix" class="px-4 py-3 bg-gray-900 text-white rounded-xl font-bold text-xs hover:bg-black transition-colors">Execute</button>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Remove Lines Containing</label>
                    <div class="flex gap-2">
                        <input type="text" id="match-val" class="flex-grow p-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none text-sm font-bold text-gray-700" placeholder="e.g. error or test">
                        <button id="rem-matching" class="px-4 py-3 bg-red-500 text-white rounded-xl font-bold text-xs hover:bg-red-600 transition-colors shadow-lg shadow-red-100">Remove</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Keep ONLY Lines Containing</label>
                    <div class="flex gap-2">
                        <input type="text" id="keep-val" class="flex-grow p-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none text-sm font-bold text-gray-700" placeholder="e.g. success">
                        <button id="rem-non-matching" class="px-4 py-3 bg-emerald-500 text-white rounded-xl font-bold text-xs hover:bg-emerald-600 transition-colors shadow-lg shadow-emerald-100">Filter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button id="copy-btn" class="px-8 py-4 bg-primary text-white rounded-pill font-black uppercase tracking-[0.15em] shadow-xl shadow-primary/20 hover:scale-105 transition-all">
                <i class="fa-solid fa-copy mr-2"></i> Copy result
            </button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');

    function execute(logic) {
        const lines = input.value.split(/\n/);
        input.value = lines.filter(logic).join('\n');
    }

    document.getElementById('rem-prefix').addEventListener('click', () => {
        const val = document.getElementById('prefix-val').value;
        if(!val) return;
        execute(line => !line.trim().startsWith(val));
    });

    document.getElementById('rem-suffix').addEventListener('click', () => {
        const val = document.getElementById('suffix-val').value;
        if(!val) return;
        execute(line => !line.trim().endsWith(val));
    });

    document.getElementById('rem-matching').addEventListener('click', () => {
        const val = document.getElementById('match-val').value;
        if(!val) return;
        execute(line => !line.includes(val));
    });

    document.getElementById('rem-non-matching').addEventListener('click', () => {
        const val = document.getElementById('keep-val').value;
        if(!val) return;
        execute(line => line.includes(val));
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





