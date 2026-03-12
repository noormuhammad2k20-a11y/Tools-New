<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your paragraphs here to join them into a single line..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="clean-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-text-slash transition-transform group-hover:scale-110"></i>
                    <span>Remove All Line Breaks</span>
                </button>
            </div>
        </div>

        <div class="bg-amber-50/50 p-6 rounded-2xl border border-amber-100/50 flex items-center gap-4">
            <div class="text-amber-500 text-2xl animate-pulse"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <p class="text-gray-500 text-sm italic">This action will convert your multi-line text into a single continuous block of text. This is useful for formatting code snippets or making text compact.</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const cleanBtn = document.getElementById('clean-btn');

    cleanBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;
        input.value = text.replace(/\r?\n/g, ' ').replace(/ +(?= )/g,'');
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
