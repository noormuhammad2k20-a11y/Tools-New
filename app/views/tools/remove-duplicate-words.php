

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste your text here to remove duplicate words..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="clean-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-filter-circle-xmark transition-transform group-hover:scale-110"></i>
                    <span>Deduplicate Words</span>
                </button>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 text-primary">
                    <i class="fa-solid fa-spell-check"></i>
                </div>
                <span class="text-sm font-bold text-gray-700">Case Sensitive</span>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" id="case-sensitive" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
            </label>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const cleanBtn = document.getElementById('clean-btn');

    cleanBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;

        const caseSens = document.getElementById('case-sensitive').checked;
        const words = text.split(/(\s+)/);
        const seen = new Set();
        
        const result = words.map(w => {
            if(!w.trim()) return w; // Keep whitespace as is
            const clean = caseSens ? w.trim() : w.trim().toLowerCase();
            if(seen.has(clean)) return '';
            seen.add(clean);
            return w;
        }).join('').replace(/\s+/g, ' ').trim();

        input.value = result;
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });
});
</script>





