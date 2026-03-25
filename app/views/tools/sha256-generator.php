

<!-- Slim Hero -->


<!-- Tool Interface -->

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
                <textarea id="input-text" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate cryptographically secure SHA-256 hash..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-lock text-lg"></i>
                Generate Secure SHA-256 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">SHA-256 Digest</label>
                        <span class="px-3 py-1 bg-cyan-50 text-cyan-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">256-Bit Signature</span>
                    </div>
                    <div class="relative group">
                        <textarea id="output-hash" readonly class="w-full px-6 py-8 bg-slate-900 border-0 rounded-3xl text-cyan-400 font-mono text-xl md:text-2xl text-center break-all shadow-2xl shadow-cyan-900/20" style="letter-spacing: 1px;"></textarea>
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
                                <p class="text-sm font-black text-slate-900 font-mono">64 chars</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Security</span>
                                <p class="text-sm font-black text-slate-900 font-mono">Industry Std.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Uppercase Variant</h4>
                        <div class="flex gap-2">
                            <input type="text" id="output-upper" readonly class="flex-grow bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-mono font-bold text-slate-500 shadow-sm focus:ring-0">
                            <button onclick="copyElement('output-upper')" class="w-12 h-12 bg-white border border-slate-200 text-slate-400 hover:text-primary hover:border-primary/20 rounded-xl flex items-center justify-center transition-all shadow-sm">
                                <i class="fa-solid fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'SHA-256 Generator',
    'intro_title' => 'SHA-256: The Global Gold Standard in Cryptographic Security',
    'intro_content' => 'Secure Hash Algorithm 256-bit (SHA-256) is a member of the SHA-2 family and is the industry gold standard for modern data protection. Used in everything from SSL certificates and cryptocurrency protocols like Bitcoin to military communications, SHA-256 creates a mathematically unique 64-character signature for any given input. Our Professional SHA-256 Generator provides instant, irreversible fingerprinting of your sensitive strings with elite client-side execution.',
    'detailed_title' => 'High-Entropy Security & Data Confidentiality',
    'detailed_content' => '<p>In the modern digital landscape, SHA-256 is the essential tool for ensuring authentic and secure data processing. Its primary high-end features include:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Collision Resistance:</strong> With 2<sup>256</sup> possible variations, the mathematical probability of two different inputs resulting in the same SHA-256 hash is virtually zero.</li>
            <li><strong>One-Way Data Transformation:</strong> Inherently irreversible. Once data is transformed into its SHA-256 digest, the original content can never be extracted from the signature alone.</li>
            <li><strong>Cryptocurrency & Web3 Foundation:</strong> SHA-256 is the core engine for block identification and transaction verification across decentralized networks.</li>
            <li><strong>Sensitive Data Hashing:</strong> Ideal for verifying sensitive system configuration changes, secure session identifiers, and user password verification pipelines.</li>
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
            const hash = CryptoJS.SHA256(val).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('SHA-256 Digest Generated');
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
            showToast('Hash copied!');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-cyan-400"></i>';
            setTimeout(() => copyBtn.innerHTML = original, 2000);
        });
    });

    window.copyElement = (id) => {
        const el = document.getElementById(id);
        navigator.clipboard.writeText(el.value).then(() => {
            showToast('Copied to clipboard');
        });
    };
});
</script>





