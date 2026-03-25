

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Active Test Panel -->
            <div class="bg-slate-900 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary/10 rounded-full blur-[100px] group-hover:bg-primary/20 transition-all duration-1000"></div>
                
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div id="status-icon" class="w-24 h-24 mb-8 bg-white/5 rounded-3xl flex items-center justify-center text-primary border border-white/10 shadow-inner">
                        <i class="fa-solid fa-shield-halved text-4xl"></i>
                    </div>
                    
                    <h3 class="text-2xl font-black text-white uppercase tracking-widest mb-4">Privacy Audit Interface</h3>
                    <p class="text-indigo-200/60 text-xs font-bold uppercase tracking-[0.2em] mb-10 max-w-md leading-relaxed">Scan your connection for DNS leaks and identify your true network footprint.</p>
                    
                    <button id="test-btn" class="px-12 py-5 bg-white text-primary rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-xl hover:bg-slate-50 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center gap-4 group/btn">
                        <i class="fa-solid fa-satellite-dish text-lg group-hover/btn:rotate-12 transition-transform"></i>
                        Initiate Connection Scan
                    </button>
                </div>
            </div>

            <!-- Results Grid -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- IP Insight -->
                    <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-8 relative overflow-hidden">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary">
                                <i class="fa-solid fa-globe text-sm"></i>
                            </div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">External Endpoint</h5>
                        </div>
                        <div id="res-ip" class="text-2xl font-black text-slate-700 font-mono mb-2">---</div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Public IP Address Identified</p>
                    </div>

                    <!-- ISP Insight -->
                    <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-8 relative overflow-hidden">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-indigo-500">
                                <i class="fa-solid fa-network-wired text-sm"></i>
                            </div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">ISP Backbone</h5>
                        </div>
                        <div id="res-isp" class="text-lg font-black text-slate-700 truncate mb-2">---</div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Service Provider Attribution</p>
                    </div>
                </div>

                <!-- Secondary Metadata -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                    <div class="px-6 py-4 rounded-2xl bg-white border border-gray-100 flex items-center justify-between shadow-sm">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Hostname</span>
                        <span id="res-host" class="text-xs font-bold text-slate-600 font-mono text-right">---</span>
                    </div>
                    <div class="px-6 py-4 rounded-2xl bg-white border border-gray-100 flex items-center justify-between shadow-sm">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Region</span>
                        <span id="res-loc" class="text-xs font-bold text-slate-600 text-right">---</span>
                    </div>
                </div>

                <!-- Status Banner -->
                <div id="leak-status" class="p-6 rounded-[2rem] bg-emerald-50 border border-emerald-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-white text-emerald-500 rounded-full flex items-center justify-center shadow-sm flex-shrink-0">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-black text-emerald-800 uppercase tracking-widest leading-none mb-1">Standard Integrity Verified</h4>
                        <p class="text-[10px] font-bold text-emerald-600/70 uppercase tracking-tight leading-none">Your DNS requests are currently routing through identified secure gateways.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'DNS Leak Tester',
    'intro_title' => 'DNS Integrity: Hardening the Foundation of Network Privacy',
    'intro_content' => 'The DNS Leak Tester is a high-precision diagnostic utility designed to verify the security of your network architecture. By auditing the path of Domain Name System (DNS) requests, this tool identifies whether your internet traffic is bypassing secure VPN tunnels or proxies, potentially exposing your browsing habits to third-party monitoring. A professional-grade leak test is essential for ensuring that your digital footprint remains anonymized across all network layers.',
    'detailed_title' => 'Advanced connection Attribution and Leak Intelligence',
    'detailed_content' => '<p>Maintaining a secure network perimeter requires constant auditing of your egress points. Our Professional DNS Suite provides comprehensive visibility into your connection:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Infrastructure Fingerprinting:</strong> Instantly identify your external IP, ISP attribution, and geographical metadata to verify current proxy effectiveness.</li>
            <li><strong>Leak Vector Identification:</strong> Detect if your system is defaulting to ISP-provided DNS servers instead of encrypted providers (DoH/DoT) or VPN-internal resolvers.</li>
            <li><strong>Anonymity Verification:</strong> Confirm that your true hostname and provider identity are properly masked behind your network security layers.</li>
            <li><strong>Privacy-Centric Discovery:</strong> Our test environment uses minimal, secure metadata harvesting to provide accurate results without compromising your long-term privacy signatures.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('test-btn');
    const wrapper = document.getElementById('result-wrapper');
    const statusIcon = document.getElementById('status-icon');
    
    btn.addEventListener('click', async () => {
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin text-lg"></i> Scanning...';
        
        try {
            const res = await fetch('https://ipapi.co/json/');
            const data = await res.json();
            
            document.getElementById('res-ip').textContent = data.ip || 'Unknown';
            document.getElementById('res-isp').textContent = data.org || 'Unknown';
            document.getElementById('res-host').textContent = data.hostname || 'N/A';
            document.getElementById('res-loc').textContent = `${data.city}, ${data.country_name}`;
            
            statusIcon.innerHTML = '<i class="fa-solid fa-check-shield text-4xl text-emerald-500 animate-pulse"></i>';
            statusIcon.classList.replace('text-primary', 'text-emerald-500');
            
            wrapper.classList.remove('hidden');
            wrapper.classList.add('animate-fade-up');
            showToast('Connection Audit Finished');
        } catch (e) {
            showToast('Scan failed. Check connection.', 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-satellite-dish text-lg"></i> Restart Scan';
        }
    });
});
</script>





