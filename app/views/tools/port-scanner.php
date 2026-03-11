<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Configuration Box -->
            <div class="bg-slate-900 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary/10 rounded-full blur-[100px] group-hover:bg-primary/20 transition-all duration-1000"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-10">
                    <!-- Left: Inputs -->
                    <div class="lg:col-span-12 space-y-8">
                        <div class="max-w-xl mx-auto space-y-6">
                            <div class="text-center mb-8">
                                <h3 class="text-2xl font-black text-white uppercase tracking-widest mb-2">Network Port Auditor</h3>
                                <p class="text-indigo-200/60 text-[10px] font-black uppercase tracking-[0.2em]">Map Service Endpoints & Firewall States</p>
                            </div>

                            <div class="relative group/input">
                                <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                    <i class="fa-solid fa-server text-sm"></i>
                                </div>
                                <input type="text" id="scan-host" class="w-full bg-white/5 border-0 rounded-2xl py-4.5 pl-12 pr-6 font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/5 transition-all outline-none text-center sm:text-left" value="google.com" placeholder="e.g. example.com or 1.1.1.1">
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3" id="port-selection">
                                <?php 
                                $commonPorts = [
                                    ['80', 'HTTP', true],
                                    ['443', 'HTTPS', true],
                                    ['21', 'FTP', false],
                                    ['22', 'SSH', false],
                                    ['25', 'SMTP', false],
                                    ['3306', 'MySQL', false],
                                    ['110', 'POP3', false],
                                    ['5432', 'PGSQL', false]
                                ];
                                foreach ($commonPorts as $port):
                                ?>
                                <label class="relative flex flex-col items-center p-4 bg-white/5 border border-white/10 rounded-2xl cursor-pointer hover:bg-white/10 hover:border-white/20 transition-all group/port">
                                    <input type="checkbox" class="port-cb hidden" value="<?php echo $port[0]; ?>" <?php echo $port[2] ? 'checked' : ''; ?>>
                                    <span class="text-[10px] font-black text-indigo-300 uppercase tracking-widest mb-1 group-hover/port:text-white transition-colors"><?php echo $port[1]; ?></span>
                                    <span class="text-xs font-mono font-bold text-indigo-200/40 group-hover/port:text-indigo-200 transition-colors"><?php echo $port[0]; ?></span>
                                    <div class="absolute top-2 right-2 w-2 h-2 rounded-full bg-white/10 dot-indicator transition-all"></div>
                                </label>
                                <?php endforeach; ?>
                            </div>

                            <button id="scan-btn" class="w-full py-5 bg-white text-slate-900 rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl hover:bg-slate-50 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-4 group/btn">
                                <i class="fa-solid fa-radar text-lg group-hover/btn:rotate-12 transition-transform"></i>
                                Initiate Port Audit
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results Panel -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8">
                <div class="flex justify-between items-center px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center text-primary shadow-sm">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Audit Log</h5>
                            <p class="text-[11px] font-bold text-slate-900">Real-time connectivity results</p>
                        </div>
                    </div>
                    <div id="scan-progress-wrapper" class="flex items-center gap-4">
                        <div class="w-32 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div id="scan-progress-bar" class="h-full bg-primary transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <span id="scan-count" class="text-[10px] font-black text-slate-400 uppercase tracking-widest">0/0</span>
                    </div>
                </div>

                <div id="scan-results" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Dynamic Results -->
                </div>

                <!-- Mitigation Guidance -->
                <div class="bg-amber-50 border border-amber-100 rounded-[2.5rem] p-8 flex items-start gap-6">
                    <div class="w-12 h-12 bg-white text-amber-500 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0 border border-amber-200/50">
                        <i class="fa-solid fa-shield-halved text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-amber-900 uppercase tracking-widest mb-2 leading-none">Hardening Recommendation</h4>
                        <p class="text-[11px] font-bold text-amber-800/70 leading-relaxed uppercase tracking-tight">
                            Close any ports identified as "Open" that are not explicitly required for public services. For administrative ports like SSH (22) or Database (3306), implement IP-based whitelisting at the network firewall layer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
