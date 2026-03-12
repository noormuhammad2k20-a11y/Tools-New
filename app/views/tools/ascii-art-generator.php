<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-32 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Type text here to see ASCII art..."></textarea>
        </div>

        <div class="mb-8">
            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Choose Font Style</label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                <button class="font-btn active p-3 bg-primary text-white text-[10px] font-bold rounded-xl shadow-lg" data-font="standard">Standard</button>
                <button class="font-btn p-3 bg-white border border-gray-100 text-gray-500 text-[10px] font-bold rounded-xl hover:border-primary transition-all" data-font="slant">Slant</button>
                <button class="font-btn p-3 bg-white border border-gray-100 text-gray-500 text-[10px] font-bold rounded-xl hover:border-primary transition-all" data-font="block">Block</button>
                <button class="font-btn p-3 bg-white border border-gray-100 text-gray-500 text-[10px] font-bold rounded-xl hover:border-primary transition-all" data-font="banner">Banner</button>
            </div>
        </div>

        <div class="relative group">
            <pre id="output-art" class="w-full min-h-[300px] p-8 bg-gray-900 border border-transparent rounded-2xl text-emerald-400 text-[10px] sm:text-xs overflow-x-auto shadow-inner leading-none uppercase font-mono">
   _   ___  ___ ___ ___ 
  /_\ / __|/ __|_ _|_ _|
 / _ \\__ \ (__ | | | | 
/_/ \_\___/\___|___|___|
            </pre>
            <button id="copy-btn" class="absolute top-4 right-4 px-4 py-2 bg-white/10 text-white hover:bg-white/20 text-[10px] font-black uppercase rounded-lg transition-all">Copy Art</button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/figlet.js/1.5.0/figlet.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-art');
    const fontBtns = document.querySelectorAll('.font-btn');
    let currentFont = 'Standard';

    function generate() {
        const text = input.value || "ASCII";
        figlet.text(text, { font: currentFont }, (err, data) => {
            if (err) return;
            output.innerText = data;
        });
    }

    fontBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            fontBtns.forEach(b => {
                b.className = "font-btn p-3 bg-white border border-gray-100 text-gray-500 text-[10px] font-bold rounded-xl hover:border-primary transition-all";
            });
            btn.className = "font-btn active p-3 bg-primary text-white text-[10px] font-bold rounded-xl shadow-lg";
            currentFont = btn.dataset.font.charAt(0).toUpperCase() + btn.dataset.font.slice(1);
            generate();
        });
    });

    input.addEventListener('input', generate);
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
