<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 font-mono resize-none outline-none" placeholder="Paste your lists or logs here to remove duplicates..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="clean-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-clone transition-transform group-hover:scale-110"></i>
                    <span>Remove Duplicates</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Duplicates Found</span>
                <span id="dup-count" class="font-black text-primary text-xl">0</span>
            </div>
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Lines Remaining</span>
                <span id="rem-count" class="font-black text-gray-900 text-xl">0</span>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const cleanBtn = document.getElementById('clean-btn');
    const dupCount = document.getElementById('dup-count');
    const remCount = document.getElementById('rem-count');

    cleanBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;

        const lines = text.split(/\n/);
        const originalCount = lines.length;
        const unique = [...new Set(lines)];
        
        input.value = unique.join('\n');
        
        dupCount.innerText = (originalCount - unique.length).toLocaleString();
        remCount.innerText = unique.length.toLocaleString();
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
        dupCount.innerText = '0';
        remCount.innerText = '0';
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>