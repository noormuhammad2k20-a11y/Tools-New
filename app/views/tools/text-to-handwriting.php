<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Great+Vibes&family=Indie+Flower&family=Shadows+Into+Light&display=swap" rel="stylesheet">

<!-- Tool Interface -->
<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Canvas/Preview -->
            <div class="lg:col-span-8 space-y-6">
                <div class="flex items-center justify-between px-4">
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">Paper Preview</h3>
                    <div class="flex gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400/20"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400/20"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400/20"></div>
                    </div>
                </div>

                <div id="paper-container" class="w-full aspect-[4/3] bg-[#fffcf5] border border-[#e5e1d8] rounded-3xl shadow-2xl relative overflow-hidden group">
                    <!-- Paper Texture -->
                    <div class="absolute inset-0 opacity-40 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/parchment.png');"></div>
                    
                    <!-- Red Margin Line -->
                    <div class="absolute left-16 top-0 bottom-0 w-[2px] bg-red-200/50"></div>
                    
                    <!-- Horizontal Lines -->
                    <div class="absolute inset-0 pointer-events-none opacity-10" style="background-image: linear-gradient(#57534e 1px, transparent 1px); background-size: 100% 2rem; background-position: 0 1rem;"></div>
                    
                    <div id="handwriting-preview" class="relative z-10 p-12 pl-24 text-3xl leading-[2rem] break-words whitespace-pre-wrap select-none transition-all duration-300 font-handwriting" style="font-family: 'Indie Flower', cursive; color: #1e40af;">
Dear Friend,

Handwriting is an art that expresses personality. This tool helps you convert digital text into beautiful handwritten notes instantly. 

Try different pens and styles below!
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="lg:col-span-4 space-y-8">
                <div class="p-8 bg-gray-50 rounded-[2rem] border border-gray-100 space-y-8 sticky top-8">
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Write your message</label>
                        <textarea id="input-text" class="w-full h-48 p-5 bg-white border border-gray-200 rounded-2xl text-sm focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none shadow-sm placeholder-gray-300" placeholder="Type your message here..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Handwriting Style</label>
                            <div class="relative group">
                                <select id="font-select" class="w-full p-4 bg-white border border-gray-200 rounded-2xl font-bold text-gray-700 outline-none text-xs appearance-none transition-all group-hover:border-primary/30">
                                    <option value="'Indie Flower', cursive">Organic Marker</option>
                                    <option value="'Dancing Script', cursive">Elegant Script</option>
                                    <option value="'Great Vibes', cursive">Classic Calligraphy</option>
                                    <option value="'Shadows Into Light', cursive">Thin Pencil</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                    <i class="fa-solid fa-chevron-down text-[10px]"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Ink Palette</label>
                            <div class="flex gap-4 p-2 bg-white rounded-2xl border border-gray-100 shadow-sm">
                                <button class="color-btn flex-1 aspect-square rounded-xl bg-blue-800 border-2 border-white ring-2 ring-blue-800/10 active:scale-90 transition-all shadow-sm" data-color="#1e40af"></button>
                                <button class="color-btn flex-1 aspect-square rounded-xl bg-gray-900 border-2 border-white active:scale-90 transition-all shadow-sm" data-color="#111827"></button>
                                <button class="color-btn flex-1 aspect-square rounded-xl bg-red-800 border-2 border-white active:scale-90 transition-all shadow-sm" data-color="#991b1b"></button>
                                <button class="color-btn flex-1 aspect-square rounded-xl bg-emerald-800 border-2 border-white active:scale-90 transition-all shadow-sm" data-color="#065f46"></button>
                            </div>
                        </div>
                    </div>

                    <button id="download-btn" class="group w-full py-5 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:shadow-primary/30 hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center justify-center gap-3">
                        <i class="fa-solid fa-cloud-arrow-down text-lg group-hover:bounce"></i>
                        Export as Image
                    </button>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const preview = document.getElementById('handwriting-preview');
    const fontSelect = document.getElementById('font-select');
    const colorBtns = document.querySelectorAll('.color-btn');
    const downloadBtn = document.getElementById('download-btn');

    function update() {
        if(input.value) preview.innerText = input.value;
        preview.style.fontFamily = fontSelect.value;
    }

    input.addEventListener('input', update);
    fontSelect.addEventListener('change', update);

    colorBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            colorBtns.forEach(b => b.classList.remove('ring-2', 'ring-blue-800/10'));
            btn.classList.add('ring-2', 'ring-blue-800/10');
            preview.style.color = btn.dataset.color;
        });
    });

    downloadBtn.addEventListener('click', () => {
        const container = document.getElementById('paper-container');
        html2canvas(container).then(canvas => {
            const link = document.createElement('a');
            link.download = 'handwritten-note.png';
            link.href = canvas.toDataURL();
            link.click();
        });
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
