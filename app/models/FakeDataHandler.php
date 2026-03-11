<?php

class FakeDataHandler extends Model {

    public function profileGen($data) {
        $gender = $data['gender'] ?? 'any';
        if ($gender == 'any') $gender = rand(0, 1) ? 'male' : 'female';
        
        $males = ["James", "John", "Robert", "Michael", "William", "David", "Richard", "Joseph", "Thomas", "Charles"];
        $females = ["Mary", "Patricia", "Jennifer", "Linda", "Elizabeth", "Barbara", "Susan", "Jessica", "Sarah", "Karen"];
        $lasts = ["Smith", "Johnson", "Williams", "Brown", "Jones", "Garcia", "Miller", "Davis", "Rodriguez", "Martinez"];
        $jobs = ["Software Engineer", "Marketing Manager", "Data Analyst", "Graphic Designer", "Product Manager", "Teacher", "Nurse", "Consultant"];
        
        $first = $gender == 'male' ? $males[array_rand($males)] : $females[array_rand($females)];
        $last = $lasts[array_rand($lasts)];
        $job = $jobs[array_rand($jobs)];
        $email = strtolower($first) . "." . strtolower($last) . rand(10, 99) . "@example.com";
        $phone = "+1 (" . rand(200, 999) . ") " . rand(200, 999) . "-" . rand(1000, 9999);
        $dob = date("Y-m-d", rand(strtotime("1960-01-01"), strtotime("2003-12-31")));
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1.5rem 1rem; background:#f8fafc; font-size:1.5rem; color:var(--primary);' colspan='2'>👤 ".htmlspecialchars($first." ".$last)."</th></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; width:30%;'>Gender</th><td style='padding:1rem; text-transform:capitalize;'>$gender</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem;'>Date of Birth</th><td style='padding:1rem;'>$dob</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem;'>Email Address</th><td style='padding:1rem; font-family:monospace;'>$email</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem;'>Phone Number</th><td style='padding:1rem; font-family:monospace;'>$phone</td></tr>
                <tr><th style='padding:1rem;'>Occupation</th><td style='padding:1rem;'>$job</td></tr>
            </table>
        </div>";
    }

    public function addressGen($data) {
        $country = $data['country'] ?? 'us';
        
        if ($country == 'uk') {
            $streets = ["High Street", "Station Road", "Main Street", "Park Road", "Church Road"];
            $cities = ["London", "Manchester", "Birmingham", "Leeds", "Glasgow"];
            $zip = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(1, 9) . " " . rand(1, 9) . chr(rand(65, 90)) . chr(rand(65, 90));
            $state = "ENG";
        } elseif ($country == 'ca') {
            $streets = ["Maple Ave", "Oak St", "Pine Dr", "Cedar Ln", "Main St"];
            $cities = ["Toronto", "Vancouver", "Montreal", "Calgary", "Ottawa"];
            $zip = chr(rand(65, 90)) . rand(0, 9) . chr(rand(65, 90)) . " " . rand(0, 9) . chr(rand(65, 90)) . rand(0, 9);
            $state = ["ON", "BC", "QC", "AB", "MB"][rand(0, 4)];
        } else {
            $streets = ["Main St", "2nd St", "Oak Ave", "Pine Ln", "Maple Dr", "Washington Blvd"];
            $cities = ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix"];
            $zip = rand(10000, 99999);
            $state = ["NY", "CA", "IL", "TX", "AZ"][rand(0, 4)];
        }
        
        $num = rand(100, 9999);
        $street = $streets[array_rand($streets)];
        $city = $cities[array_rand($cities)];
        $full = "$num $street\n$city, $state $zip";
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; padding:2rem; text-align:center;'>
            <div style='font-size:3rem; margin-bottom:1rem;'>🏠</div>
            <textarea class='form-control' rows='2' readonly style='font-size:1.25rem; font-weight:bold; text-align:center; resize:none;'>".htmlspecialchars($full)."</textarea>
            <button class='btn-primary' style='margin-top:1rem;' onclick='this.previousElementSibling.select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Address\", 2000);'>Copy Address</button>
        </div>";
    }

