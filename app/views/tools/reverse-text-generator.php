

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 transition-all group-hover:bg-blue-100"></div>

        <div class="relative z-10 space-y-8">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-primary uppercase tracking-[0.6em] mb-3">Mirror Protocol</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Symmetrical String Transformation</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-200 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20 transition-colors group-hover/field:text-primary">Source Signal</div>
                    <textarea id="input-text" class="w-full h-80 p-8 bg-gray-50/50 border border-gray-200 rounded-3xl focus:ring-8 focus:ring-primary/5 focus:border-primary/20 outline-none transition-all text-gray-700 text-lg font-medium resize-none shadow-inner placeholder-gray-300" placeholder="Type normal text here..."></textarea>
                    <button id="clear-btn" class="absolute bottom-6 right-6 p-4 bg-white/90 border border-gray-200 text-gray-400 hover:text-red-500 rounded-2xl transition-all shadow-sm hover:shadow-md active:scale-90">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-200 rounded-lg text-[10px] font-black text-primary uppercase tracking-widest z-20">Reflected Result</div>
                    <textarea id="output-text" class="w-full h-80 p-8 bg-blue-50/10 border border-blue-100 rounded-3xl text-gray-900 text-lg font-medium resize-none outline-none shadow-sm transition-all hover:bg-blue-50/20" readonly placeholder="Reflected result..."></textarea>
                    
                    <button id="copy-btn" class="absolute bottom-6 right-6 px-8 py-4 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-primary/20 hover:bg-primary-hover hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                        <i class="fa-solid fa-clone"></i>
                        Copy Reflected
                    </button>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-6 p-2 bg-gray-50 rounded-[2rem] border border-gray-100">
                <div class="flex-grow flex p-1 bg-white rounded-2xl shadow-sm border border-gray-100 w-full md:w-auto overflow-x-auto no-scrollbar">
                    <button data-mode="text" class="mode-btn active-pill flex-1 px-8 py-4 text-[10px] font-black uppercase tracking-widest bg-primary text-white rounded-xl shadow-lg transition-all whitespace-nowrap">Entire Text</button>
                    <button data-mode="words" class="mode-btn flex-1 px-8 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-primary transition-all whitespace-nowrap">Words Only</button>
                    <button data-mode="lines" class="mode-btn flex-1 px-8 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-primary transition-all whitespace-nowrap">Lines Inplace</button>
                </div>
                
                <div class="w-full md:w-auto px-4 pb-2 md:pb-0">
                    <button id="exec-btn" class="w-full md:w-auto px-12 py-5 bg-gray-900 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-2xl shadow-gray-900/10 hover:bg-black transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-repeat text-blue-400"></i>
                        Invert Signal
                    </button>
                </div>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const modeBtns = document.querySelectorAll('.mode-btn');
    const execBtn = document.getElementById('exec-btn');
    let mode = 'text';

    function process() {
        const val = input.value;
        if(!val) { output.value = ''; return; }
        
        let res = "";
        switch(mode) {
            case 'text':
                res = val.split('').reverse().join('');
                break;
            case 'words':
                res = val.split(' ').reverse().join(' ');
                break;
            case 'lines':
                res = val.split('\n').map(l => l.split('').reverse().join('')).join('\n');
                break;
        }
        output.value = res;
    }

    modeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modeBtns.forEach(b => b.className = "mode-btn flex-1 px-8 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-primary transition-all whitespace-nowrap");
            btn.className = "mode-btn active-pill flex-1 px-8 py-4 text-[10px] font-black uppercase tracking-widest bg-primary text-white rounded-xl shadow-lg transition-all whitespace-nowrap";
            mode = btn.dataset.mode;
            process();
        });
    });

    execBtn.addEventListener('click', process);
    input.addEventListener('input', process);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.value);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> Reflected!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    process();
});
</script>





