

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Input Side -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Paste Your Text</label>
                    <textarea id="text-input" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-medium text-gray-700 focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all resize-none h-[300px]" 
                        placeholder="Paste your long article or document here..."></textarea>
                </div>
                
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Summary Length</label>
                        <select id="summary-length" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all">
                            <option value="short">Short (Bullet Points)</option>
                            <option value="medium" selected>Medium (Concise Paragraph)</option>
                            <option value="long">Long (Detailed Executive Summary)</option>
                        </select>
                    </div>
                    <button id="sum-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-compress"></i>
                        Summarize Now
                    </button>
                </div>
            </div>

            <!-- Result Side -->
            <div class="relative group h-full min-h-[400px]">
                <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-center p-8 bg-gray-50 border border-gray-100 rounded-2xl border-dashed">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-gray-200 text-2xl mb-4 border border-gray-100 shadow-sm">
                        <i class="fa-solid fa-sparkles"></i>
                    </div>
                    <h4 class="text-sm font-black text-gray-400 uppercase tracking-widest">Ready to Summarize</h4>
                    <p class="text-xs text-gray-400 mt-2 leading-relaxed">Your AI summary will appear here once processed.</p>
                </div>

                <!-- Loading State -->
                <div id="ai-loading" class="hidden absolute inset-0 flex flex-col items-center justify-center text-center p-8 bg-white/80 backdrop-blur-sm z-20 rounded-2xl">
                    <div class="w-12 h-12 border-4 border-primary border-t-transparent rounded-full animate-spin mb-4"></div>
                    <p class="text-sm font-bold text-gray-900 uppercase tracking-widest">Condensing Intelligence...</p>
                </div>

                <div id="result-wrapper" class="hidden h-full flex flex-col bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm relative z-10">
                    <div class="flex items-center justify-between p-4 border-b border-gray-50 bg-gray-50/50">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">AI Generated Summary</span>
                        <button onclick="copyResult()" class="text-primary text-[10px] font-black uppercase tracking-widest hover:text-primary-hover transition-colors">Copy Result</button>
                    </div>
                    <div id="text-output" class="p-6 text-gray-600 text-base leading-relaxed overflow-y-auto font-medium"></div>
                </div>
            </div>
        </div>
        
    </div>


<!-- Content Area -->


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('sum-btn');
    const input = document.getElementById('text-input');
    const output = document.getElementById('text-output');
    const wrapper = document.getElementById('result-wrapper');
    const placeholder = document.getElementById('placeholder');

    btn.addEventListener('click', () => {
        const text = input.value.trim();
        const length = document.getElementById('summary-length').value;

        if (text.length < 50) return showToast('Please enter at least 50 characters', 'error');

        btn.disabled = true;
        loading.classList.remove('hidden');
        placeholder.classList.add('hidden');
        resultWrapper.classList.add('hidden');

        setTimeout(() => {
            let summary = summarizeText(text, length);
            output.innerHTML = summary;
            
            loading.classList.add('hidden');
            resultWrapper.classList.remove('hidden');
            btn.disabled = false;
            showToast('Summary generated!');
        }, 1500);
    });
});

function summarizeText(text, length) {
    // Extractive Summarization Logic (Rule-based)
    const sentences = text.match(/[^\.!\?]+[\.!\?]+/g) || [text];
    
    // Simple Importance Scoring (Keywords)
    const keywords = ['important', 'significantly', 'therefore', 'main', 'result', 'because', 'firstly', 'secondly'];
    let scoredSentences = sentences.map(s => {
        let score = 0;
        keywords.forEach(k => { if (s.toLowerCase().includes(k)) score++; });
        return { text: s.trim(), score: score };
    });

    // Sort by score and take the top ones
    scoredSentences.sort((a, b) => b.score - a.score);

    if (length === 'short') {
        return "<ul>" + scoredSentences.slice(0, 3).map(s => `<li>${s.text}</li>`).join('') + "</ul>";
    } else if (length === 'medium') {
        return scoredSentences.slice(0, 4).map(s => s.text).join(' ');
    } else {
        return "<strong>Executive Summary:</strong><br><br>" + scoredSentences.slice(0, 8).map(s => s.text).join(' ');
    }
}

function copyResult() {
    const val = document.getElementById('text-output').innerText;
    navigator.clipboard.writeText(val).then(() => showToast('Copied to clipboard!'));
}
</script>






