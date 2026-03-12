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
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <h5 class="fw-bold mb-4">Preview Text</h5>
                        <textarea id="font-preview-text" class="form-control mb-4" rows="4">The quick brown fox jumps over the lazy dog.</textarea>
                        
                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-circle-info text-primary me-2"></i><b>Note:</b> Web safe fonts ensure consistent performance and zero cumulative layout shift (CLS).
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div id="fonts-grid" class="d-grid gap-3">
                        <!-- JS Generated Font Cards -->
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
.transition-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.05) !important;
}
</style>

<script>
const grid = document.getElementById('fonts-grid');
const textIn = document.getElementById('font-preview-text');

const fonts = [
    { name: 'Arial', stack: 'Arial, "Helvetica Neue", Helvetica, sans-serif' },
    { name: 'Verdana', stack: 'Verdana, Geneva, sans-serif' },
    { name: 'Tahoma', stack: 'Tahoma, Verdana, Segoe, sans-serif' },
    { name: 'Trebuchet MS', stack: '"Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif' },
    { name: 'Times New Roman', stack: '"Times New Roman", Times, Baskerville, Georgia, serif' },
    { name: 'Georgia', stack: 'Georgia, Times, "Times New Roman", serif' },
    { name: 'Garamond', stack: 'Garamond, Baskerville, "Baskerville Old Face", "Hoefler Text", "Times New Roman", serif' },
    { name: 'Courier New', stack: '"Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace' },
    { name: 'Brush Script MT', stack: '"Brush Script MT", cursive' }
];

function renderFonts() {
    const text = textIn.value;
    grid.innerHTML = '';
    fonts.forEach(f => {
        const card = document.createElement('div');
        card.className = 'bg-white p-4 rounded-4 border shadow-sm transition-hover';
        card.innerHTML = `
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h5 class="fw-bold mb-0">${f.name}</h5>
                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copy('${f.stack}')">Copy Stack</button>
            </div>
            <div class="p-3 bg-light rounded-3" style="font-family: ${f.stack}; font-size: 1.25rem; min-height: 80px;">
                ${text}
            </div>
            <div class="mt-2 small text-muted font-monospace">${f.stack}</div>
        `;
        grid.appendChild(card);
    });
}

function copy(text) {
    navigator.clipboard.writeText(`font-family: ${text};`);
    toast('Font stack copied!');
}

textIn.addEventListener('input', renderFonts);
renderFonts();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>