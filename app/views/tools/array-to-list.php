<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-array" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder='["Item 1", "Item 2", "Item 3"] or ["Value 1", "Value 2"]'></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="text-center mb-8">
            <button id="exec-btn" class="px-10 py-4 bg-primary text-white rounded-pill font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all flex items-center gap-2 mx-auto">
                <i class="fa-solid fa-list-ul"></i>
                Convert to List
            </button>
        </div>

        <div class="relative group">
            <textarea id="output-list" class="w-full h-64 p-6 bg-indigo-50/10 border border-indigo-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none group-hover:border-primary/20 transition-all" readonly placeholder="Parsed list will appear here..."></textarea>
            <button id="copy-btn" class="absolute bottom-4 right-4 px-5 py-2.5 bg-primary text-white text-xs font-black uppercase rounded-xl shadow-lg hover:scale-105 transition-all">Copy List</button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-array');
    const output = document.getElementById('output-list');
    const execBtn = document.getElementById('exec-btn');

    execBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        try {
            let data = JSON.parse(val);
            if(Array.isArray(data)) {
                output.value = data.join('\n');
            } else if(typeof data === 'object') {
                output.value = Object.values(data).join('\n');
            } else {
                throw new Error("Input is not a valid JSON array or object.");
            }
        } catch(e) {
            // Try to extract items manually via regex for messy arrays
            const matches = val.match(/"([^"]+)"|'([^']+)'/g);
            if(matches) {
                output.value = matches.map(m => m.replace(/["']/g, '')).join('\n');
            } else {
                alert("Could not parse array. Ensure it is valid JSON format.");
            }
        }
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
