<!-- Word Counter Specialized Interface -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; margin-bottom: 24px;">
    <div class="react-card" style="padding: 16px; text-align: center; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
        <div id="stat-words" style="font-size: 24px; font-weight: 800; color: #2563eb;">0</div>
        <div class="modern-label" style="margin: 4px 0 0; font-size: 10px;">Words</div>
    </div>
    <div class="react-card" style="padding: 16px; text-align: center; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
        <div id="stat-chars" style="font-size: 24px; font-weight: 800; color: #7c3aed;">0</div>
        <div class="modern-label" style="margin: 4px 0 0; font-size: 10px;">Characters</div>
    </div>
    <div class="react-card" style="padding: 16px; text-align: center; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
        <div id="stat-sentences" style="font-size: 24px; font-weight: 800; color: #0f172a;">0</div>
        <div class="modern-label" style="margin: 4px 0 0; font-size: 10px;">Sentences</div>
    </div>
    <div class="react-card" style="padding: 16px; text-align: center; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
        <div id="stat-reading" style="font-size: 24px; font-weight: 800; color: #059669;">0m</div>
        <div class="modern-label" style="margin: 4px 0 0; font-size: 10px;">Read Time</div>
    </div>
</div>

<div style="position: relative; margin-bottom: 24px;">
    <label class="modern-label">Document Content</label>
    <textarea id="input-data" class="modern-textarea" style="height: 300px; font-size: 14px; line-height: 1.6;" placeholder="Paste text here for instant analysis..."></textarea>
    
    <div style="position: absolute; bottom: 12px; right: 12px; display: flex; gap: 8px;">
        <button id="clear-btn" class="vibe-button" style="background: white; color: #ef4444; border: 1px solid #fee2e2; box-shadow: none; height: 32px; width: 32px; padding: 0; justify-content: center;" title="Clear">
            <i class="fa-solid fa-trash-can" style="font-size: 12px;"></i>
        </button>
        <button id="copy-btn" class="vibe-button" style="height: 32px; font-size: 12px;">
            <i class="fa-solid fa-copy"></i> Copy
        </button>
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
    <div class="react-card" style="padding: 24px;">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
            <i class="fa-solid fa-chart-pie" style="color: #2563eb; font-size: 16px;"></i>
            <h3 class="modern-label" style="margin: 0; font-size: 12px;">Density</h3>
        </div>
        <div id="keyword-list" style="display: flex; flex-direction: column; gap: 8px;">
            <div style="color: #94a3b8; font-style: italic; font-size: 13px;">Awaiting text for analysis...</div>
        </div>
    </div>

    <div class="react-card" style="padding: 24px;">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
            <i class="fa-solid fa-flask-vial" style="color: #7c3aed; font-size: 16px;"></i>
            <h3 class="modern-label" style="margin: 0; font-size: 12px;">Linguistics</h3>
        </div>
        <div style="display: flex; flex-direction: column; gap: 8px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid #f1f5f9;">
                <span style="color: #64748b; font-size: 13px; font-weight: 500;">Avg. Word</span>
                <span id="avg-word" style="font-weight: 700; color: #0f172a; font-size: 13px;">0.0</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid #f1f5f9;">
                <span style="color: #64748b; font-size: 13px; font-weight: 500;">Paragraphs</span>
                <span id="stat-paragraphs" style="font-weight: 700; color: #0f172a; font-size: 13px;">0</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid #f1f5f9;">
                <span style="color: #64748b; font-size: 13px; font-weight: 500;">Syllables</span>
                <span id="stat-syllables" style="font-weight: 700; color: #0f172a; font-size: 13px;">0</span>
            </div>
        </div>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h2>Professional Word Counter & Text Analyzer</h2>
    <p class="lead">Writing is a craft of precision. Whether you're adhering to strict academic limits, optimizing SEO content, or crafting a concise marketing email, knowing your exact metrics is vital. Our Advanced Word Counter provides real-time, granular analysis of your text—completely locally and securely.</p>
    
    <h3>Beyond Basic Counting</h3>
    <p>Unlike standard word counters that only see whitespace, our algorithm performs deep linguistic analysis. We calculate <strong>reading time</strong> based on average professional comprehension speeds and provide <strong>keyword density</strong> metrics to help you avoid over-optimization in SEO workflows.</p>

    <div style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 16px; padding: 24px; margin: 32px 0;">
        <h4 style="color: #1e40af; margin-top: 0;">Pro Tip: Readability Flow</h4>
        <p style="margin-bottom: 0; color: #1e40af;">Check your average word length. Professional web content typically aims for an average word length of 4.5 to 5.5 characters to maintain high readability across diverse audiences.</p>
    </div>

    <h3>Developer-Grade Accuracy</h3>
    <p>We treat every character with precision. Our counter accurately handles special symbols, code snippets, and varied line break formats (LF vs CRLF), making it the preferred choice for developers and technical writers who need an objective view of their documentation.</p>
