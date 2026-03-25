

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-list" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Enter your items here..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100">
                <input type="checkbox" id="opt-case" class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                <label for="opt-case" class="text-xs font-bold text-gray-600 uppercase tracking-widest cursor-pointer">Case Sensitive</label>
            </div>
            <button id="exec-btn" class="py-4 bg-primary text-white rounded-xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 group">
                <i class="fa-solid fa-broom group-hover:-translate-y-1 transition-transform"></i>
                Clean My List
            </button>
        </div>

        <div class="flex items-center justify-between p-6 bg-emerald-50/50 rounded-2xl border border-emerald-100/30 group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-emerald-500 text-xl group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-1 leading-relaxed underline decoration-emerald-200 decoration-2 underline-offset-4">Smart Cleaner</h4>
                    <p id="stats-badge" class="text-[10px] text-gray-400 font-bold uppercase tracking-widest group-hover:text-emerald-400 transition-colors">Wait Processing...</p>
                </div>
            </div>
            <button id="copy-btn" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 text-[10px] font-black uppercase rounded-xl hover:border-emerald-500 transition-all">Copy Cleaned</button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const execBtn = document.getElementById('exec-btn');
    const statsBadge = document.getElementById('stats-badge');
    const optCase = document.getElementById('opt-case');

    execBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        let lines = val.split('\n').map(l => l.trim()).filter(l => l.length > 0);
        const originalCount = lines.length;

        // Deduplicate
        if (optCase.checked) {
            lines = [...new Set(lines)];
        } else {
            const seen = new Set();
            lines = lines.filter(item => {
                const k = item.toLowerCase();
                return seen.has(k) ? false : seen.add(k);
            });
        }

        const removed = originalCount - lines.length;
        input.value = lines.join('\n');
        statsBadge.innerText = `${removed} Duplicates/Empty items removed`;
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; statsBadge.innerText = 'Wait Processing...'; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





