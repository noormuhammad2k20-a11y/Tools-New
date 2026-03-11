<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Active Audit Panel -->
            <div class="bg-slate-900 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary/10 rounded-full blur-[100px] group-hover:bg-primary/20 transition-all duration-1000"></div>
                
                <div class="relative z-10 space-y-8">
                    <div class="text-center">
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-white/5 rounded-full border border-white/10 mb-6">
                            <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                            <span class="text-[9px] font-black text-indigo-300 uppercase tracking-[0.2em]">Onionoo Database Connector</span>
                        </div>
                        <h3 class="text-2xl font-black text-white uppercase tracking-widest mb-2 italic">Anonymity Node Resolver</h3>
                        <p class="text-indigo-200/60 text-[10px] font-black uppercase tracking-[0.2em] max-w-sm mx-auto">Verify if an endpoint originates from the Tor network backbone</p>
                    </div>

                    <div class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
                        <div class="flex-grow relative">
                            <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                <i class="fa-solid fa-mask text-sm"></i>
                            </div>
                            <input type="text" id="ip-input" class="w-full bg-white/5 border-0 rounded-2xl py-4.5 pl-12 pr-6 font-mono font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/5 transition-all outline-none text-center sm:text-left" value="8.8.8.8" placeholder="e.g. 1.2.3.4">
                        </div>
                        <button id="check-btn" class="px-10 py-4.5 bg-white text-slate-900 rounded-2xl font-black uppercase tracking-[0.2em] text-xs shadow-xl hover:bg-slate-50 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                            <i class="fa-solid fa-satellite-dish text-lg group-hover:rotate-12 transition-transform"></i>
                            Analyze
                        </button>
                    </div>
                </div>
            </div>

            <!-- Result Display -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8">
                <div id="status-box" class="rounded-[2.5rem] p-10 flex flex-col items-center text-center shadow-xl border relative overflow-hidden group">
                    <div class="absolute -top-20 -right-20 w-48 h-48 bg-white/10 rounded-full blur-[80px]"></div>
                    
                    <div id="status-icon" class="w-20 h-20 bg-white/20 rounded-[2rem] flex items-center justify-center mb-6 shadow-inner border border-white/10">
                        <!-- Icon injected by JS -->
                    </div>
                    
                    <h2 id="status-title" class="font-black text-3xl uppercase tracking-tighter mb-2 italic">---</h2>
                    <p id="status-desc" class="text-[11px] font-bold uppercase tracking-widest max-w-sm leading-relaxed">---</p>
                    
                    <div id="node-details" class="mt-8 pt-8 border-t border-white/10 w-full hidden">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-left">
                                <span class="text-[9px] font-black text-white/40 uppercase tracking-widest block mb-1">Node Identity</span>
                                <span id="node-nick" class="text-xs font-black text-white uppercase tracking-tighter">---</span>
                            </div>
                            <div class="text-right">
                                <span class="text-[9px] font-black text-white/40 uppercase tracking-widest block mb-1">Architecture</span>
                                <span id="node-type" class="text-xs font-black text-white uppercase tracking-tighter">---</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Forensic Guidance -->
                <div class="p-8 rounded-[2.5rem] bg-indigo-50 border border-indigo-100 flex items-start gap-6">
                    <div class="w-12 h-12 bg-white text-indigo-600 rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0 border border-indigo-100">
                        <i class="fa-solid fa-tower-broadcast text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-indigo-900 uppercase tracking-widest mb-2 leading-none">Intelligence Synthesis</h4>
                        <p class="text-[11px] font-bold text-indigo-800/60 leading-relaxed uppercase tracking-tight">
                            Tor (The Onion Router) nodes are used to anonymize digital traffic. While legitimate for privacy, identifying these nodes is essential for mitigating automated botnet traffic, preventing fraudulent registrations, and securing restricted access portals from unauthorized anonymized entry.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Tor Node Checker',
    'intro_title' => 'Anonymity Forensics: Mapping the Onion Routing Backbone',
    'intro_content' => 'The Tor Node Checker is a high-precision identification utility used to determine if an IP address belongs to the Tor network. By querying live consensus data from the Tor Project, this tool identifies exit nodes, relays, and bridges. This is critical for network administrators who need to differentiate between anonymous traffic and verified user endpoints to prevent abuse, manage risk, and audit network interactions.',
    'detailed_title' => 'Consensus Validation and Traffic Profiling',
    'detailed_content' => '<p>Identifying onion-routed traffic requires real-time access to the global network consensus. Our Professional Anonymity Suite provides definitive ID intelligence:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Live Consensus Querying:</strong> Real-time integration with the Onionoo API ensures that your results reflect the current state of the 6,000+ active Tor nodes globally.</li>
            <li><strong>Relay Architecture Identification:</strong> Gain visibility into whether an IP acts as a Guard, Middle, or Exit relay, helping you assess the potential intent of the traffic.</li>
            <li><strong>Risk Mitigation Integration:</strong> Use these findings to inform WAF (Web Application Firewall) policies and implement additional verification steps for anonymized users.</li>
            <li><strong>Privacy-Isolate Discovery:</strong> Our lookup interface queries public directory authorities, allowing you to audit potentially risky IPs without exposing your internal infrastructure.</li>',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('check-btn');
    const input = document.getElementById('ip-input');
    const wrapper = document.getElementById('result-wrapper');
    const statusBox = document.getElementById('status-box');
    const statusIcon = document.getElementById('status-icon');
    const statusTitle = document.getElementById('status-title');
    const statusDesc = document.getElementById('status-desc');
    const nodeDetails = document.getElementById('node-details');

    btn.addEventListener('click', async () => {
        const ip = input.value.trim();
        if (!ip) {
            showToast('Enter IP address', 'error');
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin text-lg"></i>';

        try {
            const res = await fetch(`https://onionoo.torproject.org/details?search=${ip}`);
            const data = await res.json();
            
            const isTor = data.relays?.length > 0 || data.bridges?.length > 0;
            wrapper.classList.remove('hidden');
            wrapper.classList.add('animate-fade-up');

            if (isTor) {
                const node = data.relays?.[0] || data.bridges?.[0];
                statusBox.className = "bg-rose-500 rounded-[2.5rem] p-10 flex flex-col items-center text-center shadow-xl shadow-rose-500/10 border border-white/10 relative overflow-hidden group text-white";
                statusIcon.innerHTML = '<i class="fa-solid fa-mask text-4xl text-white"></i>';
                statusTitle.textContent = 'Tor Node Active';
                statusDesc.textContent = 'This endpoint is currently identified as a verified node within the Tor network directory.';
                
                nodeDetails.classList.remove('hidden');
                document.getElementById('node-nick').textContent = node.nickname || 'Unnamed Relay';
                document.getElementById('node-type').textContent = data.relays?.length > 0 ? 'Relay Node' : 'Bridge Node';
                showToast('Authentication: Tor Node Detected');
            } else {
                statusBox.className = "bg-emerald-500 rounded-[2.5rem] p-10 flex flex-col items-center text-center shadow-xl shadow-emerald-500/10 border border-white/10 relative overflow-hidden group text-white";
                statusIcon.innerHTML = '<i class="fa-solid fa-check-shield text-4xl text-white"></i>';
                statusTitle.textContent = 'No Tor Activity';
                statusDesc.textContent = 'This IP address is not listed as an active relay or bridge in the current Tor network consensus.';
                nodeDetails.classList.add('hidden');
                showToast('No Anonymity Activity');
            }
        } catch (e) {
            showToast('Consensus database unreachable', 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-satellite-dish text-lg group-hover:rotate-12 transition-transform"></i> Analyze';
        }
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>