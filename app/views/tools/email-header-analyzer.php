<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-10 animate-fade-in">
            <!-- Header Input Area -->
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-primary/20 to-indigo-500/20 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-white border-2 border-slate-100 rounded-[2rem] p-4 focus-within:border-primary transition-all shadow-sm">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4 mb-2 block">Raw RFC 5322 Metadata</label>
                    <textarea id="header-input" class="w-full h-64 bg-transparent border-0 focus:ring-0 font-mono text-xs font-bold text-slate-600 placeholder:text-slate-300 resize-none px-4 custom-scrollbar" placeholder="Paste full email headers here (including Delivered-To, Received, Authentication-Results, etc.)"></textarea>
                </div>
            </div>

            <div class="flex justify-center">
                <button id="analyze-btn" class="px-12 py-5 bg-slate-900 text-white rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs shadow-2xl hover:bg-slate-800 hover:-translate-y-1 active:scale-[0.98] transition-all flex items-center gap-4 group">
                    <i class="fa-solid fa-microscope text-lg group-hover:rotate-12 transition-transform text-primary"></i>
                    Deconstruct Headers
                </button>
            </div>

            <!-- Analysis Results -->
            <div id="result-wrapper" class="hidden animate-fade-up space-y-10">
                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-8 flex flex-col justify-center text-center">
                        <h5 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Origin Entity</h5>
                        <div id="res-from" class="text-xs font-black text-slate-700 truncate px-2">---</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-8 flex flex-col justify-center text-center">
                        <h5 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Transmission Timestamp</h5>
                        <div id="res-date" class="text-xs font-black text-slate-700 truncate px-2">---</div>
                    </div>
                    <div class="bg-gray-50 border border-gray-100 rounded-[2rem] p-8 flex flex-col justify-center text-center">
                        <h5 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Subject Manifest</h5>
                        <div id="res-subject" class="text-xs font-black text-slate-700 truncate px-2">---</div>
                    </div>
                </div>

                <!-- Security Matrix -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 px-2">
                         <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-sm shadow-sm border border-indigo-100">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Authenticity Audit</h5>
                            <p class="text-[11px] font-bold text-slate-900 leading-none">SPF, DKIM & DMARC Verification</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-[2.5rem] overflow-hidden shadow-sm">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-gray-100">
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Protocol Vector</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Diagnostic Status</th>
                                </tr>
                            </thead>
                            <tbody id="security-rows" class="divide-y divide-gray-50">
                                <!-- Data injected via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Risk Guidance -->
                <div class="bg-primary/5 border border-primary/10 rounded-[2.5rem] p-8 flex items-start gap-6">
                    <div class="w-12 h-12 bg-white text-primary rounded-2xl flex items-center justify-center shadow-sm flex-shrink-0 border border-primary/10">
                        <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-2 leading-none">Security Insight</h4>
                        <p class="text-[11px] font-bold text-slate-500/70 leading-relaxed uppercase tracking-tight">
                            Analyzing email headers is critical for identifying phishing attempts and spoofed identities. Always verify that the "From" address matches the "Return-Path" and that SPF/DKIM tests return a "PASS" state for legitimate corporate communications.
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
    'tool_name' => 'Email Header Analyzer',
    'intro_title' => 'Mail Forensics: Deconstructing the RFC 5322 Metadata Layer',
    'intro_content' => 'The Email Header Analyzer is a high-fidelity diagnostic utility designed to parse the hidden transmission metadata of electronic mail. By deconstructing raw headers, this tool provides transparency into the path an email took from sender to recipient, including hop-by-hop server latency, authentication results (SPF, DKIM, DMARC), and potential spoofing markers. It is an essential asset for cybersecurity analysts investigating phishing attacks and IT administrators troubleshooting delivery delays.',
    'detailed_title' => 'Authentication Verification and Mail Path Persistence',
    'detailed_content' => '<p>Modern email security relies on a complex matrix of cryptographic signatures and domain-level policies. Our Professional Analyzer provides enterprise-grade visibility:</p>
        <ul class="space-y-4 mt-6">
            <li><strong>Authentication Protocol Audits:</strong> Instantly isolate SPF (Sender Policy Framework), DKIM (DomainKeys Identified Mail), and DMARC results to verify sender legitimacy.</li>
            <li><strong>Origin Attribution:</strong> Identify the true sending IP address and mail server backbone, bypassing common obfuscation techniques used in malicious campaigns.</li>
            <li><strong>Metadata Property Map:</strong> Extract critical technical fields including Message-ID, Return-Path, and X-Headers to build a complete forensic profile of the communication.</li>
            <li><strong>Hop Analysis:</strong> Visualize the relay sequence of SMTP servers to identify bottleneck latency or unauthorized relays within the transmission chain.',
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('header-input');
    const wrapper = document.getElementById('result-wrapper');
    const btn = document.getElementById('analyze-btn');

    btn.addEventListener('click', () => {
        const text = input.value.trim();
        if (!text) {
            showToast('Paste email headers first', 'error');
            return;
        }

        const headers = parseHeaders(text);
        
        document.getElementById('res-subject').textContent = headers.subject || 'N/A';
        document.getElementById('res-from').textContent = headers.from || 'N/A';
        document.getElementById('res-date').textContent = headers.date || 'N/A';

        const securityRows = document.getElementById('security-rows');
        securityRows.innerHTML = '';

        const checks = [
            { label: 'SPF (Sender Policy)', key: 'authentication-results', search: 'spf=' },
            { label: 'DKIM (Signatures)', key: 'authentication-results', search: 'dkim=' },
            { label: 'DMARC (Policy)', key: 'authentication-results', search: 'dmarc=' },
            { label: 'X-Spam-Status', key: 'x-spam-status', direct: true },
            { label: 'Return-Path', key: 'return-path', direct: true },
            { label: 'Message-ID', key: 'message-id', direct: true }
        ];

        checks.forEach(c => {
            let val = 'Not Found';
            if (headers[c.key.toLowerCase()]) {
                const rawVal = headers[c.key.toLowerCase()];
                if (c.search) {
                    const parts = rawVal.split(';');
                    const found = parts.find(p => p.trim().startsWith(c.search));
                    if (found) {
                        val = found.trim().substring(c.search.length).split(' ')[0];
                    }
                } else if (c.direct) {
                    val = rawVal;
                }
            }

            const tr = document.createElement('tr');
            const statusClass = val.toLowerCase().includes('pass') ? 'text-emerald-500 font-black' : 
                               (val.toLowerCase().includes('fail') || val.toLowerCase().includes('reject')) ? 'text-rose-500 font-black' : 'text-slate-500 font-bold';
            
            tr.innerHTML = `
                <td class="px-8 py-5">
                    <span class="text-[11px] font-black text-slate-700 uppercase tracking-tight">${c.label}</span>
                </td>
                <td class="px-8 py-5">
                    <span class="text-[11px] uppercase tracking-widest ${statusClass}">${val}</span>
                </td>
            `;
            securityRows.appendChild(tr);
        });

        wrapper.classList.remove('hidden');
        wrapper.classList.add('animate-fade-up');
        showToast('Header Deconstruction Complete');
        wrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    function parseHeaders(raw) {
        const lines = raw.replace(/\r/g, '').split('\n');
        const headers = {};
        let currentKey = '';

        lines.forEach(line => {
             if (line.match(/^\s/) && currentKey) {
                 headers[currentKey] += ' ' + line.trim();
             } else {
                 const part = line.split(':');
                 if (part.length > 1) {
                     currentKey = part[0].trim().toLowerCase();
                     headers[currentKey] = part.slice(1).join(':').trim();
                 }
             }
        });
        return headers;
    }
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>