<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10 relative overflow-hidden">
        
        <div class="absolute top-0 right-0 p-4">
            <span class="px-3 py-1 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-indigo-500/20">Ultra Hook Pro</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
            <!-- Controls -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Topic / Subject</label>
                    <input type="text" id="ai-topic" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-500 transition-all shadow-inner" 
                        placeholder="e.g. The future of AI in 2024">
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Hook Strategy</label>
                    <div class="grid grid-cols-1 gap-2" id="hook-modes">
                        <button class="w-full py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all mode-btn active-mode bg-indigo-600 text-white shadow-lg shadow-indigo-500/10" data-type="Shocking">Shocking Fact</button>
                        <button class="w-full py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all mode-btn text-gray-400 border border-gray-100 hover:border-indigo-100 hover:text-indigo-600" data-type="Question">Provocative Question</button>
                        <button class="w-full py-3 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all mode-btn text-gray-400 border border-gray-100 hover:border-indigo-100 hover:text-indigo-600" data-type="Story">Narrative Start</button>
                    </div>
                </div>

                <button id="btn-hook" class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-indigo-500/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                    <i class="fa-solid fa-magnet text-xl"></i>
                    Generate Hooks
                </button>
            </div>

            <!-- Result Side -->
            <div class="relative min-h-[400px] flex flex-col">
                <!-- Loading -->
                <div id="ai-loading" class="hidden absolute inset-0 z-20 flex flex-col items-center justify-center bg-white/90 backdrop-blur-sm rounded-3xl border border-indigo-100 border-dashed">
                    <div class="w-12 h-12 border-4 border-indigo-600 border-t-transparent rounded-full animate-spin mb-4"></div>
                    <p class="text-[10px] font-black text-indigo-600 uppercase tracking-widest animate-pulse">Casting Hooks...</p>
                </div>

                <div id="hook-body" class="flex-grow p-6 bg-gray-50/50 border border-gray-100 rounded-3xl overflow-auto space-y-4">
                    <div class="h-full flex flex-col items-center justify-center text-center opacity-30 select-none">
                        <i class="fa-solid fa-fish fa-3x mb-4 text-indigo-200"></i>
                        <p class="text-xs font-bold uppercase tracking-widest">Nail the introduction.<br>Generate powerful hooks instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
const topicIn = document.getElementById('ai-topic');
const hookBody = document.getElementById('hook-body');
const loading = document.getElementById('ai-loading');
const btn = document.getElementById('btn-hook');
const modes = document.querySelectorAll('#hook-modes .btn');
let activeType = 'Shocking';

modes.forEach(m => {
    m.onclick = () => {
        modes.forEach(x => {
            x.classList.remove('bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/10');
            x.classList.add('text-gray-400', 'border', 'border-gray-100');
        });
        m.classList.add('bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/10');
        m.classList.remove('text-gray-400', 'border', 'border-gray-100');
        activeType = m.dataset.type;
    };
});

btn.addEventListener('click', async () => {
    if(!topicIn.value) return;
    loading.classList.remove('hidden');
    hookBody.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 1200));
    loading.classList.add('hidden');

    const topic = topicIn.value;
    let variants = [
        `What if I told you that ${topic} is actually the biggest lie of the decade?`,
        `Recent studies show that 75% of experts are completely wrong about ${topic}.`,
        `I stood there, looking at ${topic}, and realized everything I knew was about to change.`
    ];

    let html = '';
    variants.forEach((v, idx) => {
        html += `
            <div class="p-6 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-all group relative">
                <p class="text-gray-700 font-medium leading-relaxed italic">"${v}"</p>
                <div class="mt-4 flex justify-end">
                    <button class="px-4 py-2 bg-gray-50 text-[10px] font-black uppercase tracking-widest text-gray-400 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-all border border-transparent hover:border-indigo-100" onclick="copyHook(this, \`${v.replace(/'/g, "\\'")}\`)">Copy Hook</button>
                </div>
            </div>
        `;
    });
    hookBody.innerHTML = html;
});

function copyHook(btn, txt) {
    navigator.clipboard.writeText(txt);
    const original = btn.innerText;
    btn.innerText = 'Copied!';
    setTimeout(() => btn.innerText = original, 2000);
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>