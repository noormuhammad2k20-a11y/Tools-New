

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






