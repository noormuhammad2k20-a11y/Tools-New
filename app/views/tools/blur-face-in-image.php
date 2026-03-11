<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    
    <div id="bf-drop-zone" style="margin-bottom:2rem;"></div>
    <div id="bf-controls" style="display:none;margin-bottom:2rem;">
        <div style="display:flex;gap:1.5rem;flex-wrap:wrap;align-items:end;">
            <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Blur Intensity</label><input type="range" id="bfBlur" min="5" max="50" value="20" style="width:200px;"></div>
            <button type="button" onclick="processBlur()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Detect &amp; Blur Faces 🔒</button>
        </div>
    </div>
    <div id="bf-status" style="display:none;text-align:center;padding:2rem;color:var(--primary);font-weight:600;">Loading AI model...</div>
    <div id="bf-result" style="display:none;text-align:center;">
        <canvas id="bf-canvas" style="max-width:100%;border-radius:16px;box-shadow:0 10px 40px rgba(0,0,0,0.1);"></canvas>
        <div style="margin-top:1.5rem;">
            <button onclick="downloadBlurred()" class="btn btn-primary" style="padding:0.75rem 2rem;border-radius:14px;font-weight:700;">Download Blurred Image 💾</button>
        </div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Blur Face In Image Tool?</h2>
    <p>The Blur Face In Image tool uses artificial intelligence to automatically detect and blur human faces in photographs for privacy protection. Powered by face-api.js — a JavaScript implementation of face detection neural networks — this tool runs entirely in your browser, meaning your photos are never uploaded to any server. Face blurring is essential for GDPR compliance, protecting minors' privacy in public photos, anonymizing research subjects, and redacting sensitive visual information before sharing on social media or publishing.</p>
    <p>Unlike manual blurring in photo editors, AI-powered face detection can identify all faces in a photo automatically, including partially visible or angled faces, saving significant time when processing images with multiple subjects. The adjustable blur intensity lets you control exactly how much obscuration is applied.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Upload your photo via drag-and-drop or the file browser.</li><li>Adjust the blur intensity slider — higher values create stronger anonymization.</li><li>Click "Detect &amp; Blur Faces" and wait for the AI model to process (first load may take a few seconds).</li><li>Review the result and download the blurred image.</li><li>All processing happens locally in your browser — your images are never sent to any server.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>AI-powered face detection using neural networks (face-api.js)</li><li>Adjustable blur intensity for custom privacy levels</li><li>Multi-face detection — handles photos with multiple people</li><li>100% client-side processing — your photos never leave your device</li><li>High-resolution output matching original image quality</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>How accurate is the face detection?</strong> face-api.js uses SSD MobileNet and can detect faces at various angles and sizes. Detection accuracy is typically 95%+ for frontal faces and 80%+ for profile views.</li><li><strong>Does this work with multiple faces?</strong> Yes. The AI detects and blurs all faces found in the image simultaneously.</li><li><strong>Is my photo uploaded anywhere?</strong> No. All processing happens in your browser using WebGL. Your images never leave your device.</li><li><strong>Why does the first processing take longer?</strong> The AI model weights (~6MB) need to download on first use. Subsequent processing is much faster as the model is cached.</li></ul>
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
<script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
<script>
let bfImage=null;
ImgPro.buildDropZone('bf-drop-zone',{accept:'image/*',onFiles:files=>{
    bfImage=files[0];
    document.getElementById('bf-controls').style.display='block';
    document.getElementById('bf-result').style.display='none';
    ImgPro.toast('Image loaded! Click Detect & Blur.');
}});

async function processBlur(){
    if(!bfImage)return ImgPro.toast('Upload an image first');
    const status=document.getElementById('bf-status');
    status.style.display='block';status.textContent='Loading AI face detection model...';
    try{
        const MODEL_URL='https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/weights';
        await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
        status.textContent='Detecting faces...';
        const {canvas,ctx,img}=await ImgPro.loadImageToCanvas(bfImage);
        const detections=await faceapi.detectAllFaces(canvas);
        const blurAmt=parseInt(document.getElementById('bfBlur').value)||20;
        if(!detections.length){status.textContent='No faces detected in this image.';return;}

        detections.forEach(d=>{
            const b=d.box;
            const tempCanvas=document.createElement('canvas');
            tempCanvas.width=b.width;tempCanvas.height=b.height;
            const tempCtx=tempCanvas.getContext('2d');
            tempCtx.drawImage(canvas,b.x,b.y,b.width,b.height,0,0,b.width,b.height);
            // Pixelate blur effect
            const size=Math.max(2,Math.round(blurAmt/3));
            tempCtx.imageSmoothingEnabled=true;
            const w=tempCanvas.width,h=tempCanvas.height;
            tempCtx.drawImage(tempCanvas,0,0,w,h,0,0,size,size);
            tempCtx.drawImage(tempCanvas,0,0,size,size,0,0,w,h);
            ctx.drawImage(tempCanvas,b.x,b.y);
        });

        const out=document.getElementById('bf-canvas');
        out.width=canvas.width;out.height=canvas.height;
        out.getContext('2d').drawImage(canvas,0,0);
        document.getElementById('bf-result').style.display='block';
        status.textContent=`✅ ${detections.length} face(s) detected and blurred!`;
        ImgPro.toast(detections.length+' face(s) blurred!');
    }catch(e){status.textContent='Error: '+e.message;}
}

function downloadBlurred(){ImgPro.downloadCanvas(document.getElementById('bf-canvas'),'blurred_faces.png');}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>