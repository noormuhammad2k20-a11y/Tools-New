<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-6 sm:p-12 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-64 h-64 bg-amber-50 rounded-full blur-3xl -mr-32 -mt-32 opacity-50 transition-all group-hover:bg-amber-100"></div>

        <div class="relative z-10 space-y-10">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-amber-600 uppercase tracking-[0.6em] mb-3">Medieval Scriptorium</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Authenticity in every stroke</p>
            </div>

            <div class="relative">
                <div class="absolute -top-3 left-8 px-4 py-1 bg-white border border-gray-200 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Modern Script</div>
                <textarea id="input-text" class="w-full h-48 p-10 bg-gray-50/50 border border-gray-200 rounded-[2.5rem] focus:ring-8 focus:ring-amber-500/5 focus:border-amber-500/20 outline-none transition-all text-gray-700 text-xl font-serif leading-relaxed resize-none shadow-inner placeholder-gray-300" placeholder="Type something majestic here..."></textarea>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-6 p-2 bg-gray-50 rounded-[2rem] border border-gray-100">
                <div class="flex-grow flex p-1 bg-white rounded-2xl shadow-sm border border-gray-100 w-full md:w-auto">
                    <button class="style-btn active-pill flex-1 py-4 text-[10px] font-black uppercase tracking-widest bg-amber-600 text-white rounded-xl shadow-lg transition-all" data-style="fraktur">𝔖𝔱𝔞𝔫𝔡𝔞𝔯𝔡 𝔉𝔯𝔞𝔨𝔱𝔲𝔯</button>
                    <button class="style-btn flex-1 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-amber-600 transition-all" data-style="bold-fraktur">𝕭𝖔𝖑𝖉 𝕲𝖔𝖙𝖍𝖎𝖈</button>
                </div>
                
                <div class="flex gap-3 w-full md:w-auto px-4">
                    <button id="convert-btn" class="flex-grow md:flex-none px-10 py-5 bg-gray-900 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] shadow-2xl shadow-gray-900/20 hover:bg-black transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-scroll text-amber-500"></i>
                        Enscribe
                    </button>
                    <button id="clear-btn" class="px-6 py-5 text-gray-400 hover:text-red-500 transition-all text-[10px] font-black uppercase tracking-widest">
                        Reset
                    </button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="hidden animate-fade-up">
                <div class="relative group/result">
                    <div class="absolute -top-3 left-8 px-4 py-1 bg-white border border-amber-200 rounded-lg text-[10px] font-black text-amber-600 uppercase tracking-widest z-20">𝔗𝔥𝔢 𝔐𝔞𝔧𝔢𝔰𝔱𝔦𝔠 ℜ𝔢𝔰𝔲𝔩𝔱</div>
                    <textarea id="text-output" class="w-full h-64 p-12 bg-amber-50/10 border-2 border-amber-100 rounded-[3rem] text-gray-900 text-4xl font-serif leading-relaxed resize-none transition-all hover:bg-amber-50/20 shadow-2xl shadow-amber-900/5 outline-none" readonly></textarea>
                    
                    <button onclick="copyResult()" class="absolute bottom-10 right-10 px-8 py-4 bg-amber-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-amber-600/30 hover:bg-amber-500 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                        <i class="fa-solid fa-feather-pointed"></i>
                        Cop<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>
riants for clarity.</div>
                        </div>
                    </div>
        </article>
    </div>
</section>

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
  "name": "Old English Text Generator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DesignApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Standard Fraktur Unicode conversion",
    "Bold Gothic style support",
    "Instant copy-paste compatibility",
    "Full A-Z character mapping",
    "Privacy-focused client-side logic"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; letter-spacing: 1px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('text-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    const MAPS = {
        'fraktur': {
            'A':'𝔄','B':'𝔅','C':'ℭ','D':'𝔇','E':'𝔈','F':'𝔉','G':'𝔊','H':'ℌ','I':'ℑ','J':'𝔍','K':'𝔎','L':'𝔏','M':'𝔐','N':'𝔑','O':'𝔒','P':'𝔓','Q':'𝔔','R':'ℜ','S':'𝔖','T':'𝔗','U':'𝔈','V':'𝔙','W':'𝔚','X':'𝔛','Y':'𝔜','Z':'ℨ',
            'a':'𝔞','b':'𝔟','c':'𝔠','d':'𝔡','e':'𝔢','f':'𝔣','g':'𝔤','h':'𝔥','i':'𝔦','j':'𝔧','k':'𝔨','l':'𝔩','m':'𝔪','n':'𝔫','o':'𝔬','p':'𝔭','q':'𝔮','r':'𝔯','s':'𝔰','t':'𝔱','u':'𝔲','v':'𝔳','w':'𝔴','x':'𝔵','y':'𝔶','z':'𝔷'
        },
        'bold-fraktur': {
            'A':'𝕬','B':'𝕭','C':'𝕮','D':'𝕯','E':'𝕰','F':'𝕱','G':'𝕲','H':'𝕳','I':'𝕴','J':'𝕵','K':'𝕶','L':'𝕷','M':'𝕸','N':'𝕹','O':'𝕺','P':'𝕻','Q':'𝕼','R':'𝕽','S':'𝕾','T':'𝕿','U':'𝕾','V':'𝕻','W':'𝖂','X':'𝖃','Y':'𝖄','Z':'𝕿',
            'a':'𝖆','b':'𝖇','c':'𝖈','d':'𝖉','e':'𝖊','f':'𝖋','g':'𝖌','h':'𝖍','i':'𝖎','j':'𝖏','k':'𝖐','l':'𝖑','m':'𝖒','n':'𝖓','o':'𝖔','p':'𝖕','q':'𝖖','r':'𝖗','s':'𝖘','t':'𝖙','u':'𝖚','v':'𝖛','w':'𝖜','x':'𝖝','y':'𝖞','z':'𝖟'
        }
    };

    const styleBtns = document.querySelectorAll('.style-btn');
    let selectedStyle = 'fraktur';

    styleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            styleBtns.forEach(b => {
                b.classList.remove('active-pill', 'bg-amber-600', 'text-white', 'shadow-lg');
                b.classList.add('text-gray-400');
            });
            btn.classList.add('active-pill', 'bg-amber-600', 'text-white', 'shadow-lg');
            btn.classList.remove('text-gray-400');
            selectedStyle = btn.dataset.style;
            if(input.value) convert();
        });
    });

    function convert() {
        const text = input.value;
        if(!text) {
            wrapper.classList.add('hidden');
            return;
        }

        const currentMap = MAPS[selectedStyle];
        let result = "";
        for (let char of text) {
            result += currentMap[char] || char;
        }

        output.value = result;
        wrapper.classList.remove('hidden');
        wrapper.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    convertBtn.addEventListener('click', convert);
    input.addEventListener('input', () => {
        if(!input.value) wrapper.classList.add('hidden');
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Majestic text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>