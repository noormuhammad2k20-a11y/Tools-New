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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Keywords (comma separated)</label><input type="text" id="dnKeywords" class="form-control" placeholder="cloud, sync, flow"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Industry / Niche</label>
            <select id="dnIndustry" class="form-control"><option>Tech / SaaS</option><option>E-Commerce</option><option>Health / Fitness</option><option>Finance</option><option>Education</option><option>Creative / Design</option><option>Food / Restaurant</option><option>Travel</option></select></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">How Many?</label><input type="number" id="dnCount" class="form-control" value="20" min="5" max="50"></div>
    </div>

    <button type="button" onclick="generateDomains()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Domain Ideas 🌐</button>

    <div id="dn-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <h3 style="margin:0 0 1.5rem;font-size:1.5rem;font-weight:800;">Domain Name Ideas</h3>
        <div id="dn-list" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:0.75rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Domain Name Idea Generator?</h2>
    <p>The Domain Name Idea Generator is a free tool that creates unique, brandable domain name suggestions for your startup, blog, SaaS product, or e-commerce store. Finding the perfect domain name is one of the most critical branding decisions you'll make — it needs to be memorable, easy to spell, and available. Our algorithm combines your keywords with proven naming strategies including prefix/suffix combinations, portmanteaus, and creative TLD options to generate dozens of possibilities in seconds.</p>
    <p>With over 350 million registered domain names worldwide, finding a great .com domain is increasingly difficult. Our tool explores alternative TLDs like .io, .co, .app, and .ai that are widely accepted for modern businesses, giving you significantly more options without compromising professionalism.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter 2-3 core keywords that describe your brand or product concept.</li><li>Select your industry for contextually relevant combinations.</li><li>Generate 20-50 ideas and shortlist your top 5 favorites.</li><li>Click the availability check link to verify domain registration status.</li><li>Consider alternative TLDs if your preferred .com is taken.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Smart prefix/suffix combinations from curated naming databases</li><li>Multiple TLD suggestions including .com, .io, .co, .app, .ai</li><li>Industry-specific naming patterns</li><li>One-click domain availability check via Namecheap</li><li>Generate up to 50 ideas per session</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Are the generated domains guaranteed available?</strong> No. This tool generates name ideas — you must check registration availability through a domain registrar.</li><li><strong>What TLD should I choose?</strong> .com remains the gold standard for consumer brands. .io and .app are widely accepted for tech/SaaS. .co is great for creative startups.</li><li><strong>How important is domain name for SEO?</strong> While exact-match domains no longer provide significant SEO advantage, a memorable, brandable domain helps with direct traffic and brand recognition.</li><li><strong>Can I use these names commercially?</strong> The generated names are random combinations. Always check for trademark conflicts before registering a domain for commercial use.</li></ul>
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
function generateDomains(){
    const keywords=document.getElementById('dnKeywords').value.split(',').map(k=>k.trim().toLowerCase()).filter(Boolean);
    if(!keywords.length){SMTools.toast('Please enter at least one keyword');return;}
    const count=parseInt(document.getElementById('dnCount').value)||20;
    const pf=SMTools.domainPrefixes, sf=SMTools.domainSuffixes, tlds=SMTools.domainTLDs;
    const names=new Set();
    // Strategy 1: keyword + suffix
    keywords.forEach(k=>{sf.forEach(s=>{tlds.forEach(t=>{names.add(k+s+t);});});});
    // Strategy 2: prefix + keyword
    keywords.forEach(k=>{pf.forEach(p=>{tlds.forEach(t=>{names.add(p+k+t);});});});
    // Strategy 3: two keywords combined
    if(keywords.length>=2){for(let i=0;i<keywords.length;i++)for(let j=0;j<keywords.length;j++)if(i!==j) tlds.forEach(t=>names.add(keywords[i]+keywords[j]+t));}
    // Strategy 4: keyword alone with various TLDs
    keywords.forEach(k=>{tlds.forEach(t=>{names.add(k+t);});});

    const arr=[...names].sort(()=>Math.random()-0.5).slice(0,count);
    let html='';
    arr.forEach(d=>{
        const name=d.replace(/\.\w+$/,'');const tld=d.match(/\.\w+$/)?.[0]||'.com';
        html+=`<div style="padding:1rem 1.25rem;border:1px solid var(--border);border-radius:12px;background:var(--bg-body);display:flex;justify-content:space-between;align-items:center;">
            <div><span style="font-weight:700;font-size:1.05rem;">${name}</span><span style="color:var(--primary);font-weight:600;">${tld}</span></div>
            <div style="display:flex;gap:0.5rem;">
                <button onclick="SMTools.copy('${d}')" style="border:none;background:var(--primary-glow);color:var(--primary);padding:0.4rem 0.75rem;border-radius:8px;cursor:pointer;font-size:0.8rem;font-weight:600;">Copy</button>
                <a href="https://www.namecheap.com/domains/registration/results/?domain=${d}" target="_blank" style="border:none;background:#059669;color:#fff;padding:0.4rem 0.75rem;border-radius:8px;font-size:0.8rem;font-weight:600;text-decoration:none;">Check</a>
            </div></div>`;
    });
    document.getElementById('dn-list').innerHTML=html;
    document.getElementById('dn-results').style.display='block';
    SMTools.toast(arr.length+' domain ideas generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>