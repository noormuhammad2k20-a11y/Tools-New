<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source Content</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="Paste text here to see invisible characters..."></textarea>
                </div>

                <div class="row g-4 mb-4 text-center">
                    <div class="col-6 col-md-4">
                        <div class="p-3 border rounded-3 bg-light">
                            <label class="form-label mb-1 fw-bold small text-muted">Space Symbol</label>
                            <input type="text" id="space-sym" class="form-control text-center" value="·" maxlength="1">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="p-3 border rounded-3 bg-light">
                            <label class="form-label mb-1 fw-bold small text-muted">Tab Symbol</label>
                            <input type="text" id="tab-sym" class="form-control text-center" value="→" maxlength="1">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="p-3 border rounded-3 bg-light">
                            <label class="form-label mb-1 fw-bold small text-muted">Newline Symbol</label>
                            <input type="text" id="line-sym" class="form-control text-center" value="¶" maxlength="1">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="visualize-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Visualize Whitespace <i class="fa-solid fa-magnifying-glass ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Visualized View</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Visualized Text</button>
                </div>
                <div id="visual-output" class="p-4 rounded-4 bg-light border shadow-sm font-monospace lh-base whitespace-pre-wrap" style="color: var(--primary); font-size: 1rem;"></div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Hidden in Plain Sight: The Science of Whitespace Analysis</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">Whitespace characters—spaces, tabs, and line breaks—are the invisible skeleton of every digital document. While they remain hidden to the naked eye, they are critical to how compilers, interpreters, and web browsers render information. Our <strong>Whitespace Visualizer</strong> is a professional debugging tool that replaces these invisible symbols with distinct, visible glyphs, allowing you to identify formatting anomalies instantly.</p>
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
                        <p>Have you ever encountered a "Zero-Width Space" that broke your code? Or struggled with inconsistent indentation in a large script? This tool is engineered to reveal the underlying structure of your text, making the invisible visible.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Visualize Whitespace?</h3>
                    <p>In many programming languages (like Python, where indentation is semantic), whitespace is a functional element, not just a stylistic one. In web development, "Trailing Spaces" can add unnecessary bytes to your files, impacting performance and SEO. By visualizing these characters, you can ensure your code is clean, consistent, and optimized for production.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Professional Applications</h3>
                    <ul>
                        <li><strong>Indentation Debugging:</strong> Find "Mixed Tabs and Spaces" in Python or YAML files that cause unexpected errors.</li>
                        <li><strong>Data Sanitization:</strong> Identify hidden control characters in data extracted from CSVs or external APIs before processing.</li>
                        <li><strong>Copy-Paste Troubleshooting:</strong> Spot hidden characters that often sneak in when copying text from PDFs or Microsoft Word documents.</li>
                        <li><strong>SEO Content Audits:</strong> Ensure your blog posts don't have double spaces or messy line endings that can trigger readability "flags" in advanced analyzers.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Understanding the Symbols</h3>
                    <p>Our tool uses standard typographic marks to represent hidden characters:</p>
                    <ol>
                        <li><strong>Middle Dot (·):</strong> Represents a standard space character. This allows you to count exactly how many spaces exist between words.</li>
                        <li><strong>Right Arrow (→):</strong> Represents a Tab character. This is crucial for verifying tab-based indentation logic.</li>
                        <li><strong>Pilcrow Symbol (¶):</strong> Marks the end of a line (Newline). This reveals where actual line breaks occur versus where text is simply wrapping.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Impact on Web Performance</h3>
                    <p>Excessive whitespace is "junk data" in a production environment. While important for developer readability, these characters increase the size of HTML, CSS, and JS files. Visualizing them is the first step toward effective minification, ensuring your site stays fast and lean for both users and search engines.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Whitespace and Syntax</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What is a 'Zero-Width Space'?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">It is a non-printing character used in computerized typesetting to indicate a potential line break point without a visible symbol. It often causes "ghost bugs" in code.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does this tool modify my original text?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">No. Our visualizer only generates a "preview" for display. Your original input remains unchanged, allowing you to use this solely as a diagnostic analyzer.</div>
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
  "name": "Whitespace Visualizer Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Identify hidden characters",
    "Tab and Space differentiation",
    "Newline visualization",
    "Code formatting diagnostics",
    "Real-time processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.whitespace-pre-wrap { white-space: pre-wrap; }
#visual-output { 
    background: #f8fafc; 
    border-color: #e2e8f0; 
    font-size: 1.1rem;
    color: #64748b;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const visualizeBtn = document.getElementById('visualize-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('visual-output');

    visualizeBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;

        const s = document.getElementById('space-sym').value || '·';
        const t = document.getElementById('tab-sym').value || '→';
        const l = document.getElementById('line-sym').value || '¶';

        let result = text
            .replace(/ /g, s)
            .replace(/\t/g, t)
            .replace(/\n/g, l + '\n');

        output.innerText = result;
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        output.innerText = '';
    });

    window.copyResult = () => {
        const temp = document.createElement('textarea');
        temp.value = output.innerText;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('Visualized text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>