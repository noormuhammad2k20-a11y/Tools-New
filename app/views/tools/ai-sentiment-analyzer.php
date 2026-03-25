

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






