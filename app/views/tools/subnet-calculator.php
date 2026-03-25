

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row gx-5">
                <!-- Input UI -->
                <div class="col-lg-5 mb-4 mb-lg-0 border-end pe-lg-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Network Parameters</h5>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted">IPv4 Address</label>
                        <input type="text" id="in-ip" class="form-control form-control-lg border-2 text-primary fw-bold" value="192.168.1.10" placeholder="192.168.0.1">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted">CIDR Routing Prefix (Mask)</label>
                        <select id="in-cidr" class="form-select form-select-lg border-2" size="6" style="font-family: var(--font-mono);">
                            <!-- Generated via JS -->
                        </select>
                    </div>

                    <div id="error-alert" class="alert alert-danger d-none py-2 text-center text-sm"><i class="fa-solid fa-circle-exclamation me-1"></i> Invalid IP Structure.</div>
                </div>

                <!-- Outputs -->
                <div class="col-lg-7 ps-lg-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Analysis Vector</h5>

                    <ul class="list-group rounded-4 shadow-sm border-0 mb-4">
                        <li class="list-group-item p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted fw-bold">Subnet Mask</span>
                            <span id="out-mask" class="fw-bold text-dark fs-5 text-end" style="font-family: var(--font-mono);">255.255.255.0</span>
                        </li>
                        <li class="list-group-item p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted fw-bold">Network Address <i class="fa-solid fa-circle-info ms-1 text-secondary" title="First IP reserved for routing."></i></span>
                            <span id="out-net" class="fw-bold text-primary fs-5 text-end" style="font-family: var(--font-mono);">192.168.1.0</span>
                        </li>
                        <li class="list-group-item p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted fw-bold">Broadcast Address <i class="fa-solid fa-circle-info ms-1 text-secondary" title="Last IP reserved for LAN blasts."></i></span>
                            <span id="out-broad" class="fw-bold text-primary fs-5 text-end" style="font-family: var(--font-mono);">192.168.1.255</span>
                        </li>
                        <li class="list-group-item bg-light p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span class="text-muted fw-bold">Usable Host Range</span>
                            <span id="out-range" class="fw-bold text-success fs-6 text-end" style="font-family: var(--font-mono);">192.168.1.1 — 192.168.1.254</span>
                        </li>
                        <li class="list-group-item p-3 d-flex justify-content-between align-items-center border-0">
                            <span class="text-muted fw-bold">Total Usable Hosts</span>
                            <span id="out-hosts" class="fw-bold text-dark fs-3 text-end">254</span>
                        </li>
                    </ul>

                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Navigating IPv4 Network Subnetting</h2>
                    <p class="lead">Classless Inter-Domain Routing (CIDR) is the networking foundation underpinning AWS Virtual Private Clouds (VPCs), local corporate LANs, and Docker Bridge networks. Our <strong>Pro Subnet Calculator</strong> instantly resolves binary Bitmasks into their precise IP ranges.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the CIDR Slash</h3>
                    <p>An IPv4 address like `192.168.1.1` is fundamentally a 32-bit binary structure (four integers separated by dots, each containing 8 bits). When you append a mask suffix like `/24` it informs routers mathematically to <i>lock the first 24 bits for the network identifier</i>, leaving the remaining 8 bits available to assign dynamic hosts.</p>
                    <ul>
                        <li><strong>/32 (1 host):</strong> Locks all 32 bits. Specifically targets one single, exact server instance.</li>
                        <li><strong>/24 (254 hosts):</strong> The global standard for a traditional home WiFi router (from `.1` to `.254`).</li>
                        <li><strong>/16 (65,534 hosts):</strong> Used for expansive enterprise Local Area Networks.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Unusable Host Overheads</h3>
                    <p>When engineering AWS subnets, DevOps engineers frequently forget that the absolute Host calculation is `(2^n) - 2`. The "Network" and "Broadcast" IPs reside at the theoretical boundaries of the subnet scope and can <strong>never</strong> be assigned directly to an EC2 instance or client Node.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #0f172a, #334155); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
select[size] { height: 260px; overflow-y: auto; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const uiIp = document.getElementById('in-ip');
    const uiCidr = document.getElementById('in-cidr');
    const errAlert = document.getElementById('error-alert');

    const outMask = document.getElementById('out-mask');
    const outNet = document.getElementById('out-net');
    const outBroad = document.getElementById('out-broad');
    const outRange = document.getElementById('out-range');
    const outHosts = document.getElementById('out-hosts');

    // Populate CIDR dropdown (0 to 32)
    function initCidr() {
        let html = '';
        for (let i = 32; i >= 1; i--) {
            // Quick mask calc for label
            let m = (0xffffffff << (32 - i)) >>> 0;
            let maskStr = [m >>> 24, (m >>> 16) & 0xff, (m >>> 8) & 0xff, m & 0xff].join('.');
            let hosts = Math.max(0, Math.pow(2, 32 - i) - 2);
            if (i === 32) hosts = 1; // Technically 1 host route
            if (i === 31) hosts = 2; // Point-to-point RFC 3021
            
            let selected = i === 24 ? 'selected' : '';
            html += `<option value="${i}" ${selected}>/${i} &nbsp;&nbsp;(${maskStr}) &nbsp;&nbsp;[${hosts} Hosts]</option>`;
        }
        uiCidr.innerHTML = html;
    }
    
    initCidr();

    function int2ip(ipInt) {
        return ( (ipInt>>>24) +'.' + (ipInt>>16 & 255) +'.' + (ipInt>>8 & 255) +'.' + (ipInt & 255) );
    }

    function ip2int(ipStr) {
        let b = ipStr.split('.');
        if (b.length !== 4) return NaN;
        for (let x of b) {
            let n = parseInt(x);
            if (isNaN(n) || n < 0 || n > 255) return NaN;
        }
        return ((((((+b[0])*256)+(+b[1]))*256)+(+b[2]))*256)+(+b[3]);
    }

    function calculate() {
        const ipStr = uiIp.value.trim();
        const cidr = parseInt(uiCidr.value, 10);
        
        const ipInt = ip2int(ipStr);
        if (isNaN(ipInt)) {
            errAlert.classList.remove('d-none');
            return;
        }
        errAlert.classList.add('d-none');

        // Subnet Mask Math
        const maskInt = (0xffffffff << (32 - cidr)) >>> 0;
        const netInt = (ipInt & maskInt) >>> 0;
        
        // Broadcast
        // Inverse mask
        const invMask = (~maskInt) >>> 0;
        const broadInt = (netInt | invMask) >>> 0;

        outMask.textContent = int2ip(maskInt);
        outNet.textContent = int2ip(netInt);
        outBroad.textContent = int2ip(broadInt);

        // Host Calculations
        if (cidr >= 31) {
            // /31 and /32 special routing scenarios (No broadcast/net reserved technically)
            outRange.textContent = `${int2ip(netInt)} — ${int2ip(broadInt)}`;
            outHosts.textContent = cidr === 32 ? '1' : '2';
        } else {
            const firstHost = netInt + 1;
            const lastHost = broadInt - 1;
            outRange.textContent = `${int2ip(firstHost)} — ${int2ip(lastHost)}`;
            // 2^(32-cidr) - 2
            const total = Math.pow(2, 32 - cidr) - 2;
            outHosts.textContent = total.toLocaleString();
        }
    }

    uiIp.addEventListener('input', calculate);
    uiCidr.addEventListener('change', calculate);

    calculate(); // first run
});
</script>






