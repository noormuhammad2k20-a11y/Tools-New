<!-- Specialized Remove Extra Spaces Interface -->
<div class="animate-fade-up">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
        <!-- Left Column: Input -->
        <div class="react-card" style="display: flex; flex-direction: column; gap: 16px;">
            <div>
                <label class="modern-label">Messy Input Text</label>
                <textarea id="input-data" class="modern-textarea" style="height: 350px; font-size: 14px;" placeholder="Paste text with tabs or many spaces..."></textarea>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <label class="react-card" style="padding: 12px; margin: 0; display: flex; align-items: center; gap: 10px; cursor: pointer; background: #f8fafc; border-color: #e2e8f0; box-shadow: none;">
                    <input type="checkbox" id="opt-tabs" checked style="width: 16px; height: 16px;">
                    <span style="font-size: 12px; font-weight: 600; color: #475569;">Replace Tabs</span>
                </label>
                <label class="react-card" style="padding: 12px; margin: 0; display: flex; align-items: center; gap: 10px; cursor: pointer; background: #f8fafc; border-color: #e2e8f0; box-shadow: none;">
                    <input type="checkbox" id="opt-trim" checked style="width: 16px; height: 16px;">
                    <span style="font-size: 12px; font-weight: 600; color: #475569;">Trim Edges</span>
                </label>
            </div>

            <div style="display: flex; gap: 12px;">
                <button id="clear-btn" class="vibe-button" style="background: white; color: #ef4444; border: 1px solid #fee2e2; box-shadow: none; flex: 1; justify-content: center;">
                    <i class="fa-solid fa-trash-can"></i> Clear
                </button>
                <button id="clean-btn" class="vibe-button" style="flex: 2; justify-content: center;">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Clean Spaces
                </button>
            </div>
        </div>

        <!-- Right Column: Result -->
        <div class="react-card" style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <label class="modern-label" style="margin: 0;">Clean Result</label>
                <button id="copy-btn" class="vibe-button" style="height: 32px; font-size: 12px; padding: 0 12px;">
                    <i class="fa-solid fa-copy"></i> Copy Result
                </button>
            </div>
            <div id="outputText" class="result-box" style="height: 100%; min-height: 350px; white-space: pre-wrap; word-break: break-all; background: #1e293b; color: #e2e8f0; padding: 20px; border-radius: 12px;"></div>
        </div>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h3>Professional Whitespace Management</h3>
    <p>This utility is designed for high-performance text cleanup. It handles multi-line entries, tab-to-space conversions, and edge-trimming using optimized regex patterns. Ideal for developers cleaning up log files or content creators formatting copy for distribution.</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('outputText');
    const cleanBtn = document.getElementById('clean-btn');

    function performClean() {
        let text = input.value;
        if(!text) {
            output.innerText = '';
            return;
        }

        if(document.getElementById('opt-tabs').checked) {
            text = text.replace(/\t/g, ' ');
        }
        
        // Remove multi-spaces
        text = text.replace(/ +(?= )/g, '');

        if(document.getElementById('opt-trim').checked) {
            text = text.trim();
        }

        output.innerText = text;
    }

    cleanBtn.addEventListener('click', performClean);

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; output.innerText = ''; input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        const text = output.innerText;
        if(!text) return;
        navigator.clipboard.writeText(text);
        const originalBtn = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied!</span>';
        setTimeout(() => { document.getElementById('copy-btn').innerHTML = originalBtn; }, 2000);
    });
});
</script>





