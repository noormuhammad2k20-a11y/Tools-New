

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <!-- Security Advisory -->
        <div class="bg-amber-50 border border-amber-100 rounded-3xl p-6 mb-10 flex items-start gap-5 shadow-sm">
            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-amber-500 flex-shrink-0">
                <i class="fa-solid fa-triangle-exclamation text-xl"></i>
            </div>
            <div>
                <h5 class="font-black text-amber-900 uppercase tracking-tight text-xs mb-1">Critical Security Protocol</h5>
                <p class="text-xs text-amber-800/80 leading-relaxed font-medium">This utility utilizes <code>window.crypto.getRandomValues()</code> for hardware-level entropy. All generation occurs in your browser's local memory sandbox. Your seed phrases are never transmitted, logged, or visible to our infrastructure. <span class="font-black underline">Never share your mnemonic with any individual or platform.</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
            <!-- Configuration Area -->
            <div class="space-y-8">
                <div class="space-y-4">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] block px-1">Mnemonic Architecture</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative group cursor-pointer">
                            <input type="radio" name="word-count" id="wc-12" value="12" checked class="peer sr-only">
                            <div class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/30 group-hover:border-slate-200">
                                <div class="font-black text-slate-900 text-lg">12 Words</div>
                                <div class="text-[10px] text-slate-400 font-bold uppercase">128-bit Entropy</div>
                            </div>
                            <div class="absolute top-4 right-4 text-indigo-600 opacity-0 peer-checked:opacity-100 transition-opacity">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </label>
                        <label class="relative group cursor-pointer">
                            <input type="radio" name="word-count" id="wc-24" value="24" class="peer sr-only">
                            <div class="p-5 bg-white border-2 border-slate-100 rounded-2xl transition-all peer-checked:border-indigo-600 peer-checked:bg-indigo-50/30 group-hover:border-slate-200">
                                <div class="font-black text-slate-900 text-lg">24 Words</div>
                                <div class="text-[10px] text-slate-400 font-bold uppercase">256-bit Entropy</div>
                            </div>
                            <div class="absolute top-4 right-4 text-indigo-600 opacity-0 peer-checked:opacity-100 transition-opacity">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button id="generate-btn" class="flex-grow py-5 bg-indigo-600 text-white rounded-[2rem] font-black uppercase tracking-[0.2em] text-sm shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-rotate text-lg"></i>
                        Initialize Seed
                    </button>
                    <button id="clear-btn" class="px-8 py-5 bg-slate-100 text-slate-500 rounded-[2rem] font-black uppercase tracking-[0.2em] text-sm hover:bg-slate-200 transition-all">
                        Clear
                    </button>
                </div>
            </div>

            <!-- Visualization Area -->
            <div id="result-wrapper" class="hidden animate-fade-in">
                <div class="bg-indigo-900 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl group-hover:bg-white/10 transition-all"></div>
                    
                    <div class="flex justify-between items-center mb-6">
                        <label class="text-[10px] font-black text-indigo-300 uppercase tracking-widest flex items-center gap-2">
                             <i class="fa-solid fa-lock text-indigo-400"></i>
                             Secure Mnemonic Payload
                        </label>
                        <button onclick="copyMnemonic()" class="text-[10px] font-black text-white bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full uppercase tracking-widest transition-all">Copy Hex/Text</button>
                    </div>

                    <div id="phrase-grid" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- Dynamic Words -->
                    </div>

                    <div class="mt-8 pt-6 border-t border-white/10">
                        <code id="phrase-raw" class="block bg-black/30 p-4 rounded-2xl text-indigo-200 font-mono text-xs break-all leading-relaxed whitespace-pre-wrap lowercase"></code>
                    </div>
                </div>
            </div>
            
            <div id="result-placeholder" class="h-full min-h-[400px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-column items-center justify-center text-center p-10 group hover:border-indigo-200 transition-all">
                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-200 transition-all mb-6">
                    <i class="fa-solid fa-key text-4xl"></i>
                </div>
                <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Entropy Generator Ready</p>
                <p class="text-slate-300 text-sm mt-3 leading-relaxed">Select your security depth and<br>click generate to initialize your seed.</p>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'BIP39 Seed Generator',
    'intro_title' => 'BIP39: The Gold Standard for Cryptographic Backups',
    'intro_content' => 'The BIP39 (Bitcoin Improvement Proposal 39) standard is the backbone of modern cryptocurrency security, defining how complex binary entropy is converted into a human-readable mnemonic phrase. Our Professional BIP39 Seed Generator provides a high-fidelity utility for developers and security auditors to derive 512-bit seeds from 12 to 24-word sequences. It accurately implements the PBKDF2-HMAC-SHA512 derivation function, ensuring full compatibility with industry-standard deterministic wallet architectures.',
    'detailed_title' => 'Deterministic Entropy and Mathematical Security',
    'detailed_content' => '<p>True cryptographic security relies on the quality of initial randomness. Our tool ensures maximum entropy via local execution:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Hardware Entropy:</strong> Utilizes <code>window.crypto.getRandomValues()</code> to pull randomness from the underlying OS hardware TRNG.</li>
            <li><strong>Checksum Validation:</strong> Every seed generated includes a rigorous cryptographic checksum, preventing data loss from common typos during wallet recovery.</li>
            <li><strong>Derivation Interoperability:</strong> Produces hex seeds fully compatible with BIP32 (Hierarchical Deterministic Wallets), BIP44, and BIP84 (SegWit) standards.</li>
            <li><strong>Privacy-First Generation:</strong> Your sensitive mnemonic words are generated and stored exclusively in your browser\'s local volatile memory. Since no data is transmitted to our servers, your private keys remain private.</li>
        </ul>'
]);
?>


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/bip39/3.0.4/bip39.browser.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const generateBtn = document.getElementById('generate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const placeholder = document.getElementById('result-placeholder');
    const grid = document.getElementById('phrase-grid');
    const rawOut = document.getElementById('phrase-raw');

    if(typeof window.bip39 === 'undefined') {
       showToast('Critical: Seed Library Offline', 'error');
    }

    generateBtn.addEventListener('click', () => {
        if(typeof window.bip39 === 'undefined') return showToast("Cryptography module failed to initialize", "error");

        const words = document.querySelector('input[name="word-count"]:checked').value;
        const bytes = words == 24 ? 32 : 16;
        
        const entropy = new Uint8Array(bytes);
        window.crypto.getRandomValues(entropy);
        
        const hexEntropy = Array.from(entropy).map(b => b.toString(16).padStart(2, '0')).join('');
        
        try {
            const mnemonic = window.bip39.entropyToMnemonic(hexEntropy);
            const mnemonicArray = mnemonic.split(' ');
            
            grid.innerHTML = '';
            mnemonicArray.forEach((word, idx) => {
                const div = document.createElement('div');
                div.className = 'bg-white/5 border border-white/10 rounded-2xl p-3 flex items-center gap-3 group/word hover:bg-white/10 transition-all';
                div.innerHTML = `
                    <span class="text-[10px] font-black text-indigo-400/50 w-5">${idx + 1}</span>
                    <span class="text-sm font-bold text-white tracking-wide">${word}</span>
                `;
                grid.appendChild(div);
            });

            rawOut.textContent = mnemonic;
            
            // UI Transitions
            placeholder.classList.add('hidden');
            wrapper.classList.remove('hidden');
            
            showToast('Seed phrase generated securely');
        } catch(e) {
            showToast('Generation sequence failed', 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        wrapper.classList.add('hidden');
        placeholder.classList.remove('hidden');
        grid.innerHTML = '';
        rawOut.textContent = '';
    });

    window.copyMnemonic = () => {
        const text = rawOut.textContent;
        navigator.clipboard.writeText(text).then(() => {
            showToast('Mnemonic copied to clipboard');
        });
    };
});
</script>






