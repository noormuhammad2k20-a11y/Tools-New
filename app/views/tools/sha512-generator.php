<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8">
            <!-- Input Area -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-1">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Source Data</label>
                    <button id="clear-btn" class="text-xs font-bold text-slate-400 hover:text-rose-500 uppercase tracking-widest transition-colors flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Clear
                    </button>
                </div>
                <textarea id="input-text" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate ultra-secure 512-bit SHA digest..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-vault text-lg"></i>
                Generate Secure SHA-512 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">SHA-512 Digest</label>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">512-Bit Ultra-High Entropy</span>
                    </div>
                    <div class="relative group">
                        <textarea id="output-hash" readonly class="w-full px-6 py-10 bg-slate-900 border-0 rounded-3xl text-indigo-400 font-mono text-lg md:text-xl text-center break-all shadow-2xl shadow-indigo-900/20" style="letter-spacing: 0.5px; line-height: 1.4;"></textarea>
                        <button id="copy-btn" class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-xl flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm shadow-xl">
                            <i class="fa-solid fa-copy text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Metrics & Variants -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100 flex flex-col justify-center">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Metadata Analysis</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Length</span>
                                <p class="text-xs font-black text-slate-900 font-mono">128 characters</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Resistance</span>
                                <p class="text-xs font-black text-slate-900 font-mono">Ultra Maximum</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Uppercase Variant</h4>
                        <div class="flex gap-2">
                            <input type="text" id="output-upper" readonly class="flex-grow bg-white border border-slate-200 rounded-xl px-4 py-3 text-[10px] font-mono font-bold text-slate-500 shadow-sm focus:ring-0">
                            <button onclick="copyElement('output-upper')" class="w-12 h-12 bg-white border border-slate-200 text-slate-400 hover:text-primary hover:border-primary/20 rounded-xl flex items-center justify-center transition-all shadow-sm">
                                <i class="fa-solid fa-copy text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'SHA-512 Generator',
    'intro_title' => 'SHA-512: The Mathematical Apex of Data Encryption',
    'intro_content' => 'Secure Hash Algorithm 512-bit (SHA-512) represents the highest tier of the SHA-2 family, producing a 128-character message digest of unparalleled entropy. It is the core cryptographic pillar utilized by high-security governmental agencies and massive financial data pipelines. By utilizing 80 distinct logic rounds and 64-bit word architectures, it provides a level of collision resistance that is considered robust even against future computational breakthroughs.',
    'detailed_title' => 'The ultimate Threshold of Cryptographic Integrity',
    'detailed_content' => '<p>For environments where absolute data uniqueness is mandatory, SHA-512 is the primary choice. Its technical superiority is demonstrated through several core metrics:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Maximum entropy Density:</strong> With 512 bits of complexity, it offers 1.34 x 10<sup>154</sup> possible combinations, ensuring zero mathematical overlap for any practical dataset.</li>
            <li><strong>Optimized for 64-Bit CPUs:</strong> Designed to process data in 64-bit blocks, making it highly efficient on modern server architectures compared to older 32-bit algorithms.</li>
            <li><strong>Irreversibility:</strong> A non-invertible mathematical "one-way street" that ensures the source data remains private even if the hash is publicly exposed.</li>
            <li><strong>Enterprise Compliance:</strong> Fully compliant with FIPS PUB 180-4, making it suitable for federal-level security requirements and regulated industry standards.</li>
        </ul>'
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const genBtn = document.getElementById('generate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const outputHash = document.getElementById('output-hash');
    const outputUpper = document.getElementById('output-upper');
    const copyBtn = document.getElementById('copy-btn');

    function generate() {
        const val = input.value.trim();
        if(!val) {
            showToast('Enter some text first', 'error');
            return;
        }

        try {
            const hash = CryptoJS.SHA512(val).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('SHA-512 Generation Successful');
        } catch(e) {
            showToast('Generation failed', 'error');
        }
    }

    genBtn.addEventListener('click', generate);
    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.classList.add('hidden');
        input.focus();
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(outputHash.value).then(() => {
            showToast('Ultra-Secure Hash Copied');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-indigo-400"></i>';
            setTimeout(() => copyBtn.innerHTML = original, 2000);
        });
    });

    window.copyElement = (id) => {
        const el = document.getElementById(id);
        navigator.clipboard.writeText(el.value).then(() => {
            showToast('Hash variant copied');
        });
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>