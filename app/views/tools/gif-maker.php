<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    
    <div id="gif-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="gif-preview" style="display:none;margin-bottom:2rem;">
        <h4 style="font-weight:700;margin-bottom:1rem;">Uploaded Frames <span id="gif-count" style="color:var(--primary);"></span></h4>
        <div id="gif-frames" style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1.5rem;"></div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem;margin-bottom:1.5rem;">
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Frame Delay (ms)</label><input type="number" id="gifDelay" class="form-control" value="500" min="50" max="5000" step="50"></div>
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">GIF Width (px)</label><input type="number" id="gifWidth" class="form-control" value="400" min="50" max="2000"></div>
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Quality</label>
                <select id="gifQuality" class="form-control"><option value="1">Highest</option><option value="5">High</option><option value="10" selected>Medium</option><option value="15">Low (Smaller File)</option></select></div>
        </div>
        <button type="button" onclick="makeGIF()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Create GIF 🎞️</button>
    </div>
    <div id="gif-status" style="display:none;text-align:center;padding:1.5rem;color:var(--primary);font-weight:600;"></div>
    <div id="gif-result" style="display:none;text-align:center;">
        <img id="gif-output" style="max-width:100%;border-radius:16px;box-shadow:0 10px 40px rgba(0,0,0,0.1);">
        <div style="margin-top:1.5rem;"><button id="gif-dl-btn" onclick="" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Download GIF 💾</button></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the GIF Maker?</h2>
    <p>The GIF Maker creates animated GIF images from multiple static image frames, entirely in your browser using the powerful gif.js library. GIFs remain one of the most widely supported animation formats across social media, messaging apps, email clients, and websites. Our tool gives you full control over frame timing, output resolution, and quality settings to create perfect animations for social content, product demos, tutorials, memes, or website banners.</p>
    <p>Unlike online GIF creation services that upload your images to external servers, our tool processes everything locally using Web Workers for optimal performance. This means faster processing, complete privacy, and no file size limits imposed by third-party services.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload multiple images (2+) that will become frames of your GIF animation.</li><li>Arrange or review the frame order in the preview area.</li><li>Set the frame delay (500ms = 2 frames per second, 200ms = 5 fps).</li><li>Adjust the output width — all frames will be scaled proportionally.</li><li>Choose quality level and create your GIF — download instantly when ready.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Multi-frame upload with drag-and-drop support</li><li>Customizable frame delay for precise animation timing</li><li>Adjustable output resolution and quality</li><li>Client-side processing using gif.js Web Workers</li><li>No file size limits or watermarks</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>How many frames can I add?</strong> There's no hard limit, but more frames create larger files. We recommend 5-30 frames for optimal results.</li><li><strong>Why is my GIF file so large?</strong> GIF is an uncompressed format. Lower the quality setting or reduce the output width to decrease file size.</li><li><strong>What image formats can I upload?</strong> All standard web image formats are supported: JPEG, PNG, WebP, and GIF (individual frames).</li><li><strong>Can I create a GIF from a video?</strong> This tool works with static images. For video-to-GIF conversion, you'd need to extract frames from the video first.</li></ul>
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
<script src="https://cdn.jsdelivr.net/npm/gif.js@0.2.0/dist/gif.js"></script>
<script>
let gifFiles=[];
ImgPro.buildDropZone('gif-drop-zone',{accept:'image/*',multiple:true,onFiles:files=>{
    gifFiles=files;
    document.getElementById('gif-count').textContent='('+files.length+' frames)';
    const container=document.getElementById('gif-frames');container.innerHTML='';
    files.forEach((f,i)=>{
        const r=new FileReader();
        r.onload=e=>{container.insertAdjacentHTML('beforeend',`<div style="position:relative;"><img src="${e.target.result}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:2px solid var(--border);"><div style="position:absolute;top:-5px;right:-5px;background:var(--primary);color:#fff;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.7rem;font-weight:700;">${i+1}</div></div>`);};
        r.readAsDataURL(f);
    });
    document.getElementById('gif-preview').style.display='block';
    document.getElementById('gif-result').style.display='none';
    ImgPro.toast(files.length+' frames loaded!');
}});

async function makeGIF(){
    if(gifFiles.length<2){ImgPro.toast('Upload at least 2 images');return;}
    const delay=parseInt(document.getElementById('gifDelay').value)||500;
    const width=parseInt(document.getElementById('gifWidth').value)||400;
    const quality=parseInt(document.getElementById('gifQuality').value)||10;
    const status=document.getElementById('gif-status');
    status.style.display='block';status.textContent='Creating GIF... (0%)';

    const gif=new GIF({workers:2,quality,width,workerScript:'https://cdn.jsdelivr.net/npm/gif.js@0.2.0/dist/gif.worker.js'});

    for(const file of gifFiles){
        const data=await ImgPro.loadImageToCanvas(file);
        const ratio=data.height/data.width;
        const h=Math.round(width*ratio);
        const c=document.createElement('canvas');c.width=width;c.height=h;
        c.getContext('2d').drawImage(data.canvas,0,0,width,h);
        gif.addFrame(c,{delay,copy:true});
    }

    gif.on('progress',p=>{status.textContent=`Creating GIF... (${Math.round(p*100)}%)`;});
    gif.on('finished',blob=>{
        const url=URL.createObjectURL(blob);
        document.getElementById('gif-output').src=url;
        document.getElementById('gif-dl-btn').onclick=()=>ImgPro.downloadBlob(blob,'animation.gif');
        document.getElementById('gif-result').style.display='block';
        status.textContent=`✅ GIF created! (${ImgPro.formatSize(blob.size)})`;
        ImgPro.toast('GIF created!');
    });
    gif.render();
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>