<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="text-center mb-8">
            <h2 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Universally Unique Identifier</h2>
            <div id="uuid-display" class="py-6 bg-gray-50 border border-gray-100 rounded-2xl text-2xl sm:text-4xl font-mono font-black text-primary tracking-tight px-4 break-all">
                00000000-0000-0000-0000-000000000000
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <button id="gen-btn" class="py-4 bg-primary text-white rounded-xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 group">
                <i class="fa-solid fa-bolt group-hover:animate-pulse"></i>
                Generate New UUID
            </button>
            <button id="copy-btn" class="py-4 bg-white border border-gray-200 text-gray-700 rounded-xl font-black uppercase tracking-widest shadow-sm hover:border-primary transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-copy"></i>
                Copy to Clipboard
            </button>
        </div>

        <div class="flex items-center gap-4 p-6 bg-emerald-50/50 rounded-2xl border border-emerald-100/50">
            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-100">
                <i class="fa-solid fa-check-double"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-gray-900">RFC 4122 Compliant</h4>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest leading-relaxed">Generated using cryptographically secure random numbers</p>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('uuid-display');
    const genBtn = document.getElementById('gen-btn');
    const copyBtn = document.getElementById('copy-btn');

    function uuidv4() {
        return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }

    function generate() {
        display.innerText = uuidv4();
    }

    genBtn.addEventListener('click', generate);
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(display.innerText);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
