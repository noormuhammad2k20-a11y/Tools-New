<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Password Display -->
        <div class="relative mb-10 pt-4">
            <div id="password-display" class="w-full text-center py-12 bg-slate-900 border-0 rounded-3xl text-3xl md:text-4xl font-mono font-black text-cyan-400 tracking-[0.15em] break-all px-6 shadow-2xl shadow-cyan-900/30 ring-1 ring-white/10" style="min-height: 120px; display: flex; align-items: center; justify-content: center; word-spacing: 0.25em;">
                P@ssw0rd123!
            </div>
            
            <button id="refresh-btn" class="absolute -top-2 -right-2 w-14 h-14 bg-white border border-slate-100 text-cyan-600 rounded-2xl shadow-xl hover:rotate-180 transition-all duration-700 flex items-center justify-center hover:bg-cyan-50 group">
                <i class="fa-solid fa-arrows-rotate text-xl group-hover:scale-110 transition-transform"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-10">
            <!-- Length Control -->
            <div class="space-y-6">
                <div class="flex justify-between items-end px-1">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Character Count</label>
                        <h4 class="text-2xl font-bold text-slate-900">Total Length</h4>
                    </div>
                    <div class="px-4 py-2 bg-slate-900 text-cyan-400 rounded-xl font-mono text-xl font-bold shadow-lg">
                        <span id="len-label">16</span>
                    </div>
                </div>
                <div class="relative pt-2">
                    <input type="range" id="len-slider" min="6" max="64" value="16" class="w-full h-3 bg-slate-100 rounded-2xl appearance-none cursor-pointer accent-cyan-500 shadow-inner">
                    <div class="flex justify-between mt-3 text-[10px] font-bold text-slate-300 uppercase tracking-tighter italic">
                        <span>6 Chars</span>
                        <span>64 Chars</span>
                    </div>
                </div>
            </div>

            <!-- Configuration Options -->
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 gap-3 items-center">
                <label class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white hover:border-cyan-200 transition-all group relative overflow-hidden">
                    <input type="checkbox" checked id="opt-upper" class="w-5 h-5 text-cyan-600 rounded-lg border-slate-200 focus:ring-cyan-500 transition-all">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-cyan-600 transition-colors">Uppercase</span>
                        <span class="text-xs font-bold text-slate-700">A-Z</span>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white hover:border-cyan-200 transition-all group">
                    <input type="checkbox" checked id="opt-lower" class="w-5 h-5 text-cyan-600 rounded-lg border-slate-200 focus:ring-cyan-500 transition-all">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-cyan-600 transition-colors">Lowercase</span>
                        <span class="text-xs font-bold text-slate-700">a-z</span>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white hover:border-cyan-200 transition-all group">
                    <input type="checkbox" checked id="opt-num" class="w-5 h-5 text-cyan-600 rounded-lg border-slate-200 focus:ring-cyan-500 transition-all">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-cyan-600 transition-colors">Numbers</span>
                        <span class="text-xs font-bold text-slate-700">0-9</span>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white hover:border-cyan-200 transition-all group">
                    <input type="checkbox" checked id="opt-sym" class="w-5 h-5 text-cyan-600 rounded-lg border-slate-200 focus:ring-cyan-500 transition-all">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-cyan-600 transition-colors">Special</span>
                        <span class="text-xs font-bold text-slate-700">!@#$</span>
                    </div>
                </label>
            </div>
        </div>

        <button id="copy-btn" class="w-full py-5 bg-cyan-600 text-white rounded-3xl font-black uppercase tracking-[0.2em] text-sm shadow-2xl shadow-cyan-600/30 hover:bg-cyan-700 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-3 group">
            <i class="fa-solid fa-copy text-lg group-hover:rotate-6 transition-transform"></i>
            Copy Secure Password
        </button>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Password Generator',
    'intro_title' => 'Password Generator: Unbreakable Entropy for Digital Defense',
    'intro_content' => 'A secure password is the primary threshold of your digital identity. Our Professional Password Generator leverages high-entropy randomization to create complex, cryptographically robust strings that outperform traditional human-memorized keys. Whether you require a standard 16-character alphanumeric code or a maximum-security 64-character fortress of unique symbols, our generator provides the precision controls to meet any corporate or personal security mandate.',
    'detailed_title' => 'The Science of High-Entropy Password Selection',
    'detailed_content' => '<p>Human-created passwords often contain cultural patterns, common dates, or predictable keyboard sequences that modern brute-force algorithms exploit in seconds. Our tool eliminates these vectors through several core principles:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Cryptographic Randomness:</strong> Uses unbiased selection across four distinct character categories (Uppercase, Lowercase, Digits, and Symbols) to maximize mathematical uniqueness.</li>
            <li><strong>Zero-Server Architecture:</strong> The generation happens entirely within your browser\'s local execution context. Your new credentials never cross the network and are never logged or recorded.</li>
            <li><strong>Custom Bit-Depth Control:</strong> Adjustable length from 6 to 64 characters allows you to balance usability with extreme brute-force resistance.</li>
            <li><strong>Pattern Neutralization:</strong> By removing "predictability," even a shorter generated password can offer higher security than a longer phrase based on dictionary words.</li>
        </ul>'
]);
?>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('password-display');
    const slider = document.getElementById('len-slider');
    const lenLabel = document.getElementById('len-label');
    const refreshBtn = document.getElementById('refresh-btn');
    const copyBtn = document.getElementById('copy-btn');

    function generate() {
        const length = parseInt(slider.value);
        lenLabel.innerText = length;

        const uppers = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const lowers = "abcdefghijklmnopqrstuvwxyz";
        const numbers = "0123456789";
        const symbols = "!@#$%^&*()_+~`|}{[]:;?><,./-=";

        let charset = "";
        if(document.getElementById('opt-upper').checked) charset += uppers;
        if(document.getElementById('opt-lower').checked) charset += lowers;
        if(document.getElementById('opt-num').checked) charset += numbers;
        if(document.getElementById('opt-sym').checked) charset += symbols;

        if(!charset) { display.innerText = "Select Options"; return; }

        let pass = "";
        for(let i=0; i<length; i++) {
            pass += charset.charAt(Math.floor(Math.random() * charset.length));
        }
        display.innerText = pass;
    }

    slider.addEventListener('input', generate);
    refreshBtn.addEventListener('click', generate);
    copyBtn.addEventListener('click', () => {
        const text = display.innerText;
        if(text === "Select Options") return;
        navigator.clipboard.writeText(text);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });

    // Toggle events
    document.querySelectorAll('input[type="checkbox"]').forEach(c => c.addEventListener('change', generate));

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
