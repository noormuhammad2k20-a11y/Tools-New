

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Configuration Area -->
        <div class="space-y-10 animate-fade-in">
            <div class="bg-slate-50 border-2 border-slate-100 rounded-[2.5rem] p-8 sm:p-10">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
                    <div class="md:col-span-4 space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Key Modulus Entropy</label>
                        <select id="rsa-size" class="w-full bg-white border-2 border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:border-indigo-500 transition-all appearance-none cursor-pointer">
                            <option value="2048" selected>2048-bit (Standard)</option>
                            <option value="4096">4096-bit (Ultra High)</option>
                        </select>
                    </div>
                    <div class="md:col-span-4 space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Algorithm Context</label>
                        <select id="rsa-alg" class="w-full bg-white border-2 border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:border-indigo-500 transition-all appearance-none cursor-pointer">
                            <option value="RSA-OAEP" selected>Encryption (OAEP)</option>
                            <option value="RSASSA-PKCS1-v1_5">Signatures (PKCS1)</option>
                        </select>
                    </div>
                    <div class="md:col-span-4">
                        <button id="btn-generate" class="w-full bg-indigo-600 text-white rounded-2xl py-4.5 font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3 py-4">
                            <i class="fa-solid fa-microchip"></i>
                            Mint Key Pair
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results Grid -->
            <div id="results-container" class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Public Key -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-2">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Public Key (SPKI/PEM)</label>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="copyKey('public')" class="text-[9px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy</button>
                            <button onclick="downloadKey('public')" class="text-[9px] font-black text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <div class="bg-emerald-950 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-emerald-500/20 h-[350px] flex flex-col">
                        <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-500/5 rounded-full blur-[100px]"></div>
                        <textarea id="out-public" class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[11px] font-bold text-emerald-100 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-emerald-500 selection:text-white resize-none outline-none" readonly placeholder="Waiting for audit initiation..."></textarea>
                    </div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider px-2"><i class="fa-solid fa-share-nodes me-1"></i> Public distribution permitted for encryption</p>
                </div>

                <!-- Private Key -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-2">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-rose-500 rounded-full animate-pulse"></div>
                            <label class="text-[10px] font-black text-rose-500 uppercase tracking-widest">Private Key (PKCS8/PEM)</label>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="copyKey('private')" class="text-[9px] font-black text-rose-600 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy</button>
                            <button onclick="downloadKey('private')" class="text-[9px] font-black text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <div class="bg-rose-950 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-rose-500/20 h-[350px] flex flex-col">
                        <div class="absolute -top-20 -right-20 w-64 h-64 bg-rose-500/5 rounded-full blur-[100px]"></div>
                        <textarea id="out-private" class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[11px] font-bold text-rose-100 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-rose-500 selection:text-white resize-none outline-none" readonly placeholder="Secret key will appear here..."></textarea>
                    </div>
                    <p class="text-[9px] font-black text-rose-600 uppercase tracking-wider px-2"><i class="fa-solid fa-triangle-exclamation me-1 shadow-sm"></i> Restricted: Never share or upload this key</p>
                </div>
            </div>

            <!-- Loader Overlay -->
            <div id="loading-overlay" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-xl z-[100] flex items-center justify-center p-6">
                <div class="bg-white rounded-[3rem] p-12 max-w-sm w-full text-center shadow-2xl border border-white/20 animate-fade-up">
                    <div class="relative w-24 h-24 mx-auto mb-8">
                        <div class="absolute inset-0 border-8 border-indigo-100 rounded-full"></div>
                        <div class="absolute inset-0 border-8 border-indigo-600 rounded-full border-t-transparent animate-spin"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-indigo-600">
                            <i class="fa-solid fa-shield-halved text-3xl"></i>
                        </div>
                    </div>
                    <h4 class="text-xl font-black text-slate-800 uppercase tracking-widest mb-3">Synthesizing Primes</h4>
                    <p class="text-xs font-bold text-slate-400 leading-relaxed uppercase tracking-tighter">Calculating 4096-bit RSA Modulus Entropy...<br>This may take several seconds.</p>
                </div>
            </div>
        </div>
    </div>


<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.05); border-radius: 10px; }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'RSA Key Generator',
    'intro_title' => 'Asymmetric Cryptography: Minting Immutable Key Pairs',
    'intro_content' => 'The RSA Key Generator is a professional-grade utility for synthesizing asymmetric cryptographic key pairs. RSA (Rivest–Shamir–Adleman) remains the industry gold standard for secure data transmission and digital signatures. Our Professional RSA Suite provides a high-fidelity, client-side environment for generating key pairs up to 4096 bits with maximum entropy and absolute privacy, ensuring your encrypted interactions meet enterprise-grade security standards.',
    'detailed_title' => 'Variable Entropy and Air-Gapped Key Synthesis',
    'detailed_content' => '<p>Implementing secure communication channels requires robust asymmetric infrastructure and precise cryptographic instrumentation. Our Professional RSA utility offers:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>High-Entropy Modulus Selection:</strong> Balance computational overhead with long-term resistance by generating keys across 2048-bit and 4096-bit modulus lengths.</li>
            <li><strong>Bi-Directional Schema Output:</strong> Instantly receive both Public (SPKI) and Private (PKCS8) components in standardized PEM formats for immediate infrastructure deployment.</li>
            <li><strong>Zero-Knowledge Generation:</strong> All prime calculations occur strictly within your local browser environment using the WebCrypto API—your private keys never traverse the network.</li>
            <li><strong>Audit-Ready Infrastructure Integration:</strong> Standardized PEM blocks ensure native compatibility with SSH, OpenSSL, and primary cloud providers including AWS, GCP, and Azure.</li>
        </ul>'
]);
?>

