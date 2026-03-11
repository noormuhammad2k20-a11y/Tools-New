<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source JSON Input</label>
                    <textarea id="input-text" class="form-control" rows="10" placeholder='[&#10;  {"id": 1, "name": "John Doe", "role": "Admin"},&#10;  {"id": 2, "name": "Jane Smith", "role": "User"}&#10;]'></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">CSV Delimiter</label>
                        <select id="csv-sep" class="form-select">
                            <option value=",">Comma (,)</option>
                            <option value=";">Semicolon (;)</option>
                            <option value="\t">Tab (\t)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="include-headers" checked>
                            <label class="form-check-label fw-bold" for="include-headers">Include Header Row?</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="flatten-nested" checked>
                            <label class="form-check-label fw-bold" for="flatten-nested">Flatten Nested Objects?</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="convert-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate CSV <i class="fa-solid fa-sync ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">CSV Output</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy CSV</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="exportCSV()">Download .csv</button>
                    </div>
                </div>
                <textarea id="text-output" class="form-control p-4 rounded-4 bg-light border shadow-sm font-monospace" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Data Simplification: Converting JSON to CSV</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">As the web's standard data format, JSON is incredibly flexible for developers but difficult for business analysts to use in traditional tools like Microsoft Excel or Google Sheets. Our <strong>JSON to CSV Converter</strong> professional utility bridges this gap, transforming hierarchical, deeply nested data structures into a flat, tabular format that is ready for pivot tables, statistical analysis, and legacy database imports.</p>
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
                        <p>Unlike basic converters that break when encountering nested arrays or objects, our engine features a systematic "Flattening Protocol" that preserves data relationships while ensuring the final output is completely compatible with standard spreadsheet software.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Flatten Your JSON?</h3>
                    <p>JSON often contains objects within objects (e.g., `user -> address -> city`). In a flat CSV, there is no "depth." Our tool solves this by creating descriptive headers (like `address.city`), allowing you to view complex relationships in a single row without losing context. This is essential for auditing API responses or preparing data for visualization tools like Tableau or PowerBI.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Core Features for Developers</h3>
                    <ul>
                        <li><strong>Hierarchical Flattening:</strong> Automatically traverses infinite levels of nested JSON to create a clean, 2D data table.</li>
                        <li><strong>Delimiter Flexibility:</strong> Support for commas, semicolons (common in Europe), and tabs for seamless integration into various regional spreadsheet defaults.</li>
                        <li><strong>Array Handling:</strong> Intelligently handles arrays by joinign them into strings or creating unique columns, depending on your data structure.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Professional Applications</h3>
                    <ol>
                        <li><strong>Business Intelligence:</strong> Extract data from modern SaaS APIs (which return JSON) and import it into Excel for monthly reporting and trend analysis.</li>
                        <li><strong>Database Migration:</strong> Export collections from NoSQL databases like MongoDB and prepare them for import into SQL systems like MySQL or PostgreSQL.</li>
                        <li><strong>Data Cleaning:</strong> Use the tabular view of a CSV to quickly spot inconsistencies or missing values in large JSON datasets that would be hard to find in a text editor.</li>
                        <li><strong>Log Auditing:</strong> Convert application logs (often stored in JSON format) into CSV to filter by timestamps or error codes using standard spreadsheet filters.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Security and Privacy Focus</h3>
                    <p>Your data is often your most valuable asset. Our JSON to CSV Converter performs all logic <strong>client-side</strong>. Your JSON strings never touch our servers; they are parsed and reconstructed entirely within your browser's secure sandbox. This ensures 100% privacy and compliance with data protection regulations for sensitive professional records.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Data Formatting Questions</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens if my JSON objects have different keys?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The tool scans the entire dataset to identify all unique keys. If an object is missing a specific key, that cell in the CSV will remain empty, maintaining a consistent column structure for the entire file.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How are nested arrays handled?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">By default, nested arrays are joined into a single string separated by semicolons within their cell, ensuring the tabular integrity of the CSV is not compromised.</div>
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
  "name": "JSON to CSV Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Hierarchical JSON flattening",
    "Spreadsheet-ready CSV generation",
    "Custom delimiter selection",
    "Secure local data processing",
    "Automatic header mapping"
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
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');

    function flatten(obj, prefix = '', res = {}) {
        for (let key in obj) {
            let propName = prefix ? prefix + '.' + key : key;
            if (typeof obj[key] === 'object' && obj[key] !== null && !Array.isArray(obj[key])) {
                flatten(obj[key], propName, res);
            } else {
                res[propName] = Array.isArray(obj[key]) ? obj[key].join('; ') : obj[key];
            }
        }
        return res;
    }

    convertBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        try {
            let json = JSON.parse(text);
            if (!Array.isArray(json)) json = [json];

            const flattenNested = document.getElementById('flatten-nested').checked;
            const delimiter = document.getElementById('csv-sep').value === '\\t' ? '\t' : document.getElementById('csv-sep').value;
            const includeHeaders = document.getElementById('include-headers').checked;

            const rows = json.map(item => flattenNested ? flatten(item) : item);
            
            // Collect all unique keys
            const allKeys = [...new Set(rows.flatMap(Object.keys))];
            
            let csv = '';
            if (includeHeaders) {
                csv += allKeys.join(delimiter) + '\n';
            }

            csv += rows.map(row => {
                return allKeys.map(key => {
                    let val = row[key] === undefined ? '' : row[key];
                    // Escape quotes and wrap in quotes if contains delimiter
                    val = String(val).replace(/"/g, '""');
                    return val.includes(delimiter) || val.includes('\n') || val.includes('"') ? `"${val}"` : val;
                }).join(delimiter);
            }).join('\n');

            output.value = csv;
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            alert('Invalid JSON: ' + e.message);
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
        showToast('CSV copied to clipboard!');
    };

    window.exportCSV = () => {
        const blob = new Blob([output.value], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'data-export.csv';
        a.click();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>