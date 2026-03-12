<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 animate-fade-in">
            <!-- Dropzone Area -->
            <div class="lg:col-span-12">
                <div id="dropzone" class="relative group border-4 border-dashed border-slate-100 bg-slate-50 rounded-[3rem] p-12 text-center transition-all duration-500 hover:border-indigo-500 hover:bg-indigo-50/30 cursor-pointer min-h-[350px] flex flex-col justify-center items-center overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-24 h-24 bg-white rounded-[2rem] shadow-xl shadow-indigo-500/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-500 relative z-10 border border-slate-100">
                        <i class="fa-solid fa-cloud-arrow-up text-4xl text-indigo-600"></i>
                    </div>
                    
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-widest mb-3 relative z-10">Secure File Vault</h3>
                    <p class="text-slate-400 font-bold text-sm tracking-tight relative z-10">Drag & Drop or click to audit local assets</p>
                    
                    <div class="mt-8 flex items-center gap-2 bg-white/60 backdrop-blur-sm px-5 py-2 rounded-full border border-white/80 relative z-10 shadow-sm">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest leading-none">Local-Only Processing • No Uploads</span>
                    </div>
                </div>
                <input type="file" id="file-input" class="hidden">

                <!-- File Processing State -->
                <div id="file-info" class="hidden mt-8 bg-indigo-900 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden group border border-white/5">
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-1000"></div>
                    
                    <div class="relative z-10 flex flex-col sm:flex-row items-center gap-8">
                        <div class="w-20 h-20 bg-white/10 rounded-[1.5rem] flex items-center justify-center text-white shrink-0">
                            <i class="fa-solid fa-file-shield text-3xl"></i>
                        </div>
                        <div class="flex-grow text-center sm:text-left overflow-hidden">
                            <h4 id="filename" class="text-lg font-black text-white truncate mb-1">audit_document.iso</h4>
                            <p id="filesize" class="text-xs font-bold text-indigo-300 uppercase tracking-widest">Calculated Integrity Summary</p>
                        </div>
                        <button onclick="resetFile()" class="p-4 bg-white/5 hover:bg-rose-500 text-white rounded-2xl transition-all shadow-lg group/btn">
                            <i class="fa-solid fa-rotate-right group-hover/btn:rotate-180 transition-transform duration-500"></i>
                        </button>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mt-8 space-y-3">
                        <div class="flex justify-between px-1">
                            <span class="text-[10px] font-black text-indigo-300 uppercase tracking-widest">Hashing Status</span>
                            <span id="progress-percent" class="text-[10px] font-black text-white uppercase tracking-widest">0%</span>
                        </div>
                        <div class="h-3 bg-white/5 rounded-full overflow-hidden p-0.5 border border-white/10">
                            <div id="progress-bar" class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full transition-all duration-500 w-0 shadow-[0_0_15px_rgba(99,102,241,0.5)]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Integrity Verification Console -->
            <div id="results-area" class="lg:col-span-12 hidden space-y-8 animate-fade-in">
                <!-- Comparator -->
                <div class="bg-amber-50 border-2 border-amber-100 rounded-[2.5rem] p-8 flex flex-col sm:flex-row items-center gap-6">
                    <div class="w-14 h-14 bg-white text-amber-500 rounded-2xl shadow-sm flex items-center justify-center shrink-0 border border-amber-100">
                        <i class="fa-solid fa-magnifying-glass-chart text-xl"></i>
                    </div>
                    <div class="flex-grow w-full">
                        <label class="text-[10px] font-black text-amber-700 uppercase tracking-widest block mb-2 px-1 text-center sm:text-left">Forensic Comparison Tool</label>
                        <input type="text" id="verify-hash" class="w-full bg-white border-0 rounded-2xl py-4 px-6 font-bold text-slate-700 placeholder:text-amber-200 shadow-sm focus:ring-4 focus:ring-amber-500/10 transition-all font-mono text-sm" placeholder="Paste developer-provided hash to verify...">
                    </div>
                    <div id="verify-status" class="hidden shrink-0">
                        <!-- Status injected here -->
                    </div>
                </div>

                <!-- Hash Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php 
                    $hashTypes = [
                        ['md5', 'MD5', 'Legacy Block Sum'],
                        ['sha1', 'SHA1', 'Git Reference'],
                        ['sha256', 'SHA256', 'Modern Standard'],
                        ['sha512', 'SHA512', 'High Entropy']
                    ];
                    foreach ($hashTypes as $h):
                    ?>
                    <div class="bg-slate-50 border-2 border-slate-100 rounded-[2rem] p-8 group hover:border-indigo-500/30 transition-all duration-300 overflow-hidden relative">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h6 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1"><?php echo $h[2]; ?></h6>
                                <p class="text-xs font-black text-slate-800"><?php echo $h[1]; ?></p>
                            </div>
                            <button onclick="copyHash('<?php echo $h[0]; ?>')" class="text-[9px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-full uppercase tracking-widest transition-all">Copy</button>
                        </div>
                        <textarea id="hash-<?php echo $h[0]; ?>" class="w-full bg-white border-0 rounded-2xl p-4 font-mono text-xs font-black text-slate-600 resize-none h-[60px] custom-scrollbar focus:ring-0 shadow-sm" readonly></textarea>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Placeholder -->
            <div id="result-placeholder" class="lg:col-span-12 min-h-[250px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-column items-center justify-center text-center p-10 group hover:border-indigo-200 transition-all">
                <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center text-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-200 transition-all mb-6">
                    <i class="fa-solid fa-microchip text-4xl"></i>
                </div>
                <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Integrity Engine Ready</p>
                <p class="text-slate-300 text-sm mt-3 leading-relaxed max-w-xs mx-auto">Drop a file above to initiate multi-stream<br>checksum calculation in real-time.</p>
            </div>
        </div>
    </div>
