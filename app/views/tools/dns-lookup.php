<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="space-y-8 animate-fade-in">
        <!-- Input Section -->
        <div class="bg-slate-50 border-2 border-slate-100 rounded-[2.5rem] p-8 focus-within:border-indigo-500 focus-within:ring-4 focus-within:ring-indigo-500/10 transition-all">
            <form action="" method="POST" class="ajax-tool-form">
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] block px-1 mb-4">Domain Infrastructure Query</label>
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-6 flex items-center text-slate-400">
                            <i class="fa-solid fa-globe text-lg"></i>
                        </div>
                        <input type="text" name="text" class="w-full bg-white border-0 rounded-3xl py-5 pl-14 pr-6 font-bold text-slate-900 placeholder:text-slate-300 shadow-sm focus:ring-0" placeholder="e.g. cloudflare.com" required>
                    </div>
                    <button type="submit" class="px-10 py-5 bg-indigo-600 text-white rounded-3xl font-black uppercase tracking-[0.2em] text-sm shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3 group">
                        <i class="fa-solid fa-magnifying-glass text-lg group-hover:rotate-12 transition-transform"></i>
                        Lookup Records
                    </button>
                </div>
            </form>
        </div>

        <!-- Result Section -->
        <div id="toolResultWrapper" class="hidden space-y-6">
            <div class="flex justify-between items-center px-2">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center text-xs shadow-sm shadow-emerald-500/10">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Active DNS Payload</h5>
                </div>
                <div class="badge bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-tighter px-3 py-1.5 rounded-full border border-emerald-100">Live Query Successful</div>
            </div>
            
            <div class="bg-indigo-900 rounded-[2.5rem] p-8 shadow-2xl relative overflow-hidden group border border-white/5">
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-700"></div>
                
                <div id="toolResult" class="relative z-10">
                    <!-- Results will be injected here via AJAX -->
                </div>
            </div>
        </div>

        <!-- Placeholder -->
        <div id="result-placeholder" class="min-h-[300px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-column items-center justify-center text-center p-10 group hover:border-indigo-200 transition-all">
            <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-200 transition-all mb-6">
                <i class="fa-solid fa-server text-4xl"></i>
            </div>
            <p class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">DNS Resolver Ready</p>
            <p class="text-slate-300 text-sm mt-3 leading-relaxed">Enter a domain name to audit<br>its public DNS architecture.</p>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'DNS Lookup',
    'intro_title' => 'DNS: The Critical Infrastructure of Internet Navigation',
    'intro_content' => 'The Domain Name System (DNS) is the essential "phonebook" of the internet, translating human-readable hostnames into machine-accessible IP addresses. Our Professional DNS Lookup tool provides comprehensive visibility into a domain\'s public records, including A, MX, TXT, CNAME, and NS entries. Essential for network engineers and web developers, this utility helps verify record propagation, audit security headers (like SPF and DKIM), and troubleshoot configuration errors in real-time.',
    'detailed_title' => 'Deep Zone Analysis and Propagation Auditing',
    'detailed_content' => '<p>Understanding your domain\'s infrastructure is the first step in robust network security. Our tool provides high-fidelity reports for professional auditing:</p>
        <ul class="space-y-2 mt-4 text-sm font-medium">
            <li><strong>Global Recursive Resolution:</strong> Queries multiple global resolvers to ensure you are seeing the most accurate, non-cached zone data.</li>
            <li><strong>Security Header Verification:</strong> Instantly inspect TXT records for SPF, DMARC, and DKIM signatures to ensure email authentication integrity.</li>
            <li><strong>Mail Server (MX) Routing:</strong> Audit your mail exchange hierarchy to prevent delivery failures and ensure redundant gateway configurations.</li>
            <li><strong>Infrastructure Transparency:</strong> Easily map subdomains and service aliases (CNAMEs) to build a complete architectural overview of any web asset.</li>
        </ul>'
]);
?>


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
#toolResult table { width: 100%; border-collapse: separate; border-spacing: 0 8px; }
#toolResult th { text-align: left; padding: 12px 24px; text-transform: uppercase; font-size: 10px; font-weight: 900; color: rgba(255,255,255,0.4); letter-spacing: 0.1em; border: none !important; }
#toolResult td { padding: 16px 24px; background: rgba(255,255,255,0.03); color: #cbd5e1; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; font-size: 13px; border: none !important; }
#toolResult tr td:first-child { border-top-left-radius: 16px; border-bottom-left-radius: 16px; color: #818cf8; font-weight: 800; width: 80px; }
#toolResult tr td:last-child { border-top-right-radius: 16px; border-bottom-right-radius: 16px; }
#toolResult tr:hover td { background: rgba(255,255,255,0.06); color: #fff; }
</style>

<script>
$(document).ready(function() {
    const $form = $('.ajax-tool-form');
    const $wrapper = $('#toolResultWrapper');
    const $placeholder = $('#result-placeholder');
    const $result = $('#toolResult');

    $form.on('submit', function() {
        $placeholder.addClass('opacity-50 pointer-events-none');
    });

    // The actual AJAX success handling is usually global or in tools.js, 
    // but we can hook into it if needed or ensure the IDs match.
    // Based on previous tools, we might need to handle the display toggle.
    
    window.onToolSuccess = function(data) {
        $placeholder.addClass('hidden');
        $wrapper.removeClass('hidden').addClass('animate-fade-in');
        $result.html(data);
    };
});
</script>



<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>