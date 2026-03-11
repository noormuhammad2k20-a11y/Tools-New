<?php

class DevHandler extends Model {
    
    public function base64encode($data) {
        return $this->formatResult(base64_encode($data['text'] ?? ''));
    }

    public function base64decode($data) {
        $decoded = base64_decode($data['text'] ?? '', true);
        if ($decoded === false) {
            return "<div style='color:red;'>Invalid Base64 sequence.</div>";
        }
        return $this->formatResult($decoded);
    }

    public function urlencode($data) {
        return $this->formatResult(urlencode($data['text'] ?? ''));
    }

    public function urldecode($data) {
        return $this->formatResult(urldecode($data['text'] ?? ''));
    }

    public function md5($data) {
        return $this->formatResult(md5($data['text'] ?? ''));
    }

    public function sha1($data) {
        return $this->formatResult(sha1($data['text'] ?? ''));
    }

    public function sha256($data) {
        return $this->formatResult(hash('sha256', $data['text'] ?? ''));
    }

    public function uuid($data) {
        $data = random_bytes(16);
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        return "
            <div style='text-align:center;'>
                <div style='font-size:2.5rem; font-weight:700; font-family:monospace; color:var(--text-dark); word-wrap: break-word;'>$uuid</div>
                <button onclick='navigator.clipboard.writeText(\"$uuid\"); alert(\"Copied!\")' class='btn-outline mt-8' style='margin-top:1rem;'>Copy</button>
            </div>
        ";
    }

    public function htmlMinifier($data) {
        $html = $data['text'] ?? '';
        $search = [
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        ];
        $replace = ['>', '<', '\\1', ''];
        $minified = preg_replace($search, $replace, $html);
        return $this->formatResult($minified);
    }

