<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Two-Way Toggle -->
        <div class="flex justify-center mb-8">
            <div class="inline-flex p-1 bg-gray-100 rounded-2xl shadow-inner">
                <button id="mode-to-code" class="px-6 py-2 bg-white text-gray-900 font-bold rounded-xl shadow-sm transition-all duration-200">Text to Code</button>
                <button id="mode-to-text" class="px-6 py-2 text-gray-400 font-bold rounded-xl hover:text-gray-600 transition-all duration-200">Code to Text</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Left: Source -->
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">Source Text</label>
                <textarea id="input-data" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-300 resize-none outline-none font-mono" placeholder="Type or paste here..."></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <!-- Right: Encoded -->
            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Binary Representation</label>
                <textarea id="output-data" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm resize-none outline-none font-mono" readonly placeholder="Result will appear here..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    <i class="fa-solid fa-copy mr-1"></i> Copy
                </button>
            </div>
        </div>

        <!-- Format Selector -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <button data-format="binary" class="format-btn flex items-center justify-center gap-2 p-3 bg-white border-2 border-primary rounded-xl text-primary shadow-sm transition-all group active-format">
                <i class="fa-solid fa-barcode"></i>
                <span class="text-xs font-bold font-mono">0101</span>
            </button>
            <button data-format="hex" class="format-btn flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary transition-all group">
                <i class="fa-solid fa-hashtag text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold font-mono">0xAF</span>
            </button>
            <button data-format="octal" class="format-btn flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary transition-all group">
                <i class="fa-solid fa-8 text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold font-mono">777</span>
            </button>
            <button data-format="decimal" class="format-btn flex items-center justify-center gap-2 p-3 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary transition-all group">
                <i class="fa-solid fa-calculator text-gray-400 group-hover:text-primary"></i>
                <span class="text-xs font-bold font-mono">ASCII</span>
            </button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<style>
.active-format { border-color: #2563eb !important; background: #fff !important; color: #2563eb !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('output-data');
    const formatBtns = document.querySelectorAll('.format-btn');
    const modeToCode = document.getElementById('mode-to-code');
    const modeToText = document.getElementById('mode-to-text');
    
    let currentFormat = 'binary';
    let currentMode = 'toCode';

    const converters = {
        binary: {
            to: (t) => t.split('').map(c => c.charCodeAt(0).toString(2).padStart(8, '0')).join(' '),
            from: (t) => t.split(' ').map(b => String.fromCharCode(parseInt(b, 2))).join('')
        },
        hex: {
            to: (t) => t.split('').map(c => c.charCodeAt(0).toString(16).toUpperCase().padStart(2, '0')).join(' '),
            from: (t) => t.split(' ').map(h => String.fromCharCode(parseInt(h, 16))).join('')
        },
        octal: {
            to: (t) => t.split('').map(c => c.charCodeAt(0).toString(8).padStart(3, '0')).join(' '),
            from: (t) => t.split(' ').map(o => String.fromCharCode(parseInt(o, 8))).join('')
        },
        decimal: {
            to: (t) => t.split('').map(c => c.charCodeAt(0)).join(' '),
            from: (t) => t.split(' ').map(d => String.fromCharCode(d)).join('')
        }
    };

    function update() {
        const val = input.value;
        if(!val) { output.value = ''; return; }
        try {
            output.value = currentMode === 'toCode' ? converters[currentFormat].to(val) : converters[currentFormat].from(val);
        } catch(e) {
            output.value = "Error: Invalid input format for " + currentFormat;
        }
    }

    formatBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            formatBtns.forEach(b => b.classList.remove('active-format'));
            btn.classList.add('active-format');
            currentFormat = btn.dataset.format;
            document.getElementById('output-label').innerText = currentFormat.toUpperCase() + (currentMode === 'toCode' ? ' Representation' : ' To Text');
            update();
        });
    });

    modeToCode.addEventListener('click', () => {
        currentMode = 'toCode';
        modeToCode.className = "px-6 py-2 bg-white text-gray-900 font-bold rounded-xl shadow-sm transition-all";
        modeToText.className = "px-6 py-2 text-gray-400 font-bold rounded-xl transition-all";
        document.getElementById('input-label').innerText = "Source Text";
        update();
    });

    modeToText.addEventListener('click', () => {
        currentMode = 'toText';
        modeToText.className = "px-6 py-2 bg-white text-gray-900 font-bold rounded-xl shadow-sm transition-all";
        modeToCode.className = "px-6 py-2 text-gray-400 font-bold rounded-xl transition-all";
        document.getElementById('input-label').innerText = currentFormat.toUpperCase() + " Input";
        update();
    });

    input.addEventListener('input', update);
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