

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Mode Toggle -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex p-1.5 bg-slate-100 rounded-3xl shadow-inner border border-slate-200/50">
                <button id="mode-encode" class="px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300">Encode</button>
                <button id="mode-decode" class="px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300">Decode</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 animate-fade-in">
            <!-- Input Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="input-label" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Source Content</label>
                    <button id="clear-btn" class="text-[10px] font-black text-rose-500 hover:text-rose-600 uppercase tracking-widest transition-colors">Clear</button>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-indigo-500/20 to-purple-500/20 rounded-[2rem] blur opacity-0 group-focus-within:opacity-100 transition duration-500"></div>
                    <textarea id="input-data" class="relative w-full h-[400px] bg-slate-50 border-2 border-slate-100 rounded-[2rem] p-8 font-mono text-sm text-slate-700 placeholder:text-slate-300 focus:ring-0 focus:border-indigo-500 transition-all outline-none resize-none custom-scrollbar" placeholder="Enter text to encode..."></textarea>
                </div>
            </div>

            <!-- Output Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="output-label" class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">Base64 Digest</label>
                    <button id="copy-btn" class="text-[10px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy Result</button>
                </div>
                <div class="bg-indigo-900 rounded-[2rem] p-8 shadow-2xl relative overflow-hidden group border border-white/5 h-[400px] flex flex-col">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-700"></div>
                    <div id="output-data" class="relative z-10 font-mono text-sm font-black text-indigo-200 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-indigo-400 selection:text-white h-full">
                        <!-- Result will be injected here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Mode Indicator -->
        <div class="mt-10 bg-slate-50 border border-slate-100 rounded-3xl p-6 flex items-center gap-5">
            <div class="w-12 h-12 bg-white text-indigo-500 rounded-2xl flex items-center justify-center text-xl shadow-sm border border-slate-100">
                <i class="fa-solid fa-repeat"></i>
            </div>
            <div>
                <h4 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-1">Structural Integrity Validation</h4>
                <p id="mode-desc" class="text-xs text-slate-500 font-medium">Currently operating in <strong>UTF-8 Encoding Mode</strong> for binary-safe transmission.</p>
            </div>
        </div>
    </div>


<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 10px; }
#output-data.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Base64 Encoder/Decoder',
    'intro_title' => 'Base64: Universal Data Translation for Modern Architectures',
    'intro_content' => 'Base64 encoding is a widely used binary-to-text translation scheme that represents complex data structures in a strictly ASCII string format. It is essential for embedding assets in high-performance CSS, transmitting data over text-centric protocols, and ensuring API payload compatibility. Our Professional Base64 utility provides a high-fidelity, client-side execution environment for instant bi-directional conversion with maximum privacy.',
    'detailed_title' => 'Bi-Directional Logistics and Security Transformation',
    'detailed_content' => '<p>Modern web infrastructure relies on Base64 for a variety of critical data transport and storage functions. Our utility offers a robust, developer-first experience:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>Seamless Toggle Logic:</strong> Effortlessly switch between encoding raw manifests and decoding specialized transport strings within a single, optimized interface.</li>
            <li><strong>Advanced UTF-8 Compliance:</strong> Our engine correctly handles multi-byte characters and internationalized symbols, preventing data corruption during transmission.</li>
            <li><strong>Zero-Latency Processing:</strong> Leverages asynchronous browser execution to provide real-time updates as you type, streamlining your developmental workflow.</li>
            <li><strong>Local Memory Isolation:</strong> All data transformations occur strictly within your browser\'s local stack, ensuring sensitive keys or private strings never traverse the network.</li>
        </ul>'
]);
?>

<!-- Suggested Tools Strip -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('output-data');
    const encBtn = document.getElementById('mode-encode');
    const decBtn = document.getElementById('mode-decode');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const modeDesc = document.getElementById('mode-desc');
    
    let mode = 'encode';

    function process() {
        const val = input.value;
        if(!val) { output.textContent = ''; return; }
        
        try {
            if(mode === 'encode') {
                output.textContent = btoa(unescape(encodeURIComponent(val)));
            } else {
                output.textContent = decodeURIComponent(escape(atob(val)));
            }
        } catch(e) {
            output.textContent = "Error: Invalid data format for the selected operation.";
        }
    }

    encBtn.addEventListener('click', () => {
        mode = 'encode';
        encBtn.className = "px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        decBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Source Content";
        outputLabel.innerText = "Base64 Digest";
        modeDesc.innerHTML = "Currently operating in <strong>UTF-8 Encoding Mode</strong> for binary-safe transmission.";
        input.placeholder = "Enter text to encode...";
        process();
    });

    decBtn.addEventListener('click', () => {
        mode = 'decode';
        decBtn.className = "px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        encBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Base64 Input";
        outputLabel.innerText = "Decoded Content";
        modeDesc.innerHTML = "Currently operating in <strong>Base64 Decoding Mode</strong> for binary recovery.";
        input.placeholder = "Enter Base64 string to decode...";
        process();
    });

    input.addEventListener('input', process);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.textContent = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => {
            showToast('Result copied to clipboard');
        });
    });
});
</script>





