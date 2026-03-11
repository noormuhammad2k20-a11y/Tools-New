<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <!-- Tool UI -->
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Regular Expression</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">/</span>
                                <input type="text" id="regex-pattern" class="form-control border-start-0 border-end-0" placeholder="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" value="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}">
                                <span class="input-group-text bg-white border-start-0">/</span>
                                <input type="text" id="regex-flags" class="input-group-text bg-white" style="width: 80px;" value="g" placeholder="flags">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Test String</label>
                            <textarea id="regex-test" class="form-control" rows="5" placeholder="Enter text to test the regex against...">Contact us at support@example.com or info@tools.net</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="pro-card shadow-none border bg-white">
                        <h5 class="fw-bold mb-3">Live Matching Results</h5>
                        <div id="regex-results" class="p-3 rounded-3 bg-light min-height-100" style="font-family: monospace; white-space: pre-wrap; line-height: 1.6;">
                            <!-- Matches will be highlighted here -->
                        </div>
                    </div>
                </div>

                <!-- Visualization info -->
                <div class="col-lg-12 mt-4">
                    <div class="alert bg-primary-soft border-0 rounded-4 p-4 text-center">
                        <i class="fa-solid fa-info-circle fa-2x mb-3 text-primary"></i>
                        <h5 class="fw-bold">How it works</h5>
                        <p class="text-muted mb-0">Matches are highlighted in <span class="badge bg-warning text-dark">yellow</span>. If your regex is invalid, the background will turn <span class="text-danger fw-bold">red</span>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
        </article>
    </div>
</section>

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
.regex-match {
    background-color: #fef08a; /* yellow-200 */
    border-bottom: 2px solid #eab308; /* yellow-500 */
    border-radius: 2px;
}
.regex-error {
    background-color: #fee2e2 !important; /* red-100 */
    border-color: #ef4444 !important; /* red-500 */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const patternInput = document.getElementById('regex-pattern');
    const flagsInput = document.getElementById('regex-flags');
    const testInput = document.getElementById('regex-test');
    const resultsDiv = document.getElementById('regex-results');

    function updateMatches() {
        const pattern = patternInput.value;
        const flags = flagsInput.value;
        const text = testInput.value;

        resultsDiv.innerHTML = '';
        patternInput.classList.remove('is-invalid');
        patternInput.closest('.input-group').classList.remove('regex-error');

        if (!pattern) return;

        try {
            const regex = new RegExp(pattern, flags.includes('g') ? flags : flags + 'g');
            
            let highlightedText = '';
            let lastIndex = 0;
            let match;

            while ((match = regex.exec(text)) !== null) {
                if (match.index === regex.lastIndex) regex.lastIndex++; // Prevent infinite loop on zero-width matches

                highlightedText += escapeHtml(text.substring(lastIndex, match.index));
                highlightedText += `<span class="regex-match">${escapeHtml(match[0])}</span>`;
                lastIndex = regex.lastIndex;
            }

            highlightedText += escapeHtml(text.substring(lastIndex));
            resultsDiv.innerHTML = highlightedText || escapeHtml(text) || '<span class="text-muted">No matches found.</span>';

        } catch (e) {
            patternInput.classList.add('is-invalid');
            patternInput.closest('.input-group').classList.add('regex-error');
            resultsDiv.innerHTML = `<span class="text-danger">Invalid Regex: ${e.message}</span>`;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    [patternInput, flagsInput, testInput].forEach(el => {
        el.addEventListener('input', updateMatches);
    });

    updateMatches();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>