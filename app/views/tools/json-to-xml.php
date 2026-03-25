

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering JSON to XML Conversion</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the modern web, JSON (JavaScript Object Notation) is the preferred format for lightness and ease of use in web apps. However, XML remains the standard for many enterprise systems, SOAP-based web services, and configuration standards like sitemaps and manifest files. Our <strong>JSON to XML Converter</strong> bridges this gap, giving you a powerful, client-side way to transform modern data payloads into valid, hierarchical XML documents.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to JSON numbers and booleans?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Since XML is text-based, numbers and booleans are converted to their string representations (e.g., 123 becomes "123", true becomes "true").</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






