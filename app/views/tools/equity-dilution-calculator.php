

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Pre-Money Valuation ($)</label>
                    <input type="number" id="preMoneyVal" class="form-control" value="5000000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Investment Amount ($)</label>
                    <input type="number" id="investmentAmt" class="form-control" value="1000000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Founder Shares (before round)</label>
                    <input type="number" id="founderShares" class="form-control" value="1000000" min="1" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Option Pool (%)</label>
                    <input type="number" id="optionPool" class="form-control" value="10" min="0" max="100" step="0.1">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateDilution()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Dilution 📊
                </button>
                <button type="button" onclick="resetDilution()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="dilution-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Dilution Analysis</h3>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:2rem; align-items:start;">
                    <div>
                        <div style="display:grid; gap:1rem;">
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="text-muted small">Post-Money Valuation</div>
                                <div id="res-postmoney" class="fs-4 fw-bold" style="color:var(--primary);">—</div>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="text-muted small">Price Per Share</div>
                                <div id="res-pps" class="fs-4 fw-bold" style="color:var(--text-main);">—</div>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="text-muted small">New Shares Issued</div>
                                <div id="res-newshares" class="fs-4 fw-bold" style="color:var(--text-main);">—</div>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="text-muted small">Founder Ownership After</div>
                                <div id="res-founder-pct" class="fs-4 fw-bold" style="color:#7c3aed;">—</div>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="text-muted small">Investor Ownership</div>
                                <div id="res-investor-pct" class="fs-4 fw-bold" style="color:#f59e0b;">—</div>
                            </div>
                        </div>
                    </div>
                    <div style="max-width:350px; margin:0 auto;">
                        <canvas id="dilutionChart"></canvas>
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




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
let dilutionChart = null;
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateDilution());
});

function calculateDilution() {
    const preMoney = parseFloat(document.getElementById('preMoneyVal').value) || 0;
    const investment = parseFloat(document.getElementById('investmentAmt').value) || 0;
    const founderShares = parseFloat(document.getElementById('founderShares').value) || 1;
    const optionPool = parseFloat(document.getElementById('optionPool').value) || 0;

    const postMoney = preMoney + investment;
    const pricePerShare = preMoney / founderShares;
    const investorShares = pricePerShare > 0 ? Math.round(investment / pricePerShare) : 0;
    const poolShares = Math.round((founderShares + investorShares) * (optionPool / 100) / (1 - optionPool / 100));
    const totalShares = founderShares + investorShares + poolShares;

    const founderPct = ((founderShares / totalShares) * 100);
    const investorPct = ((investorShares / totalShares) * 100);
    const poolPct = ((poolShares / totalShares) * 100);

    document.getElementById('res-postmoney').textContent = BizTools.fmt(postMoney);
    document.getElementById('res-pps').textContent = BizTools.fmt(pricePerShare);
    document.getElementById('res-newshares').textContent = investorShares.toLocaleString();
    document.getElementById('res-founder-pct').textContent = founderPct.toFixed(2) + '%';
    document.getElementById('res-investor-pct').textContent = investorPct.toFixed(2) + '%';

    if (dilutionChart) dilutionChart.destroy();
    dilutionChart = new Chart(document.getElementById('dilutionChart'), {
        type: 'doughnut',
        data: {
            labels: ['Founders', 'Investors', 'Option Pool'],
            datasets: [{ data: [founderPct, investorPct, poolPct], backgroundColor: ['#7c3aed','#f59e0b','#94a3b8'], borderWidth: 0 }]
        },
        options: { cutout: '65%', plugins: { legend: { position: 'bottom' } } }
    });

    document.getElementById('dilution-results').style.display = 'block';
    BizTools.saveHistory('equity-dilution-calculator', { preMoney, investment, founderPct, investorPct });
    BizTools.toast('Dilution calculated!');
}

function resetDilution() {
    document.getElementById('preMoneyVal').value = '5000000';
    document.getElementById('investmentAmt').value = '1000000';
    document.getElementById('founderShares').value = '1000000';
    document.getElementById('optionPool').value = '10';
    document.getElementById('dilution-results').style.display = 'none';
}
</script>






