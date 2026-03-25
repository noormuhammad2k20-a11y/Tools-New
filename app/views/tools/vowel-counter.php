

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Big Result Card -->
        <div class="bg-gray-50 border border-secondary/10 rounded-3xl p-8 mb-8 text-center">
            <div id="big-result" class="text-7xl font-black text-primary mb-2">0</div>
            <div class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Total Vowels</div>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-64 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your text here to count vowels..."></textarea>
            <div class="absolute bottom-4 right-4">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <!-- Density Bar -->
        <div class="grid grid-cols-5 gap-2 text-center mt-4">
            <?php foreach(['A','E','I','O','U'] as $v): ?>
            <div class="bg-gray-50 p-3 rounded-xl border border-gray-100">
                <div class="text-xs font-bold text-gray-400 mb-1"><?php echo $v; ?></div>
                <div id="v-<?php echo strtolower($v); ?>" class="text-xl font-bold text-gray-900">0</div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>


<!-- Content Area -->


<!-- Suggested Tools Strip -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const result = document.getElementById('big-result');
    const vowels = { a: 0, e: 0, i: 0, o: 0, u: 0 };

    function update() {
        const text = input.value.toLowerCase();
        let total = 0;
        
        ['a','e','i','o','u'].forEach(v => {
            const count = (text.match(new RegExp(v, 'g')) || []).length;
            document.getElementById('v-' + v).innerText = count.toLocaleString();
            total += count;
        });

        result.innerText = total.toLocaleString();
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; update(); input.focus();
    });
});
</script>





