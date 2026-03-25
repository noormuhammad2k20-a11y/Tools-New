

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm font-mono placeholder-gray-400 resize-none outline-none" placeholder="Paste HTML code here to strip all tags..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="clean-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-code-slash transition-transform group-hover:scale-110"></i>
                    <span>Strip HTML Tags</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white hover:border-primary/20 transition-all group">
                <input type="checkbox" id="opt-lines" checked class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary shadow-sm">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors">Clean Line Breaks</span>
                    <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Remove excess empty lines</span>
                </div>
            </label>
            <label class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white hover:border-primary/20 transition-all group">
                <input type="checkbox" id="opt-entities" checked class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary shadow-sm">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors">Decode Entities</span>
                    <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Convert &amp; to &</span>
                </div>
            </label>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const cleanBtn = document.getElementById('clean-btn');

    function decodeEntities(text) {
        const textArea = document.createElement('textarea');
        textArea.innerHTML = text;
        return textArea.value;
    }

    cleanBtn.addEventListener('click', () => {
        let text = input.value;
        if(!text) return;

        // Remove tags
        text = text.replace(/<[^>]*>?/gm, '');

        if(document.getElementById('opt-entities').checked) {
            text = decodeEntities(text);
        }

        if(document.getElementById('opt-lines').checked) {
            text = text.replace(/\n\s*\n/g, '\n\n').trim();
        }

        input.value = text;
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });
});
</script>





