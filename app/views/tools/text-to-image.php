

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-12 relative overflow-hidden group">
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50 rounded-full blur-3xl -mr-48 -mt-48 opacity-60 transition-all group-hover:bg-blue-100 border border-blue-100/20"></div>

        <div class="relative z-10 space-y-12">
            <div class="text-center">
                <h3 class="text-[10px] font-black text-primary uppercase tracking-[0.6em] mb-3 leading-none">MIME Image Constructor</h3>
                <p class="text-[11px] text-gray-400 font-bold uppercase tracking-widest italic leading-none">High-Precision Visual Synthesis</p>
            </div>

            <!-- Canvas Container -->
            <div class="flex justify-center">
                <div class="relative p-2 bg-white rounded-[2rem] shadow-2xl shadow-gray-200/50 border border-gray-100 group/preview transition-all hover:scale-[1.01]">
                    <div class="absolute -top-4 -left-4 px-4 py-2 bg-gray-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest z-20 shadow-xl opacity-0 group-hover/preview:opacity-100 transition-opacity">
                        <span id="canvas-dim-indicator">600 x 400</span>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden border border-gray-100 shadow-inner">
                        <canvas id="image-canvas" width="600" height="400" class="max-w-full bg-gray-50 transition-all"></canvas>
                        <div class="absolute inset-0 pointer-events-none border-[12px] border-white/5 opacity-0 group-hover/preview:opacity-100 transition-opacity"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Content Layer -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2 px-2">
                        <div class="w-8 h-8 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-sm border border-blue-100">
                            <i class="fa-solid fa-font"></i>
                        </div>
                        <h4 class="text-xs font-black text-gray-900 uppercase tracking-widest">Content Layer</h4>
                    </div>
                    
                    <div class="relative group/input">
                        <textarea id="tool-text" class="w-full h-32 p-6 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-8 focus:ring-primary/5 focus:border-primary/20 outline-none transition-all text-gray-700 text-lg font-bold resize-none shadow-inner" placeholder="Enter text to overlay...">600 x 400</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Width (px)</label>
                            <input type="number" id="tool-w" value="600" min="50" max="2000" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-black text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all text-sm">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Height (px)</label>
                            <input type="number" id="tool-h" value="400" min="50" max="2000" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-black text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all text-sm">
                        </div>
                    </div>
                </div>

                <!-- Style Layer -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-2 px-2">
                        <div class="w-8 h-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-sm border border-purple-100">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h4 class="text-xs font-black text-gray-900 uppercase tracking-widest">Style Configuration</h4>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Chroma Surface</label>
                            <div class="flex items-center gap-4 p-2 bg-gray-50 rounded-2xl border border-gray-100 group/color">
                                <input type="color" id="tool-bg" value="#3b82f6" class="w-12 h-12 bg-transparent border-none cursor-pointer p-0 rounded-xl transition-transform group-hover/color:scale-110">
                                <input type="text" id="tool-bg-hex" value="#3B82F6" class="flex-grow bg-transparent border-none font-black text-[11px] text-gray-500 uppercase tracking-widest outline-none">
                            </div>
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Typeface Tint</label>
                            <div class="flex items-center gap-4 p-2 bg-gray-50 rounded-2xl border border-gray-100 group/color">
                                <input type="color" id="tool-fg" value="#ffffff" class="w-12 h-12 bg-transparent border-none cursor-pointer p-0 rounded-xl transition-transform group-hover/color:scale-110">
                                <input type="text" id="tool-fg-hex" value="#FFFFFF" class="flex-grow bg-transparent border-none font-black text-[11px] text-gray-500 uppercase tracking-widest outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-gradient-to-br from-gray-900 to-black rounded-[2rem] shadow-xl shadow-gray-900/10">
                        <button id="download-btn" class="w-full py-5 text-white flex items-center justify-center gap-4 group/btn transition-all">
                            <div class="flex flex-col items-center">
                                <span class="text-[11px] font-black uppercase tracking-[0.3em] mb-1">Finalize Assembly</span>
                                <span class="text-[9px] text-primary font-bold uppercase tracking-widest opacity-80 group-hover/btn:opacity-100 transition-opacity italic">Download High-Res .PNG</span>
                            </div>
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-xl group-hover/btn:bg-primary group-hover/btn:text-white transition-all transform group-hover/btn:rotate-12">
                                <i class="fa-solid fa-download"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('image-canvas');
    const ctx = canvas.getContext('2d');
    const inputW = document.getElementById('tool-w');
    const inputH = document.getElementById('tool-h');
    const inputText = document.getElementById('tool-text');
    const inputBg = document.getElementById('tool-bg');
    const inputFg = document.getElementById('tool-fg');
    const inputBgHex = document.getElementById('tool-bg-hex');
    const inputFgHex = document.getElementById('tool-fg-hex');
    const dimIndicator = document.getElementById('canvas-dim-indicator');
    const downloadBtn = document.getElementById('download-btn');

    function draw() {
        const w = parseInt(inputW.value) || 600;
        const h = parseInt(inputH.value) || 400;
        
        // Safety cap
        const safeW = Math.min(w, 4000);
        const safeH = Math.min(h, 4000);
        
        canvas.width = safeW;
        canvas.height = safeH;
        dimIndicator.innerText = `${safeW} x ${safeH}`;

        ctx.fillStyle = inputBg.value;
        ctx.fillRect(0, 0, safeW, safeH);

        ctx.fillStyle = inputFg.value;
        const fontSize = Math.min(safeW, safeH) / 8;
        ctx.font = `black ${fontSize}px "Inter", "system-ui", sans-serif`;
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        
        // Support multi-line
        const lines = inputText.value.split('\n');
        const lineHeight = fontSize * 1.2;
        const totalHeight = lines.length * lineHeight;
        let startY = (safeH / 2) - (totalHeight / 2) + (lineHeight / 2);

        lines.forEach((line, i) => {
            ctx.fillText(line, safeW / 2, startY + (i * lineHeight));
        });
    }

    [inputW, inputH, inputText, inputBg, inputFg].forEach(el => {
        el.addEventListener('input', () => {
            if(el.id === 'tool-bg') inputBgHex.value = el.value.toUpperCase();
            if(el.id === 'tool-fg') inputFgHex.value = el.value.toUpperCase();
            draw();
        });
    });

    [inputBgHex, inputFgHex].forEach(el => {
        el.addEventListener('input', () => {
            const color = el.value;
            if (/^#[0-9A-F]{6}$/i.test(color)) {
                if(el.id === 'tool-bg-hex') inputBg.value = color;
                if(el.id === 'tool-fg-hex') inputFg.value = color;
                draw();
            }
        });
    });

    downloadBtn.addEventListener('click', () => {
        const link = document.createElement('a');
        link.download = `mime-constructor-${inputW.value}x${inputH.value}.png`;
        link.href = canvas.toDataURL('image/png', 1.0);
        link.click();
        showToast("Image synthesized and exported successfully!");
    });

    // Handle resize window for responsive canvas view if needed
    
    draw();
});
</script>





