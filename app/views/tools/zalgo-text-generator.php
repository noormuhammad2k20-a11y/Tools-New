<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-gray-900 rounded-[2.5rem] shadow-2xl border-4 border-red-500/10 p-6 sm:p-10 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/5 rounded-full blur-[100px] -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-900/10 rounded-full blur-[100px] -ml-48 -mb-48"></div>

        <div class="relative z-10 space-y-8">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-red-500/50 uppercase tracking-[0.8em] mb-2 animate-pulse">System Corruption</h3>
                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Universal Zalgo Transformer</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-red-500/20 rounded-lg text-[10px] font-black text-gray-500 uppercase tracking-widest z-20">Input Signal</div>
                    <textarea id="input-text" class="w-full h-64 p-8 bg-black/40 border border-white/5 rounded-3xl focus:ring-4 focus:ring-red-500/10 focus:border-red-500/30 outline-none transition-all text-white text-lg font-medium resize-none shadow-inner" placeholder="Type normal text here..."></textarea>
                </div>

                <div class="relative">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-red-500/20 rounded-lg text-[10px] font-black text-red-500 uppercase tracking-widest z-20">Corrupted Output</div>
                    <div id="output-text" class="w-full h-64 p-8 bg-black/60 border border-red-500/20 rounded-3xl text-red-500 text-2xl overflow-y-auto break-all font-mono leading-relaxed transition-all scrollbar-thin scrollbar-thumb-red-500/20">
                    </div>
                    <button id="copy-btn" class="absolute bottom-6 right-6 px-6 py-3 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-red-600/20 hover:bg-red-500 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-skull"></i>
                        Copy
                    </button>
                </div>
            </div>

            <div class="p-4 bg-black/30 rounded-3xl border border-white/5 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex justify-between">
                        <span>Intensity</span>
                        <span id="level-val" class="text-red-500">50%</span>
                    </label>
                    <input type="range" id="zalgo-level" min="1" max="100" value="50" class="w-full h-2 bg-gray-800 rounded-lg appearance-none cursor-pointer accent-red-600">
                </div>
                
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Direction</label>
                    <div class="flex gap-2 p-1 bg-black/40 rounded-2xl border border-white/5">
                        <button class="dir-btn flex-1 py-3 text-[9px] font-black uppercase active-pill bg-red-600 text-white rounded-xl shadow-lg transition-all" data-dir="up">Up</button>
                        <button class="dir-btn flex-1 py-3 text-[9px] font-black uppercase active-pill bg-red-600 text-white rounded-xl shadow-lg transition-all" data-dir="mid">Mid</button>
                        <button class="dir-btn flex-1 py-3 text-[9px] font-black uppercase active-pill bg-red-600 text-white rounded-xl shadow-lg transition-all" data-dir="down">Down</button>
                    </div>
                </div>

                <div class="flex items-end">
                    <button id="gen-btn" class="w-full py-4 bg-white/5 hover:bg-white/10 text-white border border-white/10 rounded-2xl font-black uppercase tracking-widest text-[10px] transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-bolt-lightning text-red-500"></i>
                        Compute
                    </button>
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
    const level = document.getElementById('zalgo-level');
    const genBtn = document.getElementById('gen-btn');
    const dirBtns = document.querySelectorAll('.dir-btn');

    const zalgoUp = ['\u030d', '\u030e', '\u0304', '\u0305', '\u0306', '\u0307', '\u0308', '\u0309', '\u030a', '\u030b', '\u030c', '\u030d', '\u030e', '\u030f', '\u0310', '\u0311', '\u0312', '\u0313', '\u0314', '\u0315', '\u031a', '\u031b', '\u033d', '\u033e', '\u033f', '\u0340', '\u0341', '\u0342', '\u0343', '\u0344', '\u0346', '\u034a', '\u034b', '\u034c', '\u0350', '\u0351', '\u0352', '\u035b', '\u0363', '\u0364', '\u0365', '\u0366', '\u0367', '\u0368', '\u0369', '\u036a', '\u036b', '\u036c', '\u036d', '\u036e', '\u036f', '\u033d', '\u035d', '\u035e', '\u035f', '\u0360', '\u0361', '\u0362'];
    const zalgoMid = ['\u0315', '\u031b', '\u0320', '\u0322', '\u0326', '\u0327', '\u0328', '\u032d', '\u032e', '\u0332', '\u0333', '\u0339', '\u033a', '\u033c', '\u0345', '\u0347', '\u0348', '\u0349', '\u034d', '\u034e', '\u0353', '\u0354', '\u0355', '\u0356', '\u0359', '\u035a', '\u031f', '\u032a', '\u033b'];
    const zalgoDown = ['\u0316', '\u0317', '\u0318', '\u0319', '\u031c', '\u031d', '\u031e', '\u031f', '\u0320', '\u0321', '\u0322', '\u0323', '\u0324', '\u0325', '\u0326', '\u0327', '\u0328', '\u0329', '\u032a', '\u032b', '\u032c', '\u032d', '\u032e', '\u032f', '\u0330', '\u0331', '\u0332', '\u0333', '\u0334', '\u0335', '\u0336', '\u0337', '\u0338', '\u0339', '\u033a', '\u033b', '\u033c', '\u0345', '\u0347', '\u0348', '\u0349', '\u034d', '\u034e', '\u0353', '\u0354', '\u0355', '\u0356', '\u0359', '\u035a', '\u035c', '\u035d', '\u035e', '\u035f', '\u0360', '\u0361', '\u0362'];

    function generate() {
        const text = input.value;
        if(!text) { output.innerText = ''; return; }
        
        document.getElementById('level-val').innerText = level.value + '%';
        
        let result = "";
        const intensity = parseInt(level.value) / 10;
        const up = document.querySelector('[data-dir="up"]').classList.contains('active-pill');
        const mid = document.querySelector('[data-dir="mid"]').classList.contains('active-pill');
        const down = document.querySelector('[data-dir="down"]').classList.contains('active-pill');

        for(let i=0; i<text.length; i++) {
            result += text[i];
            
            if(up) for(let j=0; j<Math.floor(Math.random()*intensity); j++) result += zalgoUp[Math.floor(Math.random()*zalgoUp.length)];
            if(mid) for(let j=0; j<Math.floor(Math.random()*intensity/2); j++) result += zalgoMid[Math.floor(Math.random()*zalgoMid.length)];
            if(down) for(let j=0; j<Math.floor(Math.random()*intensity); j++) result += zalgoDown[Math.floor(Math.random()*zalgoDown.length)];
        }
        output.innerText = result;
    }

    dirBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.classList.toggle('active-pill');
            if(btn.classList.contains('active-pill')) {
                btn.classList.add('bg-red-600', 'text-white', 'shadow-lg');
                btn.classList.remove('text-gray-500');
            } else {
                btn.classList.remove('bg-red-600', 'text-white', 'shadow-lg');
                btn.classList.add('text-gray-500');
            }
            generate();
        });
    });

    genBtn.addEventListener('click', generate);
    input.addEventListener('input', generate);
    level.addEventListener('input', generate);

    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
