<?php

class TimeHandler extends Model {

    public function unixToDate($data) {
        $ts = trim($data['timestamp'] ?? '');
        if (!is_numeric($ts)) return "<div style='color:red;'>Invalid timestamp.</div>";
        
        $date = date('Y-m-d H:i:s', (int)$ts);
        $utc = gmdate('Y-m-d H:i:s', (int)$ts);
        
        return "
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:var(--bg); padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>Local Time</div>
                <div style='font-size:1.5rem; font-weight:800; color:var(--primary);'>$date</div>
            </div>
            <div style='flex:1; background:var(--bg); padding:1.5rem; border-radius:8px; border:1px solid var(--border); text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>UTC Time</div>
                <div style='font-size:1.5rem; font-weight:800; color:var(--primary);'>$utc</div>
            </div>
        </div>";
    }

    public function dateToUnix($data) {
        $date = $data['date'] ?? '';
        $time = $data['time'] ?? '00:00';
        if (empty($date)) return '';
        
        $ts = strtotime("$date $time");
        return $this->formatTimeResult("Unix Epoch Timestamp", $ts);
    }

    public function tzConverter($data) {
        $time = $data['time'] ?? '';
        $from = $data['from_tz'] ?? 'UTC';
        $to = $data['to_tz'] ?? 'UTC';
        
        try {
            $dt = new DateTime($time, new DateTimeZone($from));
            $dt->setTimezone(new DateTimeZone($to));
            return $this->formatTimeResult("Converted Time", $dt->format('Y-m-d H:i:s'), "From $from to $to");
        } catch (Exception $e) {
            return "<div style='color:red;'>Invalid Timezone or Format.</div>";
        }
    }

    public function daysBetween($data) {
        $d1 = new DateTime($data['date1'] ?? 'now');
        $d2 = new DateTime($data['date2'] ?? 'now');
        $diff = $d1->diff($d2);
        
        return $this->formatTimeResult("Difference", $diff->days . " Days", $diff->y . " Years, " . $diff->m . " Months, " . $diff->d . " Days");
    }

    public function workDays($data) {
        $start = new DateTime($data['start'] ?? 'now');
        $end = new DateTime($data['end'] ?? 'now');
        if ($start > $end) return "<div style='color:red;'>Start date must be before end date.</div>";
        
        $workdays = 0;
        $period = new DatePeriod($start, new DateInterval('P1D'), $end->modify('+1 day'));
        foreach ($period as $dt) {
            $day = $dt->format('N');
            if ($day < 6) $workdays++;
        }
        return $this->formatTimeResult("Business Days", $workdays, "Excluding weekends (Sat/Sun)");
    }

    public function leapYear($data) {
        $year = intval($data['year'] ?? date('Y'));
        $isLeap = ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
        
        $color = $isLeap ? "#22c55e" : "#dc2626";
        $text = $isLeap ? "YES, $year is a Leap Year" : "NO, $year is NOT a Leap Year";
        
        return "
        <div style='background: $color; color:white; padding:2rem; border-radius:12px; text-align:center; font-size:1.5rem; font-weight:900;'>
            $text
        </div>";
    }

    public function weekNumber($data) {
        $date = trim($data['date'] ?? '');
        if (empty($date)) return '';
        $val = date('W', strtotime($date));
        return $this->formatTimeResult("ISO-8601 Week Number", $val);
    }

    public function preciseAge($data) {
        $dob = new DateTime($data['dob'] ?? 'now');
        $tob = $data['tob'] ?? '00:00';
        $dob->modify($tob);
        $now = new DateTime();
        
        $diff = $dob->diff($now);
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='color:var(--text-muted);'>You are exactly</div>
            <div style='font-size:2.5rem; font-weight:900; color:var(--primary); margin:1rem 0;'>
                {$diff->y} Years, {$diff->m} Months, {$diff->d} Days
            </div>
            <div style='font-size:1.2rem; color:var(--text-muted);'>
                {$diff->h} Hours and {$diff->i} Minutes old.
            </div>
        </div>";
    }