    public function dummyCC($data) {
        $network = $data['network'] ?? 'visa';
        
        $prefixes = [
            'visa' => ['4'],
            'mc' => ['51', '52', '53', '54', '55'],
            'amex' => ['34', '37']
        ];
        
        $lengths = ['visa'=>16, 'mc'=>16, 'amex'=>15];
        
        $prefix = $prefixes[$network][array_rand($prefixes[$network])];
        $len = $lengths[$network];
        
        $cc = $prefix;
        while (strlen($cc) < $len - 1) {
            $cc .= rand(0, 9);
        }
        
        // Calculate Luhn Checksum
        $sum = 0;
        $alt = true; // since we are calculating the LAST digit
        for ($i = strlen($cc) - 1; $i >= 0; $i--) {
            $n = intval($cc[$i]);
            if ($alt) {
                $n *= 2;
                if ($n > 9) $n -= 9;
            }
            $sum += $n;
            $alt = !$alt;
        }
        
        $check = (10 - ($sum % 10)) % 10;
        $cc .= $check;
        
        // Format
        if ($network == 'amex') {
            $formatted = substr($cc, 0, 4) . " " . substr($cc, 4, 6) . " " . substr($cc, 10, 5);
        } else {
            $formatted = trim(chunk_split($cc, 4, ' '));
        }
        
        $exp = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . "/" . rand(date('y')+1, date('y')+6);
        $cvv = $network == 'amex' ? rand(1000, 9999) : rand(100, 999);
        
        return "
        <div style='background:linear-gradient(135deg, #1e293b, #0f172a); border-radius:16px; padding:2rem; color:white; font-family:monospace; max-width:400px; margin:0 auto; box-shadow:0 10px 25px -5px rgba(0,0,0,0.5);'>
            <div style='font-size:1.5rem; text-align:right; margin-bottom:2rem; font-style:italic; font-family:sans-serif; font-weight:bold;'>".strtoupper($network)."</div>
            <div style='font-size:1.5rem; letter-spacing:2px; margin-bottom:1rem;' id='cc-num'>$formatted</div>
            <div style='display:flex; justify-content:space-between; align-items:flex-end;'>
                <div>
                    <div style='font-size:0.6rem; text-transform:uppercase; opacity:0.7;'>Card Holder</div>
                    <div style='font-size:1.1rem; text-transform:uppercase;'>JANE DOE</div>
                </div>
                <div>
                    <div style='font-size:0.6rem; text-transform:uppercase; opacity:0.7;'>Expires</div>
                    <div style='font-size:1.1rem;'>$exp</div>
                </div>
                <div>
                    <div style='font-size:0.6rem; text-transform:uppercase; opacity:0.7;'>CVV</div>
                    <div style='font-size:1.1rem;'>$cvv</div>
                </div>
            </div>
        </div>
        <div style='text-align:center; margin-top:1.5rem;'>
            <button class='btn-outline' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($cc))."\"); this.innerText=\"Copied Number!\"; setTimeout(()=>this.innerText=\"Copy Number Only\", 2000);'>Copy Number Only</button>
        </div>";
    }

    public function jokeGen($data) {
        $jokes = [
            "Why do programmers prefer dark mode? Because light attracts bugs.",
            "There are 10 types of people in the world: those who understand binary, and those who don't.",
            "A SQL query goes into a bar, walks up to two tables and asks... 'Can I join you?'",
            "How many programmers does it take to change a light bulb? None, that's a hardware problem.",
            "To understand what recursion is, you must first understand recursion.",
            "Why do Java programmers have to wear glasses? Because they don't C#.",
            "Programming is 10% writing code and 90% understanding why it's not working.",
            "I'd tell you a UDP joke, but you might not get it."
        ];
        
        $joke = $jokes[array_rand($jokes)];
        
        return "
        <div style='background:#fefce8; border:1px solid #fef08a; border-radius:12px; padding:3rem 2rem; text-align:center; color:#854d0e; font-size:1.5rem; line-height:1.6; font-style:italic;'>
            \"".htmlspecialchars($joke)."\"
        </div>";
    }

    public function quoteGen($data) {
        $quotes = [
            ["The only way to do great work is to love what you do.", "Steve Jobs"],
            ["Life is what happens when you're busy making other plans.", "John Lennon"],
            ["The future belongs to those who believe in the beauty of their dreams.", "Eleanor Roosevelt"],
            ["It is never too late to be what you might have been.", "George Eliot"],
            ["Talk is cheap. Show me the code.", "Linus Torvalds"],
            ["Any fool can write code that a computer can understand. Good programmers write code that humans can understand.", "Martin Fowler"],
            ["Truth can only be found in one place: the code.", "Robert C. Martin"]
        ];
        
        $q = $quotes[array_rand($quotes)];
        
        return "
        <div style='background:var(--bg); border-left:4px solid var(--primary); border-radius:12px; padding:2rem; box-shadow:0 4px 6px -1px rgba(0,0,0,0.1);'>
            <div style='font-size:1.5rem; color:var(--text-dark); margin-bottom:1rem; font-family:serif; line-height:1.5;'>
                \"".htmlspecialchars($q[0])."\"
            </div>
            <div style='color:var(--text-muted); font-weight:bold;'>— ".htmlspecialchars($q[1])."</div>
        </div>";
    }

    public function dateGen($data) {
        $start = intval($data['start'] ?? 1950);
        $end = intval($data['end'] ?? 2030);
        
        if ($start > $end) {
            $tmp = $start; $start = $end; $end = $tmp;
        }
        
        $startTs = strtotime("$start-01-01");
        $endTs = strtotime("$end-12-31");
        $randTs = rand($startTs, $endTs);
        
        $iso = date('Y-m-d', $randTs);
        $human = date('F j, Y', $randTs);
        $time = date('H:i:s', $randTs); // Random time is basically random within the start/end if we rand over the whole TS range it's fine.
        
        return "
        <div style='display:flex; flex-direction:column; gap:1rem; text-align:center;'>
            <div style='font-size:3rem;'>📅</div>
            <div style='font-size:2rem; font-weight:bold; color:var(--primary);'>$human</div>
            <div style='display:flex; justify-content:center; gap:2rem; margin-top:1rem;'>
                <div>
                    <div style='font-size:0.875rem; color:var(--text-muted); text-transform:uppercase;'>ISO 8601</div>
                    <div style='font-family:monospace; font-size:1.2rem;'>$iso</div>
                </div>
                <div>
                    <div style='font-size:0.875rem; color:var(--text-muted); text-transform:uppercase;'>Random Time</div>
                    <div style='font-family:monospace; font-size:1.2rem;'>$time</div>
                </div>
                <div>
                    <div style='font-size:0.875rem; color:var(--text-muted); text-transform:uppercase;'>Unix Timestamp</div>
                    <div style='font-family:monospace; font-size:1.2rem;'>$randTs</div>
                </div>
            </div>
        </div>";
    }

    public function locationGen($data) {
        $locs = [
            ['United States', 'Washington, D.C.', 'New York, Los Angeles, Chicago'],
            ['United Kingdom', 'London', 'Manchester, Birmingham, Edinburgh'],
            ['Japan', 'Tokyo', 'Osaka, Kyoto, Yokohama'],
            ['France', 'Paris', 'Marseille, Lyon, Toulouse'],
            ['Brazil', 'Brasília', 'São Paulo, Rio de Janeiro, Salvador'],
            ['Australia', 'Canberra', 'Sydney, Melbourne, Brisbane'],
            ['India', 'New Delhi', 'Mumbai, Bangalore, Kolkata'],
            ['Germany', 'Berlin', 'Munich, Frankfurt, Hamburg']
        ];
        
        $loc = $locs[array_rand($locs)];
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1.5rem 1rem; background:#f8fafc; font-size:1.5rem; color:var(--primary);' colspan='2'>🌍 ".htmlspecialchars($loc[0])."</th></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; width:30%;'>Capital City</th><td style='padding:1rem; font-weight:bold;'>".htmlspecialchars($loc[1])."</td></tr>
                <tr><th style='padding:1rem;'>Major Cities</th><td style='padding:1rem;'>".htmlspecialchars($loc[2])."</td></tr>
            </table>
        </div>";
    }

    public function jsonMock($data) {
        $rows = intval($data['rows'] ?? 5);
        if ($rows < 1 || $rows > 50) $rows = 5;
        
        $arr = [];
        $firsts = ["John", "Jane", "Alice", "Bob", "Charlie", "Diana"];
        $lasts = ["Smith", "Doe", "Johnson", "Williams", "Brown", "Jones"];
        
        for ($i=1; $i<=$rows; $i++) {
            $f = $firsts[array_rand($firsts)];
            $l = $lasts[array_rand($lasts)];
            $arr[] = [
                "id" => $i,
                "first_name" => $f,
                "last_name" => $l,
                "email" => strtolower($f . "." . $l . rand(10,99) . "@example.com"),
                "status" => rand(0,1) ? "active" : "inactive",
                "created_at" => date("Y-m-d\TH:i:s\Z", time() - rand(0, 31536000))
            ];
        }
        
        $json = json_encode($arr, JSON_PRETTY_PRINT);
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>JSON Array ($rows objects)</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"json-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy JSON\", 2000);'>Copy JSON</button>
        </div>
        <textarea id='json-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#1e293b; color:#cbd5e1; border:none;'>".htmlspecialchars($json)."</textarea>";
    }

    public function sqlMock($data) {
        $rows = intval($data['rows'] ?? 5);
        if ($rows < 1 || $rows > 50) $rows = 5;
        
        $firsts = ["John", "Jane", "Alice", "Bob", "Charlie", "Diana"];
        $lasts = ["Smith", "Doe", "Johnson", "Williams", "Brown", "Jones"];
        
        $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `status`, `created_at`) VALUES\n";
        $vals = [];
        for ($i=1; $i<=$rows; $i++) {
            $f = $firsts[array_rand($firsts)];
            $l = $lasts[array_rand($lasts)];
            $em = strtolower($f . "." . $l . rand(10,99) . "@example.com");
            $st = rand(0,1) ? "active" : "inactive";
            $dt = date("Y-m-d H:i:s", time() - rand(0, 31536000));
            $vals[] = "($i, '$f', '$l', '$em', '$st', '$dt')";
        }
        $sql .= implode(",\n", $vals) . ";";
        
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>SQL Statements ($rows rows)</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"sql-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy SQL\", 2000);'>Copy SQL</button>
        </div>
        <textarea id='sql-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#1e293b; color:#cbd5e1; border:none;'>".htmlspecialchars($sql)."</textarea>";
    }

    public function csvMock($data) {
        $rows = intval($data['rows'] ?? 10);
        if ($rows < 1 || $rows > 100) $rows = 10;
        
        $firsts = ["John", "Jane", "Alice", "Bob", "Charlie", "Diana"];
        $lasts = ["Smith", "Doe", "Johnson", "Williams", "Brown", "Jones"];
        
        $csv = "id,first_name,last_name,email,status,created_at\n";
        for ($i=1; $i<=$rows; $i++) {
            $f = $firsts[array_rand($firsts)];
            $l = $lasts[array_rand($lasts)];
            $em = strtolower($f . "." . $l . rand(10,99) . "@example.com");
            $st = rand(0,1) ? "active" : "inactive";
            $dt = date("Y-m-d H:i:s", time() - rand(0, 31536000));
            $csv .= "$i,$f,$l,$em,$st,$dt\n";
        }
        
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>CSV Data ($rows rows)</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"csv-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy CSV\", 2000);'>Copy CSV</button>
        </div>
        <textarea id='csv-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#f8fafc; border:1px solid var(--border);'>".htmlspecialchars($csv)."</textarea>";
    }

    public function xmlMock($data) {
        $rows = intval($data['rows'] ?? 3);
        if ($rows < 1 || $rows > 20) $rows = 3;
        
        $firsts = ["John", "Jane", "Alice", "Bob"];
        $lasts = ["Smith", "Doe", "Johnson"];
        
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<users>\n";
        for ($i=1; $i<=$rows; $i++) {
            $f = $firsts[array_rand($firsts)];
            $l = $lasts[array_rand($lasts)];
            $em = strtolower($f . "." . $l . rand(10,99) . "@example.com");
            $st = rand(0,1) ? "true" : "false";
            
            $xml .= "  <user id=\"$i\">\n";
            $xml .= "    <firstName>$f</firstName>\n";
            $xml .= "    <lastName>$l</lastName>\n";
            $xml .= "    <email>$em</email>\n";
            $xml .= "    <isActive>$st</isActive>\n";
            $xml .= "  </user>\n";
        }
        $xml .= "</users>";
        
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>XML Data ($rows records)</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"xml-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy XML\", 2000);'>Copy XML</button>
        </div>
        <textarea id='xml-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#1e293b; color:#cbd5e1; border:none;'>".htmlspecialchars($xml)."</textarea>";
    }

    public function regexTemplates($data) {
        $patterns = [
            'Email Address' => '^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$',
            'URL / Website' => '^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$',
            'IPv4 Address' => '^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$',
            'Strong Password' => '^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$',
            'Phone (US)' => '^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$',
            'Date (YYYY-MM-DD)' => '^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$',
            'Hex Color' => '^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$',
            'Username (Alphanumeric 3-16)' => '^[a-zA-Z0-9_-]{3,16}$'
        ];
        
        $html = "<div style='display:grid; gap:1rem;'>";
        foreach ($patterns as $name => $pat) {
            $html .= "
            <div style='background:var(--bg); border:1px solid var(--border); border-radius:8px; padding:1rem;'>
                <div style='font-weight:bold; color:var(--text-dark); margin-bottom:0.5rem;'>" . htmlspecialchars($name) . "</div>
                <div style='display:flex; gap:0.5rem;'>
                    <input type='text' class='form-control' value='".htmlspecialchars($pat)."' readonly style='font-family:monospace; font-size:1.1rem;'>
                    <button class='btn-outline' style='white-space:nowrap;' onclick='this.previousElementSibling.select(); document.execCommand(\"copy\"); this.innerText=\"✓\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
                </div>
            </div>";
        }
        $html .= "</div>";
        return $html;
    }

    public function cronParse($data) {
        $cron = trim($data['cron'] ?? '0 12 * * 1-5');
        
        // This is a VERY basic faux-parser for UI demonstration. True cron parsing is extremely complex.
        $parts = preg_split('/\s+/', $cron);
        
        if (count($parts) != 5 && count($parts) != 6) {
            return "<div style='color:red;'>Invalid Cron format. Expected 5 or 6 fields.</div>";
        }
        
        $min = $parts[0];
        $hr = $parts[1];
        $dom = $parts[2];
        $mon = $parts[3];
        $dow = $parts[4];
        
        $desc = "Runs ";
        if ($min == '*' && $hr == '*') $desc .= "every minute";
        elseif ($min == '0' && $hr == '*') $desc .= "every hour at the top of the hour";
        elseif ($hr != '*' && $min != '*') $desc .= "at $hr:$min";
        else $desc .= "at minute $min past the hour ($hr)";
        
        if ($dow == '1-5') $desc .= ", Monday through Friday";
        elseif ($dow == '0' || $dow == '7') $desc .= ", on Sundays";
        elseif ($dow != '*') $desc .= ", on day of week $dow";
        
        if ($mon != '*') $desc .= ", only in month $mon";
        if ($dom != '*') $desc .= ", on day $dom of the month";
        
        return "
        <div style='text-align:center; padding:3rem; background:#f8fafc; border:1px solid var(--border); border-radius:12px;'>
            <div style='font-family:monospace; font-size:2rem; letter-spacing:4px; font-weight:bold; color:var(--primary); margin-bottom:1.5rem;'>
                ".htmlspecialchars($cron)."
            </div>
            <div style='font-size:1.25rem; color:var(--text-dark); max-width:500px; margin:0 auto;'>
                \"$desc\"
            </div>
            <div style='margin-top:2rem; display:grid; grid-template-columns:repeat(5, 1fr); gap:0.5rem; font-size:0.875rem; color:var(--text-muted);'>
                <div><strong style='color:var(--text-dark); display:block; font-size:1.2rem;'>$min</strong>Minute</div>
                <div><strong style='color:var(--text-dark); display:block; font-size:1.2rem;'>$hr</strong>Hour</div>
                <div><strong style='color:var(--text-dark); display:block; font-size:1.2rem;'>$dom</strong>Day(Month)</div>
                <div><strong style='color:var(--text-dark); display:block; font-size:1.2rem;'>$mon</strong>Month</div>
                <div><strong style='color:var(--text-dark); display:block; font-size:1.2rem;'>$dow</strong>Day(Week)</div>
            </div>
        </div>";
    }

    public function uuidGen($data) {
        $count = intval($data['count'] ?? 5);
        if ($count < 1 || $count > 100) $count = 5;
        
        $uuids = [];
        for ($i=0; $i<$count; $i++) {
            $data = random_bytes(16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
            $uuids[] = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
        
        $str = implode("\n", $uuids);
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>Generated $count UUIDs (v4)</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"uuid-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy All\", 2000);'>Copy All</button>
        </div>
        <textarea id='uuid-out' class='form-control' rows='10' readonly style='font-family:monospace; background:#f8fafc; font-size:1.1rem; line-height:1.6;'>".htmlspecialchars($str)."</textarea>";
    }

    public function loremGen($data) {
        $paras = intval($data['paras'] ?? 3);
        if ($paras < 1 || $paras > 20) $paras = 3;
        
        $sentences = [
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "Nullam in dui mauris.",
            "Vivamus hendrerit arcu sed erat molestie vehicula.",
            "Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.",
            "Ut in nulla enim.",
            "Phasellus molestie magna non est bibendum non venenatis nisl tempor.",
            "Suspendisse dictum feugiat nisl ut dapibus.",
            "Mauris iaculis porttitor posuere.",
            "Praesent id metus massa, ut blandit odio.",
            "Proin quis tortor orci."
        ];
        
        $out = [];
        for ($i=0; $i<$paras; $i++) {
            $p = [];
            $len = rand(3, 8);
            for ($k=0; $k<$len; $k++) {
                $p[] = $sentences[array_rand($sentences)];
            }
            $out[] = implode(" ", $p);
        }
        
        $str = implode("\n\n", $out);
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>$paras Paragraphs</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"lorem-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy All\", 2000);'>Copy All</button>
        </div>
        <textarea id='lorem-out' class='form-control' rows='15' readonly style='font-size:1.1rem; line-height:1.6; padding:1.5rem;'>".htmlspecialchars($str)."</textarea>";
    }

}
