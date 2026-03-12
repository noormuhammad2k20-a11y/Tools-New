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
                <div class="col-lg-5">
                    <form action="" method="POST" class="ajax-tool-form">
                        <div class="bg-light p-4 rounded-4 border shadow-sm">
                            <h5 class="fw-bold mb-4">Tutorial Details</h5>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Title (What to do?)</label>
                                <input type="text" name="name" class="form-control" placeholder="How to change a car tire" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Description</label>
                                <input type="text" name="desc" class="form-control" placeholder="A simple guide to changing a tire in 10 minutes." required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Total Time (ISO Format)</label>
                                <input type="text" name="time" class="form-control" placeholder="e.g. PT15M (15 mins)">
                            </div>

                            <h6 class="fw-bold mb-3 text-uppercase small text-muted">Steps</h6>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Step 1</label>
                                <textarea name="step1" class="form-control" rows="2" placeholder="Loosen the lug nuts while the car is on the ground." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Step 2</label>
                                <textarea name="step2" class="form-control" rows="2" placeholder="Jack up the car and remove the loose nuts."></textarea>
                            </div>

                            <button type="submit" class="btn btn-warning w-100 py-3 fw-bold rounded-pill shadow-sm mt-3 text-white">
                                <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Build Tutorial Schema
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <div id="toolResultWrapper" style="display: none;" class="h-100">
                        <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                            <h5 class="text-white fw-bold mb-3">HowTo JSON-LD Code</h5>
                            <div id="toolResult"></div>
                        </div>
                    </div>
                    <div id="empty-state" class="bg-light p-5 rounded-4 border h-100 d-flex flex-column align-items-center justify-content-center opacity-75">
                         <i class="fa-solid fa-screwdriver-wrench fa-4x mb-3 text-muted"></i>
                         <p class="h5 fw-bold text-muted">Tutorial Preview</p>
                         <p class="text-muted small text-center px-4">Complete the tutorial steps to generate rich snippet markup for your guide.</p>
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





<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>