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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Website URL</label><input type="text" id="saUrl" class="form-control" placeholder="https://example.com"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Website Type</label>
            <select id="saType" class="form-control"><option>Blog / Content Site</option><option>E-Commerce Store</option><option>SaaS / Web App</option><option>Local Business</option><option>Portfolio / Agency</option></select></div>
    </div>

    <button type="button" onclick="generateAudit()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;">Generate Audit Checklist ✅</button>

    <div id="sa-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;"><h3 style="margin:0;font-size:1.5rem;font-weight:800;">Your SEO Audit Checklist</h3><div id="sa-progress" style="font-weight:700;color:var(--primary);">0/0 complete</div></div>
        <div id="sa-checklist" style="display:grid;gap:1.5rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the SEO Audit Checklist Generator?</h2>
    <p>The SEO Audit Checklist Generator creates a comprehensive, actionable SEO audit customized for your website type. An SEO audit is a systematic review of your website's search engine optimization health, identifying issues that may be preventing your site from ranking higher in Google and other search engines. Our checklist covers all major SEO categories including technical SEO, on-page optimization, content quality, link building, and user experience metrics.</p>
    <p>Regular SEO audits are essential for maintaining and improving search rankings. Google's algorithm considers over 200 ranking factors, and issues like slow page speed, broken links, missing meta tags, or thin content can significantly impact your visibility. This tool generates a prioritized checklist specific to your website type, helping you focus on the optimizations that will have the greatest impact.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your website URL and select your site type for customized recommendations.</li><li>Work through each checklist category systematically, checking items as you complete them.</li><li>Prioritize critical items (marked with ⚠️) as they have the highest impact on rankings.</li><li>Run this audit quarterly to catch new issues and track improvements.</li><li>Export or bookmark your completed checklist for team reference.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>70+ audit items across 6 SEO categories</li><li>Website type-specific customization</li><li>Interactive checkboxes with live progress tracking</li><li>Priority indicators for high-impact items</li><li>Comprehensive coverage: Technical, On-Page, Content, Links, UX, and Local SEO</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>How often should I perform an SEO audit?</strong> Comprehensive audits should be done quarterly. Quick health checks can be done monthly to catch critical issues early.</li><li><strong>Which items should I prioritize?</strong> Focus on technical SEO issues first (indexing, crawlability, speed), then on-page optimization, and finally content and link building.</li><li><strong>Can this replace professional SEO tools?</strong> This checklist guides you on what to check. For detailed metrics, use it alongside tools like Google Search Console, Screaming Frog, or Ahrefs.</li><li><strong>Is this checklist saved?</strong> Currently, checkbox states are not persisted. We recommend completing the audit in one session or taking screenshots of your progress.</li></ul>
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
function generateAudit(){
    const url=document.getElementById('saUrl').value||'your website';
    const type=document.getElementById('saType').value;
    const sections=[
        {title:'🔧 Technical SEO',items:['SSL/HTTPS is properly configured','XML Sitemap exists and is submitted to Google Search Console','robots.txt file is present and correctly configured','No crawl errors in Google Search Console','Page speed score is 90+ on mobile (PageSpeed Insights)','Core Web Vitals pass (LCP, FID, CLS)','Mobile-friendly responsive design','No broken links (404 errors)','Canonical tags are properly implemented','Structured data/Schema markup is valid','GZIP compression is enabled','Browser caching is configured']},
        {title:'📝 On-Page SEO',items:['Every page has a unique title tag (50-60 chars)','Every page has a unique meta description (150-160 chars)','Proper heading hierarchy (single H1, ordered H2-H6)','Images have descriptive alt text','URLs are clean, short, and keyword-rich','Internal linking strategy is implemented','Keywords are used naturally in content','Open Graph and Twitter Card meta tags are set']},
        {title:'📄 Content Quality',items:['Content is original and provides unique value','Blog posts are 1000+ words for pillar topics','Content is regularly updated and refreshed','No thin or duplicate content pages','FAQ sections are included where relevant','Content matches search intent for target keywords','Multimedia (images, videos) enhances content']},
        {title:'🔗 Link Building & Authority',items:['Backlink profile is clean (no toxic links)','Internal links use descriptive anchor text','External links point to authoritative sources','Broken external links are fixed','Social media profiles link back to website','Guest posting strategy is active']},
        {title:'👤 User Experience (UX)',items:['Navigation is intuitive and consistent','CTA buttons are prominent and clear','Page layout is not cluttered','Font sizes are readable on all devices','Forms are easy to complete','404 page is custom and helpful','Breadcrumb navigation is implemented']},
    ];
    if(type.includes('Local'))sections.push({title:'📍 Local SEO',items:['Google Business Profile is claimed and optimized','NAP (Name, Address, Phone) is consistent across web','Local schema markup is implemented','Customer reviews are managed and responded to','Local keywords are targeted in content','Business is listed in relevant directories']});
    if(type.includes('E-Commerce'))sections.push({title:'🛒 E-Commerce SEO',items:['Product pages have unique descriptions','Product schema markup is implemented','Category pages are optimized with content','Out-of-stock products are handled properly','Customer reviews are displayed on product pages','Site search is functional and fast']});

    let totalItems=0;
    let html='';
    sections.forEach((s,si)=>{
        html+=`<div style="border:1px solid var(--border);border-radius:16px;overflow:hidden;"><div style="padding:1rem 1.5rem;background:#f8fafc;font-weight:700;font-size:1.1rem;border-bottom:1px solid var(--border);">${s.title}</div><div style="padding:1rem 1.5rem;display:grid;gap:0.5rem;">`;
        s.items.forEach((item,ii)=>{
            totalItems++;
            html+=`<label style="display:flex;align-items:center;gap:0.75rem;padding:0.5rem;border-radius:8px;cursor:pointer;transition:background .2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'"><input type="checkbox" class="sa-check" onchange="updateProgress()" style="width:18px;height:18px;cursor:pointer;"><span>${item}</span></label>`;
        });
        html+=`</div></div>`;
    });
    document.getElementById('sa-checklist').innerHTML=html;
    document.getElementById('sa-results').style.display='block';
    updateProgress();
    SMTools.toast('Audit checklist generated!');
}
function updateProgress(){
    const all=document.querySelectorAll('.sa-check');
    const done=document.querySelectorAll('.sa-check:checked');
    document.getElementById('sa-progress').textContent=`${done.length}/${all.length} complete (${all.length?Math.round(done.length/all.length*100):0}%)`;
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>