<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    <div style="display:flex;align-items:center;gap:1.5rem;margin-bottom:2.5rem;">
        <div class="tool-icon-circle shadow-sm" style="width:80px;height:80px;background:linear-gradient(135deg,#dbeafe,#bfdbfe);color:#2563eb;border-radius:20px;display:flex;align-items:center;justify-content:center;"><i class="fa-solid fa-circle-info fa-2x"></i></div>
        <div><h1 class="display-6 fw-bold mb-1 text-gradient-primary">Image EXIF Data Viewer</h1><p class="text-muted mb-0">View detailed EXIF metadata from any photo including camera settings and GPS data.</p></div>
    </div>
    <div id="exif-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="exif-results" style="display:none;">
        <div style="display:grid;grid-template-columns:200px 1fr;gap:2rem;margin-bottom:2rem;">
            <div><img id="exif-thumb" style="width:100%;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,0.1);"></div>
            <div id="exif-summary" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:1rem;align-content:start;"></div>
        </div>
        <div id="exif-table" style="border:1px solid var(--border);border-radius:16px;overflow:hidden;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Image EXIF Data Viewer?</h2>
    <p>The Image EXIF Data Viewer reads and displays the Exchangeable Image File Format (EXIF) metadata embedded in your photos. Every digital photo taken by a camera or smartphone contains hidden metadata including camera make and model, lens specifications, exposure settings (ISO, shutter speed, aperture), date and time, and potentially GPS location coordinates. This tool extracts and presents all this data in a clear, organized format without uploading your photo to any server.</p>
    <p>Understanding EXIF data is valuable for photographers analyzing their shooting patterns, journalists verifying photo authenticity, privacy-conscious users checking for embedded location data, and forensic investigators examining digital evidence. Our tool uses the exifr JavaScript library for comprehensive, client-side metadata extraction.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload any JPEG or TIFF image — these formats contain the most EXIF data.</li><li>Review the quick summary cards for key shooting parameters.</li><li>Scroll through the detailed table for all metadata fields.</li><li>Check for GPS data — if present, be aware this reveals where the photo was taken.</li><li>Use this tool before sharing photos online to verify no sensitive metadata is embedded.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Comprehensive EXIF extraction using exifr library</li><li>Visual summary cards for key camera settings</li><li>GPS location detection with privacy warnings</li><li>Support for JPEG, TIFF, and HEIF formats</li><li>100% client-side — your photos never leave your device</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What is EXIF data?</strong> EXIF is a standard for metadata embedded in image files. It captures technical details about how the photo was taken.</li><li><strong>Do all images have EXIF data?</strong> Most JPEGs from cameras and phones contain EXIF data. Screenshots, edited images, and PNG files typically have minimal or no EXIF data.</li><li><strong>How can I remove EXIF data?</strong> Many photo editors and our batch compressor tool strip EXIF data during processing. You can also use dedicated metadata removal tools.</li><li><strong>Is GPS data a privacy risk?</strong> Yes. GPS coordinates in EXIF data reveal the exact location where a photo was taken. Always strip metadata before sharing photos publicly.</li></ul>
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
<script src="https://cdn.jsdelivr.net/npm/exifr@7.1.3/dist/full.umd.js"></script>
<script>
ImgPro.buildDropZone('exif-drop-zone',{accept:'image/*',onFiles:async files=>{
    const file=files[0];
    const url=URL.createObjectURL(file);
    document.getElementById('exif-thumb').src=url;
    try{
        const exifData=await exifr.parse(file,true);
        if(!exifData||!Object.keys(exifData).length){
            document.getElementById('exif-summary').innerHTML='<div style="grid-column:1/-1;padding:1rem;color:#d97706;">No EXIF metadata found in this image.</div>';
            document.getElementById('exif-table').innerHTML='';
            document.getElementById('exif-results').style.display='block';
            return;
        }
        const cards=[];
        if(exifData.Make)cards.push({l:'Camera',v:exifData.Make+' '+(exifData.Model||'')});
        if(exifData.LensModel)cards.push({l:'Lens',v:exifData.LensModel});
        if(exifData.FocalLength)cards.push({l:'Focal Length',v:exifData.FocalLength+'mm'});
        if(exifData.FNumber)cards.push({l:'Aperture',v:'f/'+exifData.FNumber});
        if(exifData.ExposureTime)cards.push({l:'Shutter',v:exifData.ExposureTime<1?'1/'+(1/exifData.ExposureTime):exifData.ExposureTime+'s'});
        if(exifData.ISO)cards.push({l:'ISO',v:exifData.ISO});
        if(exifData.ImageWidth)cards.push({l:'Resolution',v:exifData.ImageWidth+'×'+exifData.ImageHeight});
        if(exifData.DateTimeOriginal)cards.push({l:'Date Taken',v:new Date(exifData.DateTimeOriginal).toLocaleDateString()});

        document.getElementById('exif-summary').innerHTML=cards.map(c=>`<div style="padding:0.75rem;border:1px solid var(--border);border-radius:12px;background:var(--bg-body);"><div style="font-size:0.75rem;color:var(--text-muted);font-weight:600;">${c.l}</div><div style="font-weight:700;font-size:0.95rem;margin-top:0.25rem;">${c.v}</div></div>`).join('');

        // GPS Warning
        let gpsHTML='';
        if(exifData.latitude&&exifData.longitude){
            gpsHTML=`<div style="padding:1rem 1.5rem;background:#fef2f2;border-bottom:1px solid #fecaca;color:#991b1b;font-weight:600;">⚠️ GPS Location Found: ${exifData.latitude.toFixed(6)}, ${exifData.longitude.toFixed(6)} — <a href="https://www.google.com/maps?q=${exifData.latitude},${exifData.longitude}" target="_blank" style="color:#991b1b;">View on Map</a></div>`;
        }

        let rows='';
        for(const[key,val] of Object.entries(exifData)){
            if(val===undefined||val===null||typeof val==='object')continue;
            rows+=`<tr style="border-top:1px solid var(--border);"><td style="padding:0.6rem 1rem;font-weight:600;color:var(--text-muted);width:40%;font-size:0.9rem;">${key}</td><td style="padding:0.6rem 1rem;font-size:0.9rem;word-break:break-all;">${val}</td></tr>`;
        }
        document.getElementById('exif-table').innerHTML=gpsHTML+`<table style="width:100%;border-collapse:collapse;"><tr style="background:#f8fafc;"><th style="padding:0.75rem 1rem;text-align:left;" colspan="2">All Metadata (${Object.keys(exifData).length} fields)</th></tr>${rows}</table>`;
        document.getElementById('exif-results').style.display='block';
        ImgPro.toast('EXIF data extracted!');
    }catch(e){
        document.getElementById('exif-summary').innerHTML='<div style="grid-column:1/-1;padding:1rem;color:#dc2626;">Error reading EXIF: '+e.message+'</div>';
        document.getElementById('exif-table').innerHTML='';
        document.getElementById('exif-results').style.display='block';
    }
}});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>