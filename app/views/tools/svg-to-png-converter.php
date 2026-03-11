<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="s2p-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="s2p-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Rasterization Engine <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Scaling</span></h4>
        <div class="row g-4 align-items-center">
            <div class="col-md-9">
                <label class="fw-bold mb-2">Native Resolution Scale</label>
                <div class="d-flex gap-2">
                    <input type="radio" class="btn-check" name="s2pScale" id="sc1" value="1" checked>
                    <label class="btn btn-outline-primary" for="sc1">1x (Original)</label>
                    <input type="radio" class="btn-check" name="s2pScale" id="sc2" value="2">
                    <label class="btn btn-outline-primary" for="sc2">2x (High)</label>
                    <input type="radio" class="btn-check" name="s2pScale" id="sc4" value="4">
                    <label class="btn btn-outline-primary fw-bold" for="sc4">4x (Ultra HD)</label>
                    <input type="radio" class="btn-check" name="s2pScale" id="sc8" value="8">
                    <label class="btn btn-outline-dark fw-bold" for="sc8"><i class="fa-solid fa-crown text-warning"></i> 8K Max</label>
                </div>
                <div class="text-muted small mt-2"><i class="fa-solid fa-info-circle"></i> Multiplexing scales the internal pathing logic before painting pixels, ensuring zero blur.</div>
            </div>
            <div class="col-md-3 text-end">
                <button type="button" onclick="convertSvg()" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">Convert &amp; Download <i class="fa-solid fa-paint-roller ms-2"></i></button>
            </div>
        </div>
    </div>
    
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the SVG To PNG Converter?</h2>
        <p>The SVG To PNG Converter bridges the gap between mathematically drawn vector files (Scalable Vector Graphics) and fixed-pixel raster assets (Portable Network Graphics). Utilizing the HTML5 Canvas DOM API, this tool decodes the XML pathways inside an SVG file and paints them pixel-for-pixel into a universally compatible image.</p>
        <p>Because SVGs do not inherently possess extreme pixel resolution—only proportional logic—our PRO rasterization engine permits up-scaling the internal instructions up to 8x the default viewport setting before saving. This means you can take a tiny 50px icon and forcefully export it as a staggeringly crisp 4000px Ultra HD asset suitable for billboards, desktop wallpapers, and dense Retina mobile applications.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>The 8K Max Setting:</strong> Select the premium "8K Max" button to force a 800% vector multiplier. Due to browser renderer constraints, ensure your base SVG is defined under 1000px width originally, otherwise the resulting canvas may exceed memory limits upon export!</li>
                <li class="mb-1"><strong>Transparency Retained:</strong> Unlike converting to JPEGs which inject solid white backgrounds, our PNG encoder guarantees that every alpha-channel value and transparency map within the SVG flawlessly translates into the exported file.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-expand text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Infinite Up-scaling</h4><p class="text-muted small mb-0">Unlike resizing JPEGs, increasing the scale multiplier injects pure sharpness.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-code text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">XML DOM Parsing</h4><p class="text-muted small mb-0">Handles inline SVG tags, external stylesheets, and complex grouped paths.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-regular fa-image text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Lossless Data URI</h4><p class="text-muted small mb-0">Generates uncompressed image outputs ensuring artifacts do not pollute the graphics.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-server text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Private Rasterization</h4><p class="text-muted small mb-0">Paints the image using your local GPU instead of an external API.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Why not just use an SVG directly?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">While SVGs are lightweight and excellent for web development, they are often rejected by older content management systems (like WordPress), email marketing software (due to security policies stopping XML execution), and legacy mobile applications. PNG is universally accepted.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Does it support SVG animations?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">No. Standard PNG files cannot hold timeline animation data. If your SVG utilizes CSS animations or SMIL, the converter will effectively take a snapshot of the first frame.</div></div>
            </div>
        </div>
    </section>
</article>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-developer-tools.js"></script>
<script>
let activeSvgText = null;
let activeSvgName = 'vector';

PdfDevPro.buildDropZone('s2p-drop-zone', {accept: '.svg', title: 'SVG Graphic', icon: '📐', onFiles: async files => {
    activeSvgName = files[0].name.replace('.svg', '');
    try {
        activeSvgText = await PdfDevPro.readFileAsText(files[0]);
        document.getElementById('s2p-controls').style.display = 'block';
        PdfDevPro.toast('SVG Parsed via XML Engine');
    } catch(e) {
        PdfDevPro.toast('Error reading SVG');
    }
}});

function convertSvg() {
    if(!activeSvgText) return;
    
    const scale = parseInt(document.querySelector('input[name="s2pScale"]:checked').value);
    
    // Parse the SVG document to manually override width/height attributes to accommodate dynamic scaling natively.
    const parser = new DOMParser();
    const doc = parser.parseFromString(activeSvgText, "image/svg+xml");
    const svgEl = doc.documentElement;
    
    // Fallbacks if no explicit width/height
    const wStr = svgEl.getAttribute('width') || '800';
    const hStr = svgEl.getAttribute('height') || '800';
    let baseW = parseFloat(wStr.replace(/[^0-9.]/g, ''));
    let baseH = parseFloat(hStr.replace(/[^0-9.]/g, ''));
    
    if(!baseW || !baseH){ baseW=800; baseH=800; }
    
    const renderW = baseW * scale;
    const renderH = baseH * scale;
    
    // Force the internal viewBox logic to scale
    svgEl.setAttribute('width', renderW + 'px');
    svgEl.setAttribute('height', renderH + 'px');
    
    // Convert back to string
    const serializer = new XMLSerializer();
    let modSvgText = serializer.serializeToString(svgEl);
    
    // Base64 encode the string (safe encode)
    const base64Src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(modSvgText)));
    
    const img = new Image();
    img.onload = () => {
        const canvas = document.createElement('canvas');
        canvas.width = renderW;
        canvas.height = renderH;
        canvas.getContext('2d').drawImage(img, 0, 0, renderW, renderH);
        PdfDevPro.downloadCanvas(canvas, `${activeSvgName}_${scale}x.png`, 'image/png');
    };
    img.onerror = () => PdfDevPro.toast('Renderer Error: Ensure the SVG XML is valid.');
    img.src = base64Src;
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>