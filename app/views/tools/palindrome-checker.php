

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Indicator -->
        <div id="res-container" class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl p-10 mb-8 text-center transition-all duration-500">
            <div id="res-icon" class="text-6xl mb-4 text-gray-300">
                <i class="fa-solid fa-arrows-left-right"></i>
            </div>
            <div id="res-text" class="text-4xl font-black text-gray-400 uppercase tracking-tighter">Enter Text</div>
            <p id="res-detail" class="mt-2 text-gray-400 italic font-medium">Waiting for your input...</p>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-48 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-2xl font-bold text-center placeholder-gray-300 resize-none outline-none uppercase tracking-widest" placeholder="TYPE HERE..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100/50">
            <h4 class="font-bold text-gray-900 mb-2 flex items-center gap-2 text-sm uppercase">Pro Tip</h4>
            <p class="text-sm text-gray-600 leading-relaxed italic">A palindrome reads the same forwards and backwards. We automatically ignore spaces and punctuation for accurate detection!</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const container = document.getElementById('res-container');
    const icon = document.getElementById('res-icon');
    const text = document.getElementById('res-text');
    const detail = document.getElementById('res-detail');

    function update() {
        const raw = input.value;
        const clean = raw.toLowerCase().replace(/[^a-z0-9]/g, '');
        
        if(!clean) {
            container.className = "bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl p-10 mb-8 text-center transition-all duration-500";
            icon.innerHTML = '<i class="fa-solid fa-arrows-left-right"></i>';
            icon.className = "text-6xl mb-4 text-gray-300";
            text.innerText = "Enter Text";
            text.className = "text-4xl font-black text-gray-400 uppercase tracking-tighter";
            detail.innerText = "Waiting for your input...";
            return;
        }

        const reversed = clean.split('').reverse().join('');
        const isPal = clean === reversed;

        if(isPal) {
            container.className = "bg-green-50 border-2 border-green-500 rounded-3xl p-10 mb-8 text-center transition-all duration-500 shadow-lg shadow-green-100";
            icon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
            icon.className = "text-6xl mb-4 text-green-500 animate-bounce";
            text.innerText = "It's a Palindrome!";
            text.className = "text-4xl font-black text-green-600 uppercase tracking-tighter";
            detail.innerText = `"${raw}" reads perfectly both ways.`;
        } else {
            container.className = "bg-red-50 border-2 border-red-100 rounded-3xl p-10 mb-8 text-center transition-all duration-500";
            icon.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
            icon.className = "text-6xl mb-4 text-red-300";
            text.innerText = "Not a Palindrome";
            text.className = "text-4xl font-black text-red-400 uppercase tracking-tighter";
            detail.innerText = "The forward and backward spelling don't match.";
        }
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>





