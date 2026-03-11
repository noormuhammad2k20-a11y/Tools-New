<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
<div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem;margin-bottom:2rem;">
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Pixel ID</label><input type="text" id="fpPixelId" class="form-control" placeholder="123456789012345"></div>
    </div>

    <div style="margin-bottom:2rem;">
        <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Events to Track</label>
        <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="PageView" checked disabled> PageView (default)</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="ViewContent"> ViewContent</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="AddToCart"> AddToCart</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="Purchase"> Purchase</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="Lead"> Lead</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="CompleteRegistration"> CompleteRegistration</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="InitiateCheckout"> InitiateCheckout</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" class="fp-event" value="Subscribe"> Subscribe</label>
        </div>
    </div>

    <button type="button" onclick="generatePixelCode()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Code 📋</button>

    <div id="fp-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <h3 style="margin:0;font-size:1.5rem;font-weight:800;">Generated Pixel Code</h3>
            <button onclick="SMTools.copy(document.getElementById('fp-code').textContent)" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy Code</button>
        </div>
        <pre id="fp-code" style="background:#1e293b;color:#e2e8f0;padding:1.5rem;border-radius:16px;overflow-x:auto;font-size:0.85rem;line-height:1.8;white-space:pre-wrap;"></pre>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Facebook Pixel Code Generator?</h2>
    <p>The Facebook Pixel Code Generator creates ready-to-install tracking code for your website that enables Facebook (Meta) advertising optimization. The Facebook Pixel is a piece of JavaScript code that tracks visitor actions on your website and sends data back to Facebook Ads Manager, enabling powerful features like conversion tracking, custom audiences, lookalike audiences, and dynamic ads retargeting.</p>
    <p>Without proper Pixel implementation, you're essentially running Facebook ads blind — unable to measure ROI, optimize for conversions, or retarget website visitors. This tool generates both the base Pixel code and event-specific tracking code for key conversion actions like purchases, leads, and registrations, making implementation quick and error-free even for non-developers.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your Facebook Pixel ID (found in Facebook Ads Manager under Events Manager).</li><li>Select the conversion events you want to track on your website.</li><li>Copy the generated base code and paste it in your website's <code>&lt;head&gt;</code> section.</li><li>Place event-specific code on relevant pages (e.g., purchase event on thank-you page).</li><li>Verify installation using Facebook Pixel Helper Chrome extension.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Complete base Pixel code with noscript fallback</li><li>8 standard conversion events supported</li><li>Copy-ready code formatted for easy installation</li><li>Event-specific snippets for page-level implementation</li><li>Compatible with all website platforms and CMS systems</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Where do I find my Pixel ID?</strong> Go to Facebook Ads Manager → Events Manager → Select your Pixel → The ID is displayed at the top.</li><li><strong>Where should I place the base code?</strong> The base Pixel code goes in the <code>&lt;head&gt;</code> section of every page on your website, ideally in a global template.</li><li><strong>Do I need separate code for each event?</strong> Yes. Each event (Purchase, Lead, etc.) has its own tracking call that should be placed on the specific page where that action occurs.</li><li><strong>Is this GDPR compliant?</strong> You must obtain user consent before firing tracking pixels in GDPR regions. Consider implementing a cookie consent banner alongside your Pixel.</li></ul>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/seo-marketing-tools.js"></script>
<script>
function generatePixelCode(){
    const pixelId=document.getElementById('fpPixelId').value.trim()||'YOUR_PIXEL_ID';
    const events=Array.from(document.querySelectorAll('.fp-event:checked')).map(c=>c.value);

    let code=`<!-- Facebook Pixel Base Code -->\n<script>\n  !function(f,b,e,v,n,t,s)\n  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?\n  n.callMethod.apply(n,arguments):n.queue.push(arguments)};\n  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';\n  n.queue=[];t=b.createElement(e);t.async=!0;\n  t.src=v;s=b.getElementsByTagName(e)[0];\n  s.parentNode.insertBefore(t,s)}(window, document,'script',\n  'https://connect.facebook.net/en_US/fbevents.js');\n  fbq('init', '${pixelId}');\n  fbq('track', 'PageView');\n<\/script>\n<noscript>\n  <img height="1" width="1" style="display:none"\n    src="https://www.facebook.com/tr?id=${pixelId}&ev=PageView&noscript=1"/>\n</noscript>\n<!-- End Facebook Pixel Base Code -->`;

    if(events.length>0){
        code+='\n\n<!-- Event Tracking Code (place on relevant pages) -->';
        events.forEach(e=>{
            if(e==='PageView') return;
            code+=`\n<script>fbq('track', '${e}');<\/script>`;
        });
    }

    document.getElementById('fp-code').textContent=code;
    document.getElementById('fp-results').style.display='block';
    SMTools.toast('Pixel code generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>