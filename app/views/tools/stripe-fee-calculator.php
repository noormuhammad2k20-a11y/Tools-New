<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Transaction Amount ($)</label>
                    <input type="number" id="stripeAmount" class="form-control" value="100" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Region / Rate</label>
                    <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:2px solid var(--primary);border-radius:12px;cursor:pointer;background:var(--primary-glow);">
                            <input type="radio" name="stripeRegion" value="us" checked> <span style="font-weight:600;font-size:0.9rem;">🇺🇸 US (2.9%+30¢)</span>
                        </label>
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;background:var(--bg-body);">
                            <input type="radio" name="stripeRegion" value="eu"> <span style="font-weight:600;font-size:0.9rem;">🇪🇺 EU (1.4%+25¢)</span>
                        </label>
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;background:var(--bg-body);">
                            <input type="radio" name="stripeRegion" value="uk"> <span style="font-weight:600;font-size:0.9rem;">🇬🇧 UK (1.4%+20p)</span>
                        </label>
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;background:var(--bg-body);">
                            <input type="radio" name="stripeRegion" value="intl"> <span style="font-weight:600;font-size:0.9rem;">🌍 International (3.9%+30¢)</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Calculation Mode</label>
                    <div style="display:flex;gap:0.75rem;">
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;flex:1;background:var(--bg-body);">
                            <input type="radio" name="stripeMode" value="receive" checked style="width:18px;height:18px;"> <span style="font-weight:500;">You receive</span>
                        </label>
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;flex:1;background:var(--bg-body);">
                            <input type="radio" name="stripeMode" value="charge" style="width:18px;height:18px;"> <span style="font-weight:500;">You charge</span>
                        </label>
                    </div>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateStripe()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Fees 💳
                </button>
                <button type="button" onclick="resetStripe()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="stripe-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Fee Breakdown</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Amount Charged</div>
                        <div id="res-charge" class="fs-3 fw-bold" style="color:var(--text-main);">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#fee2e2,#fef2f2);">
                        <div class="text-muted mb-1 small">Stripe Fee</div>
                        <div id="res-fee" class="fs-3 fw-bold" style="color:#ef4444;">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted mb-1 small">You Receive</div>
                        <div id="res-net" class="fs-3 fw-bold" style="color:#059669;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Effective Fee %</div>
                        <div id="res-feepct" class="fs-3 fw-bold" style="color:#6366f1;">—</div>
                    </div>
                </div>
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
const stripeRates = {
    us:   { pct: 2.9, fixed: 0.30 },
    eu:   { pct: 1.4, fixed: 0.25 },
    uk:   { pct: 1.4, fixed: 0.20 },
    intl: { pct: 3.9, fixed: 0.30 }
};

document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateStripe());
});

function calculateStripe() {
    const amount = parseFloat(document.getElementById('stripeAmount').value) || 0;
    const region = document.querySelector('input[name="stripeRegion"]:checked').value;
    const mode = document.querySelector('input[name="stripeMode"]:checked').value;
    const rate = stripeRates[region];

    let charged, fee, net;
    if (mode === 'receive') {
        // User wants to receive this amount, so charge more
        charged = (amount + rate.fixed) / (1 - rate.pct / 100);
        fee = charged - amount;
        net = amount;
    } else {
        // User charges this amount
        charged = amount;
        fee = (amount * rate.pct / 100) + rate.fixed;
        net = amount - fee;
    }

    const effectivePct = charged > 0 ? (fee / charged * 100) : 0;

    document.getElementById('res-charge').textContent = BizTools.fmt(charged);
    document.getElementById('res-fee').textContent = BizTools.fmt(fee);
    document.getElementById('res-net').textContent = BizTools.fmt(net);
    document.getElementById('res-feepct').textContent = effectivePct.toFixed(2) + '%';
    document.getElementById('stripe-results').style.display = 'block';

    BizTools.saveHistory('stripe-fee-calculator', { amount, region, mode, charged, fee, net });
    BizTools.toast('Stripe fees calculated!');
}

function resetStripe() {
    document.getElementById('stripeAmount').value = '100';
    document.querySelector('input[name="stripeRegion"][value="us"]').checked = true;
    document.querySelector('input[name="stripeMode"][value="receive"]').checked = true;
    document.getElementById('stripe-results').style.display = 'none';
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>