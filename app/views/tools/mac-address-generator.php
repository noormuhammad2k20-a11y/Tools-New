<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Ultimate Guide to MAC Address Generation</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">A MAC (Media Access Control) address is a unique identifier assigned to a Network Interface Controller (NIC) for communications at the data link layer of a network segment. Whether you're a network engineer testing firewall rules or a developer configuring virtual machine pools, having a reliable source of valid MAC addresses is crucial. Our <strong>MAC Address Generator</strong> provides an instant, customizable way to create bulk addresses that follow international hardware standards.</p>
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
                        <p>From IEEE formatting rules to custom OUI (Organizationally Unique Identifier) prefixes, our tool gives you full control over the structural properties of your generated network IDs.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">What makes a MAC address "Valid"?</h3>
                    <p>A standard MAC address (EUI-48) consists of 48 bits, usually represented as 12 hexadecimal digits. It is divided into two parts:</p>
                    <ul>
                        <li><strong>OUI (First 3 bytes):</strong> These identify the manufacturer (e.g., Intel, Apple, Cisco). With our tool, you can specify your own prefix to emulate specific hardware.</li>
                        <li><strong>NIC Specific (Last 3 bytes):</strong> A unique number assigned by the manufacturer to that specific device.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Use a MAC Address Generator?</h3>
                    <ol>
                        <li><strong>Virtualization (VMware/VirtualBox):</strong> When cloning virtual machines, you often need to manually assign new MAC addresses to prevent network conflicts on the LAN.</li>
                        <li><strong>Network Testing:</strong> Testing how routers and switches handle "MAC flooding" or validating that your access control lists (ACLs) correctly block or allow specific ranges.</li>
                        <li><strong>Hardware Emulation:</strong> Developing IoT firmware or network drivers requires simulating a variety of different hardware profiles.</li>
                        <li><strong>Privacy Research:</strong> Understanding how MAC randomization works on modern mobile devices by generating and analyzing randomized pools.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Customization Features</h3>
                    <p>Our generator isn't a simple randomizer; it's a professional utility with deep formatting options:</p>
                    <ul>
                        <li><strong>Flexible Formatting:</strong> Choose between standard colon (`:`), hyphen (`-`), or Cisco-style dot (`.`) notation to match your specific system requirements.</li>
                        <li><strong>Bulk Generation:</strong> Need 500 addresses for a docker-compose file? Generate them in milliseconds and export them as a clean text file.</li>
                        <li><strong>Case Sensitivity:</strong> Toggle between uppercase and lowercase to maintain consistency with your existing database or configuration scripts.</li>
                        <li><strong>OUI Injection:</strong> Paste a known manufacturer prefix to ensure all generated addresses appear to originate from a specific brand of hardware.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Safe and Local Processing</h3>
                    <p>Your network configurations are sensitive. Our MAC Address Generator is <strong>100% Client-Side</strong>. The generation logic runs as a pure JavaScript function within your browser. No data is sent to a server, and no logs of your generated addresses are kept. This ensures that the IDs you generate for your internal infrastructure remain strictly private.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Networking Intelligence</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Will these MAC addresses work on a real network?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes, they are structurally valid MAC addresses. However, for real-world hardware, the address must be supported by the device's firmware/drivers. These are best used for virtualization, software testing, and configuration mocking.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What is an OUI?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">OUI stands for Organizationally Unique Identifier. It's the first half of the MAC address that is assigned to hardware companies by the IEEE. Utilizing a specific OUI allows you to "spoof" or simulate hardware from manufacturers like Dell, HP, or Netgear.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>