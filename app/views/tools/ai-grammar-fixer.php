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
                <div class="col-lg-7">
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Original Text</label>
                        <textarea id="text-input" class="form-control" rows="12" placeholder="He go to school yesterday and he don't like it. I am write this to you for help."></textarea>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Desired Tone</label>
                            <select id="target-tone" class="form-select">
                                <option value="professional">Professional</option>
                                <option value="friendly">Friendly</option>
                                <option value="casual">Casual</option>
                                <option value="authoritative">Authoritative</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="d-grid w-100 shadow-premium">
                                <button id="fix-btn" class="btn btn-primary btn-lg rounded-pill fw-bold">
                                    Fix &amp; Rewrite <i class="fa-solid fa-wand-sparkles ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div id="result-wrapper" class="h-100 d-none">
                        <div class="pro-card shadow-none border bg-white h-100 d-flex flex-column p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Refined Content</h5>
                                <span class="badge bg-soft-primary text-primary px-3 rounded-pill" id="applied-tone">Professional</span>
                            </div>
                            <div id="text-output" class="flex-grow-1 p-3 bg-light rounded-3 mb-3" style="min-height: 250px; font-size: 1.1rem; line-height: 1.6;">
                                <!-- AI output here -->
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary rounded-pill flex-grow-1" onclick="copyResult()">
                                    <i class="fa-solid fa-copy me-1"></i> Copy
                                </button>
                                <button class="btn btn-outline-secondary rounded-pill" onclick="clearAll()">
                                    <i class="fa-solid fa-repeat"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="placeholder" class="pro-card shadow-none border bg-white h-100 d-flex flex-column justify-content-center text-center p-4">
                        <i class="fa-solid fa-pen-nib fa-4x mb-3 text-muted opacity-25"></i>
                        <p class="text-muted mb-0">Your corrected text will appear here</p>
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
    const btn = document.getElementById('fix-btn');
    const input = document.getElementById('text-input');
    const output = document.getElementById('text-output');
    const wrapper = document.getElementById('result-wrapper');
    const placeholder = document.getElementById('placeholder');
    const toneLabel = document.getElementById('applied-tone');

    btn.addEventListener('click', () => {
        const text = input.value.trim();
        const tone = document.getElementById('target-tone').value;

        if (!text) return showToast('Please enter text to fix', 'error');

        btn.disabled = true;
        btn.innerHTML = '<span class="premium-spinner"></span> Rewriting...';

        setTimeout(() => {
            let refined = rewriteText(text, tone);
            output.textContent = refined;
            toneLabel.textContent = tone.charAt(0).toUpperCase() + tone.slice(1);
            
            wrapper.classList.remove('d-none');
            placeholder.classList.add('d-none');
            btn.disabled = false;
            btn.innerHTML = 'Fix & Rewrite <i class="fa-solid fa-wand-sparkles ms-2"></i>';
            showToast('Grammar fixed and tone adjusted!');
        }, 1500);
    });
});

function rewriteText(text, tone) {
    // Basic Rule-based Rewriter (simulating AI behavior)
    let res = text;

    // Simple common grammar fixes (e.g. "go" -> "went")
    res = res.replace(/\bhe go\b/gi, 'he went');
    res = res.replace(/\bhe don't\b/gi, 'he doesn\'t');
    res = res.replace(/\bi am write\b/gi, 'I am writing');

    // Tone adjustment simulations
    if (tone === 'professional') {
        res = "I am writing to formally request your assistance. " + res;
    } else if (tone === 'friendly') {
        res = "Hey there! I just wanted to reach out. " + res;
    } else if (tone === 'authoritative') {
        res = "Observe the following requirements: " + res;
    }

    return res;
}

function copyResult() {
    const val = document.getElementById('text-output').textContent;
    navigator.clipboard.writeText(val).then(() => showToast('Copied to clipboard!'));
}

function clearAll() {
    document.getElementById('text-input').value = '';
    document.getElementById('result-wrapper').classList.add('d-none');
    document.getElementById('placeholder').classList.remove('d-none');
    showToast('Cleared!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>