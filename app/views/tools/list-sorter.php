

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

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
            <button data-sort="az" class="sort-btn p-3 bg-primary text-white rounded-xl font-bold text-xs shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all">A-Z</button>
            <button data-sort="za" class="sort-btn p-3 bg-white border border-gray-100 text-gray-600 rounded-xl font-bold text-xs hover:border-primary transition-all">Z-A</button>
            <button data-sort="len" class="sort-btn p-3 bg-white border border-gray-100 text-gray-600 rounded-xl font-bold text-xs hover:border-primary transition-all">Length</button>
            <button data-sort="rev" class="sort-btn p-3 bg-white border border-gray-100 text-gray-600 rounded-xl font-bold text-xs hover:border-primary transition-all">Reverse</button>
        </div>

        <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary text-xl">
                    <i class="fa-solid fa-arrow-down-a-z"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-1">List Sorter Pro</h4>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic leading-relaxed underline underline-offset-4 decoration-primary/20 decoration-2">Auto-shuffles detected duplicates</p>
                </div>
            </div>
            <button id="copy-btn" class="px-6 py-3 bg-primary text-white text-[10px] font-black uppercase rounded-xl shadow-xl shadow-primary/20 hover:scale-105 transition-all">Copy List</button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const sortBtns = document.querySelectorAll('.sort-btn');

    function sort(type) {
        let lines = input.value.split('\n').filter(l => l.trim().length > 0);
        if(lines.length < 2) return;

        switch(type) {
            case 'az': lines.sort((a,b) => a.localeCompare(b)); break;
            case 'za': lines.sort((a,b) => b.localeCompare(a)); break;
            case 'len': lines.sort((a,b) => a.length - b.length); break;
            case 'rev': lines.reverse(); break;
        }

        input.value = lines.join('\n');
    }

    sortBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            sortBtns.forEach(b => {
                b.className = "sort-btn p-3 bg-white border border-gray-100 text-gray-600 rounded-xl font-bold text-xs hover:border-primary transition-all";
            });
            btn.className = "sort-btn p-3 bg-primary text-white rounded-xl font-bold text-xs shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all";
            sort(btn.dataset.sort);
        });
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





