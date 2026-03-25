

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste text here to convert to camelCase..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="copy-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-copy transition-transform group-hover:scale-110"></i>
                    <span>Copy</span>
                </button>
            </div>
        </div>

        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50 flex items-center gap-4">
            <div class="text-blue-500 text-2xl"><i class="fa-solid fa-code"></i></div>
            <p class="text-gray-500 text-sm italic">Example: "hello world" becomes "helloWorld". Ideal for variable naming in JavaScript and Java.</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');

    input.addEventListener('input', () => {
        const start = input.selectionStart;
        const end = input.selectionEnd;
        input.value = input.value.toLowerCase().replace(/[^a-zA-Z0-9]+(.)/g, (m, chr) => chr.toUpperCase());
        input.setSelectionRange(start, end);
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        if(!input.value) return;
        input.select();
        document.execCommand('copy');
        const btnText = document.querySelector('#copy-btn span');
        const original = btnText.innerText;
        btnText.innerText = 'Copied!';
        setTimeout(() => btnText.innerText = original, 2000);
    });
});
</script>





