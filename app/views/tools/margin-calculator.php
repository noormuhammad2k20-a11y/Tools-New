<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-5">
                <div class="col-lg-6">
                    <h3 class="fw-bold h5 mb-4 border-bottom pb-2">Financial Inputs</h3>
                    <p class="small text-muted mb-4">Enter any two values below to automatically calculate the remaining fields. Perfect for retail pricing and financial modeling.</p>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Cost of Goods ($)</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-2 text-muted fw-bold">$</span>
                            <input type="number" id="input-cost" class="form-control border-2" placeholder="e.g. 50" min="0" step="any">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Revenue / Sale Price ($)</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-2 text-muted fw-bold">$</span>
                            <input type="number" id="input-revenue" class="form-control border-2" placeholder="e.g. 100" min="0" step="any">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase text-muted">Gross Margin (%)</label>
                        <div class="input-group input-group-lg">
                            <input type="number" id="input-margin" class="form-control border-2 text-end" placeholder="e.g. 50" min="-100" max="99.9" step="any">
                            <span class="input-group-text bg-light border-2 text-muted fw-bold">%</span>
                        </div>
                    </div>

                    <button class="btn btn-outline-secondary w-100 rounded-pill px-4" onclick="clearCalculator()"><i class="fa-solid fa-rotate-left me-2"></i>Reset Calculator</button>
                </div>

                <div class="col-lg-6">
                    <div class="pro-card bg-light border-0 rounded-4 p-5 h-100 d-flex flex-column justify-content-center text-center">
                        <h4 class="fw-bold mb-5 text-uppercase tracking-wider text-muted fs-6">Calculated Results</h4>

                        <div class="mb-5">
                            <p class="text-muted mb-1 fs-5 fw-bold">Gross Profit</p>
                            <h2 class="display-3 fw-bold text-success mb-0" id="result-profit">$0.00</h2>
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-white p-3 rounded-4 shadow-sm border">
                                    <p class="text-muted mb-1 small fw-bold">Markup Percentage</p>
                                    <h4 class="fw-bold text-primary mb-0" id="result-markup">0.00%</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white p-3 rounded-4 shadow-sm border">
                                    <p class="text-muted mb-1 small fw-bold">Cost Multiplier</p>
                                    <h4 class="fw-bold text-info mb-0" id="result-multiplier">1.00x</h4>
                                </div>
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
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Margin vs. Markup: What's the Difference?</h2>
                    <p class="lead">In business finance and retail pricing, the terms <strong>Margin</strong> and <strong>Markup</strong> are frequently confused, which can lead to pricing errors. Our professional Margin Calculator clarifies this instantly by showing you both metrics based on your cost and revenue.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Gross Margin Percentage</h3>
                    <p><strong>Margin</strong> (also known as gross profit margin) is the percentage of revenue that is profit. It is calculated by taking the gross profit (Revenue minus Cost) and dividing it by the Revenue. In retail, an ideal gross margin usually sits between 30% and 50%.</p>
                    <p><code>Margin % = ((Revenue - Cost) / Revenue) * 100</code></p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Markup Percentage</h3>
                    <p><strong>Markup</strong> is the percentage by which the cost is increased to arrive at the selling price. It is calculated by taking the gross profit and dividing it by the Cost of the item. A 50% margin requires a 100% markup (doubling your cost).</p>
                    <p><code>Markup % = ((Revenue - Cost) / Cost) * 100</code></p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How to Use the Calculator</h3>
                    <p>Our dynamic dual-input system allows you to build out pricing models flexibly:</p>
                    <ul>
                        <li><strong>Find Selling Price:</strong> Enter your wholesale <em>Cost</em> and your desired <em>Margin</em>, and we will calculate the required Revenue price and the resulting markup.</li>
                        <li><strong>Find Cost Limits:</strong> Enter the competitive retail <em>Revenue</em> price and your required <em>Margin</em>, and we will tell you the maximum wholesale cost you can afford.</li>
                        <li><strong>Find Margins:</strong> Enter both <em>Cost</em> and <em>Revenue</em>, and the calculator will output your gross profit dollars, margin percentage, and cost multiplier (ROI).</li>
                    </ul>
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


<style>
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
input[type=number] { -moz-appearance: textfield; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const costInput = document.getElementById('input-cost');
    const revInput = document.getElementById('input-revenue');
    const marginInput = document.getElementById('input-margin');
    
    const profitOut = document.getElementById('result-profit');
    const markupOut = document.getElementById('result-markup');
    const multiOut = document.getElementById('result-multiplier');

    let isFormatting = false;

    function formatCurrency(num) {
        return num < 0 ? `-$${Math.abs(num).toFixed(2)}` : `$${num.toFixed(2)}`;
    }

    function calculate(source) {
        if (isFormatting) return;
        isFormatting = true;

        let cost = parseFloat(costInput.value);
        let rev = parseFloat(revInput.value);
        let margin = parseFloat(marginInput.value);

        // Logic based on which field was just edited
        if (source === 'cost' || source === 'revenue') {
            if (!isNaN(cost) && !isNaN(rev)) {
                margin = rev !== 0 ? ((rev - cost) / rev) * 100 : 0;
                marginInput.value = margin.toFixed(2);
            }
        } else if (source === 'margin') {
            if (!isNaN(cost) && !isNaN(margin)) {
                // Find Revenue: Revenue = Cost / (1 - Margin/100)
                if (margin !== 100) {
                    rev = cost / (1 - (margin / 100));
                    revInput.value = rev.toFixed(2);
                }
            } else if (!isNaN(rev) && !isNaN(margin)) {
                // Find Cost: Cost = Revenue - (Margin/100 * Revenue)
                cost = rev - ((margin / 100) * rev);
                costInput.value = cost.toFixed(2);
            }
        }

        // Update output results
        if (!isNaN(cost) && !isNaN(rev)) {
            let profit = rev - cost;
            profitOut.textContent = formatCurrency(profit);
            
            let markup = cost !== 0 ? (profit / cost) * 100 : 0;
            markupOut.textContent = `${markup.toFixed(2)}%`;

            let multiplier = cost !== 0 ? (rev / cost) : 0;
            multiOut.textContent = `${multiplier.toFixed(2)}x`;
            
            if(profit < 0) profitOut.classList.replace('text-success', 'text-danger');
            else profitOut.classList.replace('text-danger', 'text-success');
        } else {
            profitOut.textContent = '$0.00';
            markupOut.textContent = '0.00%';
            multiOut.textContent = '1.00x';
            profitOut.classList.replace('text-danger', 'text-success');
        }

        isFormatting = false;
    }

    costInput.addEventListener('input', () => calculate('cost'));
    revInput.addEventListener('input', () => calculate('revenue'));
    marginInput.addEventListener('input', () => calculate('margin'));

    window.clearCalculator = () => {
        costInput.value = '';
        revInput.value = '';
        marginInput.value = '';
        calculate('none');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>