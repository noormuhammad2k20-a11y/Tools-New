<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold h6 text-uppercase small tracking-wider mb-0">XML Input</label>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="loadExample()">Load Example</button>
                    </div>
                    <textarea id="xml-input" class="form-control font-monospace" rows="10" placeholder='<root><item>Value</item></root>'></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small">Parsing Options</label>
                        <div class="form-check mt-1">
                            <input class="form-check-input" type="checkbox" id="keep-attributes" checked>
                            <label class="form-check-label" for="keep-attributes">Keep XML Attributes (@attr)</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <button id="convert-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Convert to JSON <i class="fa-solid fa-sync ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset Tool</button>
                </div>

                <!-- Results Section -->
                <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">JSON Output</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyResult()">Copy JSON</button>
                            <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="downloadResult()">Download .json</button>
                        </div>
                    </div>
                    <textarea id="json-output" class="form-control font-monospace p-4 rounded-4 bg-dark text-light border-0 shadow-sm" rows="12" readonly></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Modernizing Data with XML to JSON Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">For decades, XML was the king of data exchange. But as the web evolved toward JavaScript-heavy frameworks (like React, Vue, and Angular), JSON (JavaScript Object Notation) became the undisputed standard for its lighter footprint and native language handling. Our <strong>XML to JSON Converter</strong> is a professional-grade bridge, allowing you to ingest legacy XML data and transform it into highly readable, developer-friendly JSON payloads.</p>
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
                        <p>Whether you're consuming an old SOAP service or parsing a complex configuration file, our tool simplifies your development lifecycle by translating rigid markup into flexible objects.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Anatomy of a Smart Conversion</h3>
                    <p>Converting XML to JSON isn't as simple as swapping characters. Our tool uses an advanced recursive algorithm to handle the structural differences between these formats:</p>
                    <ul>
                        <li><strong>Attribute Mapping:</strong> XML often stores data in attributes (e.g., `<item id="123">`). Our converter can map these into specific `@id` JSON keys, ensuring no data metadata is lost.</li>
                        <li><strong>Text Node Handling:</strong> We intelligently separate actual text content from nested sub-elements, preventing "ghost" keys and messy nesting.</li>
                        <li><strong>Automatic Array Identification:</strong> When multiple sibling elements share the same name (like a list of `<user>` tags), our converter automatically groups them into a clean JSON array.</li>
                        <li><strong>Whitespace Cleanup:</strong> We strip unnecessary formatting noise from the source XML to ensure your JSON is as compact and meaningful as possible.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Choose our XML to JSON Bridge?</h3>
                    <ol>
                        <li><strong>Privacy First:</strong> We never upload your data. Our converter logic is 100% JavaScript-based and runs within your local browser environment. This is critical for enterprise security audits.</li>
                        <li><strong>Mobile-Ready Output:</strong> JSON is the native language of mobile development (iOS/Android). Use this tool to quickly prepare backend data for mobile app prototyping.</li>
                        <li><strong>Debugging Made Simple:</strong> Reading a 500-line XML file is hard. Reading the equivalent JSON is easy. Use our tool to visualize the true structure of your data.</li>
                        <li><strong>Fast and Free:</strong> No signups, no limits, just high-performance data transformation in milliseconds.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Professional Applications</h3>
                    <ul>
                        <li><strong>API Integration:</strong> Translating responses from government, aviation, or banking APIs (which often still use XML) into JSON for your modern frontend.</li>
                        <li><strong>Sitemap Analysis:</strong> Converting XML sitemaps to JSON to run data analysis or keyword audits in Python or Node.js.</li>
                        <li><strong>Config Parsing:</strong> Transforming legacy software `.xml` settings into the `.json` format used by modern build tools like Webpack or Vite.</li>
                        <li><strong>Data Migration:</strong> Moving content from an old XML-based CMS (like early WordPress exports) into a modern Headless CMS.</li>
                    </ul>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Converting with Precision</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to XML namespaces?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">XML namespaces (like `ns:element`) are treated as part of the key name to ensure uniqueness, though they can be further processed depending on your specific JSON naming requirements.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does this support large files?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. Since it runs in your browser, it is limited only by your computer's RAM. Most modern machines can easily handle XML files up to several megabytes instantly.</div>
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
  "name": "XML to JSON Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Automatic XML to JSON mapping",
    "Nested attribute support",
    "Intelligent array detection",
    "Client-side secure processing",
    "Pretty-printed JSON output"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#json-output { font-family: 'Fira Code', 'Courier New', Courier, monospace; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('xml-input');
    const output = document.getElementById('json-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function xmlToJson(xml) {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xml, "text/xml");
        
        if (xmlDoc.getElementsByTagName("parsererror").length > 0) {
            throw new Error("Invalid XML structure");
        }

        const keepAttrs = document.getElementById('keep-attributes').checked;

        function parseNode(node) {
            // Text nodes
            if (node.nodeType === Node.TEXT_NODE) {
                return node.nodeValue.trim();
            }

            // Element nodes
            let obj = {};

            // Handle Attributes
            if (keepAttrs && node.attributes && node.attributes.length > 0) {
                for (let i = 0; i < node.attributes.length; i++) {
                    const attr = node.attributes[i];
                    obj["@" + attr.nodeName] = attr.nodeValue;
                }
            }

            // Handle Children
            if (node.childNodes && node.childNodes.length > 0) {
                for (let i = 0; i < node.childNodes.length; i++) {
                    const child = node.childNodes[i];
                    
                    if (child.nodeType === Node.ELEMENT_NODE) {
                        const childName = child.nodeName;
                        const childValue = parseNode(child);

                        if (obj[childName]) {
                            if (!Array.isArray(obj[childName])) {
                                obj[childName] = [obj[childName]];
                            }
                            obj[childName].push(childValue);
                        } else {
                            obj[childName] = childValue;
                        }
                    } else if (child.nodeType === Node.TEXT_NODE && child.nodeValue.trim()) {
                        // If it's a simple text node and it's the only child
                        if (node.childNodes.length === 1) {
                            return child.nodeValue.trim();
                        }
                        // Otherwise it's a mixed content node
                        obj["#text"] = child.nodeValue.trim();
                    }
                }
            }

            // If it's an empty object and we're at a leaf, return empty string
            if (Object.keys(obj).length === 0 && node.childNodes.length === 0) return "";
            
            return obj;
        }

        const result = {};
        result[xmlDoc.documentElement.nodeName] = parseNode(xmlDoc.documentElement);
        return result;
    }

    convertBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        try {
            const jsonObj = xmlToJson(val);
            output.value = JSON.stringify(jsonObj, null, 4);
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            showToast('Error: ' + e.message, 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.loadExample = () => {
        input.value = `<?xml version="1.0" encoding="UTF-8"?>
<root catalog="general">
    <item id="1">
        <name>Product Alpha</name>
        <price currency="USD">29.99</price>
        <tags>
            <tag>office</tag>
            <tag>modern</tag>
        </tags>
    </item>
    <item id="2">
        <name>Product Beta</name>
        <price currency="EUR">45.00</price>
    </item>
</root>`;
    };

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('JSON copied to clipboard!');
    };

    window.downloadResult = () => {
        const blob = new Blob([output.value], { type: 'application/json' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'converted_data.json';
        a.click();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>