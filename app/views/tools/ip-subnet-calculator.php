<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold">IP Address</label>
                            <input type="text" id="ip-addr" class="form-control" placeholder="192.168.1.1" value="192.168.1.1">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Subnet Mask</label>
                            <select id="ip-mask" class="form-select">
                                <option value="32">255.255.255.255 /32</option>
                                <option value="31">255.255.255.254 /31</option>
                                <option value="30">255.255.255.252 /30</option>
                                <option value="29">255.255.255.248 /29</option>
                                <option value="28">255.255.255.240 /28</option>
                                <option value="27">255.255.255.224 /27</option>
                                <option value="26">255.255.255.192 /26</option>
                                <option value="25">255.255.255.128 /25</option>
                                <option value="24" selected>255.255.255.0 /24</option>
                                <option value="23">255.255.254.0 /23</option>
                                <option value="22">255.255.252.0 /22</option>
                                <option value="16">255.255.0.0 /16</option>
                                <option value="8">255.0.0.0 /8</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button id="calc-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                Calculate Network <i class="fa-solid fa-calculator ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="pro-card shadow-none border bg-white h-100">
                        <h5 class="fw-bold mb-4 text-primary">Calculation Results</h5>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-muted fw-bold small">Network Address</td>
                                        <td id="res-net" class="fw-bold">---</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold small">Broadcast Address</td>
                                        <td id="res-broad" class="fw-bold">---</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold small">Usable Range</td>
                                        <td id="res-range" class="fw-bold">---</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold small">Total Hosts</td>
                                        <td id="res-hosts" class="fw-bold">---</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold small">Binary Mask</td>
                                        <td id="res-binary" class="fw-bold small" style="font-family:monospace">---</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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



<script>
document.addEventListener('DOMContentLoaded', () => {
    const calcBtn = document.getElementById('calc-btn');
    calcBtn.addEventListener('click', calculateIP);
    calculateIP();
});

function calculateIP() {
    const ip = document.getElementById('ip-addr').value.trim();
    const mask = parseInt(document.getElementById('ip-mask').value);

    // Validation
    const ipPattern = /^(\d{1,3}\.){3}\d{1,3}$/;
    if (!ipPattern.test(ip)) return showToast('Invalid IP Address', 'error');

    try {
        const ipLong = ip2long(ip);
        const netmaskLong = (0xFFFFFFFF << (32 - mask)) >>> 0;
        const netAddrLong = (ipLong & netmaskLong) >>> 0;
        const broadAddrLong = (netAddrLong | (~netmaskLong)) >>> 0;

        const totalHosts = (mask === 32) ? 1 : 
                           (mask === 31) ? 2 : 
                           Math.pow(2, 32 - mask) - 2;

        document.getElementById('res-net').textContent = long2ip(netAddrLong);
        document.getElementById('res-broad').textContent = long2ip(broadAddrLong);
        
        if (mask <= 30) {
            document.getElementById('res-range').textContent = long2ip(netAddrLong + 1) + ' - ' + long2ip(broadAddrLong - 1);
        } else {
            document.getElementById('res-range').textContent = 'N/A';
        }

        document.getElementById('res-hosts').textContent = totalHosts.toLocaleString();
        document.getElementById('res-binary').textContent = (netmaskLong >>> 0).toString(2).padStart(32, '0').match(/.{8}/g).join('.');

        showToast('IP Calculated!');
    } catch (e) {
        showToast('Calculation Error', 'error');
    }
}

function ip2long(ip) {
    return ip.split('.').reduce((long, octet) => (long << 8) + parseInt(octet, 10), 0) >>> 0;
}

function long2ip(long) {
    return [
        (long >>> 24) & 0xFF,
        (long >>> 16) & 0xFF,
        (long >>> 8) & 0xFF,
        long & 0xFF
    ].join('.');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>