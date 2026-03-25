

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Daily Page Views</label>
                    <input type="number" id="pageViews" class="form-control" value="10000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Click-Through Rate (CTR %)</label>
                    <input type="number" id="ctr" class="form-control" value="2" min="0" max="100" step="0.01">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Cost Per Click (CPC $)</label>
                    <input type="number" id="cpc" class="form-control" value="0.50" min="0" step="0.01">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateAdsense()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Revenue 💰
                </button>
                <button type="button" onclick="resetAdsense()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="adsense-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Revenue Estimate</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Daily Clicks</div>
                        <div id="res-clicks" class="fs-3 fw-bold" style="color:var(--primary);">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Daily Revenue</div>
                        <div id="res-daily" class="fs-3 fw-bold" style="color:#10b981;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Monthly Revenue</div>
                        <div id="res-monthly" class="fs-3 fw-bold" style="color:#10b981;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Yearly Revenue</div>
                        <div id="res-yearly" class="fs-3 fw-bold" style="color:#10b981;">—</div>
                    </div>
                </div>
                <div id="history-section" style="margin-top:2rem;"></div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateAdsense());
});

function calculateAdsense() {
    const pv = parseFloat(document.getElementById('pageViews').value) || 0;
    const ctr = parseFloat(document.getElementById('ctr').value) || 0;
    const cpc = parseFloat(document.getElementById('cpc').value) || 0;

    const dailyClicks = Math.round(pv * (ctr / 100));
    const daily = dailyClicks * cpc;
    const monthly = daily * 30;
    const yearly = daily * 365;

    document.getElementById('res-clicks').textContent = dailyClicks.toLocaleString();
    document.getElementById('res-daily').textContent = BizTools.fmt(daily);
    document.getElementById('res-monthly').textContent = BizTools.fmt(monthly);
    document.getElementById('res-yearly').textContent = BizTools.fmt(yearly);
    document.getElementById('adsense-results').style.display = 'block';

    BizTools.saveHistory('adsense-revenue-calculator', { pv, ctr, cpc, daily, monthly, yearly });
    BizTools.toast('Revenue calculated!');
}

function resetAdsense() {
    document.getElementById('pageViews').value = '10000';
    document.getElementById('ctr').value = '2';
    document.getElementById('cpc').value = '0.50';
    document.getElementById('adsense-results').style.display = 'none';
}
</script>






