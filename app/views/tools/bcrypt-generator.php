<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8">
            <!-- Input Area -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-3 space-y-4">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Cleartext Password</label>
                    </div>
                    <div class="relative group">
                        <input type="password" id="input-password" class="w-full px-6 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base shadow-inner font-mono tracking-widest" placeholder="Enter password to hash...">
                        <button id="toggle-password" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500 transition-colors">
                            <i class="fa-solid fa-eye text-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Cost Factor</label>
                    </div>
                    <select id="cost-factor" class="w-full px-4 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-sm font-bold text-slate-600 appearance-none cursor-pointer">
                        <?php for($i=4; $i<=15; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo $i == 10 ? 'selected' : ''; ?>>Complexity: <?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-3xl font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-lock text-lg"></i>
                Generate Secure Bcrypt Hash
            </button>

            <!-- Result Wrapper -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-6 pt-6 border-t border-gray-100">
                <div class="space-y-3">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Bcrypt Hash Signature</label>
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black rounded-full uppercase tracking-widest shadow-sm border border-emerald-100/50">Adaptive Blowfish Core</span>
                    </div>
                    <div class="relative group">
                        <textarea id="bcrypt-output" readonly class="w-full px-8 py-10 bg-slate-900 border-0 rounded-3xl text-emerald-400 font-mono text-lg md:text-xl text-center break-all shadow-2xl shadow-emerald-900/20 leading-relaxed"></textarea>
                        <button id="copy-btn" class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-xl flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm shadow-xl">
                            <i class="fa-solid fa-copy text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100 flex items-center gap-5 group hover:border-emerald-200 transition-all">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all transform group-hover:rotate-6">
                            <i class="fa-solid fa-fingerprint text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Auto-Salting</h4>
                            <p class="text-[11px] font-medium text-slate-600 leading-tight">Every hash includes a unique 128-bit salt to prevent rainbow table attacks.</p>
                        </div>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100 flex items-center gap-5 group hover:border-emerald-200 transition-all">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all transform group-hover:-rotate-6">
                            <i class="fa-solid fa-clock-rotate-left text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Time Analysis</h4>
                            <p id="compute-time" class="text-[11px] font-black text-slate-900 uppercase">Computed in <span id="ms-value">0</span>ms</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Bcrypt Hash Generator',
    'intro_title' => 'Bcrypt: The Golden Standard of Modern Password Security',
    'intro_content' => 'Bcrypt is a highly secure password hashing function based on the Blowfish block cipher. Specifically engineered to be computationally expensive, it protects against high-speed brute-force attacks by introducing a configurable "cost factor." This adaptive nature ensures that as hardware becomes faster, developers can simply increase the complexity to maintain a robust defensive perimeter for user credentials.',
    'detailed_title' => 'Adaptive Security and Salting Architecture',
    'detailed_content' => '<p>Unlike traditional fast hashes (like MD5 or SHA-256), Bcrypt provides a layered defense mechanism that is fundamental to secure authentication systems:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Intelligent Cost Scaling:</strong> Double the computation effort by increasing the cost factor, effectively slowing down attackers while maintaining seamless user logins.</li>
            <li><strong>Embedded Salt:</strong> Every Bcrypt signature contains its own 128-bit random salt, ensuring that identical passwords never result in the same hash string.</li>
            <li><strong>Brute-Force Resistance:</strong> Designed to be expensive on both CPUs and GPUs, significantly increasing the resource cost for any unauthorized cracking attempt.</li>
            <li><strong>100% Client-Side Privacy:</strong> All hashing is processed locally within your browser\'s memory. Your raw passwords never leave your device, ensuring maximum confidentiality.</li>
        </ul>'
]);
?>

<script src="https://cdn.jsdelivr.net/npm/bcryptjs@2.4.3/dist/bcrypt.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-password');
    const cost = document.getElementById('cost-factor');
    const genBtn = document.getElementById('generate-btn');
    const wrapper = document.getElementById('result-wrapper');
    const outputHash = document.getElementById('bcrypt-output');
    const msValue = document.getElementById('ms-value');
    const togglePass = document.getElementById('toggle-password');
    const copyBtn = document.getElementById('copy-btn');

    togglePass.addEventListener('click', () => {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        togglePass.querySelector('i').classList.toggle('fa-eye');
        togglePass.querySelector('i').classList.toggle('fa-eye-slash');
    });

    async function generate() {
        const val = input.value;
        if(!val) {
            showToast('Enter a password first', 'error');
            return;
        }

        const saltRounds = parseInt(cost.value);
        
        genBtn.disabled = true;
        genBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-lg"></i> Computing Secure Hash...';
        
        // Let UI re-render
        await new Promise(r => setTimeout(r, 50));

        const start = performance.now();
        try {
            // Using dcodeIO.bcrypt from the CDN
            const salt = dcodeIO.bcrypt.genSaltSync(saltRounds);
            const hash = dcodeIO.bcrypt.hashSync(val, salt);
            
            const end = performance.now();
            msValue.textContent = Math.round(end - start);
            
            outputHash.value = hash;
            wrapper.classList.remove('hidden');
            showToast('Bcrypt Hash Generated');
        } catch(e) {
            showToast('Hashing failed', 'error');
            console.error(e);
        } finally {
            genBtn.disabled = false;
            genBtn.innerHTML = '<i class="fa-solid fa-lock text-lg"></i> Generate Secure Bcrypt Hash';
        }
    }

    genBtn.addEventListener('click', generate);

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(outputHash.value).then(() => {
            showToast('Signature Copied');
            const original = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i>';
            setTimeout(() => copyBtn.innerHTML = original, 2000);
        });
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>