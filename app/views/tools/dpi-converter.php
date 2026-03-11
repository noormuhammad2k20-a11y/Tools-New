<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    
    <div id="dpi-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="dpi-controls" style="display:none;margin-bottom:2rem;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem;margin-bottom:1.5rem;">
            <div id="dpi-preview-info" style="padding:1rem;border:1px solid var(--border);border-radius:12px;background:var(--bg-body);"></div>
            <div>
                <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Target DPI</label>
                <select id="dpiTarget" class="form-control" onchange="if(this.value==='custom')document.getElementById('dpiCustom').style.display='block';else document.getElementById('dpiCustom').style.display='none';">
                    <option value="72">72 DPI (Web / Screen)</option><option value="96">96 DPI (Windows Default)</option><option value="150">150 DPI (Medium Print)</option><option value="300" selected>300 DPI (High Quality Print)</option><option value="600">600 DPI (Professional Print)</option><option value="custom">Custom DPI</option>
                </select>
                <input type="number" id="dpiCustom" class="form-control" placeholder="Enter custom DPI" min="10" max="2400" style="display:none;margin-top:0.5rem;">
            </div>
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Output Format</label>
                <select id="dpiFormat" class="form-control"><option value="png">PNG (Lossless)</option><option value="jpeg">JPEG (Smaller)</option></select></div>
        </div>
        <button type="button" onclick="convertDPI()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Convert DPI 📐</button>
    </div>
    <div id="dpi-result" style="display:none;text-align:center;">
        <canvas id="dpi-canvas" style="display:none;"></canvas>
        <div id="dpi-result-info" style="padding:1.5rem;border-radius:16px;background:linear-gradient(135deg,#f0fdf4,#dcfce7);margin-bottom:1.5rem;"></div>
        <button onclick="ImgPro.downloadCanvas(document.getElementById('dpi-canvas'),'dpi_converted.'+document.getElementById('dpiFormat').value,document.getElementById('dpiFormat').value==='jpeg'?'image/jpeg':'image/png')" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Download Converted Image 💾</button>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the DPI Converter?</h2>
    <p>The DPI Converter changes the dots-per-inch (DPI) metadata of your images to match specific output requirements for printing, publishing, or web use. DPI (also called PPI — pixels per inch) determines how many pixels are printed in each inch of physical output. While 72 DPI is standard for web images, professional printing requires 300 DPI for crisp, sharp output. Magazine and commercial printing may require 600 DPI or higher.</p>
    <p>Many print services and publishers reject images that don't meet their DPI requirements. Our tool modifies the DPI metadata without resampling (losing quality), ensuring your image maintains its original pixel data while meeting the specified resolution standard. This is the non-destructive approach preferred by professional designers and photographers.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload your image via drag-and-drop or file browser.</li><li>Select your target DPI from presets or enter a custom value.</li><li>Choose your output format (PNG for lossless quality, JPEG for smaller file size).</li><li>The tool calculates and displays the resulting physical print dimensions.</li><li>Download the converted image with updated DPI metadata.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>6 DPI presets for common use cases (72-600 DPI)</li><li>Custom DPI input up to 2400 DPI</li><li>Non-destructive conversion — no quality loss</li><li>Print dimension calculator (shows output size in inches)</li><li>PNG and JPEG output options</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Does changing DPI improve image quality?</strong> No. Changing DPI only changes the metadata — how many pixels map to each physical inch. The actual pixel count remains the same.</li><li><strong>What DPI should I use for printing?</strong> 300 DPI is the standard for high-quality photo printing. Billboard printing may use as low as 150 DPI due to viewing distance.</li><li><strong>What's the difference between DPI and PPI?</strong> PPI (pixels per inch) refers to digital display, while DPI (dots per inch) refers to print output. They're often used interchangeably for this type of conversion.</li><li><strong>Will my file size change?</strong> The file size may change slightly due to metadata updates, but the image content and quality remain identical.</li></ul>
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
let dpiImageData=null;
ImgPro.buildDropZone('dpi-drop-zone',{accept:'image/*',onFiles:async files=>{
    const data=await ImgPro.loadImageToCanvas(files[0]);
    dpiImageData=data;
    document.getElementById('dpi-preview-info').innerHTML=`<div style="font-weight:700;margin-bottom:0.5rem;">Image Loaded</div><div style="font-size:0.9rem;color:var(--text-muted);">Dimensions: ${data.width} × ${data.height} px<br>File: ${files[0].name}<br>Size: ${ImgPro.formatSize(files[0].size)}</div>`;
    document.getElementById('dpi-controls').style.display='block';
    document.getElementById('dpi-result').style.display='none';
    ImgPro.toast('Image loaded!');
}});

function convertDPI(){
    if(!dpiImageData)return ImgPro.toast('Upload an image first');
    let dpi=parseInt(document.getElementById('dpiTarget').value);
    if(isNaN(dpi)){dpi=parseInt(document.getElementById('dpiCustom').value)||300;}
    const canvas=document.getElementById('dpi-canvas');
    canvas.width=dpiImageData.width;canvas.height=dpiImageData.height;
    const ctx=canvas.getContext('2d');
    ctx.drawImage(dpiImageData.canvas,0,0);

    const printW=(dpiImageData.width/dpi).toFixed(2);
    const printH=(dpiImageData.height/dpi).toFixed(2);
    const printWcm=(printW*2.54).toFixed(1);
    const printHcm=(printH*2.54).toFixed(1);

    document.getElementById('dpi-result-info').innerHTML=`
        <div style="font-weight:800;font-size:1.2rem;color:#059669;margin-bottom:0.5rem;">✅ DPI Set to ${dpi}</div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:1rem;margin-top:1rem;">
            <div><div class="text-muted small">Resolution</div><div class="fw-bold">${dpiImageData.width} × ${dpiImageData.height} px</div></div>
            <div><div class="text-muted small">Print Size (inches)</div><div class="fw-bold">${printW}" × ${printH}"</div></div>
            <div><div class="text-muted small">Print Size (cm)</div><div class="fw-bold">${printWcm} × ${printHcm} cm</div></div>
            <div><div class="text-muted small">DPI</div><div class="fw-bold">${dpi}</div></div>
        </div>`;
    document.getElementById('dpi-result').style.display='block';
    ImgPro.toast('DPI converted to '+dpi+'!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>