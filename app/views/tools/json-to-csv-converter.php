

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Data Simplification: Converting JSON to CSV</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">As the web's standard data format, JSON is incredibly flexible for developers but difficult for business analysts to use in traditional tools like Microsoft Excel or Google Sheets. Our <strong>JSON to CSV Converter</strong> professional utility bridges this gap, transforming hierarchical, deeply nested data structures into a flat, tabular format that is ready for pivot tables, statistical analysis, and legacy database imports.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How are nested arrays handled?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">By default, nested arrays are joined into a single string separated by semicolons within their cell, ensuring the tabular integrity of the CSV is not compromised.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






