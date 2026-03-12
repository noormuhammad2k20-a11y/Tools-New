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
            

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded-4 border mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Topic / Post Title</label>
                        <input type="text" id="slug-input" class="form-control form-control-lg rounded-3" style="font-size: 1.5rem;" placeholder="e.g. 10 Best Tools for SEO in 2026!">
                    </div>

                    <div class="bg-white p-4 rounded-4 border shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="form-label fw-bold small text-uppercase mb-0">SEO-Friendly slug</label>
                            <div class="d-flex gap-2">
                                <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm">
                                    <i class="fa-solid fa-copy me-1"></i> Copy
                                </button>
                                <button id="clear-btn" class="btn btn-outline-secondary btn-sm rounded-circle" style="width: 32px; height: 32px; padding: 0;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-light rounded-3 border">
                            <span id="slug-output" class="text-primary h5 fw-bold mb-0 animate-pulse-slow d-block text-break"></span>
                        </div>
                        
                        <div class="mt-4 row g-2">
                            <div class="col-md-3">
                                <div class="p-2 border rounded-3 bg-light transition-all hover-translate-y">
                                    <label class="small fw-bold text-muted d-block mb-1">Separator</label>
                                    <select id="slug-sep" class="form-select form-select-sm border-0 bg-transparent">
                                        <option value="-">Hyphen (-)</option>
                                        <option value="_">Underscore (_)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="p-2 border rounded-3 bg-light transition-all hover-translate-y">
                                    <label class="small fw-bold text-muted d-block mb-1">Case</label>
                                    <select id="slug-case" class="form-select form-select-sm border-0 bg-transparent">
                                        <option value="lower">Lowercase</option>
                                        <option value="none">As is</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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



<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('slug-input');
    const output = document.getElementById('slug-output');
    const sepSelect = document.getElementById('slug-sep');
    const caseSelect = document.getElementById('slug-case');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const generate = () => {
        let text = input.value.trim();
        if (!text) {
            output.textContent = 'waiting-for-input...';
            return;
        }

        const sep = sepSelect.value;
        const isLower = caseSelect.value === 'lower';

        let slug = text
            .replace(/[^\w\s-]/g, '') // Remove non-word chars
            .trim()
            .replace(/[-\s]+/g, sep); // Replace spaces/hyphens with separator

        if (isLower) slug = slug.toLowerCase();

        output.textContent = slug;
    };

    input.addEventListener('input', generate);
    sepSelect.addEventListener('change', generate);
    caseSelect.addEventListener('change', generate);

    copyBtn.addEventListener('click', () => {
        if (!input.value) return;
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Slug copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        generate();
    });

    generate();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>