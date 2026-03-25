

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Cash Balance ($)</label>
                    <input type="number" id="cashBalance" class="form-control" value="500000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Monthly Expenses ($)</label>
                    <input type="number" id="monthlyExpenses" class="form-control" value="50000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Monthly Revenue ($)</label>
                    <input type="number" id="monthlyRevenue" class="form-control" value="15000" min="0" step="any">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateBurn()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Burn Rate 🔥
                </button>
                <button type="button" onclick="resetBurn()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="burn-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Burn Rate Analysis</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Gross Burn Rate</div>
                        <div id="res-gross" class="fs-3 fw-bold" style="color:#ef4444;">—</div>
                        <div class="text-muted small">per month</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Net Burn Rate</div>
                        <div id="res-net" class="fs-3 fw-bold" style="color:#f59e0b;">—</div>
                        <div class="text-muted small">per month</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Runway (Gross)</div>
                        <div id="res-runway-gross" class="fs-3 fw-bold" style="color:var(--primary);">—</div>
                        <div class="text-muted small">months</div>
                    </div>
                    <div class="p-4 bg-light rounded-4 border text-center">
                        <div class="text-muted mb-1 small">Runway (Net)</div>
                        <div id="res-runway-net" class="fs-3 fw-bold" style="color:#10b981;">—</div>
                        <div class="text-muted small">months</div>
                    </div>
                </div>
                <div id="runway-bar" style="margin-top:2rem; background:var(--bg-body); border-radius:16px; border:1px solid var(--border); padding:1.5rem;">
                    <div class="text-muted small mb-2">Runway Visualization</div>
                    <div style="background:#e2e8f0; border-radius:8px; height:24px; overflow:hidden;">
                        <div id="runway-fill" style="height:100%; border-radius:8px; transition:width 0.6s ease;"></div>
                    </div>
                    <div id="runway-label" class="text-muted small mt-1"></div>
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
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateBurn());
});

function calculateBurn() {
    const cash = parseFloat(document.getElementById('cashBalance').value) || 0;
    const expenses = parseFloat(document.getElementById('monthlyExpenses').value) || 0;
    const revenue = parseFloat(document.getElementById('monthlyRevenue').value) || 0;

    const grossBurn = expenses;
    const netBurn = expenses - revenue;
    const runwayGross = expenses > 0 ? (cash / expenses) : Infinity;
    const runwayNet = netBurn > 0 ? (cash / netBurn) : (netBurn <= 0 ? Infinity : 0);

    document.getElementById('res-gross').textContent = BizTools.fmt(grossBurn);
    document.getElementById('res-net').textContent = BizTools.fmt(netBurn);
    document.getElementById('res-runway-gross').textContent = runwayGross === Infinity ? '∞' : Math.round(runwayGross * 10) / 10;
    document.getElementById('res-runway-net').textContent = runwayNet === Infinity ? '∞ (Profitable!)' : Math.round(runwayNet * 10) / 10;

    const fill = document.getElementById('runway-fill');
    const months = runwayNet === Infinity ? 36 : Math.min(runwayNet, 36);
    const pct = Math.min((months / 36) * 100, 100);
    fill.style.width = pct + '%';
    fill.style.background = pct > 60 ? 'linear-gradient(90deg,#10b981,#34d399)' : pct > 30 ? 'linear-gradient(90deg,#f59e0b,#fbbf24)' : 'linear-gradient(90deg,#ef4444,#f87171)';
    document.getElementById('runway-label').textContent = runwayNet === Infinity ? 'Cash-flow positive — infinite runway!' : `~${Math.round(runwayNet)} months of runway remaining`;

    document.getElementById('burn-results').style.display = 'block';
    BizTools.saveHistory('burn-rate-calculator', { cash, expenses, revenue, grossBurn, netBurn, runwayNet });
    BizTools.toast('Burn rate calculated!');
}

function resetBurn() {
    document.getElementById('cashBalance').value = '500000';
    document.getElementById('monthlyExpenses').value = '50000';
    document.getElementById('monthlyRevenue').value = '15000';
    document.getElementById('burn-results').style.display = 'none';
}
</script>






