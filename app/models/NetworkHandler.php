<?php

class NetworkHandler extends Model {

    public function myIp($data) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
        $ip = explode(',', $ip)[0];
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
        $host = @gethostbyaddr($ip) ?: 'Unknown';
        
        return "
        <div style='display:grid; gap:1.5rem;'>
            <div style='text-align:center; padding:3rem; background:linear-gradient(135deg, var(--primary), var(--secondary)); border-radius:12px; color:white;'>
                <div style='font-size:1rem; opacity:0.9; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.5rem;'>Your Public IP Address is</div>
                <div style='font-size:3rem; font-family:monospace; font-weight:bold; letter-spacing:2px; word-break:break-all;'>".htmlspecialchars($ip)."</div>
            </div>
            
            <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
                <table style='width:100%; border-collapse:collapse; text-align:left;'>
                    <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc; width:30%;'>IP Version</th><td style='padding:1rem;'>".(strpos($ip, ':') !== false ? 'IPv6' : 'IPv4')."</td></tr>
                    <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Reverse Hostname</th><td style='padding:1rem; word-break:break-all;'>".htmlspecialchars($host)."</td></tr>
                    <tr><th style='padding:1rem; background:#f8fafc;'>User Agent</th><td style='padding:1rem; word-break:break-word;'>".htmlspecialchars($ua)."</td></tr>
                </table>
            </div>
        </div>";
    }

    public function subnetCalc($data) {
        $ip = trim($data['ip'] ?? '192.168.1.0');
        $cidr = intval($data['cidr'] ?? 24);
        
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "<div style='color:red;'>Valid IPv4 Address Required.</div>";
        }
        if ($cidr < 0 || $cidr > 32) return "<div style='color:red;'>CIDR must be between 0 and 32.</div>";
        
        $ipLong = ip2long($ip);
        $maskLong = ~((1 << (32 - $cidr)) - 1);
        $networkLong = $ipLong & $maskLong;
        $broadcastLong = $networkLong | (~$maskLong);
        
        $netmask = long2ip($maskLong);
        $network = long2ip($networkLong);
        $broadcast = long2ip($broadcastLong);
        $firstHost = ($cidr == 31 || $cidr == 32) ? $network : long2ip($networkLong + 1);
        $lastHost = ($cidr == 31 || $cidr == 32) ? $broadcast : long2ip($broadcastLong - 1);
        $totalHosts = ($cidr == 31 || $cidr == 32) ? pow(2, 32 - $cidr) : max(0, pow(2, 32 - $cidr) - 2);
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc; width:40%;'>IP Address</th><td style='padding:1rem; font-family:monospace;'>$ip / $cidr</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Network Address</th><td style='padding:1rem; font-family:monospace;'>$network</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Usable Host Range</th><td style='padding:1rem; font-family:monospace;'>$firstHost - $lastHost</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Broadcast Address</th><td style='padding:1rem; font-family:monospace;'>$broadcast</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Subnet Mask</th><td style='padding:1rem; font-family:monospace;'>$netmask</td></tr>
                <tr><th style='padding:1rem; background:#f8fafc;'>Total Usable Hosts</th><td style='padding:1rem; font-weight:bold;'>".number_format($totalHosts)."</td></tr>
            </table>
        </div>";
    }

    public function pingTest($data) {
        $host = trim($data['host'] ?? '');
        if (empty($host)) return "<div style='color:red;'>Host required.</div>";
        
        // Sanitize
        $host = preg_replace('/^https?:\/\//i', '', $host);
        $host = preg_replace('/\/.*$/', '', $host);
        
        if (!filter_var($host, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) && !filter_var($host, FILTER_VALIDATE_IP)) {
            return "<div style='color:red;'>Invalid Host/IP format.</div>";
        }
        
        // PHP native ping can be unreliable without root. We use fsockopen to port 80/443 as a TCP ping fallback proxy.
        $ports = [443, 80];
        $time = 0;
        $success = false;
        
        foreach ($ports as $port) {
            $start = microtime(true);
            $fp = @fsockopen($host, $port, $errno, $errstr, 2);
            if ($fp) {
                $time = round((microtime(true) - $start) * 1000);
                fclose($fp);
                $success = true;
                break;
            }
        }
        
        if ($success) {
            return "
            <div style='text-align:center; padding:3rem; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; color:#166534;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>✅</div>
                <h3 style='margin-bottom:0.5rem;'>Server is Reachable</h3>
                <div style='font-size:1.5rem; font-family:monospace;'>Latency: <strong>{$time}ms</strong></div>
                <div style='font-size:0.875rem; margin-top:0.5rem; opacity:0.8;'>(TCP Ping on Port $port)</div>
            </div>";
        } else {
            return "
            <div style='text-align:center; padding:3rem; background:#fef2f2; border:1px solid #fecaca; border-radius:12px; color:#991b1b;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>❌</div>
                <h3 style='margin-bottom:0.5rem;'>Host Unreachable or Blocking Pings</h3>
                <div style='font-size:1rem;'>Could not connect via HTTP/HTTPS within 2 seconds.</div>
            </div>";
        }
    }

    public function portScanner($data) {
        $host = trim($data['host'] ?? '');
        if (empty($host)) return "<div style='color:red;'>Host required.</div>";
        
        $host = preg_replace('/^https?:\/\//i', '', $host);
        $host = preg_replace('/\/.*$/', '', $host);
        
        $ports = [
            21 => 'FTP', 22 => 'SSH', 23 => 'Telnet', 25 => 'SMTP', 53 => 'DNS', 
            80 => 'HTTP', 110 => 'POP3', 143 => 'IMAP', 443 => 'HTTPS', 3306 => 'MySQL', 3389 => 'RDP'
        ];
        
        $html = "<div style='display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:1rem;'>";
        
        foreach ($ports as $port => $service) {
            $fp = @fsockopen($host, $port, $errno, $errstr, 0.5); // Fast timeout 0.5s
            if ($fp) {
                fclose($fp);
                $html .= "<div style='padding:1rem; border:1px solid #bbf7d0; background:#f0fdf4; border-radius:8px; text-align:center;'>
                    <div style='font-weight:bold; color:#166534; font-size:1.2rem;'>Port $port</div>
                    <div style='color:#166534; font-size:0.875rem;'>$service - <span style='color:green;'>OPEN</span></div>
                </div>";
            } else {
                $html .= "<div style='padding:1rem; border:1px solid #fecaca; background:#fef2f2; border-radius:8px; text-align:center;'>
                    <div style='font-weight:bold; color:#991b1b; font-size:1.2rem;'>Port $port</div>
                    <div style='color:#991b1b; font-size:0.875rem;'>$service - <span style='color:red;'>CLOSED</span></div>
                </div>";
            }
        }
        $html .= "</div>";
        return $html;
    }

    public function sslChecker($data) {
        $domain = trim($data['domain'] ?? '');
        if (empty($domain)) return '';
        
        $domain = preg_replace('/^https?:\/\//i', '', $domain);
        $domain = preg_replace('/\/.*$/', '', $domain);
        
        $get = stream_context_create(["ssl" => ["capture_peer_cert" => true]]);
        $read = @stream_socket_client("ssl://".$domain.":443", $errno, $errstr, 5, STREAM_CLIENT_CONNECT, $get);
        
        if (!$read) {
            return "<div style='color:red; padding:1.5rem; background:#fef2f2; border:1px solid #fecaca; border-radius:8px;'>Could not connect to $domain via SSL/TLS. ($errstr)</div>";
        }
        
        $cert = stream_context_get_params($read);
        $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
        
        if (!$certinfo) {
            return "<div style='color:red; padding:1.5rem; background:#fef2f2; border:1px solid #fecaca; border-radius:8px;'>Could not read certificate data.</div>";
        }
        
        $issuer = is_array($certinfo['issuer']['O'] ?? null) ? implode(', ', $certinfo['issuer']['O']) : ($certinfo['issuer']['O'] ?? 'Unknown');
        $validFrom = date('Y-m-d H:i:s', $certinfo['validFrom_time_t']);
        $validTo = date('Y-m-d H:i:s', $certinfo['validTo_time_t']);
        $daysLeft = floor(($certinfo['validTo_time_t'] - time()) / 86400);
        $cn = $certinfo['subject']['CN'] ?? 'Unknown';
        
        $statusStr = $daysLeft > 0 ? "<span style='color:green;'>VALID ($daysLeft days left)</span>" : "<span style='color:red;'>EXPIRED</span>";
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <div style='padding:1.5rem; background:#f0fdf4; border-bottom:1px solid #bbf7d0; text-align:center;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>🔒</div>
                <h3 style='color:#166534; margin:0;'>SSL Certificate Found</h3>
            </div>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc; width:30%;'>Common Name (CN)</th><td style='padding:1rem;'>".htmlspecialchars($cn)."</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Issuer (CA)</th><td style='padding:1rem;'>".htmlspecialchars($issuer)."</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Valid From</th><td style='padding:1rem;'>$validFrom</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Valid Until</th><td style='padding:1rem;'>$validTo</td></tr>
                <tr><th style='padding:1rem; background:#f8fafc;'>Status</th><td style='padding:1rem; font-weight:bold;'>$statusStr</td></tr>
            </table>
        </div>";
    }

    public function http2Check($data) {
        $url = trim($data['url'] ?? '');
        if (empty($url)) return '';
        if (!preg_match('#^https?://#i', $url)) $url = 'https://' . $url;
        
        // Use CURL to check HTTP Version
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        if (defined('CURL_HTTP_VERSION_2_0')) {
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        }
        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        
        if ($response === false) {
             return "<div style='color:red; padding:1.5rem; background:#fef2f2; border:1px solid #fecaca; border-radius:8px;'>cURL Error: " . htmlspecialchars($error) . "</div>";
        }
        
        $isHttp2 = strpos($response, 'HTTP/2') !== false || strpos($response, 'HTTP/2.0') !== false;
        
        if ($isHttp2) {
            return "
            <div style='text-align:center; padding:3rem; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; color:#166534;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>⚡</div>
                <h3 style='margin-bottom:0.5rem;'>HTTP/2 is Supported!</h3>
                <div style='font-size:1rem;'>This website is using the faster HTTP/2 protocol.</div>
            </div>";
        } else {
             return "
            <div style='text-align:center; padding:3rem; background:#fff7ed; border:1px solid #fed7aa; border-radius:12px; color:#9a3412;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>⚠️</div>
                <h3 style='margin-bottom:0.5rem;'>HTTP/2 Not Detected</h3>
                <div style='font-size:1rem;'>This website appears to be using older HTTP/1.1 or the server doesn't negotiate ALPN to this client correctly.</div>
            </div>";
        }
    }

    public function passwordStrength($data) {
        $pass = $data['password'] ?? '';
        if ($pass === '') return '';
        
        $len = strlen($pass);
        $score = 0;
        
        if ($len > 8) $score++;
        if ($len > 12) $score++;
        if (preg_match('/[A-Z]/', $pass)) $score++;
        if (preg_match('/[a-z]/', $pass)) $score++;
        if (preg_match('/[0-9]/', $pass)) $score++;
        if (preg_match('/[^a-zA-Z0-9]/', $pass)) $score++;
        
        $colors = ['#ef4444', '#ef4444', '#f97316', '#eab308', '#84cc16', '#22c55e', '#15803d'];
        $labels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong', 'Very Strong', 'Excellent'];
        
        $score = min(6, $score);
        $color = $colors[$score];
        $label = $labels[$score];
        $pct = ($score / 6) * 100;
        
        return "
        <div style='padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='display:flex; justify-content:space-between; margin-bottom:0.5rem; font-weight:bold; font-size:1.2rem; color:var(--text-dark);'>
                <span>Strength: $label</span>
                <span>$len chars</span>
            </div>
            <div style='width:100%; height:12px; background:#e2e8f0; border-radius:6px; overflow:hidden;'>
                <div style='height:100%; width:$pct%; background:$color; transition:width 0.3s ease;'></div>
            </div>
            
            <div style='margin-top:2rem; display:grid; grid-template-columns:1fr 1fr; gap:1rem; font-size:0.9rem;'>
                <div>✓ Uppercase: <strong style='color:".(preg_match('/[A-Z]/', $pass)?'#22c55e':'#ef4444')."'>".(preg_match('/[A-Z]/', $pass)?'Yes':'No')."</strong></div>
                <div>✓ Lowercase: <strong style='color:".(preg_match('/[a-z]/', $pass)?'#22c55e':'#ef4444')."'>".(preg_match('/[a-z]/', $pass)?'Yes':'No')."</strong></div>
                <div>✓ Numbers: <strong style='color:".(preg_match('/[0-9]/', $pass)?'#22c55e':'#ef4444')."'>".(preg_match('/[0-9]/', $pass)?'Yes':'No')."</strong></div>
                <div>✓ Symbols: <strong style='color:".(preg_match('/[^a-zA-Z0-9]/', $pass)?'#22c55e':'#ef4444')."'>".(preg_match('/[^a-zA-Z0-9]/', $pass)?'Yes':'No')."</strong></div>
            </div>
        </div>";
    }

    public function ccValidator($data) {
        $cc = preg_replace('/\D/', '', $data['cc'] ?? '');
        if (empty($cc)) return '';
        
        // Luhn Check
        $sum = 0;
        $alt = false;
        for ($i = strlen($cc) - 1; $i >= 0; $i--) {
            $n = intval($cc[$i]);
            if ($alt) {
                $n *= 2;
                if ($n > 9) $n -= 9;
            }
            $sum += $n;
            $alt = !$alt;
        }
        $valid = ($sum % 10 == 0);
        
        // Issuer
        $issuer = 'Unknown';
        if (preg_match('/^4/', $cc)) $issuer = 'Visa';
        elseif (preg_match('/^5[1-5]/', $cc)) $issuer = 'Mastercard';
        elseif (preg_match('/^3[47]/', $cc)) $issuer = 'American Express';
        elseif (preg_match('/^6(?:011|5)/', $cc)) $issuer = 'Discover';
        
        if ($valid) {
            return "
            <div style='text-align:center; padding:2rem; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; color:#166534;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>✅</div>
                <h3 style='margin-bottom:0.5rem;'>Valid Credit Card Number</h3>
                <div style='font-size:1.2rem; margin-top:1rem;'>Issuer: <strong>$issuer</strong></div>
                <div style='font-size:0.875rem; color:#475569; margin-top:0.5rem;'>Luhn Check Passed</div>
            </div>";
        } else {
             return "
            <div style='text-align:center; padding:2rem; background:#fef2f2; border:1px solid #fecaca; border-radius:12px; color:#991b1b;'>
                <div style='font-size:3rem; margin-bottom:0.5rem;'>❌</div>
                <h3 style='margin-bottom:0.5rem;'>Invalid Credit Card Number</h3>
                <div style='font-size:0.875rem; color:#475569; margin-top:0.5rem;'>Luhn algorithm checksum failed.</div>
            </div>";
        }
    }

    public function uaParser($data) {
        $ua = trim($data['ua'] ?? '');
        if (empty($ua)) return '';
        
        $browser = 'Unknown';
        $os = 'Unknown';
        $device = 'Desktop';
        
        // Very basic parsing
        if (preg_match('/(?:MSIE |Trident\/.*; rv:)(\d+)/i', $ua)) $browser = 'Internet Explorer';
        elseif (preg_match('/Edge?\/\d+/i', $ua)) $browser = 'Edge';
        elseif (preg_match('/Chrome\/\d+/i', $ua)) $browser = 'Chrome';
        elseif (preg_match('/Firefox\/\d+/i', $ua)) $browser = 'Firefox';
        elseif (preg_match('/Safari\/\d+/i', $ua)) $browser = 'Safari';
        elseif (preg_match('/Opera\/\d+|OPR\/\d+/i', $ua)) $browser = 'Opera';
        
        if (preg_match('/Windows NT 10/i', $ua)) $os = 'Windows 10/11';
        elseif (preg_match('/Windows NT 6\.3/i', $ua)) $os = 'Windows 8.1';
        elseif (preg_match('/Windows NT 6\.2/i', $ua)) $os = 'Windows 8';
        elseif (preg_match('/Windows NT 6\.1/i', $ua)) $os = 'Windows 7';
        elseif (preg_match('/Mac OS X/i', $ua)) $os = 'Mac OS X';
        elseif (preg_match('/Linux/i', $ua)) $os = 'Linux';
        elseif (preg_match('/Android/i', $ua)) $os = 'Android';
        elseif (preg_match('/iOS|iPhone|iPad/i', $ua)) $os = 'iOS';
        
        if (preg_match('/Mobile|Android|iPhone/i', $ua)) $device = 'Mobile';
        if (preg_match('/iPad|Tablet/i', $ua)) $device = 'Tablet';
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc; width:30%;'>Browser</th><td style='padding:1rem;'>$browser</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Operating System</th><td style='padding:1rem;'>$os</td></tr>
                <tr style='border-bottom:1px solid var(--border);'><th style='padding:1rem; background:#f8fafc;'>Device Type</th><td style='padding:1rem;'>$device</td></tr>
                <tr><th style='padding:1rem; background:#f8fafc;'>Raw User Agent</th><td style='padding:1rem; word-break:break-word; font-family:monospace; font-size:0.875rem;'>".htmlspecialchars($ua)."</td></tr>
            </table>
        </div>";
    }

    public function dnsLookup($data) {
        $domain = trim($data['domain'] ?? '');
        if (empty($domain)) return '';
        
        $domain = preg_replace('/^https?:\/\//i', '', $domain);
        $domain = preg_replace('/\/.*$/', '', $domain);
        
        $records = [];
        $types = [DNS_A => 'A', DNS_AAAA => 'AAAA', DNS_MX => 'MX', DNS_NS => 'NS', DNS_TXT => 'TXT'];
        
        foreach ($types as $type => $label) {
            $res = @dns_get_record($domain, $type);
            if ($res) {
                foreach ($res as $r) {
                    $val = '';
                    if (isset($r['ip'])) $val = $r['ip'];
                    elseif (isset($r['ipv6'])) $val = $r['ipv6'];
                    elseif (isset($r['target'])) $val = $r['target'] . (isset($r['pri']) ? " (Priority: {$r['pri']})" : '');
                    elseif (isset($r['txt'])) $val = $r['txt'];
                    
                    if ($val) $records[] = ['type' => $label, 'value' => $val, 'ttl' => $r['ttl'] ?? '-'];
                }
            }
        }
        
        if (empty($records)) {
            return "<div style='color:red; padding:1.5rem; background:#fef2f2; border:1px solid #fecaca; border-radius:8px;'>No common DNS records found for $domain.</div>";
        }
        
        $html = "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden;'>
            <table style='width:100%; border-collapse:collapse; text-align:left;'>
                <tr style='border-bottom:2px solid var(--border); background:#f8fafc;'>
                    <th style='padding:1rem; width:20%;'>Type</th>
                    <th style='padding:1rem;'>Value</th>
                    <th style='padding:1rem; width:20%;'>TTL</th>
                </tr>";
                
        foreach ($records as $r) {
            $html .= "<tr style='border-bottom:1px solid var(--border);'>
                <td style='padding:1rem; font-weight:bold; color:var(--primary);'>{$r['type']}</td>
                <td style='padding:1rem; word-break:break-all; font-family:monospace;'>".htmlspecialchars($r['value'])."</td>
                <td style='padding:1rem; color:var(--text-muted);'>{$r['ttl']}</td>
            </tr>";
        }
        
        $html .= "</table></div>";
        return $html;
    }

}
