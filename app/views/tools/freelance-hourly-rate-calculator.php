

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Annual Salary Goal ($)</label>
                    <input type="number" id="salaryGoal" class="form-control" value="80000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Annual Business Expenses ($)</label>
                    <input type="number" id="bizExpenses" class="form-control" value="12000" min="0" step="any">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Billable Hours per Week</label>
                    <input type="number" id="billableHours" class="form-control" value="30" min="1" max="80" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Weeks Off per Year</label>
                    <input type="number" id="weeksOff" class="form-control" value="4" min="0" max="52" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Profit Margin (%)</label>
                    <input type="number" id="profitMargin" class="form-control" value="20" min="0" max="100" step="1">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Tax Rate (%)</label>
                    <input type="number" id="taxRate" class="form-control" value="25" min="0" max="100" step="1">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="calculateRate()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Calculate Rate 💵
                </button>
                <button type="button" onclick="resetRate()" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Reset</button>
            </div>

            <div id="rate-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Your Ideal Rates</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:1.5rem;">
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted mb-1 small">Minimum Hourly Rate</div>
                        <div id="res-min-rate" class="fw-bold" style="font-size:2.5rem; color:#059669;">—</div>
                        <div class="text-muted small">before profit &amp; tax</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#ede9fe,#f5f3ff);">
                        <div class="text-muted mb-1 small">Recommended Rate</div>
                        <div id="res-rec-rate" class="fw-bold" style="font-size:2.5rem; color:#7c3aed;">—</div>
                        <div class="text-muted small">with profit margin</div>
                    </div>
                    <div class="p-4 rounded-4 border text-center" style="background:linear-gradient(135deg,#fef3c7,#fffbeb);">
                        <div class="text-muted mb-1 small">Tax-Inclusive Rate</div>
                        <div id="res-tax-rate" class="fw-bold" style="font-size:2.5rem; color:#d97706;">—</div>
                        <div class="text-muted small">covering taxes</div>
                    </div>
                </div>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap:1rem; margin-top:1.5rem;">
                    <div class="p-3 bg-light rounded-3 border text-center">
                        <div class="text-muted small">Billable Hours/Year</div>
                        <div id="res-total-hours" class="fw-bold fs-5">—</div>
                    </div>
                    <div class="p-3 bg-light rounded-3 border text-center">
                        <div class="text-muted small">Required Revenue</div>
                        <div id="res-total-rev" class="fw-bold fs-5">—</div>
                    </div>
                    <div class="p-3 bg-light rounded-3 border text-center">
                        <div class="text-muted small">Daily Rate (8h)</div>
                        <div id="res-daily-rate" class="fw-bold fs-5">—</div>
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
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector', () => calculateRate());
});

function calculateRate() {
    const salary = parseFloat(document.getElementById('salaryGoal').value) || 0;
    const expenses = parseFloat(document.getElementById('bizExpenses').value) || 0;
    const hoursPerWeek = parseFloat(document.getElementById('billableHours').value) || 1;
    const weeksOff = parseFloat(document.getElementById('weeksOff').value) || 0;
    const profitPct = parseFloat(document.getElementById('profitMargin').value) || 0;
    const taxPct = parseFloat(document.getElementById('taxRate').value) || 0;

    const workingWeeks = 52 - weeksOff;
    const totalHours = workingWeeks * hoursPerWeek;
    const totalNeeded = salary + expenses;
    const minRate = totalNeeded / totalHours;
    const recRate = minRate / (1 - profitPct / 100);
    const taxRate = recRate / (1 - taxPct / 100);

    document.getElementById('res-min-rate').textContent = BizTools.fmt(minRate);
    document.getElementById('res-rec-rate').textContent = BizTools.fmt(recRate);
    document.getElementById('res-tax-rate').textContent = BizTools.fmt(taxRate);
    document.getElementById('res-total-hours').textContent = totalHours.toLocaleString() + ' hrs';
    document.getElementById('res-total-rev').textContent = BizTools.fmt(totalNeeded);
    document.getElementById('res-daily-rate').textContent = BizTools.fmt(recRate * 8);
    document.getElementById('rate-results').style.display = 'block';

    BizTools.saveHistory('freelance-hourly-rate-calculator', { salary, expenses, minRate, recRate, taxRate });
    BizTools.toast('Hourly rate calculated!');
}

function resetRate() {
    document.getElementById('salaryGoal').value = '80000';
    document.getElementById('bizExpenses').value = '12000';
    document.getElementById('billableHours').value = '30';
    document.getElementById('weeksOff').value = '4';
    document.getElementById('profitMargin').value = '20';
    document.getElementById('taxRate').value = '25';
    document.getElementById('rate-results').style.display = 'none';
}
</script>






