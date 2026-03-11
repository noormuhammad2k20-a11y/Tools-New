<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    

    <div style="text-align:center;padding:2rem;margin-bottom:2rem;">
        <button type="button" onclick="generateTempEmail()" class="btn btn-primary" style="padding:1.25rem 3rem;font-size:1.25rem;font-weight:700;border-radius:14px;box-shadow:0 10px 15px -3px var(--primary-glow);">Generate Temp Email 📧</button>
    </div>

    <div id="te-results" style="display:none;">
        <div style="text-align:center;padding:2rem;border-radius:20px;background:linear-gradient(135deg,#ede9fe,#ddd6fe);margin-bottom:2rem;">
            <div class="text-muted small">Your Temporary Email</div>
            <div id="te-address" style="font-size:1.8rem;font-weight:900;color:#7c3aed;word-break:break-all;margin:0.5rem 0;">—</div>
            <button onclick="SMTools.copy(document.getElementById('te-address').textContent)" style="border:none;background:#7c3aed;color:#fff;padding:0.5rem 1.5rem;border-radius:10px;cursor:pointer;font-weight:600;margin-top:0.5rem;">Copy Address</button>
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <h3 style="margin:0;font-weight:800;">Inbox</h3>
            <button onclick="checkInbox()" style="border:none;background:var(--primary-glow);color:var(--primary);padding:0.5rem 1.25rem;border-radius:10px;cursor:pointer;font-weight:600;">🔄 Refresh Inbox</button>
        </div>
        <div id="te-inbox" style="border:1px solid var(--border);border-radius:16px;overflow:hidden;min-height:100px;">
            <div style="padding:2rem;text-align:center;color:var(--text-muted);">No emails yet. Waiting for messages...</div>
        </div>

        <div id="te-email-view" style="display:none;margin-top:1.5rem;border:1px solid var(--border);border-radius:16px;overflow:hidden;">
            <div id="te-email-header" style="padding:1rem 1.5rem;background:#f8fafc;border-bottom:1px solid var(--border);"></div>
            <div id="te-email-body" style="padding:1.5rem;line-height:1.8;"></div>
        </div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Temp Email Generator?</h2>
    <p>The Temp Email Generator creates instant, disposable email addresses that automatically receive emails for a limited time. These temporary inboxes are perfect for signing up for services without exposing your real email address, testing email integrations, avoiding spam, and protecting your privacy online. Powered by the free 1secmail API, each temporary address is fully functional and can receive real emails immediately upon creation.</p>
    <p>Email privacy is a growing concern with data breaches affecting billions of users. Using temporary email addresses for non-essential signups helps keep your primary inbox clean and reduces your exposure to spam, phishing attempts, and data harvesting. Our tool provides a seamless, zero-signup experience — generate an address, use it, and the inbox automatically expires.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Click "Generate Temp Email" to create a new disposable address instantly.</li><li>Copy the email address and use it for website signups, free trials, or testing.</li><li>Click "Refresh Inbox" to check for incoming emails — verification codes usually arrive within seconds.</li><li>Click on any email to read its full contents including HTML formatting.</li><li>Generate a new address anytime you need a fresh inbox.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Instant email generation — no signup required</li><li>Real-time inbox with automatic message fetching</li><li>Full email viewing with HTML content support</li><li>One-click copy for the generated address</li><li>Powered by reliable 1secMail API infrastructure</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>How long do temp emails last?</strong> Temporary inboxes typically remain active for 1-2 hours. After that, all messages are automatically deleted.</li><li><strong>Can I send emails from a temp address?</strong> No. Temporary email addresses are receive-only. You cannot compose or reply to emails.</li><li><strong>Is this legal?</strong> Yes. Using temporary emails for privacy is perfectly legal. However, don't use them to bypass terms of service or for fraudulent purposes.</li><li><strong>Are my emails private?</strong> Temporary email services are not encrypted. Do not use them for sensitive information. They are designed for disposable, non-critical use only.</li></ul>
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
let tempLogin='',tempDomain='';
async function generateTempEmail(){
    try{
        const res=await fetch('https://www.1secmail.com/api/v1/?action=genRandomMailbox&count=1');
        const data=await res.json();
        const email=data[0];
        const parts=email.split('@');
        tempLogin=parts[0];tempDomain=parts[1];
        document.getElementById('te-address').textContent=email;
        document.getElementById('te-results').style.display='block';
        document.getElementById('te-inbox').innerHTML='<div style="padding:2rem;text-align:center;color:var(--text-muted);">No emails yet. Use this address to sign up and click Refresh.</div>';
        document.getElementById('te-email-view').style.display='none';
        SMTools.toast('Temp email generated!');
    }catch(e){
        SMTools.toast('API error. Try again.');
    }
}

async function checkInbox(){
    if(!tempLogin){SMTools.toast('Generate an email first');return;}
    try{
        const res=await fetch(`https://www.1secmail.com/api/v1/?action=getMessages&login=${tempLogin}&domain=${tempDomain}`);
        const msgs=await res.json();
        if(!msgs.length){
            document.getElementById('te-inbox').innerHTML='<div style="padding:2rem;text-align:center;color:var(--text-muted);">📭 No emails yet. Try refreshing in a moment...</div>';
            return;
        }
        let html='';
        msgs.forEach(m=>{
            html+=`<div onclick="viewEmail(${m.id})" style="padding:1rem 1.5rem;border-bottom:1px solid var(--border);cursor:pointer;display:flex;justify-content:space-between;align-items:center;transition:background .2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                <div><div style="font-weight:700;">${m.from}</div><div style="color:var(--text-muted);font-size:0.9rem;">${m.subject}</div></div>
                <div style="color:var(--text-muted);font-size:0.8rem;white-space:nowrap;">${m.date}</div></div>`;
        });
        document.getElementById('te-inbox').innerHTML=html;
        SMTools.toast(msgs.length+' email(s) found!');
    }catch(e){SMTools.toast('Error checking inbox');}
}

async function viewEmail(id){
    try{
        const res=await fetch(`https://www.1secmail.com/api/v1/?action=readMessage&login=${tempLogin}&domain=${tempDomain}&id=${id}`);
        const msg=await res.json();
        document.getElementById('te-email-header').innerHTML=`<div style="font-weight:700;font-size:1.1rem;">${msg.subject}</div><div style="color:var(--text-muted);font-size:0.85rem;">From: ${msg.from} · ${msg.date}</div>`;
        document.getElementById('te-email-body').innerHTML=msg.htmlBody||`<pre style="white-space:pre-wrap;">${msg.textBody}</pre>`;
        document.getElementById('te-email-view').style.display='block';
    }catch(e){SMTools.toast('Error loading email');}
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>