<!-- Suggested Tools Strip -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const sizeSelect = document.getElementById('rsa-size');
    const algSelect = document.getElementById('rsa-alg');
    const outPub = document.getElementById('out-public');
    const outPriv = document.getElementById('out-private');
    const btnGen = document.getElementById('btn-generate');
    const loader = document.getElementById('loading-overlay');

    function arrayBufferToBase64(buffer) {
        let binary = '';
        const bytes = new Uint8Array(buffer);
        for (let i = 0; i < bytes.byteLength; i++) {
            binary += String.fromCharCode(bytes[i]);
        }
        return window.btoa(binary);
    }

    function addNewLines(str) {
        let finalString = '';
        while (str.length > 0) {
            finalString += str.substring(0, 64) + '\n';
            str = str.substring(64);
        }
        return finalString;
    }

    function toPem(keyBuffer, type) {
        const b64 = arrayBufferToBase64(keyBuffer);
        const pem = addNewLines(b64);
        const header = `-----BEGIN ${type.toUpperCase()} KEY-----\n`;
        const footer = `-----END ${type.toUpperCase()} KEY-----`;
        return header + pem + footer;
    }

    window.generateKeys = async () => {
        const size = parseInt(sizeSelect.value, 10);
        const algName = algSelect.value;
        
        loader.classList.remove('hidden');
        btnGen.disabled = true;

        try {
            // Delay slightly for UI breathing
            await new Promise(r => setTimeout(r, 50));

            const keyPair = await window.crypto.subtle.generateKey(
                {
                    name: algName,
                    modulusLength: size, 
                    publicExponent: new Uint8Array([1, 0, 1]),
                    hash: "SHA-256", 
                },
                true,
                algName === 'RSA-OAEP' ? ["encrypt", "decrypt"] : ["sign", "verify"]
            );

            const [pubExp, privExp] = await Promise.all([
                window.crypto.subtle.exportKey("spki", keyPair.publicKey),
                window.crypto.subtle.exportKey("pkcs8", keyPair.privateKey)
            ]);

            outPub.value = toPem(pubExp, 'public');
            outPriv.value = toPem(privExp, 'private');
            showToast(`${size}-bit audit complete`, 'success');
        } catch (e) {
            showToast('Generation failed', 'error');
        } finally {
            loader.classList.add('hidden');
            btnGen.disabled = false;
        }
    };

    window.copyKey = (type) => {
        const el = type === 'public' ? outPub : outPriv;
        if(!el.value) return showToast('No key present', 'error');
        navigator.clipboard.writeText(el.value).then(() => showToast(`${type} key copied`));
    };

    window.downloadKey = (type) => {
        const el = type === 'public' ? outPub : outPriv;
        if(!el.value) return showToast('No key present', 'error');
        const blob = new Blob([el.value], { type: 'application/x-pem-file' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `rsa_${type}.pem`;
        a.click();
        URL.revokeObjectURL(url);
    };

    btnGen.addEventListener('click', generateKeys);
});
</script>





