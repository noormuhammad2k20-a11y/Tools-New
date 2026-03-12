<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 animate-fade-in">
            <!-- Configuration Area -->
            <div class="lg:col-span-12 space-y-8">
                <div class="bg-indigo-900 rounded-[2.5rem] p-8 sm:p-12 shadow-2xl relative overflow-hidden group border border-white/5">
                    <div class="absolute -top-24 -right-24 w-80 h-80 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-1000"></div>
                    
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                        <!-- Security Toggles -->
                        <div class="space-y-6">
                            <h4 class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] mb-4">Integrity & Security Rules</h4>
                            
                            <div class="space-y-4">
                                <?php 
                                $rules = [
                                    ['hta-https', 'Force HTTPS Redirect', 'Redirect all traffic from HTTP to secure HTTPS'],
                                    ['hta-www', 'Force WWW Prefix', 'Ensure your domain always uses www.'],
                                    ['hta-nonwww', 'Force Non-WWW', 'Strip www. from all incoming requests'],
                                    ['hta-index', 'Disable Directory Browsing', 'Prevent users from seeing file listings']
                                ];
                                foreach ($rules as $r):
                                ?>
                                <label class="flex items-center gap-4 group/item cursor-pointer">
                                    <div class="relative w-6 h-6 shrink-0">
                                        <input type="checkbox" id="<?php echo $r[0]; ?>" class="peer hidden hta-input">
                                        <div class="absolute inset-0 bg-white/10 rounded-lg border-2 border-white/10 peer-checked:bg-white peer-checked:border-white transition-all"></div>
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 peer-checked:opacity-100 text-indigo-900 transition-opacity">
                                            <i class="fa-solid fa-check text-[10px] font-black"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-white group-hover/item:text-indigo-200 transition-colors uppercase tracking-tight"><?php echo $r[1]; ?></p>
                                        <p class="text-[9px] font-bold text-indigo-400 uppercase tracking-tighter opacity-0 group-hover/item:opacity-100 transition-all"><?php echo $r[2]; ?></p>
                                    </div>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Path Inputs -->
                        <div class="space-y-8 h-full flex flex-col justify-between">
                            <div class="space-y-6">
                                <div>
                                    <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] block px-1 mb-3">Custom 404 Error Path</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                            <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                                        </div>
                                        <input type="text" id="hta-404" class="hta-input w-full bg-white/10 border-0 rounded-2xl py-4 pl-12 pr-6 font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/10 transition-all font-mono" placeholder="/404.php">
                                    </div>
                                </div>

                                <div>
                                    <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] block px-1 mb-3">Rewrite Base Path</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-5 flex items-center text-indigo-400">
                                            <i class="fa-solid fa-folder-tree text-sm"></i>
                                        </div>
                                        <input type="text" id="hta-base" class="hta-input w-full bg-white/10 border-0 rounded-2xl py-4 pl-12 pr-6 font-bold text-white placeholder:text-indigo-300/30 shadow-inner focus:ring-4 focus:ring-white/10 transition-all font-mono" placeholder="/" value="/">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-white/5">
                                <div class="flex items-center gap-4 px-2">
                                    <div class="w-10 h-10 bg-white/5 rounded-2xl flex items-center justify-center text-indigo-300">
                                        <i class="fa-solid fa-server"></i>
                                    </div>
                                    <p class="text-[9px] font-bold text-indigo-300 uppercase leading-relaxed tracking-wider">Apache 2.4+ Compliant Logic<br>Optimized for Performance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Result Area -->
            <div id="result-wrapper" class="lg:col-span-12 space-y-6">
                <div class="flex justify-between items-center px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-sm shadow-sm">
                            <i class="fa-solid fa-code"></i>
                        </div>
                        <div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Synthesized .htaccess Directives</h5>
                            <p class="text-xs font-bold text-slate-900">Copy to your server configuration</p>
                        </div>
                    </div>
                    <button onclick="copyResult()" class="text-[10px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-6 py-2.5 rounded-full uppercase tracking-widest transition-all">Copy Directives</button>
                </div>
                
                <div class="bg-indigo-900 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-white/5 h-[300px] flex flex-col">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-[100px]"></div>
                    <pre id="output-code" class="relative z-10 w-full h-full bg-transparent border-0 font-mono text-sm font-black text-indigo-200 break-all leading-relaxed custom-scrollbar overflow-y-auto pr-2 selection:bg-indigo-400 selection:text-white outline-none m-0"></pre>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.custom-scrollbar::-webkit-scrollbar { width: 4px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
</style>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => '.htaccess Generator',
    'intro_title' => '.htaccess: Dynamic Server Configuration and Security Hardening',
    'intro_content' => 'The .htaccess Generator is an essential utility for implementing high-level directives on Apache and Nginx web servers. It allows developers to configure critical server-side logic—such as 301/302 redirects, custom error documents, and URL rewriting—without manually editing sensitive configuration manifests. Our Professional .htaccess Suite provides a streamlined, client-side interface for synthesizing optimized, production-ready server rules with maximum accuracy.',
    'detailed_title' => 'Rewrite Engines and Runtime Policy Management',
    'detailed_content' => '<p>Configuring your server\'s runtime environment requires precise syntax and robust rule-set validation. Our Professional .htaccess tool offers:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium text-slate-600">
            <li><strong>Optimized Redirection Logic:</strong> Transform legacy URL structures and enforce canonical domain models with high-performance rewrite conditions.</li>
            <li><strong>Security Best-Practice Pre-Sets:</strong> Rapidly implement server-side hardening against directory crawling and insecure transport with single-click directives.</li>
            <li><strong>RFC Compliant Syntax:</strong> Our engine generates Apache 2.4+ compatible code, ensuring seamless execution across modern hosting environments.</li>
            <li><strong>Local Configuration Synthesis:</strong> All server rules are generated strictly within your browser environment, preserving the confidentiality of your private routing strategies.</li>
        </ul>'
]);
?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const output = document.getElementById('output-code');
    const htaInputs = document.querySelectorAll('.hta-input');

    const generate = () => {
        let code = `RewriteEngine On\n`;
        const base = document.getElementById('hta-base').value || '/';
        code += `RewriteBase ${base}\n\n`;

        if (document.getElementById('hta-https').checked) {
            code += `# Redirect HTTP to HTTPS\n`;
            code += `RewriteCond %{HTTPS} off\n`;
            code += `RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n\n`;
        }

        if (document.getElementById('hta-www').checked) {
            code += `# Force WWW Prefix\n`;
            code += `RewriteCond %{HTTP_HOST} !^www\\. [NC]\n`;
            code += `RewriteRule ^(.*)$ http://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n\n`;
        }

        if (document.getElementById('hta-nonwww').checked) {
            code += `# Force Non-WWW\n`;
            code += `RewriteCond %{HTTP_HOST} ^www\\.(.+)$ [NC]\n`;
            code += `RewriteRule ^(.*)$ http://%1%{REQUEST_URI} [L,R=301]\n\n`;
        }

        if (document.getElementById('hta-index').checked) {
            code += `# Disable directory listings\n`;
            code += `Options -Indexes\n\n`;
        }

        const custom404 = document.getElementById('hta-404').value.trim();
        if (custom404) {
            code += `# Custom 404 error page\n`;
            code += `ErrorDocument 404 ${custom404}\n\n`;
        }

        output.textContent = code.trim();
    };

    htaInputs.forEach(el => {
        el.addEventListener('change', generate);
        el.addEventListener('input', generate);
    });

    window.copyResult = () => {
        navigator.clipboard.writeText(output.textContent).then(() => {
            showToast('Directives copied to clipboard');
        });
    };

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>