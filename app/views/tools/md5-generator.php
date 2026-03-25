

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
                <textarea id="input-text" class="w-full px-5 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[120px] shadow-inner" placeholder="Enter text or string to generate MD5 fingerprint..."></textarea>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-hashtag text-lg"></i>
                Generate Secure MD5 Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">MD5 Digest</label>
                        <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm">128-Bit Signature</span>
                    </div>
                    <div class="relative group">
                        <textarea id="output-hash" readonly class="w-full px-6 py-8 bg-slate-900 border-0 rounded-3xl text-amber-400 font-mono text-2xl md:text-3xl text-center break-all shadow-2xl shadow-amber-900/20" style="letter-spacing: 2px;"></textarea>
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
                                <p class="text-sm font-black text-slate-900 font-mono">32 chars</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Encoding</span>
                                <p class="text-sm font-black text-slate-900 font-mono">HEX (Hexa)</p>
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
    'tool_name' => 'MD5 Generator',
    'intro_title' => 'MD5 Generator: Professional Data Fingerprinting & Integrity',
    'intro_content' => 'The Message Digest Algorithm 5 (MD5) is a standard cryptographic hash function that produces a 128-bit hash value. While modern security has shifted toward SHA-256 for secure password storage, MD5 remains the industry favorite for rapid data integrity verification, checksum tracking, and creating unique identifiers for files and long strings. Our Professional MD5 Generator ensures millisecond processing speed with 100% client-side security.',
    'detailed_title' => 'Operational Security & High-Performance Hashing',
    'detailed_content' => '<p>In professional environments, the speed and reliability of a hash function determine its utility. Our MD5 implementation offers several localized advantages:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Zero-Server Latency:</strong> All calculations happen inside your browser using CryptoJS. Your source data never traverses the internet, protecting sensitive configuration details.</li>
            <li><strong>Atomic Integrity:</strong> Even a single-bit change in your source text results in a radically different MD5 digest, making it perfect for version control checks.</li>
            <li><strong>Multi-Format Output:</strong> Provides both standard lowercase and professional uppercase variants to meet enterprise documentation requirements.</li>
            <li><strong>Checksum Compliance:</strong> Fully compliant with RFC 1321, ensuring compatibility with all major operating systems and database engines.</li>
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
            const hash = CryptoJS.MD5(val).toString();
            outputHash.value = hash;
            outputUpper.value = hash.toUpperCase();
            
            wrapper.classList.remove('hidden');
            showToast('MD5 Hash Generated');
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
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i>';
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





