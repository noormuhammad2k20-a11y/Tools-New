<!-- Lorem Ipsum Generator Specialized Interface -->
<div class="animate-fade-up">
    <!-- Configuration Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; margin-bottom: 32px;">
        <div class="react-card" style="padding: 24px; background: #f8fafc; border-radius: 20px;">
            <label class="modern-label" style="font-size: 11px;">Quantity</label>
            <div style="display: flex; align-items: center; gap: 12px; margin-top: 12px;">
                <button id="qty-minus" class="vibe-button" style="padding: 0; width: 44px; height: 44px; justify-content: center; background: white; color: #64748b; border: 1px solid #e2e8f0; box-shadow: none;">
                    <i class="fa-solid fa-minus"></i>
                </button>
                <input type="number" id="qty-input" value="5" min="1" max="50" style="flex: 1; min-width: 0; background: transparent; border: none; text-align: center; font-size: 24px; font-weight: 800; color: #0f172a; outline: none;">
                <button id="qty-plus" class="vibe-button" style="padding: 0; width: 44px; height: 44px; justify-content: center; background: white; color: #64748b; border: 1px solid #e2e8f0; box-shadow: none;">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="react-card" style="padding: 24px; background: #f8fafc; border-radius: 20px;">
            <label class="modern-label" style="font-size: 11px;">Output Type</label>
            <select id="type-select" class="modern-input" style="margin-top: 12px; background: white; height: 44px; padding: 0 16px; font-weight: 600;">
                <option value="paras">Paragraphs</option>
                <option value="sentences">Sentences</option>
                <option value="words">Words</option>
            </select>
        </div>

        <div style="display: flex; align-items: flex-end;">
            <button id="gen-btn" class="vibe-button" style="width: 100%; height: 56px; justify-content: center; font-size: 16px; border-radius: 16px;">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                Generate Now
            </button>
        </div>
    </div>

    <!-- Output Area -->
    <div style="position: relative;">
        <label class="modern-label">Generated Placeholder Text</label>
        <div id="output-text" class="result-box" style="min-height: 450px; background: white; color: #334155; border: 1px solid #e2e8f0; font-family: 'Inter', system-ui, sans-serif; font-size: 17px; line-height: 1.8; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);">
            <!-- Content will be injected here -->
        </div>
        
        <div style="position: absolute; top: 52px; right: 20px;">
            <button id="copy-btn" class="vibe-button" style="padding: 8px 16px; font-size: 12px; background: rgba(255,255,255,0.9); backdrop-filter: blur(4px); color: #2563eb; border: 1px solid #bfdbfe;">
                <i class="fa-solid fa-copy"></i>
                <span>Copy Result</span>
            </button>
        </div>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h2>Professional Lorem Ipsum Generator</h2>
    <p class="lead">Design is not just about how it looks, but how it feels. To truly understand the typography and layout of a project before the final copy is ready, developers and designers rely on standardized placeholder text. Our <strong>Professional Lorem Ipsum Generator</strong> provides high-fidelity "blind text" that mimics the natural flow of English without distracting the viewer with readable content.</p>
    
    <h3>The Legacy of Cicero</h3>
    <p>The "Lorem Ipsum" passage is derived from sections 1.10.32 and 1.10.33 of Cicero's "De Finibus Bonorum et Malorum" (The Extremes of Good and Evil), written in 45 BC. This heritage ensures that your mockups carry a classic, balanced distribution of letters that is more effective than simple repetition of "text here".</p>

    <div style="background: #fdf4ff; border: 1px solid #f5d0fe; border-radius: 16px; padding: 24px; margin: 32px 0;">
        <h4 style="color: #86198f; margin-top: 0;">UI/UX Focus: Dynamic Scaffolding</h4>
        <p style="margin-bottom: 0; color: #86198f;">Use our <strong>Sentence</strong> generator to test button labels and short call-to-actions, or switch to <strong>Paragraphs</strong> to verify column rhythm and vertical spacing in long-form layouts. The variable length logic ensures no two paragraphs look identical, reflecting real-world content distribution.</p>
    </div>

    <h3>Secure & Instant</h3>
    <p>Speed is essential in creative workflows. Our generator works entirely client-side, delivering thousands of words in sub-millisecond time. No data is sent to servers, making it safe for use within secure internal design environments where external network calls are restricted.</p>
</div>

<div id="unique-faq-content" style="display:none">
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Is this text actual Latin?</h3>
        <p>While it is based on Latin, much of it is nonsensical and scrambled. This is intentional, as it prevents the reader from being distracted by the meaning of the words when they should be focusing on the visual design.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> How many paragraphs can I generate at once?</h3>
        <p>You can generate up to 50 paragraphs or thousands of individual words instantly. The generator is optimized for high performance and won't slow down your browser.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Can I use this for production websites?</h3>
        <p>Lorem Ipsum is intended for staging and design phases only. We recommend replacing all placeholder text with final, proofread content before launching any production website to ensure proper SEO and user experience.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qty-input');
    const typeSelect = document.getElementById('type-select');
    const genBtn = document.getElementById('gen-btn');
    const output = document.getElementById('output-text');
    const copyBtn = document.getElementById('copy-btn');

    const words = ["lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", "magna", "aliqua", "ut", "enim", "ad", "minim", "veniam", "quis", "nostrud", "exercitation", "ullamco", "laboris", "nisi", "ut", "aliquip", "ex", "ea", "commodo", "consequat", "duis", "aute", "irure", "dolor", "in", "reprehenderit", "in", "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla", "pariatur", "excepteur", "sint", "occaecat", "cupidatat", "non", "proident", "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum"];

    function randomWord() { return words[Math.floor(Math.random() * words.length)]; }

    function generateSentence() {
        const len = 8 + Math.floor(Math.random() * 8);
        let s = [];
        for(let i=0; i<len; i++) s.push(randomWord());
        let res = s.join(' ');
        return res.charAt(0).toUpperCase() + res.slice(1) + '.';
    }

    function generateParagraph() {
        const len = 3 + Math.floor(Math.random() * 4);
        let p = [];
        for(let i=0; i<len; i++) p.push(generateSentence());
        return p.join(' ');
    }

    function generate() {
        const qty = Math.min(Math.max(parseInt(qtyInput.value) || 1, 1), 500);
        const type = typeSelect.value;
        let res = [];

        if(type === 'paras') {
            for(let i=0; i<qty; i++) res.push(generateParagraph());
            output.innerText = res.join('\n\n');
        } else if(type === 'sentences') {
            for(let i=0; i<qty; i++) res.push(generateSentence());
            output.innerText = res.join(' ');
        } else {
            for(let i=0; i<qty; i++) res.push(randomWord());
            output.innerText = res.join(' ');
        }
    }

    genBtn.addEventListener('click', generate);
    
    document.getElementById('qty-plus').addEventListener('click', () => { 
        qtyInput.value = Math.min(parseInt(qtyInput.value) + 1, 500); 
        generate();
    });
    document.getElementById('qty-minus').addEventListener('click', () => { 
        if(qtyInput.value > 1) qtyInput.value = parseInt(qtyInput.value) - 1; 
        generate();
    });

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.innerText);
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied!</span>';
        setTimeout(() => copyBtn.innerHTML = originalText, 2000);
    });

    // Initial generate
    generate();
});
</script>
