<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    
    <div id="split-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="split-controls" style="display:none;margin-bottom:2rem;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.5rem;margin-bottom:1.5rem;">
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Columns</label><input type="number" id="splitCols" class="form-control" value="3" min="1" max="10"></div>
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Rows</label><input type="number" id="splitRows" class="form-control" value="3" min="1" max="10"></div>
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Quick Presets</label>
                <select class="form-control" onchange="const v=this.value.split('x');document.getElementById('splitCols').value=v[0];document.getElementById('splitRows').value=v[1];">
                    <option value="3x3" selected>3×3 (Instagram)</option><option value="2x2">2×2</option><option value="3x1">3×1 (Banner)</option><option value="1x3">1×3 (Carousel)</option><option value="4x4">4×4 (Puzzle)</option><option value="5x5">5×5</option>
                </select></div>
        </div>
        <button type="button" onclick="splitImage()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Split Image ✂️</button>
    </div>
    <div id="split-results" style="display:none;">
        <h3 style="font-weight:800;margin-bottom:1rem;">Split Results</h3>
        <div id="split-grid" style="margin-bottom:1.5rem;"></div>
        <button onclick="downloadAllParts()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Download All Parts 💾</button>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Image Splitter?</h2>
    <p>The Image Splitter divides any image into a customizable grid of equal-sized pieces, perfect for creating Instagram grid posts, photo puzzles, multi-panel wall art, or splitting large images for printing. Instagram grid layouts — where a single large image is split across 3, 6, or 9 posts to create a mosaic effect on your profile — have become a popular visual branding technique used by photographers, artists, and brands. Our tool makes creating these grids effortless with one-click splitting and instant download of all parts.</p>
    <p>Unlike other splitting tools that require uploads to external servers, our Image Splitter runs entirely in your browser using the HTML5 Canvas API. This means instant processing, complete privacy, and no file size restrictions. The tool supports custom grid dimensions from 2×2 up to 10×10, with quick presets for common layouts.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload your image via drag-and-drop or the file browser.</li><li>Select a quick preset (3×3 for Instagram) or enter custom column/row values.</li><li>Click "Split Image" to instantly generate all grid pieces.</li><li>Preview the grid layout to verify alignment and composition.</li><li>Download individual pieces or all parts at once. Post in reverse order for Instagram.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Custom grid dimensions from 1×1 to 10×10</li><li>Quick presets for Instagram (3×3), carousel (1×3), and puzzle (4×4)</li><li>Visual grid preview showing numbered parts</li><li>Individual and bulk download options</li><li>100% client-side — no uploads, no limits</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What order should I post on Instagram?</strong> Post parts in reverse order (bottom-right first, top-left last) so the final mosaic displays correctly on your profile grid.</li><li><strong>Can I split non-square images?</strong> Yes. The tool works with any aspect ratio. Each grid piece will maintain the proportional dimensions of the original image.</li><li><strong>What's the maximum grid size?</strong> You can split up to 10×10 (100 pieces). For practical purposes, 3×3 to 5×5 grids work best for social media.</li><li><strong>Are the pieces equal size?</strong> Yes. Each piece is exactly the same pixel dimensions, calculated by dividing the original width/height by the number of columns/rows.</li></ul>
</article></div>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/image-tools-pro.js"></script>
<script>
let splitData=null;let splitParts=[];
ImgPro.buildDropZone('split-drop-zone',{accept:'image/*',onFiles:async files=>{
    splitData=await ImgPro.loadImageToCanvas(files[0]);
    document.getElementById('split-controls').style.display='block';
    document.getElementById('split-results').style.display='none';
    ImgPro.toast('Image loaded ('+splitData.width+'×'+splitData.height+')');
}});

function splitImage(){
    if(!splitData)return ImgPro.toast('Upload an image first');
    const cols=parseInt(document.getElementById('splitCols').value)||3;
    const rows=parseInt(document.getElementById('splitRows').value)||3;
    const pw=Math.floor(splitData.width/cols);
    const ph=Math.floor(splitData.height/rows);
    splitParts=[];

    const gridDiv=document.getElementById('split-grid');
    gridDiv.style.display='grid';
    gridDiv.style.gridTemplateColumns=`repeat(${cols},1fr)`;
    gridDiv.style.gap='4px';
    gridDiv.style.maxWidth='600px';
    gridDiv.innerHTML='';

    for(let r=0;r<rows;r++){
        for(let c=0;c<cols;c++){
            const canvas=document.createElement('canvas');
            canvas.width=pw;canvas.height=ph;
            const ctx=canvas.getContext('2d');
            ctx.drawImage(splitData.canvas,c*pw,r*ph,pw,ph,0,0,pw,ph);
            const dataUrl=canvas.toDataURL('image/png');
            const idx=r*cols+c+1;
            splitParts.push({dataUrl,name:`part_${idx}_r${r+1}c${c+1}.png`});

            gridDiv.insertAdjacentHTML('beforeend',`<div style="position:relative;border:2px solid var(--border);border-radius:8px;overflow:hidden;">
                <img src="${dataUrl}" style="width:100%;display:block;">
                <div style="position:absolute;top:4px;left:4px;background:rgba(0,0,0,0.7);color:#fff;padding:0.15rem 0.5rem;border-radius:4px;font-size:0.75rem;font-weight:700;">${idx}</div>
                <a href="${dataUrl}" download="part_${idx}.png" style="position:absolute;bottom:4px;right:4px;background:var(--primary);color:#fff;padding:0.15rem 0.5rem;border-radius:4px;font-size:0.7rem;text-decoration:none;">⬇</a>
            </div>`);
        }
    }
    document.getElementById('split-results').style.display='block';
    ImgPro.toast(`Image split into ${cols}×${rows} = ${cols*rows} parts!`);
}

function downloadAllParts(){splitParts.forEach((p,i)=>{setTimeout(()=>{const a=document.createElement('a');a.href=p.dataUrl;a.download=p.name;a.click();},i*200);});}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>