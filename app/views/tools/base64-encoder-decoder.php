<!-- Base64 Encoder/Decoder Specialized Interface -->
<div class="animate-fade-up">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px; margin-bottom: 32px;">
        <div style="flex: 1;">
            <label class="modern-label">Input Source</label>
            <textarea id="input-text" class="modern-textarea" style="height: 350px; font-size: 15px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;" placeholder="Paste text or Base64 string here..."></textarea>
        </div>
        <div style="flex: 1;">
            <label class="modern-label">Output Result</label>
            <div id="output-text-container" class="result-box" style="height: 350px; position: relative;">
                <textarea id="output-text" readonly style="width: 100%; height: 100%; background: transparent; border: none; color: inherit; font-family: inherit; font-size: inherit; resize: none; outline: none;" placeholder="Result will appear here..."></textarea>
                <button id="copy-btn" class="vibe-button" style="position: absolute; bottom: 16px; right: 16px; padding: 8px 16px; font-size: 12px;">
                    <i class="fa-solid fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 32px; padding: 24px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 20px;">
        <button id="encode-btn" class="vibe-button" style="flex: 1; min-width: 200px; justify-content: center; height: 50px;">
            <i class="fa-solid fa-lock"></i> Encode to Base64
        </button>
        <button id="decode-btn" class="vibe-button" style="flex: 1; min-width: 200px; justify-content: center; height: 50px; background: white; color: #2563eb; border: 1px solid #bfdbfe;">
            <i class="fa-solid fa-unlock"></i> Decode from Base64
        </button>
        <button id="url-safe-btn" class="vibe-button" style="flex: 1; min-width: 200px; justify-content: center; height: 50px; background: white; color: #64748b; border: 1px solid #e2e8f0; box-shadow: none;">
            <i class="fa-solid fa-shield"></i> Decode (URL Safe)
        </button>
        <button id="clear-btn" class="vibe-button" style="background: #fee2e2; color: #ef4444; border: 1px solid #fecaca; box-shadow: none;">
            <i class="fa-solid fa-trash-can"></i>
        </button>
    </div>
</div>

<div id="unique-article-content" style="display:none">
    <h2>Professional Base64 Data Transformation</h2>
    <p class="lead">Base64 is more than just an encoding—it's the bridge between binary data and text-based protocols. From transmitting API keys to embedding images in HTML, our <strong>Base64 Encoder/Decoder</strong> provides the professional precision required for modern development workflows.</p>
    
    <h3>Why Integrity Matters</h3>
    <p>Standard Base64 encoding can sometimes fail when handling complex character sets like UTF-8. Our tool uses an improved encoding engine that ensures full compatibility with Emojis, mathematical symbols, and non-Latin alphabets, preventing data corruption during the character-to-binary shuttle.</p>

    <div style="background: #f0f9ff; border: 1px solid #bae6fd; border-radius: 16px; padding: 24px; margin: 32px 0;">
        <h4 style="color: #0369a1; margin-top: 0;">Developer focus: URL-Safe Base64</h4>
        <p style="margin-bottom: 0; color: #0369a1;">Standard Base64 contains characters like '+' and '/' which break URLs. Our tool supports <strong>URL-Safe decoding</strong>, automatically handling '-' and '_' substitutes frequently used in web tokens and safe URI parameters.</p>
    </div>

    <h3>Secure Local Processing</h3>
    <p>Trust is built on security. Like all ProTools utilities, this encoder operates 100% within your local browser environment. This architecture ensures that sensitive credentials, private keys, or proprietary data are never transmitted over the network, providing a fortress-level security layer for your data transformations.</p>
</div>

<div id="unique-faq-content" style="display:none">
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> What does the padding '=' mean?</h3>
        <p>Base64 works in 3-byte chunks. If your data isn't a perfect multiple of 3, the '=' character is added as padding to maintain the required 4-character block structure. It is essential for successful decoding.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Can I encode binary files or images?</h3>
        <p>This specific text interface is optimized for string encoding. For larger binary objects, we recommend using our dedicated "Base64 to Image" or "Binary to Base64" tools designed to handle larger buffers.</p>
    </div>
    <div class="faq-item animate-fade-up">
        <h3><i class="fa-solid fa-circle-question"></i> Is this compliant with RFC 4648?</h3>
        <p>Yes. Our encoding logic strictly follows the industry standard RFC 4648, ensuring that the Base64 strings generated here are compatible with any system worldwide.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const encodeBtn = document.getElementById('encode-btn');
    const decodeBtn = document.getElementById('decode-btn');
    const urlSafeBtn = document.getElementById('url-safe-btn');
    const clearBtn = document.getElementById('clear-btn');
    const copyBtn = document.getElementById('copy-btn');

    // UTF-8 aware Base64 Encoding
    function utf8_to_b64(str) {
        return window.btoa(unescape(encodeURIComponent(str)));
    }

    // UTF-8 aware Base64 Decoding
    function b64_to_utf8(str) {
        return decodeURIComponent(escape(window.atob(str)));
    }

    encodeBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;
        try {
            output.value = utf8_to_b64(text);
        } catch(e) {
            console.error(e);
            output.value = 'Encoding Error: Check your input characters.';
        }
    });

    decodeBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;
        try {
            output.value = b64_to_utf8(text);
        } catch(e) {
            console.error(e);
            output.value = 'Decoding Error: Input is not a valid Base64 string.';
        }
    });

    urlSafeBtn.addEventListener('click', () => {
        let text = input.value.trim();
        if(!text) return;
        text = text.replace(/-/g, '+').replace(/_/g, '/');
        while (text.length % 4) text += '=';
        try {
            output.value = b64_to_utf8(text);
        } catch(e) {
            console.error(e);
            output.value = 'Decoding Error: Invalid URL-safe Base64 format.';
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        input.focus();
    });

    copyBtn.addEventListener('click', () => {
        if(!output.value) return;
        output.select();
        document.execCommand('copy');
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied</span>';
        setTimeout(() => { copyBtn.innerHTML = originalText; }, 2000);
    });
});
</script>
