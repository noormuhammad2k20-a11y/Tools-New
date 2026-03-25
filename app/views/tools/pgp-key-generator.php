

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Configuration Box -->
            <div class="bg-slate-50 border-2 border-slate-100 rounded-[3rem] p-8 sm:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-end">
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Identifier Name</label>
                        <input type="text" id="pgp-name" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 transition-all outline-none" placeholder="e.g. John Doe" value="Anonymous User">
                    </div>
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Email Context</label>
                        <input type="email" id="pgp-email" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 transition-all outline-none" placeholder="e.g. contact@example.com" value="security@internal.local">
                    </div>
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Entropy Depth</label>
                        <select id="pgp-rsa-bits" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 transition-all appearance-none cursor-pointer outline-none">
                            <option value="2048">2048-bit (Standard)</option>
                            <option value="4096" selected>4096-bit (Advanced)</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <div class="flex-1 relative group">
                        <input type="password" id="pgp-passphrase" class="w-full bg-white border border-slate-200 rounded-2xl py-4.5 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 transition-all outline-none" placeholder="Secret Passphrase (Optional)">
                        <span class="absolute right-5 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-300 uppercase tracking-widest">Optional</span>
                    </div>
                    <button id="generate-btn" class="sm:w-auto px-10 py-4.5 bg-primary text-white rounded-2xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-key"></i>
                        Mint PGP Identity
                    </button>
                </div>
            </div>

            <!-- Results Grid -->
            <div id="result-wrapper" class="hidden grid grid-cols-1 lg:grid-cols-2 gap-10 animate-fade-up">
                <!-- Public Key -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                            <i class="fa-solid fa-earth-americas text-emerald-500"></i> Public Key (GPG Export)
                        </span>
                        <div class="flex gap-2">
                            <button onclick="copyKey('public')" class="w-9 h-9 bg-white border border-slate-100 rounded-xl flex items-center justify-center text-slate-400 hover:text-primary hover:shadow-lg transition-all shadow-sm">
                                <i class="fa-solid fa-copy text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="bg-emerald-950 rounded-[2.5rem] p-8 shadow-2xl group border border-emerald-500/10 min-h-[350px] flex flex-col relative overflow-hidden">
                        <div class="absolute -top-20 -right-20 w-48 h-48 bg-emerald-500/5 rounded-full blur-[80px]"></div>
                        <textarea id="out-public" readonly class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[10px] sm:text-[11px] font-bold text-emerald-100 leading-relaxed resize-none outline-none custom-scrollbar mb-4"></textarea>
                        <p class="text-[9px] font-black text-emerald-500/50 uppercase tracking-widest mt-auto border-t border-emerald-500/10 pt-4">Share this key for encrypted communication</p>
                    </div>
                </div>

                <!-- Private Key -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-rose-500"></i> Private Secret (Encrypted)
                        </span>
                        <div class="flex gap-2">
                            <button onclick="copyKey('private')" class="w-9 h-9 bg-white border border-slate-100 rounded-xl flex items-center justify-center text-slate-400 hover:text-rose-500 hover:shadow-lg transition-all shadow-sm">
                                <i class="fa-solid fa-copy text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="bg-rose-950 rounded-[2.5rem] p-8 shadow-2xl group border border-rose-500/10 min-h-[350px] flex flex-col relative overflow-hidden">
                        <div class="absolute -top-20 -right-20 w-48 h-48 bg-rose-500/5 rounded-full blur-[80px]"></div>
                        <textarea id="out-private" readonly class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[10px] sm:text-[11px] font-bold text-rose-100 leading-relaxed resize-none outline-none custom-scrollbar mb-4"></textarea>
                        <p class="text-[9px] font-black text-rose-500/50 uppercase tracking-widest mt-auto border-t border-rose-500/10 pt-4 text-center">CRITICAL: NEVER DISCLOSE YOUR PRIVATE KEY</p>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div id="loading-overlay" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-xl z-[100] flex items-center justify-center p-6">
                <div class="bg-white rounded-[3rem] p-12 max-w-sm w-full text-center shadow-2xl border border-white/20 animate-fade-up">
                    <div class="w-24 h-24 mx-auto mb-8 relative">
                        <div class="absolute inset-0 border-8 border-primary/10 rounded-full"></div>
                        <div class="absolute inset-0 border-8 border-primary rounded-full border-t-transparent animate-spin"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-primary">
                            <i class="fa-solid fa-fire-extinguisher text-3xl"></i>
                        </div>
                    </div>
                    <h4 class="text-xl font-black text-slate-800 uppercase tracking-widest mb-3">Distilling Primes</h4>
                    <p class="text-xs font-bold text-slate-400 leading-relaxed uppercase tracking-tighter">Running CSPRNG Entropy Harvesting...<br>4096-bit generation is computationally intensive.</p>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'PGP Key Generator',
    'intro_title' => 'Pretty Good Privacy: The Gold Standard for Encrypted Identity',
    'intro_content' => 'PGP (Pretty Good Privacy) is the definitive cryptographic standard for ensuring the confidentiality, integrity, and authenticity of digital communication. Our Professional PGP Generator provides an industrial-grade workspace for minting RFC 4880 compliant key pairs. By utilizing 4096-bit RSA primitives and high-entropy salt foundations, it enables secure email signing and message encryption without relying on centralized trust authorities.',
    'detailed_title' => 'Asymmetric Infrastructure and Web of Trust Architecture',
    'detailed_content' => '<p>Modern secure communication requires absolute ownership of your identity keys. Our PGP factory offers a zero-knowledge environment for professional key synthesis:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Advanced Modulus Selection:</strong> Generate enterprise-standard 2048-bit or high-security 4096-bit RSA keys designed for long-term cryptographic stability.</li>
            <li><strong>Passphrase Encrypted Secrets:</strong> Secure your private identity using an optional symmetric passphrase, ensuring that even if the private key is obtained, it remains unusable without the secret.</li>
            <li><strong>Universal GPG Compatibility:</strong> Receive ASCII-armored key representations that are natively compatible with GnuPG, Thunderbird, and all major encryption clients.</li>
            <li><strong>Secure Local Synthesis:</strong> All key generation is performed entirely in your browser using OpenPGP.js. Your private identity never leaves your volatile memory, protecting you from server-side interception.',
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/openpgp/5.11.0/openpgp.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const genBtn = document.getElementById('generate-btn');
    const loading = document.getElementById('loading-overlay');
    const wrapper = document.getElementById('result-wrapper');
    const outPub = document.getElementById('out-public');
    const outPriv = document.getElementById('out-private');

    genBtn.addEventListener('click', async () => {
        const name = document.getElementById('pgp-name').value.trim() || 'Anonymous';
        const email = document.getElementById('pgp-email').value.trim() || 'security@internal.local';
        const bits = parseInt(document.getElementById('pgp-rsa-bits').value);
        const passphrase = document.getElementById('pgp-passphrase').value;

        loading.classList.remove('hidden');
        genBtn.disabled = true;

        try {
            await new Promise(r => setTimeout(r, 100)); // UI Breath

            const { privateKey, publicKey } = await openpgp.generateKey({
                type: 'rsa',
                rsaBits: bits,
                userIDs: [{ name, email }],
                passphrase
            });

            outPub.value = publicKey;
            outPriv.value = privateKey;
            
            wrapper.classList.remove('hidden');
            showToast('PGP Identity Minted Successfully');
            wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } catch (e) {
            showToast('Key synthesis failed', 'error');
            console.error(e);
        } finally {
            loading.classList.add('hidden');
            genBtn.disabled = false;
        }
    });

    window.copyKey = (type) => {
        const el = type === 'public' ? outPub : outPriv;
        navigator.clipboard.writeText(el.value).then(() => showToast(`${type.toUpperCase()} Key Copied`));
    };
});
</script>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.05); border-radius: 10px; }
</style>





