

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden">
        
        <div class="absolute top-0 right-0 p-4">
            <span class="px-3 py-1 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-primary/20">Name Gen Pro</span>
        </div>

        <div class="space-y-8 mt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Industry / Niche</label>
                    <input type="text" id="bnIndustry" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-inner" 
                        placeholder="e.g. Technology, Food" value="Technology">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Keywords</label>
                    <input type="text" id="bnKeywords" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-inner" 
                        placeholder="e.g. smart, cloud" value="smart, cloud">
                </div>
            </div>

            <div class="space-y-3">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Name Style</label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <label class="relative flex flex-col p-4 bg-gray-50 border border-gray-100 rounded-2xl cursor-pointer hover:border-primary/30 transition-all group overflow-hidden">
                        <input type="radio" name="bnStyle" value="modern" checked class="peer sr-only">
                        <div class="absolute inset-0 bg-primary/5 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <span class="block text-xs font-black uppercase tracking-widest text-gray-400 peer-checked:text-primary transition-colors">Modern</span>
                        </div>
                        <div class="absolute bottom-0 right-0 p-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                            <i class="fa-solid fa-circle-check text-primary text-xs"></i>
                        </div>
                    </label>
                    <label class="relative flex flex-col p-4 bg-gray-50 border border-gray-100 rounded-2xl cursor-pointer hover:border-primary/30 transition-all group overflow-hidden">
                        <input type="radio" name="bnStyle" value="classic" class="peer sr-only">
                        <div class="absolute inset-0 bg-primary/5 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <span class="block text-xs font-black uppercase tracking-widest text-gray-400 peer-checked:text-primary transition-colors">Classic</span>
                        </div>
                        <div class="absolute bottom-0 right-0 p-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                            <i class="fa-solid fa-circle-check text-primary text-xs"></i>
                        </div>
                    </label>
                    <label class="relative flex flex-col p-4 bg-gray-50 border border-gray-100 rounded-2xl cursor-pointer hover:border-primary/30 transition-all group overflow-hidden">
                        <input type="radio" name="bnStyle" value="playful" class="peer sr-only">
                        <div class="absolute inset-0 bg-primary/5 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <span class="block text-xs font-black uppercase tracking-widest text-gray-400 peer-checked:text-primary transition-colors">Playful</span>
                        </div>
                        <div class="absolute bottom-0 right-0 p-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                            <i class="fa-solid fa-circle-check text-primary text-xs"></i>
                        </div>
                    </label>
                    <label class="relative flex flex-col p-4 bg-gray-50 border border-gray-100 rounded-2xl cursor-pointer hover:border-primary/30 transition-all group overflow-hidden">
                        <input type="radio" name="bnStyle" value="professional" class="peer sr-only">
                        <div class="absolute inset-0 bg-primary/5 opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <span class="block text-xs font-black uppercase tracking-widest text-gray-400 peer-checked:text-primary transition-colors">Pro</span>
                        </div>
                        <div class="absolute bottom-0 right-0 p-2 opacity-0 peer-checked:opacity-100 transition-opacity">
                            <i class="fa-solid fa-circle-check text-primary text-xs"></i>
                        </div>
                    </label>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-50">
                <button onclick="generateNames()" class="flex-[3] py-5 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                    <i class="fa-solid fa-sparkles text-xl"></i>
                    Generate Names
                </button>
                <button onclick="document.getElementById('bn-results').classList.add('hidden')" class="flex-1 py-5 bg-white border border-gray-100 text-gray-400 rounded-2xl font-black uppercase tracking-widest hover:text-gray-600 hover:border-gray-200 transition-all">Clear</button>
            </div>

            <div id="bn-results" class="hidden mt-12 pt-10 border-t border-gray-100 space-y-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Hand-Crafted Names</h3>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mt-1">Ready for registration</p>
                    </div>
                </div>
                <div id="bn-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
            </div>
        </div>
    </div>


    </div>


<!-- Content Area -->




<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
const prefixes = {
    modern: ['Nova','Flux','Apex','Pulse','Zenith','Nexus','Vibe','Core','Sync','Edge','Pixel','Grid','Ion','Byte','Hive'],
    classic: ['Premier','Sterling','Crown','Heritage','Pinnacle','Meridian','Cornerstone','Beacon','Titan','Atlas','Summit','Legend'],
    playful: ['Spark','Bliss','Jolly','Fizz','Bloom','Snap','Doodle','Zippy','Breezy','Chirp','Bounce','Frolic'],
    professional: ['Strategic','Vertex','Vanguard','Catalyst','Prodigy','Infinite','Paramount','Precision','Elevate','Integrity']
};
const suffixes = {
    modern: ['Labs','Hub','AI','Tech','ify','ly','Stack','Wave','Base','Cloud','Works','Studio','Space'],
    classic: ['& Co.','Group','Solutions','Industries','Partners','Holdings','Associates','Consulting','Corp','Ltd'],
    playful: ['Pop','Joy','Box','Spot','Land','Zone','Go','Fun','Nest','Den','Club'],
    professional: ['Systems','Global','Dynamics','Analytics','Ventures','Capital','Advisory','Intelligence','Pro']
};

function generateNames() {
    const industry = document.getElementById('bnIndustry').value.trim() || 'Business';
    const keywords = document.getElementById('bnKeywords').value.split(',').map(k => k.trim()).filter(Boolean);
    const style = document.querySelector('input[name="bnStyle"]:checked').value;

    const pList = prefixes[style] || prefixes.modern;
    const sList = suffixes[style] || suffixes.modern;
    const names = new Set();

    // Keyword-based combos
    keywords.forEach(kw => {
        const capKw = kw.charAt(0).toUpperCase() + kw.slice(1);
        names.add(capKw + sList[Math.floor(Math.random() * sList.length)]);
        names.add(pList[Math.floor(Math.random() * pList.length)] + capKw);
    });

    // Random combos
    for (let i = 0; i < 10; i++) {
        const p = pList[Math.floor(Math.random() * pList.length)];
        const s = sList[Math.floor(Math.random() * sList.length)];
        names.add(p + ' ' + s);
        names.add(p + s.replace(/[^a-zA-Z]/g, ''));
    }

    const list = document.getElementById('bn-list');
    list.innerHTML = '';
    [...names].slice(0, 12).forEach(name => {
        const slug = name.toLowerCase().replace(/[^a-z0-9]/g, '');
        list.innerHTML += `
        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 flex flex-col justify-between gap-4 transition-all hover:border-primary hover:bg-white hover:shadow-lg hover:shadow-primary/5">
            <div>
                <div class="text-lg font-black text-gray-900 mb-1">${name}</div>
                <a href="https://www.namecheap.com/domains/registration/results/?domain=${slug}" target="_blank" class="text-[10px] font-black uppercase tracking-widest text-primary hover:underline">Check domain →</a>
            </div>
            <button type="button" onclick="copyName(this, '${name}')" class="w-full py-2.5 bg-white border border-gray-100 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl shadow-sm hover:border-primary transition-all">Copy</button>
        </div>`;
    });

    document.getElementById('bn-results').classList.remove('hidden');
    BizTools.toast('Names generated!');
}

function copyName(btn, name) {
    navigator.clipboard.writeText(name);
    const original = btn.innerText;
    btn.innerText = 'Copied!';
    setTimeout(() => btn.innerText = original, 2000);
}
</script>






