<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-list" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Enter items (one per line)..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <button data-type="numbered" class="type-btn p-4 bg-primary text-white rounded-2xl font-black text-xs shadow-lg shadow-primary/20 transition-all flex flex-col items-center gap-2 group">
                <i class="fa-solid fa-list-ol text-xl group-hover:scale-110 transition-transform"></i>
                Numbered
            </button>
            <button data-type="bullet" class="type-btn p-4 bg-white border border-gray-100 text-gray-600 rounded-2xl font-black text-xs hover:border-primary transition-all flex flex-col items-center gap-2 group">
                <i class="fa-solid fa-list-ul text-xl group-hover:scale-110 transition-transform"></i>
                Bullet
            </button>
            <button data-type="alpha" class="type-btn p-4 bg-white border border-gray-100 text-gray-600 rounded-2xl font-black text-xs hover:border-primary transition-all flex flex-col items-center gap-2 group">
                <span class="text-xl group-hover:scale-110 transition-transform font-black">A.</span>
                Alphabetical
            </button>
            <button data-type="roman" class="type-btn p-4 bg-white border border-gray-100 text-gray-600 rounded-2xl font-black text-xs hover:border-primary transition-all flex flex-col items-center gap-2 group">
                <span class="text-xl group-hover:scale-110 transition-transform font-serif font-black">IV.</span>
                Roman
            </button>
        </div>

        <div class="text-center">
            <button id="copy-btn" class="px-10 py-4 bg-indigo-600 text-white rounded-pill font-black uppercase tracking-widest shadow-xl shadow-indigo-200 hover:bg-indigo-700 transition-all flex items-center gap-2 mx-auto">
                <i class="fa-solid fa-copy"></i>
                Copy Formatted List
            </button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const typeBtns = document.querySelectorAll('.type-btn');
    const copyBtn = document.getElementById('copy-btn');
    let currentType = 'numbered';

    function romanize(num) {
        var lookup = {M:1000,CM:900,D:500,CD:400,C:100,XC:90,L:50,XL:40,X:10,IX:9,V:5,IV:4,I:1},roman = '',i;
        for ( i in lookup ) {
            while ( num >= lookup[i] ) {
                roman += i;
                num -= lookup[i];
            }
        }
        return roman;
    }

    function format() {
        let lines = input.value.split('\n').filter(l => l.trim().length > 0);
        if(lines.length === 0) return "";
        
        return lines.map((line, i) => {
            let prefix = "";
            switch(currentType) {
                case 'numbered': prefix = (i + 1) + ". "; break;
                case 'bullet': prefix = "• "; break;
                case 'alpha': prefix = String.fromCharCode(65 + i) + ". "; break;
                case 'roman': prefix = romanize(i + 1) + ". "; break;
            }
            return prefix + line;
        }).join('\n');
    }

    typeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            typeBtns.forEach(b => {
                b.className = "type-btn p-4 bg-white border border-gray-100 text-gray-600 rounded-2xl font-black text-xs hover:border-primary transition-all flex flex-col items-center gap-2 group";
            });
            btn.className = "type-btn p-4 bg-primary text-white rounded-2xl font-black text-xs shadow-lg shadow-primary/20 transition-all flex flex-col items-center gap-2 group";
            currentType = btn.dataset.type;
        });
    });

    copyBtn.addEventListener('click', () => {
        const formatted = format();
        if(!formatted) return;
        const el = document.createElement('textarea');
        el.value = formatted;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; input.focus(); });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
