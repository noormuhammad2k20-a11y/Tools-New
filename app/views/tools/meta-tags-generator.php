<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Basic Info</h5>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Site Title</label>
                        <input type="text" id="m-title" class="form-control" placeholder="The name of your website">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Site Description</label>
                        <textarea id="m-desc" class="form-control" rows="3" placeholder="A brief summary of your page content"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Keywords (Comma separated)</label>
                        <input type="text" id="m-keys" class="form-control" placeholder="web, tools, generator">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Author</label>
                        <input type="text" id="m-author" class="form-control" placeholder="Company or Person Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Social & Indexing</h5>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Robots Indexing</label>
                        <select id="m-robots" class="form-select">
                            <option value="index, follow">Index, Follow (Default)</option>
                            <option value="noindex, follow">Noindex, Follow</option>
                            <option value="index, nofollow">Index, Nofollow</option>
                            <option value="noindex, nofollow">Noindex, Nofollow</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Content Type</label>
                        <select id="m-content" class="form-select">
                            <option value="text/html; charset=utf-8">UTF-8</option>
                            <option value="text/html; charset=iso-8859-1">ISO-8859-1</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label small fw-bold">Language</label>
                        <input type="text" id="m-lang" class="form-control" value="English">
                    </div>
                </div>
            </div>
            
            <div class="d-flex gap-3 mt-4 pt-4 border-top">
                <button id="gen-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Generate Tags <i class="fa-solid fa-code ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Reset</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Generated HTML Header Code</label>
                    <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyResult()">Copy Header Code</button>
                </div>
                <textarea id="output-code" class="form-control font-monospace bg-dark text-info border-0" rows="12" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Power of Professional Meta Tags</h2>
                    <p class="lead">Meta tags are the "hidden" signals inside your website's <code>&lt;head&gt;</code> section that tell search engines and social media platforms what your page is about. Our <strong>Meta Tags Generator</strong> simplifies the complex process of creating these tags, ensuring your site is fully optimized for crawl-ability and share-ability.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Every Page Needs Custom Tags</h3>
                    <p>Standardized meta tags are the foundation of SEO. The <strong>Description</strong> tag often serves as the "snippet" displayed in Google search results, influencing your Click-Through Rate (CTR). Meanwhile, <strong>Robots</strong> tags control how search bots interact with your site, protecting private sections from being indexed.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Components of a Perfect Header</h3>
                    <ul>
                        <li><strong>Title Tag:</strong> The most important on-page SEO element. It defines the page's identity.</li>
                        <li><strong>Meta Description:</strong> A compelling 150-160 character pitch to potential visitors.</li>
                        <li><strong>Charset:</strong> Ensures your text renders correctly across all global browsers.</li>
                        <li><strong>Social Meta (Open Graph/Twitter):</strong> Controls how your link looks when shared on platforms like LinkedIn or X.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Boost Your Rankings Today</h3>
                    <ol>
                        <li><strong>Better Snippets:</strong> Control exactly what users see in search results.</li>
                        <li><strong>Faster Crawling:</strong> Help search engine bots understand your site's structure.</li>
                        <li><strong>Professional Look:</strong> Ensure your social media shares are rich with images and descriptions.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Safety & Privacy</h3>
                    <p>Our generator creates code <strong>entirely in your browser</strong>. We do not store your site's information or track the keywords you use. It's a clean, private, and efficient way to build your site's SEO foundation.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const genBtn = document.getElementById('gen-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('output-code');

    genBtn.addEventListener('click', () => {
        const title = document.getElementById('m-title').value;
        const desc = document.getElementById('m-desc').value;
        const keys = document.getElementById('m-keys').value;
        const author = document.getElementById('m-author').value;
        const robots = document.getElementById('m-robots').value;
        const content = document.getElementById('m-content').value;
        const lang = document.getElementById('m-lang').value;

        let code = `<!-- Primary Meta Tags -->\n`;
        if(title) code += `<title>${title}</title>\n`;
        code += `<meta name="title" content="${title || ''}">\n`;
        code += `<meta name="description" content="${desc || ''}">\n`;
        code += `<meta name="keywords" content="${keys || ''}">\n`;
        code += `<meta name="author" content="${author || ''}">\n`;
        code += `<meta name="robots" content="${robots}">\n`;
        code += `<meta http-equiv="Content-Type" content="${content}">\n`;
        code += `<meta name="language" content="${lang}">\n`;
        code += `<meta name="revisit-after" content="7 days">\n`;

        output.value = code;
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        document.querySelectorAll('.form-control, .form-select').forEach(el => el.value = '');
        document.getElementById('m-robots').value = 'index, follow';
        document.getElementById('m-content').value = 'text/html; charset=utf-8';
        wrapper.style.display = 'none';
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Meta tags copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>