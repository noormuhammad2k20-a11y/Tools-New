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
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Amount ($)</label>
                    <input type="number" id="gstAmount" class="form-control" value="1000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">GST Rate (%)</label>
                    <input type="number" id="gstRate" class="form-control" value="18" min="0" max="100" step="0.01">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Calculation Type</label>
                    <div style="display:flex;gap:0.75rem;">
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;flex:1;background:var(--bg-body);">
                            <input type="radio" name="gstType" value="exclusive" checked style="width:18px;height:18px;"> <span style="font-weight:500;">Exclusive</span>
                        </label>
                        <label style="display:flex;align-items:center;gap:0.5rem;padding:0.75rem 1.25rem;border:1px solid var(--border);border-radius:12px;cursor:pointer;flex:1;background:var(--bg-body);">
                            <input type="radio" name="gstType" value="inclusive" style="width:18px;height:18px;"> <span style="font-weight:500;">Inclusive</span>
                        </label>
                    </div>
                </div>
            </div>

            <div style="margin-bottom:2rem;">
                <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Quick Rate Presets</label>
                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
                    <button type="button" onclick="document.getElementById('gstRate').value='5'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">5%</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='12'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">12%</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='18'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">18%</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='28'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">28%</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='7'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">7% (SG)</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='10'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">10% (AU)</button>
                    <button type="button" onclick="document.getElementById('gstRate').value='15'" class="btn btn-outline" style="border-radius:10px;padding:0.5rem 1rem;font-size:0.85rem;">15% (NZ)</button>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateGST()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate GST 🧮
                </button>
                <button type="button" onclick="resetGST()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="gst-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">GST Breakdown</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Net Price</div>
                        <div id="res-net-price" class="fs-3 fw-bold" style="color:var(--text-main);">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#fef3c7,#fffbeb);">
                        <div class="text-muted mb-1 small">GST Amount</div>
                        <div id="res-gst-amount" class="fs-3 fw-bold" style="color:#d97706;">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted mb-1 small">Total with GST</div>
                        <div id="res-total-gst" class="fs-3 fw-bold" style="color:#059669;">—</div>
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 border mt-3 text-center">
                    <span class="text-muted small">CGST:</span> <span id="res-cgst" class="fw-bold">—</span>  | 
                    <span class="text-muted small">SGST:</span> <span id="res-sgst" class="fw-bold">—</span>
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
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateGST());
});

function calculateGST() {
    const amount = parseFloat(document.getElementById('gstAmount').value) || 0;
    const rate = parseFloat(document.getElementById('gstRate').value) || 0;
    const type = document.querySelector('input[name="gstType"]:checked').value;

    let netPrice, gstAmount, total;
    if (type === 'exclusive') {
        netPrice = amount;
        gstAmount = amount * (rate / 100);
        total = amount + gstAmount;
    } else {
        total = amount;
        netPrice = amount / (1 + rate / 100);
        gstAmount = total - netPrice;
    }

    const halfGst = gstAmount / 2;

    document.getElementById('res-net-price').textContent = BizTools.fmt(netPrice);
    document.getElementById('res-gst-amount').textContent = BizTools.fmt(gstAmount);
    document.getElementById('res-total-gst').textContent = BizTools.fmt(total);
    document.getElementById('res-cgst').textContent = BizTools.fmt(halfGst);
    document.getElementById('res-sgst').textContent = BizTools.fmt(halfGst);
    document.getElementById('gst-results').style.display = 'block';

    BizTools.saveHistory('gst-tax-calculator', { amount, rate, type, gstAmount, total });
    BizTools.toast('GST calculated!');
}

function resetGST() {
    document.getElementById('gstAmount').value = '1000';
    document.getElementById('gstRate').value = '18';
    document.querySelector('input[name="gstType"][value="exclusive"]').checked = true;
    document.getElementById('gst-results').style.display = 'none';
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>