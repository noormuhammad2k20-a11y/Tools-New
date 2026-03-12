<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative">
        
        <div class="space-y-8">
            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Type Your Text</div>
                <textarea id="input-text" class="w-full h-32 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-2xl font-medium resize-none shadow-inner text-center" placeholder="Fancy Fonts..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-3 bg-white border border-gray-100 text-gray-300 rounded-xl hover:text-rose-500 hover:border-rose-100 transition-all opacity-0 group-hover:opacity-100">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div id="fonts-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Items Injected -->
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const grid = document.getElementById('fonts-grid');
    const clearBtn = document.getElementById('clear-btn');

    const transforms = [
        { n: 'Italic Cursive', f: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 119939 : 119933))) },
        { n: 'Bold Fraktur', f: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120061 : 120055))) },
        { n: 'Small Caps', f: (t) => t.toLowerCase().replace(/./g, c => "ᴀʙᴄᴅᴇꜰɢʜɪᴊᴋʟᴍɴᴏᴘǫʀsᴛᴜᴠᴡxʏᴢ"["abcdefghijklmnopqrstuvwxyz".indexOf(c)] || c) },
        { n: 'Circle Outlined', f: (t) => t.replace(/[A-Za-z0-9]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 9345 : (c <= 'z' ? 9339 : 9263)))) },
        { n: 'Wide Spaced', f: (t) => t.split('').join(' ') },
        { n: 'Boxed', f: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 127211 : 127205))) },
        { n: 'Double Struck', f: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120061 : 120055))) },
        { n: 'Monospace', f: (t) => t.replace(/[A-Za-z]/g, c => String.fromCodePoint(c.charCodeAt(0) + (c <= 'Z' ? 120367 : 120361))) }
    ];

    function update() {
        const val = input.value || "Fancy Fonts";
        grid.innerHTML = transforms.map(tr => `
            <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary/30 hover:bg-white transition-all cursor-pointer relative overflow-hidden" onclick="copyFont(this)">
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">${tr.n}</span>
                <div class="text-xl text-gray-900 font-bold break-all font-serif">${tr.f(val)}</div>
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

    window.copyFont = (el) => {
        const txt = el.querySelector('div').innerText;
        navigator.clipboard.writeText(txt);
        const b = el.querySelector('span');
        const o = b.innerText;
        b.innerText = 'Copied!';
        b.classList.add('text-emerald-500');
        setTimeout(() => { b.innerText = o; b.classList.remove('text-emerald-500'); }, 1500);
    };

    update();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