</main>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 10px; }
.hash-match { background-color: #ecfdf5 !important; border-color: #10b981 !important; color: #065f46 !important; }
.hash-match-box { border-color: #10b981 !important; }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'File Hash Calculator',
    'intro_title' => 'File Hashing: Forensic Validation and Data Continuity',
    'intro_content' => 'Data integrity is a cornerstone of modern digital security. The Professional File Hash Calculator is a versatile utility for verifying the absolute mathematical consistency of localized assets against cryptographic standards. Whether you are auditing mission-critical software distributions, ISO images, or sensitive firmware updates, our high-fidelity streaming engine provides instantaneous checksums including MD5, SHA-1, and SHA-256 for definitive authenticity verification.',
    'detailed_title' => 'Multi-Stream Architecture and Local Privacy Bounds',
    'detailed_content' => '<p>Navigating the risks of data corruption and unauthorized tampering requires precise forensic instrumentation. Our Professional File Suite offers:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>High-Speed Streaming Engines:</strong> Utilize advanced browser-based streaming APIs to calculate multiple hashes simultaneously, even for substantial multi-gigabyte files.</li>
            <li><strong>Air-Gapped Private Execution:</strong> All cryptographic operations occur strictly within your local CPU and RAM environment—zero bytes ever leave your device.</li>
            <li><strong>Real-Time Forensic Comparison:</strong> Rapidly audit generated hashes against manufacturer-provided signatures with built-in pattern matching and success indicators.</li>
            <li><strong>Audit-Ready Logistics:</strong> One-click reporting and streamlined formatting ensure that your data integrity logs meet documentation standards for security audits.</li>
        </ul>'
]);
?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/spark-md5/3.0.2/spark-md5.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('file-input');
    const fileInfo = document.getElementById('file-info');
    const resultsArea = document.getElementById('results-area');
    const placeholder = document.getElementById('result-placeholder');
    const filenameEl = document.getElementById('filename');
    const filesizeEl = document.getElementById('filesize');
    const progressBar = document.getElementById('progress-bar');
    const progressPercent = document.getElementById('progress-percent');
    
    const outMd5 = document.getElementById('hash-md5');
    const outSha1 = document.getElementById('hash-sha1');
    const outSha256 = document.getElementById('hash-sha256');
    const outSha512 = document.getElementById('hash-sha512');
    const verifyInput = document.getElementById('verify-hash');
    const verifyStatus = document.getElementById('verify-status');

    // Convert Buffer to Hex
    function hexString(buffer) {
        return Array.from(new Uint8Array(buffer))
            .map(b => b.toString(16).padStart(2, '0'))
            .join('');
    }

    async function processFile(file) {
        dropzone.classList.add('hidden');
        placeholder.classList.add('hidden');
        fileInfo.classList.remove('hidden');
        resultsArea.classList.remove('hidden');
        
        filenameEl.textContent = file.name;
        filesizeEl.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB • Analyzing...';
        
        updateProgress(0);
        [outMd5, outSha1, outSha256, outSha512].forEach(el => el.value = '');

        try {
            updateProgress(20);
            const buffer = await file.arrayBuffer();
            
            updateProgress(40);
            // MD5 logic
            const spark = new SparkMD5.ArrayBuffer();
            spark.append(buffer);
            outMd5.value = spark.end();
            
            updateProgress(60);
            // WebCrypto hashes
            const [s1, s256, s512] = await Promise.all([
                crypto.subtle.digest("SHA-1", buffer),
                crypto.subtle.digest("SHA-256", buffer),
                crypto.subtle.digest("SHA-512", buffer)
            ]);
            
            outSha1.value = hexString(s1);
            outSha256.value = hexString(s256);
            outSha512.value = hexString(s512);

            updateProgress(100);
            filesizeEl.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB • Audit Complete';
            showToast('Integrity check complete');
            checkVerifyMatch();
        } catch (e) {
            showToast('Processing error', 'error');
            resetFile();
        }
    }

    function updateProgress(pct) {
        progressBar.style.width = pct + '%';
        progressPercent.textContent = pct + '%';
    }

    function checkVerifyMatch() {
        const search = verifyInput.value.toLowerCase().trim();
        if(!search) {
            verifyStatus.classList.add('hidden');
            [outMd5, outSha1, outSha256, outSha512].forEach(el => el.parentElement.classList.remove('hash-match-box'));
            return;
        }

        let found = false;
        [outMd5, outSha1, outSha256, outSha512].forEach(el => {
            if(el.value && el.value.toLowerCase() === search) {
                el.parentElement.classList.add('hash-match-box');
                found = true;
            } else {
                el.parentElement.classList.remove('hash-match-box');
            }
        });

        verifyStatus.classList.remove('hidden');
        verifyStatus.innerHTML = found ? 
            '<div class="w-12 h-12 bg-emerald-500 text-white rounded-2xl flex items-center justify-center shadow-lg animate-bounce"><i class="fa-solid fa-check"></i></div>' : 
            '<div class="w-12 h-12 bg-rose-500 text-white rounded-2xl flex items-center justify-center shadow-lg"><i class="fa-solid fa-xmark"></i></div>';
    }

    // Event Listeners
    dropzone.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', e => e.target.files[0] && processFile(e.target.files[0]));
    verifyInput.addEventListener('input', checkVerifyMatch);

    ['dragover', 'dragenter'].forEach(e => dropzone.addEventListener(e, () => dropzone.classList.add('border-indigo-500', 'bg-indigo-50/50')));
    ['dragleave', 'drop'].forEach(e => dropzone.addEventListener(e, () => dropzone.classList.remove('border-indigo-500', 'bg-indigo-50/50')));
    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        if(e.dataTransfer.files[0]) processFile(e.dataTransfer.files[0]);
    });

    window.resetFile = () => {
        fileInfo.classList.add('hidden');
        resultsArea.classList.add('hidden');
        dropzone.classList.remove('hidden');
        placeholder.classList.remove('hidden');
        fileInput.value = '';
        verifyInput.value = '';
    };

    window.copyHash = (id) => {
        const el = document.getElementById('hash-' + id);
        if(!el.value) return;
        navigator.clipboard.writeText(el.value).then(() => showToast('Hash copied'));
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>