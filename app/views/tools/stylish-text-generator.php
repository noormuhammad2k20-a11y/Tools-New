<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative">
        
        <div class="space-y-8">
            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Your Text</div>
                <textarea id="input-text" class="w-full h-32 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-2xl font-medium resize-none shadow-inner" placeholder="Type your text here..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-3 bg-white border border-gray-100 text-gray-300 rounded-xl hover:text-rose-500 hover:border-rose-100 transition-all opacity-0 group-hover:opacity-100">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div id="results-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Styles will be injected here -->
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const grid = document.getElementById('results-grid');
    const clearBtn = document.getElementById('clear-btn');

    const styles = [
        { name: "Bold Script", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120211 : 120205))) },
        { name: "Double Struck", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120061 : 120055))) },
        { name: "Fraktur", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120009 : 119997))) },
        { name: "Monospace", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120367 : 120361))) },
        { name: "Bubbles", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 9345 : 9339))) },
        { name: "Squares", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 127211 : 127205))) },
        { name: "Cursive", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 119939 : 119933))) },
        { name: "Old English", fn: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120061 : 120055))) }
    ];

    function update() {
        const text = input.value || "Stylish Text";
        grid.innerHTML = styles.map(s => `
            <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary/30 hover:bg-white transition-all cursor-pointer relative overflow-hidden" onclick="copyText(this)">
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">${s.name}</span>
                <div class="text-gray-900 text-xl break-all font-serif">${s.fn(text)}</div>
                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-clone text-primary/30"></i>
                </div>
                <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
            </div>
        `).join('');
    }

    input.addEventListener('input', update);
    clearBtn.addEventListener('click', () => {
        input.value = '';
        update();
        input.focus();
    });

    window.copyText = (el) => {
        const txt = el.querySelector('div').innerText;
        navigator.clipboard.writeText(txt);
        const originalBadge = el.querySelector('span').innerText;
        el.querySelector('span').innerText = 'Copied!';
        el.querySelector('span').classList.add('text-emerald-500');
        setTimeout(() => {
            el.querySelector('span').innerText = originalBadge;
            el.querySelector('span').classList.remove('text-emerald-500');
        }, 2000);
    };

    update();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
