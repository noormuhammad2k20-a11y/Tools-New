

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste your text here to add line numbers..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <!-- Controls -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Starting Number</label>
                <input type="number" id="start-num" value="1" class="p-3 bg-gray-50 border border-gray-100 rounded-xl font-bold text-gray-700">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Separator</label>
                <input type="text" id="sep-val" value=". " class="p-3 bg-gray-50 border border-gray-100 rounded-xl font-bold text-gray-700">
            </div>
        </div>

        <div class="text-center">
            <button id="exec-btn" class="px-10 py-4 bg-primary text-white rounded-pill font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all flex items-center gap-2 mx-auto">
                <i class="fa-solid fa-list-ol"></i>
                Number My List
            </button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const startNum = document.getElementById('start-num');
    const sepVal = document.getElementById('sep-val');
    const execBtn = document.getElementById('exec-btn');

    execBtn.addEventListener('click', () => {
        let lines = input.value.split('\n');
        let start = parseInt(startNum.value) || 1;
        let sep = sepVal.value || '. ';
        
        input.value = lines.map((line, i) => (start + i) + sep + line).join('\n');
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; input.focus(); });
});
</script>





