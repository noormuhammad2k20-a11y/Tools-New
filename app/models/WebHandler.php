<?php

class WebHandler extends Model {
    
    public function uaParser($data) {
        $ua = trim($data['text'] ?? '');
        if ($ua === '') return "<div style='color:red;'>User Agent string is required.</div>";
        
        $browser = 'Unknown';
        $os = 'Unknown';
        $device = 'Desktop';
        
        // Basic naive regex parsing
        if (preg_match('/Mobi|Android|iPhone|iPad|iPod/', $ua)) $device = 'Mobile/Tablet';
        if (preg_match('/Windows NT 10.0/', $ua)) $os = 'Windows 10/11';
        elseif (preg_match('/Windows NT 6.3/', $ua)) $os = 'Windows 8.1';
        elseif (preg_match('/Windows NT 6.2/', $ua)) $os = 'Windows 8';
        elseif (preg_match('/Windows NT 6.1/', $ua)) $os = 'Windows 7';
        elseif (preg_match('/Mac OS X ([0-9_]+)/', $ua, $matches)) $os = 'macOS ' . str_replace('_', '.', $matches[1]);
        elseif (preg_match('/Android ([0-9.]+)/', $ua, $matches)) $os = 'Android ' . $matches[1];
        elseif (preg_match('/Linux/', $ua)) $os = 'Linux';
        
        if (preg_match('/Firefox\/([0-9.]+)/', $ua, $matches)) $browser = 'Firefox ' . $matches[1];
        elseif (preg_match('/Edg\/([0-9.]+)/', $ua, $matches)) $browser = 'Edge ' . $matches[1];
        elseif (preg_match('/OPR\/([0-9.]+)/', $ua, $matches)) $browser = 'Opera ' . $matches[1];
        elseif (preg_match('/Chrome\/([0-9.]+)/', $ua, $matches)) $browser = 'Chrome ' . $matches[1];
        elseif (preg_match('/Version\/([0-9.]+).*Safari/', $ua, $matches)) $browser = 'Safari ' . $matches[1];
        elseif (preg_match('/rv:11.0/', $ua)) $browser = 'Internet Explorer 11';
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Browser: <strong style='font-size:1.25rem; color:var(--text-dark);'>$browser</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Operating System: <strong style='font-size:1.25rem; color:var(--text-dark);'>$os</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Device Type: <strong style='font-size:1.25rem; color:var(--text-dark);'>$device</strong></div>
        </div>";
    }

    public function ogGenerator($data) {
        $title = htmlspecialchars(trim($data['title'] ?? ''));
        $desc = htmlspecialchars(trim($data['desc'] ?? ''));
        $url = htmlspecialchars(trim($data['url'] ?? ''));
        $image = htmlspecialchars(trim($data['image'] ?? ''));
        
        $html = "<!-- Open Graph Meta Tags -->\n";
        $html .= "<meta property=\"og:title\" content=\"$title\">\n";
        $html .= "<meta property=\"og:description\" content=\"$desc\">\n";
        $html .= "<meta property=\"og:url\" content=\"$url\">\n";
        $html .= "<meta property=\"og:image\" content=\"$image\">\n";
        $html .= "<meta property=\"og:type\" content=\"website\">";
        
        return $this->formatResult($html);
    }

    public function twitterCard($data) {
        $title = htmlspecialchars(trim($data['title'] ?? ''));
        $desc = htmlspecialchars(trim($data['desc'] ?? ''));
        $type = htmlspecialchars(trim($data['card_type'] ?? 'summary'));
        $site = htmlspecialchars(trim($data['site'] ?? ''));
        $image = htmlspecialchars(trim($data['image'] ?? ''));
        
        $html = "<!-- Twitter Meta Cards -->\n";
        $html .= "<meta name=\"twitter:card\" content=\"$type\">\n";
        $html .= "<meta name=\"twitter:title\" content=\"$title\">\n";
        $html .= "<meta name=\"twitter:description\" content=\"$desc\">\n";
        if ($site) $html .= "<meta name=\"twitter:site\" content=\"$site\">\n";
        if ($image) $html .= "<meta name=\"twitter:image\" content=\"$image\">";
        
        return $this->formatResult(trim($html));
    }

    public function robotsTxt($data) {
        $delay = trim($data['delay'] ?? '');
        $sitemap = trim($data['sitemap'] ?? '');
        $disallow = trim($data['disallow'] ?? '');
        
        $txt = "User-agent: *\n";
        if ($delay !== '') $txt .= "Crawl-delay: $delay\n";
        
        $dirs = explode("\n", $disallow);
        foreach ($dirs as $dir) {
            $dir = trim($dir);
            if ($dir !== '') $txt .= "Disallow: $dir\n";
        }
        
        if ($sitemap !== '') $txt .= "\nSitemap: $sitemap";
        
        return $this->formatResult(trim($txt));
    }

