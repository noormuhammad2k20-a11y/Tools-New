

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Quantity</label>
                        <input type="number" id="gen-count" class="form-control" value="10" min="1" max="500">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Format</label>
                        <select id="mac-format" class="form-select">
                            <option value="colon">00:1A:2B:3C:4D:5E</option>
                            <option value="hyphen">00-1A-2B-3C-4D-5E</option>
                            <option value="dot">001A.2B3C.4D5E</option>
                            <option value="none">001A2B3C4D5E</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Case</label>
                        <select id="mac-case" class="form-select">
                            <option value="upper">UPPERCASE</option>
                            <option value="lower">lowercase</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small">Prefix (Optional)</label>
                        <input type="text" id="mac-prefix" class="form-control" placeholder="e.g. 00:11:22" maxlength="8">
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <button id="generate-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate MACs <i class="fa-solid fa-plus ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Clear List</button>
                </div>

                <!-- Results Section -->
                <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">Generated Addresses</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copyResult()">Copy All</button>
                            <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="downloadResult()">Download .txt</button>
                        </div>
                    </div>
                    <textarea id="mac-output" class="form-control font-monospace p-4 rounded-4 bg-dark text-light border-0 shadow-sm" rows="12" readonly></textarea>
                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Ultimate Guide to MAC Address Generation</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">A MAC (Media Access Control) address is a unique identifier assigned to a Network Interface Controller (NIC) for communications at the data link layer of a network segment. Whether you're a network engineer testing firewall rules or a developer configuring virtual machine pools, having a reliable source of valid MAC addresses is crucial. Our <strong>MAC Address Generator</strong> provides an instant, customizable way to create bulk addresses that follow international hardware standards.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What is an OUI?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">OUI stands for Organizationally Unique Identifier. It's the first half of the MAC address that is assigned to hardware companies by the IEEE. Utilizing a specific OUI allows you to "spoof" or simulate hardware from manufacturers like Dell, HP, or Netgear.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Pro MAC Address Generator",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Bulk MAC address generation up to 500",
    "Custom OUI prefix support",
    "Multiple format notations (Colon, Hyphen, Dot)",
    "Client-side secure randomizing",
    "Export to TXT format"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#mac-output { font-family: 'Fira Code', 'Courier New', Courier, monospace; line-height: 1.6; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const output = document.getElementById('mac-output');
    const generateBtn = document.getElementById('generate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function generateRandomMac(prefix, format, isUpper) {
        let hexChars = "0123456789abcdef";
        let prefixClean = prefix.replace(/[^a-fA-F0-9]/g, '');
        let mac = prefixClean;
        
        while(mac.length < 12) {
            mac += hexChars.charAt(Math.floor(Math.random() * 16));
        }

        if (isUpper) mac = mac.toUpperCase();
        else mac = mac.toLowerCase();

        // Apply formatting
        let formatted = '';
        if (format === 'colon' || format === 'hyphen') {
            let sep = (format === 'colon') ? ':' : '-';
            for (let i = 0; i < 12; i += 2) {
                formatted += mac.substr(i, 2) + (i < 10 ? sep : '');
            }
        } else if (format === 'dot') {
            for (let i = 0; i < 12; i += 4) {
                formatted += mac.substr(i, 4) + (i < 8 ? '.' : '');
            }
        } else {
            formatted = mac;
        }

        return formatted;
    }

    generateBtn.addEventListener('click', () => {
        const count = parseInt(document.getElementById('gen-count').value) || 1;
        const format = document.getElementById('mac-format').value;
        const isUpper = document.getElementById('mac-case').value === 'upper';
        const prefix = document.getElementById('mac-prefix').value;
        
        let results = [];
        for(let i = 0; i < count; i++) {
            results.push(generateRandomMac(prefix, format, isUpper));
        }

        output.value = results.join('\n');
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        output.value = '';
        wrapper.style.display = 'none';
        document.getElementById('mac-prefix').value = '';
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('All MAC addresses copied!');
    };

    window.downloadResult = () => {
        const blob = new Blob([output.value], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'mac_addresses.txt';
        a.click();
    };
});
</script>






