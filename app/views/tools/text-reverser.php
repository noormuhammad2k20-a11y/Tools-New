<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 transition-all group-hover:bg-indigo-100"></div>

        <div class="relative z-10 space-y-8">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.6em] mb-3">Reciprocal Engine</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Multi-Layer String Inversion</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-200 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Forward Sequence</div>
                    <textarea id="input-text" class="w-full h-80 p-8 bg-gray-50/50 border border-gray-200 rounded-3xl focus:ring-8 focus:ring-indigo-500/5 focus:border-indigo-500/20 outline-none transition-all text-gray-700 text-lg font-medium resize-none shadow-inner placeholder-gray-300" placeholder="Type or paste your text here..."></textarea>
                    <button id="clear-btn" class="absolute bottom-6 right-6 p-4 bg-white/90 border border-gray-200 text-gray-400 hover:text-red-500 rounded-2xl transition-all shadow-sm hover:shadow-md active:scale-90">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-indigo-200 rounded-lg text-[10px] font-black text-indigo-600 uppercase tracking-widest z-20">Inverted Result</div>
                    <div id="result-wrapper" class="hidden h-full">
                        <textarea id="text-output" class="w-full h-full p-8 bg-indigo-50/10 border border-indigo-100 rounded-3xl text-gray-900 text-lg font-medium resize-none outline-none shadow-sm transition-all hover:bg-indigo-50/20" readonly placeholder="Result will appear here..."></textarea>
                        <button onclick="copyResult()" class="absolute bottom-6 right-6 px-8 py-4 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-indigo-600/20 hover:bg-indigo-500 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                            <i class="fa-solid fa-repeat"></i>
                            Copy Inversion
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-6 p-2 bg-gray-50 rounded-[2rem] border border-gray-100">
                <div class="flex-grow flex p-1 bg-white rounded-2xl shadow-sm border border-gray-100 w-full md:w-auto overflow-x-auto no-scrollbar">
                    <button data-mode="char" class="mode-btn active-pill flex-1 px-6 py-4 text-[9px] font-black uppercase tracking-widest bg-indigo-600 text-white rounded-xl shadow-lg transition-all whitespace-nowrap">Universal Flip</button>
                    <button data-mode="word" class="mode-btn flex-1 px-6 py-4 text-[9px] font-black uppercase tracking-widest text-gray-400 hover:text-indigo-600 transition-all whitespace-nowrap">Word Order</button>
                    <button data-mode="line" class="mode-btn flex-1 px-6 py-4 text-[9px] font-black uppercase tracking-widest text-gray-400 hover:text-indigo-600 transition-all whitespace-nowrap">Line Order</button>
                    <button data-mode="mirror" class="mode-btn flex-1 px-6 py-4 text-[9px] font-black uppercase tracking-widest text-gray-400 hover:text-indigo-600 transition-all whitespace-nowrap">Mirror Lines</button>
                </div>
                
                <div class="w-full md:w-auto px-4 pb-2 md:pb-0">
                    <button id="reverse-btn" class="w-full md:w-auto px-12 py-5 bg-gray-900 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-2xl shadow-gray-900/10 hover:bg-black transition-all flex items-center justify-center gap-3 active:scale-95">
                        <i class="fa-solid fa-shuffle text-indigo-400 animate-spin-slow"></i>
                        Invert Signal
                    </button>
                </div>
            </div>
        </div>

    </div>
</main>

<<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Text Reverser Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DesignApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Full character reversal",
    "Word-order only flipping",
    "Line-order list reversal",
    "Unicode/Emoji safe algorithm",
    "Secure client-side processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('text-output');
    const reverseBtn = document.getElementById('reverse-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    const modeBtns = document.querySelectorAll('.mode-btn');
    let selectedMode = 'char';

    modeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modeBtns.forEach(b => {
                b.classList.remove('active-pill', 'bg-indigo-600', 'text-white', 'shadow-lg');
                b.classList.add('text-gray-400');
            });
            btn.classList.add('active-pill', 'bg-indigo-600', 'text-white', 'shadow-lg');
            btn.classList.remove('text-gray-400');
            selectedMode = btn.dataset.mode;
            if(input.value) reverse();
        });
    });

    function reverse() {
        const text = input.value;
        if(!text) {
            wrapper.classList.add('hidden');
            return;
        }

        let result = "";
        const charArray = Array.from(text);

        switch(selectedMode) {
            case 'char':
                result = charArray.reverse().join('');
                break;
            case 'word':
                result = text.split(/(\s+)/).reverse().join('');
                break;
            case 'line':
                result = text.split('\n').reverse().join('\n');
                break;
            case 'mirror':
                result = text.split('\n').map(line => Array.from(line).reverse().join('')).join('\n');
                break;
        }

        output.value = result;
        wrapper.classList.remove('hidden');
        wrapper.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    reverseBtn.addEventListener('click', reverse);
    input.addEventListener('input', () => {
        if(!input.value) wrapper.classList.add('hidden');
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.classList.add('hidden');
        input.focus();
    });

    window.copyResult = () => {
        navigator.clipboard.writeText(output.value);
        const originalBtn = document.querySelector('[onclick="copyResult()"]');
        const originalText = originalBtn.innerHTML;
        originalBtn.innerHTML = '<i class="fa-solid fa-circle-check"></i> Inversion Saved!';
        setTimeout(() => originalBtn.innerHTML = originalText, 2000);
    };

    reverse();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>