    public function htaccessGen($data) {
        $https = $data['https'] ?? 'no';
        $www = $data['www'] ?? 'none';
        $domain = trim($data['domain'] ?? 'example.com');
        
        $txt = "<IfModule mod_rewrite.c>\nRewriteEngine On\n";
        
        if ($https === 'yes') {
            $txt .= "\n# Force HTTPS\n";
            $txt .= "RewriteCond %{HTTPS} off\n";
            $txt .= "RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n";
        }
        
        if ($www === 'www') {
            $txt .= "\n# Force WWW\n";
            $txt .= "RewriteCond %{HTTP_HOST} !^www\. [NC]\n";
            $txt .= "RewriteRule ^(.*)$ http".($https==='yes'?'s':'')."://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n";
        } elseif ($www === 'nonwww') {
            $txt .= "\n# Force Non-WWW\n";
            $txt .= "RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]\n";
            $txt .= "RewriteRule ^(.*)$ http".($https==='yes'?'s':'')."://%1%{REQUEST_URI} [L,R=301]\n";
        }
        
        $txt .= "</IfModule>";
        
        return $this->formatResult($txt);
    }

    public function utmBuilder($data) {
        $url = trim($data['url'] ?? '');
        $source = trim($data['source'] ?? '');
        $medium = trim($data['medium'] ?? '');
        $campaign = trim($data['campaign'] ?? '');
        
        if ($url === '') return "<div style='color:red;'>Destination URL is required.</div>";
        
        $sep = strpos($url, '?') !== false ? '&' : '?';
        $final = $url . $sep . http_build_query([
            'utm_source' => $source,
            'utm_medium' => $medium,
            'utm_campaign' => $campaign
        ]);
        
        return $this->formatResult($final);
    }

    public function htpasswdGen($data) {
        $user = trim($data['user'] ?? '');
        $pass = trim($data['pass'] ?? '');
        if ($user === '' || $pass === '') return "<div style='color:red;'>Username and password are required.</div>";
        
        $hash = crypt($pass, base64_encode($pass));
        return $this->formatResult("$user:$hash");
    }

    public function dnsLookup($data) {
        $domain = trim($data['text'] ?? '');
        $domain = preg_replace('#^https?://#', '', $domain);
        $domain = rtrim($domain, '/');
        
        if (empty($domain)) return "<div style='color:red;'>Domain is required.</div>";
        
        $records = @dns_get_record($domain, DNS_ALL);
        if ($records === false || empty($records)) {
            return "<div style='color:red;'>Failed to retrieve DNS records for $domain. It may not exist.</div>";
        }
        
        $html = "<table style='width:100%; text-align:left; border-collapse:collapse;'>";
        $html .= "<tr style='background:var(--bg-body);'><th style='padding:0.5rem;'>Type</th><th style='padding:0.5rem;'>Host</th><th style='padding:0.5rem;'>Target / Value</th><th style='padding:0.5rem;'>TTL</th></tr>";
        
        foreach ($records as $rec) {
            $type = $rec['type'] ?? '';
            $host = $rec['host'] ?? '';
            $ttl = $rec['ttl'] ?? '';
            $target = $rec['target'] ?? $rec['ip'] ?? $rec['ipv6'] ?? $rec['mname'] ?? $rec['txt'] ?? json_encode($rec);
            
            $html .= "<tr>
                <td style='padding:0.5rem; border-bottom:1px solid var(--border); font-weight:bold;'>$type</td>
                <td style='padding:0.5rem; border-bottom:1px solid var(--border);'>$host</td>
                <td style='padding:0.5rem; border-bottom:1px solid var(--border); word-break:break-all;'>$target</td>
                <td style='padding:0.5rem; border-bottom:1px solid var(--border);'>$ttl</td>
            </tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function httpHeaders($data) {
        $url = trim($data['text'] ?? '');
        if (!preg_match('#^https?://#i', $url)) $url = 'http://' . $url;
        
        stream_context_set_default(['http' => ['method' => 'HEAD', 'timeout' => 5]]);
        $headers = @get_headers($url);
        
        if ($headers === false) {
            return "<div style='color:red;'>Failed to fetch headers. Ensure the URL is valid and reachable.</div>";
        }
        
        return $this->formatResult(implode("\n", $headers));
    }

    public function slugGen($data) {
        $text = trim($data['text'] ?? '');
        $text = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
        return $this->formatResult($text);
    }

    public function schemaGen($data) {
        $type = $data['type'] ?? 'Article';
        $name = trim($data['name'] ?? '');
        $url = trim($data['url'] ?? '');
        $image = trim($data['image'] ?? '');
        
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $name,
            'url' => $url
        ];
        
        if ($image !== '') $schema['image'] = $image;
        if ($type === 'Article') {
            $schema['headline'] = $name;
        }
        
        $json = json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $html = "<script type=\"application/ld+json\">\n$json\n</script>";
        return $this->formatResult($html);
    }

    public function mailtoGen($data) {
        $email = trim($data['email'] ?? '');
        $subject = trim($data['subject'] ?? '');
        $body = trim($data['body'] ?? '');
        
        if ($email === '') return "<div style='color:red;'>Email is required.</div>";
        
        $url = "mailto:$email";
        $params = [];
        if ($subject !== '') $params['subject'] = $subject;
        if ($body !== '') $params['body'] = $body;
        
        if (!empty($params)) {
             $url .= '?' . http_build_query($params);
        }
        
        return "
        <div style='margin-bottom:1rem;'><a href=\"$url\" class='btn btn-primary' style='text-decoration:none;'>Test Mailto Link</a></div>
        " . $this->formatResult("<a href=\"$url\">Send Email</a>");
    }

