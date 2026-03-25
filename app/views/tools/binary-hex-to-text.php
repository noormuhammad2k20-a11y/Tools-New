

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Input Machine Data</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="Paste binary (01001), hex (0x48), or octal here..."></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Input Format</label>
                        <select id="mode" class="form-select">
                            <option value="auto">Auto-Detect (Recommended)</option>
                            <option value="binary">Binary (Base 2)</option>
                            <option value="hex">Hexadecimal (Base 16)</option>
                            <option value="octal">Octal (Base 8)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Separated By</label>
                        <select id="sep" class="form-select">
                            <option value="auto">Auto-Detect</option>
                            <option value="space">Space</option>
                            <option value="comma">Comma</option>
                            <option value="none">No Separator</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="decode-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Decode to Text <i class="fa-solid fa-language ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary font-monospace">Decoded Human-Readable Output</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Text</button>
                </div>
                <textarea id="text-output" class="form-control p-4 rounded-4 bg-light border shadow-sm" rows="8" readonly></textarea>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">De-Coding the Machine: Decoding Binary and Hex</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the layers of modern computing, information is often obscured. Whether it's a hidden string in a compiled binary, a network packet captured in transit, or a legacy configuration file, data is frequently stored in numerical formats that are indecipherable to the human eye. Our <strong>Binary/Hex to Text Decoder</strong> is a specialized utility designed to reverse this process, reconstructing the original characters and symbols from their bitwise and hexadecimal representations.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can it decode colors (Hex codes)?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">While it will decode the numerical values of a Hex color (like #FFFFFF) into ASCII, the result will be non-printable characters or symbols rather than a color name, as colors are not "text" but visual data.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Binary/Hex to Text Decoder Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Auto-detect Binary/Hex/Octal input",
    "Multi-format delimiter identification",
    "UTF-8 Unicode reconstruction",
    "Zero-server-dependency architecture",
    "Real-time decoding results"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; line-height: 1.6; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const decodeBtn = document.getElementById('decode-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');

    decodeBtn.addEventListener('click', () => {
        let text = input.value.trim();
        if(!text) return;

        let mode = document.getElementById('mode').value;
        const sep = document.getElementById('sep').value;

        // Auto-detect mode if needed
        if(mode === 'auto') {
            if(text.match(/^[01\s]+$/)) mode = 'binary';
            else if(text.match(/^(0x|[0-9A-Fa-f\s,])+$/)) mode = 'hex';
            else mode = 'octal';
        }

        // Clean text (remove prefixes like 0x, 0b, o)
        text = text.replace(/0x|0b|o/g, '');

        // Tokenize
        let tokens = [];
        if(sep === 'space') tokens = text.split(/\s+/);
        else if(sep === 'comma') tokens = text.split(',');
        else if(sep === 'none') {
            const size = (mode === 'binary' ? 8 : (mode === 'hex' ? 2 : 3));
            for(let i=0; i<text.length; i+=size) tokens.push(text.substr(i, size));
        } else {
            // Auto delimiter detection
            tokens = text.split(/[\s,]+/);
        }

        try {
            const bytes = new Uint8Array(tokens.filter(t => t.trim().length > 0).map(t => {
                const val = parseInt(t.trim(), (mode === 'binary' ? 2 : (mode === 'hex' ? 16 : 8)));
                if(isNaN(val)) throw new Error("Invalid token: " + t);
                return val;
            }));

            const decoder = new TextDecoder('utf-8');
            output.value = decoder.decode(bytes);
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            alert('Decoding Error: Ensure your input matches the selected format. ' + e.message);
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        output.value = '';
        input.focus();
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Decoded text copied!');
    };
});
</script>






