

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden">
        
        <div class="space-y-8 relative z-10">
            <div class="text-center group">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.6em] mb-4 group-hover:text-primary transition-colors">ＡＥＳＴＨＥＴＩＣ　ＶＩＢＥＳ</h3>
                <p class="text-[10px] text-gray-300 font-bold uppercase tracking-widest">Fullwidth Visual Transformer</p>
            </div>

            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Normal Text</div>
                <textarea id="input-text" class="w-full h-40 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-2xl font-medium resize-none shadow-inner text-center" placeholder="Type here..."></textarea>
            </div>

            <div class="relative group">
                <div id="output-text" class="w-full min-h-[160px] p-10 bg-gray-900 rounded-[2.5rem] text-pink-400 text-4xl leading-relaxed break-all flex items-center justify-center text-center font-bold tracking-[0.2em] shadow-2xl transition-all border-4 border-cyan-400/10 hover:border-cyan-400/30">
                    ＶＡＰＯＲＷＡＶＥ
                </div>
                <button id="copy-btn" class="absolute top-4 right-4 px-6 py-2 bg-white/5 text-white/50 hover:bg-white/10 hover:text-white text-[10px] font-black uppercase tracking-widest rounded-xl transition-all border border-white/5 backdrop-blur-sm">Copy Vibes</button>
            </div>
        </div>

        <!-- Aesthetic Background elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-pink-50 rounded-full blur-3xl opacity-20 -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-cyan-50 rounded-full blur-3xl opacity-20 -ml-32 -mb-32"></div>
    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');

    function vaporize() {
        const val = input.value || "VAPORWAVE";
        let res = "";
        for(let i=0; i<val.length; i++) {
            const code = val.charCodeAt(i);
            if(code >= 33 && code <= 126) {
                res += String.fromCharCode(code + 65248);
            } else if(code === 32) {
                res += String.fromCharCode(12288);
            } else {
                res += val[i];
            }
        }
        output.innerText = res;
    }

    input.addEventListener('input', vaporize);
    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





