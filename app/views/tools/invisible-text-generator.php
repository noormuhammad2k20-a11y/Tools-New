<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-gray-900 rounded-[2.5rem] shadow-2xl border-4 border-indigo-500/10 p-6 sm:p-10 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-80 h-80 bg-indigo-500/5 rounded-full blur-[100px] -mr-40 -mt-40"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-900/10 rounded-full blur-[100px] -ml-40 -mb-40"></div>

        <div class="relative z-10 space-y-10">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.6em] mb-3 opacity-50">Zero Width Protocol</h3>
                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest italic">Digital Steganography Engine</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-indigo-500/20 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20 transition-colors group-hover/field:text-indigo-400">Surface Layer</div>
                    <textarea id="input-visible" class="w-full h-64 p-8 bg-black/40 border border-white/5 rounded-3xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500/30 outline-none transition-all text-white text-lg font-medium resize-none shadow-inner placeholder-gray-600" placeholder="Visible part of the message..."></textarea>
                </div>

                <div class="relative group/field">
                    <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-indigo-500/20 rounded-lg text-[10px] font-black text-indigo-500 uppercase tracking-widest z-20">Shadow Payload</div>
                    <textarea id="input-hidden" class="w-full h-64 p-8 bg-black/60 border border-indigo-500/20 rounded-3xl focus:ring-4 focus:ring-indigo-500/20 transition-all text-indigo-100 text-lg placeholder-indigo-900/50 resize-none outline-none font-medium shadow-2xl" placeholder="Hidden data to embed..."></textarea>
                </div>
            </div>

            <button id="gen-btn" class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black uppercase tracking-[0.4em] text-[10px] shadow-2xl shadow-indigo-600/20 hover:bg-indigo-500 hover:scale-[1.01] active:scale-95 transition-all flex items-center justify-center gap-4 group">
                <i class="fa-solid fa-user-secret text-lg transition-transform group-hover:rotate-12"></i>
                Initialize Hybridization
            </button>

            <!-- Result Area -->
            <div id="result-box" class="hidden mt-8 p-8 bg-black/40 border-2 border-emerald-500/20 rounded-3xl animate-fade-in relative backdrop-blur-sm">
                <div class="absolute -top-3 left-8 px-4 py-1 bg-gray-900 border border-emerald-500/30 rounded-lg text-[10px] font-black text-emerald-500 uppercase tracking-widest z-20">Hybridized Sequence</div>
                
                <div id="output-text" class="text-white text-xl break-all mb-8 font-mono bg-black/20 p-6 rounded-2xl border border-white/5"></div>
                
                <button id="copy-btn" class="w-full py-4 bg-emerald-600/10 border border-emerald-500/30 text-emerald-400 font-black uppercase tracking-[0.2em] text-[10px] rounded-xl hover:bg-emerald-600 hover:text-white transition-all">
                    Copy Stealth String
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const visibleIn = document.getElementById('input-visible');
    const hiddenIn = document.getElementById('input-hidden');
    const genBtn = document.getElementById('gen-btn');
    const resultBox = document.getElementById('result-box');
    const outputText = document.getElementById('output-text');
    const copyBtn = document.getElementById('copy-btn');

    // Binary to Zero-Width mapping
    const zeroWidthMap = {'0': '\u200B', '1': '\u200C'};

    function generate() {
        const visible = visibleIn.value;
        const hidden = hiddenIn.value;
        if(!visible) { 
            showToast("Please enter visible text first."); 
            return; 
        }
        
        // Convert hidden to binary
        let binaryHidden = Array.from(hidden).map(c => c.charCodeAt(0).toString(2).padStart(8, '0')).join('');
        let zwHidden = Array.from(binaryHidden).map(b => zeroWidthMap[b]).join('');
        
        const final = visible[0] + zwHidden + visible.slice(1);
        outputText.innerText = final;
        resultBox.classList.remove('hidden');
        resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    genBtn.addEventListener('click', generate);

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(outputText.innerText);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-circle-check"></i> COPID & CLOAKED!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
