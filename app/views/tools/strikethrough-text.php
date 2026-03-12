<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative">
        
        <div class="space-y-8">
            <div class="relative group text-center">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] z-20">Strikethrough & Line Decor</div>
                <textarea id="input-text" class="w-full h-32 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-2xl font-medium resize-none shadow-inner text-center" placeholder="Type text to cross out..."></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary transition-all cursor-pointer relative overflow-hidden" onclick="copyThis(this)">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">Strikethrough</span>
                    <div id="output-strike" class="text-gray-900 text-xl break-all font-serif"></div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-clone text-primary/30"></i>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>

                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary transition-all cursor-pointer relative overflow-hidden" onclick="copyThis(this)">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">Tilde Strike</span>
                    <div id="output-tilde" class="text-gray-900 text-xl break-all font-serif"></div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-clone text-primary/30"></i>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>

                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary transition-all cursor-pointer relative overflow-hidden" onclick="copyThis(this)">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">Slash Strike</span>
                    <div id="output-slash" class="text-gray-900 text-xl break-all font-serif"></div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-clone text-primary/30"></i>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>

                <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl group hover:border-primary transition-all cursor-pointer relative overflow-hidden" onclick="copyThis(this)">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-2 group-hover:text-primary transition-colors">Double Strike</span>
                    <div id="output-double" class="text-gray-900 text-xl break-all font-serif"></div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <i class="fa-solid fa-clone text-primary/30"></i>
                    </div>
                    <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const strike = document.getElementById('output-strike');
    const tilde = document.getElementById('output-tilde');
    const slash = document.getElementById('output-slash');
    const double = document.getElementById('output-double');

    function apply() {
        const val = input.value || "Strikethrough";
        
        strike.innerText = val.split('').map(c => c + '\u0336').join('');
        tilde.innerText = val.split('').map(c => c + '\u0334').join('');
        slash.innerText = val.split('').map(c => c + '\u0337').join('');
        double.innerText = val.split('').map(c => c + '\u033F').join('');
    }

    input.addEventListener('input', apply);
    window.copyThis = (el) => {
        const txt = el.querySelector('div').innerText;
        navigator.clipboard.writeText(txt);
        const badge = el.querySelector('span');
        const old = badge.innerText;
        badge.innerText = 'Copied!';
        badge.classList.add('text-emerald-500');
        setTimeout(() => { badge.innerText = old; badge.classList.remove('text-emerald-500'); }, 1500);
    };

    apply();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
