<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>