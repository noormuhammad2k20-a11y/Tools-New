<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Input Source</label>
                        <textarea id="input-text" class="form-control" rows="12" placeholder="Enter text or Base64 string here..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Output Result</label>
                        <textarea id="output-text" class="form-control" rows="12" readonly placeholder="Result will appear here..."></textarea>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button id="encode-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                                <i class="fa-solid fa-lock me-2"></i> Encode to Base64
                            </button>
                            <button id="decode-btn" class="btn btn-soft-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                                <i class="fa-solid fa-unlock me-2"></i> Decode from Base64
                            </button>
                            <button id="url-safe-btn" class="btn btn-outline-secondary btn-lg px-4 py-3 rounded-pill fw-bold">
                                Decode (URL Safe)
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center border-top pt-4 mt-2">
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-4" onclick="copyOutput()">Copy Result</button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset Editor</button>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Universal Data Shuttle: Understanding Base64</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the complex ecosystem of modern networking, not all data is created equal. While text is easily transmitted, binary data—like images or encrypted keys—can often be mangled by systems designed for plain text. Our <strong>Base64 Encoder/Decoder</strong> is a professional utility that solves this by transforming any data into a clean, 64-character ASCII string. This ensures that your information travels safely through email gateways, APIs, and URL structures without loss of integrity.</p>
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
                        <p>Base64 is not encryption; it is an <strong>encoding scheme</strong>. Its purpose is to ensure data portability, allowing binary streams to be embedded directly into HTML, CSS, or JSON without requiring external file requests.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">How Base64 Encoding Works</h3>
                    <p>The name "Base64" comes from the fact that it uses 64 distinct characters (A-Z, a-z, 0-9, +, and /) to represent binary data. The process works by taking three 8-bit bytes (24 bits total) and splitting them into four 6-bit chunks. Each chunk then corresponds to one of the 64 characters in the index. This results in a text string that is approximately **33% larger** than the original data but universally compatible with text-based protocols.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Use Cases</h3>
                    <ul>
                        <li><strong>Embedded Images (Data URIs):</strong> Convert small icons or logos into Base64 strings to embed them directly into your CSS or HTML files, reducing the number of HTTP requests and improving page load speed.</li>
                        <li><strong>API Authentication:</strong> Encode "Username:Password" combinations for Basic Auth headers in RESTful API requests.</li>
                        <li><strong>Secure Data Transmission:</strong> Send cryptographic keys, certificates, or binary tokens through systems that only support text-based input.</li>
                        <li><strong>URL Safe Encoding:</strong> Use the URL-safe variant (replacing + and / with - and _) to pass complex data through web addresses without breaking the URL syntax.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">When to Use Our Decoder</h3>
                    <p>Encountering a string like `SGVsbG8gV29ybGQ=` in a configuration file or network log can be frustrating. Our decoder instantly reverses the process, revealing the underlying human-readable text or providing a path to reconstruct the original file. It is a critical tool for developers debugging network traffic or security professionals auditing obscured strings in scripts.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Technical Standards and Compliance</h3>
                    <p>Our tool adheres to the **RFC 4648** standard, the definitive specification for Base64 encoding. We also support the "URL and Filename Safe" variant, which is essential for modern web development where data is often passed through query parameters.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Security and Privacy</h3>
                    <p>When you are encoding credentials or sensitive tokens, you cannot risk your data being intercepted. Our Base64 tool performs all logic **locally (client-side)**. Your strings are never uploaded to our server. The conversion happens entirely within your browser, ensuring 100% privacy and zero data footprint on the internet.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Base64 Intelligence</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Is Base64 a form of encryption?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">No. Base64 is easily reversible by anyone and does not use a secret key. Its purpose is data **representation**, not data **protection**. For security, you should use standard encryption (like AES) before encoding the result in Base64.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Why does my Base64 string end with '='?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The '=' character is used for padding. Since Base64 processes data in 24-bit blocks, it adds padding characters if the original data isn't a perfect multiple of three bytes to ensure the string length is correct for decoding.</div>
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
  "name": "Base64 Encoder/Decoder Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "RFC 4648 standard Base64 encoding",
    "URL-safe Base64 transformation",
    "Instant client-side decoding",
    "Data URI ready output",
    "Secure local processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#output-text { background: #f8fafc; color: #1e293b; font-family: monospace; }
.btn-soft-primary { background: rgba(37, 99, 235, 0.1); color: var(--primary); border: 1px solid rgba(37, 99, 235, 0.2); }
.btn-soft-primary:hover { background: rgba(37, 99, 235, 0.2); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const encodeBtn = document.getElementById('encode-btn');
    const decodeBtn = document.getElementById('decode-btn');
    const urlSafeBtn = document.getElementById('url-safe-btn');
    const clearBtn = document.getElementById('clear-btn');

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
            showToast('Encoded successfully!');
        } catch(e) {
            alert('Encoding Error: ' + e.message);
        }
    });

    decodeBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;
        try {
            output.value = b64_to_utf8(text);
            showToast('Decoded successfully!');
        } catch(e) {
            alert('Decoding Error: Please ensure input is a valid Base64 string.');
        }
    });

    urlSafeBtn.addEventListener('click', () => {
        let text = input.value.trim();
        if(!text) return;
        
        // Convert URL safe to standard if needed
        text = text.replace(/-/g, '+').replace(/_/g, '/');
        // Add padding if missing
        while (text.length % 4) text += '=';

        try {
            output.value = b64_to_utf8(text);
            showToast('URL-Safe decoded successfully!');
        } catch(e) {
            alert('Decoding Error: Invalid URL-safe Base64 string.');
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        input.focus();
    });

    window.copyOutput = () => {
        output.select();
        document.execCommand('copy');
        showToast('Result copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>