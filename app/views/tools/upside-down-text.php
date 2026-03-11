<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative">
        
        <div class="flex flex-col gap-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative group">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20 transition-colors group-focus-within:text-primary">Normal Text</div>
                    <textarea id="input-text" class="w-full h-80 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-lg font-medium resize-none shadow-inner" placeholder="Type normal text here..."></textarea>
                </div>

                <div class="relative group">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-primary uppercase tracking-widest z-20" id="output-label">Upside Down Result</div>
                    <textarea id="output-text" class="w-full h-80 p-8 bg-blue-50/20 border border-blue-100/50 rounded-3xl text-gray-900 text-lg font-medium resize-none outline-none shadow-sm" readonly placeholder="Result..."></textarea>
                    <button id="copy-btn" class="absolute bottom-6 right-6 px-6 py-3 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-clone"></i>
                        Copy
                    </button>
                </div>
            </div>

            <div class="p-2 bg-gray-50 rounded-3xl border border-gray-100">
                <div class="flex flex-wrap gap-2">
                    <button data-mode="upside" class="mode-pill flex-1 px-6 py-4 bg-white border border-gray-100/50 text-primary text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-sm transition-all active-pill">Upside Down</button>
                    <button data-mode="mirror" class="mode-pill flex-1 px-6 py-4 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:text-gray-600 transition-all">Mirror Effect</button>
                    <button data-mode="wide" class="mode-pill flex-1 px-6 py-4 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:text-gray-600 transition-all">Fullwidth</button>
                    <button data-mode="small" class="mode-pill flex-1 px-6 py-4 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:text-gray-600 transition-all">Small Caps</button>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const modeBtns = document.querySelectorAll('.mode-pill');
    let mode = 'upside';

    const maps = {
        upside: {
            'a': 'ɐ', 'b': 'q', 'c': 'ɔ', 'd': 'p', 'e': 'ǝ', 'f': 'ɟ', 'g': 'ƃ', 'h': 'ɥ', 'i': 'ᴉ', 'j': 'ɾ',
            'k': 'ʞ', 'l': 'l', 'm': 'ɯ', 'n': 'u', 'o': 'o', 'p': 'd', 'q': 'b', 'r': 'ɹ', 's': 's', 't': 'ʇ',
            'u': 'n', 'v': 'ʌ', 'w': 'ʍ', 'x': 'x', 'y': 'ʎ', 'z': 'z',
            'A': '∀', 'B': 'B', 'C': 'Ɔ', 'D': 'p', 'E': 'Ǝ', 'F': 'Ⅎ', 'G': 'פ', 'H': 'H', 'I': 'I', 'J': 'f',
            'K': 'ʞ', 'L': '˥', 'M': 'W', 'N': 'N', 'O': 'O', 'P': 'Ԁ', 'Q': 'Q', 'R': 'ɹ', 'S': 'S', 'T': '┴',
            'U': '∩', 'V': 'Λ', 'W': 'M', 'X': 'X', 'Y': '⅄', 'Z': 'Z',
            '1': 'Ɩ', '2': 'ᄅ', '3': 'Ɛ', '4': 'ㄣ', '5': 'ϛ', '6': '9', '7': 'ㄥ', '8': '8', '9': '6', '0': '0',
            '.': '˙', ',': "'", '(': ')', ')': '(', '[': ']', ']': '[', '{': '}', '}': '{', '?': '¿', '!': '¡'
        },
        mirror: {
            'a': 'ɒ', 'b': 'd', 'c': 'ɔ', 'd': 'b', 'e': 'ɘ', 'f': 'ʇ', 'g': 'ϱ', 'h': 'ʜ', 'i': 'i', 'j': 'Ᏽ',
            'k': 'ʞ', 'l': 'l', 'm': 'm', 'n': 'n', 'o': 'o', 'p': 'q', 'q': 'p', 'r': 'ɿ', 's': 'ꙅ', 't': 't',
            'u': 'u', 'v': 'v', 'w': 'w', 'x': 'x', 'y': 'y', 'z': 'ƹ'
        },
        wide: {
            'a': 'ａ', 'b': 'ｂ', 'c': 'ｃ', 'd': 'ｄ', 'e': 'ｅ', 'f': 'ｆ', 'g': 'ｇ', 'h': 'ｈ', 'i': 'ｉ', 'j': 'ｊ',
            'k': 'ｋ', 'l': 'ｌ', 'm': 'ｍ', 'n': 'ｎ', 'o': 'ｏ', 'p': 'ｐ', 'q': 'ｑ', 'r': 'ｒ', 's': 'ｓ', 't': 'ｔ',
            'u': 'ｕ', 'v': 'ｖ', 'w': 'ｗ', 'x': 'ｘ', 'y': 'ｙ', 'z': 'ｚ',
            'A': 'Ａ', 'B': 'Ｂ', 'C': 'Ｃ', 'D': 'Ｄ', 'E': 'Ｅ', 'F': 'Ｆ', 'G': 'Ｇ', 'H': 'Ｈ', 'I': 'Ｉ', 'J': 'Ｊ',
            'K': 'Ｋ', 'L': 'Ｌ', 'M': 'Ｍ', 'N': 'Ｎ', 'O': 'Ｏ', 'P': 'Ｐ', 'Q': 'Ｑ', 'R': 'Ｒ', 'S': 'Ｓ', 'T': 'Ｔ',
            'U': 'Ｕ', 'V': 'Ｖ', 'W': 'Ｗ', 'X': 'Ｘ', 'Y': 'Ｙ', 'Z': 'Ｚ'
        },
        small: {
            'a': 'ᴀ', 'b': 'ʙ', 'c': 'ᴄ', 'd': 'ᴅ', 'e': 'ᴇ', 'f': 'ꜰ', 'g': 'ɢ', 'h': 'ʜ', 'i': 'ɪ', 'j': 'ᴊ',
            'k': 'ᴋ', 'l': 'ʟ', 'm': 'ᴍ', 'n': 'ɴ', 'o': 'ᴏ', 'p': 'ᴘ', 'q': 'ǫ', 'r': 'ʀ', 's': 's', 't': 'ᴛ',
            'u': 'ᴜ', 'v': 'ᴠ', 'w': 'ᴡ', 'x': 'x', 'y': 'ʏ', 'z': 'ᴢ'
        }
    };

    function convert() {
        const text = input.value;
        if(!text) { output.value = ''; return; }
        
        let res = "";
        const map = maps[mode];
        
        if(mode === 'upside') {
            for(let i=text.length-1; i>=0; i--) res += map[text[i]] || text[i];
        } else {
            for(let i=0; i<text.length; i++) res += map[text[i]] || text[i];
        }
        output.value = res;
    }

    modeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modeBtns.forEach(b => {
                b.className = "mode-pill flex-1 px-6 py-4 text-gray-400 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:text-gray-600 transition-all";
            });
            btn.className = "mode-pill flex-1 px-6 py-4 bg-white border border-gray-100/50 text-primary text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-sm transition-all active-pill";
            mode = btn.dataset.mode;
            document.getElementById('output-label').innerText = btn.innerText + " Result";
            convert();
        });
    });

    input.addEventListener('input', convert);
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> COPIED!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>