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

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1.5rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Starting Cash Balance ($)</label>
                    <input type="number" id="cfStart" class="form-control" value="50000" min="0" step="any">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Forecast Period (Months)</label>
                    <input type="number" id="cfMonths" class="form-control" value="12" min="1" max="60" step="1">
                </div>
            </div>

            <!-- Income Sources -->
            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Monthly Income Sources</h4>
            <div id="cf-income" style="margin-bottom:1rem;">
                <div class="cf-income-row" style="display:grid;grid-template-columns:2fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control cf-inc-name" placeholder="Source (e.g., Product Sales)" value="Product Sales">
                    <input type="number" class="form-control cf-inc-amt" value="10000" min="0" step="any" placeholder="Amount">
                    <button type="button" onclick="this.closest('.cf-income-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addCFRow('cf-income','cf-income-row','cf-inc-name','cf-inc-amt','Income Source')" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-size:0.85rem;margin-bottom:2rem;">+ Add Income</button>

            <!-- Expense Categories -->
            <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Monthly Expenses</h4>
            <div id="cf-expenses" style="margin-bottom:1rem;">
                <div class="cf-expense-row" style="display:grid;grid-template-columns:2fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control cf-exp-name" placeholder="Category (e.g., Rent)" value="Rent">
                    <input type="number" class="form-control cf-exp-amt" value="3000" min="0" step="any" placeholder="Amount">
                    <button type="button" onclick="this.closest('.cf-expense-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
                <div class="cf-expense-row" style="display:grid;grid-template-columns:2fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
                    <input type="text" class="form-control cf-exp-name" value="Salaries">
                    <input type="number" class="form-control cf-exp-amt" value="5000" min="0" step="any">
                    <button type="button" onclick="this.closest('.cf-expense-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
                </div>
            </div>
            <button type="button" onclick="addCFRow('cf-expenses','cf-expense-row','cf-exp-name','cf-exp-amt','Expense')" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-size:0.85rem;margin-bottom:2rem;">+ Add Expense</button>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="forecastCashFlow()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Forecast Cash Flow 📈
                </button>
                <button type="button" onclick="document.getElementById('cf-results').style.display='none'" class="btn btn-outline" style="padding: 1rem 1.5rem; border-radius: 14px;">Clear</button>
            </div>

            <div id="cf-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 1rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Cash Flow Projection</h3>
                <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:1rem; margin-bottom:2rem;">
                    <div class="p-3 rounded-3 border text-center" style="background:linear-gradient(135deg,#d1fae5,#ecfdf5);">
                        <div class="text-muted small">Total Inflow</div>
                        <div id="cf-total-in" class="fw-bold fs-5" style="color:#059669;">—</div>
                    </div>
                    <div class="p-3 rounded-3 border text-center" style="background:linear-gradient(135deg,#fee2e2,#fef2f2);">
                        <div class="text-muted small">Total Outflow</div>
                        <div id="cf-total-out" class="fw-bold fs-5" style="color:#dc2626;">—</div>
                    </div>
                    <div class="p-3 rounded-3 border text-center bg-light">
                        <div class="text-muted small">Net Cash Flow/mo</div>
                        <div id="cf-net" class="fw-bold fs-5">—</div>
                    </div>
                    <div class="p-3 rounded-3 border text-center bg-light">
                        <div class="text-muted small">End Balance</div>
                        <div id="cf-end" class="fw-bold fs-5">—</div>
                    </div>
                </div>
                <div style="max-height:400px; overflow:auto; border:1px solid var(--border); border-radius:12px;">
                    <table id="cf-table" style="width:100%; border-collapse:collapse; font-size:0.9rem;">
                    </table>
                </div>
                <canvas id="cfChart" style="margin-top:2rem; max-height:300px;"></canvas>
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



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
let cfChart = null;
document.addEventListener('DOMContentLoaded', () => {
    BizTools.buildCurrencySelector('currency-selector');
});

function addCFRow(containerId, rowClass, nameClass, amtClass, placeholder) {
    document.getElementById(containerId).insertAdjacentHTML('beforeend', `<div class="${rowClass}" style="display:grid;grid-template-columns:2fr 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;">
        <input type="text" class="form-control ${nameClass}" placeholder="${placeholder}">
        <input type="number" class="form-control ${amtClass}" value="0" min="0" step="any">
        <button type="button" onclick="this.closest('.${rowClass}').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button>
    </div>`);
}

function forecastCashFlow() {
    const startCash = parseFloat(document.getElementById('cfStart').value) || 0;
    const months = parseInt(document.getElementById('cfMonths').value) || 12;

    let monthlyIncome = 0;
    document.querySelectorAll('.cf-inc-amt').forEach(el => { monthlyIncome += parseFloat(el.value) || 0; });
    let monthlyExpenses = 0;
    document.querySelectorAll('.cf-exp-amt').forEach(el => { monthlyExpenses += parseFloat(el.value) || 0; });

    const netFlow = monthlyIncome - monthlyExpenses;
    const labels = [];
    const balances = [];
    let balance = startCash;

    let tableHTML = '<thead><tr style="background:var(--primary);color:#fff;"><th style="padding:0.75rem;">Month</th><th style="padding:0.75rem;">Inflow</th><th style="padding:0.75rem;">Outflow</th><th style="padding:0.75rem;">Net</th><th style="padding:0.75rem;">Balance</th></tr></thead><tbody>';
    for (let i = 1; i <= months; i++) {
        balance += netFlow;
        labels.push('M' + i);
        balances.push(balance);
        const rowColor = balance < 0 ? '#fef2f2' : (i % 2 === 0 ? '#f8fafc' : '#fff');
        tableHTML += `<tr style="background:${rowColor};"><td style="padding:0.6rem 0.75rem;font-weight:600;">Month ${i}</td><td style="padding:0.6rem 0.75rem;color:#059669;">${BizTools.fmt(monthlyIncome)}</td><td style="padding:0.6rem 0.75rem;color:#dc2626;">${BizTools.fmt(monthlyExpenses)}</td><td style="padding:0.6rem 0.75rem;font-weight:600;color:${netFlow>=0?'#059669':'#dc2626'};">${BizTools.fmt(netFlow)}</td><td style="padding:0.6rem 0.75rem;font-weight:700;color:${balance>=0?'var(--text-main)':'#dc2626'};">${BizTools.fmt(balance)}</td></tr>`;
    }
    tableHTML += '</tbody>';
    document.getElementById('cf-table').innerHTML = tableHTML;

    document.getElementById('cf-total-in').textContent = BizTools.fmt(monthlyIncome);
    document.getElementById('cf-total-out').textContent = BizTools.fmt(monthlyExpenses);
    const netEl = document.getElementById('cf-net');
    netEl.textContent = BizTools.fmt(netFlow);
    netEl.style.color = netFlow >= 0 ? '#059669' : '#dc2626';
    const endEl = document.getElementById('cf-end');
    endEl.textContent = BizTools.fmt(balance);
    endEl.style.color = balance >= 0 ? '#059669' : '#dc2626';

    if (cfChart) cfChart.destroy();
    cfChart = new Chart(document.getElementById('cfChart'), {
        type: 'line',
        data: { labels, datasets: [{ label: 'Cash Balance', data: balances, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,0.1)', fill: true, tension: 0.3, pointRadius: 3 }] },
        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: false } } }
    });

    document.getElementById('cf-results').style.display = 'block';
    BizTools.toast('Cash flow forecast ready!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>