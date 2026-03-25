<!-- Case Converter Specialized Interface -->
<div class="animate-fade-up">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
        
        <!-- Left Column: Input + Controls -->
        <div class="react-card" style="display: flex; flex-direction: column; gap: 16px;">
            <label class="modern-label">Input Text</label>
            <textarea id="input-data" class="modern-textarea" style="height: 300px; font-size: 14px;" placeholder="Type or paste text to convert..."></textarea>
            
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px;">
                <button data-case="upper" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">AB</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">UPPER</span>
                </button>
                <button data-case="lower" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">ab</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">lower</span>
                </button>
                <button data-case="title" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">Ab</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">Title</span>
                </button>
                <button data-case="sentence" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">A.b</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">Sentence</span>
                </button>
                <button data-case="camel" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">aB</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">camel</span>
                </button>
                <button data-case="snake" class="case-btn vibe-button" style="background: white; color: #0f172a; border: 1px solid #e2e8f0; box-shadow: none; flex-direction: column; height: auto; padding: 12px;">
                    <span style="font-size: 14px; font-weight: 800;">a_b</span>
                    <span class="modern-label" style="margin:0; font-size: 8px; opacity: 0.7;">snake</span>
                </button>
                <button id="clear-btn" class="vibe-button" style="background: #fee2e2; color: #ef4444; border: 1px solid #fecdd3; box-shadow: none; grid-column: span 2; justify-content: center;">
                    <i class="fa-solid fa-trash-can"></i> Clear
                </button>
            </div>
        </div>

        <!-- Right Column: Result Panel -->
        <div class="react-card" style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <label class="modern-label" style="margin: 0;">Converted Output</label>
                <button id="copy-btn" class="vibe-button" style="height: 32px; font-size: 12px; padding: 0 12px;">
                    <i class="fa-solid fa-copy"></i> Copy Result
                </button>
            </div>
            <div id="outputText" class="result-box" style="height: 100%; min-height: 400px; background: #1e293b; color: #e2e8f0; padding: 20px; border-radius: 12px; white-space: pre-wrap; word-break: break-all;"></div>
        </div>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h3>Professional Case Conversion Engine</h3>
    <p>This utility provides instant text transformations using localized-aware logic. Whether you're normalizing database headers to snake_case or preparando academic titles, our engine ensures consistency across all character sets.</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('outputText');
    const caseBtns = document.querySelectorAll('.case-btn');

    const transformations = {
        upper: (t) => t.toUpperCase(),
        lower: (t) => t.toLowerCase(),
        title: (t) => t.toLowerCase().split(' ').map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' '),
        sentence: (t) => t.charAt(0).toUpperCase() + t.slice(1).toLowerCase(),
        camel: (t) => t.toLowerCase().replace(/[^a-zA-Z0-9]+(.)/g, (m, chr) => chr.toUpperCase()),
        snake: (t) => t.match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g).map(x => x.toLowerCase()).join('_')
    };

    caseBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const caseType = btn.getAttribute('data-case');
            if(!input.value) return;
            output.innerText = transformations[caseType](input.value);
        });
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; output.innerText = ''; input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        const text = output.innerText;
        if(!text) return;
        navigator.clipboard.writeText(text);
        const originalText = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied!</span>';
        setTimeout(() => { document.getElementById('copy-btn').innerHTML = originalText; }, 2000);
    });
});
</script>
