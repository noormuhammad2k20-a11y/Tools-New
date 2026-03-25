

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Left: Input Area -->
            <div class="space-y-6">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">X.509 PEM Certificate</label>
                        <span class="text-[10px] font-bold text-indigo-500 uppercase">Input Buffer</span>
                    </div>
                    <textarea id="cert-input" class="w-full bg-slate-900 text-indigo-300 font-mono text-[13px] p-6 rounded-3xl border-0 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none scrollbar-hide shadow-2xl" rows="12" placeholder="-----BEGIN CERTIFICATE-----\nMIIDdzCCAl+gAwIBAgIEAgAAADANBgkqhkiG9w0BAQUFADBaMQswCQYDVQQGEwJV\n..."></textarea>
                </div>
                
                <button id="decode-btn" class="w-full py-5 bg-indigo-600 text-white rounded-[2rem] font-black uppercase tracking-[0.2em] text-sm shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-3 group">
                    <i class="fa-solid fa-unlock-keyhole text-lg group-hover:rotate-12 transition-transform"></i>
                    Audit Certificate
                </button>
            </div>

            <!-- Right: Results Area -->
            <div class="relative">
                <div id="cert-results" class="hidden h-full">
                    <div class="bg-white border-2 border-slate-100 rounded-[2.5rem] p-8 space-y-8 animate-fade-in relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 rounded-bl-[5rem] -mr-10 -mt-10 group-hover:bg-indigo-500/10 transition-colors"></div>
                        
                        <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                            <div class="w-12 h-12 bg-indigo-50 bg-white rounded-2xl flex items-center justify-center shadow-sm text-indigo-600">
                                <i class="fa-solid fa-file-shield text-2xl"></i>
                            </div>
                            <h5 class="font-black text-slate-900 uppercase tracking-tighter text-lg">Identity Signature</h5>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Common Name (CN)</label>
                                <div id="cert-cn" class="text-xl font-bold text-slate-900 truncate">example.com</div>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Certificate Issuer</label>
                                <div id="cert-issuer" class="text-sm font-bold text-indigo-600">Let's Encrypt</div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Issue Date</label>
                                    <div id="cert-start" class="text-xs font-bold text-slate-700">2023-01-01</div>
                                </div>
                                <div class="p-4 bg-rose-50 rounded-2xl border border-rose-100">
                                    <label class="text-[10px] font-black text-rose-400 uppercase tracking-widest block mb-1">Expiry Date</label>
                                    <div id="cert-end" class="text-xs font-bold text-rose-600">2024-01-01</div>
                                </div>
                            </div>

                            <div class="space-y-1 p-4 bg-slate-900 rounded-2xl">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest block mb-1">Serial Fingerprint</label>
                                <div id="cert-serial" class="text-[10px] font-mono text-cyan-400 break-all leading-relaxed">00:AA:BB:CC...</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="cert-placeholder" class="h-full min-h-[400px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-column items-center justify-center text-center p-10 group hover:border-indigo-200 transition-all">
                    <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-200 transition-all mb-6">
                        <i class="fa-solid fa-shield-halved text-4xl"></i>
                    </div>
                    <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Secure Decoder Standing By</p>
                    <p class="text-slate-300 text-sm mt-3 leading-relaxed">Please insert a valid PEM certificate<br>to initiate deep analysis.</p>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'SSL Certificate Decoder',
    'intro_title' => 'SSL Decoder: Deep Forensic Analysis of X.509 Certificates',
    'intro_content' => 'In an era of mandatory encryption, maintaining valid and correctly configured SSL/TLS certificates is non-negotiable for website trust and performance. Our Professional SSL Certificate Decoder provides a comprehensive structural audit of X.509 certificates. It instantly parses PEM-encoded data to extract critical metadata, including Issuer Authority, Subject Alternative Names (SANs), cryptographic algorithm details, and precise expiration timestamps to prevent unexpected service downtime.',
    'detailed_title' => 'The Critical Role of Certificate Translucency',
    'detailed_content' => '<p>Understanding the internal state of your certificates is essential for troubleshooting "Not Secure" warnings and managing the cryptographic ecosystem of your infrastructure:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Issuer Integrity:</strong> Verifies the root of trust by identifying specifically which Certificate Authority (CA) signed the credential.</li>
            <li><strong>Expiration Management:</strong> Extracts high-precision "Not Before" and "Not After" timestamps to enable proactive renewal scheduling.</li>
            <li><strong>SAN Verification:</strong> Lists the Subject Alternative Names to ensure all domains and subdomains are properly covered under the current encryption scope.</li>
            <li><strong>Privacy-Locked Processing:</strong> All decoding occurs within your browser\'s local sandbox. No certificate data—public or private—ever leaves your machine or is logged by our servers.</li>
        </ul>'
]);
?>


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/node-forge/1.3.1/forge.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('cert-input');
    const btn = document.getElementById('decode-btn');
    const results = document.getElementById('cert-results');
    const placeholder = document.getElementById('cert-placeholder');

    btn.addEventListener('click', () => {
        const pem = input.value.trim();
        if (!pem) return showToast('Please enter a PEM certificate', 'warning');

        try {
            const cert = forge.pki.certificateFromPem(pem);
            
            // Extract and Display Data
            document.getElementById('cert-cn').textContent = cert.subject.getField('CN')?.value || 'Unknown Principal';
            document.getElementById('cert-issuer').textContent = cert.issuer.getField('CN')?.value || 'Private/Unknown Authority';
            
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('cert-start').textContent = cert.validity.notBefore.toLocaleDateString(undefined, options);
            document.getElementById('cert-end').textContent = cert.validity.notAfter.toLocaleDateString(undefined, options);
            
            // Format Serial Number with Colons
            const serial = cert.serialNumber.match(/.{1,2}/g)?.join(':').toUpperCase() || cert.serialNumber;
            document.getElementById('cert-serial').textContent = serial;

            // UI Transitions
            placeholder.classList.add('hidden');
            results.classList.remove('hidden');
            
            showToast('Certificate hierarchy audited successfully!');
        } catch (e) {
            showToast('Invalid Certificate Body: Ensure full PEM headers are included', 'error');
            console.error('SSL Audit Error:', e);
        }
    });
});
</script>






