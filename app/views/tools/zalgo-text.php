<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-gray-900 rounded-[2.5rem] shadow-2xl border-4 border-red-500/10 p-6 sm:p-10 relative overflow-hidden">
        
        <div class="space-y-8 relative z-10">
            <div class="text-center group">
                <h3 class="text-[10px] font-black text-red-500/50 uppercase tracking-[0.8em] mb-4 group-hover:text-red-500 transition-colors animate-pulse">Corrupted Signal</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Digital Entropy Generator</p>
            </div>

            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-red-500/20 rounded-lg text-[10px] font-black text-gray-500 uppercase tracking-widest z-20">Input Sequence</div>
                <textarea id="zakgo-input" class="w-full h-32 p-8 bg-black/40 border border-white/5 rounded-3xl focus:ring-4 focus:ring-red-500/10 focus:border-red-500/30 outline-none transition-all text-white text-xl font-medium resize-none shadow-inner" placeholder="He comes..."></textarea>
            </div>

            <div class="p-4 bg-black/30 rounded-3xl border border-white/5 flex flex-col md:flex-row items-center gap-8">
                <div class="flex-grow w-full space-y-3">
                    <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1 flex justify-between">
                        <span>Entropy Level</span>
                        <span id="int-val" class="text-red-500">5</span>
                    </label>
                    <input type="range" id="zalgo-intensity" min="1" max="15" value="5" class="w-full h-2 bg-gray-800 rounded-lg appearance-none cursor-pointer accent-red-600">
                </div>
                <div class="flex gap-2 p-1 bg-black/40 rounded-2xl border border-white/5 w-full md:w-auto">
                    <div class="flex items-center gap-4 px-4">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" id="zalgo-up" checked class="hidden peer">
                            <div class="w-10 py-2 text-[9px] font-black text-center uppercase border border-white/5 rounded-xl peer-checked:bg-red-600 peer-checked:text-white transition-all text-gray-500">Up</div>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" id="zalgo-mid" checked class="hidden peer">
                            <div class="w-10 py-2 text-[9px] font-black text-center uppercase border border-white/5 rounded-xl peer-checked:bg-red-600 peer-checked:text-white transition-all text-gray-500">Mid</div>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" id="zalgo-down" checked class="hidden peer">
                            <div class="w-10 py-2 text-[9px] font-black text-center uppercase border border-white/5 rounded-xl peer-checked:bg-red-600 peer-checked:text-white transition-all text-gray-500">Down</div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="relative group">
                <div class="absolute -top-3 left-6 px-3 py-1 bg-gray-900 border border-red-500/20 rounded-lg text-[10px] font-black text-red-500 uppercase tracking-widest z-20">Result Output</div>
                <div id="zalgo-output" class="w-full min-h-[200px] max-h-[400px] p-10 bg-black/60 border border-red-500/20 rounded-[2.5rem] text-red-500 text-3xl leading-relaxed break-all font-mono shadow-2xl overflow-y-auto scrollbar-thin scrollbar-thumb-red-500/20"></div>
                <button id="copy-btn" class="absolute bottom-6 right-6 px-10 py-4 bg-red-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-xl shadow-red-600/20 hover:bg-red-500 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
                    <i class="fa-solid fa-copy"></i>
                    Copy Corruption
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('zakgo-input');
    const output = document.getElementById('zalgo-output');
    const intensity = document.getElementById('zalgo-intensity');
    const checkUp = document.getElementById('zalgo-up');
    const checkMid = document.getElementById('zalgo-mid');
    const checkDown = document.getElementById('zalgo-down');
    const copyBtn = document.getElementById('copy-btn');

    const zalgoUp = [
        '\u0300', '\u0301', '\u0302', '\u0303', '\u0304', '\u0305', '\u0306', '\u0307', 
        '\u0308', '\u0309', '\u030A', '\u030B', '\u030C', '\u030D', '\u030E', '\u030F', 
        '\u0310', '\u0311', '\u0312', '\u0313', '\u0314', '\u031A', '\u031B', '\u033D', 
        '\u033E', '\u033F', '\u0340', '\u0341', '\u0342', '\u0343', '\u0344', '\u0346', 
        '\u034A', '\u034B', '\u034C', '\u0350', '\u0351', '\u0352', '\u0357', '\u0358', 
        '\u035D', '\u035E', '\u0360', '\u0361', '\u0374', '\u033E', '\u033F'
    ];
    const zalgoMid = [
        '\u0315', '\u031B', '\u0321', '\u0322', '\u0327', '\u0328', '\u0334', '\u0335', 
        '\u0336', '\u0337', '\u0338', '\u0347', '\u0348', '\u0349', '\u034F', '\u035C', 
        '\u035D', '\u035E', '\u035F', '\u0360', '\u0362', '\u0338', '\u0337', '\u0334'
    ];
    const zalgoDown = [
        '\u0316', '\u0317', '\u0318', '\u0319', '\u031C', '\u031D', '\u031E', '\u031F', 
        '\u0320', '\u0321', '\u0322', '\u0323', '\u0324', '\u0325', '\u0326', '\u0327', 
        '\u0328', '\u0329', '\u032A', '\u032B', '\u032C', '\u032D', '\u032E', '\u032F', 
        '\u0330', '\u0331', '\u0332', '\u0333', '\u0339', '\u033A', '\u033B', '\u033C', 
        '\u0345', '\u0347', '\u0348', '\u0349', '\u034D', '\u034E', '\u0353', '\u0354', 
        '\u0355', '\u0356', '\u0359', '\u035A', '\u035B'
    ];

    const generate = () => {
        const text = input.value;
        if (!text) {
            output.innerText = '';
            return;
        }

        document.getElementById('int-val').innerText = intensity.value;

        let result = '';
        const count = parseInt(intensity.value);

        for (let i = 0; i < text.length; i++) {
            result += text[i];
            
            if (checkUp.checked) {
                for (let j = 0; j < count; j++) result += zalgoUp[Math.floor(Math.random() * zalgoUp.length)];
            }
            if (checkMid.checked) {
                for (let j = 0; j < count / 2; j++) result += zalgoMid[Math.floor(Math.random() * zalgoMid.length)];
            }
            if (checkDown.checked) {
                for (let j = 0; j < count; j++) result += zalgoDown[Math.floor(Math.random() * zalgoDown.length)];
            }
        }
        output.innerText = result;
    };

    input.addEventListener('input', generate);
    intensity.addEventListener('input', generate);
    [checkUp, checkMid, checkDown].forEach(cb => cb.addEventListener('change', generate));

    copyBtn.addEventListener('click', () => {
        if (!output.innerText) return;
        navigator.clipboard.writeText(output.innerText);
        const original = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check me-2"></i> COPIED!';
        setTimeout(() => copyBtn.innerHTML = original, 2000);
    });

    generate();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>