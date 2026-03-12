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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Your Niche / Topic</label><input type="text" id="ttNiche" class="form-control" placeholder="e.g., cooking, fitness, tech"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Content Format</label>
            <select id="ttFormat" class="form-control"><option value="any">Any Format</option><option value="vlog">Vlog</option><option value="talking-head">Talking Head</option><option value="screen-record">Screen Record</option><option value="transition">Transition</option><option value="skit">Skit</option></select></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Number of Ideas</label><input type="number" id="ttCount" class="form-control" value="5" min="1" max="10"></div>
    </div>

    <button type="button" onclick="generateTiktokIdeas()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Ideas 🎬</button>

    <div id="tt-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <h3 style="margin:0 0 1.5rem;font-size:1.5rem;font-weight:800;">TikTok Video Ideas</h3>
        <div id="tt-list" style="display:grid;gap:1.5rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the TikTok Idea Generator?</h2>
    <p>The TikTok Idea Generator is a free creative tool that provides fresh, trending video concepts tailored to your niche. With over 1 billion monthly active users, TikTok has become the most influential social media platform for brand awareness and audience growth. However, consistency is key — the algorithm rewards creators who post frequently with engaging content. Our tool eliminates creator's block by providing ready-to-film ideas complete with format suggestions, script outlines, and trending hashtag recommendations based on our curated database of proven viral content formats.</p>
    <p>Whether you're a small business owner, influencer, or social media manager, having a bank of content ideas ensures you never run out of things to post. Our ideas are based on formats that consistently perform well across niches, adapted with your specific topic for relevance.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your niche or main topic area for personalized ideas.</li><li>Filter by content format if you have a preferred style.</li><li>Read each script outline and adapt it with your unique angle.</li><li>Use the suggested hashtags as a starting point and add niche-specific tags.</li><li>Batch generate 10 ideas at once to plan a full week of content.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>10+ proven viral content formats adapted to your niche</li><li>Script outlines for each video concept</li><li>Trending hashtag suggestions</li><li>Content format filtering (vlog, talking head, skit, etc.)</li><li>100% free with no usage limits</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Will these ideas work for Instagram Reels too?</strong> Yes! The content formats are platform-agnostic and work equally well on Instagram Reels, YouTube Shorts, and other short-form platforms.</li><li><strong>How often should I post on TikTok?</strong> Most successful creators post 1-3 times daily. Use this tool to generate a week's worth of ideas in one session.</li><li><strong>Can I customize the scripts?</strong> The provided scripts are outlines — you should always add your personal touch, experiences, and unique perspective.</li><li><strong>Are the hashtags up to date?</strong> Hashtag trends change rapidly. Use our suggestions as a base and check TikTok's Discover page for current trending tags.</li></ul>
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
function generateTiktokIdeas(){
    const niche=document.getElementById('ttNiche').value.trim()||'your niche';
    const format=document.getElementById('ttFormat').value;
    const count=parseInt(document.getElementById('ttCount').value)||5;
    let pool=SMTools.tiktokDB;
    if(format!=='any') pool=pool.filter(i=>i.format===format);
    if(!pool.length) pool=SMTools.tiktokDB;
    const shuffled=[...pool].sort(()=>Math.random()-0.5).slice(0,count);
    const formatColors={'vlog':'#2563eb','talking-head':'#7c3aed','screen-record':'#059669','transition':'#d97706','skit':'#db2777','split-screen':'#0891b2','reply':'#ea580c','tier-list':'#4f46e5','list':'#16a34a'};

    let html='';
    shuffled.forEach((idea,i)=>{
        const script=idea.script.replace('[niche]',niche).replace('[topic]',niche);
        const fColor=formatColors[idea.format]||'#64748b';
        html+=`<div style="border:1px solid var(--border);border-radius:18px;overflow:hidden;background:var(--bg-body);">
            <div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;">
                <div style="display:flex;align-items:center;gap:0.75rem;"><span style="background:#f1f5f9;width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;">${i+1}</span><h4 style="margin:0;font-weight:700;">${idea.title}</h4></div>
                <span style="background:${fColor};color:#fff;padding:0.25rem 0.75rem;border-radius:20px;font-size:0.75rem;font-weight:600;">${idea.format}</span>
            </div>
            <div style="padding:1.5rem;">
                <div style="margin-bottom:1rem;"><strong style="font-size:0.85rem;color:var(--text-muted);">SCRIPT OUTLINE</strong><p style="margin:0.5rem 0 0;line-height:1.7;">${script}</p></div>
                <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:0.75rem;">
                    <div style="color:var(--primary);font-size:0.85rem;font-weight:600;">${idea.hashtags.replace('[niche]',niche)}</div>
                    <button onclick="SMTools.copy('${idea.title}: ${script.replace(/'/g,"\\'")}')" style="border:none;background:var(--primary);color:#fff;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-weight:600;font-size:0.85rem;">Copy Idea</button>
                </div>
            </div></div>`;
    });
    document.getElementById('tt-list').innerHTML=html;
    document.getElementById('tt-results').style.display='block';
    SMTools.toast(shuffled.length+' ideas generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>