<!-- URL Encoder/Decoder Specialized Interface -->
<div class="animate-fade-up">
    <!-- Mode Toggle -->
    <div style="display: flex; justify-content: center; margin-bottom: 40px;">
        <div style="background: #f1f5f9; padding: 6px; border-radius: 20px; display: flex; gap: 4px; border: 1px solid #e2e8f0;">
            <button id="mode-encode" class="vibe-button" style="background: white; color: #2563eb; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-radius: 14px; font-size: 12px; height: 44px; padding: 0 24px;">
                URL ENCODE
            </button>
            <button id="mode-decode" class="vibe-button" style="background: transparent; color: #64748b; box-shadow: none; border-radius: 14px; font-size: 12px; height: 44px; padding: 0 24px;">
                URL DECODE
            </button>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; margin-bottom: 32px;">
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <label id="input-label" class="modern-label" style="margin:0">Plain URL / Text</label>
                <button id="clear-btn" style="background:none; border:none; color: #ef4444; font-size: 11px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 0.1em;">Clear</button>
            </div>
            <textarea id="input-data" class="modern-textarea" style="height: 400px; font-size: 15px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;" placeholder="https://example.com/search?q=test..."></textarea>
        </div>
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                <label id="output-label" class="modern-label" style="margin:0">Encoded Result</label>
                <button id="copy-btn" class="vibe-button" style="padding: 6px 12px; font-size: 11px;">
                    <i class="fa-solid fa-copy"></i> Copy Result
                </button>
            </div>
            <div class="result-box" style="height: 400px;">
                <textarea id="output-data" readonly style="width: 100%; height: 100%; background: transparent; border: none; color: inherit; font-family: inherit; font-size: inherit; resize: none; outline: none;" placeholder="Result..."></textarea>
            </div>
        </div>
    </div>

    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 20px; padding: 24px; display: flex; align-items: center; gap: 20px;">
        <div style="width: 48px; height: 48px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #2563eb; border: 1px solid #e2e8f0; box-shadow: var(--shadow-sm);">
            <i class="fa-solid fa-link"></i>
        </div>
        <div>
            <h4 class="modern-label" style="margin-bottom: 4px; font-size: 11px;">URI Standard Protocol</h4>
            <p id="mode-desc" style="margin: 0; color: #64748b; font-size: 13px;">Currently operating in <strong>Percent-Encoding Mode</strong> for safe URI transport.</p>
        </div>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h2>Professional URL Encoder & Decoder</h2>
    <p class="lead">Uniform Resource Identifiers (URIs) are the backbone of the web. However, standard URLs can only contain a limited set of ASCII characters. Our <strong>Professional URL Utility</strong> handles the complex task of percent-encoding, ensuring your data travels safely through the vast infrastructure of the internet.</p>
    
    <h3>Why Percent-Encoding is Critical</h3>
    <p>Reserved characters like spaces, question marks, and ampersands have special meanings in URLs. If you include them in query parameters without encoding, web servers may misinterpret your request. Our tool follows <strong>RFC 3986</strong> standards to correctly transform these symbols into hex-sequences (e.g., space becomes %20), maintaining the structural integrity of your links.</p>

    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 16px; padding: 24px; margin: 32px 0;">
        <h4 style="color: #065f46; margin-top: 0;">Pro Tip: SEO-Friendly Parameters</h4>
        <p style="margin-bottom: 0; color: #065f46;">When building dynamic links for SEO, avoid over-encoding. Only encode path segments and query values, leaving structural elements like the protocol (https://) and domain intact. Our bi-directional tool helps you audit encoded strings to verify their readability for search crawlers.</p>
    </div>

    <h3>Local Privacy & High Fidelity</h3>
    <p>This utility executes its core logic entirely within your local browser. Whether you're debugging sensitive API tokens or processing internal endpoints, your data remains secure on your machine. We provide real-time updates as you type, giving you instantaneous feedback for even the most complex URI structures.</p>
</div>

<div id="unique-faq-content" style="display:none">
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> What is the difference between Encode and Decode?</h3>
        <p>Encoding transforms special characters into "%" followed by two hex digits. Decoding performs the reverse operation, turning the hex-sequences back into their original human-readable characters.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Does this tool handle "plus" signs as spaces?</h3>
        <p>In standard URL decoding, the "+" character is often used to represent a space. Our decoder is optimized to handle this convention, ensuring consistent results between different server environments.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Can I encode an entire URL at once?</h3>
        <p>Yes, but be aware that encoding an entire URL (including the https://) will render it non-functional in a browser. It is typically best to encode only the specific query parameters or path segments that contain special characters.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-data');
    const output = document.getElementById('output-data');
    const encBtn = document.getElementById('mode-encode');
    const decBtn = document.getElementById('mode-decode');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const modeDesc = document.getElementById('mode-desc');
    const clearBtn = document.getElementById('clear-btn');
    const copyBtn = document.getElementById('copy-btn');
    
    let mode = 'encode';

    function process() {
        const val = input.value;
        if(!val) { output.value = ''; return; }
        
        try {
            output.value = mode === 'encode' ? encodeURIComponent(val) : decodeURIComponent(val.replace(/\+/g, ' '));
        } catch(e) {
            output.value = "Error: Invalid URL encoding detected.";
        }
    }

    encBtn.addEventListener('click', () => {
        mode = 'encode';
        encBtn.style.background = "white";
        encBtn.style.color = "#2563eb";
        encBtn.style.boxShadow = "0 4px 6px -1px rgba(0,0,0,0.1)";
        
        decBtn.style.background = "transparent";
        decBtn.style.color = "#64748b";
        decBtn.style.boxShadow = "none";

        inputLabel.innerText = "Plain URL / Text";
        outputLabel.innerText = "Encoded Result";
        modeDesc.innerHTML = "Currently operating in <strong>Percent-Encoding Mode</strong> for safe URI transport.";
        input.placeholder = "https://example.com/search?q=test...";
        process();
    });

    decBtn.addEventListener('click', () => {
        mode = 'decode';
        decBtn.style.background = "white";
        decBtn.style.color = "#2563eb";
        decBtn.style.boxShadow = "0 4px 6px -1px rgba(0,0,0,0.1)";
        
        encBtn.style.background = "transparent";
        encBtn.style.color = "#64748b";
        encBtn.style.boxShadow = "none";

        inputLabel.innerText = "Encoded URL";
        outputLabel.innerText = "Decoded Result";
        modeDesc.innerHTML = "Currently operating in <strong>URL Decoding Mode</strong> for human-readable recovery.";
        input.placeholder = "https%3A%2F%2Fexample.com...";
        process();
    });

    input.addEventListener('input', process);
    clearBtn.addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    copyBtn.addEventListener('click', () => {
        if(!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => {
            const originalText = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied</span>';
            setTimeout(() => { copyBtn.innerHTML = originalText; }, 2000);
        });
    });
});
</script>
