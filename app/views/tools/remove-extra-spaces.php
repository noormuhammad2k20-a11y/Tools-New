<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your messy text here..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="clean-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-wand-magic-sparkles transition-transform group-hover:rotate-12"></i>
                    <span>Clean Spaces</span>
                </button>
            </div>
        </div>

        <!-- Options Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <label class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white hover:border-primary/20 transition-all group">
                <input type="checkbox" id="opt-tabs" checked class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary shadow-sm">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors">Replace Tabs</span>
                    <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Tabs to 1 Space</span>
                </div>
            </label>
            <label class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100 cursor-pointer hover:bg-white hover:border-primary/20 transition-all group">
                <input type="checkbox" id="opt-trim" checked class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary shadow-sm">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-primary transition-colors">Trim Edges</span>
                    <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Remove Start/End Space</span>
                </div>
            </label>
        </div>

        <div id="status-msg" class="hidden text-center p-4 bg-green-50 text-green-600 rounded-xl border border-green-100 font-bold mb-4 animate-fade-in">
            <i class="fa-solid fa-check-circle mr-2"></i> All extra spaces removed successfully!
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const cleanBtn = document.getElementById('clean-btn');
    const status = document.getElementById('status-msg');

    cleanBtn.addEventListener('click', () => {
        let text = input.value;
        if(!text) return;

        if(document.getElementById('opt-tabs').checked) {
            text = text.replace(/\t/g, ' ');
        }
        
        // Remove multi-spaces
        text = text.replace(/ +(?= )/g, '');

        if(document.getElementById('opt-trim').checked) {
            text = text.trim();
        }

        input.value = text;
        
        status.classList.remove('hidden');
        setTimeout(() => status.classList.add('hidden'), 3000);
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
