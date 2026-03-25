

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Data Integrity: The Power of Deduplication</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the world of big data and content management, redundancies are more than just a nuisance—they are a source of inefficiency and potential error. Our <strong>List Deduplicator</strong> is a professional utility designed to scrub your datasets of recurring entries, ensuring that every record in your list is unique. This is a critical step in data cleaning, e-commerce management, and SEO auditing.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How many lines can I deduplicate at once?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The tool is optimized for modern browsers and can process tens of thousands of rows in fractions of a second. For extremely large lists (100,000+), browser stability is the only limit.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






