<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8 animate-fade-in">
            <!-- Input Area -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-1">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Encoded JWT Token</label>
                    <button id="clear-btn" class="text-xs font-bold text-slate-400 hover:text-rose-500 uppercase tracking-widest transition-colors flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Clear
                    </button>
                </div>
                <textarea id="jwt-input" class="w-full px-8 py-6 bg-gray-50 border border-gray-200 rounded-[2.5rem] focus:ring-4 focus:ring-violet-500/10 focus:border-violet-500/30 outline-none transition-all text-sm font-mono break-all min-h-[120px] shadow-inner text-slate-600 leading-relaxed" placeholder="Paste your header.payload.signature here..."></textarea>
            </div>

            <button id="decode-btn" class="w-full py-5 bg-violet-600 text-white rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-violet-200 hover:bg-violet-700 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-unlock-keyhole text-lg"></i>
                Inspect & Decode Token
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8 pt-8 border-t border-slate-50">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Header Column -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-2">
                            <span class="text-[10px] font-black text-rose-500 uppercase tracking-widest">JOSE Header</span>
                            <span class="px-2 py-0.5 bg-rose-50 text-rose-600 text-[8px] font-black rounded-full uppercase tracking-tighter">Algorithm & Type</span>
                        </div>
                        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-rose-500/10">
                            <div class="absolute -top-12 -right-12 w-32 h-32 bg-rose-500/5 rounded-full blur-3xl group-hover:bg-rose-500/10 transition-all"></div>
                            <pre id="jwt-header" class="text-rose-400 font-mono text-xs sm:text-sm leading-relaxed overflow-x-auto scrollbar-hide relative z-10 whitespace-pre-wrap"></pre>
                        </div>
                    </div>

                    <!-- Payload Column -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-2">
                            <span class="text-[10px] font-black text-cyan-500 uppercase tracking-widest">JWT Payload</span>
                            <span class="px-2 py-0.5 bg-cyan-50 text-cyan-600 text-[8px] font-black rounded-full uppercase tracking-tighter">Data & Identity Claims</span>
                        </div>
                        <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-cyan-500/10">
                            <div class="absolute -top-12 -right-12 w-32 h-32 bg-cyan-500/5 rounded-full blur-3xl group-hover:bg-cyan-500/10 transition-all"></div>
                            <pre id="jwt-payload" class="text-cyan-400 font-mono text-xs sm:text-sm leading-relaxed overflow-x-auto scrollbar-hide relative z-10 whitespace-pre-wrap"></pre>
                        </div>
                    </div>
                </div>

                <!-- Claims Dashboard -->
                <div class="bg-slate-50 rounded-[3rem] p-8 sm:p-10 border border-slate-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-violet-600 border border-violet-100/50">
                            <i class="fa-solid fa-list-check text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xs font-black text-slate-900 uppercase tracking-widest">Token Claims Analysis</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Structural claim verification & visualization</p>
                        </div>
                    </div>

                    <div id="claims-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Dynamic Claim Badges -->
                    </div>
                </div>

                <!-- Signature Status -->
                <div class="flex items-center justify-center gap-3 py-4 text-slate-400">
                    <i class="fa-solid fa-signature"></i>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em]">Signature integrity detected (Requires secret for verification)</span>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'JWT Decoder',
    'intro_title' => 'Professional Grade JSON Web Token Inspection',
    'intro_content' => 'JSON Web Tokens (JWT) are the backbone of modern decentralized authentication, providing a compact and self-contained way for securely transmitting information between parties as a JSON object. Our Professional JWT Decoder provides a deep-dive inspection of your tokens, instantly parsing the Base64Url encoded Header and Payload to reveal the underlying claims, metadata, and cryptographic parameters without requiring server-side interaction.',
    'detailed_title' => 'Structural Clarity and Developer Security',
    'detailed_content' => '<p>Debugging microservices and modern APIs requires absolute visibility into token state. Our decoder streamlines the auditing process:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Parallel Component Parsing:</strong> View the JOSE header and identity payload in a unified, high-contrast dashboard designed for maximum readability.</li>
            <li><strong>Claim Logic Visualization:</strong> Automatically identifies standard claims (iss, exp, iat, sub) and transforms Unix timestamps into human-readable local formats.</li>
            <li><strong>Algorithmic Transparency:</strong> Instantly identify the cryptographic algorithm (HS256, RS256, etc.) and token type being used by your authentication server.</li>
            <li><strong>No-Log Privacy Standard:</strong> Our decoder operates entirely in your browser\'s local memory. Your sensitive session tokens never touch the network, ensuring zero leakage of credentials.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('jwt-input');
    const decodeBtn = document.getElementById('decode-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const headerPre = document.getElementById('jwt-header');
    const payloadPre = document.getElementById('jwt-payload');
    const claimsGrid = document.getElementById('claims-grid');

    function base64UrlDecode(str) {
        try {
            str = str.replace(/-/g, '+').replace(/_/g, '/');
            return decodeURIComponent(atob(str).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
        } catch (e) {
            return null;
        }
    }

    function decode() {
        const token = input.value.trim();
        if(!token) {
            showToast('Enter a JWT first', 'error');
            return;
        }

        const parts = token.split('.');
        if(parts.length !== 3) {
            showToast('Malformed JWT. Expected 3 sections (header.payload.signature)', 'error');
            return;
        }

        const headJson = base64UrlDecode(parts[0]);
        const payJson = base64UrlDecode(parts[1]);

        if(!headJson || !payJson) {
            showToast('Decoding failed. Ensure valid Base64Url encoding', 'error');
            return;
        }

        try {
            const head = JSON.parse(headJson);
            const pay = JSON.parse(payJson);

            headerPre.textContent = JSON.stringify(head, null, 4);
            payloadPre.textContent = JSON.stringify(pay, null, 4);

            // Build Claims Grid
            let html = '';
            const standardClaims = {
                'iss': { label: 'Issuer', icon: 'fa-building' },
                'sub': { label: 'Subject', icon: 'fa-user' },
                'aud': { label: 'Audience', icon: 'fa-users' },
                'exp': { label: 'Expiration', icon: 'fa-clock' },
                'iat': { label: 'Issued At', icon: 'fa-calendar-check' },
                'nbf': { label: 'Not Before', icon: 'fa-hourglass-start' },
                'jti': { label: 'JWT ID', icon: 'fa-hashtag' }
            };

            Object.entries(standardClaims).forEach(([key, cfg]) => {
                if(pay[key] !== undefined) {
                    let val = pay[key];
                    if(['exp', 'iat', 'nbf'].includes(key)) {
                        val = new Date(val * 1000).toLocaleString();
                    }
                    html += `
                        <div class="bg-white p-6 rounded-[1.5rem] border border-slate-100 shadow-sm group hover:border-violet-200 transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <i class="fa-solid ${cfg.icon} text-[10px] text-violet-400"></i>
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">${cfg.label}</span>
                            </div>
                            <div class="text-[11px] font-bold text-slate-900 break-all font-mono">${val}</div>
                        </div>
                    `;
                }
            });

            claimsGrid.innerHTML = html || `<div class="col-span-full py-8 text-center text-slate-300 text-xs font-bold uppercase tracking-widest">No standard claims detected</div>`;

            wrapper.classList.remove('hidden');
            showToast('Token Analyzed Successfully');
            wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });

        } catch(e) {
            showToast('JSON Parsing Error', 'error');
        }
    }

    decodeBtn.addEventListener('click', decode);
    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.classList.add('hidden');
        input.focus();
    });

    // Auto-decode if token is pasted
    input.addEventListener('paste', () => setTimeout(decode, 100));
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>