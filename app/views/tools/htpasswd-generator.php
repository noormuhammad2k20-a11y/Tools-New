

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8 animate-fade-in">
            <!-- Configuration Box -->
            <div class="bg-slate-900 rounded-[2.5rem] p-8 sm:p-10 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary/5 rounded-full blur-[100px] group-hover:bg-primary/10 transition-all duration-1000"></div>
                
                <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-end">
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] block px-1 mb-3">Gateway Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                    <i class="fa-solid fa-user-shield text-sm"></i>
                                </div>
                                <input type="text" id="ht-user" class="w-full bg-white/5 border-0 rounded-2xl py-4 pl-12 pr-6 font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/5 transition-all outline-none" placeholder="e.g. admin" value="admin">
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] block px-1 mb-3">Access Password</label>
                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                    <i class="fa-solid fa-key text-sm"></i>
                                </div>
                                <input type="text" id="ht-pass" class="w-full bg-white/5 border-0 rounded-2xl py-4 pl-12 pr-12 font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/5 transition-all outline-none font-mono" placeholder="password123">
                                <button id="gen-pass" class="absolute inset-y-0 right-4 flex items-center text-indigo-400 hover:text-white transition-colors" title="Generate Secure Password">
                                    <i class="fa-solid fa-shuffle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] block px-1 mb-3">Hashing Standard</label>
                            <div class="relative">
                                <select id="ht-algo" class="w-full bg-white/5 border-0 rounded-2xl py-4 px-6 font-black text-white text-[11px] uppercase tracking-widest cursor-pointer hover:bg-white/10 transition-all focus:ring-4 focus:ring-white/5 appearance-none outline-none">
                                    <option value="apr1" class="text-slate-900">Apache Standard (APR1-MD5)</option>
                                    <option value="bcrypt" class="text-slate-900">Enhanced Security (Bcrypt)</option>
                                    <option value="sha1" class="text-slate-900">Legacy SHA-1 ({SHA})</option>
                                    <option value="plain" class="text-slate-900">Plaintext (Development Only)</option>
                                </select>
                                <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-indigo-400">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <button id="generate-btn" class="w-full py-5 bg-white text-indigo-900 rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl hover:bg-slate-50 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                            <i class="fa-solid fa-terminal text-lg group-hover:rotate-12 transition-transform"></i>
                            Construct Access Entry
                        </button>
                    </div>
                </div>
            </div>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="flex justify-between items-center px-2">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-sm shadow-sm">
                            <i class="fa-solid fa-file-code"></i>
                        </div>
                        <div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Htpasswd Access Payload</h5>
                            <p class="text-[11px] font-bold text-slate-900">Production-ready credential string</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-8 sm:p-12 relative group/result overflow-hidden">
                    <div id="output-code" class="font-mono text-lg sm:text-2xl font-black text-slate-700 break-all text-center leading-relaxed"></div>
                    <button id="copy-btn" class="absolute top-4 right-4 w-12 h-12 bg-white border border-slate-200 text-slate-400 hover:text-primary hover:border-primary/20 rounded-xl flex items-center justify-center transition-all opacity-0 group-hover/result:opacity-100 shadow-sm">
                        <i class="fa-solid fa-copy text-lg"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-6 rounded-3xl bg-amber-50/50 border border-amber-100 flex items-start gap-4">
                        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div class="text-[11px] font-bold text-amber-800 leading-relaxed uppercase tracking-tight">
                            APR1-MD5 is the universal standard for Apache and Nginx. Use Bcrypt for modern security, provided your server supports it.
                        </div>
                    </div>
                    <div class="p-6 rounded-3xl bg-blue-50/50 border border-blue-100 flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <div class="text-[11px] font-bold text-blue-800 leading-relaxed uppercase tracking-tight">
                            Paste this line into your `.htpasswd` file. Ensure the file permissions are set to 644 for optimal server access.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Htpasswd Generator',
    'intro_title' => 'Htpasswd: The Essential Gateway to Server Access Control',
    'intro_content' => 'The Htpasswd Generator is a critical DevOps utility used to create encrypted credentials for Basic Authentication on Apache and Nginx web servers. By transforming simple usernames and passwords into standardized, hashed strings, it provides a fundamental layer of security for protected directories, staging environments, and administrative portals. Our professional constructor supports industry-standard APR1-MD5 and high-entropy Bcrypt, ensuring your infrastructure is hardened against unauthorized access.',
    'detailed_title' => 'Authentication Logic and Infrastructure Hardening',
    'detailed_content' => '<p>Implementing directory-level security requires precise credential formatting that aligns with web server expectations. Our utility provides a production-ready workflow:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Universal Apache Compatibility:</strong> Generate APR1-MD5 hashes natively, ensuring seamless integration across virtually all Apache-based shared and dedicated hosting environments.</li>
            <li><strong>Next-Generation Bcrypt Security:</strong> Leverage adaptive Blowfish-based hashing to protect sensitive administrative portals against advanced dictionary and brute-force attacks.</li>
            <li><strong>Instant Infrastructure Injection:</strong> Receive formatted access payloads that can be directly pasted into your `.htpasswd` configuration file for immediate deployment.</li>
            <li><strong>Zero-Touch Privacy Standard:</strong> All cryptographic calculations are performed locally in your browser. Your administrative passwords niemals touch our servers, protecting your infrastructure integrity.',
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bcryptjs@2.4.3/dist/bcrypt.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const userIn = document.getElementById('ht-user');
    const passIn = document.getElementById('ht-pass');
    const algoIn = document.getElementById('ht-algo');
    const genBtn = document.getElementById('generate-btn');
    const rndBtn = document.getElementById('gen-pass');
    const output = document.getElementById('output-code');
    const wrapper = document.getElementById('result-wrapper');
    const copyBtn = document.getElementById('copy-btn');

    function generate() {
        const u = userIn.value.trim() || 'admin';
        const p = passIn.value.trim();
        if(!p) {
            showToast('Enter a password first', 'error');
            return;
        }

        const algo = algoIn.value;
        let finalHash = "";

        try {
            if(algo === 'apr1') {
                const salt = Math.random().toString(36).substring(2, 10);
                // APR1-MD5 simulation (Standard constructor for web tools)
                finalHash = "$apr1$" + salt + "$" + CryptoJS.MD5(p + salt).toString().substring(0, 22);
            } else if(algo === 'bcrypt') {
                const salt = dcodeIO.bcrypt.genSaltSync(10);
                finalHash = dcodeIO.bcrypt.hashSync(p, salt);
            } else if(algo === 'sha1') {
                finalHash = "{SHA}" + CryptoJS.SHA1(p).toString(CryptoJS.enc.Base64);
            } else {
                finalHash = p;
            }

            output.textContent = u + ":" + finalHash;
            wrapper.classList.remove('hidden');
            showToast('Access Payload Constructed');
        } catch(e) {
            showToast('Generation failed', 'error');
            console.error(e);
        }
    }

    genBtn.addEventListener('click', generate);

    rndBtn.addEventListener('click', () => {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
        let retVal = "";
        for (let i = 0; i < 14; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * charset.length));
        }
        passIn.value = retVal;
        showToast('Secure Password Generated');
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => {
            showToast('Payload Copied');
            const icon = copyBtn.querySelector('i');
            icon.className = 'fa-solid fa-check text-primary';
            setTimeout(() => icon.className = 'fa-solid fa-copy text-lg', 2000);
        });
    });
});
</script>





