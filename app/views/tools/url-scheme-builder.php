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
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Custom Scheme</label>
                            <input type="text" id="url-scheme" class="form-control" placeholder="myapp" value="myapp">
                            <div class="form-text">e.g. fb, whatsapp, twitter</div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Path / Action</label>
                            <input type="text" id="url-path" class="form-control" placeholder="user/profile/123" value="profile">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Parameters (Key=Value)</label>
                            <div id="params-container">
                                <div class="input-group mb-2 param-row">
                                    <input type="text" class="form-control param-key" placeholder="key">
                                    <input type="text" class="form-control param-val" placeholder="value">
                                    <button class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            <button class="btn btn-link btn-sm p-0 fw-bold text-primary text-decoration-none" onclick="addParam()">
                                <i class="fa-solid fa-plus me-1"></i> Add Parameter
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pro-card shadow-none border bg-white h-100 text-center d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-3">Generated URL Scheme</h5>
                        <div id="url-output" class="p-3 rounded-3 bg-light fs-4 fw-bold text-primary mb-4 text-break">
                            myapp://profile
                        </div>
                        
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-primary rounded-pill fw-bold btn-lg" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-2"></i> Copy Link
                            </button>
                        </div>
                        <div class="alert alert-info py-2 small mb-0">
                            <i class="fa-solid fa-lightbulb me-2"></i> Note: Test this link by opening it from a browser on a mobile device with the target app installed.
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
function addParam() {
    const container = document.getElementById('params-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2 param-row';
    div.innerHTML = `
        <input type="text" class="form-control param-key" placeholder="key">
        <input type="text" class="form-control param-val" placeholder="value">
        <button class="btn btn-outline-danger" onclick="this.parentElement.remove(); updateUrl();"><i class="fa-solid fa-trash"></i></button>
    `;
    container.appendChild(div);
    
    div.querySelectorAll('input').forEach(i => i.addEventListener('input', updateUrl));
}

function updateUrl() {
    const scheme = document.getElementById('url-scheme').value.trim();
    const path = document.getElementById('url-path').value.trim();
    const output = document.getElementById('url-output');

    if (!scheme) {
        output.textContent = '...';
        return;
    }

    let url = `${scheme}://${path}`;
    const params = [];
    document.querySelectorAll('.param-row').forEach(row => {
        const k = row.querySelector('.param-key').value.trim();
        const v = row.querySelector('.param-val').value.trim();
        if (k) params.push(`${encodeURIComponent(k)}=${encodeURIComponent(v)}`);
    });

    if (params.length > 0) {
        url += '?' + params.join('&');
    }

    output.textContent = url;
}

document.addEventListener('DOMContentLoaded', () => {
    ['url-scheme', 'url-path'].forEach(id => {
        document.getElementById(id).addEventListener('input', updateUrl);
    });
    
    document.querySelectorAll('.param-row input').forEach(i => {
        i.addEventListener('input', updateUrl);
    });
});

function copyResult() {
    const text = document.getElementById('url-output').textContent.trim();
    if (text === '...') return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Link copied!');
    });
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>