input.port-cb:checked + span { color: #fff; }
input.port-cb:checked ~ .dot-indicator { background-color: #10b981; box-shadow: 0 0 10px rgba(16, 185, 129, 0.5); }
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 10px; }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Port Scanner',
    'intro_title' => 'Digital Perimeter Audit: Mapping the Surface of Modern Infrastructure',
    'intro_content' => 'The Port Scanner is a mission-critical utility for systems administrators and security auditors designed to identify active service endpoints on local or remote servers. By systematically checking the connectivity status of common networking ports, it reveals potential entry points for both authorized traffic and malicious attempts. Our professional scanning suite provides a rapid, browser-driven assessment of your digital perimeter, ensuring your firewall configurations are operating as intended.',
    'detailed_title' => 'Service Profiling and Asymmetric Attack Surface Reduction',
    'detailed_content' => '<p>Maintaining a secure network posture requires comprehensive visibility into your server listening states. Our Professional Port Scanner offers enterprise-grade diagnostic intelligence:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Optimized Common Port Mapping:</strong> Instantly audit the most frequent targets for automated botnets, including HTTP, HTTPS, SSH, and standardized Database endpoints.</li>
            <li><strong>Asymmetric Connectivity Probing:</strong> Leverage advanced browser-side timeouts to differentiate between "Open" services, "Closed" sockets, and "Filtered" firewall drop rules.</li>
            <li><strong>Infrastructure Hardening Insights:</strong> Receive actionable guidance on closing unnecessary ports to shrink your attack surface and minimize potential exploit vectors.</li>
            <li><strong>Privacy-Compliant Discovery:</strong> Our scanner operates with absolute respect for network courtesy, using standardized connection attempts to provide architectural visibility without aggressive payload injection.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('scan-btn');
    const results = document.getElementById('scan-results');
    const progWrapper = document.getElementById('scan-progress-wrapper');
    const progressBar = document.getElementById('scan-progress-bar');
    const scanCount = document.getElementById('scan-count');

    btn.addEventListener('click', async () => {
        const host = document.getElementById('scan-host').value.trim();
        const checkedPorts = Array.from(document.querySelectorAll('.port-cb:checked')).map(cb => {
            return { val: parseInt(cb.value), label: cb.parentElement.querySelector('span').textContent };
        });

        if (!host) {
            showToast('Enter target host', 'error');
            return;
        }
        if (checkedPorts.length === 0) {
            showToast('Select ports to scan', 'error');
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Audit in Progress...';
        results.innerHTML = '';
        progWrapper.classList.remove('hidden');
        document.getElementById('result-wrapper').classList.remove('hidden');
        
        let completed = 0;
        scanCount.textContent = `0/${checkedPorts.length}`;

        for (const port of checkedPorts) {
            const status = await checkPort(host, port.val);
            
            const div = document.createElement('div');
            div.className = 'bg-gray-50 border border-gray-100 rounded-3xl p-6 flex flex-col items-center text-center animate-fade-in transition-all hover:bg-white hover:shadow-lg group shadow-sm';
            
            const statusClasses = status === 'open' ? 'text-emerald-500 bg-emerald-50' : 
                                status === 'closed' ? 'text-slate-400 bg-slate-100' : 'text-amber-500 bg-amber-50';
            
            div.innerHTML = `
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">${port.label}</div>
                <div class="text-2xl font-black text-slate-800 font-mono mb-4">${port.val}</div>
                <div class="px-4 py-1.5 rounded-full ${statusClasses} text-[9px] font-black uppercase tracking-widest flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-current ${status === 'open' ? 'animate-pulse' : ''}"></div>
                    ${status.toUpperCase()}
                </div>
            `;
            results.appendChild(div);
            
            completed++;
            progressBar.style.width = (completed / checkedPorts.length * 100) + '%';
            scanCount.textContent = `${completed}/${checkedPorts.length}`;
        }

        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-radar text-lg group-hover/btn:rotate-12 transition-transform"></i> Restart Audit';
        showToast('Infrastructure Scan Complete');
    });

    async function checkPort(host, port) {
        return new Promise((resolve) => {
            const start = Date.now();
            const img = new Image();
            img.onload = () => resolve('open');
            img.onerror = () => {
                const elapsed = Date.now() - start;
                // Heuristic: browser-rejected connection usually takes < 500ms
                if (elapsed < 1500) resolve('closed');
                else resolve('filtered');
            };
            img.src = `http://${host}:${port}/pro-audit-probe.ico?t=${start}`;
            // Absolute timeout for filtered/drop
            setTimeout(() => resolve('filtered'), 3000);
        });
    }
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>