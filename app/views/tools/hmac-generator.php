<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8 animate-fade-in">
            <!-- Data Input Area -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-1">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Message Payload</label>
                    <button id="clear-btn" class="text-xs font-bold text-slate-400 hover:text-rose-500 uppercase tracking-widest transition-colors flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Clear
                    </button>
                </div>
                <textarea id="hmac-input" class="w-full px-8 py-6 bg-gray-50 border border-gray-200 rounded-[2rem] focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[140px] shadow-inner font-medium text-slate-700" placeholder="Enter message or data string to authenticate..."></textarea>
            </div>

            <!-- Key & Algo Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4 group">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Secret Key (Pre-Shared)</label>
                        <i class="fa-solid fa-key text-[10px] text-primary/30 group-focus-within:text-primary transition-colors"></i>
                    </div>
                    <input type="text" id="hmac-key" class="w-full px-6 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all font-mono font-bold text-slate-600 outline-none" placeholder="e.g. 7f9g3h2k5l9m...">
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Hashing Algorithm</label>
                    </div>
                    <div class="relative">
                        <select id="hmac-algo" class="w-full px-6 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-xs font-black text-slate-600 appearance-none cursor-pointer uppercase tracking-widest">
                            <option value="MD5">HMAC-MD5</option>
                            <option value="SHA1">HMAC-SHA1</option>
                            <option value="SHA256" selected>HMAC-SHA256 (Modern)</option>
                            <option value="SHA512">HMAC-SHA512 (Ultra)</option>
                            <option value="RIPEMD160">HMAC-RIPEMD160</option>
                        </select>
                        <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">HMAC Signature (MAC Address)</label>
                        <div class="flex items-center gap-2">
                             <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 text-[8px] font-black rounded-full uppercase tracking-tighter">Verified Integrity</span>
                        </div>
                    </div>
                    <div class="relative group">
                        <div id="hmac-output" class="w-full px-8 py-10 bg-slate-900 border-0 rounded-[2.5rem] text-emerald-400 font-mono text-sm sm:text-lg break-all shadow-2xl shadow-emerald-900/10 leading-relaxed text-center min-h-[100px] flex items-center justify-center"></div>
                        <button id="copy-btn" class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-xl flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm shadow-xl">
                            <i class="fa-solid fa-copy text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="bg-blue-50/50 rounded-3xl p-6 border border-blue-100 flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm border border-blue-200/50">
                        <i class="fa-solid fa-circle-nodes"></i>
                    </div>
                    <div class="text-[11px] font-bold text-blue-800 leading-relaxed uppercase tracking-tight">
                        HMAC (Hash-based Message Authentication Code) provides both data integrity and authenticity. Use it to verify that information has not been tampered with during transit by a third party.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'HMAC Generator',
    'intro_title' => 'HMAC: Authenticated Integrity for Critical Data Streams',
    'intro_content' => 'HMAC (Hash-based Message Authentication Code) is a specialized type of message authentication code (MAC) involving a cryptographic hash function and a secret cryptographic key. Our Professional HMAC Workbench enables security architects to generate high-integrity signatures that prove both the authenticity and the original state of a message. By binding a secret key to the hashing process, HMAC prevents unauthorized data modification and ensures secure communication across disparate network infrastructures.',
    'detailed_title' => 'The Keyed Hashing Advantage and Protocol Security',
    'detailed_content' => '<p>Unlike standard hashing (MD5/SHA256) which only verifies integrity, HMAC introduces identity-based verification through pre-shared secrets:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Authenticated Message Streams:</strong> Ensure that the sender of the data is who they claim to be by requiring a secret key to produce the matching digest.</li>
            <li><strong>Tamper-Proof Data Payloads:</strong> Protect against "Man-in-the-Middle" attacks where standard checksums could be recalculated by an attacker; HMAC requires the secret to generate a valid MAC.</li>
            <li><strong>Multi-Algorithm Performance:</strong> Toggle between performance-optimized HMAC-SHA256 and high-security HMAC-SHA512 based on your specific application latency requirements.</li>
            <li><strong>Privacy-First Local Processing:</strong> Following our core security philosophy, all keyed hashing is handled entirely within your browser memory. Your secrets and messages are never transmitted to our servers.',
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputMsg = document.getElementById('hmac-input');
    const inputKey = document.getElementById('hmac-key');
    const algoSel = document.getElementById('hmac-algo');
    const outputBox = document.getElementById('hmac-output');
    const wrapper = document.getElementById('result-wrapper');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    function compute() {
        const msg = inputMsg.value.trim();
        const key = inputKey.value.trim();
        
        if(!msg || !key) {
            wrapper.classList.add('hidden');
            return;
        }

        const algo = algoSel.value;
        let hmac;

        try {
            if(algo === 'MD5') hmac = CryptoJS.HmacMD5(msg, key);
            else if(algo === 'SHA1') hmac = CryptoJS.HmacSHA1(msg, key);
            else if(algo === 'SHA256') hmac = CryptoJS.HmacSHA256(msg, key);
            else if(algo === 'SHA512') hmac = CryptoJS.HmacSHA512(msg, key);
            else if(algo === 'RIPEMD160') hmac = CryptoJS.HmacRIPEMD160(msg, key);

            outputBox.textContent = hmac.toString();
            wrapper.classList.remove('hidden');
        } catch(e) {
            console.error(e);
        }
    }

    [inputMsg, inputKey, algoSel].forEach(el => el.addEventListener('input', compute));

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(outputBox.textContent).then(() => {
            showToast('Signature Copied');
            const icon = copyBtn.querySelector('i');
            icon.className = 'fa-solid fa-check text-emerald-400';
            setTimeout(() => icon.className = 'fa-solid fa-copy text-lg', 2000);
        });
    });

    clearBtn.addEventListener('click', () => {
        inputMsg.value = '';
        inputKey.value = '';
        wrapper.classList.add('hidden');
        inputMsg.focus();
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
