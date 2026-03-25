

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source List (One entry per line)</label>
                    <textarea id="input-text" class="form-control" rows="10" placeholder="Red&#10;Green&#10;Blue"></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Output Format</label>
                        <select id="json-type" class="form-select">
                            <option value="array">Simple Array ["A", "B"]</option>
                            <option value="object-array">Object Array [{"id": "A"}]</option>
                        </select>
                    </div>
                    <div id="key-name-col" class="col-md-4" style="display: none;">
                        <label class="form-label fw-bold">Property Key Name</label>
                        <input type="text" id="property-key" class="form-control" value="item">
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch mt-4 pt-2">
                            <input class="form-check-input" type="checkbox" id="detect-types" checked>
                            <label class="form-check-label fw-bold" for="detect-types">Auto-Detect Numbers/Booleans?</label>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="convert-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Convert to JSON <i class="fa-solid fa-file-export ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Structured JSON Output</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy JSON</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="exportJSON()">Download .json</button>
                    </div>
                </div>
                <pre id="json-output" class="p-4 rounded-4 bg-light border shadow-sm font-monospace lh-sm" style="max-height: 500px; overflow-y: auto; color: #0f172a; font-size: 0.9rem;"></pre>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridging the Gap: The List to JSON Protocol</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In modern web development, data is the universal currency, and JSON (JavaScript Object Notation) is its primary language. While manual lists are easy for humans to read, computers require structure. Our <strong>List to JSON Converter</strong> is a specialized development utility that automates the transformation of unstructured plain text into valid, production-ready JSON formats. This eliminates the tedious manual task of adding quotes, brackets, and colons.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to empty lines in my list?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">By default, the tool skips empty lines to ensure your JSON output is lean and doesn't contain null or empty string artifacts that could break your frontend logic.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "List To JSON Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Text list to JSON array conversion",
    "Object array generation with custom keys",
    "Automatic value type detection",
    "Minified or Pretty-print output",
    "Client-side secure processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#json-output { white-space: pre-wrap; word-break: break-all; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const jsonType = document.getElementById('json-type');
    const keyCol = document.getElementById('key-name-col');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('json-output');

    jsonType.addEventListener('change', () => {
        keyCol.style.display = jsonType.value === 'object-array' ? 'block' : 'none';
    });

    convertBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        const type = jsonType.value;
        const key = document.getElementById('property-key').value || 'item';
        const detectTypes = document.getElementById('detect-types').checked;

        const lines = text.split('\n').filter(l => l.trim().length > 0);
        
        const finalData = lines.map(line => {
            let val = line.trim();
            
            if(detectTypes) {
                if(!isNaN(val) && val !== '') val = Number(val);
                else if(val.toLowerCase() === 'true') val = true;
                else if(val.toLowerCase() === 'false') val = false;
            }

            if(type === 'object-array') {
                const obj = {};
                obj[key] = val;
                return obj;
            }
            return val;
        });

        output.innerText = JSON.stringify(finalData, null, 4);
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        output.innerText = '';
        input.focus();
    });

    window.copyResult = () => {
        const range = document.createRange();
        range.selectNode(output);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        showToast('JSON copied to clipboard!');
    };

    window.exportJSON = () => {
        const blob = new Blob([output.innerText], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'data-export.json';
        a.click();
    };
});
</script>






