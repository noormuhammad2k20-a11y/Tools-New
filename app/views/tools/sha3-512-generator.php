

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
                <textarea id="hash-input" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate next-generation SHA-3 (Keccak) digest..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-atom text-lg"></i>
                Generate Secure SHA3-512 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">SHA3-512 Digest</label>
                        <span class="px-3 py-1 bg-purple-50 text-purple-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">512-Bit Sponge Construction</span>
                    </div>
                    <div class="relative group">
                        <textarea id="hash-output" readonly class="w-full px-6 py-10 bg-slate-900 border-0 rounded-3xl text-purple-400 font-mono text-lg md:text-xl text-center break-all shadow-2xl shadow-purple-900/20" style="letter-spacing: 0.5px; line-height: 1.4;"></textarea>
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
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Architecture</span>
                                <p class="text-xs font-black text-slate-900 font-mono">Keccak-Based</p>
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


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'SHA3-512 Generator',
    'intro_title' => 'SHA3-512: The Future of Quantum-Resistant Cryptography',
    'intro_content' => 'Secure Hash Algorithm 3 (SHA-3) is the latest member of the Secure Hash Algorithm family of standards, released by NIST to ensure long-term cryptographic stability. Unlike its predecessors (SHA-1 and SHA-2), SHA-3 is built on a revolutionary "sponge construction" based on the Keccak algorithm. Our Professional SHA3-512 Generator delivers the maximum bit-strength available in this family, providing an ultra-secure 512-bit message digest that remains inherently immune to the length-extension vulnerabilities that affected older standards.',
    'detailed_title' => 'The Keccak Advantage: Beyond Traditional Hashing',
    'detailed_content' => '<p>By adopting SHA3-512, architects and developers can future-proof their data integrity layers with superior mathematical immunity:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Natural Resistance to Attacks:</strong> The sponge construction design eliminates the theoretical possibility of length-extension attacks, where an attacker could append data to a known hash to derive a new valid digest.</li>
            <li><strong>Web3 & Ethereum Foundation:</strong> SHA-3 (specifically Keccak-256 variants) is the fundamental engine for Ethereum address generation and smart contract state validation.</li>
            <li><strong>Structural Diversity:</strong> Using SHA-3 provides critical architectural diversity in security systems, ensuring that a discovery of a flaw in the Merkle-Damgård construction (SHA-2) doesn\'t compromise your entire infrastructure.</li>
            <li><strong>Maximized Bit-Width:</strong> With a 512-bit output and 1024-bit internal capacity, it provides an astronomical security margin suitable for top-secret data classification.</li>
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
            // CryptoJS SHA3 default is 512-bit if not specified otherwise
            const hash = CryptoJS.SHA3(val, { outputLength: 512 }).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('SHA3-512 Digest Generated');
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
            showToast('Keccak Hash Copied');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-purple-400"></i>';
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





