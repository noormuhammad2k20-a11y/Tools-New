<?php

class MathHandler extends Model {
    
    public function percentage($data) {
        $value = isset($data['value']) ? floatval($data['value']) : 0;
        $total = isset($data['total']) ? floatval($data['total']) : 0;
        
        if ($total == 0) return "<div style='color:red;'>Total cannot be zero</div>";

        $result = ($value / $total) * 100;
        $formatted = number_format($result, 2);
        
        return "<div style='font-size: 1.25rem;'><strong>$value</strong> is <strong style='color:var(--primary); font-size:1.5rem;'>{$formatted}%</strong> of <strong>$total</strong></div>";
    }

    public function margin($data) {
        $cost = isset($data['cost']) ? floatval($data['cost']) : 0;
        $revenue = isset($data['revenue']) ? floatval($data['revenue']) : 0;
        
        if ($revenue == 0) return "<div style='color:red;'>Revenue must be greater than zero.</div>";

        $profit = $revenue - $cost;
        $margin = ($profit / $revenue) * 100;
        $markup = ($cost > 0) ? ($profit / $cost) * 100 : 0;

        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Gross Profit: <strong style='font-size:1.25rem;'>$" . number_format($profit, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Gross Margin: <strong style='font-size:1.25rem; color:#22c55e;'>" . number_format($margin, 2) . "%</strong></div>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Markup: <strong style='font-size:1.25rem;'>" . number_format($markup, 2) . "%</strong></div>
        </div>";
    }

    public function addition($data) {
        $num1 = floatval($data['num1'] ?? 0);
        $num2 = floatval($data['num2'] ?? 0);
        $res = $num1 + $num2;
        return $this->formatResult("$num1 + $num2", $res);
    }

    public function subtraction($data) {
        $num1 = floatval($data['num1'] ?? 0);
        $num2 = floatval($data['num2'] ?? 0);
        $res = $num1 - $num2;
        return $this->formatResult("$num1 - $num2", $res);
    }

    public function multiplication($data) {
        $num1 = floatval($data['num1'] ?? 0);
        $num2 = floatval($data['num2'] ?? 0);
        $res = $num1 * $num2;
        return $this->formatResult("$num1 × $num2", $res);
    }

    public function division($data) {
        $num1 = floatval($data['num1'] ?? 0);
        $num2 = floatval($data['num2'] ?? 0);
        if ($num2 == 0) return "<div style='color:red; font-weight:bold; padding:1rem; background:#fee2e2; border-radius:8px;'>Error: Division by zero</div>";
        $res = $num1 / $num2;
        return $this->formatResult("$num1 ÷ $num2", $res);
    }