    public function countdownGen($data) {
        $event = htmlspecialchars($data['event'] ?? 'Event');
        $target = $data['target'] ?? '';
        if (empty($target)) return '';
        
        return "
        <div style='text-align:center;'>
            <div style='font-size:1.2rem; color:var(--text-muted); margin-bottom:1rem;'>Countdown to $event</div>
            <div id='countdown-display' data-target='$target' style='font-size:3rem; font-weight:900; color:var(--primary); font-family:monospace;'>
                00d 00h 00m 00s
            </div>
            <script>
                (function(){
                    const target = new Date(document.getElementById('countdown-display').dataset.target).getTime();
                    const timer = setInterval(function() {
                        const now = new Date().getTime();
                        const dist = target - now;
                        if (dist < 0) {
                            document.getElementById('countdown-display').innerHTML = 'EVENT REACHED';
                            clearInterval(timer);
                            return;
                        }
                        const days = Math.floor(dist / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const mins = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
                        const secs = Math.floor((dist % (1000 * 60)) / 1000);
                        document.getElementById('countdown-display').innerHTML = days + 'd ' + hours + 'h ' + mins + 'm ' + secs + 's';
                    }, 1000);
                })();
            </script>
        </div>";
    }

    public function stopwatch() {
        return "
        <div style='text-align:center;'>
            <div id='stopwatch-display' style='font-size:4rem; font-weight:900; color:var(--primary); font-family:monospace; margin-bottom:2rem;'>00:00:00.000</div>
            <div style='display:flex; gap:1rem; justify-content:center;'>
                <button class='btn btn-primary' id='sw-start'>Start</button>
                <button class='btn btn-secondary' id='sw-stop'>Stop</button>
                <button class='btn btn-outline-danger' id='sw-reset'>Reset</button>
            </div>
            <script>
                (function(){
                    let start = 0, elapsed = 0, timer;
                    const disp = document.getElementById('stopwatch-display');
                    document.getElementById('sw-start').onclick = () => {
                        if (timer) return;
                        start = Date.now() - elapsed;
                        timer = setInterval(() => {
                            elapsed = Date.now() - start;
                            let ms = elapsed % 1000;
                            let s = Math.floor(elapsed / 1000) % 60;
                            let m = Math.floor(elapsed / 60000) % 60;
                            let h = Math.floor(elapsed / 3600000);
                            disp.innerText = String(h).padStart(2,'0')+':'+String(m).padStart(2,'0')+':'+String(s).padStart(2,'0')+'.'+String(ms).padStart(3,'0');
                        }, 10);
                    };
                    document.getElementById('sw-stop').onclick = () => { clearInterval(timer); timer = null; };
                    document.getElementById('sw-reset').onclick = () => {
                        clearInterval(timer); timer = null; elapsed = 0;
                        disp.innerText = '00:00:00.000';
                    };
                })();
            </script>
        </div>";
    }

    public function julianDate($data) {
        $date = $data['date'] ?? '';
        if (empty($date)) return '';
        $parts = explode('-', $date);
        $jd = gregoriantojd($parts[1], $parts[2], $parts[0]);
        return $this->formatTimeResult("Julian Day Number", $jd);
    }

    public function moonPhase($data) {
        $date = strtotime($data['date'] ?? 'now');
        // Simple approximation
        $lp = 2551443;
        $now = $date;
        $new_moon = strtotime('1970-01-07 20:35:00');
        $phase = (($now - $new_moon) % $lp) / $lp;
        
        $name = "New Moon"; $icon = "🌑";
        if ($phase < 0.0625 || $phase > 0.9375) { $name = "New Moon"; $icon = "🌑"; }
        else if ($phase < 0.1875) { $name = "Waxing Crescent"; $icon = "🌒"; }
        else if ($phase < 0.3125) { $name = "First Quarter"; $icon = "🌓"; }
        else if ($phase < 0.4375) { $name = "Waxing Gibbous"; $icon = "🌔"; }
        else if ($phase < 0.5625) { $name = "Full Moon"; $icon = "🌕"; }
        else if ($phase < 0.6875) { $name = "Waning Gibbous"; $icon = "🌖"; }
        else if ($phase < 0.8125) { $name = "Third Quarter"; $icon = "🌗"; }
        else { $name = "Waning Crescent"; $icon = "🌘"; }
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='font-size:5rem; margin-bottom:1rem;'>$icon</div>
            <div style='font-size:2rem; font-weight:bold; color:var(--primary);'>$name</div>
            <div style='color:var(--text-muted); margin-top:0.5rem;'>Phase Cycle: " . number_format($phase * 100, 1) . "%</div>
        </div>";
    }

    public function sunriseSunset($data) {
        $lat = floatval($data['lat'] ?? 40.7128);
        $lng = floatval($data['lng'] ?? -74.0060);
        $sun = date_sun_info(time(), $lat, $lng);
        
        return "
        <div style='display:flex; gap:1rem;'>
            <div style='flex:1; background:#fff7ed; padding:1.5rem; border-radius:8px; border:1px solid #ffedd1; text-align:center;'>
                <div style='font-size:0.875rem; color:#9a3412;'>Sunrise</div>
                <div style='font-size:1.5rem; font-weight:800; color:#c2410c;'>" . date('H:i:s', $sun['sunrise']) . "</div>
            </div>
            <div style='flex:1; background:#f0f9ff; padding:1.5rem; border-radius:8px; border:1px solid #e0f2fe; text-align:center;'>
                <div style='font-size:0.875rem; color:#0369a1;'>Sunset</div>
                <div style='font-size:1.5rem; font-weight:800; color:#0369a1;'>" . date('H:i:s', $sun['sunset']) . "</div>
            </div>
        </div>";
    }

    public function dayOfWeek($data) {
        $date = strtotime($data['date'] ?? 'now');
        return $this->formatTimeResult("Day of the Week", date('l', $date));
    }

    public function secondsToTime($data) {
        $s = intval($data['seconds'] ?? 0);
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$s");
        $diff = $dtF->diff($dtT);
        
        return $this->formatTimeResult("Time Format", $diff->format('%a Days, %h Hours, %i Minutes, %s Seconds'));
    }

    public function timeCard($data) {
        $total = 0;
        $days = ['mon', 'tue', 'wed', 'thu', 'fri'];
        foreach ($days as $d) {
            $in = $data[$d.'_in'] ?? '';
            $out = $data[$d.'_out'] ?? '';
            if ($in && $out) {
                $total += (strtotime($out) - strtotime($in)) / 3600;
            }
        }
        return $this->formatTimeResult("Total Hours Worked", number_format($total, 2) . " Hours", "Based on 5-day week input");
    }

    public function pregnancyWeeks($data) {
        $lmp = new DateTime($data['last_period'] ?? 'now');
        $now = new DateTime();
        $diff = $lmp->diff($now);
        $weeks = floor($diff->days / 7);
        $days = $diff->days % 7;
        
        return $this->formatTimeResult("Pregnancy Progress", "$weeks Weeks, $days Days", "Total Days: " . $diff->days);
    }

    public function retirement($data) {
        $target = new DateTime($data['target'] ?? 'now');
        $now = new DateTime();
        if ($now > $target) return "<div style='color:green;'>Happy Retirement!</div>";
        $diff = $now->diff($target);
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='color:var(--text-muted);'>You are</div>
            <div style='font-size:2.5rem; font-weight:900; color:var(--primary); margin:1rem 0;'>
                {$diff->y}Y {$diff->m}M {$diff->d}D
            </div>
            <div style='color:var(--text-muted);'>away from retirement.</div>
        </div>";
    }

    public function pomodoro() {
        return "
        <div style='text-align:center;'>
            <div id='pomo-status' style='font-size:1rem; color:var(--text-muted); margin-bottom:0.5rem;'>Focus Time</div>
            <div id='pomo-display' style='font-size:5rem; font-weight:900; color:#ef4444; margin-bottom:2rem;'>25:00</div>
            <div style='display:flex; gap:1rem; justify-content:center;'>
                <button class='btn btn-primary' id='pomo-start'>Start</button>
                <button class='btn btn-outline-danger' id='pomo-reset'>Reset</button>
            </div>
            <script>
                (function(){
                    let count = 1500, timer, active = false;
                    const disp = document.getElementById('pomo-display');
                    const stat = document.getElementById('pomo-status');
                    document.getElementById('pomo-start').onclick = (e) => {
                        if (active) { clearInterval(timer); active = false; e.target.innerText = 'Start'; }
                        else {
                            active = true; e.target.innerText = 'Pause';
                            timer = setInterval(() => {
                                count--;
                                let m = Math.floor(count / 60), s = count % 60;
                                disp.innerText = String(m).padStart(2,'0') + ':' + String(s).padStart(2,'0');
                                if (count <= 0) { clearInterval(timer); alert('Time is up!'); }
                            }, 1000);
                        }
                    };
                    document.getElementById('pomo-reset').onclick = () => {
                        clearInterval(timer); active = false; count = 1500;
                        disp.innerText = '25:00'; document.getElementById('pomo-start').innerText = 'Start';
                    };
                })();
            </script>
        </div>";
    }

    public function worldClock() {
        $cities = [
            'London' => 'Europe/London',
            'New York' => 'America/New_York',
            'Tokyo' => 'Asia/Tokyo',
            'Dubai' => 'Asia/Dubai',
            'Sydney' => 'Australia/Sydney'
        ];
        $html = "<div style='display:grid; grid-template-columns:1fr 1fr; gap:1rem;'>";
        foreach ($cities as $name => $tz) {
            $dt = new DateTime('now', new DateTimeZone($tz));
            $html .= "<div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; text-align:center;'>
                <div style='font-size:0.875rem; color:var(--text-muted);'>$name</div>
                <div style='font-size:1.25rem; font-weight:bold; color:var(--primary);'>" . $dt->format('H:i:s') . "</div>
                <div style='font-size:0.75rem; color:var(--text-muted);'>" . $dt->format('M d') . "</div>
            </div>";
        }
        $html .= "</div>";
        return $html;
    }

    private function formatTimeResult($label, $value, $subtext = '') {
        $sub = $subtext ? "<div style='margin-top:0.5rem; font-size:1rem; color:var(--text-muted);'>$subtext</div>" : "";
        return "
        <div style='background: var(--bg); padding: 2.5rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 1rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform:uppercase; font-weight:bold; letter-spacing:1px;'>$label</div>
            <div style='font-size: 3rem; font-weight: 900; color: var(--text-dark);'>$value</div>
            $sub
        </div>";
    }

}