</div>

<div id="unique-faq-content" style="display:none">
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> How accurate is the reading time estimate?</h3>
        <p>Our estimate is based on a standard adult reading speed of 225 words per minute. This is the industry benchmark used by platforms like Medium and Pocket.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Does this word counter count punctuation?</h3>
        <p>Standard word count excludes punctuation. However, our "Character Count" metric includes every character, including spaces and symbols, for precise byte-level analysis.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Is it safe to paste confidential documents here?</h3>
        <p>Absolutely. The analysis happens entirely within your web browser. No text is transmitted to our servers, and your data is cleared the moment you close the tab or click 'Clear'.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const stats = {
        words: document.getElementById('stat-words'),
        chars: document.getElementById('stat-chars'),
        sentences: document.getElementById('stat-sentences'),
        reading: document.getElementById('stat-reading'),
        paragraphs: document.getElementById('stat-paragraphs'),
        syllables: document.getElementById('stat-syllables'),
        avgWord: document.getElementById('avg-word'),
        keywords: document.getElementById('keyword-list')
    };

    function countSyllables(word) {
        word = word.toLowerCase();
        if(word.length <= 3) return 1;
        word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
        word = word.replace(/^y/, '');
        const syl = word.match(/[aeiouy]{1,2}/g);
        return syl ? syl.length : 1;
    }

    function updateStats() {
        const text = input.value;
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const paragraphs = text.split(/\n+/).filter(p => p.trim().length > 0);
        
        stats.words.innerText = words.length.toLocaleString();
        stats.chars.innerText = text.length.toLocaleString();
        stats.sentences.innerText = sentences.length.toLocaleString();
        stats.paragraphs.innerText = paragraphs.length.toLocaleString();
        
        const totalMinutes = Math.ceil(words.length / 225);
        stats.reading.innerText = totalMinutes + 'm';

        let totalSyllables = 0;
        words.forEach(w => { totalSyllables += countSyllables(w); });
        stats.syllables.innerText = totalSyllables.toLocaleString();

        stats.avgWord.innerText = words.length ? (text.replace(/\s/g, '').length / words.length).toFixed(1) : '0.0';

        const density = {};
        words.filter(w => w.length > 3).forEach(w => {
            const key = w.toLowerCase().replace(/[.,!?;:]/g, '');
            density[key] = (density[key] || 0) + 1;
        });

        const sortedKeywords = Object.entries(density)
            .sort((a, b) => b[1] - a[1])
            .slice(0, 5);

        if(sortedKeywords.length) {
            stats.keywords.innerHTML = sortedKeywords.map(([k, v]) => `
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #f1f5f9;">
                    <span style="font-weight: 600; color: #0f172a;">${k}</span>
                    <span style="font-size: 11px; font-weight: 700; color: #2563eb; background: rgba(37, 99, 235, 0.05); padding: 4px 8px; border-radius: 6px;">${v} (${((v/words.length)*100).toFixed(1)}%)</span>
                </div>
            `).join('');
        } else {
            stats.keywords.innerHTML = '<div style="color: #94a3b8; font-style: italic; font-size: 14px;">Need more text for analysis...</div>';
        }
    }

    input.addEventListener('input', updateStats);

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; updateStats(); input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        if(!input.value) return;
        input.select();
        document.execCommand('copy');
        const originalText = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied!</span>';
        setTimeout(() => { document.getElementById('copy-btn').innerHTML = originalText; }, 2000);
    });
});
</script>
