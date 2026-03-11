<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <div class="space-y-8 animate-fade-in">
            <!-- Input Section -->
            <div class="bg-indigo-900 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden group">
                <div class="absolute -top-24 -right-24 w-80 h-80 bg-white/5 rounded-full blur-[100px] group-hover:bg-white/10 transition-all duration-1000"></div>
                
                <form action="" method="POST" class="ajax-tool-form relative z-10">
                    <label class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.3em] block px-1 mb-5">Global Directory Query</label>
                    <div class="flex flex-col sm:flex-row gap-5">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-6 flex items-center text-indigo-400">
                                <i class="fa-solid fa-globe text-xl"></i>
                            </div>
                            <input type="text" name="text" class="w-full bg-white/10 border-0 rounded-3xl py-6 pl-16 pr-8 font-bold text-white placeholder:text-indigo-300/50 shadow-inner focus:ring-4 focus:ring-white/10 transition-all text-lg" placeholder="e.g. apple.com" required>
                        </div>
                        <button type="submit" class="px-12 py-6 bg-white text-indigo-900 rounded-3xl font-black uppercase tracking-[0.2em] text-sm shadow-xl hover:bg-slate-50 hover:scale-[1.05] active:scale-[0.95] transition-all flex items-center justify-center gap-3 group">
                            <i class="fa-solid fa-fingerprint text-xl group-hover:rotate-12 transition-transform"></i>
                            Query WHOIS
                        </button>
                    </div>
                </form>
            </div>

            <!-- Result Section -->
            <div id="toolResultWrapper" class="hidden space-y-6">
                <div class="flex justify-between items-center px-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-sm shadow-sm">
                            <i class="fa-solid fa-database"></i>
                        </div>
                        <div>
                            <h5 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Registrar Intelligence</h5>
                            <p class="text-xs font-bold text-slate-900">Official Database Response</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="copyWhois()" class="text-[10px] font-black text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-full uppercase tracking-widest transition-all">Copy Text</button>
                    </div>
                </div>
                
                <div class="bg-slate-50 border-2 border-slate-100 rounded-[2.5rem] p-8 relative min-h-[400px]">
                    <div id="toolResult" class="font-mono text-sm text-slate-600 leading-relaxed whitespace-pre-wrap break-all selection:bg-indigo-100 selection:text-indigo-900">
                        <!-- Results will be injected here via AJAX -->
                    </div>
                </div>
            </div>

            <!-- Placeholder -->
            <div id="result-placeholder" class="min-h-[350px] border-2 border-dashed border-slate-100 rounded-[2.5rem] flex flex-column items-center justify-center text-center p-10 group hover:border-indigo-200 transition-all">
                <div class="w-24 h-24 bg-slate-50 rounded-[2rem] flex items-center justify-center text-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-200 transition-all mb-8 shadow-sm">
                    <i class="fa-solid fa-address-card text-5xl"></i>
                </div>
                <p class="text-slate-400 font-bold uppercase tracking-[0.2em] text-[10px]">Directory Auditor Ready</p>
                <p class="text-slate-300 text-sm mt-4 leading-relaxed max-w-xs mx-auto">Input a domain target to extract registration<br>milestones and ownership metadata.</p>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'WHOIS Lookup',
    'intro_title' => 'WHOIS: Transparent Intelligence for Digital Assets',
    'intro_content' => 'WHOIS is the definitive query and response protocol for auditing the ownership, registration, and technical metadata of internet resources like domain names and IP blocks. Our Professional WHOIS Lookup utility provides a high-fidelity window into domain lifecycles, registrar details, and administrative contacts. Essential for cybersecurity researchers, brand protection agencies, and developers, this tool transforms raw registry data into actionable intelligence.',
    'detailed_title' => 'Registrar Auditing and Ownership Transparency',
    'detailed_content' => '<p>In a landscape defined by privacy protocols and shifting regulations, accessing authoritative registry data is critical for professional forensic analysis:</p>
        <ul class="space-y-3 mt-5 text-sm font-medium">
            <li><strong>Domain Lifecycle Tracking:</strong> Monitor registration, renewal, and expiration dates to protect brand assets and anticipate domain availability.</li>
            <li><strong>Administrative Metadata:</strong> Extract technical contact info and nameserver configurations to audit infrastructure security and hosting providers.</li>
            <li><strong>Registrar Integrity:</strong> Identify the sponsoring registrar and current status codes (e.g., clientTransferProhibited) to ensure asset security.</li>
            <li><strong>High-Integrity Sourcing:</strong> Our utility connects directly to the authoritative WHOIS servers of global registries, ensuring raw, unadulterated data delivery.</li>
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
#toolResult pre {
    background: transparent !important;
    border: none !important;
    padding: 0 !important;
    font-size: 13px !important;
    line-height: 1.6;
    color: inherit !important;
    white-space: pre-wrap !important;
}
</style>

<script>
$(document).ready(function() {
    const $wrapper = $('#toolResultWrapper');
    const $placeholder = $('#result-placeholder');
    const $result = $('#toolResult');

    window.onToolSuccess = function(data) {
        $placeholder.addClass('hidden');
        $wrapper.removeClass('hidden').addClass('animate-fade-in');
        $result.html(data);
    };

    window.copyWhois = function() {
        const text = $result.text();
        navigator.clipboard.writeText(text).then(() => {
            showToast('WHOIS record copied');
        });
    };
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>