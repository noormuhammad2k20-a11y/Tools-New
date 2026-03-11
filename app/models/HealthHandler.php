<?php

class HealthHandler extends Model {
    
    public function bmr($data) {
        $gender = strtolower(substr(trim($data['gender'] ?? 'm'), 0, 1));
        $age = intval($data['age'] ?? 0);
        $weight = floatval($data['weight'] ?? 0); // kg
        $height = floatval($data['height'] ?? 0); // cm
        
        if ($age <= 0 || $weight <= 0 || $height <= 0 || !in_array($gender, ['m', 'f'])) {
            return "<div style='color:red;'>Invalid biological inputs.</div>";
        }

        // Mifflin-St Jeor Equation
        $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age);
        $bmr += ($gender === 'm') ? 5 : -161;
        
        return $this->formatHealthResult("Basal Metabolic Rate", number_format($bmr, 0), "Calories/Day");
    }

    public function tdee($data) {
        $bmr = floatval($data['bmr'] ?? 0);
        $activity = floatval($data['activity'] ?? 1.2);
        
        if ($bmr <= 0 || $activity < 1.0) return "<div style='color:red;'>Invalid BMR or Activity multiplier.</div>";
        
        $tdee = $bmr * $activity;
        
        return $this->formatHealthResult("Total Daily Energy Expenditure", number_format($tdee, 0), "Calories required to maintain weight");
    }

    public function bodyFat($data) {
        $gender = strtolower(substr(trim($data['gender'] ?? 'm'), 0, 1));
        $height = floatval($data['height'] ?? 0);
        $neck = floatval($data['neck'] ?? 0);
        $waist = floatval($data['waist'] ?? 0);
        $hip = floatval($data['hip'] ?? 0);
        
        if ($height <= 0 || $neck <= 0 || $waist <= 0 || !in_array($gender, ['m', 'f'])) {
            return "<div style='color:red;'>Invalid body measurements.</div>";
        }
        
        // US Navy formula metric variant
        if ($gender === 'm') {
            if ($waist - $neck <= 0) return "<div style='color:red;'>Waist must be larger than neck.</div>";
            $bfp = 495 / (1.0324 - 0.19077 * log10($waist - $neck) + 0.15456 * log10($height)) - 450;
        } else {
            if ($waist + $hip - $neck <= 0 || $hip <= 0) return "<div style='color:red;'>Invalid female hip/waist/neck ratio inputs.</div>";
            $bfp = 495 / (1.29579 - 0.35004 * log10($waist + $hip - $neck) + 0.22100 * log10($height)) - 450;
        }
        
        // Sanity clamp
        $bfp = max(2, min(65, $bfp));
        
        $category = "Average";
        if ($gender === 'm') {
            if ($bfp < 6) $category = "Essential Fat";
            else if ($bfp <= 13) $category = "Athletes";
            else if ($bfp <= 17) $category = "Fitness";
            else if ($bfp <= 24) $category = "Average";
            else $category = "Obese";
        } else {
            if ($bfp < 14) $category = "Essential Fat";
            else if ($bfp <= 20) $category = "Athletes";
            else if ($bfp <= 24) $category = "Fitness";
            else if ($bfp <= 31) $category = "Average";
            else $category = "Obese";
        }

        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>Estimated Body Fat Ratio</div>
            <div style='font-size: 4rem; font-weight: 900; color: var(--primary);'>" . number_format($bfp, 1) . "%</div>
        </div>
        <div style='background:#fef2f2; padding:1.5rem; border-radius:8px; border:1px solid #fecaca; text-align:center;'>
            <div style='font-size:0.875rem; color:#991b1b; text-transform:uppercase;'>Categorization</div>
            <div style='font-size:1.5rem; font-weight:800; color:#dc2626;'>$category</div>
        </div>";
    }

    public function ibw($data) {
        $gender = strtolower(substr(trim($data['gender'] ?? 'm'), 0, 1));
        $heightCm = floatval($data['height'] ?? 0);
        
        if ($heightCm < 152.4 || !in_array($gender, ['m', 'f'])) return "<div style='color:red;'>Height must be over 152.4cm (5 feet) for J.D. Robinson formula.</div>";
        
        // J.D. Robinson Formula (1983)
        $inchesOver5ft = ($heightCm - 152.4) / 2.54;
        
        if ($gender === 'm') {
            $ibw = 52 + (1.9 * $inchesOver5ft);
        } else {
            $ibw = 49 + (1.7 * $inchesOver5ft);
        }
        
        $lbs = $ibw * 2.20462;
        
        return "
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Ideal Weight (kg)</div>
                <div style='font-size:2rem; font-weight:800; color:var(--primary);'>" . number_format($ibw, 1) . "</div>
            </div>
            <div style='flex:1; background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Ideal Weight (lbs)</div>
                <div style='font-size:2rem; font-weight:800; color:var(--primary);'>" . number_format($lbs, 1) . "</div>
            </div>
        </div>";
    }

    public function calorieNeeds($data) {
        $tdee = floatval($data['tdee'] ?? 0);
        if ($tdee <= 0) return "<div style='color:red;'>Invalid TDEE input.</div>";
        
        $bulk = $tdee + 500;
        $cut = $tdee - 500;
        $extremeCut = $tdee - 1000;
        
        return "
        <table style='width:100%; border-collapse: collapse; text-align:center;'>
            <tr>
                <th style='padding:1rem; border-bottom:2px solid var(--border); width:33%; color:#166534;'>Mild Bulking (+0.5kg/wk)</th>
                <th style='padding:1rem; border-bottom:2px solid var(--border); width:33%; color:#1e293b;'>Maintenance</th>
                <th style='padding:1rem; border-bottom:2px solid var(--border); width:33%; color:#991b1b;'>Cutting Phase (-0.5kg/wk)</th>
            </tr>
            <tr>
                <td style='padding:1.5rem; font-size:1.5rem; font-weight:bold; color:#15803d; border-right:1px solid var(--border);'>" . number_format($bulk, 0) . "</td>
                <td style='padding:1.5rem; font-size:1.5rem; font-weight:bold; color:var(--text-dark); border-right:1px solid var(--border);'>" . number_format($tdee, 0) . "</td>
                <td style='padding:1.5rem; font-size:1.5rem; font-weight:bold; color:#dc2626;'>" . number_format($cut, 0) . "</td>
            </tr>
        </table>
        <div style='text-align:center; padding-top:1rem; font-size:0.875rem; color:var(--text-muted);'>*Extreme clinical weight loss limits intake to ~" . number_format($extremeCut, 0) . " calories (-1kg/wk).</div>";
    }

    public function heartRate($data) {
        $age = intval($data['age'] ?? 0);
        if ($age <= 0 || $age > 120) return "<div style='color:red;'>Please enter a valid age.</div>";
        
        $maxHR = 220 - $age;
        
        $moderateLow = $maxHR * 0.50;
        $moderateHigh = $maxHR * 0.70;
        $vigorousHigh = $maxHR * 0.85;
        
        return "
        <div style='background: var(--bg); padding: 1.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>Max Heart Rate (MHR)</div>
            <div style='font-size: 3rem; font-weight: 900; color: var(--text-dark);'>" . number_format($maxHR, 0) . " BPM</div>
        </div>
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:#f0fdf4; padding:1.5rem; border-radius:8px; border:1px solid #bbf7d0; text-align:center;'>
                <div style='font-size:0.875rem; color:#166534;'>Moderate Intensity Target (50-70%)</div>
                <div style='font-size:1.5rem; font-weight:800; color:#15803d;'>" . number_format($moderateLow, 0) . " - " . number_format($moderateHigh, 0) . " BPM</div>
            </div>
            <div style='flex:1; background:#fef2f2; padding:1.5rem; border-radius:8px; border:1px solid #fecaca; text-align:center;'>
                <div style='font-size:0.875rem; color:#991b1b;'>Vigorous Intensity Target (70-85%)</div>
                <div style='font-size:1.5rem; font-weight:800; color:#dc2626;'>" . number_format($moderateHigh, 0) . " - " . number_format($vigorousHigh, 0) . " BPM</div>
            </div>
        </div>";
    }

    public function bmiCalculator($data) {
        $weight = floatval($data['weight'] ?? 0);
        $height = floatval($data['height'] ?? 0) / 100; // to meters
        
        if ($weight <= 0 || $height <= 0) return "<div style='color:red;'>Invalid inputs.</div>";
        
        $bmi = $weight / ($height * $height);
        $category = "Normal Weight";
        $color = "#22c55e";
        
        if ($bmi < 18.5) { $category = "Underweight"; $color = "#3b82f6"; }
        else if ($bmi < 25) { $category = "Normal Weight"; $color = "#22c55e"; }
        else if ($bmi < 30) { $category = "Overweight"; $color = "#eab308"; }
        else { $category = "Obesity"; $color = "#dc2626"; }
        
        return "
        <div style='background: var(--bg); padding: 2.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform:uppercase;'>Your BMI Score</div>
            <div style='font-size: 4rem; font-weight: 900; color: $color;'>" . number_format($bmi, 1) . "</div>
        </div>
        <div style='background: $color; color: white; padding: 1rem; border-radius: 8px; text-align: center; font-weight: bold; font-size: 1.25rem;'>
            $category
        </div>";
    }

    public function macros($data) {
        $cal = floatval($data['calories'] ?? 0);
        $goal = $data['goal'] ?? 'balanced';
        
        if ($cal <= 0) return "<div style='color:red;'>Calories must be greater than zero.</div>";
        
        $ratios = [
            'balanced' => ['p'=>0.30, 'c'=>0.40, 'f'=>0.30],
            'low-carb' => ['p'=>0.40, 'c'=>0.20, 'f'=>0.40],
            'high-protein' => ['p'=>0.40, 'c'=>0.40, 'f'=>0.20],
            'keto' => ['p'=>0.25, 'c'=>0.05, 'f'=>0.70]
        ];
        
        $r = $ratios[$goal] ?? $ratios['balanced'];
        
        $p_g = ($cal * $r['p']) / 4;
        $c_g = ($cal * $r['c']) / 4;
        $f_g = ($cal * $r['f']) / 9;
        
        return "
        <div style='display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;'>
            <div style='background:#fefce8; border:1px solid #fef08a; padding:1.5rem; border-radius:8px; text-align:center;'>
                <div style='color:#854d0e; font-size:0.875rem;'>Protein</div>
                <div style='font-size:1.5rem; font-weight:bold; color:#a16207;'>" . number_format($p_g, 0) . "g</div>
                <div style='font-size:0.75rem; color:#a16207;'>" . ($r['p']*100) . "%</div>
            </div>
            <div style='background:#f0f9ff; border:1px solid #bae6fd; padding:1.5rem; border-radius:8px; text-align:center;'>
                <div style='color:#075985; font-size:0.875rem;'>Carbohydrates</div>
                <div style='font-size:1.5rem; font-weight:bold; color:#0369a1;'>" . number_format($c_g, 0) . "g</div>
                <div style='font-size:0.75rem; color:#0369a1;'>" . ($r['c']*100) . "%</div>
            </div>
            <div style='background:#fdf2f8; border:1px solid #fbcfe8; padding:1.5rem; border-radius:8px; text-align:center;'>
                <div style='color:#9d174d; font-size:0.875rem;'>Fats</div>
                <div style='font-size:1.5rem; font-weight:bold; color:#be185d;'>" . number_format($f_g, 0) . "g</div>
                <div style='font-size:0.75rem; color:#be185d;'>" . ($r['f']*100) . "%</div>
            </div>
        </div>";
    }

    public function waterIntake($data) {
        $weight = floatval($data['weight'] ?? 0);
        if ($weight <= 0) return "<div style='color:red;'>Invalid weight.</div>";
        
        $liters = $weight * 0.033;
        $glasses = $liters / 0.250; // 250ml glasses
        
        return $this->formatHealthResult("Recommended Daily Water", number_format($liters, 1), "Liters", "Approximately " . ceil($glasses) . " glasses (250ml each)");
    }

    public function pregnancyDue($data) {
        $lmp = $data['last_period'] ?? '';
        if (empty($lmp)) return '';
        
        $date = new DateTime($lmp);
        $date->modify('+280 days'); // Naegele's rule approx
        
        return $this->formatHealthResult("Estimated Due Date", $date->format('M d, Y'), '', "Based on average pregnancy duration (280 days)");
    }

    public function bac($data) {
        $weight = floatval($data['weight'] ?? 0);
        $drinks = floatval($data['drinks'] ?? 0);
        $hours = floatval($data['hours'] ?? 0);
        $gender = $data['gender'] ?? 'm';
        
        if ($weight <= 0) return '';
        
        $r = ($gender === 'm') ? 0.68 : 0.55; // Widmark factor
        $alcohol_grams = $drinks * 14; // 14g alcohol per standard drink
        
        $bac = ($alcohol_grams / ($weight * 1000 * $r)) * 100;
        $bac -= ($hours * 0.015); // metabolism rate
        $bac = max(0, $bac);
        
        $color = $bac < 0.05 ? "#22c55e" : ($bac < 0.08 ? "#eab308" : "#dc2626");
        
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>Estimated BAC Level</div>
            <div style='font-size: 4rem; font-weight: 900; color: $color;'>" . number_format($bac, 3) . "%</div>
        </div>
        <div style='text-align:center; font-size:0.875rem; color:var(--text-muted);'>Disclaimer: This is a mathematical estimation only. Alcohol tolerance and metabolism vary significantly by individual. Never drink and drive.</div>";
    }

    public function bloodDonation($data) {
        $last = $data['last_donation'] ?? '';
        if (empty($last)) return '';
        
        $date = new DateTime($last);
        $date->modify('+56 days'); // Whole blood donation frequency (8 weeks)
        
        $today = new DateTime();
        $diff = $today->diff($date);
        
        if ($today >= $date) {
            return "<div style='background:#f0fdf4; border:1px solid #bbf7d0; padding:2rem; border-radius:12px; text-align:center;'>
                <div style='font-size:1.5rem; font-weight:bold; color:#15803d;'>ELIGIBLE NOW</div>
                <div style='color:#166534; margin-top:0.5rem;'>It has been over 56 days since your last donation.</div>
            </div>";
        } else {
            return $this->formatHealthResult("Next Eligibility Date", $date->format('M d, Y'), '', "In " . $diff->days . " days");
        }
    }

    public function ovulation($data) {
        $last = $data['last_period'] ?? '';
        $cycle = intval($data['cycle_length'] ?? 28);
        if (empty($last)) return '';
        
        $base = new DateTime($last);
        $ovulation = clone $base;
        $ovulation->modify('+' . ($cycle - 14) . ' days');
        
        $windowStart = clone $ovulation;
        $windowStart->modify('-3 days');
        $windowEnd = clone $ovulation;
        $windowEnd->modify('+1 day');
        
        return "
        <div style='background:#fff7ed; border:1px solid #ffedd1; padding:2rem; border-radius:12px; text-align:center; margin-bottom:1rem;'>
            <div style='font-size:0.875rem; color:#9a3412;'>Estimated Ovulation Date</div>
            <div style='font-size:2.5rem; font-weight:900; color:#c2410c;'>" . $ovulation->format('M d, Y') . "</div>
        </div>
        <div style='background:#f0f9ff; border:1px solid #e0f2fe; padding:1.5rem; border-radius:8px; text-align:center;'>
            <div style='color:#0369a1; font-weight:bold;'>Fertile Window</div>
            <div style='color:#0c4a6e; font-size:1.1rem;'>" . $windowStart->format('M d') . " - " . $windowEnd->format('M d') . "</div>
        </div>";
    }

    public function runningPace($data) {
        $dist = floatval($data['distance'] ?? 0);
        $min = floatval($data['time_min'] ?? 0);
        $unit = $data['unit'] ?? 'km';
        
        if ($dist <= 0 || $min <= 0) return '';
        
        $pace_raw = $min / $dist;
        $pace_min = floor($pace_raw);
        $pace_sec = round(($pace_raw - $pace_min) * 60);
        
        return $this->formatHealthResult("Average Pace", $pace_min . ":" . str_pad($pace_sec, 2, '0', STR_PAD_LEFT), "min/$unit");
    }

    public function oneRepMax($data) {
        $w = floatval($data['weight'] ?? 0);
        $r = intval($data['reps'] ?? 0);
        
        if ($w <= 0 || $r <= 0) return '';
        
        // Epley formula
        $orm = $w * (1 + ($r / 30));
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
             <div style='color:var(--text-muted); text-transform:uppercase;'>Estimated One-Rep Max</div>
             <div style='font-size:4rem; font-weight:900; color:var(--primary);'>" . number_format($orm, 1) . "</div>
             <div style='margin-top:1rem; display:grid; grid-template-columns:1fr 1fr 1fr; gap:0.5rem;'>
                <div style='font-size:0.75rem; color:var(--text-muted);'>90%: " . number_format($orm*0.9, 1) . "</div>
                <div style='font-size:0.75rem; color:var(--text-muted);'>80%: " . number_format($orm*0.8, 1) . "</div>
                <div style='font-size:0.75rem; color:var(--text-muted);'>70%: " . number_format($orm*0.7, 1) . "</div>
             </div>
        </div>";
    }

    public function rmr($data) {
        return $this->bmr($data); // RMR and BMR use the same core Mifflin-St Jeor equation in modern calculators
    }

    public function waistToHip($data) {
        $w = floatval($data['waist'] ?? 0);
        $h = floatval($data['hip'] ?? 0);
        
        if ($w <= 0 || $h <= 0) return '';
        
        $ratio = $w / $h;
        return $this->formatHealthResult("Waist-to-Hip Ratio", number_format($ratio, 2));
    }

    public function lbm($data) {
        $w = floatval($data['weight'] ?? 0);
        $h = floatval($data['height'] ?? 0);
        $g = $data['gender'] ?? 'm';
        
        if ($w <= 0 || $h <= 0) return '';
        
        // Boer Formula
        if ($g === 'm') {
            $lbm = (0.407 * $w) + (0.267 * $h) - 19.2;
        } else {
            $lbm = (0.252 * $w) + (0.473 * $h) - 48.3;
        }
        
        return $this->formatHealthResult("Estimated Lean Body Mass", number_format($lbm, 1), "kg");
    }

    public function bioAge($data) {
        $age = intval($data['age'] ?? 0);
        $exercise = $data['exercise'] ?? 'none';
        $sleep = floatval($data['sleep'] ?? 8);
        
        if ($age <= 0) return '';
        
        $bioAge = $age;
        if ($exercise === 'none') $bioAge += 2;
        elseif ($exercise === '1-2') $bioAge += 0;
        elseif ($exercise === '3-5') $bioAge -= 2;
        elseif ($exercise === 'daily') $bioAge -= 4;
        
        if ($sleep < 6) $bioAge += 2;
        elseif ($sleep > 9) $bioAge += 1;
        elseif ($sleep >= 7 && $sleep <= 8) $bioAge -= 1;
        
        return "
        <div style='background: linear-gradient(135deg, #fff 0%, #fff7ed 100%); border:1px solid #ffedd1; padding:2rem; border-radius:12px; text-align:center;'>
            <div style='color:#9a3412;'>Your Estimated Biological Age</div>
            <div style='font-size:5rem; font-weight:900; color:#c2410c;'>$bioAge <span style='font-size:1.5rem;'>Years</span></div>
            <div style='margin-top:0.5rem; color:#9a3412;'>Chronological Age: $age</div>
        </div>";
    }

    public function sleepCycle($data) {
        $time = $data['time'] ?? '07:00';
        $mode = $data['mode'] ?? 'wake';
        
        $base = new DateTime($time);
        $cycles = [];
        
        if ($mode === 'wake') {
            // Calculate bedtimes (reverse)
            for ($i = 6; $i >= 3; $i--) {
                $t = clone $base;
                $m = ($i * 90) + 15; // 90 min cycle + 15 min to fall asleep
                $t->modify("-" . $m . " minutes");
                $cycles[] = ['time' => $t->format('h:i A'), 'label' => "$i Cycles"];
            }
        } else {
            // Calculate wake times
            for ($i = 3; $i <= 6; $i++) {
                $t = clone $base;
                $m = ($i * 90) + 15;
                $t->modify("+" . $m . " minutes");
                $cycles[] = ['time' => $t->format('h:i A'), 'label' => "$i Cycles"];
            }
        }
        
        $html = "<div style='text-align:center; margin-bottom:1rem; font-weight:bold;'>" . ($mode === 'wake' ? "You should aim to go to bed at:" : "You should aim to wake up at:") . "</div>";
        $html .= "<div style='display:grid; grid-template-columns:1fr 1fr; gap:0.75rem;'>";
        foreach ($cycles as $c) {
            $html .= "<div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; text-align:center;'>
                <div style='font-size:1.25rem; font-weight:bold; color:var(--primary);'>" . $c['time'] . "</div>
                <div style='font-size:0.75rem; color:var(--text-muted);'>" . $c['label'] . "</div>
            </div>";
        }
        $html .= "</div>";
        return $html;
    }

    private function formatHealthResult($label, $value, $subtext = '') {
        $sub = $subtext ? "<div style='margin-top:0.5rem; font-size:1rem; color:var(--text-muted);'>$subtext</div>" : "";
        return "
        <div style='background: var(--bg); padding: 2.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform:uppercase; font-weight:bold; letter-spacing:1px;'>$label</div>
            <div style='font-size: 4rem; font-weight: 900; color: var(--primary);'>$value</div>
            $sub
        </div>";
    }
}
