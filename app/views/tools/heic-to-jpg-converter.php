<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    
    <div id="heic-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="heic-controls" style="display:none;margin-bottom:1.5rem;">
        <div style="display:flex;gap:1.5rem;align-items:end;flex-wrap:wrap;">
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Output Quality</label>
                <select id="heicQuality" class="form-control"><option value="1.0">Maximum (100%)</option><option value="0.92" selected>High (92%)</option><option value="0.8">Medium (80%)</option><option value="0.6">Low (60%)</option></select></div>
            <button type="button" onclick="convertHEIC()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Convert to JPG 🔄</button>
        </div>
    </div>
    <div id="heic-status" style="display:none;text-align:center;padding:1.5rem;color:var(--primary);font-weight:600;"></div>
    <div id="heic-results" style="display:none;"><h3 style="font-weight:800;margin-bottom:1rem;">Converted Images</h3><div id="heic-list" style="display:grid;gap:1rem;"></div></div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the HEIC to JPG Converter?</h2>
    <p>The HEIC to JPG Converter transforms Apple's HEIC/HEIF image format into universally compatible JPG files directly in your browser. HEIC (High Efficiency Image Container) is the default photo format on iPhones and iPads running iOS 11 and later. While HEIC offers excellent compression efficiency (50% smaller files than JPG at similar quality), it has limited compatibility outside the Apple ecosystem — most Windows PCs, Android devices, web platforms, and email clients don't natively support HEIC images.</p>
    <p>Powered by the heic2any JavaScript library, our converter runs entirely in your browser without uploading your photos anywhere. It supports batch conversion of multiple files simultaneously, making it easy to convert entire photo albums for sharing, web publishing, or cross-platform compatibility.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload one or more HEIC/HEIF files via drag-and-drop or file browser.</li><li>Select your desired output quality — higher quality means larger file sizes.</li><li>Click "Convert to JPG" and wait for processing (may take a few seconds per image).</li><li>Download individual converted images or batch download all results.</li><li>All processing happens locally — your photos never leave your device.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li><strong>PRO:</strong> Batch conversion — convert multiple HEIC files at once</li><li>Adjustable output quality (60%-100%)</li><li>100% client-side using heic2any library</li><li>Preserves original image dimensions and color profile</li><li>No file size limits or watermarks</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What is HEIC format?</strong> HEIC is Apple's implementation of the HEIF (High Efficiency Image Format) standard. It offers 50% better compression than JPEG while maintaining similar visual quality.</li><li><strong>Can I disable HEIC on my iPhone?</strong> Yes. Go to Settings → Camera → Formats → Select "Most Compatible" to shoot in JPG by default.</li><li><strong>Will the conversion lose quality?</strong> Some quality loss is inherent when converting between formats. Using the "Maximum" quality setting minimizes this to imperceptible levels.</li><li><strong>Are my photos uploaded to a server?</strong> No. The heic2any library processes everything in your browser using JavaScript. Your photos stay on your device at all times.</li></ul>
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
<script src="https://cdn.jsdelivr.net/npm/heic2any@0.0.4/dist/heic2any.min.js"></script>
<script>
let heicFiles=[];
ImgPro.buildDropZone('heic-drop-zone',{accept:'.heic,.heif,image/heic,image/heif',multiple:true,onFiles:files=>{
    heicFiles=files;
    document.getElementById('heic-controls').style.display='block';
    document.getElementById('heic-results').style.display='none';
    ImgPro.toast(files.length+' file(s) loaded!');
}});

async function convertHEIC(){
    if(!heicFiles.length){ImgPro.toast('Upload HEIC files first');return;}
    const quality=parseFloat(document.getElementById('heicQuality').value);
    const status=document.getElementById('heic-status');
    status.style.display='block';
    let html='';let done=0;

    for(const file of heicFiles){
        status.textContent=`Converting ${++done}/${heicFiles.length}...`;
        try{
            const blob=await heic2any({blob:file,toType:'image/jpeg',quality});
            const url=URL.createObjectURL(blob);
            const name=file.name.replace(/\.(heic|heif)$/i,'.jpg');
            html+=`<div style="padding:1.25rem;border:1px solid var(--border);border-radius:14px;background:var(--bg-body);display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;">
                <div style="display:flex;align-items:center;gap:1rem;"><img src="${url}" style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                    <div><div style="font-weight:700;">${name}</div><div style="font-size:0.8rem;color:var(--text-muted);">${ImgPro.formatSize(file.size)} → ${ImgPro.formatSize(blob.size)}</div></div></div>
                <a href="${url}" download="${name}" class="btn btn-primary btn-sm" style="border-radius:8px;text-decoration:none;">Download JPG</a></div>`;
        }catch(e){html+=`<div style="padding:1rem;border:1px solid #fecaca;border-radius:14px;background:#fef2f2;color:#991b1b;">${file.name}: Conversion failed — ${e.message||'Invalid HEIC file'}</div>`;}
    }
    document.getElementById('heic-list').innerHTML=html;
    document.getElementById('heic-results').style.display='block';
    status.textContent=`✅ ${done} file(s) converted!`;
    ImgPro.toast('Conversion complete!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>