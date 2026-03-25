

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Readable Data: The Art of Slug to Title Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the world of web development and content management, raw data often travels in "machine-friendly" formats like <code>user-profile-settings</code> or <code>order_history_last_30_days</code>. While efficient for URLs and databases, these identifiers are unreadable for end-users. Our <strong>Slug to Title Converter</strong> is a high-performance utility designed to bridge the gap between backend logic and beautiful frontend presentation.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Is there a limit to how many slugs I can convert?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Because it runs entirely on your local machine, there is no hard limit. You can process thousands of lines in milliseconds.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






