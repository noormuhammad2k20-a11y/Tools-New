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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Topic / Niche</label><input type="text" id="thTopic" class="form-control" placeholder="e.g. AI, Marketing, Fitness"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Sub-topic (optional)</label><input type="text" id="thSubtopic" class="form-control" placeholder="e.g. ChatGPT prompts"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Your Audience</label><input type="text" id="thAudience" class="form-control" placeholder="e.g. entrepreneurs, developers"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Number to Generate</label><input type="number" id="thCount" class="form-control" value="5" min="1" max="15"></div>
    </div>

    <details style="margin-bottom:2rem;border:1px solid var(--border);border-radius:14px;overflow:hidden;">
        <summary style="padding:1rem 1.5rem;font-weight:700;cursor:pointer;background:linear-gradient(135deg,#fdf2f8,#fce7f3);display:flex;align-items:center;gap:0.75rem;">
            <span style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:800;">PRO</span>
            AI-Enhanced Hook Styles
        </summary>
        <div style="padding:1.5rem;display:flex;gap:0.75rem;flex-wrap:wrap;">
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;"><input type="checkbox" class="th-tag" value="controversial" checked> Controversial</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;"><input type="checkbox" class="th-tag" value="data" checked> Data-Driven</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;"><input type="checkbox" class="th-tag" value="story"> Story-Based</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;"><input type="checkbox" class="th-tag" value="actionable" checked> Actionable</label>
            <label style="display:flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;"><input type="checkbox" class="th-tag" value="prediction"> Prediction</label>
        </div>
    </details>

    <button type="button" onclick="generateHooks()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Hooks 🔥</button>

    <div id="th-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <h3 style="margin:0 0 1.5rem;font-size:1.5rem;font-weight:800;">Generated Thread Hooks</h3>
        <div id="th-list" style="display:grid;gap:1rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Thread Hook Generator?</h2>
    <p>The Thread Hook Generator is a free tool that creates attention-grabbing opening lines for Twitter/X threads. A strong hook is the difference between a thread that goes viral and one that gets ignored. Our tool uses a curated database of 15+ proven hook templates based on analysis of thousands of viral threads from top creators. Each template is designed to trigger curiosity, authority, or emotional engagement — the three pillars of high-performing thread content.</p>
    <p>Social media experts report that threads with compelling hooks see 3-5x more impressions than those with generic openings. Whether you're a content creator, marketer, or thought leader, crafting the perfect first line can dramatically boost your reach and follower growth.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your main topic and subtopic for personalized hooks.</li><li>Specify your target audience for relevant framing.</li><li>Use PRO style filters to match your brand voice (controversial, data-driven, story-based).</li><li>Generate multiple hooks and A/B test them to find the best performer.</li><li>Copy your favorite hook with one click and start writing your thread.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>15+ proven viral hook templates based on real-world data</li><li>Dynamic variable replacement for personalized output</li><li><strong>PRO:</strong> Style-based filtering (controversial, data-driven, story, actionable, prediction)</li><li><strong>PRO:</strong> Generate up to 15 variations at once</li><li>One-click copy for instant use</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>Are these hooks unique?</strong> Each hook is generated from templates with your custom variables, creating unique combinations every time.</li><li><strong>Can I use these for LinkedIn too?</strong> Absolutely! These hook frameworks work across all text-based social platforms including LinkedIn, Threads, and Bluesky.</li><li><strong>How many hooks should I generate?</strong> We recommend generating 5-10 hooks per topic, then picking the 2-3 that feel most authentic to your voice.</li><li><strong>Is there a limit on usage?</strong> No limits. Generate as many hooks as you need, completely free.</li></ul>
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
function generateHooks(){
    const topic=document.getElementById('thTopic').value.trim()||'marketing';
    const subtopic=document.getElementById('thSubtopic').value.trim()||topic;
    const audience=document.getElementById('thAudience').value.trim()||'people';
    const count=parseInt(document.getElementById('thCount').value)||5;
    const activeTags=Array.from(document.querySelectorAll('.th-tag:checked')).map(c=>c.value);

    let pool=SMTools.hookDB;
    if(activeTags.length>0) pool=pool.filter(h=>h.tags.some(t=>activeTags.includes(t)));
    if(pool.length===0) pool=SMTools.hookDB;

    const vars={'{topic}':topic,'{subtopic}':subtopic,'{audience}':audience,'{time}':'6 months','{count}':'7','{number}':'500','{before}':'$0','{after}':'$10K/mo','{bad_practice}':'doing X manually','{good_practice}':'automating with Y','{opinion}':topic+' is overrated','{things}':'top accounts','{year}':'2025','{experts}':'industry leaders','{famous_person}':'Elon Musk','{achievement}':'10x growth','{thing}':'outdated strategies','{platform}':'content strategy','{benefit}':'20 hours/week'};

    const results=[];
    const shuffled=[...pool].sort(()=>Math.random()-0.5);
    for(let i=0;i<Math.min(count,shuffled.length);i++){
        let text=shuffled[i].template;
        for(const[k,v] of Object.entries(vars)) text=text.replaceAll(k,v);
        results.push({text,tags:shuffled[i].tags});
    }

    let html='';
    results.forEach((r,i)=>{
        const tagBadges=r.tags.map(t=>`<span style="background:#ede9fe;color:#7c3aed;padding:0.15rem 0.5rem;border-radius:6px;font-size:0.7rem;font-weight:600;">${t}</span>`).join(' ');
        html+=`<div style="padding:1.5rem;border:1px solid var(--border);border-radius:16px;background:var(--bg-body);">
            <div style="display:flex;justify-content:space-between;align-items:start;gap:1rem;">
                <div><span style="color:var(--text-muted);font-size:0.8rem;font-weight:600;">#${i+1}</span><p style="font-size:1.05rem;line-height:1.6;margin:0.5rem 0;">${r.text}</p><div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-top:0.5rem;">${tagBadges}</div></div>
                <button onclick="SMTools.copy('${r.text.replace(/'/g,"\\'")}')" style="border:none;background:var(--primary);color:#fff;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-weight:600;white-space:nowrap;font-size:0.85rem;">Copy</button>
            </div></div>`;
    });
    document.getElementById('th-list').innerHTML=html;
    document.getElementById('th-results').style.display='block';
    SMTools.toast(results.length+' hooks generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>