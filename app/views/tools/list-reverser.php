

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-list" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste your list to reverse the order..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="reverse-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-rotate transition-transform group-hover:rotate-180"></i>
                    <span>Reverse List</span>
                </button>
            </div>
        </div>

        <div class="flex items-center gap-4 p-6 bg-gray-50 rounded-2xl border border-gray-100 italic text-gray-400 text-sm">
            <i class="fa-solid fa-circle-info text-primary"></i>
            This tool reverses the vertical order of your lines. If you need to reverse characters within a line, use the Text Reverser tool instead.
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const reverseBtn = document.getElementById('reverse-btn');

    reverseBtn.addEventListener('click', () => {
        let lines = input.value.split('\n');
        input.value = lines.reverse().join('\n');
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; input.focus(); });
});
</script>





