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
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Website URL</label>
                    <input type="text" id="wweUrl" class="form-control" placeholder="https://example.com">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Monthly Visitors (estimated)</label>
                    <input type="number" id="wweVisitors" class="form-control" placeholder="50000" min="0">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Monthly Revenue ($)</label>
                    <input type="number" id="wweRevenue" class="form-control" placeholder="2000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Domain Age (years)</label>
                    <input type="number" id="wweAge" class="form-control" placeholder="5" min="0" step="0.1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Backlinks (approx.)</label>
                    <input type="number" id="wweBacklinks" class="form-control" placeholder="500" min="0">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;font-size:0.95rem;">Category</label>
                    <select id="wweCategory" class="form-control">
                        <option value="1.0">Blog / Content</option>
                        <option value="1.5">E-Commerce</option>
                        <option value="2.0" selected>SaaS / Software</option>
                        <option value="1.3">Agency / Services</option>
                        <option value="0.8">Forum / Community</option>
                    </select>
                </div>
            </div>

            <!-- PRO Settings -->
            <details style="margin-bottom:2rem;border:1px solid var(--border);border-radius:14px;overflow:hidden;">
                <summary style="padding:1rem 1.5rem;font-weight:700;cursor:pointer;background:linear-gradient(135deg,#f0f9ff,#e0f2fe);color:var(--text-main);display:flex;align-items:center;gap:0.75rem;">
                    <span style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:800;">PRO</span>
                    Advanced Valuation Settings
                </summary>
                <div style="padding:1.5rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div>
                        <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.85rem;">Revenue Multiple</label>
                        <input type="number" id="wweMultiple" class="form-control" value="36" min="1" max="120" step="1">
                        <small class="text-muted">Default: 36x monthly revenue</small>
                    </div>
                    <div>
                        <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.85rem;">Traffic Value ($/visitor)</label>
                        <input type="number" id="wweTrafficValue" class="form-control" value="0.02" min="0" step="0.001">
                    </div>
                </div>
            </details>

            <button type="button" onclick="estimateWorth()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                Estimate Value 💎
            </button>

            <div id="wwe-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800;">Estimated Website Value</h3>
                <div style="text-align:center;padding:2rem;border-radius:20px;background:linear-gradient(135deg,#ede9fe,#ddd6fe);margin-bottom:2rem;">
                    <div class="text-muted small">Estimated Worth</div>
                    <div id="wwe-total" style="font-size:3rem;font-weight:900;color:#7c3aed;">—</div>
                </div>
                <div id="wwe-breakdown" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;"></div>
            </div>
        </div>

        <!-- SEO Content -->
        <div class="pro-card" style="margin-top:2rem;">
            <article>
                <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Website Worth Estimator?</h2>
                <p>The Website Worth Estimator is a free online tool that calculates the approximate market value of any website based on key performance metrics including monthly traffic, revenue, domain age, backlinks, and industry category. Whether you're looking to buy, sell, or simply understand the value of a web property, this tool provides an instant, data-driven valuation using industry-standard multiplier methods used by website brokers and marketplace platforms like Flippa, Empire Flippers, and FE International.</p>
                <p>Our algorithm considers multiple valuation factors to provide a comprehensive estimate. The revenue-based valuation uses a monthly revenue multiple (typically 24-48x for established sites), while the traffic-based valuation estimates value per visitor. Domain age and backlink profile add additional value through trust and authority signals.</p>

                <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
                <ul>
                    <li><strong>Enter your website URL</strong> for reference tracking and reporting purposes.</li>
                    <li><strong>Input monthly visitors</strong> — use Google Analytics or similar tools to get accurate traffic data.</li>
                    <li><strong>Add monthly revenue</strong> — include all monetization streams: ads, affiliate, products, and services.</li>
                    <li><strong>Specify domain age</strong> — older domains with clean histories command higher premiums.</li>
                    <li><strong>Use PRO settings</strong> to adjust revenue multiples and traffic value per visitor for more accurate estimates.</li>
                </ul>

                <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
                <ul>
                    <li>Multi-factor valuation algorithm combining revenue, traffic, domain age, and backlink data</li>
                    <li>Industry-specific category multipliers for accurate niche-based valuations</li>
                    <li><strong>PRO:</strong> Custom revenue multiples and traffic value adjustments</li>
                    <li><strong>PRO:</strong> Detailed breakdown showing individual component values</li>
                    <li>100% client-side — your data never leaves your browser</li>
                </ul>

                <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
                <ul>
                    <li><strong>How accurate is this estimate?</strong> This tool provides a ballpark estimate based on industry averages. Actual valuations may vary based on brand strength, growth trends, proprietary technology, and buyer demand.</li>
                    <li><strong>What revenue multiple should I use?</strong> SaaS sites typically sell at 36-60x monthly revenue, content sites at 24-40x, and e-commerce at 24-36x monthly profit.</li>
                    <li><strong>Can I use this for domain-only valuations?</strong> For domains without traffic or revenue, focus on the domain age and backlink factors. Premium domain names may carry additional brandable value not captured by this algorithm.</li>
                    <li><strong>Is my data stored anywhere?</strong> No. All calculations happen entirely in your browser. No data is sent to any server.</li>
                </ul>
            </article>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/seo-marketing-tools.js"></script>
