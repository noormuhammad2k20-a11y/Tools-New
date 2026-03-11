<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="mb-10 text-center">
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.4em] mb-4">Japanese Text Emoticons</h3>
            <p class="text-xs text-gray-400 italic">Curated collection of aesthetic kaomojis and lenny faces for one-click copy.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Items will be injected here -->
            <div class="p-4 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary transition-all cursor-pointer text-center relative overflow-hidden" onclick="copyFace(this)">
                <div class="text-[10px] text-gray-400 uppercase font-black tracking-widest mb-1">Happy</div>
                <div class="text-xl text-gray-900 font-bold">( ͡° ͜ʖ ͡°)</div>
            </div>
        </div>

        <div id="faces-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 mt-8">
            <!-- Dynamic Injection -->
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('faces-grid');
    const faces = [
        { c: 'Happy', f: '(✿◡‿◡)' }, { c: 'Wink', f: '( ͡~ ͜ʖ ͡°)' }, { c: 'Shrug', f: '¯\\_(ツ)_/¯' },
        { c: 'Table Flip', f: '(╯°□°）╯︵ ┻━┻' }, { c: 'Hide', f: '|┬┴┬┴┤(･_├┬┴┬┴|' }, { c: 'Angry', f: 'ヽ(`Д´)ﾉ' },
        { c: 'Cool', f: '(⌐■_■)' }, { c: 'Love', f: '(づ￣ ³￣)づ' }, { c: 'Cry', f: '(ಥ﹏ಥ)' },
        { c: 'Wave', f: '(^O^)／' }, { c: 'Dance', f: '└[∵]┘' }, { c: 'Sleep', f: '(－_－) zzz' },
        { c: 'Gimme', f: '༼ つ ◕_◕ ༽つ' }, { c: 'Scared', f: '(꒪⌓꒪)' }, { c: 'Check', f: '√(•_•)√' }
    ];

    grid.innerHTML = faces.map(obj => `
        <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:bg-white hover:border-primary/20 hover:shadow-lg transition-all cursor-pointer text-center relative overflow-hidden" onclick="copyFace(this)">
            <div class="text-[8px] text-gray-400 uppercase font-black tracking-widest mb-2 group-hover:text-primary transition-colors">${obj.c}</div>
            <div class="text-lg text-gray-900 font-bold break-all">${obj.f}</div>
            <div class="absolute top-1 right-1 opacity-0 group-hover:opacity-20 transition-opacity">
                <i class="fa-solid fa-clone text-[8px]"></i>
            </div>
        </div>
    `).join('');

    window.copyFace = (el) => {
        const txt = el.querySelector('div:nth-child(2)').innerText;
        navigator.clipboard.writeText(txt);
        const badge = el.querySelector('div:nth-child(1)');
        const old = badge.innerText;
        badge.innerText = 'Copied!';
        badge.classList.add('text-emerald-500');
        setTimeout(() => { badge.innerText = old; badge.classList.remove('text-emerald-500'); }, 1500);
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
