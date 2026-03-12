<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
<div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    

    <div class="form-group" style="margin-bottom:2rem;">
        <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Enter Your Subject Line</label>
        <input type="text" id="eslInput" class="form-control" placeholder="e.g. 🔥 5 Secrets to Double Your Revenue This Month" style="font-size:1.1rem;padding:1rem;" oninput="testSubjectLive()">
        <div style="display:flex;justify-content:space-between;margin-top:0.5rem;"><small class="text-muted">Character count: <span id="eslCharCount">0</span></small><small class="text-muted">Word count: <span id="eslWordCount">0</span></small></div>
    </div>

    <button type="button" onclick="testSubject()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Analyze Subject Line 📧</button>

    <div id="esl-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="text-align:center;margin-bottom:2rem;">
            <div class="text-muted small">Overall Score</div>
            <div id="esl-score" style="font-size:4rem;font-weight:900;">—</div>
            <div id="esl-grade" style="font-size:1.2rem;font-weight:700;margin-top:0.5rem;">—</div>
        </div>
        <div id="esl-feedback" style="display:grid;gap:0.75rem;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Email Subject Line Tester?</h2>
    <p>The Email Subject Line Tester is a free tool that analyzes your email subject lines and gives them a score based on proven copywriting principles. It checks for optimal length, power words, spam triggers, personalization tokens, and formatting best practices to help you craft subject lines that maximize open rates. Email marketers, newsletter creators, and growth hackers use tools like this to A/B test variations before sending campaigns to thousands of subscribers.</p>
    <p>Studies show that 47% of email recipients open emails based solely on the subject line, making it the single most important element of your email marketing strategy. Our scoring algorithm is based on research from Mailchimp, HubSpot, and Campaign Monitor covering billions of emails sent.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Type or paste your subject line into the input field — analysis begins in real-time.</li><li>Review each feedback item and adjust your subject line to improve the score.</li><li>Aim for a score above 75 for optimal performance.</li><li>Test multiple variations to find the highest-scoring option before sending your campaign.</li><li>Use the character and word count indicators to stay within optimal limits.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Real-time scoring with instant feedback as you type</li><li>Power word detection with curated high-converting word lists</li><li>Spam trigger analysis to avoid junk folder placement</li><li>Personalization and emoji detection scoring</li><li>Length optimization guidance based on industry benchmarks</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What's a good subject line score?</strong> Aim for 70+ for solid performance. Scores above 85 indicate excellent subject lines likely to achieve high open rates.</li><li><strong>Does this tool guarantee higher open rates?</strong> While no tool can guarantee results, following the best practices flagged by our scorer significantly improves your chances based on industry data.</li><li><strong>Should I always use emojis?</strong> Emojis can boost visibility in crowded inboxes but use them sparingly (1-2 max) and ensure they're relevant to your content.</li><li><strong>Is my subject line data stored?</strong> No. Everything runs client-side in your browser. Your subject lines are never sent to any server.</li></ul>
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
function testSubjectLive(){
    const v=document.getElementById('eslInput').value;
    document.getElementById('eslCharCount').textContent=v.length;
    document.getElementById('eslWordCount').textContent=v.trim()?v.trim().split(/\s+/).length:0;
}

function testSubject(){
    const subject=document.getElementById('eslInput').value.trim();
    if(!subject){SMTools.toast('Please enter a subject line');return;}
    const {score,reasons}=SMTools.scoreSubjectLine(subject);

    const scoreEl=document.getElementById('esl-score');
    scoreEl.textContent=score+'/100';
    scoreEl.style.color=score>=75?'#059669':score>=50?'#d97706':'#dc2626';

    const gradeEl=document.getElementById('esl-grade');
    if(score>=85){gradeEl.textContent='🏆 Excellent — Ready to send!';gradeEl.style.color='#059669';}
    else if(score>=70){gradeEl.textContent='✅ Good — Minor improvements possible';gradeEl.style.color='#16a34a';}
    else if(score>=50){gradeEl.textContent='⚠️ Average — Needs optimization';gradeEl.style.color='#d97706';}
    else{gradeEl.textContent='❌ Poor — Significant changes needed';gradeEl.style.color='#dc2626';}

    let fbHTML='';
    reasons.forEach(r=>{
        const colors={good:{bg:'#f0fdf4',border:'#bbf7d0',icon:'✅',color:'#166534'},bad:{bg:'#fef2f2',border:'#fecaca',icon:'❌',color:'#991b1b'},ok:{bg:'#fffbeb',border:'#fed7aa',icon:'ℹ️',color:'#92400e'}};
        const c=colors[r.type];
        fbHTML+=`<div style="padding:1rem;border-radius:12px;border:1px solid ${c.border};background:${c.bg};color:${c.color};font-size:0.95rem;">${c.icon} ${r.text}</div>`;
    });
    document.getElementById('esl-feedback').innerHTML=fbHTML;
    document.getElementById('esl-results').style.display='block';
    SMTools.toast('Analysis complete!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>