

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Mode Toggle -->
        <div class="flex justify-center mb-10">
            <div class="inline-flex p-1.5 bg-slate-100 rounded-3xl shadow-inner border border-slate-200/50">
                <button id="mode-encode" class="px-8 py-3 bg-white text-emerald-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300">HTML Encode</button>
                <button id="mode-decode" class="px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300">HTML Decode</button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 animate-fade-in">
            <!-- Input Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="input-label" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Markup Payload</label>
                    <button id="clear-btn" class="text-[10px] font-black text-rose-500 hover:text-rose-600 uppercase tracking-widest transition-colors">Clear</button>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-tr from-emerald-500/20 to-teal-500/20 rounded-[2rem] blur opacity-0 group-focus-within:opacity-100 transition duration-500"></div>
                    <textarea id="input-data" class="relative w-full h-[400px] bg-slate-50 border-2 border-slate-100 rounded-[2rem] p-8 font-mono text-sm text-slate-700 placeholder:text-slate-300 focus:ring-0 focus:border-emerald-500 transition-all outline-none resize-none custom-scrollbar" placeholder="<div>Hello World</div>"></textarea>
                </div>
            </div>

            <!-- Output Column -->
            <div class="space-y-4">
                <div class="flex justify-between items-center px-2">
                    <label id="output-label" class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em]">Sanitized Result</label>
                    <button id="copy-btn" class="text-[10px] font-black text-emerald-600 bg-emerald-50 hover:bg-emerald-100 px-4 py-1.5 rounded-full uppercase tracking-widest transition-all">Copy Result</button>
                </div>
                <div class="bg-indigo-900 rounded-[2rem] p-8 shadow-2xl relative overflow-hidden group border border-white/5 h-[400px] flex flex-col">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-700"></div>
                    <textarea id="output-data" class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-sm font-black text-indigo-100 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-emerald-400 selection:text-white resize-none outline-none" readonly placeholder="Result..."></textarea>
                </div>
            </div>
        </div>

        <!-- Mode Indicator -->
        <div class="mt-10 bg-slate-50 border border-slate-100 rounded-3xl p-6 flex items-center gap-5">
            <div class="w-12 h-12 bg-white text-emerald-500 rounded-2xl flex items-center justify-center text-xl shadow-sm border border-slate-100">
                <i class="fa-solid fa-code"></i>
            </div>
            <div>
                <h4 class="text-[11px] font-black text-slate-900 uppercase tracking-widest mb-1">Standard Entity Logic</h4>
                <p id="mode-desc" class="text-xs text-slate-500 font-medium">Currently operating in <strong>HTML Entity Escaping Mode</strong> for safe viewport rendering.</p>
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
    'tool_name' => 'HTML Entity Encoder/Decoder',
    'intro_title' => 'HTML Entity Mapping: Securing Document Structural Integrity',
    'intro_content' => 'HTML entity encoding is the process of converting characters with special structural meaning into their corresponding entity references (e.g., converting "<" into "&lt;"). This mechanism is critical for preventing Cross-Site Scripting (XSS) vulnerabilities and ensuring that reserved characters are correctly rendered as literal text by modern browsers. Our Professional HTML Suite provides a precise, client-side utility for the instantaneous sanitization and recovery of markup payloads.',
    'detailed_title' => 'XSS Prevention and Markup Forensics',
    'detailed_content' => '<p>Maintaining the security and visual fidelity of your web content requires accurate character entity handling. Our Professional HTML utility offers a robust developer experience:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>Bi-Directional Schema Support:</strong> Instantly toggle between escaping raw markup for safe display and decoding complex entities back into their original structural format.</li>
            <li><strong>Comprehensive Character Mapping:</strong> Seamlessly handle named entities, numeric references, and specialized symbols across all HTML5 standards.</li>
            <li><strong>Real-Time Sanitization Feedback:</strong> View transformed results instantaneously as you provide your payload, streamlining multi-tier development workflows.</li>
            <li><strong>Local Sandbox Environment:</strong> All transformations occur strictly within your browser\'s secure memory, providing a confidential space for auditing sensitive HTML strings.</li>
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

    function htmlEncode(str) {
        return str.replace(/[&<>"']/g, function(m) {
            return {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            }[m];
        });
    }

    function htmlDecode(str) {
        const txt = document.createElement("textarea");
        txt.innerHTML = str;
        return txt.value;
    }

    function process() {
        const val = input.value;
        if(!val) { output.value = ''; return; }
        output.value = mode === 'encode' ? htmlEncode(val) : htmlDecode(val);
    }

    encBtn.addEventListener('click', () => {
        mode = 'encode';
        encBtn.className = "px-8 py-3 bg-white text-emerald-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        decBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Markup Payload";
        outputLabel.innerText = "Sanitized Result";
        modeDesc.innerHTML = "Currently operating in <strong>HTML Entity Escaping Mode</strong> for safe viewport rendering.";
        input.placeholder = "<div>Hello World</div>";
        process();
    });

    decBtn.addEventListener('click', () => {
        mode = 'decode';
        decBtn.className = "px-8 py-3 bg-white text-emerald-600 font-black uppercase tracking-widest text-[10px] rounded-2xl shadow-sm transition-all duration-300";
        encBtn.className = "px-8 py-3 text-slate-400 font-black uppercase tracking-widest text-[10px] rounded-2xl hover:text-slate-600 transition-all duration-300";
        inputLabel.innerText = "Encoded Entities";
        outputLabel.innerText = "Decoded Result";
        modeDesc.innerHTML = "Currently operating in <strong>HTML Entity Decoding Mode</strong> for structural recovery.";
        input.placeholder = "&lt;div&gt;Hello World&lt;/div&gt;";
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





