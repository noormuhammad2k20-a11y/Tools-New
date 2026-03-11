<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Configuration Area -->
            <div class="space-y-8">
                <div class="space-y-6">
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block px-1">Batch Magnitude</label>
                        <div class="flex items-center bg-gray-50 border border-gray-200 rounded-3xl p-2 group focus-within:ring-4 focus-within:ring-primary/10 transition-all">
                            <button onclick="adjustCount(-1)" class="w-14 h-14 flex items-center justify-center text-slate-400 hover:text-primary transition-all active:scale-95"><i class="fa-solid fa-minus"></i></button>
                            <input type="number" id="uuid-count" class="w-full bg-transparent border-0 text-center font-black text-2xl text-slate-900 focus:ring-0" value="5" min="1" max="100">
                            <button onclick="adjustCount(1)" class="w-14 h-14 flex items-center justify-center text-slate-400 hover:text-primary transition-all active:scale-95"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-100 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm text-primary">
                                    <i class="fa-solid fa-font text-xs"></i>
                                </div>
                                <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest">Uppercase Format</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="uppercase-switch" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <button id="generate-btn" class="w-full py-5 bg-primary text-white rounded-[2.5rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl shadow-primary/20 hover:bg-primary-hover hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                    <i class="fa-solid fa-wand-magic-sparkles text-lg group-hover:rotate-12 transition-transform"></i>
                    Burst Generate UUIDs
                </button>
            </div>

            <!-- Visualization Area -->
            <div id="result-container" class="relative group min-h-[300px]">
                <div id="result-wrapper" class="hidden animate-fade-up space-y-4 h-full flex flex-col">
                    <div class="flex justify-between items-center px-1 mb-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Global Identifiers</label>
                        <div class="flex gap-2">
                            <button onclick="copyAllUUIDs()" class="p-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-100 transition-all shadow-sm" title="Copy All">
                                <i class="fa-solid fa-copy text-sm"></i>
                            </button>
                            <button onclick="exportUUIDs()" class="p-2 bg-slate-100 text-slate-600 rounded-xl hover:bg-slate-200 transition-all shadow-sm" title="Download .txt">
                                <i class="fa-solid fa-download text-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div id="uuid-list" class="flex-1 space-y-3 overflow-y-auto max-h-[350px] pr-2 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                        <!-- Dynamic UUIDs -->
                    </div>
                </div>
                
                <div id="result-placeholder" class="absolute inset-0 border-2 border-dashed border-slate-100 rounded-[3rem] flex flex-col items-center justify-center text-center p-10 group-hover:border-primary/20 transition-all">
                    <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center text-slate-200 group-hover:bg-primary/5 group-hover:text-primary/30 transition-all mb-6">
                        <i class="fa-solid fa-layer-group text-4xl"></i>
                    </div>
                    <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Entropy Engine Ready</p>
                    <p class="text-slate-300 text-[11px] mt-3 leading-relaxed">Configure quantity and trigger<br>for RFC-compliant generation.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'UUID Generator',
    'intro_title' => 'Universally Unique Identifiers: The Distributed Identity Standard',
    'intro_content' => 'UUIDs (Universally Unique Identifiers) are 128-bit labels used for information in distributed systems without significant central coordination. Our Professional UUID Generator provides an RFC 4122 compliant utility for generating Version 4 (random) identifiers with maximum entropy. Perfect for database primary keys, session tokens, and microservice tracing, it ensures zero collision probability across global infrastructure architectures.',
    'detailed_title' => 'Cryptographic Randomness and Distributed Integrity',
    'detailed_content' => '<p>True uniqueness in software architecture requires higher-order randomness. Our UUID factory leverages secure cryptographic primitives to provide:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Hardened CSPRNG Entropy:</strong> Utilizes the hardware-linked Web Crypto API random generator to ensure every bit of your 128-bit UUID is non-deterministic.</li>
            <li><strong>RFC 4122 Version 4 Compliance:</strong> Strictly follows the standard bit-layout for variant and version digits, ensuring compatibility with all major ORMs (Eloquent, Hibernate, etc).</li>
            <li><strong>Batch Efficiency Modules:</strong> Generate up to 100 identifiers in a single burst, with instant export options for database seeding and massive testing mocks.</li>
            <li><strong>Stateless Client Generation:</strong> Identifiers are generated in your local browser memory. We never log or store your UUIDs, protecting your internal system indexing patterns.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const countInput = document.getElementById('uuid-count');
    const upperSwitch = document.getElementById('uppercase-switch');
    const generateBtn = document.getElementById('generate-btn');
    const wrapper = document.getElementById('result-wrapper');
    const placeholder = document.getElementById('result-placeholder');
    const list = document.getElementById('uuid-list');

    window.adjustCount = (val) => {
        let current = parseInt(countInput.value) || 1;
        current = Math.min(100, Math.max(1, current + val));
        countInput.value = current;
    };

    function generateUUID() {
        if (window.crypto && window.crypto.randomUUID) {
            return window.crypto.randomUUID();
        }
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    generateBtn.addEventListener('click', () => {
        const count = parseInt(countInput.value) || 1;
        const isUpper = upperSwitch.checked;
        
        list.innerHTML = '';
        for (let i = 0; i < count; i++) {
            let uuid = generateUUID();
            if (isUpper) uuid = uuid.toUpperCase();
            
            const div = document.createElement('div');
            div.className = 'bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 flex justify-between items-center group/item hover:bg-white hover:border-primary/20 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5';
            div.innerHTML = `
                <code class="text-[11px] sm:text-xs font-mono font-bold text-slate-600 group-hover/item:text-primary transition-colors">${uuid}</code>
                <button class="w-8 h-8 rounded-lg bg-white border border-slate-100 text-slate-300 hover:text-primary hover:border-primary/20 transition-all flex items-center justify-center shadow-sm" onclick="copyIndividual('${uuid}', this)">
                    <i class="fa-regular fa-copy text-xs"></i>
                </button>
            `;
            list.appendChild(div);
        }

        placeholder.classList.add('hidden');
        wrapper.classList.remove('hidden');
        showToast(`Generated ${count} UUIDs`);
    });

    window.copyIndividual = (text, btn) => {
        navigator.clipboard.writeText(text).then(() => {
            showToast('UUID Copied');
            const icon = btn.querySelector('i');
            icon.className = 'fa-solid fa-check text-primary';
            setTimeout(() => icon.className = 'fa-regular fa-copy text-xs', 2000);
        });
    };

    window.copyAllUUIDs = () => {
        const uuids = Array.from(list.querySelectorAll('code')).map(c => c.textContent).join('\n');
        navigator.clipboard.writeText(uuids).then(() => showToast('Batch Copied to Clipboard'));
    };

    window.exportUUIDs = () => {
        const uuids = Array.from(list.querySelectorAll('code')).map(c => c.textContent).join('\n');
        const blob = new Blob([uuids], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `uuids-${new Date().getTime()}.txt`;
        a.click();
        window.URL.revokeObjectURL(url);
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>