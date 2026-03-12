<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <!-- Strength Visualizer & Output -->
            <div class="space-y-6 flex flex-col justify-center">
                <div class="text-center space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Generated Credential</label>
                    <div id="pass-output" class="text-4xl md:text-5xl font-mono font-black text-primary tracking-tighter break-all bg-gray-50 py-10 rounded-3xl border border-gray-100 shadow-inner px-6 min-h-[140px] flex items-center justify-center">
                        Initializing...
                    </div>
                </div>
                
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest text-slate-400 px-1">
                        <span>Entropy Grade</span>
                        <span id="strength-label" class="text-emerald-500">Exceptional</span>
                    </div>
                    <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                        <div id="strength-bar" class="h-full bg-emerald-500 transition-all duration-500 w-full shadow-[0_0_15px_-3px_rgba(16,185,129,0.5)]"></div>
                    </div>
                </div>
            </div>

            <!-- Configuration Controls -->
            <div class="space-y-6 bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-100">
                <div class="space-y-4">
                    <div class="flex justify-between items-end px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Key Complexity</label>
                        <span id="len-label" class="text-2xl font-black text-slate-900 font-mono">24</span>
                    </div>
                    <input type="range" id="pass-len" min="8" max="128" value="24" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-primary">
                </div>

                <div class="grid grid-cols-2 gap-3 pb-2">
                    <label class="flex items-center gap-3 p-3 bg-white rounded-2xl border border-slate-100 cursor-pointer hover:border-primary/30 transition-all group">
                        <input type="checkbox" id="chk-upper" checked class="w-5 h-5 text-primary rounded-lg border-slate-200 focus:ring-primary/20">
                        <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest group-hover:text-primary transition-colors">A-Z</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-white rounded-2xl border border-slate-100 cursor-pointer hover:border-primary/30 transition-all group">
                        <input type="checkbox" id="chk-lower" checked class="w-5 h-5 text-primary rounded-lg border-slate-200 focus:ring-primary/20">
                        <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest group-hover:text-primary transition-colors">a-z</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-white rounded-2xl border border-slate-100 cursor-pointer hover:border-primary/30 transition-all group">
                        <input type="checkbox" id="chk-num" checked class="w-5 h-5 text-primary rounded-lg border-slate-200 focus:ring-primary/20">
                        <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest group-hover:text-primary transition-colors">0-9</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 bg-white rounded-2xl border border-slate-100 cursor-pointer hover:border-primary/30 transition-all group">
                        <input type="checkbox" id="chk-sym" checked class="w-5 h-5 text-primary rounded-lg border-slate-200 focus:ring-primary/20">
                        <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest group-hover:text-primary transition-colors">!@#$</span>
                    </label>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button id="gen-btn" class="py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 transition-all">
                        Regenerate <i class="fa-solid fa-sync ms-2"></i>
                    </button>
                    <button id="copy-btn" class="py-4 bg-slate-900 text-white rounded-2xl font-black uppercase tracking-widest text-xs shadow-xl shadow-slate-900/20 hover:scale-[1.02] transition-all">
                        Copy Key <i class="fa-solid fa-copy ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Strong Password Generator',
    'intro_title' => 'Beyond Simple Keys: Engineering Cryptographic Resistance',
    'intro_content' => 'In a landscape of evolving brute-force techniques, a "good" password is no longer sufficient. Our Strong Password Generator is engineered to provide military-grade entropy by utilizing browser-level cryptographic random number generators (CSPRNG). By avoiding human-predictable patterns and maximizing character diversity across a 128-character potential range, we provide the ultimate defense for your sensitive data, servers, and personal accounts.',
    'detailed_title' => 'The Architecture of Entropy & Data Privacy',
    'detailed_content' => '<p>True security requires high-end mathematical uniqueness. Our generator adheres to several key architectural standards to ensure your digital safety:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>WebCrypto API (CSPRNG):</strong> We utilize the <code>window.crypto.getRandomValues</code> API, ensuring that entropy is derived from the system\'s kernel-level random source rather than predictable JavaScript math functions.</li>
            <li><strong>Extended Key Length:</strong> Supports up to 128 characters, far exceeding the 16-24 character limits of legacy generators, providing future-proof security against quantum computing threats.</li>
            <li><strong>Character Space Maximization:</strong> Seamlessly blends uppercase, lowercase, special characters, and numeric digits to prevent "dictionary-word" correlation attacks.</li>
            <li><strong>Local Context Execution:</strong> Your generated passwords are created and displayed only in your current browser session. We never transmit, store, or log your credentials.</li>
        </ul>'
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const lenRange = document.getElementById('pass-len');
    const lenLabel = document.getElementById('len-label');
    const genBtn = document.getElementById('gen-btn');
    const copyBtn = document.getElementById('copy-btn');
    const output = document.getElementById('pass-output');
    const strengthLabel = document.getElementById('strength-label');
    const strengthBar = document.getElementById('strength-bar');

    lenRange.addEventListener('input', () => {
        lenLabel.textContent = lenRange.value;
        generate();
    });

    genBtn.addEventListener('click', generate);

    function generate() {
        const len = parseInt(lenRange.value);
        const hasUpper = document.getElementById('chk-upper').checked;
        const hasLower = document.getElementById('chk-lower').checked;
        const hasNum = document.getElementById('chk-num').checked;
        const hasSym = document.getElementById('chk-sym').checked;

        const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const lower = "abcdefghijklmnopqrstuvwxyz";
        const num = "0123456789";
        const sym = "!@#$%^&*()_+~`|}{[]:;?><,./-=";

        let charset = "";
        if (hasUpper) charset += upper;
        if (hasLower) charset += lower;
        if (hasNum) charset += num;
        if (hasSym) charset += sym;

        if (!charset) {
            output.textContent = "Select Option";
            output.classList.add('text-slate-300');
            return;
        }

        output.classList.remove('text-slate-300');

        let password = "";
        const array = new Uint32Array(len);
        window.crypto.getRandomValues(array);

        for (let i = 0; i < len; i++) {
            password += charset[array[i] % charset.length];
        }

        output.textContent = password;
        
        // Font size adjustment for long passwords
        if (len > 32) output.className = "text-xl md:text-2xl font-mono font-black text-primary tracking-tighter break-all bg-gray-50 py-10 rounded-3xl border border-gray-100 shadow-inner px-6 min-h-[140px] flex items-center justify-center";
        else if (len > 16) output.className = "text-2xl md:text-3xl font-mono font-black text-primary tracking-tighter break-all bg-gray-50 py-10 rounded-3xl border border-gray-100 shadow-inner px-6 min-h-[140px] flex items-center justify-center";
        else output.className = "text-4xl md:text-5xl font-mono font-black text-primary tracking-tighter break-all bg-gray-50 py-10 rounded-3xl border border-gray-100 shadow-inner px-6 min-h-[140px] flex items-center justify-center";

        updateStrength(password, len);
    }

    function updateStrength(p, len) {
        let score = 0;
        if (len > 12) score += 20;
        if (len > 24) score += 20;
        if (len > 48) score += 20;
        if (/[A-Z]/.test(p)) score += 10;
        if (/[0-9]/.test(p)) score += 10;
        if (/[^A-Za-z0-9]/.test(p)) score += 20;

        strengthBar.style.width = score + '%';
        
        if (score >= 90) {
            strengthLabel.textContent = 'EXCEPTIONAL';
            strengthLabel.className = 'text-emerald-500';
            strengthBar.className = 'h-full bg-emerald-500 transition-all duration-500 shadow-[0_0_15px_-3px_rgba(16,185,129,0.5)]';
        } else if (score >= 60) {
            strengthLabel.textContent = 'STRONG';
            strengthLabel.className = 'text-blue-500';
            strengthBar.className = 'h-full bg-blue-500 transition-all duration-500 shadow-[0_0_15px_-3px_rgba(59,130,246,0.5)]';
        } else if (score >= 30) {
            strengthLabel.textContent = 'FAIR';
            strengthLabel.className = 'text-amber-500';
            strengthBar.className = 'h-full bg-amber-500 transition-all duration-500 shadow-[0_0_15px_-3px_rgba(245,158,11,0.5)]';
        } else {
            strengthLabel.textContent = 'VULNERABLE';
            strengthLabel.className = 'text-rose-500';
            strengthBar.className = 'h-full bg-rose-500 transition-all duration-500 shadow-[0_0_15px_-3px_rgba(244,63,94,0.5)]';
        }
    }

    copyBtn.addEventListener('click', () => {
        const val = output.textContent;
        if (val === "Select Option" || val === "Initializing...") return;
        navigator.clipboard.writeText(val).then(() => {
            showToast('Secure key copied to clipboard');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = 'Copied! <i class="fa-solid fa-check ms-2"></i>';
            setTimeout(() => copyBtn.innerHTML = original, 2000);
        });
    });

    document.querySelectorAll('input[type="checkbox"]').forEach(c => c.addEventListener('change', generate));

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>