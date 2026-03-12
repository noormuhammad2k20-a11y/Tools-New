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
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Total Marketing Spend ($)</label>
                    <input type="number" id="cacSpend" class="form-control" value="50000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Total Sales Spend ($)</label>
                    <input type="number" id="cacSales" class="form-control" value="30000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">New Customers Acquired</label>
                    <input type="number" id="cacCustomers" class="form-control" value="200" min="1" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Avg Revenue Per User/mo ($)</label>
                    <input type="number" id="cacARPU" class="form-control" value="49" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Gross Margin (%)</label>
                    <input type="number" id="cacMargin" class="form-control" value="80" min="0" max="100" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Monthly Churn Rate (%)</label>
                    <input type="number" id="cacChurn" class="form-control" value="5" min="0.01" max="100" step="0.01">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateCAC()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate CAC 📊
                </button>
                <button type="button" onclick="resetCAC()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="cac-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">CAC &amp; LTV Analysis</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#dbeafe,#eff6ff);">
                        <div class="text-muted mb-1 small">Customer Acquisition Cost</div>
                        <div id="res-cac" class="fs-2 fw-bold" style="color:#2563eb;">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted mb-1 small">Customer Lifetime Value</div>
                        <div id="res-ltv" class="fs-2 fw-bold" style="color:#059669;">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#ede9fe,#f5f3ff);">
                        <div class="text-muted mb-1 small">LTV:CAC Ratio</div>
                        <div id="res-ratio" class="fs-2 fw-bold" style="color:#7c3aed;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Payback Period</div>
                        <div id="res-payback" class="fs-3 fw-bold">—</div>
                        <div class="text-muted small">months</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Avg Customer Lifetime</div>
                        <div id="res-life" class="fs-3 fw-bold">—</div>
                        <div class="text-muted small">months</div>
                    </div>
                </div>
                <div id="cac-verdict" style="margin-top:1.5rem; padding:1.25rem; border-radius:12px; font-weight:600; text-align:center;"></div>
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
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateCAC());
});

function calculateCAC() {
    const spend = parseFloat(document.getElementById('cacSpend').value) || 0;
    const sales = parseFloat(document.getElementById('cacSales').value) || 0;
    const customers = parseFloat(document.getElementById('cacCustomers').value) || 1;
    const arpu = parseFloat(document.getElementById('cacARPU').value) || 0;
    const margin = parseFloat(document.getElementById('cacMargin').value) || 0;
    const churn = parseFloat(document.getElementById('cacChurn').value) || 0.01;

    const cac = (spend + sales) / customers;
    const avgLifetime = 1 / (churn / 100);
    const ltv = arpu * (margin / 100) * avgLifetime;
    const ratio = cac > 0 ? ltv / cac : Infinity;
    const payback = (arpu * (margin / 100)) > 0 ? cac / (arpu * (margin / 100)) : Infinity;

    document.getElementById('res-cac').textContent = BizTools.fmt(cac);
    document.getElementById('res-ltv').textContent = BizTools.fmt(ltv);
    document.getElementById('res-ratio').textContent = ratio === Infinity ? '∞' : ratio.toFixed(2) + 'x';
    document.getElementById('res-payback').textContent = payback === Infinity ? '∞' : payback.toFixed(1);
    document.getElementById('res-life').textContent = avgLifetime.toFixed(1);

    const verdict = document.getElementById('cac-verdict');
    if (ratio >= 3) {
        verdict.style.background = 'linear-gradient(135deg,#d1fae5,#ecfdf5)';
        verdict.style.color = '#059669';
        verdict.textContent = '✅ Excellent! LTV:CAC ≥ 3x — your unit economics are healthy.';
    } else if (ratio >= 1) {
        verdict.style.background = 'linear-gradient(135deg,#fef3c7,#fffbeb)';
        verdict.style.color = '#d97706';
        verdict.textContent = '⚠️ Warning: LTV:CAC is below 3x — consider improving retention or lowering acquisition costs.';
    } else {
        verdict.style.background = 'linear-gradient(135deg,#fee2e2,#fef2f2)';
        verdict.style.color = '#dc2626';
        verdict.textContent = '🚨 Critical: You are spending more to acquire customers than they generate in lifetime value.';
    }

    document.getElementById('cac-results').style.display = 'block';
    BizTools.saveHistory('subscription-cac-calculator', { cac, ltv, ratio });
    BizTools.toast('CAC calculated!');
}

function resetCAC() {
    document.getElementById('cacSpend').value = '50000';
    document.getElementById('cacSales').value = '30000';
    document.getElementById('cacCustomers').value = '200';
    document.getElementById('cacARPU').value = '49';
    document.getElementById('cacMargin').value = '80';
    document.getElementById('cacChurn').value = '5';
    document.getElementById('cac-results').style.display = 'none';
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>