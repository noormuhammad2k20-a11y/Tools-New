<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8 animate-fade-in">
            <!-- Input Area -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-1">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block font-sans">Multi-Hash Data Payload</label>
                    <button id="clear-btn" class="text-xs font-bold text-slate-400 hover:text-rose-500 uppercase tracking-widest transition-colors flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Clear
                    </button>
                </div>
                <textarea id="hash-input" class="w-full px-8 py-6 bg-gray-50 border border-gray-200 rounded-[2rem] focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[160px] shadow-inner font-medium text-slate-700" placeholder="Enter text or string to analyze across multiple cryptographic algorithms simultaneously..."></textarea>
            </div>

            <!-- Dashboard Grid -->
            <div id="results-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-slate-50">
                <?php 
                $algos = [
                    ['md5', 'MD5 Signature', 'Legacy Compliance', 'bg-rose-50 text-rose-600', 'bg-slate-900 text-rose-400'],
                    ['sha1', 'SHA1 Digest', 'Distribution Standard', 'bg-amber-50 text-amber-600', 'bg-slate-900 text-amber-400'],
                    ['sha256', 'SHA-256 Digest', 'Modern Integrity', 'bg-emerald-50 text-emerald-600', 'bg-slate-900 text-emerald-400'],
                    ['sha512', 'SHA-512 Digest', 'Ultra-High Entropy', 'bg-indigo-50 text-indigo-600', 'bg-slate-900 text-indigo-100']
                ];
                foreach ($algos as $a):
                ?>
                <div class="bg-slate-50 rounded-[2rem] p-6 border border-slate-100 group hover:border-primary/20 transition-all hover:bg-white hover:shadow-xl hover:shadow-primary/5">
                    <div class="flex justify-between items-center mb-4 px-1">
                        <div>
                            <span class="px-2 py-0.5 <?php echo $a[3]; ?> text-[8px] font-black rounded-full uppercase tracking-tighter shadow-sm mb-1 inline-block"><?php echo $a[2]; ?></span>
                            <h4 class="text-[11px] font-bold text-slate-900 uppercase tracking-wider"><?php echo $a[1]; ?></h4>
                        </div>
                        <button onclick="copyHash('<?php echo $a[0]; ?>')" id="copy-btn-<?php echo $a[0]; ?>" class="w-8 h-8 rounded-xl bg-white border border-slate-200 text-slate-400 hover:text-primary hover:border-primary/20 transition-all flex items-center justify-center">
                            <i class="fa-solid fa-copy text-xs"></i>
                        </button>
                    </div>
                    
                    <div class="<?php echo $a[4]; ?> rounded-2xl p-4 min-h-[50px] flex items-center shadow-inner overflow-hidden border border-black/5">
                        <div id="out-<?php echo $a[0]; ?>" class="font-mono text-[10px] sm:text-[11px] font-bold break-all leading-tight opacity-90 tracking-tight">
                            <!-- Hash result injected here -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State -->
            <div id="empty-state" class="hidden min-h-[200px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-col items-center justify-center text-center p-10 group hover:border-primary/20 transition-all">
                <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-200 group-hover:bg-primary/5 group-hover:text-primary/30 transition-all mb-4">
                    <i class="fa-solid fa-layer-group text-3xl"></i>
                </div>
                <p class="text-slate-400 font-bold uppercase tracking-widest text-[9px]">Universal Hashing Console Ready</p>
                <p class="text-slate-300 text-xs mt-2 leading-relaxed max-w-xs mx-auto">Analyze your payload against multiple cryptographic models in real-time.</p>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Universal Hash Generator',
    'intro_title' => 'Universal Hashing: The Professional Cryptographic Workflow Hub',
    'intro_content' => 'The Universal Hash Generator is an advanced multi-engine workbench designed for rapid data fingerprinting and forensic integrity auditing. Instead of switching between specialized tools, security architects and developers can analyze a single payload against four industry-leading algorithms simultaneously: MD5, SHA-1, SHA-256, and SHA-512. Our unified interface provides a comparative view of mathematical digests, ensuring you always select the optimal integrity model for your specific infrastructure requirements.',
    'detailed_title' => 'Consolidated Visibility and 100% Client-Side Integrity',
    'detailed_content' => '<p>Managing multiple cryptographic signatures requires precision and efficiency. Our Professional Universal Suite offers a streamlined workspace without compromising security:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Parallel Engine Architecture:</strong> Experience instantaneous updates across legacy and modern algorithms as you input your data payload.</li>
            <li><strong>Digital Forensic Auditing:</strong> Effortlessly compare checksums to verify software authenticity, audit data transformations, or identify hashing inconsistencies in distributed systems.</li>
            <li><strong>Legacy & Modern Diversity:</strong> Bridge the gap between older MD5/SHA-1 environments and modern high-entropy SHA-2 standards within a single, secure interface.</li>
            <li><strong>Absolute Local Privacy:</strong> Like all our security utilities, every calculation is performed locally in your browser. Your sensitive strings, PII, or internal tokens never traverse the internet.</li>
        </ul>'
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('hash-input');
    const clearBtn = document.getElementById('clear-btn');
    const grid = document.getElementById('results-grid');
    const emptyState = document.getElementById('empty-state');
    
    const outputs = {
        md5: document.getElementById('out-md5'),
        sha1: document.getElementById('out-sha1'),
        sha256: document.getElementById('out-sha256'),
        sha512: document.getElementById('out-sha512')
    };

    input.addEventListener('input', () => {
        const val = input.value.trim();
        if (!val) {
            renderEmpty();
            return;
        }

        try {
            outputs.md5.textContent = CryptoJS.MD5(val).toString();
            outputs.sha1.textContent = CryptoJS.SHA1(val).toString();
            outputs.sha256.textContent = CryptoJS.SHA256(val).toString();
            outputs.sha512.textContent = CryptoJS.SHA512(val).toString();
        } catch (e) {
            console.error('Hashing engine failure', e);
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        renderEmpty();
        input.focus();
    });

    function renderEmpty() {
        Object.values(outputs).forEach(el => el.textContent = '');
    }

    window.copyHash = (algo) => {
        const text = document.getElementById(`out-${algo}`).textContent;
        const btn = document.getElementById(`copy-btn-${algo}`);
        if (!text) return;
        
        navigator.clipboard.writeText(text).then(() => {
            showToast(`${algo.toUpperCase()} signature copied`);
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-check text-primary"></i>';
            setTimeout(() => btn.innerHTML = original, 2000);
        });
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>