<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-amber px-3 py-2 shadow-sm text-dark" style="font-size: 0.8rem; letter-spacing: 1px; background: #fbbf24;">ULTRA BST PRO</span>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-star fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-amber">AI Value Proposition Generator</h1>
                    <p class="text-muted mb-0 lead">Define your "Why". Generate powerful, one-sentence value propositions that clearly communicate the core benefit of your product.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <label class="form-label small fw-bold">Who is your target audience?</label>
                        <input type="text" id="vp-audience" class="form-control mb-3" placeholder="e.g. Busy freelance writers">
                        
                        <label class="form-label small fw-bold">What problem do you solve?</label>
                        <input type="text" id="vp-problem" class="form-control mb-3" placeholder="e.g. Hours spent on manual tax tracking">

                        <label class="form-label small fw-bold">How is it solved?</label>
                        <input type="text" id="vp-solution" class="form-control mb-4" placeholder="e.g. Automated real-time receipt scanning">

                        <button id="btn-vp" class="btn btn-amber text-dark w-100 py-3 rounded-pill fw-bold shadow" style="background: #fbbf24;">
                            Define Value Prop <i class="fa-solid fa-gem ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div id="vp-loading" class="h-100 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                        <div class="spinner-border text-amber mb-3" style="color: #fbbf24;"></div>
                        <h6 class="fw-bold">Distilling Core Benefits...</h6>
                    </div>

                    <div id="result-area" class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm border p-4 flex-grow-1 overflow-auto d-flex flex-column justify-content-center" id="vp-body">
                            <div class="text-center py-5 opacity-25">
                                <i class="fa-solid fa-medal fa-4x mb-3"></i>
                                <h5>Your unique value awaits.</h5>
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
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            
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
.text-gradient-amber { background: linear-gradient(45deg, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const audIn = document.getElementById('vp-audience');
const probIn = document.getElementById('vp-problem');
const solIn = document.getElementById('vp-solution');
const body = document.getElementById('vp-body');
const loading = document.getElementById('vp-loading');
const btn = document.getElementById('btn-vp');

btn.addEventListener('click', async () => {
    if(!audIn.value || !solIn.value) return;
    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    body.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 1200));
    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    let vps = [
        `We help <strong>${audIn.value}</strong> eliminate <strong>${probIn.value}</strong> through <strong>${solIn.value}</strong>.`,
        `The only <strong>${solIn.value}</strong> built specifically for <strong>${audIn.value}</strong> looking to solve <strong>${probIn.value}</strong>.`,
        `Empowering <strong>${audIn.value}</strong> to overcome <strong>${probIn.value}</strong> with effortless <strong>${solIn.value}</strong>.`
    ];

    let html = '';
    vps.forEach(v => {
        html += `
            <div class="p-4 bg-light border-0 rounded-4 mb-3 shadow-sm text-center h5 lh-lg">
                ${v}
            </div>
        `;
    });
    body.innerHTML = html;
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>