

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- UI -->
        <div id="tool-ui" class="space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Topic or Keywords</label>
                <input type="text" id="keywords-input" 
                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-medium text-gray-700 focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all" 
                    placeholder="e.g. Benefits of Sustainable Living, Best SEO Strategies 2026">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Writing Tone</label>
                    <select id="tone-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all">
                        <option value="informative">Informative (Educational)</option>
                        <option value="engaging">Engaging (Storytelling)</option>
                        <option value="technical">Technical (Deep-dive)</option>
                        <option value="casual">Casual (Friendly)</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button id="gen-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        Generate Article
                    </button>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <div id="ai-loading" class="hidden py-20 text-center space-y-4">
            <div class="relative w-16 h-16 mx-auto">
                <div class="absolute inset-0 bg-primary/20 rounded-full animate-ping"></div>
                <div class="relative w-16 h-16 bg-white border-4 border-primary border-t-transparent rounded-full animate-spin flex items-center justify-center">
                    <i class="fa-solid fa-sparkles text-primary"></i>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-black text-gray-900 uppercase tracking-tight">Synthesizing Content...</h3>
                <p class="text-sm text-gray-500">Our AI is drafting your unique article.</p>
            </div>
        </div>

        <!-- Results -->
        <div id="result-wrapper" class="hidden mt-10 pt-10 border-t border-gray-100 space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">AI Generated Draft</h3>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Ready for your review</p>
                </div>
                <div class="flex gap-2 w-full sm:w-auto">
                    <button id="copy-btn" class="flex-1 sm:flex-none px-6 py-3 bg-gray-50 text-gray-700 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-gray-100 transition-all border border-gray-200">Copy</button>
                    <button id="download-btn" class="flex-1 sm:flex-none px-6 py-3 bg-primary text-white rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all">Download .txt</button>
                    <button onclick="location.reload()" class="p-3 bg-white text-gray-400 hover:text-red-500 transition-colors"><i class="fa-solid fa-rotate-right"></i></button>
                </div>
            </div>
            <div id="article-result" class="p-8 bg-gray-50 border border-gray-100 rounded-3xl text-gray-700 text-lg leading-relaxed font-serif whitespace-pre-wrap min-h-[400px]"></div>
        </div>
        
    </div>


<!-- Content Area -->


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.bg-primary-soft { background-color: rgba(37, 99, 235, 0.05); }
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.tool-icon-circle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    border-radius: 15px;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const resultWrapper = document.getElementById('result-wrapper');
        const resultBox = document.getElementById('article-result');
        const keywordsInput = document.getElementById('keywords-input');
        const toneSelect = document.getElementById('tone-select');

        btn.addEventListener('click', async () => {
            const keywords = keywordsInput.value.trim();
            if (!keywords) return;

            loading.classList.remove('hidden');
            ui.classList.add('hidden');
            resultWrapper.classList.add('hidden');

            // Simulate AI thinking
            setTimeout(() => {
                const article = AITools.generateArticle(keywords, toneSelect.value);
                resultBox.innerText = article;
                
                loading.classList.add('hidden');
                resultWrapper.classList.remove('hidden');
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.classList.remove('hidden');
            }, 1200);
        });

        document.getElementById('copy-btn').addEventListener('click', () => {
            navigator.clipboard.writeText(resultBox.innerText);
            const original = document.getElementById('copy-btn').innerText;
            document.getElementById('copy-btn').innerText = 'Copied!';
            setTimeout(() => document.getElementById('copy-btn').innerText = original, 2000);
        });

        document.getElementById('download-btn').addEventListener('click', () => {
            const blob = new Blob([resultBox.innerText], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'ai-article.txt';
            a.click();
        });
    });
</script>






