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
                        <label class="form-label fw-bold h6 text-uppercase small tracking-wider mb-0">JSON Source</label>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="loadExample()">Load Example</button>
                    </div>
                    <textarea id="json-input" class="form-control font-monospace" rows="10" placeholder='{ "root": { "item": "value" } }'></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small">Root Element Name</label>
                        <input type="text" id="root-element" class="form-control" value="root" placeholder="e.g. data, items, root">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small">XML Declaration</label>
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="include-declaration" checked>
                            <label class="form-check-label" for="include-declaration">Include &lt;?xml version="1.0" ... ?&gt;</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <button id="convert-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Convert to XML <i class="fa-solid fa-sync ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset Tool</button>
                </div>

                <!-- Results Section -->
                <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">XML Output</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyResult()">Copy XML</button>
                            <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="downloadResult()">Download .xml</button>
                        </div>
                    </div>
                    <textarea id="xml-output" class="form-control font-monospace p-4 rounded-4 bg-dark text-light border-0 shadow-sm" rows="12" readonly></textarea>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering JSON to XML Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the modern web, JSON (JavaScript Object Notation) is the preferred format for lightness and ease of use in web apps. However, XML remains the standard for many enterprise systems, SOAP-based web services, and configuration standards like sitemaps and manifest files. Our <strong>JSON to XML Converter</strong> bridges this gap, giving you a powerful, client-side way to transform modern data payloads into valid, hierarchical XML documents.</p>
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
                        <p>Whether you're a developer needing to interface with a legacy system or a marketing pro creating an RSS feed, our tool ensures your data remains structured and valid throughout the transformation process.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Key Challenges in JSON-XML Mapping</h3>
                    <p>Converting between these two formats isn't always a 1:1 match. Our converter handles several critical edge cases:</p>
                    <ul>
                        <li><strong>Root Elements:</strong> Unlike JSON, which can start with an array or multiple objects, XML requires a single "Root Element" to encapsulate all data. You can customize this name (e.g., &lt;users&gt;, &lt;catalog&gt;) to fit your needs.</li>
                        <li><strong>Array Handling:</strong> JSON arrays are converted into repeated XML tags, ensuring your list data is preserved in a standard XML structure.</li>
                        <li><strong>Invalid Keys:</strong> XML tags cannot start with numbers or contain spaces. Our intelligent parser automatically sanitizes keys to ensure the resulting XML is valid and parsable.</li>
                        <li><strong>Indentation:</strong> We don't just dump raw text; we provide beautiful multi-level indentation for human readability.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Use our JSON to XML Converter?</h3>
                    <p>Our tool is designed for the modern developer workflow:</p>
                    <ol>
                        <li><strong>100% Client-Side:</strong> Your JSON data is never sent to a server. All processing happens in your browser, maintaining strict privacy for sensitive API keys or user data.</li>
                        <li><strong>Instant Feedback:</strong> Conversion happens in milliseconds, even for large datasets, providing immediate visual confirmation.</li>
                        <li><strong>Customizable Output:</strong> Toggle the XML declaration and customize root nodes to meet specific server requirements.</li>
                        <li><strong>One-Click Workflow:</strong> Copy to clipboard or download directly as an `.xml` file to speed up your deployment process.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Use Cases</h3>
                    <p>When is this tool most useful? Here are some standard professional scenarios:</p>
                    <ul>
                        <li><strong>SEO Management:</strong> Convert a JSON list of URLs into a valid XML Sitemap for Google Search Console.</li>
                        <li><strong>Enterprise Integration:</strong> Mapping modern REST API responses to legacy SOAP inputs or Java-based enterprise service buses.</li>
                        <li><strong>RSS Feed Creation:</strong> Generating podcast or news feeds from a local JSON database or scraper result.</li>
                        <li><strong>Config Migration:</strong> Moving settings from a modern `.json` config to a legacy software's `.xml` configuration file.</li>
                    </ul>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Data Transformation</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I convert JSON arrays?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. JSON arrays are handled by repeating the parent key as an XML tag for each element in the array. This is the standard way to represent lists in XML.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to JSON numbers and booleans?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Since XML is text-based, numbers and booleans are converted to their string representations (e.g., 123 becomes "123", true becomes "true").</div>
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
  "name": "JSON to XML Converter Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "JSON to XML mapping",
    "Root element customization",
    "Automatic key sanitization",
    "Client-side secure conversion",
    "Pretty-printed XML output"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#xml-output { font-family: 'Fira Code', 'Courier New', Courier, monospace; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('json-input');
    const output = document.getElementById('xml-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function jsonToXml(obj, rootName) {
        let xml = '';
        
        function jsonToXmlHelper(data) {
            let xml = '';
            if (Array.isArray(data)) {
                data.forEach(item => {
                    xml += `<item>${jsonToXmlHelper(item)}</item>`;
                });
            } else if (typeof data === 'object' && data !== null) {
                Object.keys(data).forEach(key => {
                    let k = key.replace(/[^a-zA-Z0-9_]/g, '_');
                    if (/^[0-9]/.test(k)) k = 'item_' + k;
                    xml += `<${k}>${jsonToXmlHelper(data[key])}</${k}>`;
                });
            } else if (data === null) {
                xml += '';
            } else {
                xml += String(data)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&apos;');
            }
            return xml;
        }

        let root = rootName || 'root';
        let finalXml = `<${root}>`;
        finalXml += jsonToXmlHelper(obj);
        finalXml += `</${root}>`;
        return finalXml;
    }

    function formatXML(xml) {
        let formatted = '';
        let reg = /(>)(<)(\/*)/g;
        xml = xml.replace(reg, '$1\r\n$2$3');
        let pad = 0;
        let split = xml.split('\r\n');
        split.forEach(node => {
            let indent = 0;
            if (node.match( /.+<\/\w[^>]*>$/ )) indent = 0;
            else if (node.match( /^<\/\w/ )) { if (pad !== 0) pad -= 1; }
            else if (node.match( /^<\w[^>]*[^\/]>.*$/ )) indent = 1;
            else indent = 0;

            formatted += '  '.repeat(pad) + node + '\r\n';
            pad += indent;
        });
        return formatted.trim();
    }

    convertBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;

        try {
            const jsonObj = JSON.parse(val);
            const root = document.getElementById('root-element').value || 'root';
            const includeDecl = document.getElementById('include-declaration').checked;
            
            let xml = jsonToXml(jsonObj, root);
            let result = formatXML(xml);
            
            if (includeDecl) {
                result = '<?xml version="1.0" encoding="UTF-8"?>\n' + result;
            }

            output.value = result;
            wrapper.style.display = 'block';
            wrapper.scrollIntoView({ behavior: 'smooth' });
        } catch (e) {
            showToast('Invalid JSON provided: ' + e.message, 'error');
        }
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.loadExample = () => {
        input.value = JSON.stringify({
            "company": "Tech Solutions",
            "employees": [
                { "name": "John Doe", "role": "Developer", "id": 101 },
                { "name": "Jane Smith", "role": "Designer", "id": 102 }
            ],
            "location": "New York",
            "active": true
        }, null, 4);
    };

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('XML copied to clipboard!');
    };

    window.downloadResult = () => {
        const blob = new Blob([output.value], { type: 'text/xml' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'converted_data.xml';
        a.click();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>