<script>
function estimateWorth() {
    const visitors = parseFloat(document.getElementById('wweVisitors').value) || 0;
    const revenue = parseFloat(document.getElementById('wweRevenue').value) || 0;
    const age = parseFloat(document.getElementById('wweAge').value) || 0;
    const backlinks = parseFloat(document.getElementById('wweBacklinks').value) || 0;
    const catMultiplier = parseFloat(document.getElementById('wweCategory').value) || 1;
    const revMultiple = parseFloat(document.getElementById('wweMultiple').value) || 36;
    const trafficVal = parseFloat(document.getElementById('wweTrafficValue').value) || 0.02;

    const revenueValue = revenue * revMultiple * catMultiplier;
    const trafficValue = visitors * trafficVal * 12;
    const ageBonus = Math.min(age * 500, 10000);
    const backlinkBonus = Math.min(backlinks * 2, 20000);
    const total = revenueValue + trafficValue + ageBonus + backlinkBonus;

    document.getElementById('wwe-total').textContent = '$' + total.toLocaleString('en-US', { maximumFractionDigits: 0 });
    document.getElementById('wwe-breakdown').innerHTML = `
        <div class="p-3 rounded-3 border text-center" style="background:var(--bg-body);"><div class="text-muted small">Revenue Value</div><div class="fw-bold fs-5" style="color:#059669;">$${revenueValue.toLocaleString()}</div><div class="text-muted" style="font-size:0.75rem;">${revMultiple}x × $${revenue}/mo × ${catMultiplier}x</div></div>
        <div class="p-3 rounded-3 border text-center" style="background:var(--bg-body);"><div class="text-muted small">Traffic Value</div><div class="fw-bold fs-5" style="color:#2563eb;">$${trafficValue.toLocaleString()}</div><div class="text-muted" style="font-size:0.75rem;">${visitors.toLocaleString()} vis × $${trafficVal}/vis × 12</div></div>
        <div class="p-3 rounded-3 border text-center" style="background:var(--bg-body);"><div class="text-muted small">Age Bonus</div><div class="fw-bold fs-5" style="color:#d97706;">$${ageBonus.toLocaleString()}</div><div class="text-muted" style="font-size:0.75rem;">${age} years</div></div>
        <div class="p-3 rounded-3 border text-center" style="background:var(--bg-body);"><div class="text-muted small">Backlink Bonus</div><div class="fw-bold fs-5" style="color:#7c3aed;">$${backlinkBonus.toLocaleString()}</div><div class="text-muted" style="font-size:0.75rem;">${backlinks.toLocaleString()} links</div></div>`;
    document.getElementById('wwe-results').style.display = 'block';
    SMTools.toast('Valuation complete!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>