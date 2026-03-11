<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block lowercase">Text Input</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-300 resize-none outline-none font-mono" placeholder="Type text here..."></textarea>
            </div>

            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Binary Output</label>
                <textarea id="output-binary" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm resize-none outline-none font-mono" readonly placeholder="010101..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:bg-primary-hover transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 text-primary">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <span class="text-sm font-bold text-gray-700">Real-time Encoding</span>
            </div>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-black italic">UTF-8 Standard</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-binary');

    input.addEventListener('input', () => {
        const text = input.value;
        if(!text) { output.value = ''; return; }
        output.value = text.split('').map(c => c.charCodeAt(0).toString(2).padStart(8, '0')).join(' ');
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerText;
        document.getElementById('copy-btn').innerText = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerText = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>