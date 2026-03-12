<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block lowercase italic">Normal Text or Morse</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-medium" placeholder="Type text or .... --- ..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Translation Output</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none font-mono" readonly placeholder="Result..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-4 items-center">
            <div class="flex-grow flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Translation Direction</label>
                <div class="flex gap-2">
                    <button data-mode="en" class="mode-btn px-6 py-3 bg-primary text-white text-xs font-black uppercase rounded-xl shadow-lg transition-all">Text to Morse</button>
                    <button data-mode="mo" class="mode-btn px-6 py-3 bg-white border border-gray-100 text-gray-500 text-xs font-bold rounded-xl hover:border-primary transition-all">Morse to Text</button>
                </div>
            </div>
            
            <div class="flex gap-2">
                <button id="play-btn" class="w-14 h-14 bg-gray-900 text-white rounded-2xl hover:bg-black transition-all flex items-center justify-center text-xl shadow-xl">
                    <i class="fa-solid fa-play"></i>
                </button>
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
    const modeBtns = document.querySelectorAll('.mode-btn');
    const playBtn = document.getElementById('play-btn');
    let mode = 'en';

    const MorseMap = {
        'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.', 'G': '--.', 'H': '....', 'I': '..', 'J': '.---', 'K': '-.-', 'L': '.-..', 'M': '--', 'N': '-.', 'O': '---', 'P': '.--.', 'Q': '--.-', 'R': '.-.', 'S': '...', 'T': '-', 'U': '..-', 'V': '...-', 'W': '.--', 'X': '-..-', 'Y': '-.--', 'Z': '--..',
        '1': '.----', '2': '..---', '3': '...--', '4': '....-', '5': '.....', '6': '-....', '7': '--...', '8': '---..', '9': '----.', '0': '-----',
        ' ': '/'
    };
    const ReverseMorse = Object.fromEntries(Object.entries(MorseMap).map(([k, v]) => [v, k]));

    function process() {
        const val = input.value.toUpperCase();
        if(!val) { output.value = ''; return; }
        
        if(mode === 'en') {
            output.value = val.split('').map(c => MorseMap[c] || c).join(' ');
        } else {
            output.value = val.split(' ').map(c => ReverseMorse[c] || c).join('');
        }
    }

    modeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modeBtns.forEach(b => b.className = "mode-btn px-6 py-3 bg-white border border-gray-100 text-gray-500 text-xs font-bold rounded-xl hover:border-primary transition-all");
            btn.className = "mode-btn px-6 py-3 bg-primary text-white text-xs font-black uppercase rounded-xl shadow-lg transition-all";
            mode = btn.dataset.mode;
            process();
        });
    });

    input.addEventListener('input', process);

    playBtn.addEventListener('click', () => {
        const morse = (mode === 'en' ? output.value : input.value);
        if(!morse) return;
        
        const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        let time = audioCtx.currentTime;

        morse.split('').forEach(char => {
            if(char === '.' || char === '-') {
                const osc = audioCtx.createOscillator();
                const gain = audioCtx.createGain();
                osc.connect(gain);
                gain.connect(audioCtx.destination);
                
                osc.type = 'sine';
                osc.frequency.value = 600;
                
                const duration = char === '.' ? 0.1 : 0.3;
                gain.gain.setValueAtTime(0.2, time);
                osc.start(time);
                gain.gain.exponentialRampToValueAtTime(0.00001, time + duration);
                osc.stop(time + duration);
                
                time += duration + 0.1;
            } else if(char === ' ') {
                time += 0.2;
            }
        });
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        copyBtn.innerText = 'Copied!';
        setTimeout(() => copyBtn.innerText = 'Copy', 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
