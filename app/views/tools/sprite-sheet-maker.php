<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div id="ssm-drop-zone" style="margin-bottom:2rem;"></div>
    
    <div id="ssm-controls" style="display:none;margin-bottom:2rem;padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <h4 class="fw-bold mb-4 fs-5">Packing Algorithms <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">PRO Compiler</span></h4>
        <div class="row g-4 align-items-end">
            <div class="col-md-3">
                <label class="fw-bold mb-2">Sprite Layout</label>
                <select id="ssmLayout" class="form-control" onchange="generateSprite()"><option value="horizontal">Horizontal Row</option><option value="vertical">Vertical Column</option><option value="grid" selected>Auto Box-Fit Grid</option></select>
            </div>
            <div class="col-md-3">
                <label class="fw-bold mb-2">Padding (px)</label>
                <input type="number" id="ssmPadding" class="form-control" value="2" min="0" oninput="generateSprite()">
            </div>
            <div class="col-md-3">
                <label class="fw-bold mb-2 text-primary">CSS Class Prefix</label>
                <input type="text" id="ssmPrefix" class="form-control border-primary" value="icon-" oninput="generateSprite()">
            </div>
            <div class="col-md-3 text-end">
                <button onclick="downloadSprite()" class="btn btn-primary w-100 fw-bold shadow-sm">Export ZIP <i class="fa-solid fa-file-archive ms-2"></i></button>
            </div>
        </div>
    </div>
    
    <div id="ssm-results" class="sprite-grid" style="display:none;">
        <div>
            <h5 class="fw-bold small mb-2 text-muted">CANVAS PREVIEW</h5>
            <div class="bg-light border rounded-3 d-flex align-items-center justify-content-center p-3" style="background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 10px 10px; overflow:auto; max-height:400px;">
                <canvas id="ssmCanvas" style="box-shadow:0 10px 25px rgba(0,0,0,0.1);"></canvas>
            </div>
        </div>
        <div>
            <h5 class="fw-bold small mb-2 text-muted">GENERATED CSS CODE</h5>
            <textarea id="ssmCode" class="form-control font-monospace text-light bg-dark border-0 p-3 rounded-3" rows="15" readonly style="font-size:0.85rem;white-space:pre;"></textarea>
            <button class="btn btn-sm btn-outline-dark mt-2 w-100 fw-bold" onclick="navigator.clipboard.writeText(document.getElementById('ssmCode').value);PdfDevPro.toast('Copied CSS!');">Copy CSS to Clipboard</button>
        </div>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the Sprite Sheet Maker?</h2>
        <p>The Sprite Sheet Maker is an indispensable asset compilation tool for frontend web developers and independent game designers. Rather than forcing a web browser to initiate 50 separate HTTP requests to load 50 individual icons, this tool algorithmically packs them into one massive, master image ("sprite sheet").</p>
        <p>Alongside compiling the canvas, it simultaneously generates the precise CSS coordinates (background-position) needed to display each icon individually within your frontend application. This drastically reduces server load, eliminates visually-laggy icon popping, and improves Google Lighthouse SEO performance scores by minimizing network waterfalls.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Auto Box-Fit Grid:</strong> Choose the Grid layout algorithm for large numbers of icons. Unlike horizontal strips which might exceed maximum GPU canvas widths, the Grid layout calculates an approximate square bounding box to keep the file highly compatible across old mobile devices.</li>
                <li class="mb-1"><strong>Padding Buffers:</strong> Always maintain at least 2px of padding between icons to prevent "bleeding" when browsers scale or employ anti-aliasing on retina displays.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-brands fa-css3-alt text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Live CSS Generator</h4><p class="text-muted small mb-0">Math is done for you. Provides ready-to-paste background-position syntax.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-cube text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Dynamic Packing Logic</h4><p class="text-muted small mb-0">Choose between horizontal tapes, vertical strips, or dense box packing.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-file-image text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Transparent Exports</h4><p class="text-muted small mb-0">Renders as a 32-bit transparent PNG to ensure overlays function perfectly.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-bolt text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Instant Local Canvas</h4><p class="text-muted small mb-0">Process hundreds of icons seamlessly within browser RAM without uploading.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">What is CSS 'background-position'?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">It's a CSS property that moves a background image around inside an element. By applying the master sprite sheet as the background of a 32x32px div, changing the position shifts a different icon into the "viewing window" of the div.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Do the uploaded icons need to be identical sizes?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">No! Our advanced bounding box algorithm captures the specific width and height of each individual icon and maps the CSS coordinates independently. However, for most UI systems, using uniformly sized source images is best practice.</div></div>
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


