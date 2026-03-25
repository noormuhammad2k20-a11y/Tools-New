

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Customers at Start of Period</label>
                    <input type="number" id="churnStart" class="form-control" value="1000" min="1" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Customers Lost During Period</label>
                    <input type="number" id="churnLost" class="form-control" value="50" min="0" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">New Customers Acquired</label>
                    <input type="number" id="churnNew" class="form-control" value="80" min="0" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Avg Revenue Per User ($)</label>
                    <input type="number" id="churnARPU" class="form-control" value="49" min="0" step="any">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateChurn()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Churn 📉
                </button>
                <button type="button" onclick="resetChurn()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="churn-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Churn Analysis</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#fee2e2,#fef2f2);">
                        <div class="text-muted mb-1 small">Churn Rate</div>
                        <div id="res-churn-rate" class="fs-2 fw-bold" style="color:#dc2626;">—</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted mb-1 small">Retention Rate</div>
                        <div id="res-retention" class="fs-2 fw-bold" style="color:#059669;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Net Growth</div>
                        <div id="res-net-growth" class="fs-2 fw-bold">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Revenue Lost/mo</div>
                        <div id="res-rev-lost" class="fs-3 fw-bold" style="color:#dc2626;">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Customers at End</div>
                        <div id="res-end-cust" class="fs-3 fw-bold">—</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Avg Customer Lifetime</div>
                        <div id="res-lifetime" class="fs-3 fw-bold" style="color:var(--primary);">—</div>
                    </div>
                </div>
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
function calculateChurn() {
    const start = parseFloat(document.getElementById('churnStart').value) || 1;
    const lost = parseFloat(document.getElementById('churnLost').value) || 0;
    const newCust = parseFloat(document.getElementById('churnNew').value) || 0;
    const arpu = parseFloat(document.getElementById('churnARPU').value) || 0;

    const churnRate = (lost / start) * 100;
    const retention = 100 - churnRate;
    const netGrowth = newCust - lost;
    const endCustomers = start + netGrowth;
    const revenueLost = lost * arpu;
    const avgLifetime = churnRate > 0 ? (1 / (churnRate / 100)) : Infinity;

    document.getElementById('res-churn-rate').textContent = churnRate.toFixed(2) + '%';
    document.getElementById('res-retention').textContent = retention.toFixed(2) + '%';
    const ngEl = document.getElementById('res-net-growth');
    ngEl.textContent = (netGrowth >= 0 ? '+' : '') + netGrowth;
    ngEl.style.color = netGrowth >= 0 ? '#059669' : '#dc2626';
    document.getElementById('res-rev-lost').textContent = BizTools.fmt(revenueLost);
    document.getElementById('res-end-cust').textContent = endCustomers.toLocaleString();
    document.getElementById('res-lifetime').textContent = avgLifetime === Infinity ? '∞' : avgLifetime.toFixed(1) + ' months';
    document.getElementById('churn-results').style.display = 'block';

    BizTools.saveHistory('saas-churn-rate-calculator', { start, lost, churnRate, retention });
    BizTools.toast('Churn rate calculated!');
}

function resetChurn() {
    document.getElementById('churnStart').value = '1000';
    document.getElementById('churnLost').value = '50';
    document.getElementById('churnNew').value = '80';
    document.getElementById('churnARPU').value = '49';
    document.getElementById('churn-results').style.display = 'none';
}
</script>






