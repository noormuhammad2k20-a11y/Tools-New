<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block lowercase italic">Normal Text</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Type text here..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">NATO Phonetic Result</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none font-sans" readonly placeholder="ALFA BRAVO CHARLIE..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

        <!-- Alpha Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-2 p-4 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">A: Alfa</div>
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">B: Bravo</div>
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">C: Charlie</div>
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">D: Delta</div>
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">E: Echo</div>
            <div class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-center">F: Foxtrot</div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');

    const nato = {
        'A': 'Alfa', 'B': 'Bravo', 'C': 'Charlie', 'D': 'Delta', 'E': 'Echo', 'F': 'Foxtrot', 'G': 'Golf', 'H': 'Hotel', 'I': 'India', 'J': 'Juliett',
        'K': 'Kilo', 'L': 'Lima', 'M': 'Mike', 'N': 'November', 'O': 'Oscar', 'P': 'Papa', 'Q': 'Quebec', 'R': 'Romeo', 'S': 'Sierra', 'T': 'Tango',
        'U': 'Uniform', 'V': 'Victor', 'W': 'Whiskey', 'X': 'X-ray', 'Y': 'Yankee', 'Z': 'Zulu',
        '0': 'Zero', '1': 'One', '2': 'Two', '3': 'Three', '4': 'Four', '5': 'Five', '6': 'Six', '7': 'Seven', '8': 'Eight', '9': 'Nine'
    };

    function convert() {
        const text = input.value.toUpperCase();
        if(!text) { output.value = ''; return; }
        
        let res = [];
        for(let i=0; i<text.length; i++) {
            res.push(nato[text[i]] || text[i]);
        }
        output.value = res.join(' ');
    }

    input.addEventListener('input', convert);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