<style>.sprite-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;}</style>

<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-developer-tools.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script>
let spriteImages = [];
const canvas = document.getElementById('ssmCanvas');
const ctx = canvas.getContext('2d');

PdfDevPro.buildDropZone('ssm-drop-zone', {accept: 'image/*', multiple: true, title: 'icons/images', icon: '👾', onFiles: async files => {
    spriteImages = [];
    for(const file of files) {
        try {
            const img = await PdfDevPro.loadImage(file);
            spriteImages.push({name: file.name.split('.')[0].replace(/[^a-zA-Z0-9-]/g,'-'), img: img});
        } catch(e) {}
    }
    document.getElementById('ssm-controls').style.display = 'block';
    document.getElementById('ssm-results').style.display = 'grid';
    generateSprite();
    PdfDevPro.toast(`${spriteImages.length} images loaded`);
}});

function generateSprite() {
    if(!spriteImages.length) return;
    const layout = document.getElementById('ssmLayout').value;
    const padding = parseInt(document.getElementById('ssmPadding').value);
    const prefix = document.getElementById('ssmPrefix').value;
    
    let cW = 0, cH = 0;
    
    // Calculate dimensions
    if (layout === 'horizontal') {
        cH = Math.max(...spriteImages.map(s => s.img.height));
        cW = spriteImages.reduce((sum, s) => sum + s.img.width + padding, 0);
    } else if (layout === 'vertical') {
        cW = Math.max(...spriteImages.map(s => s.img.width));
        cH = spriteImages.reduce((sum, s) => sum + s.img.height + padding, 0);
    } else { // grid (simple bin pack approximation logic: square root based)
        const area = spriteImages.reduce((sum, s) => sum + (s.img.width * s.img.height), 0);
        cW = Math.ceil(Math.sqrt(area)) * 1.5; // pad to ensure fit
        cH = cW; // roughly square bounds
    }
    
    canvas.width = cW;
    canvas.height = Math.max(cH, 1);
    ctx.clearRect(0, 0, cW, cH);
    
    let curX = 0, curY = 0, rowH = 0;
    let cssStr = `.sprite { background-image: url('sprite.png'); background-repeat: no-repeat; display: inline-block; }\n\n`;
    
    // Draw & Compute CSS
    spriteImages.forEach(item => {
        if(layout === 'grid') {
            if (curX + item.img.width > cW) {
                curX = 0;
                curY += rowH + padding;
                rowH = 0;
            }
            ctx.drawImage(item.img, curX, curY);
            cssStr += `.${prefix}${item.name} {\n    width: ${item.img.width}px;\n    height: ${item.img.height}px;\n    background-position: -${curX}px -${curY}px;\n}\n`;
            
            curX += item.img.width + padding;
            rowH = Math.max(rowH, item.img.height);
        } else if (layout === 'horizontal') {
            ctx.drawImage(item.img, curX, 0);
            cssStr += `.${prefix}${item.name} {\n    width: ${item.img.width}px;\n    height: ${item.img.height}px;\n    background-position: -${curX}px 0px;\n}\n`;
            curX += item.img.width + padding;
        } else {
            ctx.drawImage(item.img, 0, curY);
            cssStr += `.${prefix}${item.name} {\n    width: ${item.img.width}px;\n    height: ${item.img.height}px;\n    background-position: 0px -${curY}px;\n}\n`;
            curY += item.img.height + padding;
        }
    });
    
    // Trim canvas height for grid
    if(layout === 'grid') {
        const trimData = ctx.getImageData(0,0,cW, curY + rowH);
        canvas.height = curY + rowH;
        ctx.putImageData(trimData, 0,0);
    }
    
    document.getElementById('ssmCode').value = cssStr;
}

async function downloadSprite() {
    if(!spriteImages.length) return;
    const zip = new JSZip();
    
    const cssContent = document.getElementById('ssmCode').value;
    zip.file("sprite.css", cssContent);
    
    const blob = await new Promise(r => canvas.toBlob(r, 'image/png'));
    zip.file("sprite.png", blob);
    
    const content = await zip.generateAsync({type:"blob"});
    PdfDevPro.downloadBlob(content, "sprite_bundle.zip");
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>