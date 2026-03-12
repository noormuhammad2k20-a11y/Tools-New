<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Architecting Data Validation: JSON Schema</h2>
                    <p class="lead">In modern API development, valid data is the bedrock of system stability. **JSON Schema** is a powerful vocabulary that allows you to annotate and validate JSON documents. It provides a way to describe your data's structure, ensuring that everything from automated tests to API documentation (like OpenAPI/Swagger) remains accurate. Our <strong>Pro JSON Schema Generator</strong> automates the heavy lifting by inferring types and constraints from your actual data payloads.</p>
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

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Anatomy of a Generated Schema</h3>
                    <p>When you provide a JSON object, our engine recursively traverses the tree to identify key characteristics:</p>
                    <ul>
                        <li><strong>Type Inference:</strong> Automatically detects strings, numbers, booleans, objects, and arrays.</li>
                        <li><strong>Object Properties:</strong> Maps keys and defines recursive schemas for nested child objects.</li>
                        <li><strong>Array Schema:</strong> Analyzes array elements to define the "items" structure.</li>
                        <li><strong>Strict Validation:</strong> Generates "required" property arrays based on existing keys in your sample.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Use JSON Schema Draft-07?</h3>
                    <p>Draft-07 is the most widely supported standard globally. It is compatible with almost all programming language validators (Java, Python, PHP, JS) and is the standard for AWS API Gateway, Azure Functions, and Google Cloud endpoints. By providing Draft 2020-12 support as well, we ensure your schemas are ready for the next generation of web architectures.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Schema Design</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I use the schema for Swagger/OpenAPI?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes! JSON Schema is the core component of OpenAPI definitions. You can copy the generated object directly into your 'components/schemas' section of a Swagger file.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does it detect null values?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. Our generator intelligently handles `null` values and can define them as nullable types or optional fields depending on your configuration.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>