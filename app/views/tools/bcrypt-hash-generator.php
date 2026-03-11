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
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded-4 border h-100">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password to Hash</label>
                            <input type="text" id="bcrypt-input" class="form-control form-control-lg" placeholder="Enter password...">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Rounds (Work Factor)</label>
                            <input type="range" id="bcrypt-rounds" class="form-range" min="4" max="15" value="10">
                            <div class="text-end small text-muted">Value: <span class="fw-bold text-primary" id="rounds-val">10</span></div>
                        </div>
                        <div class="d-grid mt-5">
                            <button id="hash-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                Generate Hash <i class="fa-solid fa-fingerprint ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pro-card shadow-none border bg-white h-100">
                        <h5 class="fw-bold mb-3">Generated Hash</h5>
                        <div id="bcrypt-output" class="p-4 rounded-3 bg-light fs-5 text-break fw-bold text-primary mb-4" style="min-height: 80px; font-family: monospace;">
                            ...
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary fw-bold" onclick="copyHash()">
                                <i class="fa-solid fa-copy me-2"></i> Copy Hash
                            </button>
                            <button class="btn btn-outline-secondary btn-sm border-0" onclick="window.location.reload()">
                                <i class="fa-solid fa-refresh me-1"></i> New Session
                            </button>
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



<script src="https://cdn.jsdelivr.net/npm/bcryptjs@2.4.3/dist/bcrypt.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bcrypt-input');
    const roundsRange = document.getElementById('bcrypt-rounds');
    const roundsVal = document.getElementById('rounds-val');
    const hashBtn = document.getElementById('hash-btn');
    const output = document.getElementById('bcrypt-output');

    roundsRange.addEventListener('input', () => {
        roundsVal.textContent = roundsRange.value;
    });

    hashBtn.addEventListener('click', () => {
        const pass = input.value;
        if (!pass) return showToast('Please enter a password', 'error');

        const saltRounds = parseInt(roundsRange.value);
        
        hashBtn.innerHTML = '<span class="premium-spinner"></span> Hashing...';
        hashBtn.disabled = true;

        // Use setTimeout to allow UI to show spinner before heavy computation
        setTimeout(() => {
            try {
                const salt = dcodeIO.bcrypt.genSaltSync(saltRounds);
                const hash = dcodeIO.bcrypt.hashSync(pass, salt);
                output.textContent = hash;
                showToast('Hash Generated!');
            } catch (e) {
                showToast('Error: ' + e.message, 'error');
            } finally {
                hashBtn.innerHTML = 'Generate Hash <i class="fa-solid fa-fingerprint ms-2"></i>';
                hashBtn.disabled = false;
            }
        }, 100);
    });
});

function copyHash() {
    const text = document.getElementById('bcrypt-output').textContent.trim();
    if (text === '...') return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Hash copied!');
    });
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>