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
                <textarea id="hash-input" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate RIPEMD-160 hash..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-fingerprint text-lg"></i>
                Generate Secure RIPEMD-160 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">RIPEMD-160 Digest</label>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">160-Bit Specialized Cryptography</span>
                    </div>
                    <div class="relative group">
                        <textarea id="hash-output" readonly class="w-full px-6 py-8 bg-slate-900 border-0 rounded-3xl text-indigo-400 font-mono text-xl md:text-2xl text-center break-all shadow-2xl shadow-indigo-900/20" style="letter-spacing: 1px;"></textarea>
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
                                <p class="text-xs font-black text-slate-900 font-mono">40 characters</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Use Case</span>
                                <p class="text-xs font-black text-slate-900 font-mono">Blockchain / PGP</p>
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
    'tool_name' => 'RIPEMD-160 Generator',
    'intro_title' => 'RIPEMD-160: The Cryptographic Engine of Modern Digital Wallets',
    'intro_content' => 'RIPEMD-160 (RACE Integrity Primitives Evaluation Message Digest) is a robust 160-bit cryptographic hash function developed by a leading European academic team. Known for its unique parallel structural architecture, it serves as the essential mathematical foundation for Bitcoin address generation and PGP key fingerprinting. Our Professional RIPEMD-160 Generator provides a secure, client-side environment for developers and security researchers to generate immutable digests instantly.',
    'detailed_title' => 'Structural Integrity & Blockchain Utility',
    'detailed_content' => '<p>In the world of professional cryptography, structural diversity is key to long-term security. RIPEMD-160 provides several distinct architectural advantages:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Optimized for Wallet Security:</strong> Used in the HASH160 transformation within Bitcoin, it condenses large public keys into short, verifiable addresses with high collision resistance.</li>
            <li><strong>European Academic Design:</strong> Unlike many US-centric NSA designs, RIPEMD-160 was engineered at KU Leuven, providing critical architectural diversity for global security systems.</li>
            <li><strong>Dual-Steam Processing:</strong> Utilizes two parallel streams of five rounds each, combined at the end to provide a high level of defense against modern cryptanalytic attacks.</li>
            <li><strong>100% Client-Side Privacy:</strong> All hashing operations occur within your browser\'s local memory. Your sensitive strings and keys never traverse our servers.</li>
        </ul>'
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('hash-input');
    const genBtn = document.getElementById('generate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const outputHash = document.getElementById('hash-output');
    const outputUpper = document.getElementById('output-upper');
    const copyBtn = document.getElementById('copy-btn');

    function generate() {
        const val = input.value.trim();
        if(!val) {
            showToast('Enter some text first', 'error');
            return;
        }

        try {
            const hash = CryptoJS.RIPEMD160(val).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('RIPEMD-160 Hash Generated');
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
            showToast('Signature Copied');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-indigo-400"></i>';
            setTimeout(() => copyBtn.innerHTML = original, 2000);
        });
    });

    window.copyElement = (id) => {
        const el = document.getElementById(id);
        navigator.clipboard.writeText(el.value).then(() => {
            showToast('Variant copied to clipboard');
        });
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>