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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Video Title</label><input type="text" id="ytTitle" class="form-control" placeholder="Your video title"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Target Keyword</label><input type="text" id="ytKeyword" class="form-control" placeholder="Main keyword to rank for"></div>
    </div>
    <div style="margin-bottom:2rem;"><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Video Description</label><textarea id="ytDesc" class="form-control" rows="4" placeholder="Paste your video description"></textarea></div>
    <div style="margin-bottom:2rem;"><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Tags (comma separated)</label><input type="text" id="ytTags" class="form-control" placeholder="tag1, tag2, tag3"></div>

    <button type="button" onclick="checkYTRank()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;">Analyze Video SEO 🎯</button>

    <div id="yt-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="text-align:center;margin-bottom:2rem;">
            <div class="text-muted small">Video SEO Score</div>
            <div id="yt-score" style="font-size:4rem;font-weight:900;">—</div>
            <div id="yt-verdict" style="font-size:1.1rem;font-weight:700;">—</div>
        </div>
        <div id="yt-feedback" style="display:grid;gap:0.75rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the YouTube Video Rank Checker?</h2>
    <p>The YouTube Video Rank Checker analyzes your video's metadata and provides a comprehensive SEO score with actionable optimization tips. YouTube is the world's second-largest search engine, processing over 3 billion searches per month. Ranking higher in YouTube search results and suggested videos can dramatically increase your views, subscribers, and channel growth. Our tool evaluates your title, description, tags, and keyword usage against proven YouTube SEO best practices to identify optimization opportunities.</p>
    <p>YouTube's algorithm considers hundreds of signals when ranking videos, but metadata optimization is one of the few factors entirely within your control. Studies show that videos with properly optimized titles, descriptions, and tags receive 50% more organic views in their first 48 hours compared to unoptimized content.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your video title exactly as it appears (or as you plan to publish it).</li><li>Specify the target keyword you want to rank for in YouTube search.</li><li>Paste your full video description for comprehensive analysis.</li><li>Add all your video tags, separated by commas.</li><li>Review each feedback item and make improvements before publishing or updating.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Comprehensive scoring across title, description, tags, and keyword presence</li><li>Character length optimization for titles and descriptions</li><li>Keyword placement analysis (front-loading detection)</li><li>Tag quantity and relevance scoring</li><li>Actionable improvement suggestions for each factor</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What's a good YouTube SEO score?</strong> Aim for 75+. Scores above 85 indicate excellent optimization likely to perform well in YouTube search.</li><li><strong>Does metadata optimization guarantee rankings?</strong> No. Watch time, click-through rate, and engagement are also critical. However, metadata optimization ensures YouTube's algorithm understands your content.</li><li><strong>How long should my title be?</strong> Ideally 60-70 characters. YouTube truncates titles at around 70 characters in search results.</li><li><strong>How many tags should I use?</strong> Use 5-15 relevant tags. Include your target keyword, variations, and related topics. Over-tagging with irrelevant tags can hurt rankings.</li></ul>
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
function checkYTRank(){
    const title=document.getElementById('ytTitle').value.trim();
    const keyword=document.getElementById('ytKeyword').value.trim().toLowerCase();
    const desc=document.getElementById('ytDesc').value.trim();
    const tags=document.getElementById('ytTags').value.split(',').map(t=>t.trim()).filter(Boolean);
    if(!title||!keyword){SMTools.toast('Please fill in title and keyword');return;}

    let score=50;const fb=[];
    // Title
    if(title.length>=30&&title.length<=70){score+=8;fb.push({t:'Title length is optimal ('+title.length+' chars)',c:'good'});}
    else if(title.length<30){score-=5;fb.push({t:'Title is too short ('+title.length+' chars). Aim for 30-70.',c:'bad'});}
    else{score-=5;fb.push({t:'Title may be truncated ('+title.length+' chars). Keep under 70.',c:'bad'});}

    if(title.toLowerCase().includes(keyword)){score+=12;fb.push({t:'Target keyword found in title',c:'good'});
        if(title.toLowerCase().startsWith(keyword)||title.toLowerCase().indexOf(keyword)<15){score+=5;fb.push({t:'Keyword is front-loaded in title — excellent!',c:'good'});}
    }else{score-=15;fb.push({t:'Target keyword NOT found in title — critical SEO issue',c:'bad'});}

    // Description
    if(desc.length>=250){score+=10;fb.push({t:'Description is comprehensive ('+desc.length+' chars)',c:'good'});}
    else if(desc.length>=100){score+=5;fb.push({t:'Description is acceptable but could be longer',c:'ok'});}
    else{score-=10;fb.push({t:'Description is too short. Aim for 250+ characters.',c:'bad'});}

    if(desc.toLowerCase().includes(keyword)){score+=8;fb.push({t:'Keyword found in description',c:'good'});}
    else if(desc){score-=5;fb.push({t:'Target keyword missing from description',c:'bad'});}

    // Tags
    if(tags.length>=5&&tags.length<=15){score+=8;fb.push({t:'Good number of tags ('+tags.length+')',c:'good'});}
    else if(tags.length<5){score-=5;fb.push({t:'Too few tags ('+tags.length+'). Add 5-15 relevant tags.',c:'bad'});}
    else{fb.push({t:'Many tags ('+tags.length+'). Ensure all are relevant.',c:'ok'});}

    if(tags.some(t=>t.toLowerCase().includes(keyword))){score+=5;fb.push({t:'Target keyword found in tags',c:'good'});}
    else if(tags.length){score-=5;fb.push({t:'Target keyword NOT found in tags',c:'bad'});}

    // Extras
    if(/\d/.test(title)){score+=3;fb.push({t:'Title contains a number — increases CTR',c:'good'});}
    if(/[[\(]/.test(title)){score+=3;fb.push({t:'Title uses brackets — proven CTR booster',c:'good'});}
    if(desc.includes('http')){score+=3;fb.push({t:'Links found in description — good for engagement',c:'good'});}
    if(desc.includes('#')){score+=2;fb.push({t:'Hashtags found in description',c:'good'});}

    score=Math.max(0,Math.min(100,score));
    const el=document.getElementById('yt-score');el.textContent=score+'/100';
    el.style.color=score>=75?'#059669':score>=50?'#d97706':'#dc2626';
    const v=document.getElementById('yt-verdict');
    if(score>=85){v.textContent='🏆 Excellent — Well optimized for ranking!';v.style.color='#059669';}
    else if(score>=70){v.textContent='✅ Good — Minor improvements possible';v.style.color='#16a34a';}
    else if(score>=50){v.textContent='⚠️ Needs Work — Significant optimization needed';v.style.color='#d97706';}
    else{v.textContent='❌ Poor — Major SEO issues to fix';v.style.color='#dc2626';}

    document.getElementById('yt-feedback').innerHTML=fb.map(r=>{
        const c={good:{bg:'#f0fdf4',border:'#bbf7d0',icon:'✅',color:'#166534'},bad:{bg:'#fef2f2',border:'#fecaca',icon:'❌',color:'#991b1b'},ok:{bg:'#fffbeb',border:'#fed7aa',icon:'ℹ️',color:'#92400e'}}[r.c];
        return `<div style="padding:1rem;border-radius:12px;border:1px solid ${c.border};background:${c.bg};color:${c.color};font-size:0.95rem;">${c.icon} ${r.t}</div>`;
    }).join('');
    document.getElementById('yt-results').style.display='block';
    SMTools.toast('Analysis complete!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>