<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridging the Gap: The List to JSON Protocol</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In modern web development, data is the universal currency, and JSON (JavaScript Object Notation) is its primary language. While manual lists are easy for humans to read, computers require structure. Our <strong>List to JSON Converter</strong> is a specialized development utility that automates the transformation of unstructured plain text into valid, production-ready JSON formats. This eliminates the tedious manual task of adding quotes, brackets, and colons.</p>
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
                        <p>Whether you're building a dropdown menu for a website, populating a database, or mocking up an API response, this tool ensures your data adheres to strict JSON syntax while offering advanced options for type detection and object mapping.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">What is JSON and Why Use It?</h3>
                    <p>JSON is a lightweight data-interchange format that is easy for humans to read and write and easy for machines to parse and generate. It has surpassed XML as the standard for serializing data due to its minimal footprint and native support in almost all modern programming languages, from Python and Java to JavaScript and PHP.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Conversion Capabilities</h3>
                    <p>Our professional converter doesn't just wrap lines in quotes. It understands the nuances of data types:</p>
                    <ul>
                        <li><strong>Standard Arrays:</strong> Perfect for simple lists like colors, names, or tags.</li>
                        <li><strong>Object Mapping:</strong> Convert each line into a key-value pair, ideal for database migrations or creating structured datasets for frameworks like React or Vue.</li>
                        <li><strong>Type Inference:</strong> The tool automatically identifies if an entry is a number (integer/float) or a boolean (true/false) and unquotes them accordingly, maintaining data integrity for your scripts.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Use Cases</h3>
                    <ol>
                        <li><strong>Frontend Development:</strong> Rapidly turn a list of features or categories into a JSON object to populate UI components.</li>
                        <li><strong>API Mocking:</strong> Create realistic static responses for your development environment by pasting sample data lists.</li>
                        <li><strong>Database Preparation:</strong> Convert raw text exports into JSON format for import into NoSQL databases like MongoDB or Firebase.</li>
                        <li><strong>Configuration Management:</strong> Transform list-based settings into a structured config file without risking syntax errors like missing commas.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Efficiency in the Workflow</h3>
                    <p>Manually editing a 50rd-line list into a JSON array takes approximately 5-10 minutes and is prone to "human syntax errors." Our tool performs this task in less than 50 milliseconds, providing a 100% error-free result every time. By automating the mechanical aspects of data formatting, you free up your mental bandwidth for more complex engineering challenges.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Refining JSON Output</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I customize the property names for object arrays?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. By selecting the "Object Array" format, you can specify a custom key name (like "label" or "value") that will be applied to every item in the list.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to empty lines in my list?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">By default, the tool skips empty lines to ensure your JSON output is lean and doesn't contain null or empty string artifacts that could break your frontend logic.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>