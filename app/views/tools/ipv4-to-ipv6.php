<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Enter IPv4 Address</label>
                <input type="text" id="ipv4-input" class="form-control form-control-lg font-monospace" placeholder="e.g. 192.168.1.1" autofocus>
            </div>
            
            <div class="d-flex flex-wrap gap-3 mb-4">
                <button id="convert-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Convert Address <i class="fa-solid fa-shuffle ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded-4">
                            <label class="form-label fw-bold text-primary small text-uppercase tracking-widest d-block">IPv4-Mapped IPv6 Address</label>
                            <div class="input-group">
                                <input type="text" id="mapped-output" class="form-control font-monospace bg-white border-0" readonly>
                                <button class="btn btn-outline-primary" onclick="copyResult('mapped-output')">Copy</button>
                            </div>
                            <p class="small text-muted mt-2 mb-0">The standard format for representing IPv4 addresses within an IPv6 environment (::ffff:w.x.y.z).</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded-4">
                            <label class="form-label fw-bold text-primary small text-uppercase tracking-widest d-block">IPv4-Compatible IPv6 (Deprecated)</label>
                            <div class="input-group">
                                <input type="text" id="compat-output" class="form-control font-monospace bg-white border-0" readonly>
                                <button class="btn btn-outline-primary" onclick="copyResult('compat-output')">Copy</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded-4">
                            <label class="form-label fw-bold text-primary small text-uppercase tracking-widest d-block">6to4 Prefix</label>
                            <div class="input-group">
                                <input type="text" id="prefix-output" class="form-control font-monospace bg-white border-0" readonly>
                                <button class="btn btn-outline-primary" onclick="copyResult('prefix-output')">Copy</button>
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
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Bridging the Gap: IPv4 to IPv6 Transition</h2>
                    <p class="lead">As the pool of available IPv4 addresses has been depleted, the global internet is steadily migrating to IPv6. However, during this transition, systems often need to represent legacy IPv4 addresses within the new IPv6 framework. Our <strong>IPv4 to IPv6 Converter</strong> provides the technical mapping required for network configuration and analysis.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the Formats</h3>
                    <ul>
                        <li><strong>IPv4-Mapped (::ffff:w.x.y.z):</strong> This is the current standard used by dual-stack nodes to communicate with IPv4-only nodes. It embeds the 32 bits of the IPv4 address into the last 32 bits of the IPv6 address.</li>
                        <li><strong>IPv4-Compatible (::w.x.y.z):</strong> An older, now deprecated method that used all zeros for the prefix. It is rarely used in modern networking but remains important for legacy system support.</li>
                        <li><strong>6to4 (2002:w.x.y.z::/48):</strong> A transition mechanism that allows IPv6 packets to be transmitted over an IPv4 network without explicit tunnel configuration.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why This Tool is Vital</h3>
                    <ol>
                        <li><strong>Network Engineering:</strong> Configuring routers and firewalls for dual-stack operation.</li>
                        <li><strong>Log Normalization:</strong> Converting legacy logs into a unified IPv6 format for easier centralized analysis.</li>
                        <li><strong>App Development:</strong> Ensuring your networking code correctly handles both IP versions during connection handshakes.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Secure Local Conversion</h3>
                    <p>Your network architecture is sensitive information. Our converter operates <strong>100% in your local browser</strong>. We do not transmit or log any IP addresses you process, ensuring that your internal IP maps and data center configurations stay private.</p>
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


<style>
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('ipv4-input');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    function ipv4ToHex(ip) {
        return ip.split('.').map(octet => {
            const h = parseInt(octet).toString(16).padStart(2, '0');
            return h;
        });
    }

    convertBtn.addEventListener('click', () => {
        const val = input.value.trim();
        const parts = val.split('.');
        if(parts.length !== 4) {
            showToast('Invalid IPv4 format!', 'error');
            return;
        }

        const hexParts = ipv4ToHex(val);
        const hex1 = hexParts[0] + hexParts[1];
        const hex2 = hexParts[2] + hexParts[3];

        document.getElementById('mapped-output').value = `::ffff:${val}`;
        document.getElementById('compat-output').value = `::${val}`;
        document.getElementById('prefix-output').value = `2002:${hex1}:${hex2}::/48`;

        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.copyResult = (id) => {
        const el = document.getElementById(id);
        el.select();
        document.execCommand('copy');
        showToast('Address copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>