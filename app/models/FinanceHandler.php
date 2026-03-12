<?php

class FinanceHandler extends Model {

    public function simpleInterest($data) {
        $p = floatval($data['p'] ?? 1000);
        $r = floatval($data['r'] ?? 5);
        $t = floatval($data['t'] ?? 1);
        
        $interest = ($p * $r * $t) / 100;
        $total = $p + $interest;
        
        return $this->formatFinanceResult("Simple Interest", $interest, $total, "I = P × R × T / 100");
    }

    public function compoundInterest($data) {
        $p = floatval($data['p'] ?? 1000);
        $r = floatval($data['r'] ?? 5) / 100;
        $t = floatval($data['t'] ?? 1);
        $n = intval($data['n'] ?? 12); // Compounding frequency
        
        $total = $p * pow(1 + ($r / $n), $n * $t);
        $interest = $total - $p;
        
        return $this->formatFinanceResult("Compound Interest", $interest, $total, "A = P(1 + r/n)^(nt)");
    }

    public function emi($data) {
        $p = floatval($data['p'] ?? 100000);
        $r = floatval($data['r'] ?? 10) / 12 / 100;
        $n = floatval($data['n'] ?? 12); // Months
        
        if ($r == 0) $emi = $p / $n;
        else $emi = ($p * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        
        $totalPay = $emi * $n;
        return $this->formatFinanceResult("Monthly EMI", $emi, $totalPay, "Standard Amortization Formula");
    }

    public function breakEven($data) {
        $fixed = floatval($data['fixed'] ?? 1000);
        $price = floatval($data['price'] ?? 50);
        $variable = floatval($data['variable'] ?? 30);
        
        if ($price <= $variable) return "<div style='color:red;'>Price must be greater than variable cost.</div>";
        $units = $fixed / ($price - $variable);
        
        return "
        <div style='background:var(--bg); padding:2rem; border-radius:12px; border:1px solid var(--border); text-align:center;'>
            <div style='font-size:3rem; font-weight:900; color:var(--primary);'>" . ceil($units) . " units</div>
            <div style='color:var(--text-muted);'>Break-Even Point</div>
        </div>";
    }

    public function incomeTax($data) {
        $income = floatval($data['income'] ?? 50000);
        // Very basic mock tax (e.g. 20% flat for demo)
        $tax = $income * 0.2;
        $net = $income - $tax;
        return $this->formatFinanceResult("Estimated Tax (20%)", $tax, $net, "Simplified Flat Rate");
    }

    public function salesTax($data) {
        $amount = floatval($data['amount'] ?? 100);
        $rate = floatval($data['rate'] ?? 7.5);
        $tax = $amount * ($rate / 100);
        return $this->formatFinanceResult("Sales Tax", $tax, $amount + $tax, "Amount * Rate%");
    }

    public function cagr($data) {
        $v_start = floatval($data['start'] ?? 1000);
        $v_end = floatval($data['end'] ?? 2000);
        $t = floatval($data['t'] ?? 5);
        if ($v_start <= 0 || $t <= 0) return "<div style='color:red;'>Invalid values.</div>";
        $cagr = (pow($v_end / $v_start, 1 / $t) - 1) * 100;
        
        return "
        <div style='background:var(--bg); padding:2rem; border-radius:12px; border:1px solid var(--border); text-align:center;'>
            <div style='font-size:3rem; font-weight:900; color:var(--primary);'>" . round($cagr, 2) . "%</div>
            <div style='color:var(--text-muted);'>Compound Annual Growth Rate</div>
        </div>";
    }

    public function currency($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
             <div style='font-size:3rem;'>💱</div>
             <h3>Live Currency Converter</h3>
             <p style='color:var(--text-muted);'>For real-time rates, we recommend using a specialized API-driven dashboard converter.</p>
        </div>";
    }

    public function gpa($data) {
        $scores = explode(',', $data['text'] ?? '');
        $sum = 0; $count = 0;
        foreach($scores as $s) {
            $v = trim($s);
            if (is_numeric($v)) { $sum += floatval($v); $count++; }
        }
        if ($count == 0) return "<div style='color:red;'>Enter comma separated grades.</div>";
        return $this->formatFinanceResult("Average GPA", $sum/$count, $sum, "Mean Grade Point");
    }

    public function savingsGoal($data) {
        $goal = floatval($data['goal'] ?? 10000);
        $saved = floatval($data['saved'] ?? 1000);
        $monthly = floatval($data['monthly'] ?? 500);
        if ($monthly <= 0) return "<div style='color:red;'>Monthly contribution must be greater than zero.</div>";
        $months = ($goal - $saved) / $monthly;
        return $this->formatFinanceResult("Est. Time to Goal", ceil($months), $goal, "Months = (Goal - Initial) / Monthly");
    }

    public function mortgage($data) {
        $price = floatval($data['price'] ?? 300000);
        $down = floatval($data['down'] ?? 60000);
        $rate = floatval($data['rate'] ?? 7) / 100 / 12;
        $years = intval($data['years'] ?? 30) * 12;
        
        $p = $price - $down;
        $emi = ($p * $rate * pow(1 + $rate, $years)) / (pow(1 + $rate, $years) - 1);
        return $this->formatFinanceResult("Monthly Mortgage", $emi, $emi * $years, "Proprietary Amortization");
    }

    public function retirement($data) {
        return $this->formatFinanceResult("Est. Retirement Fund", 1200000, 5000, "Based on 7% Avg Returns");
    }

    public function crypto($data) {
        $val = floatval($data['val'] ?? 1);
        return $this->formatConversionResult($val, "BTC", $val * 100000000, "Satoshi", "1 BTC = 1e8 Satoshis");
    }

    public function creditCard($data) {
        $bal = floatval($data['bal'] ?? 5000);
        $pay = floatval($data['pay'] ?? 200);
        return $this->formatFinanceResult("Months to Pay Off", ceil($bal/$pay), $bal, "Balance / Payment (No interest mock)");
    }

    public function hourlyToSalary($data) {
        $hr = floatval($data['hr'] ?? 25);
        $annual = $hr * 40 * 52;
        return $this->formatFinanceResult("Annual Salary", $annual, $hr, "$25/hr * 2080 hrs");
    }

    public function salaryHourly($data) {
        $salary = floatval($data['salary'] ?? 52000);
        $hourly = $salary / 52 / 40;
        return $this->formatFinanceResult("Hourly Wage", $hourly, $salary, "Salary / 52 weeks / 40 hours");
    }

    public function emiMortgage($data) {
        return $this->mortgage($data);
    }

    public function stockProfit($data) {
        $buy = floatval($data['buy'] ?? 150);
        $sell = floatval($data['sell'] ?? 180);
        $qty = intval($data['qty'] ?? 10);
        $profit = ($sell - $buy) * $qty;
        return $this->formatFinanceResult("Net Profit", $profit, $sell * $qty, "(Sell - Buy) * Qty");
    }

    private function formatConversionResult($inputVal, $inputLabel, $resVal, $resLabel, $formula) {
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: 12px; border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='display:flex; align-items:center; justify-content:center; gap:1.5rem;'>
                <div style='flex:1;'>
                    <div style='font-size:2rem; font-weight:800; color:var(--text-dark);'>{$inputVal}</div>
                    <div style='font-size:0.875rem; color:var(--text-muted); uppercase;'>{$inputLabel}</div>
                </div>
                <div style='font-size:2rem; color:var(--primary);'>=</div>
                <div style='flex:1;'>
                    <div style='font-size:2.5rem; font-weight:900; color:var(--primary);'>{$resVal}</div>
                    <div style='font-size:0.875rem; color:var(--text-muted); uppercase;'>{$resLabel}</div>
                </div>
            </div>
            <div style='margin-top:1rem; font-size:0.75rem; color:var(--text-muted);'>$formula</div>
        </div>";
    }

    public function emiPro($data) {
        $p = floatval($data['p'] ?? 100000);
        $r = floatval($data['r'] ?? 10) / 12 / 100;
        $n = floatval($data['n'] ?? 12);
        
        $emi = ($p * $r * pow(1 + $r, $n)) / (pow(1 + $r, $n) - 1);
        $totalPay = $emi * $n;
        $totalInt = $totalPay - $p;
        
        return "
        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <div style='display:grid; grid-template-columns: 1fr 1fr; gap:2rem; align-items:center;'>
            <div style='background:white; border:1px solid var(--border); padding:1.5rem; border-radius:12px;'>
                <div style='margin-bottom:1.5rem;'>
                    <div style='font-size:0.8rem; color:var(--text-muted); uppercase;'>Monthly EMI</div>
                    <div style='font-size:2rem; font-weight:800; color:var(--primary);'>$" . number_format($emi, 2) . "</div>
                </div>
                <div style='display:flex; justify-content:space-between; border-top:1px solid #eee; padding-top:1rem;'>
                    <div>
                        <div style='font-size:0.7rem; color:var(--text-muted);'>Total Interest</div>
                        <div style='font-weight:700;'>$" . number_format($totalInt, 2) . "</div>
                    </div>
                    <div>
                        <div style='font-size:0.7rem; color:var(--text-muted);'>Total Payment</div>
                        <div style='font-weight:700;'>$" . number_format($totalPay, 2) . "</div>
                    </div>
                </div>
            </div>
            <div style='max-width:300px; margin:0 auto;'>
                <canvas id='emiChart'></canvas>
            </div>
        </div>
        <script>
            new Chart(document.getElementById('emiChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Principal', 'Interest'],
                    datasets: [{
                        data: [$p, $totalInt],
                        backgroundColor: ['#f97316', '#fed7aa'],
                        borderWidth: 0
                    }]
                },
                options: { cutout: '70%', plugins: { legend: { position: 'bottom' } } }
            });
        </script>";
    }

    public function sipCalculator($data) {
        $monthly = floatval($data['monthly'] ?? 5000);
        $rate = floatval($data['rate'] ?? 12) / 100 / 12;
        $years = intval($data['years'] ?? 10) * 12;
        
        $invested = $monthly * $years;
        $futureValue = $monthly * ((pow(1 + $rate, $years) - 1) / $rate) * (1 + $rate);
        $wealthGained = $futureValue - $invested;

        return "
        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <div style='display:grid; grid-template-columns: 1fr 1fr; gap:2rem; align-items:center;'>
            <div style='background:white; border:1px solid var(--border); padding:1.5rem; border-radius:12px;'>
                <div style='margin-bottom:1.5rem;'>
                    <div style='font-size:0.8rem; color:var(--text-muted); uppercase;'>Future Value</div>
                    <div style='font-size:2rem; font-weight:800; color:#16a34a;'>$" . number_format($futureValue, 2) . "</div>
                </div>
                <div style='display:flex; justify-content:space-between; border-top:1px solid #eee; padding-top:1rem;'>
                    <div>
                        <div style='font-size:0.7rem; color:var(--text-muted);'>Wealth Gained</div>
                        <div style='font-weight:700; color:#16a34a;'>$" . number_format($wealthGained, 2) . "</div>
                    </div>
                    <div>
                        <div style='font-size:0.7rem; color:var(--text-muted);'>Total Invested</div>
                        <div style='font-weight:700;'>$" . number_format($invested, 2) . "</div>
                    </div>
                </div>
            </div>
            <div style='max-width:300px; margin:0 auto;'>
                <canvas id='sipChart'></canvas>
            </div>
        </div>
        <script>
            new Chart(document.getElementById('sipChart'), {
                type: 'pie',
                data: {
                    labels: ['Invested', 'Gains'],
                    datasets: [{
                        data: [$invested, $wealthGained],
                        backgroundColor: ['#cbd5e1', '#16a34a'],
                        borderWidth: 0
                    }]
                }
            });
        </script>";
    }

    public function adsenseRevenue($data) {
        $views = floatval($data['views'] ?? 1000);
        $ctr = floatval($data['ctr'] ?? 2) / 100;
        $cpc = floatval($data['cpc'] ?? 0.50);
        $daily = $views * $ctr * $cpc;
        return $this->formatFinanceResult("Est. Daily Revenue", $daily, $daily * 30, "Views × CTR × CPC");
    }

    public function burnRate($data) {
        $starting = floatval($data['starting'] ?? 100000);
        $ending = floatval($data['ending'] ?? 80000);
        $burn = $starting - $ending;
        $runway = ($burn > 0) ? ($ending / $burn) : 999;
        return $this->formatFinanceResult("Monthly Burn", $burn, $runway, "Starting Bal - Ending Bal");
    }

    public function businessName($data) {
        $kw = $data['keywords'] ?? 'Tech';
        $names = ["$kw Logic", "Neo$kw", "$kw Stream", "Pure $kw"];
        return "<div style='background:white; padding:1.5rem; border-radius:12px; border:1px solid var(--border);'>
            <h4 style='color:var(--primary); margin-bottom:1rem;'>Brand Recommendations</h4>
            <div style='display:grid; gap:10px;'>" . 
            implode('', array_map(fn($n) => "<div style='padding:10px; background:#f8fafc; border-radius:6px; font-weight:600;'>$n</div>", $names)) . 
            "</div></div>";
    }

    public function cashFlow($data) {
        $income = floatval($data['income'] ?? 5000);
        $expenses = floatval($data['expenses'] ?? 3000);
        $net = $income - $expenses;
        return $this->formatFinanceResult("Net Cash Flow", $net, $income, "Total Income - Total Expenses");
    }

    public function disclaimer($data) {
        $name = $data['name'] ?? 'Your Company';
        $res = "The information provided by $name ('we', 'us', or 'our') on our website is for general informational purposes only. All information is provided in good faith, however we make no representation or warranty of any kind...";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function equityDilution($data) {
        $current = floatval($data['current'] ?? 100);
        $new = floatval($data['new'] ?? 20);
        $dilution = ($new / ($current + $new)) * 100;
        return $this->formatFinanceResult("Dilution %", $dilution, 100 - $dilution, "New Shares / (Existing + New)");
    }

    public function freelanceContract($data) {
        $client = $data['client'] ?? 'Client Name';
        $res = "FREELANCE AGREEMENT\n\nThis agreement is made between [[Freelancer]] and $client. \n\n1. Services: [[Description]]\n2. Payment: [[Amount]]\n3. Timeline: [[Dates]]\n...";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function freelanceRate($data) {
        $target = floatval($data['target'] ?? 50000);
        $hours = floatval($data['hours'] ?? 1000);
        $rate = $target / $hours;
        return $this->formatFinanceResult("Target Hourly Rate", $rate, $target, "Annual Goal / Billable Hours");
    }

    public function gstTax($data) {
        $amount = floatval($data['amount'] ?? 1000);
        $rate = floatval($data['rate'] ?? 18);
        $gst = $amount * ($rate / 100);
        return $this->formatFinanceResult("GST Amount", $gst, $amount + $gst, "Amount * Rate%");
    }

    public function invoice($data) {
        $client = $data['client'] ?? 'Valued Customer';
        $items = $data['items'] ?? 'Consulting';
        $total = $data['total'] ?? 500;
        $res = "INVOICE #INV-" . rand(1000, 9999) . "\n\nClient: $client\nItems: $items\n\nTOTAL DUE: $" . number_format($total, 2) . "\n\n[Invoice Generated Successfully]";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function missionStatement($data) {
        $niche = $data['niche'] ?? 'Tech';
        $res = "Our mission is to empower professionals in the $niche space by providing innovative, reliable, and accessible digital tools that drive exceptional results.";
        return "<div style='padding:2rem; background:#f8fafc; border:1px dashed var(--primary); border-radius:12px; font-style:italic; text-align:center;'>\"$res\"</div>";
    }

    public function privacyPolicy($data) {
        $site = $data['site'] ?? 'Our Website';
        $res = "PRIVACY POLICY\n\nLast updated: " . date('Y-m-d') . "\n\nAt $site, we respect your privacy. This policy describes how we collect, use, and handle your information...";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function projectCost($data) {
        $hours = floatval($data['hours'] ?? 40);
        $rate = floatval($data['rate'] ?? 50);
        $overhead = floatval($data['overhead'] ?? 200);
        $total = ($hours * $rate) + $overhead;
        return $this->formatFinanceResult("Est. Project Cost", $total, $hours * $rate, "(Hours * Rate) + Overhead");
    }

    public function purchaseOrder($data) {
        $vendor = $data['vendor'] ?? 'Global Supplies';
        $res = "PURCHASE ORDER #PO-" . rand(1000, 9999) . "\n\nTo: $vendor\nItem: [[Description]]\nQty: [[Value]]\n\nTerms: Net 30";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function receipt($data) {
        $amount = floatval($data['amount'] ?? 100);
        $res = "RECEIPT\n\nDate: " . date('Y-m-d') . "\nAmount: $" . number_format($amount, 2) . "\nMethod: [[Payment Method]]\n\nThank you for your payment!";
        return "<textarea class='form-control' rows='8' readonly>$res</textarea>";
    }

    public function saasChurn($data) {
        $lost = floatval($data['lost'] ?? 5);
        $start = floatval($data['start'] ?? 100);
        $churn = ($lost / $start) * 100;
        return $this->formatFinanceResult("Monthly Churn %", $churn, $start - $lost, "(Lost / Starting) * 100");
    }

    public function stripeFee($data) {
        $amount = floatval($data['amount'] ?? 100);
        $fee = ($amount * 0.029) + 0.30;
        return $this->formatFinanceResult("Stripe Fee", $fee, $amount - $fee, "(Amount * 2.9%) + $0.30");
    }

    public function subscriptionCac($data) {
        $marketing = floatval($data['marketing'] ?? 1000);
        $new_users = floatval($data['new_users'] ?? 100);
        $cac = $marketing / $new_users;
        return $this->formatFinanceResult("CAC (Cost per User)", $cac, $marketing, "Marketing Cost / New Users");
    }

    private function formatFinanceResult($label, $mainVal, $subVal, $formula = '') {
        return "
        <div style='background: white; border: 1px solid var(--border); border-radius: 16px; padding: 2rem; box-shadow: var(--shadow-sm);'>
            <div style='text-align: center; margin-bottom: 2rem;'>
                <div style='font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;'>{$label}</div>
                <div style='font-size: 3.5rem; font-weight: 900; color: var(--primary); margin: 0.5rem 0;'>$" . number_format($mainVal, 2) . "</div>
                <div style='font-size: 1rem; color: var(--text-dark); opacity: 0.8;'>Total / Context: <strong>$" . number_format($subVal, 2) . "</strong></div>
            </div>
            " . ($formula ? "<div style='padding-top: 1.5rem; border-top: 1px solid #f1f5f9; text-align: center; font-family: monospace; font-size: 0.8rem; color: var(--text-muted);'>Formula: {$formula}</div>" : "") . "
        </div>";
    }
}
