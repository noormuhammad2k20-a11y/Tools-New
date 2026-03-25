

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 transition-all group-hover:bg-emerald-100"></div>

        <div class="relative z-10 space-y-8">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-emerald-600 uppercase tracking-[0.6em] mb-3">Echo Protocol</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Rapid Content Multiplication</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-8">
                <div class="space-y-6">
                    <div class="relative group/field">
                        <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-200 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20 transition-colors group-hover/field:text-emerald-500">Seed Content</div>
                        <textarea id="input-data" class="w-full h-80 p-8 bg-gray-50/50 border border-gray-200 rounded-[2rem] focus:ring-8 focus:ring-emerald-500/5 focus:border-emerald-500/20 outline-none transition-all text-gray-700 text-lg font-medium resize-none shadow-inner placeholder-gray-300" placeholder="Type text to repeat here..."></textarea>
                        <button id="clear-btn" class="absolute bottom-6 right-6 p-4 bg-white/90 border border-gray-200 text-gray-400 hover:text-red-500 rounded-2xl transition-all shadow-sm hover:shadow-md active:scale-90">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="relative group/field">
                        <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-emerald-500/20 rounded-lg text-[10px] font-black text-emerald-600 uppercase tracking-widest z-20">Amplified Result</div>
                        <textarea id="output-data" class="w-full h-80 p-8 bg-emerald-50/10 border border-emerald-100 rounded-[2rem] text-gray-900 text-sm font-medium resize-none outline-none shadow-sm transition-all hover:bg-emerald-50/20" readonly placeholder="Echo results will appear here..."></textarea>
                        
                        <button id="copy-btn" class="absolute bottom-6 right-6 px-8 py-4 bg-emerald-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-emerald-600/20 hover:bg-emerald-500 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                            <i class="fa-solid fa-clone"></i>
                            Copy All
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50 rounded-[2.5rem] border border-gray-100 grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
                <div class="space-y-3 px-2">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex justify-between">
                        <span>Iteration Count</span>
                        <span id="count-val" class="text-emerald-600">10</span>
                    </label>
                    <input type="range" id="rpt-range" min="1" max="1000" value="10" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-600">
                    <div class="flex justify-between text-[8px] font-black text-gray-300 uppercase px-1">
                        <span>1</span>
                        <span>500</span>
                        <span>1000</span>
                    </div>
                </div>

                <div class="space-y-3 px-2">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Separator logic</label>
                    <div class="relative">
                        <select id="rpt-sep" class="w-full p-4 bg-white border border-gray-200 rounded-2xl font-bold text-gray-700 outline-none text-xs appearance-none focus:ring-4 focus:ring-emerald-500/5 transition-all">
                            <option value="\n">↵ New Line Break</option>
                            <option value=" ">⇥ Space Character</option>
                            <option value=", ">⧉ Comma Separated</option>
                            <option value="">∅ No Separator</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </div>
                    </div>
                </div>

                <div class="px-2 pb-1">
                    <button id="exec-btn" class="w-full py-5 bg-gray-900 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-2xl shadow-gray-900/10 hover:bg-black transition-all flex items-center justify-center gap-3 active:scale-95">
                        <i class="fa-solid fa-bolt-lightning text-emerald-400 animate-pulse"></i>
                        Activate Echo
                    </button>
                </div>
            </div>
            
            <input type="hidden" id="rpt-count" value="10">
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('output-data');
    const rptRange = document.getElementById('rpt-range');
    const rptCount = document.getElementById('rpt-count');
    const countVal = document.getElementById('count-val');
    const rptSep = document.getElementById('rpt-sep');
    const execBtn = document.getElementById('exec-btn');

    rptRange.addEventListener('input', () => {
        rptCount.value = rptRange.value;
        countVal.innerText = rptRange.value;
    });

    execBtn.addEventListener('click', () => {
        const text = input.value;
        const count = parseInt(rptCount.value) || 0;
        let sep = rptSep.value;
        if(sep === '\\n') sep = '\n';
        
        if(!text) { 
            showToast("Please enter some text to echo."); 
            return; 
        }
        
        if(count > 10000) {
            showToast("Max count is 10,000 for stability.");
            return;
        }

        let res = new Array(count).fill(text);
        output.value = res.join(sep);
        showToast(`Cloned ${count} times!`);
    });

    input.addEventListener('input', () => {
        if(!input.value) output.value = '';
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.value);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> Echo Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





