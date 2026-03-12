<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Search Panel -->
            <div class="bg-slate-900 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-primary/10 rounded-full blur-[100px] group-hover:bg-primary/20 transition-all duration-1000"></div>
                
                <div class="relative z-10 space-y-8">
                    <div class="text-center">
                        <h3 class="text-2xl font-black text-white uppercase tracking-widest mb-2">Hardware Identity Resolver</h3>
                        <p class="text-indigo-200/60 text-[10px] font-black uppercase tracking-[0.2em]">Identify Manufacturers via OUI Database</p>
                    </div>

                    <div class="max-w-xl mx-auto flex flex-col sm:flex-row gap-4">
                        <div class="flex-grow relative">
                            <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                <i class="fa-solid fa-microchip text-sm"></i>
                            </div>
                            <input type="text" id="mac-input" class="w-full bg-white/5 border-0 rounded-2xl py-4.5 pl-12 pr-6 font-mono font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/5 transition-all outline-none text-center sm:text-left" placeholder="00:1A:2B:3C:4D:5E">
                        </div>
                        <button id="lookup-btn" class="px-10 py-4.5 bg-white text-slate-900 rounded-2xl font-black uppercase tracking-[0.2em] text-xs shadow-xl hover:bg-slate-50 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                            <i class="fa-solid fa-magnifying-glass text-lg group-hover:rotate-12 transition-transform"></i>
                            Resolve
                        </button>
                    </div>

                    <div class="flex justify-center gap-4">
                        <span class="px-3 py-1 bg-white/5 rounded-full text-[9px] font-black text-indigo-300/50 uppercase tracking-widest">Supports : and - separators</span>
                        <span class="px-3 py-1 bg-white/5 rounded-full text-[9px] font-black text-indigo-300/50 uppercase tracking-widest">IEEE OUI Standard</span>
                    </div>
                </div>
            </div>

            <!-- Results Display -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Major Result -->
                    <div class="lg:col-span-2 bg-gray-50 border border-gray-100 rounded-[2.5rem] p-10 relative overflow-hidden flex flex-col justify-center min-h-[220px]">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-primary border border-gray-100">
                                <i class="fa-solid fa-industry text-sm"></i>
                            </div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Registered Manufacturer</h5>
                        </div>
                        <div id="res-vendor" class="text-2xl sm:text-3xl font-black text-slate-700 leading-tight mb-2">---</div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Hardware Entity Attribution</p>
                    </div>

                    <!-- Side Stats -->
                    <div class="bg-primary/5 border border-primary/10 rounded-[2.5rem] p-10 flex flex-col justify-center">
                        <div class="space-y-8">
                            <div>
                                <h5 class="text-[10px] font-black text-primary/40 uppercase tracking-widest leading-none mb-3">OUI Prefix</h5>
                                <div id="res-oui" class="text-xl font-black text-primary/80 font-mono tracking-tighter">---</div>
                            </div>
                            <div>
                                <h5 class="text-[10px] font-black text-primary/40 uppercase tracking-widest leading-none mb-3">Lookup Status</h5>
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                                    <span class="text-xs font-black text-emerald-600 uppercase tracking-widest">Matches Identity</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guidance -->
                <div class="p-6 rounded-[2rem] bg-indigo-50 border border-indigo-100 flex items-start gap-4">
                    <div class="w-10 h-10 bg-white text-indigo-500 rounded-xl flex items-center justify-center shadow-sm flex-shrink-0 border border-indigo-200/50">
                        <i class="fa-solid fa-circle-info text-lg"></i>
                    </div>
                    <div class="text-[11px] font-bold text-indigo-800 leading-relaxed uppercase tracking-tight">
                        The Organizationally Unique Identifier (OUI) is the first 24 bits of a MAC address. Identifying the OUI helps troubleshoot network hardware, identify unauthorized devices, and verify hardware authenticity.
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'MAC Address Lookup',
    'intro_title' => 'Hardware Forensics: Identifying Network Entity Manufacturers',
    'intro_content' => 'The MAC Address Lookup is a specialized hardware diagnostics utility used to resolve Organizationally Unique Identifiers (OUIs) to their respective manufacturers. By analyzing the 48-bit Media Access Control address of a networking device, this tool provides critical forensic data about its origin. This is instrumental for network administrators identifying rogue devices, security specialists conducting hardware audits, and developers troubleshooting driver-level network interactions.',
    'detailed_title' => 'The OUI Standard and Hardware Architecture Analysis',
    'detailed_content' => '<p>Modern local area networks (LANs) rely on unique hardware identifiers maintained by the IEEE. Our Professional Hardware Suite offers precise OUI attribution:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Universal Vendor Mapping:</strong> Leverage a comprehensive database of manufacturers including Cisco, Intel, Samsung, Apple, and thousands of specialized hardware vendors.</li>
            <li><strong>Automated OUI Extraction:</strong> Simply input the full MAC address; our system automatically isolates the 24-bit OUI prefix required for manufacturer identification.</li>
            <li><strong>Network Inventory Hardening:</strong> Rapidly audit your DHCP tables and ARP caches to identify hardware types and ensure only authorized vendor equipment is connected.</li>
            <li><strong>Faultless Input Support:</strong> Native handling of multiple notation styles including colon-separated (00:00:00), hyphenated (00-00-00), and flat hexadecimal strings.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('mac-input');
    const btn = document.getElementById('lookup-btn');
    const wrapper = document.getElementById('result-wrapper');

    btn.addEventListener('click', async () => {
        let mac = input.value.trim();
        if (!mac) {
            showToast('Enter MAC address', 'error');
            return;
        }

        // Clean MAC
        const cleanMac = mac.replace(/[:-]/g, '').toUpperCase();
        if (!/^[0-9A-F]{6,12}$/i.test(cleanMac)) {
            showToast('Invalid format', 'error');
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i>';

        try {
            const response = await fetch(`https://api.macvendors.com/${cleanMac}`);
            if (response.ok) {
                const vendor = await response.text();
                document.getElementById('res-vendor').textContent = vendor;
                document.getElementById('res-oui').textContent = mac.substring(0, 8).toUpperCase();
                
                wrapper.classList.remove('hidden');
                wrapper.classList.add('animate-fade-up');
                showToast('Hardware Identity Identified');
            } else {
                showToast('Vendor not found', 'info');
            }
        } catch (e) {
            showToast('API Limit or Network Error', 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-magnifying-glass text-lg group-hover:rotate-12 transition-transform"></i> Resolve';
        }
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>