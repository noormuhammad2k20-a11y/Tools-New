<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source Data (One per line)</label>
                    <textarea id="input-text" class="form-control" rows="10" placeholder="Paste items with potential duplicates here..."></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="case-sensitive">
                            <label class="form-check-label fw-bold" for="case-sensitive">Case Sensitive?</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="trim-items" checked>
                            <label class="form-check-label fw-bold" for="trim-items">Trim Whitespace?</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="dedupe-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Remove Duplicates <i class="fa-solid fa-filter ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-3 mb-4 text-center">
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-4 border">
                            <span class="text-muted small fw-bold text-uppercase">Original Count</span>
                            <h4 id="stat-original" class="fw-bold mb-0 mt-1">0</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-4 border">
                            <span class="text-muted small fw-bold text-uppercase">Unique Count</span>
                            <h4 id="stat-unique" class="fw-bold text-success mb-0 mt-1">0</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-4 border">
                            <span class="text-muted small fw-bold text-uppercase">Removed</span>
                            <h4 id="stat-removed" class="fw-bold text-danger mb-0 mt-1">0</h4>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Cleaned List</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Cleaned List</button>
                </div>
                <textarea id="text-output" class="form-control p-4 rounded-4 bg-light border shadow-sm font-monospace" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Data Integrity: The Power of Deduplication</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the world of big data and content management, redundancies are more than just a nuisance—they are a source of inefficiency and potential error. Our <strong>List Deduplicator</strong> is a professional utility designed to scrub your datasets of recurring entries, ensuring that every record in your list is unique. This is a critical step in data cleaning, e-commerce management, and SEO auditing.</p>
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
                        <p>Redundant data can lead to skewed analytics, double-billing in logistics, and "Keyword Cannibalization" in digital marketing. Our tool provides a high-speed, local solution to these common challenges.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">What Causes Duplicate Data?</h3>
                    <p>Duplicate entries sneak into lists through various channels. Common culprits include merging multiple spreadsheets, recurring user registrations, or automated software exports that lack "Unique Constraints." Identifying these manually is a near-impossible task once a list exceeds a few dozen items.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Cleaning Modes</h3>
                    <p>Standard deduplicators often lack the nuance required for technical data. Our tool offers two essential modes for precision cleaning:</p>
                    <ul>
                        <li><strong>Case Sensitivity (Toggle):</strong> Crucial for distinguishing between 'Admin' and 'admin' in user lists, or treating them as identical entries depending on your database requirements.</li>
                        <li><strong>Whitespace Trimming:</strong> Often, duplicates aren't realized because one entry has a hidden space at the end. Our tool neutralizes these "invisible differences" to ensure maximum clean-up efficiency.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Use Cases for Professionals</h3>
                    <ol>
                        <li><strong>Email Marketing:</strong> Scrub your mailing lists before hitting 'Send' to ensure no subscriber receives the same campaign twice, reducing unsubscribe rates and improving ROI.</li>
                        <li><strong>SEO & Keyword Research:</strong> Remove duplicate search terms from your master lists to focus your content strategy on unique, high-value opportunities.</li>
                        <li><strong>Developer Data Management:</strong> Clean up log files, ID arrays, or CSV exports before importing them into a production database.</li>
                        <li><strong>E-commerce Inventory:</strong> Audit product catalogs by merging regional lists and deduplicating SKUs or barcodes to maintain a single source of truth.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Privacy First: Local Processing</h3>
                    <p>When dealing with sensitive lists like customer emails or employee IDs, security is non-negotiable. Our List Deduplicator runs entirely <strong>client-side</strong>. This means your data never crosses the internet to reach a server. The identification and removal of duplicates happen in the safety of your own browser, providing instant results with zero data footprint.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Refining Your Datasets</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Will this tool reorder my list?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Our algorithm maintains the "First-In Order." This means it keeps the very first instance of a duplicate and removes all subsequent ones, preserving the original sequence of your unique items.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How many lines can I deduplicate at once?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The tool is optimized for modern browsers and can process tens of thousands of rows in fractions of a second. For extremely large lists (100,000+), browser stability is the only limit.</div>
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
  "name": "List Deduplicator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Unique record identification",
    "Case-sensitive deduplication",
    "Whitespace trimming logic",
    "Preserve original list order",
    "Batch processing summary stats"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const dedupeBtn = document.getElementById('dedupe-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');

    const statOriginal = document.getElementById('stat-original');
    const statUnique = document.getElementById('stat-unique');
    const statRemoved = document.getElementById('stat-removed');

    dedupeBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        const caseSensitive = document.getElementById('case-sensitive').checked;
        const trimItems = document.getElementById('trim-items').checked;

        let items = text.split('\n');
        statOriginal.innerText = items.length.toLocaleString();

        const seen = new Set();
        const uniqueItems = [];

        items.forEach(item => {
            let processed = trimItems ? item.trim() : item;
            let checkValue = caseSensitive ? processed : processed.toLowerCase();

            if(!seen.has(checkValue)) {
                seen.add(checkValue);
                uniqueItems.push(processed);
            }
        });

        output.value = uniqueItems.join('\n');
        statUnique.innerText = uniqueItems.length.toLocaleString();
        statRemoved.innerText = (items.length - uniqueItems.length).toLocaleString();

        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
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
        showToast('Cleaned list copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>