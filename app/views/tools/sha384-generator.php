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
                <textarea id="hash-input" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate high-integrity SHA-384 fingerprint..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-shield-halved text-lg"></i>
                Generate Secure SHA-384 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">SHA-384 Digest</label>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">384-Bit High Integrity</span>
                    </div>
                    <div class="relative group">
                        <textarea id="hash-output" readonly class="w-full px-6 py-8 bg-slate-900 border-0 rounded-3xl text-blue-400 font-mono text-xl md:text-2xl text-center break-all shadow-2xl shadow-blue-900/20" style="letter-spacing: 1px;"></textarea>
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
                                <p class="text-xs font-black text-slate-900 font-mono">96 characters</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Suite</span>
                                <p class="text-xs font-black text-slate-900 font-mono">NSA Suite B</p>
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
    'tool_name' => 'SHA-384 Generator',
    'intro_title' => 'SHA-384: The Suite B Cryptographic Standard',
    'intro_content' => 'Secure Hash Algorithm 384-bit (SHA-384) is a premium member of the SHA-2 family, intentionally designed to provide a security strength of 192 bits. As part of the NSA Suite B Cryptography specification, it serves as the sophisticated middle ground between SHA-256 and SHA-512. Derived by truncating the SHA-512 output with unique initialization constants, it inherited superior resistance against length-extension attacks while offering optimized performance on 64-bit architectures.',
    'detailed_title' => 'Why High-Security Infrastructures Mandate SHA-384',
    'detailed_content' => '<p>In governmental and top-tier enterprise sectors, SHA-384 is often the required standard for data integrity and identity verification. Key technical features include:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>TLS 1.3 Harmony:</strong> A primary cipher suite component in the most secure web handshakes, ensuring that session integrity remains uncompromised by modern cryptanalysis.</li>
            <li><strong>Optimized for 64-Bit CPUs:</strong> Engineered to process data in 64-bit blocks, making it significantly more efficient on high-end server processors than 32-bit algorithms like SHA-256.</li>
            <li><strong>Collision Resistance Apex:</strong> With 192 bits of security strength, it provides an astronomical safety margin that is effectively immune to brute-force or pattern-correlation attacks.</li>
            <li><strong>Immutable Code Signing:</strong> Trusted by global software architects to sign sensitive binaries and high-integrity archives, ensuring data remains pristine from point of origin.</li>
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

    async function generate() {
        const val = input.value.trim();
        if(!val) {
            showToast('Enter some text first', 'error');
            return;
        }

        try {
            // SHA-384 is part of Crypto-JS but can also use Web Crypto
            const hash = CryptoJS.SHA384(val).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('SHA-384 Hash Generated');
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
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-blue-400"></i>';
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

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>