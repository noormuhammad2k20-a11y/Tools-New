

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden">
        
        <div class="absolute top-0 right-0 p-4">
            <span class="px-3 py-1 bg-violet-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-violet-500/20">Ultra Tagline Pro</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
            <!-- Controls -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Brand / Product Name</label>
                    <input type="text" id="ai-brand" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-violet-500/5 focus:border-violet-500 transition-all shadow-inner" 
                        placeholder="e.g. EcoFootprint">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Main Benefit / Niche</label>
                    <input type="text" id="ai-niche" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-violet-500/5 focus:border-violet-500 transition-all shadow-inner" 
                        placeholder="e.g. Sustainable lifestyle">
                </div>

                <button id="btn-slogan" class="w-full py-5 bg-violet-600 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-violet-500/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                    <i class="fa-solid fa-wand-sparkles text-xl"></i>
                    Generate Taglines
                </button>
            </div>

            <!-- Result Side -->
            <div class="relative min-h-[400px] flex flex-col">
                <!-- Loading -->
                <div id="ai-loading" class="hidden absolute inset-0 z-20 flex flex-col items-center justify-center bg-white/90 backdrop-blur-sm rounded-3xl border border-violet-100 border-dashed">
                    <div class="w-12 h-12 border-4 border-violet-600 border-t-transparent rounded-full animate-spin mb-4"></div>
                    <p class="text-[10px] font-black text-violet-600 uppercase tracking-widest animate-pulse">Crafting Identity...</p>
                </div>

                <div id="slogan-body" class="flex-grow p-6 bg-gray-50/50 border border-gray-100 rounded-3xl overflow-auto space-y-4">
                    <div class="h-full flex flex-col items-center justify-center text-center opacity-30 select-none">
                        <i class="fa-solid fa-quote-left fa-3x mb-4 text-violet-200"></i>
                        <p class="text-xs font-bold uppercase tracking-widest">Your brand tomorrow.<br>Generated identity today.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Content Area -->


<script>
const brandIn = document.getElementById('ai-brand');
const nicheIn = document.getElementById('ai-niche');
const body = document.getElementById('slogan-body');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-slogan');

btn.addEventListener('click', async () => {
    const brand = brandIn.value;
    if(!brand) return;
    loading.classList.remove('hidden');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 1500));
    loading.classList.add('hidden');

    const slogans = [
        `${brand}: The Future of ${nicheIn.value || 'Innovation'}.`,
        `Better Living with ${brand}.`,
        `${brand}: Simple. Fast. Powerful.`,
        `Unlock Your Potential with ${brand}.`,
        `${brand}: Where ${nicheIn.value || 'Success'} Begins.`
    ];

    let html = '<div class="space-y-3">';
    slogans.forEach(s => {
        html += `
            <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-all group flex items-center justify-between gap-4">
                <span class="text-gray-900 font-bold leading-tight">${s}</span>
                <button class="px-4 py-2 bg-gray-50 text-[10px] font-black uppercase tracking-widest text-gray-400 rounded-xl hover:bg-violet-50 hover:text-violet-600 transition-all border border-transparent hover:border-violet-100 shrink-0" onclick="copyTagline(this, \`${s.replace(/'/g, "\\'")}\`)">Copy</button>
            </div>
        `;
    });
    html += '</div>';
    body.innerHTML = html;
});

function copyTagline(btn, s) {
    navigator.clipboard.writeText(s);
    const original = btn.innerText;
    btn.innerText = 'Copied!';
    setTimeout(() => btn.innerText = original, 2000);
}
</script>






