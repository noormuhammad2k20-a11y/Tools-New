

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Card -->
        <div class="bg-gray-50 border border-secondary/10 rounded-3xl p-8 mb-8 text-center transition-all duration-300 group hover:bg-gray-100/50">
            <div id="big-result" class="text-7xl font-black text-primary mb-2 transition-transform duration-300 group-hover:scale-110">0</div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Total Consonants</div>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-64 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your text here to count consonants..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 border-dashed text-center">
            <p class="text-gray-500 text-sm italic">Consonants are all letters of the alphabet except A, E, I, O, U.</p>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const result = document.getElementById('big-result');

    function update() {
        const text = input.value;
        const count = (text.match(/[bcdfghjklmnpqrstvwxyz]/gi) || []).length;
        result.innerText = count.toLocaleString();
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>





