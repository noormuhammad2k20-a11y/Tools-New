<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Input Panel -->
            <div class="bg-slate-50 border-2 border-slate-100 rounded-[2.5rem] p-8 sm:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-end">
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Common Name (CN)</label>
                        <input type="text" id="ssl-cn" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 outline-none transition-all" placeholder="e.g. localhost" value="localhost">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Organization (O)</label>
                        <input type="text" id="ssl-org" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 outline-none transition-all" placeholder="e.g. Development Lab" value="Internal Development">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Validity Period (Days)</label>
                        <div class="relative">
                            <input type="number" id="ssl-days" class="w-full bg-white border border-slate-200 rounded-2xl py-4 px-6 font-bold text-slate-700 shadow-sm focus:ring-4 focus:ring-primary/10 outline-none transition-all" value="365">
                             <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[10px] font-black text-slate-300 uppercase tracking-widest">Days</div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button id="gen-btn" class="w-full py-5 bg-primary text-white rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-4 group">
                        <i class="fa-solid fa-stamp text-lg group-hover:rotate-12 transition-transform"></i>
                        Generate Signed SSL Pair
                    </button>
                </div>
            </div>

            <!-- Results Display -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Certificate (Public) -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-2">
                             <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <i class="fa-solid fa-certificate text-emerald-500"></i> Signed Certificate (PEM)
                            </span>
                            <button onclick="copyToClipboard('ssl-cert-out')" class="text-[9px] font-black text-primary bg-primary/5 hover:bg-primary/10 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy</button>
                        </div>
                        <div class="bg-emerald-950 rounded-[2.5rem] p-8 shadow-2xl border border-emerald-500/10 min-h-[350px] flex flex-col relative overflow-hidden">
                            <div class="absolute -top-20 -right-20 w-48 h-48 bg-emerald-500/5 rounded-full blur-[80px]"></div>
                            <textarea id="ssl-cert-out" readonly class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[10px] font-bold text-emerald-100 leading-relaxed resize-none outline-none custom-scrollbar"></textarea>
                        </div>
                    </div>

                    <!-- Private Key -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-2">
                             <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <i class="fa-solid fa-key text-rose-500 animate-pulse"></i> RSA Private Key
                            </span>
                            <button onclick="copyToClipboard('ssl-key-out')" class="text-[9px] font-black text-rose-600 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy</button>
                        </div>
                        <div class="bg-rose-950 rounded-[2.5rem] p-8 shadow-2xl border border-rose-500/10 min-h-[350px] flex flex-col relative overflow-hidden">
                            <div class="absolute -top-20 -right-20 w-48 h-48 bg-rose-500/5 rounded-full blur-[80px]"></div>
                            <textarea id="ssl-key-out" readonly class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-[10px] font-bold text-rose-100 leading-relaxed resize-none outline-none custom-scrollbar"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Guidance Info -->
                <div class="p-6 rounded-[2rem] bg-indigo-50 border border-indigo-100 flex items-start gap-4">
                    <div class="w-10 h-10 bg-white text-indigo-500 rounded-xl flex items-center justify-center shadow-sm flex-shrink-0 border border-indigo-200/50">
                        <i class="fa-solid fa-circle-info text-lg"></i>
                    </div>
                    <div class="text-[11px] font-bold text-indigo-800 leading-relaxed uppercase tracking-tight">
                        Self-signed certificates are intended for development, staging environments, and internal network testing. Browsers will display a warning when accessing sites via self-signed certs as they lack a trusted CA root. For production environments, always use a certificate from a trusted authority like Let's Encrypt.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.05); border-radius: 10px; }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'SSL Certificate Generator',
    'intro_title' => 'Self-Signed Infrastructure: Minting Cryptographic Trust Shields',
    'intro_content' => 'The SSL Certificate Generator is a professional-grade bootstrapping utility for the rapid creation of asymmetric X.509 certificates. Ideal for local development, docker environments, and private testing servers, this tool generates a cryptographically robust RSA key pair and a matching self-signed certificate. By automating the boilerplate of certificate creation, it enables developers to implement HTTPS and TLS protocols instantly across isolated network segments.',
    'detailed_title' => 'Cryptographic Primitives and Infrastructure Bootstrapping',
    'detailed_content' => '<p>Implementing end-to-end encryption in development requires precise certificate instrumentation. Our Professional SSL Suite offers a streamlined workflow:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>On-Demand X.509 Creation:</strong> Instantly mint certificates with custom Common Names (CN) and Organization details tailored for your specific sub-domain or service.</li>
            <li><strong>Variable Validity Logic:</strong> Define precise expiration windows from 1 day for ephemeral tests to 10 years for long-term internal infrastructure stability.</li>
            <li><strong>Industry-Standard PEM Output:</strong> Receive your certificate and private key in Base64 encoded PEM format, compatible with Nginx, Apache, Node.js, and Kubernetes.</li>
            <li><strong>Zero-Touch Browser Synthesis:</strong> Leveraging node-forge, all certificate signing operations happen locally on your hardware. Your private keys never leave your device.',
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/node-forge/1.3.1/forge.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('gen-btn');
    const wrapper = document.getElementById('result-wrapper');
    
    btn.addEventListener('click', () => {
        const cn = document.getElementById('ssl-cn').value.trim() || 'localhost';
        const org = document.getElementById('ssl-org').value.trim() || 'Internal Lab';
        const days = parseInt(document.getElementById('ssl-days').value) || 365;

        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Minting Pairs...';

        setTimeout(() => {
            try {
                const keys = forge.pki.rsa.generateKeyPair(2048);
                const cert = forge.pki.createCertificate();
                
                cert.publicKey = keys.publicKey;
                cert.serialNumber = Math.floor(Math.random() * 1000000).toString();
                cert.validity.notBefore = new Date();
                cert.validity.notAfter = new Date();
                cert.validity.notAfter.setDate(cert.validity.notBefore.getDate() + days);

                const attrs = [
                    { name: 'commonName', value: cn },
                    { name: 'organizationName', value: org }
                ];
                cert.setSubject(attrs);
                cert.setIssuer(attrs);
                cert.sign(keys.privateKey, forge.md.sha256.create());

                document.getElementById('ssl-cert-out').value = forge.pki.certificateToPem(cert);
                document.getElementById('ssl-key-out').value = forge.pki.privateKeyToPem(keys.privateKey);
                
                wrapper.classList.remove('hidden');
                wrapper.classList.add('animate-fade-up');
                showToast('SSL Identity Constructed');
                wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } catch (e) {
                showToast('Minting failed: ' + e.message, 'error');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-stamp text-lg group-hover:rotate-12 transition-transform"></i> Generate Signed SSL Pair';
            }
        }, 50);
    });
});

function copyToClipboard(id) {
    const el = document.getElementById(id);
    navigator.clipboard.writeText(el.value).then(() => {
        showToast('Payload Copied');
    });
}
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>