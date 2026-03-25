

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div id="currency-selector"></div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Overhead (%)</label>
                    <input type="number" id="pcOverhead" class="form-control" value="15" min="0" max="100" step="0.1">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Contingency (%)</label>
                    <input type="number" id="pcContingency" class="form-control" value="10" min="0" max="100" step="0.1">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Profit Margin (%)</label>
                    <input type="number" id="pcProfit" class="form-control" value="20" min="0" max="100" step="0.1">
                </div>
            </div>

            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Task Breakdown</h4>
            <div id="pc-tasks" style="margin-bottom:1rem;">
                <div style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;font-weight:600;font-size:0.85rem;color:var(--text-muted);margin-bottom:0.5rem;padding:0 0.5rem;">
                    <div>Task / Phase</div><div>Hours</div><div>Rate ($/hr)</div><div></div>
                </div>
                <div class="pc-task-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control pc-name" placeholder="Task" value="Design">
                    <input type="number" class="form-control pc-hours" value="20" min="0" step="any">
                    <input type="number" class="form-control pc-rate" value="75" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.pc-task-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
                <div class="pc-task-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control pc-name" value="Development">
                    <input type="number" class="form-control pc-hours" value="80" min="0" step="any">
                    <input type="number" class="form-control pc-rate" value="100" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.pc-task-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
                <div class="pc-task-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control pc-name" value="Testing &amp; QA">
                    <input type="number" class="form-control pc-hours" value="15" min="0" step="any">
                    <input type="number" class="form-control pc-rate" value="60" min="0" step="0.01">
                    <button type="button" onclick="this.closest('.pc-task-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addPCTask()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.75rem 1.5rem;border-radius:12px;cursor:pointer;font-size:0.9rem;margin-bottom:2rem;">+ Add Task</button>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="estimateCost()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Estimate Cost 💡
                </button>
                <button type="button" onclick="document.getElementById('pc-results').style.display='none'" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Clear</button>
            </div>

            <div id="pc-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Cost Estimate</h3>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; align-items:start;">
                    <div>
                        <div id="pc-breakdown" style="display:grid; gap:0.75rem;"></div>
                        <div style="margin-top:1.5rem; padding:1.25rem; border-radius:16px; border:2px solid var(--primary); background:var(--primary-glow); text-align:center;">
                            <div class="text-muted small">Total Project Cost</div>
                            <div id="pc-total" style="font-size:2.5rem; font-weight:900; color:var(--primary);">—</div>
                        </div>
                    </div>
                    <div style="max-width:350px; margin:0 auto;">
                        <canvas id="pcChart"></canvas>
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
let pcChart = null;
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector');
});

function addPCTask() {
    document.getElementById('pc-tasks').insertAdjacentHTML('beforeend', `<div class="pc-task-row" style="display:grid;grid-template-columns:2fr 1fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
        <input type="text" class="form-control pc-name" placeholder="Task / Phase">
        <input type="number" class="form-control pc-hours" value="10" min="0" step="any">
        <input type="number" class="form-control pc-rate" value="50" min="0" step="0.01">
        <button type="button" onclick="this.closest('.pc-task-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
    </div>`);
}

function estimateCost() {
    const overheadPct = parseFloat(document.getElementById('pcOverhead').value) || 0;
    const contingencyPct = parseFloat(document.getElementById('pcContingency').value) || 0;
    const profitPct = parseFloat(document.getElementById('pcProfit').value) || 0;

    const tasks = [];
    let laborCost = 0;
    document.querySelectorAll('.pc-task-row').forEach(row => {
        const name = row.querySelector('.pc-name').value || 'Task';
        const hours = parseFloat(row.querySelector('.pc-hours').value) || 0;
        const rate = parseFloat(row.querySelector('.pc-rate').value) || 0;
        const cost = hours * rate;
        laborCost += cost;
        tasks.push({ name, hours, rate, cost });
    });

    const overhead = laborCost * (overheadPct / 100);
    const subtotal = laborCost + overhead;
    const contingency = subtotal * (contingencyPct / 100);
    const beforeProfit = subtotal + contingency;
    const profit = beforeProfit * (profitPct / 100);
    const total = beforeProfit + profit;

    const bd = document.getElementById('pc-breakdown');
    let bdHTML = '';
    tasks.forEach(t => {
        bdHTML += `<div class="p-3 bg-light rounded-3 border"><div class="d-flex justify-content-between"><span class="fw-bold">${t.name}</span><span class="fw-bold">${BizTools.fmt(t.cost)}</span></div><div class="text-muted small">${t.hours}h × ${BizTools.fmt(t.rate)}/hr</div></div>`;
    });
    bdHTML += `<div class="p-3 bg-light rounded-3 border"><div class="d-flex justify-content-between"><span>Overhead (${overheadPct}%)</span><span class="fw-bold">${BizTools.fmt(overhead)}</span></div></div>`;
    bdHTML += `<div class="p-3 bg-light rounded-3 border"><div class="d-flex justify-content-between"><span>Contingency (${contingencyPct}%)</span><span class="fw-bold">${BizTools.fmt(contingency)}</span></div></div>`;
    bdHTML += `<div class="p-3 bg-light rounded-3 border"><div class="d-flex justify-content-between"><span>Profit Margin (${profitPct}%)</span><span class="fw-bold">${BizTools.fmt(profit)}</span></div></div>`;
    bd.innerHTML = bdHTML;
    document.getElementById('pc-total').textContent = BizTools.fmt(total);

    const chartLabels = tasks.map(t => t.name);
    chartLabels.push('Overhead', 'Contingency', 'Profit');
    const chartData = tasks.map(t => t.cost);
    chartData.push(overhead, contingency, profit);
    const colors = ['#2563eb','#7c3aed','#059669','#d97706','#dc2626','#ec4899','#6366f1','#14b8a6','#f59e0b','#94a3b8'];

    if (pcChart) pcChart.destroy();
    pcChart = new Chart(document.getElementById('pcChart'), {
        type: 'doughnut',
        data: { labels: chartLabels, datasets: [{ data: chartData, backgroundColor: colors.slice(0, chartLabels.length), borderWidth: 0 }] },
        options: { cutout: '60%', plugins: { legend: { position: 'bottom', labels: { font: { size: 11 } } } } }
    });

    document.getElementById('pc-results').style.display = 'block';
    BizTools.saveHistory('project-cost-estimator', { laborCost, overhead, contingency, profit, total });
    BizTools.toast('Cost estimate ready!');
}
</script>






