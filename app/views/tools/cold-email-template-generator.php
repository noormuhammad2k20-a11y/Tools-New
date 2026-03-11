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
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Template Type</label>
            <select id="ceType" class="form-control" onchange="previewTemplate()">
                <option value="0">Sales Outreach</option><option value="1">Partnership Proposal</option><option value="2">Guest Post Pitch</option><option value="3">Follow-Up</option><option value="4">Referral Request</option>
            </select></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Recipient Name</label><input type="text" id="ceName" class="form-control" placeholder="John Smith"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Company Name</label><input type="text" id="ceCompany" class="form-control" placeholder="Acme Corp"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Your Name</label><input type="text" id="ceSender" class="form-control" placeholder="Jane Doe"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Your Company</label><input type="text" id="ceSenderCo" class="form-control" placeholder="My Startup LLC"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Topic / Pain Point</label><input type="text" id="ceTopic" class="form-control" placeholder="e.g., lead generation"></div>
    </div>

    <button type="button" onclick="generateColdEmail()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Email ✉️</button>

    <div id="ce-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <h3 style="margin:0;font-size:1.5rem;font-weight:800;">Your Cold Email</h3>
            <button onclick="SMTools.copy(document.getElementById('ce-subject').textContent+'\\n\\n'+document.getElementById('ce-body').textContent)" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy All</button>
        </div>
        <div style="background:var(--bg-body);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
            <div style="padding:1rem 1.5rem;border-bottom:1px solid var(--border);background:#f8fafc;"><strong>Subject:</strong> <span id="ce-subject"></span></div>
            <div id="ce-body" style="padding:1.5rem;white-space:pre-wrap;line-height:1.8;font-size:0.95rem;"></div>
        </div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Cold Email Template Generator?</h2>
    <p>The Cold Email Template Generator helps you craft professional, persuasive cold emails in seconds. Cold emailing remains one of the most effective B2B lead generation channels, with studies showing an average ROI of $36 for every $1 spent on email marketing. However, generic emails get ignored — personalization and proven frameworks are essential for getting responses. Our tool provides battle-tested templates used by top sales teams, partnership managers, and content marketers at leading companies.</p>
    <p>Each template follows the AIDA framework (Attention, Interest, Desire, Action) and includes strategic placeholder variables for maximum personalization, the #1 factor that determines cold email success rates.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Select the template type that matches your outreach goal (sales, partnership, guest post, follow-up, or referral).</li><li>Fill in recipient details for automatic personalization of the template.</li><li>Review the generated email and customize any remaining placeholders in brackets.</li><li>Copy the full email with one click and paste into your email client.</li><li>A/B test different template types to find what resonates with your audience.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>5 proven cold email frameworks covering sales, partnerships, content, follow-ups, and referrals</li><li>Smart variable replacement for instant personalization</li><li>Professional subject lines optimized for open rates</li><li>One-click copy for the entire email including subject line</li><li>100% free — no signup, no API keys required</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>What makes a good cold email?</strong> Personalization, brevity (under 150 words), a clear value proposition, and a specific call-to-action. Our templates incorporate all of these principles.</li><li><strong>How many follow-ups should I send?</strong> Research shows that 80% of sales require 5+ follow-ups, yet most people stop after 1-2. Use our follow-up template for subsequent touches.</li><li><strong>Can I customize the templates?</strong> Absolutely. The generated email is a starting point — always customize details to match your specific prospect and situation.</li><li><strong>Are these templates GDPR compliant?</strong> The templates follow best practices for cold outreach, but ensure you comply with local regulations (CAN-SPAM, GDPR) regarding recipient consent and opt-out requirements.</li></ul>
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
function generateColdEmail(){
    const idx=parseInt(document.getElementById('ceType').value);
    const tpl=SMTools.coldEmailDB[idx];
    const vars={'{name}':document.getElementById('ceName').value||'[Name]','{company}':document.getElementById('ceCompany').value||'[Company]','{sender}':document.getElementById('ceSender').value||'[Your Name]','{sender_company}':document.getElementById('ceSenderCo').value||'[Your Company]','{topic}':document.getElementById('ceTopic').value||'[topic]','{observation}':'growing rapidly in the market','{reference}':'[similar company]','{result}':'30% increase in conversions','{pain_point}':document.getElementById('ceTopic').value||'growth','{proposal}':'cross-promote to each other\'s audiences','{audience_size}':'50,000+','{audience_type}':'engaged professionals','{article_title}':'[Your Article Title]','{brief_description}':'actionable insights on '+( document.getElementById('ceTopic').value||'this topic'),'{publications}':'[Publication 1, Publication 2]','{one_liner_value_prop}':'We help companies like yours achieve measurable results in '+(document.getElementById('ceTopic').value||'growth')+'.','{day}':'Tuesday','{time}':'2 PM','{mutual_contact}':'[Mutual Contact]','{industry}':document.getElementById('ceTopic').value||'your','{benefit}':'streamline their operations'};
    let subject=tpl.subject, body=tpl.body;
    for(const[k,v] of Object.entries(vars)){subject=subject.replaceAll(k,v);body=body.replaceAll(k,v);}
    document.getElementById('ce-subject').textContent=subject;
    document.getElementById('ce-body').textContent=body;
    document.getElementById('ce-results').style.display='block';
    SMTools.toast('Email template generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>