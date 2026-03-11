<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Identifiers to Convert</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="my-awesome-post&#10;user_profile_data&#10;isProductAvailable"></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Title Case</label>
                        <select id="text-case" class="form-select">
                            <option value="title">Title Case (Every Word)</option>
                            <option value="sentence">Sentence Case (First Word)</option>
                            <option value="upper">UPPER CASE</option>
                            <option value="lower">lower case</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Separator Override</label>
                        <input type="text" id="custom-sep" class="form-control" placeholder="Detect Auto">
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="remove-numbers" checked>
                            <label class="form-check-label fw-bold" for="remove-numbers">Keep ID Numbers?</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="convert-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate Titles <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Converted Titles</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy All Titles</button>
                </div>
                <div id="text-output" class="p-4 rounded-4 bg-light border shadow-sm font-monospace lh-lg" style="white-space: pre-wrap;"></div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Readable Data: The Art of Slug to Title Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the world of web development and content management, raw data often travels in "machine-friendly" formats like <code>user-profile-settings</code> or <code>order_history_last_30_days</code>. While efficient for URLs and databases, these identifiers are unreadable for end-users. Our <strong>Slug to Title Converter</strong> is a high-performance utility designed to bridge the gap between backend logic and beautiful frontend presentation.</p>
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
                        <p>Reverse-engineering a slug back into a human-readable title requires more than just replacing dashes with spaces. It involves intelligent capitalization, handling of various casing styles (camel, snake, kebab), and the optional removal of technical artifacts like database IDs.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Understanding Formatting Styles</h3>
                    <p>Developers use different "cases" depending on the context. Our universal converter detects and transforms all of the following in reaching a polished title:</p>
                    <ul>
                        <li><strong>Kebab-Case (slugs):</strong> <code>web-tools-platform</code> → Web Tools Platform. Common in URLs.</li>
                        <li><strong>Snake_Case:</strong> <code>database_entry_name</code> → Database Entry Name. Used in backend logic and file naming.</li>
                        <li><strong>camelCase:</strong> <code>isVariableVisible</code> → Is Variable Visible. Standard in JavaScript and modern APIs.</li>
                        <li><strong>PascalCase:</strong> <code>UserInterfaceComponent</code> → User Interface Component. Used for class naming in object-oriented programming.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Importance for SEO and User Experience</h3>
                    <p>Content managers often need to generate breadcrumbs, menu labels, or subheadlines from existing URL structures. Manually re-typing 50+ list items is inefficient and prone to error. By automating this conversion, you maintain consistency across your architecture while significantly reducing the "Content Debt" associated with manual updates.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Features of the Pro Converter</h3>
                    <ol>
                        <li><strong>Batch Processing:</strong> Paste hundreds of slugs at once to receive a neatly formatted list of titles instantly.</li>
                        <li><strong>Separator Detection:</strong> Intelligent regex logic identifies whether your data is separated by hyphens, underscores, or capitalization changes.</li>
                        <li><strong>Case Flexibility:</strong> Choose between "Title Case" (standard for headlines) and "Sentence Case" (preferred for descriptions).</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Technical Implementation: Behind the Scenes</h3>
                    <p>Our algorithm uses a multi-stage regex pipeline. First, it fragments the string into tokens based on punctuation or case transitions (positive lookaheads). It then filters out any unwanted characters and applies the selected capitalization logic to each token before joining them back with a standard space character.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Title Generation & Best Practices</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can this tool handle 'camelCase' correctly?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. The converter detects uppercase transitions within a single word and adds a space before them (e.g., 'getStarted' becomes 'Get Started').</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Is there a limit to how many slugs I can convert?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Because it runs entirely on your local machine, there is no hard limit. You can process thousands of lines in milliseconds.</div>
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
  "name": "Slug to Title Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Kebab-case to Title conversion",
    "Snake-case to Title conversion",
    "camelCase splitting logic",
    "Batch identifier processing",
    "Sentence and Title case options"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { font-size: 1.1rem; color: #1e293b; background: #f8fafc; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');

    convertBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        const caseType = document.getElementById('text-case').value;
        const removeNums = !document.getElementById('remove-numbers').checked;
        const customSep = document.getElementById('custom-sep').value;

        const lines = text.split('\n').filter(l => l.trim().length > 0);
        const result = lines.map(line => {
            let processed = line;
            
            // 1. Handle camelCase/PascalCase (Add space before uppercase letters)
            processed = processed.replace(/([a-z])([A-Z])/g, '$1 $2');
            
            // 2. Handle Separators (Hyphens, Underscores, or Custom)
            const sep = customSep || /[-_]/;
            processed = processed.split(sep).join(' ');

            // 3. Optional number removal
            if(removeNums) {
                processed = processed.replace(/\d+/g, '').replace(/\s+/g, ' ').trim();
            }

            // 4. Apply Case Logic
            return applyCase(processed, caseType);
        }).join('\n');

        output.innerText = result;
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    function applyCase(str, type) {
        str = str.toLowerCase().trim();
        if(type === 'lower') return str;
        if(type === 'upper') return str.toUpperCase();
        
        const words = str.split(/\s+/);
        if(type === 'sentence') {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
        
        // Title Case
        return words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
    }

    window.copyResult = () => {
        navigator.clipboard.writeText(output.innerText);
        showToast('Titles copied to clipboard!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>