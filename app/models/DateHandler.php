<?php

class DateHandler extends Model {

    public function ageCalculator($data) {
        $dob = $data['dob'] ?? '';
        $target = !empty($data['target']) ? $data['target'] : date('Y-m-d');
        
        if (empty($dob)) return "<div style='color:red;'>Please enter your Date of Birth.</div>";
        
        $date1 = new DateTime($dob);
        $date2 = new DateTime($target);
        
        if ($date1 > $date2) return "<div style='color:red;'>Date of Birth cannot be after the target date.</div>";
        
        $diff = $date1->diff($date2);
        
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>Your Age</div>
            <div style='font-size: 2.5rem; font-weight: 800; color: var(--primary);'>
                {$diff->y} Years, {$diff->m} Months, {$diff->d} Days
            </div>
        </div>
        <div style='display:grid; grid-template-columns: repeat(3, 1fr); gap:1rem;'>
            <div style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Total Months</div>
                <div style='font-size:1.5rem; font-weight:700; color:var(--text-dark);'>" . (($diff->y * 12) + $diff->m) . "</div>
            </div>
            <div style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Total Weeks</div>
                <div style='font-size:1.5rem; font-weight:700; color:var(--text-dark);'>" . floor($diff->days / 7) . "</div>
            </div>
            <div style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Total Days</div>
                <div style='font-size:1.5rem; font-weight:700; color:var(--text-dark);'>{$diff->days}</div>
            </div>
        </div>";
    }

    public function dateDifference($data) {
        return $this->daysBetween($data); // Maps to the same core logic
    }

    public function daysBetween($data) {
        $d1 = $data['date1'] ?? '';
        $d2 = $data['date2'] ?? '';
        
        if (empty($d1) || empty($d2)) return "<div style='color:red;'>Please enter both dates.</div>";
        
        $date1 = new DateTime($d1);
        $date2 = new DateTime($d2);
        $diff = $date1->diff($date2);
        
        $word = $date1 > $date2 ? "ago" : "away";
        
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem;'>Time Span</div>
            <div style='font-size: 3rem; font-weight: 900; color: var(--primary);'>{$diff->days} Days</div>
            <div style='font-size: 1rem; color: var(--text-muted); margin-top: 0.5rem;'>({$diff->y} Years, {$diff->m} Months, {$diff->d} Days $word)</div>
        </div>";
    }

    public function addDays($data) {
        $date = $data['date'] ?? '';
        $days = intval($data['days'] ?? 0);
        
        if (empty($date)) return "<div style='color:red;'>Please enter a base date.</div>";
        
        $dt = new DateTime($date);
        $dt->modify("+$days days");
        
        return $this->formatDateResult("New Date (Added $days Days)", $dt->format('l, F j, Y'));
    }

    public function subtractDays($data) {
        $date = $data['date'] ?? '';
        $days = intval($data['days'] ?? 0);
        
        if (empty($date)) return "<div style='color:red;'>Please enter a base date.</div>";
        
        $dt = new DateTime($date);
        $dt->modify("-$days days");
        
        return $this->formatDateResult("New Date (Subtracted $days Days)", $dt->format('l, F j, Y'));
    }

    public function leapYear($data) {
        $year = intval($data['year'] ?? 0);
        if ($year == 0) return "<div style='color:red;'>Please enter a valid year.</div>";
        
        $isLeap = (date('L', mktime(0, 0, 0, 1, 1, $year)) == 1);
        
        $color = $isLeap ? '#22c55e' : '#dc2626';
        $text = $isLeap ? "Yes, $year is a Leap Year." : "No, $year is not a Leap Year.";
        
        return "
        <div style='background: var(--bg); padding: 2.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 2rem; font-weight: 800; color: $color;'>$text</div>
        </div>";
    }

    public function businessDays($data) {
        $d1 = $data['date1'] ?? '';
        $d2 = $data['date2'] ?? '';
        
        if (empty($d1) || empty($d2)) return "<div style='color:red;'>Please enter both dates.</div>";
        
        $date1 = new DateTime($d1);
        $date2 = new DateTime($d2);
        
        if ($date1 > $date2) {
            $temp = $date1;
            $date1 = $date2;
            $date2 = $temp;
        }

        $businessDays = 0;
        $totalDays = $date1->diff($date2)->days;
        
        $curr = clone $date1;
        while ($curr < $date2) {
            $dayOfWeek = $curr->format('N'); // 1 (Mon) - 7 (Sun)
            if ($dayOfWeek < 6) { 
                $businessDays++;
            }
            $curr->modify('+1 day');
        }

        return "
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:#f0fdf4; padding:1.5rem; border-radius:8px; border:1px solid #bbf7d0; text-align:center;'>
                <div style='font-size:0.875rem; color:#166534;'>Business Days (Mon-Fri)</div>
                <div style='font-size:2.5rem; font-weight:800; color:#15803d;'>$businessDays</div>
            </div>
            <div style='flex:1; background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Total Calendar Days</div>
                <div style='font-size:2.5rem; font-weight:800; color:var(--text-dark);'>$totalDays</div>
            </div>
        </div>";
    }

    public function unixTimestamp($data) {
        $ts = time();
        return "
        <div style='text-align:center; margin-bottom:1rem;'>
            <div style='font-size:1rem; color:var(--text-muted); margin-bottom:0.5rem;'>Current UNIX Timestamp</div>
            <div style='font-size:3.5rem; font-weight:900; color:var(--primary); font-family:monospace;'>$ts</div>
        </div>
        <div style='text-align:center; color:var(--text-muted);'>Generated at: " . gmdate("Y-m-d H:i:s", $ts) . " UTC</div>
        <div style='text-align:center; margin-top:1.5rem;'>
            <button class='btn btn-primary' onclick='location.reload()'>Refresh Timestamp</button>
        </div>";
    }

    private function formatDateResult($title, $value) {
        return "
        <div style='background: var(--bg); padding: 2.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform:uppercase; font-weight:bold; letter-spacing:1px;'>$title</div>
            <div style='font-size: 2.5rem; font-weight: 900; color: var(--text-dark);'>$value</div>
        </div>";
    }
}
