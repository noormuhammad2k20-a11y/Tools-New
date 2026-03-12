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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Event Category</label>
            <select id="gaCategory" class="form-control" onchange="updateGAEvent()"><option value="custom">Custom Event</option><option value="button_click">Button Click</option><option value="form_submit">Form Submission</option><option value="scroll_depth">Scroll Depth</option><option value="video_play">Video Play</option><option value="file_download">File Download</option><option value="purchase">Purchase</option><option value="sign_up">Sign Up</option></select></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Event Name</label><input type="text" id="gaEventName" class="form-control" placeholder="e.g. cta_click"></div>
    </div>

    <h4 style="font-weight:700;margin-bottom:1rem;">Event Parameters <span style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:800;vertical-align:middle;margin-left:0.5rem;">PRO</span></h4>
    <div id="ga-params" style="margin-bottom:1.5rem;">
        <div class="ga-param-row" style="display:grid;grid-template-columns:1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;"><input type="text" class="form-control ga-key" placeholder="Key" value="button_id"><input type="text" class="form-control ga-val" placeholder="Value" value="hero_cta"><button type="button" onclick="this.closest('.ga-param-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button></div>
    </div>
    <button type="button" onclick="addGAParam()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-size:0.85rem;margin-bottom:2rem;">+ Add Parameter</button>

    <div><button type="button" onclick="generateGA4Code()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Code 📊</button></div>

    <div id="ga-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;"><h3 style="margin:0;font-size:1.5rem;font-weight:800;">GA4 Event Code</h3><button onclick="SMTools.copy(document.getElementById('ga-code').textContent)" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy</button></div>
        <pre id="ga-code" style="background:#1e293b;color:#e2e8f0;padding:1.5rem;border-radius:16px;overflow-x:auto;font-size:0.85rem;line-height:1.8;white-space:pre-wrap;"></pre>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the GA4 Event Code Generator?</h2>
    <p>The GA4 Event Code Generator creates ready-to-use Google Analytics 4 event tracking code for your website. GA4 uses an event-based data model, meaning every interaction — page views, clicks, purchases, form submissions — is tracked as an event. Custom events allow you to track specific user interactions that matter most to your business, providing granular insights into user behavior, conversion funnels, and engagement patterns that default GA4 tracking doesn't capture.</p>
    <p>With GA4 replacing Universal Analytics, implementing proper event tracking is essential for any data-driven marketing strategy. Our tool generates correctly formatted gtag.js code with custom parameters, saving developers and marketers from common implementation errors that lead to lost data.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Select an event category or choose Custom for unique tracking needs.</li><li>Name your event using snake_case (e.g., button_click, form_submit).</li><li>Add custom parameters for rich event data — these appear in GA4 custom dimensions.</li><li>Copy the generated code and implement it on the relevant page or element.</li><li>Verify events are firing correctly using GA4 DebugView in real-time.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>8 pre-configured event templates for common tracking scenarios</li><li><strong>PRO:</strong> Custom parameter builder for rich event data</li><li>Correctly formatted gtag.js code output</li><li>One-click copy for instant implementation</li><li>Compatible with GA4's event-based tracking model</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Do I need gtag.js installed first?</strong> Yes, the base GA4 tracking code (gtag.js with your Measurement ID) must be installed on your site before custom events will work.</li><li><strong>How do I name events properly?</strong> Use lowercase snake_case names (e.g., sign_up, purchase_complete). Avoid spaces and special characters. GA4 has reserved event names — check Google's documentation.</li><li><strong>Where do I see custom events in GA4?</strong> Navigate to Reports → Engagement → Events. Custom parameters appear under Configure → Custom Definitions.</li><li><strong>How many custom events can I have?</strong> GA4 allows up to 500 distinctly named events and 25 custom parameters per event.</li></ul>
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
const eventDefaults={button_click:'cta_click',form_submit:'form_submit',scroll_depth:'scroll_milestone',video_play:'video_engagement',file_download:'file_download',purchase:'purchase',sign_up:'sign_up',custom:'my_custom_event'};
function updateGAEvent(){document.getElementById('gaEventName').value=eventDefaults[document.getElementById('gaCategory').value]||'custom_event';}
function addGAParam(){document.getElementById('ga-params').insertAdjacentHTML('beforeend',`<div class="ga-param-row" style="display:grid;grid-template-columns:1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;"><input type="text" class="form-control ga-key" placeholder="Key"><input type="text" class="form-control ga-val" placeholder="Value"><button type="button" onclick="this.closest('.ga-param-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button></div>`);}

function generateGA4Code(){
    const name=document.getElementById('gaEventName').value.trim()||'custom_event';
    const params={};
    document.querySelectorAll('.ga-param-row').forEach(r=>{const k=r.querySelector('.ga-key').value.trim();const v=r.querySelector('.ga-val').value.trim();if(k)params[k]=v;});
    let code=`// GA4 Event Tracking Code\n// Place this where the event should fire (e.g. button click handler)\n\ngtag('event', '${name}'`;
    if(Object.keys(params).length){code+=', {\n'+Object.entries(params).map(([k,v])=>`  '${k}': '${v}'`).join(',\n')+'\n}';}
    code+=');';
    code+=`\n\n// --- Example: Track on button click ---\n// document.getElementById('myButton').addEventListener('click', function() {\n//   gtag('event', '${name}', ${JSON.stringify(params,null,4)});\n// });`;
    document.getElementById('ga-code').textContent=code;
    document.getElementById('ga-results').style.display='block';
    SMTools.toast('GA4 code generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>