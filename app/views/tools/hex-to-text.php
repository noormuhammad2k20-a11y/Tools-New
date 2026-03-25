

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">Hex Input</label>
                <textarea id="input-hex" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="48 65 6C 6C 6F..."></textarea>
            </div>

            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Text Result</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-indigo-50/10 border border-indigo-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none" readonly placeholder="English text..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:bg-primary-hover transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 border-dashed text-center">
            <p class="text-xs text-gray-500 italic leading-relaxed">This tool supports hex strings with or without spaces, commas, or 0x prefixes. We automatically clean the input for flawless decoding.</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-hex');
    const output = document.getElementById('output-text');

    input.addEventListener('input', () => {
        let hex = input.value.trim().replace(/0x/g, '').replace(/[\s,]/g, '');
        if(!hex) { output.value = ''; return; }
        
        try {
            let res = '';
            for (let i = 0; i < hex.length; i += 2) {
                res += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
            }
            output.value = res;
        } catch(e) {
            output.value = "Invalid Hex Sequence";
        }
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerText;
        document.getElementById('copy-btn').innerText = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerText = original, 2000);
    });
});
</script>





