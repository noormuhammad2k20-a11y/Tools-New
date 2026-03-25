

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <!-- Hero Section -->
        

        <div class="row g-4">
            <!-- Left: Input -->
            <div class="col-lg-6">
                <div class="pro-card shadow-lg border-0 rounded-4 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">JSON Input</h5>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="loadExample()">Load Sample</button>
                    </div>
                    <textarea id="json-input" class="form-control font-monospace mb-4" rows="15" placeholder="Paste your JSON object here..." style="font-size: 13px;"></textarea>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Schema Title</label>
                            <input type="text" id="schema-title" class="form-control" value="GeneratedSchema">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Schema Version</label>
                            <select id="schema-version" class="form-select">
                                <option value="http://json-schema.org/draft-07/schema#">Draft-07</option>
                                <option value="https://json-schema.org/draft/2020-12/schema">Draft 2020-12</option>
                            </select>
                        </div>
                    </div>

                    <button id="generate-btn" class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold shadow">
                        Generate Schema <i class="fa-solid fa-code-fork ms-2"></i>
                    </button>
                    <button class="btn btn-link text-muted w-100 mt-2 text-decoration-none small" onclick="clearAll()">Clear All</button>
                </div>
            </div>

            <!-- Right: Result -->
            <div class="col-lg-6">
                <div class="pro-card shadow-lg border-0 rounded-4 p-4 h-100 overflow-hidden" id="result-wrapper" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">Generated JSON Schema</h5>
                        <div class="d-flex gap-2">
                             <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copySchema()">Copy</button>
                             <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="downloadSchema()">Download .json</button>
                        </div>
                    </div>
                    <div class="bg-dark rounded-4 p-1 shadow-sm h-100" style="min-height: 500px;">
                         <textarea id="schema-output" class="form-control bg-transparent text-light border-0 p-4 font-monospace h-100" rows="22" readonly style="font-size: 13px; resize: none;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Architecting Data Validation: JSON Schema</h2>
                    <p class="lead">In modern API development, valid data is the bedrock of system stability. **JSON Schema** is a powerful vocabulary that allows you to annotate and validate JSON documents. It provides a way to describe your data's structure, ensuring that everything from automated tests to API documentation (like OpenAPI/Swagger) remains accurate. Our <strong>Pro JSON Schema Generator</strong> automates the heavy lifting by inferring types and constraints from your actual data payloads.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does it detect null values?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. Our generator intelligently handles `null` values and can define them as nullable types or optional fields depending on your configuration.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "JSON Schema Generator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Automatic type inference",
    "Nested object recursion",
    "Draft-07 & 2020-12 support",
    "Required property identification",
    "Client-side secure generation"
  ]
}
</script>
<style>
.text-gradient-primary { background: linear-gradient(45deg, #4f46e5, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.bg-dark { background-color: #0f172a !important; }
#schema-output { line-height: 1.5; color: #cbd5e1; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('json-input');
    const output = document.getElementById('schema-output');
    const wrapper = document.getElementById('result-wrapper');
    const generateBtn = document.getElementById('generate-btn');

    function getSchema(data, title) {
        const schema = {
            "$schema": document.getElementById('schema-version').value,
            "title": title || "Root",
            "type": getType(data)
        };

        if (schema.type === 'object') {
            schema.properties = {};
            schema.required = Object.keys(data);
            for (let key in data) {
                schema.properties[key] = generateProperty(data[key]);
            }
        } else if (schema.type === 'array') {
            if (data.length > 0) {
                schema.items = generateProperty(data[0]);
            }
        }

        return schema;
    }

    function generateProperty(val) {
        const type = getType(val);
        const prop = { type: type };

        if (type === 'object' && val !== null) {
            prop.properties = {};
            prop.required = Object.keys(val);
            for (let key in val) {
                prop.properties[key] = generateProperty(val[key]);
            }
        } else if (type === 'array') {
            if (val.length > 0) {
                prop.items = generateProperty(val[0]);
            }
        }

        return prop;
    }

    function getType(val) {
        if (Array.isArray(val)) return 'array';
        if (val === null) return 'null';
        const type = typeof val;
        if (type === 'number') return Number.isInteger(val) ? 'integer' : 'number';
        return type;
    }

    generateBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        try {
            const jsonObj = JSON.parse(val);
            const title = document.getElementById('schema-title').value;
            const schema = getSchema(jsonObj, title);
            
            output.value = JSON.stringify(schema, null, 4);
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            showToast('Invalid JSON: ' + e.message, 'error');
        }
    });

    window.loadExample = () => {
        input.value = JSON.stringify({
            "id": 1,
            "name": "Product Alpha",
            "tags": ["office", "modern"],
            "dimensions": {
                "width": 10.5,
                "height": 20
            },
            "in_stock": true,
            "category": null
        }, null, 4);
    };

    window.clearAll = () => {
        input.value = '';
        output.value = '';
        wrapper.style.display = 'none';
        input.focus();
    };

    window.copySchema = () => {
        output.select();
        document.execCommand('copy');
        showToast('JSON Schema copied!');
    };

    window.downloadSchema = () => {
        const blob = new Blob([output.value], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${document.getElementById('schema-title').value || 'schema'}.json`;
        a.click();
    };
});
</script>






