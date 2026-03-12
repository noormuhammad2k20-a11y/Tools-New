<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">De-Coding the Machine: Decoding Binary and Hex</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the layers of modern computing, information is often obscured. Whether it's a hidden string in a compiled binary, a network packet captured in transit, or a legacy configuration file, data is frequently stored in numerical formats that are indecipherable to the human eye. Our <strong>Binary/Hex to Text Decoder</strong> is a specialized utility designed to reverse this process, reconstructing the original characters and symbols from their bitwise and hexadecimal representations.</p>
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
                        <p>This "decoding" process is the reverse of character encoding. It takes raw bytes (the numbers) and maps them back to the **UTF-8 Unicode standard**, ensuring that you see exactly what the original author intended, from simple messages to expressive emojis.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Significance of Reverse Engineering</h3>
                    <p>Understanding how computer-readable data translates back to text is a cornerstone of several professional fields:</p>
                    <ul>
                        <li><strong>Cybersecurity Analysis:</strong> Decode payloads used in cross-site scripting (XSS) or SQL injection attacks to understand how malicious actors are attempting to bypass filters.</li>
                        <li><strong>Embedded Systems Repair:</strong> Read legacy log data from hardware components that output raw hex values or binary streams during a fault state.</li>
                        <li><strong>Software Development:</strong> Quickly verify that your encoders are working correctly by testing the output against our independent decoder engine.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Features of Our Decoder</h3>
                    <ol>
                        <li><strong>Intelligent Auto-Detection:</strong> Our algorithms analyze the input pattern to automatically identify if you've pasted Binary, Hex, or Octal, saving you from manual selection.</li>
                        <li><strong>Prefix & Delimiter Awareness:</strong> The tool intelligently handles common prefixes like `0x` (Hex) or `0b` (Binary) and recognizes data whether it is separated by spaces, commas, or nothing at all.</li>
                        <li><strong>Robust Error Handling:</strong> If the data is malformed or invalid for the selected base, the tool provides feedback rather than crashing, helping you identify corrupted data points.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Unicode and UTF-8 Compliance</h3>
                    <p>Modern text is complex. A single "character" might be composed of multiple bytes (especially in non-Latin scripts or emojis). Our decoder implements the full **TextDecoder API**, ensuring that multi-byte sequences are correctly reassembled into their intended Unicode points. This prevents the "garbled text" or "broken square" symptoms often found in low-quality online decoders.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">A Note on Data Privacy</h3>
                    <p>Decoding proprietary data shouldn't involve third-party servers. All processing in our tool happens **client-side** in your browser. Your input data is never sent over the internet, ensuring 100% data sovereignty and total confidentiality for your professional projects.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Decoding Technicalities</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Why does my decoded text look like gibberish?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Gibberish usually occurs if the input is encrypted rather than just encoded, or if the wrong numerical base is selected. Ensure you are using the correct format (e.g., don't try to decode Hex as Binary).</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can it decode colors (Hex codes)?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">While it will decode the numerical values of a Hex color (like #FFFFFF) into ASCII, the result will be non-printable characters or symbols rather than a color name, as colors are not "text" but visual data.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>