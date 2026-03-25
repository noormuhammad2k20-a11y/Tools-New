

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Modernizing Data with XML to JSON Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">For decades, XML was the king of data exchange. But as the web evolved toward JavaScript-heavy frameworks (like React, Vue, and Angular), JSON (JavaScript Object Notation) became the undisputed standard for its lighter footprint and native language handling. Our <strong>XML to JSON Converter</strong> is a professional-grade bridge, allowing you to ingest legacy XML data and transform it into highly readable, developer-friendly JSON payloads.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does this support large files?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. Since it runs in your browser, it is limited only by your computer's RAM. Most modern machines can easily handle XML files up to several megabytes instantly.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






