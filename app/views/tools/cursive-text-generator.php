<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative">
        
        <div class="space-y-6">
            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Your Message</div>
                <textarea id="input-text" class="w-full h-48 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-xl font-medium resize-none shadow-inner" placeholder="Type something elegant here..."></textarea>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="flex-grow w-full">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Script Style</label>
                    <div class="flex gap-2 p-1 bg-gray-50 rounded-2xl border border-gray-100">
                        <button data-value="script" class="style-pill flex-1 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all active-pill bg-white shadow-sm text-primary border border-gray-100/50">Elegant Script</button>
                        <button data-value="bold-script" class="style-pill flex-1 py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all text-gray-400 hover:text-gray-600">Bold Calligraphy</button>
                    </div>
                    <select id="style-select" class="hidden"><option value="script">script</option><option value="bold-script">bold-script</option></select>
                </div>
                <div class="flex gap-3 w-full sm:w-auto self-end">
                    <button id="convert-btn" class="flex-grow sm:flex-none px-10 py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-feather"></i>
                        Generate
                    </button>
                    <button id="clear-btn" class="p-4 bg-white border border-gray-100 text-gray-300 rounded-2xl hover:text-rose-500 hover:border-rose-100 hover:bg-rose-50/30 transition-all">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="hidden space-y-4 pt-8 border-t border-gray-50 animate-fade-in">
                <div class="flex justify-between items-center px-1">
                    <h5 class="text-[10px] font-black text-primary uppercase tracking-[0.2em]">The Elegant Result</h5>
                    <button onclick="copyResult(this)" class="px-5 py-2 bg-primary/5 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary hover:text-white transition-all">Copy Result</button>
                </div>
                <textarea id="text-output" class="w-full h-48 p-8 bg-gray-50 border border-gray-100 rounded-3xl text-gray-900 text-3xl font-serif resize-none outline-none shadow-inner" readonly></textarea>
            </div>
        </div>

    </div>
</main>

<<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>
on>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Cursive Text Generator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DesignApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Elegant script Unicode conversion",
    "Bold calligraphy style support",
    "Instant copy-paste compatibility",
    "Full Unicode Latin alphabet mapping",
    "Private client-side processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; font-family: 'serif'; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('text-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    const MAPS = {
        'script': {
            'A':'𝒜','B':'ℬ','C':'𝒞','D':'𝒟','E':'ℰ','F':'ℱ','G':'𝒢','H':'ℋ','I':'ℐ','J':'𝒥','K':'𝒦','L':'ℒ','M':'ℳ','N':'𝒩','O':'𝒪','P':'𝒫','Q':'𝒬','R':'ℛ','S':'𝒮','T':'𝒯','U':'𝒰','V':'𝒱','W':'𝒲','X':'𝒳','Y':'𝒴','Z':'𝒵',
            'a':'𝒶','b':'𝒷','c':'𝒸','d':'𝒹','e':'𝑒','f':'𝒻','g':'𝑔','h':'𝒽','i':'𝒾','j':'𝒿','k':'𝓀','l':'𝓁','m':'𝓂','n':'𝓃','o':'𝑜','p':'𝓅','q':'𝓆','r':'𝓇','s':'𝓈','t':'𝓉','u':'𝓊','v':'𝓋','w':'𝓌','x':'𝓍','y':'𝓎','z':'𝓏'
        },
        'bold-script': {
            'A':'𝓐','B':'𝓑','C':'𝓒','D':'𝓓','E':'𝓔','F':'𝓕','G':'𝓖','H':'𝓗','I':'𝓘','J':'𝓙','K':'𝓚','L':'𝓛','M':'𝓜','N':'𝓝','O':'𝓞','P':'𝓟','Q':'𝓠','R':'𝓡','S':'𝓢','T':'𝓣','U':'𝓤','V':'𝓥','W':'𝓦','X':'𝓧','Y':'𝓨','Z':'𝓩',
            'a':'𝓪','b':'𝓫','c':'𝓬','d':'𝓭','e':'𝓮','f':'𝓯','g':'𝓰','h':'𝓱','i':'𝓲','j':'𝓳','k':'𝓴','l':'𝓵','m':'𝓶','n':'𝓷','o':'𝓸','p':'𝓹','q':'𝓺','r':'𝓻','s':'𝓼','t':'𝓽','u':'𝓾','v':'𝓿','w':'𝔀','x':'𝔁','y':'𝔂','z':'𝔃'
        }
    };

    const pills = document.querySelectorAll('.style-pill');
    const styleSelect = document.getElementById('style-select');

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            pills.forEach(p => {
                p.classList.remove('active-pill', 'bg-white', 'shadow-sm', 'text-primary', 'border', 'border-gray-100/50');
                p.classList.add('text-gray-400');
            });
            pill.classList.add('active-pill', 'bg-white', 'shadow-sm', 'text-primary', 'border', 'border-gray-100/50');
            pill.classList.remove('text-gray-400');
            styleSelect.value = pill.dataset.value;
            if(input.value) convert();
        });
    });

    function convert() {
        const text = input.value;
        if(!text) return;

        const style = styleSelect.value;
        const currentMap = MAPS[style];

        let result = "";
        for (let char of text) {
            result += currentMap[char] || char;
        }

        output.value = result;
        wrapper.classList.remove('hidden');
    }

    convertBtn.addEventListener('click', convert);

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.classList.add('hidden');
        input.focus();
    });

    window.copyResult = (btn) => {
        navigator.clipboard.writeText(output.value);
        const original = btn.innerText;
        btn.innerText = 'Copied!';
        setTimeout(() => btn.innerText = original, 2000);
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>