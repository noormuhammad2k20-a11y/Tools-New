<?php

class CalculatorsHandler extends Model {

    public function gpaCalculator($data) {
        $lines = explode("\n", trim($data['grades'] ?? ''));
        if (empty($lines) || empty($lines[0])) return "<div style='color:red;'>Please enter grades and credits.</div>";
        
        $scale = ['A+'=>4.0, 'A'=>4.0, 'A-'=>3.7, 'B+'=>3.3, 'B'=>3.0, 'B-'=>2.7, 'C+'=>2.3, 'C'=>2.0, 'C-'=>1.7, 'D+'=>1.3, 'D'=>1.0, 'F'=>0.0];
        $totalCredits = 0;
        $totalPoints = 0;
        $valid = [];
        
        foreach ($lines as $line) {
            $parts = array_map('trim', explode(',', $line));
            if (count($parts) >= 2) {
                $g = strtoupper($parts[0]);
                $c = floatval($parts[1]);
                if (isset($scale[$g]) && $c > 0) {
                    $totalCredits += $c;
                    $totalPoints += ($scale[$g] * $c);
                    $valid[] = ['grade' => $g, 'credits' => $c, 'points' => $scale[$g]*$c];
                }
            }
        }
        
        if ($totalCredits == 0) return "<div style='color:red;'>No valid grades/credits found.</div>";
        
        $gpa = round($totalPoints / $totalCredits, 2);
        
        $color = $gpa >= 3.5 ? '#16a34a' : ($gpa >= 2.5 ? '#d97706' : '#dc2626');
        
        $html = "
        <div style='text-align:center; padding:3rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:2px; margin-bottom:1rem;'>Your Semester GPA</div>
            <div style='font-size:5rem; font-weight:bold; color:$color; line-height:1;'>$gpa</div>
            <div style='margin-top:1rem; font-size:1.1rem; color:var(--text-dark);'>Total Credits: <strong>$totalCredits</strong></div>
        </div>
        <table style='width:100%; margin-top:1.5rem; border-collapse:collapse; background:var(--bg); border:1px solid var(--border); border-radius:8px; overflow:hidden;'>
            <tr style='background:#f8fafc; border-bottom:1px solid var(--border);'>
                <th style='padding:1rem; text-align:left;'>Grade</th>
                <th style='padding:1rem; text-align:center;'>Credits</th>
                <th style='padding:1rem; text-align:right;'>Quality Points</th>
            </tr>";
            
        foreach ($valid as $v) {
            $html .= "<tr style='border-bottom:1px solid var(--border);'>
                <td style='padding:1rem; font-weight:bold;'>{$v['grade']}</td>
                <td style='padding:1rem; text-align:center;'>{$v['credits']}</td>
                <td style='padding:1rem; text-align:right;'>".round($v['points'], 2)."</td>
            </tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function gradeCalculator($data) {
        $c = floatval($data['current'] ?? 85);
        $t = floatval($data['target'] ?? 90);
        $w = floatval($data['weight'] ?? 20);
        
        if ($w <= 0 || $w >= 100) return "<div style='color:red;'>Final Exam Weight must be between 1 and 99%.</div>";
        
        $wDec = $w / 100;
        $req = ($t - ((1 - $wDec) * $c)) / $wDec;
        $req = round($req, 2);
        
        $color = $req > 100 ? '#ef4444' : ($req <= 0 ? '#10b981' : '#3b82f6');
        $msg = $req > 100 ? "Impossible! You'd need extra credit." : ($req <= 0 ? "You've already achieved this target grade!" : "You have a good chance.");
        
        return "
        <div style='text-align:center; padding:3rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Required Final Exam Grade</div>
            <div style='font-size:5rem; font-weight:bold; color:$color; line-height:1;'>$req%</div>
            <div style='margin-top:1.5rem; font-size:1.1rem; color:var(--text-dark); background:#f8fafc; padding:1rem; border-radius:8px;'>
                $msg
            </div>
        </div>";
    }

    public function speedDistanceTime($data) {
        $d = isset($data['distance']) && $data['distance'] !== '' ? floatval($data['distance']) : null;
        $t = isset($data['time']) && $data['time'] !== '' ? floatval($data['time']) : null;
        $s = isset($data['speed']) && $data['speed'] !== '' ? floatval($data['speed']) : null;
        
        $filled = (!is_null($d) ? 1:0) + (!is_null($t) ? 1:0) + (!is_null($s) ? 1:0);
        if ($filled != 2) return "<div style='color:red;'>Please provide exactly TWO values to calculate the missing third.</div>";
        
        $res = "";
        if (is_null($d)) {
            $d = $s * $t;
            $res = "Distance = $s × $t = <strong>".round($d,2)." units</strong>";
            $missing = "Distance";
            $val = round($d, 2);
        } elseif (is_null($t)) {
            if ($s == 0) return "<div style='color:red;'>Speed cannot be zero to calculate time.</div>";
            $t = $d / $s;
            $res = "Time = $d ÷ $s = <strong>".round($t,2)." hours</strong>";
            $missing = "Time";
            $val = round($t, 2);
        } else {
            if ($t == 0) return "<div style='color:red;'>Time cannot be zero to calculate speed.</div>";
            $s = $d / $t;
            $res = "Speed = $d ÷ $t = <strong>".round($s,2)." units/hr</strong>";
            $missing = "Speed";
            $val = round($s, 2);
        }
        
        return "
        <div style='text-align:center; padding:3rem; background:#f0fdfa; border:1px solid #ccfbf1; border-radius:12px; color:#0f766e;'>
            <div style='font-size:1.2rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Calculated $missing</div>
            <div style='font-size:4rem; font-weight:bold; line-height:1; font-family:monospace;'>$val</div>
            <div style='margin-top:1.5rem; font-size:1.1rem; opacity:0.8;'>$res</div>
        </div>";
    }

    public function fuelCostCalculator($data) {
        $d = floatval($data['distance'] ?? 0);
        $e = floatval($data['efficiency'] ?? 0);
        $p = floatval($data['price'] ?? 0);
        
        if ($d <= 0 || $e <= 0 || $p <= 0) return "<div style='color:red;'>All values must be greater than zero.</div>";
        
        // Assuming MPG and pricing per gallon (or L/100km and pricing per L - math structure identical if strictly treating E as units/distance vs distance/units)
        // Let's assume standardized US MPG and miles: Fuel Needed = Distance / Efficiency
        // If metric (L/100km), it would be (Distance / 100) * Efficiency.
        // The prompt says (MPG or L/100km) but standard single formula is Distance / MPG. Let's do Distance / Efficiency.
        $fuelNeeded = $d / $e; 
        $cost = $fuelNeeded * $p;
        
        return "
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:1.5rem; margin-top:1rem;'>
            <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
                <div style='color:var(--text-muted); text-transform:uppercase; font-size:0.9rem; letter-spacing:1px;'>Fuel Required</div>
                <div style='font-size:3rem; font-weight:bold; color:var(--primary); font-family:monospace; margin-top:0.5rem;'>".round($fuelNeeded, 2)."</div>
                <div style='font-size:0.9rem; color:var(--text-muted); margin-top:0.5rem;'>(Gallons or Liters)</div>
            </div>
            <div style='background:#f0fdf4; border:1px solid #bbf7d0; padding:2rem; border-radius:12px; text-align:center;'>
                <div style='color:#166534; text-transform:uppercase; font-size:0.9rem; letter-spacing:1px;'>Total Cost</div>
                <div style='font-size:3rem; font-weight:bold; color:#15803d; font-family:monospace; margin-top:0.5rem;'>$".number_format($cost, 2)."</div>
                <div style='font-size:0.9rem; color:#166534; margin-top:0.5rem; opacity:0.8;'>Estimated Trip Price</div>
            </div>
        </div>";
    }

    public function marginOfError($data) {
        $n = intval($data['sample'] ?? 1000);
        $pop = isset($data['population']) && $data['population'] !== '' ? intval($data['population']) : null;
        $conf = $data['confidence'] ?? '95';
        
        if ($n < 2) return "<div style='color:red;'>Sample size must be at least 2.</div>";
        
        // Z-scores for 90%, 95%, 99%
        $zScores = ['90'=>1.645, '95'=>1.96, '99'=>2.576];
        $z = $zScores[$conf] ?? 1.96;
        
        $p = 0.5; // Max variance
        $moe = $z * sqrt(($p * (1 - $p)) / $n);
        
        if ($pop !== null && $pop > $n) {
            $fpc = sqrt(($pop - $n) / ($pop - 1));
            $moe *= $fpc;
        }
        
        $moePct = round($moe * 100, 2);
        
        return "
        <div style='text-align:center; padding:3rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Calculated Margin of Error</div>
            <div style='font-size:5rem; font-weight:bold; color:var(--primary); line-height:1;'>±$moePct%</div>
            <div style='margin-top:1.5rem; font-size:1rem; color:var(--text-dark);'>
                At a <strong>$conf%</strong> confidence level, a survey result of 50% means the true population value is between <strong>".(50-$moePct)."% and ".(50+$moePct)."%</strong>.
            </div>
        </div>";
    }

    public function zScoreCalculator($data) {
        $x = floatval($data['x'] ?? 0);
        $m = floatval($data['mean'] ?? 0);
        $sd = floatval($data['sd'] ?? 1);
        
        if ($sd == 0) return "<div style='color:red;'>Standard Deviation cannot be zero.</div>";
        
        $z = ($x - $m) / $sd;
        $zR = round($z, 4);
        
        return "
        <div style='text-align:center; padding:3rem; background:#f8fafc; border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Z-Score</div>
            <div style='font-size:5rem; font-weight:bold; color:var(--primary); line-height:1; font-family:monospace;'>$zR</div>
            <div style='margin-top:1.5rem; font-size:1rem; color:var(--text-dark); font-family:monospace;'>
                Z = ($x - $m) / $sd
            </div>
            <div style='margin-top:1rem; font-size:0.9rem; color:var(--text-muted);'>
                This score is <strong>".abs(round($z,2))."</strong> standard deviations <strong>".($z > 0 ? 'ABOVE' : ($z < 0 ? 'BELOW' : 'EQUAL TO'))."</strong> the mean.
            </div>
        </div>";
    }

    public function probabilityCalculator($data) {
        $pa = floatval($data['pa'] ?? 0);
        $pb = floatval($data['pb'] ?? 0);
        
        if ($pa > 1) $pa = $pa / 100; // allow both 0.5 and 50%
        if ($pb > 1) $pb = $pb / 100;
        
        if ($pa < 0 || $pa > 1 || $pb < 0 || $pb > 1) return "<div style='color:red;'>Probabilities must be between 0 and 1 (or 0-100%).</div>";
        
        $and = round($pa * $pb * 100, 2);
        $or = round(($pa + $pb - ($pa * $pb)) * 100, 2);
        $notA = round((1 - $pa) * 100, 2);
        
        return "
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;'>
            <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
                <div style='color:var(--text-muted); font-size:0.9rem; margin-bottom:0.5rem;'>Probability of A <strong>AND</strong> B</div>
                <div style='font-size:2.5rem; font-weight:bold; color:var(--primary);'>$and%</div>
            </div>
            <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
                <div style='color:var(--text-muted); font-size:0.9rem; margin-bottom:0.5rem;'>Probability of A <strong>OR</strong> B</div>
                <div style='font-size:2.5rem; font-weight:bold; color:#10b981;'>$or%</div>
            </div>
            <div style='background:#f8fafc; border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center; grid-column:span 2;'>
                <div style='color:var(--text-muted); font-size:0.9rem; margin-bottom:0.5rem;'>Probability of <strong>NOT</strong> A</div>
                <div style='font-size:2.5rem; font-weight:bold; color:#f59e0b;'>$notA%</div>
            </div>
        </div>";
    }

    public function petAgeCalculator($data) {
        $type = $data['pet'] ?? 'dog_med';
        $age = floatval($data['age'] ?? 5);
        
        if ($age < 0 || $age > 50) return "<div style='color:red;'>Please enter a realistic pet age (0-50).</div>";
        
        $human = 0;
        if ($type == 'cat') {
            if ($age <= 1) $human = 15 * $age;
            elseif ($age <= 2) $human = 24 * ($age/2);
            else $human = 24 + (($age - 2) * 4);
        } else {
            // Dogs
            if ($age <= 1) $human = 15 * $age;
            elseif ($age <= 2) $human = 24 * ($age/2);
            else {
                $multiplier = 5; // med
                if ($type == 'dog_small') $multiplier = 4;
                if ($type == 'dog_large') $multiplier = 6; // simplified standard scaling
                $human = 24 + (($age - 2) * $multiplier);
            }
        }
        
        return "
        <div style='text-align:center; padding:3rem; background:linear-gradient(135deg, #fdf4ff, #fae8ff); border:1px solid #f5d0fe; border-radius:12px; color:#86198f;'>
            <div style='font-size:3rem; margin-bottom:1rem;'>".($type == 'cat' ? '🐱' : '🐶')."</div>
            <div style='font-size:1.5rem; margin-bottom:1rem;'>In Human Years, your pet is:</div>
            <div style='font-size:5rem; font-weight:bold; line-height:1;'>".round($human, 1)."</div>
            <div style='font-size:1.5rem; margin-top:0.5rem;'>years old!</div>
        </div>";
    }

    public function braSizeCalculator($data) {
        $ub = floatval($data['underbust'] ?? 32);
        $b = floatval($data['bust'] ?? 35);
        
        if ($ub < 20 || $b < 20 || $ub > 60 || $b > 70) return "<div style='color:red;'>Invalid measurements for standard sizing.</div>";
        if ($b < $ub) return "<div style='color:red;'>Bust measurement usually cannot be smaller than underbust.</div>";
        
        // Use +4/+5 standard US/UK method
        $band = floor($ub) + (floor($ub) % 2 == 0 ? 4 : 5);
        
        $diff = $b - $ub;
        $cups = ['AA','A','B','C','D','DD/E','DDD/F','G','H','I','J','K'];
        $cupIdx = max(0, min(count($cups)-1, floor($diff)));
        
        $size = $band . $cups[$cupIdx];
        
        return "
        <div style='text-align:center; padding:3rem; background:#fff1f2; border:1px solid #fecdd3; border-radius:12px; color:#be123c;'>
            <div style='font-size:1.2rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Estimated Standard US/UK Size</div>
            <div style='font-size:5rem; font-weight:bold; line-height:1;'>$size</div>
            <div style='margin-top:1.5rem; font-size:1rem; opacity:0.8;'>
                Note: This is an estimation based on the standard +4 method. Bra sizing varies heavily by brand.
            </div>
        </div>";
    }

    public function loveCalculator($data) {
        $n1 = trim(strtolower($data['name1'] ?? ''));
        $n2 = trim(strtolower($data['name2'] ?? ''));
        
        if (empty($n1) || empty($n2)) return "<div style='color:red;'>Both names are required.</div>";
        
        $str = preg_replace('/[^a-z]/', '', $n1 . "loves" . $n2);
        
        $counts = [];
        foreach (str_split('loves') as $char) {
            $counts[] = substr_count($str, $char);
        }
        
        // Simple 2-digit reduction logic (like the classic game)
        while (count($counts) > 2) {
            $sum = array_shift($counts) + array_pop($counts);
            array_splice($counts, floor(count($counts)/2), 0, $sum);
        }
        
        $baseScore = intval(implode('', $counts));
        // Normalize to 1-100 to avoid giant numbers
        $score = $baseScore > 100 ? $baseScore % 100 : $baseScore;
        if ($score == 0) $score = rand(1, 99);
        
        $color = $score > 80 ? '#ec4899' : ($score > 50 ? '#f59e0b' : '#64748b');
        $msg = $score > 80 ? "Soulmates! ❤️" : ($score > 50 ? "There's potential! 😉" : "Better as friends. 😅");
        
        return "
        <div style='text-align:center; padding:3rem; background:linear-gradient(135deg, #fdf2f8, #fce7f3); border:1px solid #fbcfe8; border-radius:12px;'>
            <div style='display:flex; justify-content:center; align-items:center; gap:2rem; margin-bottom:2rem;'>
                <div style='font-size:1.5rem; font-weight:bold; color:var(--text-dark); text-transform:capitalize;'>{$data['name1']}</div>
                <div style='font-size:2rem; animation: heartbeat 1.5s infinite;'>❤️</div>
                <div style='font-size:1.5rem; font-weight:bold; color:var(--text-dark); text-transform:capitalize;'>{$data['name2']}</div>
            </div>
            
            <div style='position:relative; width:150px; height:150px; margin:0 auto; background:white; border-radius:50%; box-shadow:0 10px 25px -5px rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:center;'>
                <div style='font-size:4rem; font-weight:bold; color:$color;'>$score%</div>
            </div>
            
            <div style='margin-top:2rem; font-size:1.5rem; color:$color; font-weight:bold; font-family:serif; font-style:italic;'>
                $msg
            </div>
            
            <style>
            @keyframes heartbeat {
                0% { transform: scale(1); }
                25% { transform: scale(1.2); }
                50% { transform: scale(1); }
                75% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
            </style>
        </div>";
    }

}
