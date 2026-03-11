<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8">
            <textarea id="input-text" class="w-full h-40 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-xl font-medium resize-none outline-none" placeholder="Type text to translate into emojis..."></textarea>
        </div>

        <div class="relative group mb-8">
            <div id="output-text" class="w-full min-h-[160px] p-8 bg-blue-50/10 border border-blue-100 rounded-3xl text-gray-900 text-2xl leading-relaxed break-all flex items-center justify-center text-center font-bold">
                Output will appear here...
            </div>
            <button id="copy-btn" class="absolute top-4 right-4 px-4 py-2 bg-primary text-white text-[10px] font-black uppercase rounded-lg shadow-lg hover:shadow-primary/20 transition-all">Copy Emojis</button>
        </div>

        <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Supported Samples</h4>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">pizza</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">love</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">happy</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">car</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">rocket</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">coffee</span>
                <span class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] text-gray-500">fire</span>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');

    const emojiDict = {
        'pizza': '🍕', 'love': '❤️', 'happy': '😊', 'car': '🚗', 'rocket': '🚀', 'coffee': '☕', 'fire': '🔥',
        'dog': '🐶', 'cat': '🐱', 'sun': '☀️', 'moon': '🌙', 'star': '⭐', 'money': '💰', 'gift': '🎁',
        'food': '🍴', 'water': '💧', 'computer': '💻', 'phone': '📱', 'music': '🎵', 'book': '📖'
    };

    function translate() {
        const val = input.value.toLowerCase();
        if(!val) { output.innerText = "Output will appear here..."; return; }
        
        let words = val.split(/(\s+)/);
        let res = words.map(w => {
            const clean = w.replace(/[^\w]/g, '');
            return emojiDict[clean] ? w.replace(clean, emojiDict[clean]) : w;
        }).join('');
        
        output.innerText = res;
    }

    input.addEventListener('input', translate);
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
