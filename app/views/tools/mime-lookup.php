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
            

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="bg-light p-5 rounded-4 border mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Enter File Extension</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-file"></i></span>
                            <input type="text" id="ext-input" class="form-control border-start-0" placeholder="e.g. pdf, png, mp4, json" style="font-weight: 600;">
                        </div>
                    </div>

                    <div id="result-card" class="d-none animate-fade-up">
                        <div class="p-5 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 card-hover-custom">
                            <h2 id="mime-output" class="display-4 fw-bold text-primary mb-3"></h2>
                            <p class="text-muted mb-4 fs-5">This is the official MIME type for <strong>.<span id="ext-span"></span></strong> files.</p>
                            
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy MIME Type
                            </button>
                        </div>
                    </div>

                    <div id="no-result" class="mt-4 d-none">
                        <div class="p-4 rounded-4 bg-light border border-dashed text-muted">
                            <i class="fa-solid fa-circle-question fa-3x mb-3 opacity-25"></i>
                            <p class="mb-0">Extension not found in our common database. Try a standard one like 'zip' or 'html'.</p>
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
    const input = document.getElementById('ext-input');
    const resultCard = document.getElementById('result-card');
    const noResult = document.getElementById('no-result');
    const output = document.getElementById('mime-output');
    const extSpan = document.getElementById('ext-span');
    const copyBtn = document.getElementById('copy-btn');

    const mimes = {
        'html': 'text/html', 'htm': 'text/html', 'css': 'text/css', 'js': 'text/javascript', 'json': 'application/json',
        'xml': 'application/xml', 'pdf': 'application/pdf', 'zip': 'application/zip', 'rar': 'application/x-rar-compressed',
        '7z': 'application/x-7z-compressed', 'tar': 'application/x-tar', 'png': 'image/png', 'jpg': 'image/jpeg',
        'jpeg': 'image/jpeg', 'gif' : 'image/gif', 'webp': 'image/webp', 'svg': 'image/svg+xml', 'ico': 'image/x-icon',
        'mp3': 'audio/mpeg', 'wav': 'audio/wav', 'ogg': 'audio/ogg', 'mp4': 'video/mp4', 'webm': 'video/webm',
        'avi': 'video/x-msvideo', 'mov': 'video/quicktime', 'csv': 'text/csv', 'txt': 'text/plain', 'sql': 'application/sql',
        'php': 'application/x-httpd-php', 'py': 'text/x-python', 'java': 'text/x-java-source', 'cpp': 'text/x-c++src'
    };

    const lookup = () => {
        let ext = input.value.trim().toLowerCase().replace('.', '');
        if (!ext) {
            resultCard.classList.add('d-none');
            noResult.classList.add('d-none');
            return;
        }

        if (mimes[ext]) {
            output.textContent = mimes[ext];
            extSpan.textContent = ext;
            resultCard.classList.remove('d-none');
            noResult.classList.add('d-none');
        } else {
            resultCard.classList.add('d-none');
            noResult.classList.remove('d-none');
        }
    };

    input.addEventListener('input', lookup);

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('MIME type copied!'));
    });
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>