<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Card -->
        <div class="bg-gray-50 border border-secondary/10 rounded-3xl p-8 mb-8 text-center transition-all duration-300">
            <div id="big-result" class="text-7xl font-black text-primary mb-2">0</div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Total Lines</div>
        </div>

        <div class="relative mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Enter Your Text Below</label>
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste your code, list, or document here..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-100 rounded-xl shadow-sm transition-all duration-200 group" title="Clear All">
                    <i class="fa-solid fa-trash-can transition-transform group-hover:scale-110"></i>
                </button>
            </div>
        </div>

        <!-- Quick Stats Area -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="flex items-center justify-between p-4 bg-white border border-gray-100 rounded-xl shadow-sm">
                <span class="text-gray-500 font-medium">Empty Lines</span>
                <span id="stat-empty" class="font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">0</span>
            </div>
            <div class="flex items-center justify-between p-4 bg-white border border-gray-100 rounded-xl shadow-sm">
                <span class="text-gray-500 font-medium">Text Lines</span>
                <span id="stat-text" class="font-bold text-gray-900 bg-gray-50 px-3 py-1 rounded-lg">0</span>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const result = document.getElementById('big-result');
    const statEmpty = document.getElementById('stat-empty');
    const statText = document.getElementById('stat-text');

    function update() {
        const text = input.value;
        if (!text) {
            result.innerText = '0';
            statEmpty.innerText = '0';
            statText.innerText = '0';
            return;
        }

        const lines = text.split(/\r\n|\r|\n/);
        const totalLines = lines.length;
        const emptyLines = lines.filter(line => line.trim().length === 0).length;
        const textLines = totalLines - emptyLines;

        result.innerText = totalLines.toLocaleString();
        statEmpty.innerText = emptyLines.toLocaleString();
        statText.innerText = textLines.toLocaleString();
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = '';
        update();
        input.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
