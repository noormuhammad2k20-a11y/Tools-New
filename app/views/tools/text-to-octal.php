

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">Text Input</label>
                <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm placeholder-gray-400 resize-none outline-none font-mono" placeholder="Type text here..."></textarea>
            </div>

            <div class="relative">
                <label class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">Octal Output</label>
                <textarea id="output-octal" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm resize-none outline-none font-mono" readonly placeholder="110 145 154 154 157..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:bg-primary-hover transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="bg-indigo-50/50 p-4 rounded-xl border border-indigo-100 text-center">
            <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-[0.2em]">Base-8 Numeric Translation</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-octal');

    input.addEventListener('input', () => {
        const text = input.value;
        if(!text) { output.value = ''; return; }
        output.value = text.split('').map(c => c.charCodeAt(0).toString(8).padStart(3, '0')).join(' ');
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





