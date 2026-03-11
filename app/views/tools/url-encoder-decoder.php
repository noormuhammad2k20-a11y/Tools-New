<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Mode Toggle -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex p-1.5 bg-slate-100 rounded-3xl shadow-inner border border-slate-200/50">
                <button id="mode-encode" class="px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300">URL Encode</button>
                <button id="mode-decode" class="px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300">URL Decode</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 animate-fade-in">
            <!-- Input Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="input-label" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Plain URL / Text</label>
                    <button id="clear-btn" class="text-[10px] font-black text-rose-500 hover:text-rose-600 uppercase tracking-widest transition-colors">Clear</button>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-indigo-500/20 to-purple-500/20 rounded-[2rem] blur opacity-0 group-focus-within:opacity-100 transition duration-500"></div>
                    <textarea id="input-data" class="relative w-full h-[400px] bg-slate-50 border-2 border-slate-100 rounded-[2rem] p-8 font-mono text-sm text-slate-700 placeholder:text-slate-300 focus:ring-0 focus:border-indigo-500 transition-all outline-none resize-none custom-scrollbar" placeholder="https://example.com/search?q=test..."></textarea>
                </div>
            </div>

            <!-- Output Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="output-label" class="text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">Encoded Result</label>
                    <button id="copy-btn" class="text-[10px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy Result</button>
                </div>
                <div class="bg-indigo-900 rounded-[2rem] p-8 shadow-2xl relative overflow-hidden group border border-white/5 h-[400px] flex flex-col">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-700"></div>
                    <textarea id="output-data" class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-sm font-black text-indigo-200 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-indigo-400 selection:text-white resize-none outline-none" readonly placeholder="Result..."></textarea>
                </div>
            </div>
        </div>

        <!-- Mode Indicator -->
        <div class="mt-10 bg-slate-50 border border-slate-100 rounded-3xl p-6 flex items-center gap-5">
            <div class="w-12 h-12 bg-white text-indigo-500 rounded-2xl flex items-center justify-center text-xl shadow-sm border border-slate-100">
                <i class="fa-solid fa-link"></i>
            </div>
            <div>
                <h4 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-1">URI Standard Protocol</h4>
                <p id="mode-desc" class="text-xs text-slate-500 font-medium">Currently operating in <strong>Percent-Encoding Mode</strong> for safe URI transport.</p>
            </div>
        </div>
    </div>
</main>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 10px; }
#output-data.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'URL Encoder/Decoder',
    'intro_title' => 'URL Encoding: Precision Formatting for Global Web Traffic',
    'intro_content' => 'URL encoding, also known as percent-encoding, is a mechanism for translating complex information into a format suitable for transmission in a Uniform Resource Identifier (URI). By replacing unsafe characters with standardized "%" hex sequences, it ensures that your query parameters and path segments are correctly interpreted by all web servers and proxies. Our Professional URL utility provides a high-fidelity, client-side execution environment for instant bi-directional conversion.',
    'detailed_title' => 'RFC 3986 Standards and URI Structural Integrity',
    'detailed_content' => '<p>Ensuring the reliability of your web requests requires strict adherence to URI character standards. Our tool provides a robust, developer-first experience:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>Percent-Encoding Logic:</strong> Transform reserved characters into valid URI components while preserving the path and query structure.</li>
            <li><strong>Bi-Directional Recover:</strong> Effortlessly decode percent-encoded strings back into their original human-readable format for auditing and log analysis.</li>
            <li><strong>Real-Time Path Synthesis:</strong> Receive instantaneous updates as you type, providing immediate visual feedback for complex AJAX or API endpoint structures.</li>
            <li><strong>Privacy-First Execution:</strong> All character mapping occurs within your browser\'s local stack, ensuring sensitive tokens or private endpoints never traverse the wire.</li>
        </ul>'
]);
?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

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
        if(!val) { output.value = ''; return; }
        
        try {
            output.value = mode === 'encode' ? encodeURIComponent(val) : decodeURIComponent(val.replace(/\+/g, ' '));
        } catch(e) {
            output.value = "Error: Invalid URL encoding detected.";
        }
    }

    encBtn.addEventListener('click', () => {
        mode = 'encode';
        encBtn.className = "px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        decBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Plain URL / Text";
        outputLabel.innerText = "Encoded Result";
        modeDesc.innerHTML = "Currently operating in <strong>Percent-Encoding Mode</strong> for safe URI transport.";
        input.placeholder = "https://example.com/search?q=test...";
        process();
    });

    decBtn.addEventListener('click', () => {
        mode = 'decode';
        decBtn.className = "px-8 py-3 bg-white text-indigo-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        encBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Encoded URL";
        outputLabel.innerText = "Decoded Result";
        modeDesc.innerHTML = "Currently operating in <strong>URL Decoding Mode</strong> for human-readable recovery.";
        input.placeholder = "https%3A%2F%2Fexample.com...";
        process();
    });

    input.addEventListener('input', process);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.value).then(() => {
            showToast('Result copied to clipboard');
        });
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>