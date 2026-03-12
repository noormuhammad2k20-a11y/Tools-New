<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Enter Text to Analyze</label>
                        <textarea id="sentiment-input" class="form-control" rows="10" placeholder="Type or paste customer reviews, social media posts, or any text..."></textarea>
                    </div>
                    <div class="d-grid shadow-premium">
                        <button id="analyze-btn" class="btn btn-primary btn-lg rounded-pill fw-bold">
                            Analyze Sentiment <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div id="result-box" class="pro-card shadow-none border bg-white h-100 d-none text-center d-flex flex-column justify-content-center p-4">
                        <div id="sentiment-emoji" class="display-1 mb-3">😐</div>
                        <h2 id="sentiment-verdict" class="fw-bold mb-2">NEUTRAL</h2>
                        <div class="progress mb-3" style="height: 10px;">
                            <div id="sentiment-score-bar" class="progress-bar" style="width: 50%"></div>
                        </div>
                        <p id="sentiment-details" class="text-muted small mb-0">Score: 0 | Comparative: 0</p>
                    </div>
                    
                    <div id="placeholder" class="pro-card shadow-none border bg-white h-100 d-flex flex-column justify-content-center text-center p-4">
                        <i class="fa-solid fa-face-smile-beam fa-4x mb-3 text-muted opacity-25"></i>
                        <p class="text-muted mb-0">Enter text to see its emotional breakdown</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
        </article>
    </div>
</section>

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



<script src="https://cdn.jsdelivr.net/npm/sentiment@5.0.2/build/sentiment.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('analyze-btn');
    const input = document.getElementById('sentiment-input');
    const box = document.getElementById('result-box');
    const placeholder = document.getElementById('placeholder');
    const emojiEl = document.getElementById('sentiment-emoji');
    const verdictEl = document.getElementById('sentiment-verdict');
    const barEl = document.getElementById('sentiment-score-bar');
    const detailsEl = document.getElementById('sentiment-details');

    const sentiment = new Sentiment();

    btn.addEventListener('click', () => {
        const text = input.value.trim();
        if (!text) return showToast('Please enter text to analyze', 'error');

        btn.disabled = true;
        btn.innerHTML = '<span class="premium-spinner"></span> Analyzing...';

        setTimeout(() => {
            const result = sentiment.analyze(text);
            const score = result.score;
            const comparative = result.comparative;

            box.classList.remove('d-none');
            placeholder.classList.add('d-none');

            let verdict = 'NEUTRAL';
            let emoji = '😐';
            let color = 'bg-secondary';
            let barWidth = 50;

            if (score > 0) {
                verdict = score > 5 ? 'VERY POSITIVE' : 'POSITIVE';
                emoji = score > 5 ? '🤩' : '😊';
                color = 'bg-success';
                barWidth = 50 + (Math.min(score, 10) * 5);
            } else if (score < 0) {
                verdict = score < -5 ? 'VERY NEGATIVE' : 'NEGATIVE';
                emoji = score < -5 ? '🤬' : '😟';
                color = 'bg-danger';
                barWidth = 50 - (Math.abs(Math.max(score, -10)) * 5);
            }

            emojiEl.textContent = emoji;
            verdictEl.textContent = verdict;
            verdictEl.className = `fw-bold mb-2 text-${color.replace('bg-', '')}`;
            barEl.className = `progress-bar ${color}`;
            barEl.style.width = barWidth + '%';
            detailsEl.textContent = `Score: ${score} | Comparative: ${comparative.toFixed(2)}`;

            showToast('Analysis complete!');
            btn.disabled = false;
            btn.innerHTML = 'Analyze Sentiment <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>';
        }, 800);
    });
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>