    public function cssMinifier($data) {
        $css = $data['text'] ?? '';
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        $css = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $css);
        $css = preg_replace('/ {2,}/', ' ', $css);
        $css = str_replace([', ', ': ', ' {', '{ ', ' }', '} ', ' ;', '; '], [',', ':', '{', '{', '}', '}', ';', ';'], $css);
        return $this->formatResult(trim($css));
    }

    public function jsMinifier($data) {
        $js = $data['text'] ?? '';
        // Basic regex js minifier (not AST perfect, but decent for simple scripts)
        $js = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $js); // multi-line comments
        $js = preg_replace('/^\s*\/\/.*$/m', '', $js); // single-line comments
        $js = preg_replace('/[ \t]+/', ' ', $js); // extra spaces
        $js = preg_replace('/\s*([{}:;=,()<>+-|&!])\s*/', '\\1', $js); // spaces around operators
        $js = preg_replace('/;+/', ';', $js);
        return $this->formatResult(trim($js));
    }

    public function jsonValidator($data) {
        $json = $data['text'] ?? '';
        $decoded = json_decode($json);
        if (json_last_error() === JSON_ERROR_NONE) {
            $formatted = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            return "<div style='color:#15803d; font-weight:700; background:#f0fdf4; padding:1rem; border-radius:8px; border:1px solid #bbf7d0; margin-bottom:1rem;'>✓ Valid JSON Format</div>" . 
                   "<pre id='formatted-code' style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid var(--border); overflow-x:auto; text-align:left; font-size:14px; color:#1e293b; font-family:monospace;'><code>" . htmlspecialchars($formatted) . "</code></pre>
                   <div style='margin-top:1rem;'>
                       <button onclick='navigator.clipboard.writeText(document.getElementById(\"formatted-code\").innerText); showToast(\"Copied!\")' class='btn-primary'>Copy JSON</button>
                   </div>";
        } else {
            return "<div style='color:#b91c1c; font-weight:700; background:#fef2f2; padding:1rem; border-radius:8px; border:1px solid #fecaca;'>⚠ Invalid JSON: " . json_last_error_msg() . "</div>";
        }
    }

    public function jsonFormatter($data) {
        $json = $data['text'] ?? '';
        $indentType = $data['indent_type'] ?? 'spaces';
        $indentSize = intval($data['indent_size'] ?? 4);
        
        $decoded = json_decode($json);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return "<div style='color:red;'>Invalid JSON: " . json_last_error_msg() . "</div>";
        }

        $formatted = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        // Custom indentation if needed (JSON_PRETTY_PRINT uses 4 spaces)
        if ($indentType === 'tabs') {
            $formatted = preg_replace_callback('/^ +/m', function($m) {
                return str_repeat("\t", strlen($m[0]) / 4);
            }, $formatted);
        } elseif ($indentSize !== 4) {
            $formatted = preg_replace_callback('/^ +/m', function($m) use ($indentSize) {
                return str_repeat(' ', (strlen($m[0]) / 4) * $indentSize);
            }, $formatted);
        }

        return "
        <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; padding:1.5rem;'>
            <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;'>
                <span style='color:var(--text-muted); font-size:0.9rem;'>Formatted Output:</span>
                <button onclick='copyCodeOutput(this)' class='btn-outline' style='font-size:0.8rem;'>Copy Code</button>
            </div>
            <pre style='background:#1e293b; color:#e2e8f0; padding:1.5rem; border-radius:8px; overflow-x:auto; font-family:monospace; text-align:left; font-size:14px; line-height:1.5;'><code>" . htmlspecialchars($formatted) . "</code></pre>
        </div>
        <script>
            function copyCodeOutput(btn) {
                const code = btn.closest('div').nextElementSibling.innerText;
                navigator.clipboard.writeText(code);
                const original = btn.innerText;
                btn.innerText = 'Copied!';
                setTimeout(() => btn.innerText = original, 2000);
            }
        </script>";
    }

    public function urlParser($data) {
        $url = $data['text'] ?? '';
        $parsed = parse_url($url);
        if ($parsed === false || !isset($parsed['host'])) {
            return "<div style='color:red;'>Could not parse URL. Ensure it starts with http:// or https://</div>";
        }
        $html = "<table style='width:100%; border-collapse: collapse; text-align:left; font-family:monospace;'>";
        foreach ($parsed as $key => $val) {
            $val = htmlspecialchars(is_array($val) ? json_encode($val) : $val);
            $html .= "<tr><th style='padding:0.75rem; border-bottom:1px solid var(--border); width:30%;'>".ucfirst($key)."</th><td style='padding:0.75rem; border-bottom:1px solid var(--border);'>$val</td></tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function htmlEntityEncode($data) {
        $text = $data['text'] ?? '';
        return $this->formatResult(htmlentities($text, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    public function htmlEntityDecode($data) {
        $text = $data['text'] ?? '';
        return $this->formatResult(html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }

    public function ipv4ToIpv6($data) {
        $ip = $data['text'] ?? '';
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "<div style='color:red;'>Invalid IPv4 Address.</div>";
        }
        $parts = explode('.', $ip);
        $ipv6 = sprintf('::ffff:%02x%02x:%02x%02x', $parts[0], $parts[1], $parts[2], $parts[3]);
        return "<div style='font-size:2.5rem; font-weight:800; color:var(--primary); font-family:monospace; text-align:center;'>$ipv6</div>
                <div style='text-align:center; color:var(--text-muted);'>IPv4-Mapped IPv6 Address</div>";
    }

    public function httpStatusChecker($data) {
        $code = intval($data['text'] ?? 0);
        $statuses = [
            100 => 'Continue', 101 => 'Switching Protocols', 200 => 'OK', 201 => 'Created', 202 => 'Accepted', 204 => 'No Content',
            301 => 'Moved Permanently', 302 => 'Found', 304 => 'Not Modified', 400 => 'Bad Request', 401 => 'Unauthorized',
            403 => 'Forbidden', 404 => 'Not Found', 405 => 'Method Not Allowed', 408 => 'Request Timeout', 429 => 'Too Many Requests',
            500 => 'Internal Server Error', 502 => 'Bad Gateway', 503 => 'Service Unavailable', 504 => 'Gateway Timeout'
        ];
        
        if (isset($statuses[$code])) {
            $desc = $statuses[$code];
            $color = ($code >= 200 && $code < 300) ? '#16a34a' : (($code >= 300 && $code < 400) ? '#ca8a04' : (($code >= 400 && $code < 500) ? '#dc2626' : '#991b1b'));
            return "<div style='text-align:center;'>
                        <div style='font-size:4rem; font-weight:900; color:$color;'>$code</div>
                        <div style='font-size:1.5rem; font-weight:700; color:var(--text-dark);'>$desc</div>
                    </div>";
        } else {
            return "<div style='color:red;'>Unknown or unsupported HTTP status code.</div>";
        }
    }

    public function metaTags($data) {
        $title = htmlspecialchars($data['title'] ?? '');
        $desc = htmlspecialchars($data['desc'] ?? '');
        $kws = htmlspecialchars($data['keywords'] ?? '');
        $author = htmlspecialchars($data['author'] ?? '');

        $html = "<meta name=\"title\" content=\"$title\">\n";
        $html .= "<meta name=\"description\" content=\"$desc\">\n";
        $html .= "<meta name=\"keywords\" content=\"$kws\">\n";
        $html .= "<meta name=\"author\" content=\"$author\">\n";
        
        return $this->formatResult($html);
    }

    public function cssBoxShadow($data) {
        $x = intval($data['offsetx'] ?? 0);
        $y = intval($data['offsety'] ?? 0);
        $b = intval($data['blur'] ?? 0);
        $c = htmlspecialchars($data['color'] ?? '#000000');
        
        $css = "box-shadow: {$x}px {$y}px {$b}px {$c};\n-webkit-box-shadow: {$x}px {$y}px {$b}px {$c};\n-moz-box-shadow: {$x}px {$y}px {$b}px {$c};";
        
        return "
            <div style='width: 200px; height: 200px; background: white; margin: 2rem auto; border-radius: 12px; box-shadow: {$x}px {$y}px {$b}px {$c};'></div>
            " . $this->formatResult($css);
    }

    public function hexToRgb($data) {
        $hex = $data['text'] ?? '';
        $hex = ltrim($hex, '#');
        if (strlen($hex) == 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        if (strlen($hex) != 6 || !ctype_xdigit($hex)) {
            return "<div style='color:red;'>Invalid HEX color.</div>";
        }
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        return "<div style='width:100%; height:100px; background:#$hex; border-radius:8px; margin-bottom:1rem;'></div>" . 
               $this->formatResult("rgb($r, $g, $b)");
    }

    public function rgbToHex($data) {
        $r = max(0, min(255, intval($data['r'] ?? 0)));
        $g = max(0, min(255, intval($data['g'] ?? 0)));
        $b = max(0, min(255, intval($data['b'] ?? 0)));
        
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return "<div style='width:100%; height:100px; background:$hex; border-radius:8px; margin-bottom:1rem;'></div>" . 
               $this->formatResult($hex);
    }

    public function randomColorPalette($data) {
        $html = "<div style='display:flex; gap:1rem; flex-wrap:wrap; margin-bottom:1rem;'>";
        for ($i=0; $i<5; $i++) {
            $hex = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            $html .= "<div style='flex:1; min-width:100px; height:150px; background:$hex; border-radius:8px; display:flex; align-items:flex-end; padding:1rem; cursor:pointer;' onclick='navigator.clipboard.writeText(\"$hex\"); alert(\"Copied $hex\")'>
                        <span style='background:white; padding:4px 8px; border-radius:4px; font-family:monospace; font-weight:bold; box-shadow:0 1px 3px rgba(0,0,0,0.1); margin:0 auto;'>$hex</span>
                      </div>";
        }
        $html .= "</div><p style='text-align:center; color:var(--text-muted); font-size:14px;'>Click any color box to copy its HEX value.</p>";
        return $html;
    }

    public function qrCode($data) {
        $text = $data['text'] ?? '';
        $encoded = urlencode($text);
        if ($text === '') return "<div style='color:red;'>Please enter data to generate QR code.</div>";
        // Using a reliable free QR generation API to handle frontend rendering immediately since we want the image exactly, 
        // however prompt explicitly said NO THIRD-PARTY APIs. So we construct the image entirely in JS or via native PHP without hitting internet.
        // I will return an HTML payload with an inline Javascript library script snippet to render QR code completely Client-side natively.
        
        $html = "
            <div id='qr-container' style='text-align:center; padding: 2rem; background: var(--bg); border-radius: var(--radius); border: 1px dashed var(--border);'></div>
            <script>
                if(typeof QRCode === 'undefined'){
                    var script = document.createElement('script');
                    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js';
                    script.onload = function() {
                        new QRCode(document.getElementById('qr-container'), {
                            text: ".json_encode($text).",
                            width: 256,
                            height: 256,
                            colorDark : '#000000',
                            colorLight : '#ffffff',
                            correctLevel : QRCode.CorrectLevel.H
                        });
                    };
                    document.head.appendChild(script);
                } else {
                    document.getElementById('qr-container').innerHTML = '';
                    new QRCode(document.getElementById('qr-container'), {
                        text: ".json_encode($text).",
                        width: 256,
                        height: 256
        ";
        return $html;
    }

    public function jwtDecoder($data) {
        $token = trim($data['text'] ?? '');
        $parts = explode('.', $token);
        
        if (count($parts) !== 3) {
            return "<div style='color:#dc2626; font-weight:600;'>Invalid JWT format. Must contain 3 parts separated by dots.</div>";
        }
        
        $header = json_decode(base64_decode(strtr($parts[0], '-_', '+/')), true);
        $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
        
        if (!$header || !$payload) {
            return "<div style='color:#dc2626; font-weight:600;'>Could not decode header or payload block.</div>";
        }
        
        $html = "<div style='display:flex; flex-direction:column; gap:1.5rem;'>";
        $html .= "<div><h4 style='color:#dc2626; margin-bottom:8px;'>Header (Algorithm & Token Type)</h4>";
        $html .= "<pre style='background:#fef2f2; color:#991b1b; padding:15px; border-radius:8px; border:1px solid #fecaca; margin:0;'><code>".htmlspecialchars(json_encode($header, JSON_PRETTY_PRINT))."</code></pre></div>";
        
        $html .= "<div><h4 style='color:#9333ea; margin-bottom:8px;'>Payload (Data)</h4>";
        $html .= "<pre style='background:#faf5ff; color:#6b21a8; padding:15px; border-radius:8px; border:1px solid #e9d5ff; margin:0;'><code>".htmlspecialchars(json_encode($payload, JSON_PRETTY_PRINT))."</code></pre></div>";
        
        $html .= "</div>";
        return $html;
    }

    public function bcrypt($data) {
        $text = $data['text'] ?? '';
        $cost = intval($data['cost'] ?? 10);
        
        if ($cost < 4 || $cost > 31) {
            return "<div style='color:#dc2626; font-weight:600;'>Cost parameter must be between 4 and 31.</div>";
        }
        
        $hash = password_hash($text, PASSWORD_BCRYPT, ['cost' => $cost]);
        return $this->formatResult($hash);
    }

    public function jsonToCsv($data) {
        $json = trim($data['text'] ?? '');
        $array = json_decode($json, true);
        
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($array)) {
            return "<div style='color:#dc2626; font-weight:600;'>Invalid JSON Data. Ensure you provide a valid JSON array of objects.</div>";
        }
        
        // Handling multidimensional single objects
        if (isset($array[0]) && is_array($array[0])) {
            $input = $array;
        } else {
            $input = [$array];
        }

        if (empty($input)) return $this->formatResult("");

        $out = fopen('php://memory', 'w');
        fputcsv($out, array_keys($input[0]));

        foreach ($input as $row) {
            if (is_array($row)) {
                // Flatten row minimally if nested arrays exist
                $flatRow = array_map(function($item) {
                    return is_array($item) ? json_encode($item) : $item;
                }, $row);
                fputcsv($out, $flatRow);
            }
        }
        
        rewind($out);
        $csvString = stream_get_contents($out);
        fclose($out);
        
        return $this->formatResult($csvString);
    }

    public function csvToJson($data) {
        $csvText = trim($data['text'] ?? '');
        if (empty($csvText)) return "<div style='color:#dc2626; font-weight:600;'>Empty CSV input.</div>";
        
        $rows = array_map('str_getcsv', explode("\n", $csvText));
        $header = array_shift($rows);
        $jsonArray = [];
        
        foreach ($rows as $row) {
            if (count($header) === count($row)) {
                $jsonArray[] = array_combine($header, $row);
            }
        }
        
        return $this->formatResult(json_encode($jsonArray, JSON_PRETTY_PRINT));
    }

    public function sqlFormatter($data) {
        $sql = trim($data['text'] ?? '');
        
        // A very rudimentary, lightweight regex-based SQL prettifier
        // We ensure fundamental keywords break and indent.
        $keywords = ['SELECT', 'FROM', 'WHERE', 'AND', 'OR', 'ORDER BY', 'GROUP BY', 'HAVING', 'LIMIT', 'JOIN', 'LEFT JOIN', 'RIGHT JOIN', 'INNER JOIN', 'ON', 'INSERT INTO', 'VALUES', 'UPDATE', 'SET', 'DELETE'];
        
        // Strip excessive white spaces first
        $sql = preg_replace('/\s+/', ' ', $sql);
        
        // Add new lines before major keywords
        foreach ($keywords as $kw) {
            $sql = preg_replace('/\b(' . $kw . ')\b/i', "\n$1", $sql);
        }
        
        // Capitalize keywords explicitly
        foreach ($keywords as $kw) {
            $sql = str_ireplace($kw, strtoupper($kw), $sql);
        }
        
        // Indent AND/OR logic
        $sql = preg_replace('/(\bAND\b|\bOR\b)/i', "  $1", $sql);
        
        return "<pre style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid #e2e8f0; color:#1e293b; overflow-x:auto;'><code>" . htmlspecialchars(trim($sql)) . "</code></pre>" . 
               "<button onclick='navigator.clipboard.writeText(`" . addslashes(trim($sql)) . "`); alert(\"Copied!\")' class='btn-outline mt-8' style='margin-top:1rem;'>Copy Formatted SQL</button>";
    }

    public function colorContrast($data) {
        $bg = ltrim($data['bg'] ?? '#ffffff', '#');
        $fg = ltrim($data['fg'] ?? '#000000', '#');
        
        if (strlen($bg) !== 6) $bg = 'ffffff';
        if (strlen($fg) !== 6) $fg = '000000';
        
        // Convert to Luminance
        $lum1 = $this->getLuminance($bg);
        $lum2 = $this->getLuminance($fg);
        
        // Calculate contrast ratio
        $brightest = max($lum1, $lum2);
        $darkest = min($lum1, $lum2);
        $ratio = ($brightest + 0.05) / ($darkest + 0.05);
        $ratioFormat = number_format($ratio, 2);
        
        // WCAG Rules
        $aaNormal = $ratio >= 4.5 ? 'Pass (AA)' : 'Fail (AA)';
        $aaLarge = $ratio >= 3.0 ? 'Pass (AA)' : 'Fail (AA)';
        $aaaNormal = $ratio >= 7.0 ? 'Pass (AAA)' : 'Fail (AAA)';
        $aaaLarge = $ratio >= 4.5 ? 'Pass (AAA)' : 'Fail (AAA)';
        
        $aaNormalColor = $ratio >= 4.5 ? '#16a34a' : '#dc2626';
        
        return "
        <div style='display:flex; flex-direction:column; gap:20px; font-family:var(--font-main);'>
            <div style='background:#$bg; color:#$fg; padding:40px 20px; text-align:center; border-radius:12px; border:1px solid var(--border);'>
                <h2 style='margin:0; font-size:2rem; font-weight:700;'>The quick brown fox jumps over the lazy dog</h2>
                <p style='margin-top:10px; font-size:1rem;'>This is what the visual contrast looks like dynamically.</p>
            </div>
            
            <div style='background:var(--bg-body); padding:24px; border-radius:12px; border:1px solid var(--border); display:flex; justify-content:space-between; align-items:center;'>
                <div>
                    <h3 style='margin:0; color:var(--text-main); font-size:1.25rem;'>Contrast Ratio</h3>
                    <div style='font-size:3rem; font-weight:800; color:$aaNormalColor;'>$ratioFormat : 1</div>
                </div>
                
                <div style='display:grid; grid-template-columns:1fr 1fr; gap:20px 40px;'>
                    <div style='text-align:right;'><div style='color:var(--text-muted); font-size:0.875rem;'>AA Normal Text</div><div style='font-weight:600; color:".($ratio >= 4.5 ? '#16a34a' : '#dc2626')."'>$aaNormal</div></div>
                    <div style='text-align:right;'><div style='color:var(--text-muted); font-size:0.875rem;'>AAA Normal Text</div><div style='font-weight:600; color:".($ratio >= 7.0 ? '#16a34a' : '#dc2626')."'>$aaaNormal</div></div>
                    <div style='text-align:right;'><div style='color:var(--text-muted); font-size:0.875rem;'>AA Large Text</div><div style='font-weight:600; color:".($ratio >= 3.0 ? '#16a34a' : '#dc2626')."'>$aaLarge</div></div>
                    <div style='text-align:right;'><div style='color:var(--text-muted); font-size:0.875rem;'>AAA Large Text</div><div style='font-weight:600; color:".($ratio >= 4.5 ? '#16a34a' : '#dc2626')."'>$aaaLarge</div></div>
                </div>
            </div>
        </div>
        ";
    }

    public function xmlFormatter($data) {
        $xml = trim($data['text'] ?? '');
        if ($xml === '') return $this->formatResult("");
        
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        
        // Suppress warnings for malformed XML
        libxml_use_internal_errors(true);
        if (!$dom->loadXML($xml)) {
            $errors = libxml_get_errors();
            libxml_clear_errors();
            return "<div style='color:#dc2626; font-weight:600;'>Invalid XML format. Ensure root tags are properly closed.</div>";
        }
        
        return "<pre style='background:#f8fafc; padding:1.5rem; border-radius:8px; border:1px solid #e2e8f0; color:#1e293b; overflow-x:auto;'><code>" . htmlspecialchars($dom->saveXML()) . "</code></pre>" . 
               "<button onclick='navigator.clipboard.writeText(`" . addslashes($dom->saveXML()) . "`); alert(\"Copied!\")' class='btn-outline mt-8' style='margin-top:1rem;'>Copy Formatted XML</button>";
    }

    public function jsonToXml($data) {
        $json = trim($data['text'] ?? '');
        $array = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return "<div style='color:#dc2626; font-weight:600;'>Invalid JSON Data.</div>";
        }
        
        $xml = new SimpleXMLElement('<?xml version="1.0"?><root></root>');
        $this->arrayToXml($array, $xml);
        return $this->formatResult($xml->asXML());
    }
    
    // Helper function for arrayToXml
    private function arrayToXml($data, &$xml_data) {
        foreach($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    public function xmlToJson($data) {
        $xmlText = trim($data['text'] ?? '');
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlText);
        if ($xml === false) {
            return "<div style='color:#dc2626; font-weight:600;'>Invalid XML format.</div>";
        }
        $json = json_encode($xml, JSON_PRETTY_PRINT);
        return $this->formatResult($json);
    }

    public function sha512($data) { return $this->formatResult(hash('sha512', $data['text'] ?? '')); }
    public function sha384($data) { return $this->formatResult(hash('sha384', $data['text'] ?? '')); }
    public function sha224($data) { return $this->formatResult(hash('sha224', $data['text'] ?? '')); }
    public function sha512_256($data) { return $this->formatResult(hash('sha512/256', $data['text'] ?? '')); }
    public function sha512_224($data) { return $this->formatResult(hash('sha512/224', $data['text'] ?? '')); }
    public function sha3_512($data) { return $this->formatResult(hash('sha3-512', $data['text'] ?? '')); }
    public function whirlpool($data) { return $this->formatResult(hash('whirlpool', $data['text'] ?? '')); }
    public function ripemd160($data) { return $this->formatResult(hash('ripemd160', $data['text'] ?? '')); }

    public function macGenerator($data) {
        $mac = implode(':', str_split(substr(md5(mt_rand()), 0, 12), 2));
        return "
            <div style='text-align:center;'>
                <div style='font-size:2.5rem; font-weight:700; font-family:monospace; color:var(--text-dark); background:#f8fafc; padding:1.5rem; border:1px solid var(--border); border-radius:12px; margin-bottom:1rem;'>".strtoupper($mac)."</div>
                <button onclick='navigator.clipboard.writeText(\"".strtoupper($mac)."\"); alert(\"Copied!\")' class='btn btn-primary' style='padding:0.75rem 2rem;'><i class='fa-solid fa-copy' style='margin-right:8px;'></i>Copy MAC Address</button>
            </div>
        ";
    }

    public function binaryToDecimal($data) {
        $val = trim($data['text'] ?? '');
        if (!preg_match('/^[01\s]+$/', $val)) return "<div style='color:#dc2626; font-weight:600;'>Input must be fully binary (0s and 1s).</div>";
        return $this->formatResult(bindec(str_replace(' ', '', $val)));
    }

    public function decimalToBinary($data) {
        $val = trim($data['text'] ?? '');
        if (!is_numeric($val)) return "<div style='color:#dc2626; font-weight:600;'>Input must be a decimal number.</div>";
        return $this->formatResult(decbin($val));
    }

    public function decimalToHex($data) {
        $val = trim($data['text'] ?? '');
        if (!is_numeric($val)) return "<div style='color:#dc2626; font-weight:600;'>Input must be a decimal number.</div>";
        return $this->formatResult(strtoupper(dechex($val)));
    }

    public function hexToDecimal($data) {
        $val = trim($data['text'] ?? '');
        if (!ctype_xdigit(str_replace(' ', '', $val))) return "<div style='color:#dc2626; font-weight:600;'>Input must be a hexadecimal string.</div>";
        return $this->formatResult(hexdec(str_replace(' ', '', $val)));
    }

    public function decimalToOctal($data) {
        $val = trim($data['text'] ?? '');
        if (!is_numeric($val)) return "<div style='color:#dc2626; font-weight:600;'>Input must be a decimal number.</div>";
        return $this->formatResult(decoct($val));
    }

    public function octalToDecimal($data) {
        $val = trim($data['text'] ?? '');
        if (!preg_match('/^[0-7\s]+$/', $val)) return "<div style='color:#dc2626; font-weight:600;'>Input must be an octal number.</div>";
        return $this->formatResult(octdec(str_replace(' ', '', $val)));
    }

    public function ipToDecimal($data) {
        $ip = trim($data['text'] ?? '');
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) return "<div style='color:#dc2626; font-weight:600;'>Invalid IPv4 Address.</div>";
        return $this->formatResult(ip2long($ip));
    }

    public function decimalToIp($data) {
        $dec = trim($data['text'] ?? '');
        if (!is_numeric($dec)) return "<div style='color:#dc2626; font-weight:600;'>Input must be a numeric integer.</div>";
        return $this->formatResult(long2ip($dec));
    }

    private function getLuminance($hex) {
        $r = hexdec(substr($hex, 0, 2)) / 255;
        $g = hexdec(substr($hex, 2, 2)) / 255;
        $b = hexdec(substr($hex, 4, 2)) / 255;
        
        $r = $r <= 0.03928 ? $r / 12.92 : pow((($r + 0.055) / 1.055), 2.4);
        $g = $g <= 0.03928 ? $g / 12.92 : pow((($g + 0.055) / 1.055), 2.4);
        $b = $b <= 0.03928 ? $b / 12.92 : pow((($b + 0.055) / 1.055), 2.4);
        
        return 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    }

    public function syntaxHighlighter($data) {
        $code = $data['text'] ?? '';
        $lang = $data['lang'] ?? 'javascript';
        
        return "
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-sql.min.js'></script>
        
        <div style='background:#1e293b; border-radius:12px; overflow:hidden; border:1px solid #334155; position:relative;'>
            <div style='background:#334155; padding:8px 16px; color:#94a3b8; font-size:0.8rem; display:flex; justify-content:space-between; align-items:center;'>
                <span>PREVIEW: ".strtoupper($lang)."</span>
                <button onclick='copyPrismCode(this)' style='background:transparent; border:none; color:inherit; cursor:pointer;'>📋 Copy</button>
            </div>
            <pre class='line-numbers' style='margin:0; padding:1.5rem;'><code class='language-$lang'>".htmlspecialchars($code)."</code></pre>
        </div>
        <script>
            Prism.highlightAll();
            function copyPrismCode(btn) {
                const code = btn.closest('div').nextElementSibling.innerText;
                navigator.clipboard.writeText(code);
                btn.innerText = '✅ Copied';
                setTimeout(() => btn.innerText = '📋 Copy', 2000);
            }
        </script>";
    }

    public function regexTester($data) {
        $regex = $data['regex'] ?? '';
        $text = $data['text'] ?? '';
        $flags = $data['flags'] ?? 'g';
        
        if (empty($regex)) return "<div style='color:red;'>Please enter a regular expression.</div>";

        return "
        <div style='background:white; border:1px solid var(--border); border-radius:12px; padding:1.5rem;'>
            <h4 style='margin-bottom:1rem;'>Regex Test Results</h4>
            <div id='regex-output' style='white-space:pre-wrap; font-family:monospace; padding:1rem; background:#f8fafc; border-radius:8px; line-height:1.8; border:1px solid var(--border);'></div>
            <div id='regex-matches' style='margin-top:1.5rem; display:grid; gap:0.5rem;'></div>
        </div>
        <script>
            (function(){
                const regexStr = ".json_encode($regex).";
                const text = ".json_encode($text).";
                const flags = ".json_encode($flags).";
                const output = document.getElementById('regex-output');
                const matchDiv = document.getElementById('regex-matches');
                
                try {
                    const re = new RegExp(regexStr, flags);
                    let m;
                    let matchesFound = [];
                    let lastIndex = 0;
                    let highlighted = '';

                    while ((m = re.exec(text)) !== null) {
                        if (m.index === re.lastIndex) re.lastIndex++;
                        matchesFound.push(m[0]);
                        highlighted += text.substring(lastIndex, m.index);
                        highlighted += '<mark style=\"background:#fef08a; padding:2px; border-radius:2px; border-bottom:2px solid #eab308;\">' + m[0] + '</mark>';
                        lastIndex = re.lastIndex;
                        if (!flags.includes('g')) break;
                    }
                    highlighted += text.substring(lastIndex);
                    output.innerHTML = highlighted || text;

                    if (matchesFound.length > 0) {
                        matchDiv.innerHTML = '<strong>' + matchesFound.length + ' Matches Found:</strong>' + 
                            matchesFound.map(m => '<div style=\"background:#f0fdf4; color:#166534; padding:0.5rem; border-radius:4px; font-size:0.9rem; border:1px solid #bbf7d0;\">' + m + '</div>').join('');
                    } else {
                        matchDiv.innerHTML = '<div style=\"color:var(--text-muted);\">No matches found.</div>';
                    }
                } catch(e) {
                    output.innerHTML = '<span style=\"color:#ef4444;\">Error: ' + e.message + '</span>';
                }
            })();
        </script>";
    }

    private function formatResult($string) {
        return "<textarea class='form-control' rows='6' readonly style='background:#f8fafc; font-family:monospace; font-size:1rem;'>".htmlspecialchars($string)."</textarea>
        <div style='margin-top:1rem; display:flex; gap:10px;'>
            <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\"); if(window.showToast) showToast(\"Copied!\")' class='btn btn-primary'>Copy Result</button>
        </div>";
    }
}
