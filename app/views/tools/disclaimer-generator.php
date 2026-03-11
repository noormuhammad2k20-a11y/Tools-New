<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Website / Business Name</label>
                    <input type="text" id="discName" class="form-control" placeholder="Acme Corp" value="">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Website URL</label>
                    <input type="text" id="discURL" class="form-control" placeholder="https://example.com" value="">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Contact Email</label>
                    <input type="email" id="discEmail" class="form-control" placeholder="contact@example.com" value="">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Website Type</label>
                    <select id="discType" class="form-control">
                        <option value="blog">Blog / Informational</option>
                        <option value="ecommerce">E-Commerce / Online Store</option>
                        <option value="saas">SaaS / Web Application</option>
                        <option value="affiliate">Affiliate / Review Site</option>
                        <option value="consulting">Consulting / Professional Services</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generateDisclaimer()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate Disclaimer 📜
                </button>
            </div>

            <div id="disc-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                    <h3 style="margin:0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Your Disclaimer</h3>
                    <div style="display:flex;gap:0.75rem;">
                        <button type="button" onclick="copyDisclaimer()" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy</button>
                        <button type="button" onclick="downloadDisclaimer()" class="btn btn-outline btn-sm" style="border-radius:8px;">Download TXT</button>
                    </div>
                </div>
                <div id="disc-output" style="background:var(--bg-body); color:var(--text-main); padding:2rem; border-radius:18px; font-size:0.95rem; line-height:1.8; border:1px solid var(--border); white-space:pre-wrap;"></div>
            </div>
        </div>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
function generateDisclaimer() {
    const name = document.getElementById('discName').value.trim() || '[Your Website Name]';
    const url = document.getElementById('discURL').value.trim() || '[Your Website URL]';
    const email = document.getElementById('discEmail').value.trim() || '[your@email.com]';
    const type = document.getElementById('discType').value;
    const date = new Date().toLocaleDateString('en-US', { year:'numeric', month:'long', day:'numeric' });

    let typeSpecific = '';
    if (type === 'blog') typeSpecific = `\nThe content on ${name} is provided for general informational and educational purposes only. The views expressed in blog posts and articles represent the personal opinions of the authors and do not constitute professional advice.\n`;
    else if (type === 'ecommerce') typeSpecific = `\nProduct descriptions, prices, and availability on ${name} are subject to change without notice. We make every effort to display accurate product information, including colors and images, but we cannot guarantee that your device's display accurately reflects the actual product.\n`;
    else if (type === 'saas') typeSpecific = `\n${name} provides its software and services "as is" and "as available" without warranty of any kind. We do not guarantee that the service will be uninterrupted, timely, secure, or error-free. Data processed through our platform is handled according to our Privacy Policy.\n`;
    else if (type === 'affiliate') typeSpecific = `\n${name} participates in affiliate marketing programs. This means we may earn commissions on purchases made through links on our site. These affiliate relationships do not influence our editorial content, opinions, or product reviews. We are committed to providing honest and unbiased recommendations.\n`;
    else if (type === 'consulting') typeSpecific = `\nThe information provided by ${name} is for general informational purposes and does not constitute professional advice specific to your situation. Always consult with a qualified professional before making decisions based on information found on this website.\n`;

    const text = `DISCLAIMER

Last Updated: ${date}

WEBSITE DISCLAIMER

The information provided by ${name} ("we," "us," or "our") on ${url} (the "Site") is for general informational purposes only. All information on the Site is provided in good faith; however, we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site.
${typeSpecific}
EXTERNAL LINKS DISCLAIMER

The Site may contain (or you may be sent through the Site) links to other websites or content belonging to or originating from third parties or links to websites and features in banners or other advertising. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability, or completeness by us.

PROFESSIONAL DISCLAIMER

The Site cannot and does not contain professional advice. The information is provided for general informational and educational purposes only and is not a substitute for professional advice. Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals.

LIMITATION OF LIABILITY

Under no circumstance shall we have any liability to you for any loss or damage of any kind incurred as a result of the use of the site or reliance on any information provided on the site. Your use of the site and your reliance on any information on the site is solely at your own risk.

CONTACT US

If you have any questions about this Disclaimer, you can contact us at: ${email}`;

    document.getElementById('disc-output').textContent = text;
    document.getElementById('disc-results').style.display = 'block';
    BizTools.toast('Disclaimer generated!');
}

function copyDisclaimer() {
    navigator.clipboard.writeText(document.getElementById('disc-output').textContent)
        .then(() => BizTools.toast('Copied to clipboard!'));
}

function downloadDisclaimer() {
    const blob = new Blob([document.getElementById('disc-output').textContent], { type: 'text/plain' });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'disclaimer.txt';
    a.click();
    URL.revokeObjectURL(a.href);
    BizTools.toast('Download started!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>