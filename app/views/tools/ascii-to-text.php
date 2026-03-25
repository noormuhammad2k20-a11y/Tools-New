

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">ASCII Codes</label>
                <textarea id="input-ascii" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="72 101 108 108 111..."></textarea>
            </div>

            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Text Result</label>
                <textarea id="output-text" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-lg font-bold resize-none outline-none font-sans" readonly placeholder="Decoded text..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:bg-primary-hover transition-all">
                    Copy
                </button>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-ascii');
    const output = document.getElementById('output-text');

    input.addEventListener('input', () => {
        const val = input.value.trim();
        if(!val) { output.value = ''; return; }
        try {
            output.value = val.split(/\s+/).map(d => String.fromCharCode(parseInt(d))).join('');
        } catch(e) {
            output.value = "Invalid ASCII Sequence";
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