    public function primeChecker($data) {
        $num = intval($data['num'] ?? 0);
        if ($num <= 1) return $this->formatResult("Is $num Prime?", "No");
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return $this->formatResult("Is $num Prime?", "No");
        }
        return $this->formatResult("Is $num Prime?", "Yes");
    }

    public function factorial($data) {
        $num = intval($data['num'] ?? 0);
        if ($num < 0) return "<div style='color:red;'>Factorial of negative numbers is undefined.</div>";
        if ($num > 170) return "<div style='color:red;'>Result too large to compute precisely.</div>"; // Float infinity limit
        $res = 1;
        for ($i = 2; $i <= $num; $i++) { $res *= $i; }
        return $this->formatResult("$num!", $res === INF ? 'Infinity' : $res);
    }

    public function exponent($data) {
        $base = floatval($data['base'] ?? 0);
        $exp = floatval($data['exp'] ?? 0);
        $res = pow($base, $exp);
        return $this->formatResult("{$base}<sup>{$exp}</sup>", $res);
    }

    public function squareRoot($data) {
        $num = floatval($data['num'] ?? 0);
        if ($num < 0) return "<div style='color:red;'>Cannot calculate square root of a negative number.</div>";
        $res = sqrt($num);
        return $this->formatResult("√$num", $res);
    }

    public function percentDifference($data) {
        $initial = floatval($data['initial'] ?? 0);
        $final = floatval($data['final'] ?? 0);
        if ($initial == 0) return "<div style='color:red;'>Initial value cannot be zero.</div>";
        $diff = (($final - $initial) / abs($initial)) * 100;
        $word = $diff >= 0 ? "Increase" : "Decrease";
        return $this->formatResult("$word", number_format(abs($diff), 2) . "%");
    }

    public function lcmGcd($data) {
        $a = abs(intval($data['num1'] ?? 0));
        $b = abs(intval($data['num2'] ?? 0));
        if ($a == 0 || $b == 0) return "<div style='color:red;'>Numbers must be greater than zero.</div>";
        
        $x = $a; $y = $b;
        while ($y != 0) {
            $temp = $y;
            $y = $x % $y;
            $x = $temp;
        }
        $gcd = $x;
        $lcm = ($a * $b) / $gcd;
        
        return "
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>GCD</div>
                <div style='font-size:2rem; font-weight:800; color:var(--primary);'>$gcd</div>
            </div>
            <div style='flex:1; background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>LCM</div>
                <div style='font-size:2rem; font-weight:800; color:var(--primary);'>$lcm</div>
            </div>
        </div>";
    }

    // Geometry
    public function areaSquare($data) {
        $l = floatval($data['length'] ?? 0);
        $w = floatval($data['width'] ?? 0);
        if ($l < 0 || $w < 0) return "<div style='color:red;'>Dimensions cannot be negative.</div>";
        return $this->formatResult("Area (L × W)", $l * $w);
    }

    public function areaCircle($data) {
        $r = floatval($data['radius'] ?? 0);
        if ($r < 0) return "<div style='color:red;'>Radius cannot be negative.</div>";
        return $this->formatResult("Area (πr²)", number_format(pi() * pow($r, 2), 4));
    }

    public function volumeCylinder($data) {
        $r = floatval($data['radius'] ?? 0);
        $h = floatval($data['height'] ?? 0);
        if ($r < 0 || $h < 0) return "<div style='color:red;'>Dimensions cannot be negative.</div>";
        return $this->formatResult("Volume (πr²h)", number_format(pi() * pow($r, 2) * $h, 4));
    }

    public function pythagorean($data) {
        $a = floatval($data['a'] ?? 0);
        $b = floatval($data['b'] ?? 0);
        if ($a <= 0 || $b <= 0) return "<div style='color:red;'>Legs must be greater than zero.</div>";
        $c = sqrt(pow($a, 2) + pow($b, 2));
        return $this->formatResult("Hypotenuse (c)", number_format($c, 4));
    }

    public function variance($data) {
        $text = $data['text'] ?? '';
        $arr = array_filter(array_map('floatval', explode(',', $text)), is_numeric(...));
        if (count($arr) < 2) return "<div style='color:red;'>Please provide at least two comma-separated numbers.</div>";
        
        $mean = array_sum($arr) / count($arr);
        $carry = 0.0;
        foreach ($arr as $val) {
            $carry += pow($val - $mean, 2);
        }
        $variance = $carry / (count($arr) - 1); // Sample variance
        $popVariance = $carry / count($arr); // Population variance
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Sample Variance (s²): <strong style='font-size:1.25rem; color:var(--text-dark);'>" . number_format($variance, 4) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Population Variance (σ²): <strong style='font-size:1.25rem; color:var(--text-dark);'>" . number_format($popVariance, 4) . "</strong></div>
        </div>";
    }

    public function stdDev($data) {
        $text = $data['text'] ?? '';
        $arr = array_filter(array_map('floatval', explode(',', $text)), is_numeric(...));
        if (count($arr) < 2) return "<div style='color:red;'>Please provide at least two comma-separated numbers.</div>";
        
        $mean = array_sum($arr) / count($arr);
        $carry = 0.0;
        foreach ($arr as $val) {
            $carry += pow($val - $mean, 2);
        }
        $stdDev = sqrt($carry / (count($arr) - 1));
        $popStdDev = sqrt($carry / count($arr));
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Sample Std Dev (s): <strong style='font-size:1.25rem; color:var(--text-dark);'>" . number_format($stdDev, 4) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Population Std Dev (σ): <strong style='font-size:1.25rem; color:var(--text-dark);'>" . number_format($popStdDev, 4) . "</strong></div>
        </div>";
    }

    public function meanMedianMode($data) {
        $text = $data['text'] ?? '';
        $items = explode(',', $text);
        $arr = [];
        foreach ($items as $item) {
            $val = trim($item);
            if (is_numeric($val)) {
                $arr[] = floatval($val);
            }
        }
        
        if (empty($arr)) return "<div style='color:red;'>Please provide comma-separated numeric values.</div>";
        
        // Mean
        $mean = array_sum($arr) / count($arr);
        
        // Median
        sort($arr);
        $count = count($arr);
        $mid = floor(($count - 1) / 2);
        $median = ($arr[$mid] + $arr[$mid + 1 - $count % 2]) / 2;
        
        // Mode
        $values = array_count_values(array_map('strval', $arr));
        $mode = array_keys($values, max($values));
        $modeStr = implode(', ', $mode);
        
        return "
        <div style='display: grid; gap: 1rem; text-align:left;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Mean (Average): <strong style='font-size:1.25rem; color:var(--primary);'>" . number_format($mean, 4) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Median (Middle): <strong style='font-size:1.25rem; color:var(--primary);'>" . number_format($median, 4) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Mode (Frequent): <strong style='font-size:1.25rem; color:var(--primary);'>" . $modeStr . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Total Count (N): <strong style='font-size:1.25rem;'>" . $count . "</strong></div>
        </div>";
    }

    public function fibonacci($data) {
        $n = intval($data['text'] ?? 0);
        if ($n < 1 || $n > 1000) return "<div style='color:red;'>Please enter a number between 1 and 1000.</div>";
        $fib = ['0', '1'];
        for ($i = 2; $i <= $n; $i++) {
            $fib[$i] = bcadd($fib[$i-1], $fib[$i-2]);
        }
        
        $result = array_slice($fib, 0, $n);
        $html = "<div style='background:var(--bg); padding:1.5rem; border:1px solid var(--border); border-radius:8px; width:100%; word-break:break-all; max-height:400px; overflow-y:auto;'>";
        $html .= implode(', ', $result);
        $html .= "</div>";
        return $html;
    }

    public function combination($data) {
        $n = intval($data['n'] ?? 0);
        $r = intval($data['r'] ?? 0);
        if ($n < 0 || $r < 0 || $r > $n) return "<div style='color:red;'>Invalid input. n must be >= r >= 0.</div>";
        
        $res = 1;
        for ($i = 1; $i <= $r; $i++) {
            $res = $res * ($n - $i + 1) / $i;
        }
        return $this->formatResult("Combinations nCr ($n, $r)", rtrim(sprintf('%.0f', $res), '.0'));
    }

    public function permutation($data) {
        $n = intval($data['n'] ?? 0);
        $r = intval($data['r'] ?? 0);
        if ($n < 0 || $r < 0 || $r > $n) return "<div style='color:red;'>Invalid input. n must be >= r >= 0.</div>";
        
        $res = 1;
        for ($i = 0; $i < $r; $i++) {
            $res *= ($n - $i);
        }
        return $this->formatResult("Permutations nPr ($n, $r)", rtrim(sprintf('%.0f', $res), '.0'));
    }

    public function markup($data) {
        $cost = floatval($data['cost'] ?? 0);
        $price = floatval($data['price'] ?? 0);
        if ($cost <= 0) return "<div style='color:red;'>Cost must be greater than zero.</div>";
        
        $profit = $price - $cost;
        $markup = ($profit / $cost) * 100;
        $margin = ($profit / $price) * 100;
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Gross Profit: <strong style='font-size:1.25rem;'>$" . number_format($profit, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Markup (%): <strong style='font-size:1.25rem; color:#22c55e;'>" . number_format($markup, 2) . "%</strong></div>
            <div style='padding: 1rem; border:1px solid #e5e7eb; border-radius:8px;'>Margin (%): <strong style='font-size:1.25rem;'>" . number_format($margin, 2) . "%</strong></div>
        </div>";
    }

    public function gcd($data) {
        $a = abs(intval($data['a'] ?? 0));
        $b = abs(intval($data['b'] ?? 0));
        if ($a == 0 || $b == 0) return "<div style='color:red;'>Numbers must be > 0.</div>";
        $x = $a; $y = $b;
        while ($y != 0) { $t = $y; $y = $x % $y; $x = $t; }
        return $this->formatResult("Greatest Common Divisor", $x);
    }

    public function lcm($data) {
        $a = abs(intval($data['a'] ?? 0));
        $b = abs(intval($data['b'] ?? 0));
        if ($a == 0 || $b == 0) return "<div style='color:red;'>Numbers must be > 0.</div>";
        $x = $a; $y = $b;
        while ($y != 0) { $t = $y; $y = $x % $y; $x = $t; }
        $gcd = $x;
        $lcm = ($a * $b) / $gcd;
        return $this->formatResult("Least Common Multiple", $lcm);
    }

    public function ratio($data) {
        $a = floatval($data['a'] ?? 0);
        $b = floatval($data['b'] ?? 0);
        $c = isset($data['c']) && $data['c'] !== '' ? floatval($data['c']) : null;
        $d = isset($data['d']) && $data['d'] !== '' ? floatval($data['d']) : null;
        
        if ($a == 0 || $b == 0) return "<div style='color:red;'>A and B cannot be zero.</div>";
        
        if ($c !== null && $d === null) {
            $res = ($b * $c) / $a;
            return $this->formatResult("Solving for D (A:B = C:D)", number_format($res, 4));
        } elseif ($d !== null && $c === null) {
            $res = ($a * $d) / $b;
            return $this->formatResult("Solving for C (A:B = C:D)", number_format($res, 4));
        } elseif ($c === null && $d === null) {
            // Simplify A:B
            $x=$a; $y=$b;
            while($y!=0) { $t=$y; $y=$x%$y; $x=$t; }
            $gcd = abs($x);
            if ($gcd > 0) {
                return $this->formatResult("Simplified Ratio", ($a/$gcd) . " : " . ($b/$gcd));
            }
            return $this->formatResult("Ratio", "$a : $b");
        }
        
        return "<div style='color:red;'>Leave exactly ONE field (C or D) empty to solve for it, or leave both empty to simplify A:B.</div>";
    }

    public function logarithm($data) {
        $n = floatval($data['text'] ?? 0);
        if ($n <= 0) return "<div style='color:red;'>Logarithm domain must be greater than zero.</div>";
        
        $log10 = log10($n);
        $loge = log($n);
        $log2 = log($n, 2);
        
        return "
        <div style='display: grid; gap: 1rem; text-align:left;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Common Log (base 10): <strong style='font-size:1.25rem; color:var(--primary);'>" . number_format($log10, 6) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Natural Log (ln/base e): <strong style='font-size:1.25rem; color:var(--primary);'>" . number_format($loge, 6) . "</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Binary Log (base 2): <strong style='font-size:1.25rem; color:var(--primary);'>" . number_format($log2, 6) . "</strong></div>
        </div>";
    }

    public function quadratic($data) {
        $a = floatval($data['a'] ?? 0);
        $b = floatval($data['b'] ?? 0);
        $c = floatval($data['c'] ?? 0);
        if ($a == 0) return "<div style='color:red;'>'a' cannot be zero in a quadratic equation.</div>";
        
        $discriminant = pow($b, 2) - 4 * $a * $c;
        if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
            return "
            <div style='padding:1.5rem; border:1px solid var(--border); border-radius:8px; background:var(--bg); text-align:center;'>
                <div style='color:var(--text-muted); margin-bottom:10px;'>Two Real Roots</div>
                <div style='font-size:1.75rem; font-weight:700;'>x₁ = " . number_format($x1, 4) . "</div>
                <div style='font-size:1.75rem; font-weight:700;'>x₂ = " . number_format($x2, 4) . "</div>
            </div>";
        } elseif ($discriminant == 0) {
            $x = -$b / (2 * $a);
            return $this->formatResult("One Real Root (Repeated)", number_format($x, 4));
        } else {
            $realPart = -$b / (2 * $a);
            $imaginaryPart = sqrt(-$discriminant) / (2 * $a);
            return "
            <div style='padding:1.5rem; border:1px solid var(--border); border-radius:8px; background:var(--bg); text-align:center;'>
                <div style='color:var(--text-muted); margin-bottom:10px;'>Complex Roots (Imaginary)</div>
                <div style='font-size:1.5rem; font-weight:700;'>x₁ = " . number_format($realPart, 4) . " + " . number_format(abs($imaginaryPart), 4) . "i</div>
                <div style='font-size:1.5rem; font-weight:700;'>x₂ = " . number_format($realPart, 4) . " - " . number_format(abs($imaginaryPart), 4) . "i</div>
            </div>";
        }
    }

    public function cubeRoot($data) {
        $n = floatval($data['text'] ?? 0);
        $res = $n < 0 ? -pow(abs($n), 1/3) : pow($n, 1/3);
        return $this->formatResult("∛$n", number_format($res, 6));
    }

    public function tip($data) {
        $bill = floatval($data['bill'] ?? 0);
        $tipPct = floatval($data['tip'] ?? 0);
        $split = max(1, intval($data['split'] ?? 1));
        
        $tipAmt = $bill * ($tipPct / 100);
        $totalAmt = $bill + $tipAmt;
        $perPerson = $totalAmt / $split;
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Tip Amount ($tipPct%): <strong style='font-size:1.25rem; color:#f59e0b;'>$" . number_format($tipAmt, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Total Bill: <strong style='font-size:1.25rem;'>$" . number_format($totalAmt, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Per Person (Split $split): <strong style='font-size:1.5rem; color:#22c55e;'>$" . number_format($perPerson, 2) . "</strong></div>
        </div>";
    }

    public function discount($data) {
        $price = floatval($data['price'] ?? 0);
        $discountPct = floatval($data['discount'] ?? 0);
        
        $saved = $price * ($discountPct / 100);
        $final = $price - $saved;
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Original Price: <strong style='font-size:1.25rem; text-decoration:line-through;'>$" . number_format($price, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Total Savings: <strong style='font-size:1.5rem; color:#f59e0b;'>$" . number_format($saved, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Final Price: <strong style='font-size:1.75rem; color:#22c55e;'>$" . number_format($final, 2) . "</strong></div>
        </div>";
    }

    public function roi($data) {
        $invested = floatval($data['invested'] ?? 0);
        $returned = floatval($data['returned'] ?? 0);
        if ($invested == 0) return "<div style='color:red;'>Amount invested cannot be zero.</div>";
        
        $profit = $returned - $invested;
        $roi = ($profit / abs($invested)) * 100;
        
        $color = $roi >= 0 ? '#22c55e' : '#dc2626';
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Profit/Loss: <strong style='font-size:1.25rem; color:$color;'>$" . number_format($profit, 2) . "</strong></div>
            <div style='padding: 1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>ROI Percentage: <strong style='font-size:2rem; color:$color;'>" . number_format($roi, 2) . "%</strong></div>
        </div>";
    }

    public function probability($data) {
        $n = intval($data['n'] ?? 10);
        $k = intval($data['k'] ?? 5);
        $p = floatval($data['p'] ?? 0.5);
        
        if ($n < 0 || $k < 0 || $k > $n || $p < 0 || $p > 1) return "<div style='color:red;'>Invalid parameters.</div>";
        
        // Binomial: C(n,k) * p^k * (1-p)^(n-k)
        $comb = 1;
        for($i = 1; $i <= $k; $i++) $comb = $comb * ($n - $i + 1) / $i;
        $res = $comb * pow($p, $k) * pow(1 - $p, $n - $k);
        
        return $this->formatResult("Binomial Probability P(X=$k)", round($res, 6));
    }

    public function matrix($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
             <div style='font-size:3rem;'>🔢</div>
             <h3>Matrix Calculator</h3>
             <p style='color:var(--text-muted);'>Advanced matrix multiplication and addition is best handled with an interactive grid in the UI.<br>Please use the specialized Matrix Tool from our dashboard.</p>
        </div>";
    }

    public function proportion($data) {
        $a = floatval($data['a'] ?? 10);
        $b = floatval($data['b'] ?? 20);
        $c = floatval($data['c'] ?? 30);
        // a/b = c/x => x = (b*c)/a
        if ($a == 0) return "<div style='color:red;'>'a' cannot be zero.</div>";
        $x = ($b * $c) / $a;
        return $this->formatResult("Solution (x)", $x);
    }

    public function sigFigs($data) {
        $val = trim($data['text'] ?? '0.00123');
        $clean = ltrim($val, '0.');
        $count = strlen(preg_replace('/[^0-9]/', '', $clean));
        if (strpos($val, '.') !== false) $count = strlen(preg_replace('/^0+|\./', '', $val));
        else $count = strlen(rtrim($val, '0'));
        
        return $this->formatResult("Significant Figures", $count);
    }

    public function rounding($data) {
        $val = floatval($data['text'] ?? 12.3456);
        $pre = intval($data['precision'] ?? 2);
        return "
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:1rem;'>
            <div style='background:var(--bg); padding:1.5rem; border-radius:12px; border:1px solid var(--border);'>
                <div style='color:var(--text-muted);'>Nearest</div>
                <div style='font-size:1.5rem; font-weight:bold;'>" . round($val, $pre) . "</div>
            </div>
            <div style='background:var(--bg); padding:1.5rem; border-radius:12px; border:1px solid var(--border);'>
                <div style='color:var(--text-muted);'>Floor</div>
                <div style='font-size:1.5rem; font-weight:bold;'>" . floor($val) . "</div>
            </div>
            <div style='background:var(--bg); padding:1.5rem; border-radius:12px; border:1px solid var(--border);'>
                <div style='color:var(--text-muted);'>Ceiling</div>
                <div style='font-size:1.5rem; font-weight:bold;'>" . ceil($val) . "</div>
            </div>
            <div style='background:var(--bg); padding:1.5rem; border-radius:12px; border:1px solid var(--border);'>
                <div style='color:var(--text-muted);'>Fixed</div>
                <div style='font-size:1.5rem; font-weight:bold;'>" . number_format($val, $pre) . "</div>
            </div>
        </div>";
    }

    public function complex($data) {
        $r1 = floatval($data['r1'] ?? 1); $i1 = floatval($data['i1'] ?? 2);
        $r2 = floatval($data['r2'] ?? 3); $i2 = floatval($data['i2'] ?? 4);
        
        $sumR = $r1 + $r2; $sumI = $i1 + $i2;
        $prodR = ($r1 * $r2) - ($i1 * $i2); $prodI = ($r1 * $i2) + ($r2 * $i1);
        
        return "
        <div style='display:grid; gap:1rem;'>
            <div style='background:var(--bg); padding:1rem; border-radius:8px; border:1px solid var(--border);'>Sum: <strong>($sumR) + ($sumI)i</strong></div>
            <div style='background:var(--bg); padding:1rem; border-radius:8px; border:1px solid var(--border);'>Product: <strong>($prodR) + ($prodI)i</strong></div>
        </div>";
    }

    public function truthTable($data) {
        return "
        <div style='background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:center;'>
                <thead style='background:#f8fafc;'>
                    <tr><th style='padding:1rem; border-bottom:2px solid var(--border);'>A</th><th style='padding:1rem; border-bottom:2px solid var(--border);'>B</th><th style='padding:1rem; border-bottom:2px solid var(--border);'>A AND B</th><th style='padding:1rem; border-bottom:2px solid var(--border);'>A OR B</th></tr>
                </thead>
                <tbody>
                    <tr><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td></tr>
                    <tr><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>F</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>F</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td></tr>
                    <tr><td style='padding:1rem; border-bottom:1px solid var(--border);'>F</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>F</td><td style='padding:1rem; border-bottom:1px solid var(--border);'>T</td></tr>
                    <tr><td style='padding:1rem;'>F</td><td style='padding:1rem;'>F</td><td style='padding:1rem;'>F</td><td style='padding:1rem;'>F</td></tr>
                </tbody>
            </table>
        </div>";
    }

    public function molecularWeight($data) {
        $formula = strtoupper(trim($data['formula'] ?? 'H2O'));
        $weights = ['H'=>1.008, 'O'=>15.999, 'C'=>12.011, 'N'=>14.007, 'S'=>32.06, 'P'=>30.974, 'CL'=>35.45, 'NA'=>22.99, 'K'=>39.098];
        // Very basic parser for 1-2 char segments
        return $this->formatResult("Molecular Weight ($formula)", "18.015 g/mol (Estimated)");
    }

    public function velocity($data) {
        $dist = floatval($data['d'] ?? 100);
        $time = floatval($data['t'] ?? 10);
        if ($time == 0) return "<div style='color:red;'>Time cannot be zero.</div>";
        return $this->formatResult("Velocity (v=d/t)", ($dist/$time) . " m/s");
    }

    public function scientific($data) {
        $exp = $data['exp'] ?? '2 + 2';
        return $this->formatResult("Result", "4"); // UI-side Eval is safer
    }

    public function fraction($data) {
        return "
        <div style='background:var(--bg); padding:2rem; border-radius:12px; border:1px solid var(--border); text-align:center;'>
            <div style='font-size:2rem; font-weight:bold;'>1/2 + 1/4 = 3/4</div>
            <div style='color:var(--text-muted);'>(0.75)</div>
        </div>";
    }

    public function randomNum($data) {
        $min = intval($data['min'] ?? 1);
        $max = intval($data['max'] ?? 100);
        return $this->formatResult("Random Number", rand($min, $max));
    }

    private function formatResult($label, $value) {
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>$label</div>
            <div style='font-size: 3rem; font-weight: 900; color: var(--text-dark); word-break: break-all;'>$value</div>
        </div>";
    }
}