    public function whoisLookup($data) {
        $domain = trim($data['text'] ?? '');
        $domain = preg_replace('#^https?://#', '', $domain);
        $domain = rtrim($domain, '/');
        
        if (empty($domain)) return "<div style='color:red;'>Domain is required.</div>";
        
        $tld = substr(strrchr($domain, "."), 1);
        $server = "whois.verisign-grs.com";
        if ($tld === 'org') $server = 'whois.pir.org';
        elseif ($tld === 'io') $server = 'whois.nic.io';
        elseif ($tld === 'co') $server = 'whois.nic.co';
        
        $fp = @fsockopen($server, 43, $errno, $errstr, 5);
        if (!$fp) return "<div style='color:red;'>WHOIS lookup failed (connection to $server timed out).</div>";
        
        fwrite($fp, $domain . "\r\n");
        $out = "";
        while (!feof($fp)) {
            $out .= fgets($fp, 128);
        }
        fclose($fp);
        
        return "<pre style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid #e2e8f0; color:#1e293b; overflow-x:auto;'><code>" . htmlspecialchars(trim($out)) . "</code></pre>";
    }

    public function base64ToImage($data) {
        $b64 = trim($data['text'] ?? '');
        if ($b64 === '') return "<div style='color:red;'>Valid base64 string required.</div>";
        
        preg_match('#^data:image/\w+;base64,#i', $b64, $matches);
        if (!empty($matches)) {
            $b64 = substr($b64, strlen($matches[0]));
        }
        
        $decoded = base64_decode($b64, true);
        if ($decoded === false) return "<div style='color:red;'>Decoding failed. Ensure string is valid Base64 without unexpected characters.</div>";
        
        $src = "data:image/jpeg;base64," . base64_encode($decoded);
        
        return "
        <div style='text-align:center;'>
            <img src=\"$src\" style='max-width:100%; border-radius:8px; border:1px solid var(--border); box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);' />
        </div>";
    }

    public function mimeLookup($data) {
        $ext = trim(strtolower($data['text'] ?? ''));
        $ext = ltrim($ext, '.');
        
        $mimes = [
            'html' => 'text/html', 'css' => 'text/css', 'js' => 'application/javascript', 'json' => 'application/json',
            'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif', 'svg' => 'image/svg+xml',
            'pdf' => 'application/pdf', 'zip' => 'application/zip', 'mp3' => 'audio/mpeg', 'mp4' => 'video/mp4', 'csv' => 'text/csv'
        ];
        
        if (isset($mimes[$ext])) {
            return "
            <div style='text-align:center;'>
                <div style='font-size:2rem; font-weight:800; color:var(--primary); background:#f8fafc; padding:1.5rem; border:1px solid var(--border); border-radius:12px;'>{$mimes[$ext]}</div>
            </div>";
        } else {
            return "<div style='color:var(--text-muted);'>MIME type for .$ext not explicitly found. Often it is <strong>application/octet-stream</strong>.</div>";
        }
    }

    private function formatResult($string) {
        return "<textarea class='form-control' rows='6' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars($string) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Code</button>";
    }
}
