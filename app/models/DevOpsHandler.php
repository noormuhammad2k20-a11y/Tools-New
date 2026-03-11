<?php

class DevOpsHandler extends Model {

    public function jwtDecoder($data) {
        $jwt = trim($data['jwt'] ?? '');
        $parts = explode('.', $jwt);
        
        if (count($parts) !== 3) return "<div style='color:red;'>Invalid JWT format. Must contain exactly 3 dot-separated parts (Header.Payload.Signature).</div>";
        
        $header = base64_decode(strtr($parts[0], '-_', '+/'));
        $payload = base64_decode(strtr($parts[1], '-_', '+/'));
        
        $hJson = @json_decode($header, true) ? json_encode(json_decode($header, true), JSON_PRETTY_PRINT) : 'Invalid JSON';
        $pJson = @json_decode($payload, true) ? json_encode(json_decode($payload, true), JSON_PRETTY_PRINT) : 'Invalid JSON';
        
        return "
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;'>
            <div>
                <h4 style='color:#ef4444; margin-bottom:0.5rem;'>HEADER (Algorithm & Token Type)</h4>
                <textarea class='form-control' rows='6' readonly style='font-family:monospace; background:#fef2f2; color:#991b1b;'>" . htmlspecialchars($hJson) . "</textarea>
            </div>
            <div>
                <h4 style='color:#8b5cf6; margin-bottom:0.5rem;'>PAYLOAD (Data)</h4>
                <textarea class='form-control' rows='12' readonly style='font-family:monospace; background:#f5f3ff; color:#5b21b6;'>" . htmlspecialchars($pJson) . "</textarea>
            </div>
            <div style='grid-column:span 2;'>
                <h4 style='color:#0ea5e9; margin-bottom:0.5rem;'>SIGNATURE</h4>
                <textarea class='form-control' rows='3' readonly style='font-family:monospace; background:#f0f9ff; color:#0369a1;'>" . htmlspecialchars($parts[2]) . "</textarea>
            </div>
        </div>";
    }

    public function base32Encoding($data) {
        $input = trim($data['data'] ?? '');
        $action = $data['action'] ?? 'encode';
        if ($input === '') return '';
        
        // Simple Base32 alphabet (RFC 4648)
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
        
        if ($action === 'encode') {
            $output = '';
            $binary = '';
            for ($i = 0; $i < strlen($input); $i++) {
                $binary .= str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
            }
            $binary = str_pad($binary, ceil(strlen($binary) / 5) * 5, '0', STR_PAD_RIGHT);
            for ($i = 0; $i < strlen($binary); $i += 5) {
                $output .= $alphabet[bindec(substr($binary, $i, 5))];
            }
            $pad = (8 - (strlen($output) % 8)) % 8;
            $output .= str_repeat('=', $pad);
        } else {
            $input = strtoupper(str_replace('=', '', $input));
            $binary = '';
            for ($i = 0; $i < strlen($input); $i++) {
                $pos = strpos($alphabet, $input[$i]);
                if ($pos === false) return "<div style='color:red;'>Invalid Base32 string.</div>";
                $binary .= str_pad(decbin($pos), 5, '0', STR_PAD_LEFT);
            }
            $output = '';
            for ($i = 0; $i < strlen($binary) - 7; $i += 8) {
                $output .= chr(bindec(substr($binary, $i, 8)));
            }
        }
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($output) . "</textarea>";
    }

    public function bcryptGenerator($data) {
        $str = $data['string'] ?? '';
        $cost = intval($data['rounds'] ?? 10);
        
        if ($cost < 4 || $cost > 31) return "<div style='color:red;'>Cost must be between 4 and 31. Higher = slower.</div>";
        
        $start = microtime(true);
        $hash = password_hash($str, PASSWORD_BCRYPT, ['cost' => $cost]);
        $end = microtime(true);
        
        $time = round(($end - $start) * 1000); // ms
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Generated Bcrypt Hash</div>
            <textarea class='form-control' rows='3' readonly style='font-family:monospace; font-size:1.5rem; text-align:center; color:var(--primary); font-weight:bold;'>$hash</textarea>
            <div style='margin-top:1.5rem; font-size:0.9rem; color:var(--text-muted);'>
                Time taken to generate (Cost = $cost): <strong>{$time}ms</strong>
            </div>
        </div>";
    }

    public function simpleHashGenerator($data, $args) {
        $str = $data['string'] ?? '';
        $algo = $args['algo'] ?? 'md5';
        
        $hash = hash($algo, $str);
        $algoName = strtoupper($algo);
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>$algoName Hash</div>
            <textarea class='form-control' rows='3' readonly style='font-family:monospace; font-size:1.5rem; text-align:center; color:var(--primary); font-weight:bold;'>$hash</textarea>
            <div style='margin-top:1.5rem; font-size:0.9rem; color:var(--text-muted);'>
                Length: <strong>" . strlen($hash) . " chars</strong>
            </div>
        </div>";
    }

    public function chmodCalculator($data) {
        $oR = isset($data['owner_r']) ? 4 : 0;
        $oW = isset($data['owner_w']) ? 2 : 0;
        $oX = isset($data['owner_x']) ? 1 : 0;
        
        $gR = isset($data['group_r']) ? 4 : 0;
        $gW = isset($data['group_w']) ? 2 : 0;
        $gX = isset($data['group_x']) ? 1 : 0;
        
        $pR = isset($data['public_r']) ? 4 : 0;
        $pW = isset($data['public_w']) ? 2 : 0;
        $pX = isset($data['public_x']) ? 1 : 0;
        
        $owner = $oR + $oW + $oX;
        $group = $gR + $gW + $gX;
        $public = $pR + $pW + $pX;
        
        $num = "$owner$group$public";
        
        $chmodStr = "-";
        $chmodStr .= ($oR ? 'r' : '-').($oW ? 'w' : '-').($oX ? 'x' : '-');
        $chmodStr .= ($gR ? 'r' : '-').($gW ? 'w' : '-').($gX ? 'x' : '-');
        $chmodStr .= ($pR ? 'r' : '-').($pW ? 'w' : '-').($pX ? 'x' : '-');
        
        return "
        <div style='display:flex; justify-content:center; gap:2rem; margin-top:1rem;'>
            <div style='text-align:center;'>
                <div style='color:var(--text-muted); font-size:0.9rem; margin-bottom:0.5rem; text-transform:uppercase;'>Numeric Value</div>
                <div style='font-size:4rem; font-family:monospace; font-weight:bold; color:var(--primary); background:var(--bg); border:1px solid var(--border); padding:0 2rem; border-radius:12px;'>0{$num}</div>
            </div>
            <div style='text-align:center;'>
                <div style='color:var(--text-muted); font-size:0.9rem; margin-bottom:0.5rem; text-transform:uppercase;'>Symbolic Notation</div>
                <div style='font-size:4rem; font-family:monospace; font-weight:bold; color:#10b981; background:var(--bg); border:1px solid var(--border); padding:0 2rem; border-radius:12px;'>{$chmodStr}</div>
            </div>
        </div>
        <div style='margin-top:2rem; text-align:center; color:var(--text-muted); font-family:monospace;'>
            Usage: <code>chmod 0$num filename</code>
        </div>";
    }

    public function crontabGenerator($data) {
        $m = trim($data['min'] ?? '*');
        $h = trim($data['hour'] ?? '*');
        $dom = trim($data['day'] ?? '*');
        $mon = trim($data['month'] ?? '*');
        $dow = trim($data['weekday'] ?? '*');
        
        $cmd = trim($data['command'] ?? '');
        if (empty($cmd)) $cmd = "/usr/bin/php /path/to/script.php";
        
        $cron = "$m $h $dom $mon $dow $cmd";
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
            <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;'>Crontab Expression</div>
            <div style='background:#1e293b; color:#10b981; font-family:monospace; font-size:1.5rem; padding:1.5rem; border-radius:8px; overflow-x:auto; white-space:nowrap;'>
                $cron
            </div>
            <div style='margin-top:1.5rem;'>
                <button class='btn-primary' onclick='navigator.clipboard.writeText(\"".addslashes($cron)."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy to Clipboard\", 2000);'>Copy to Clipboard</button>
            </div>
        </div>";
    }

    public function dockerfileGenerator($data) {
        $stack = $data['stack'] ?? 'php';
        $port = intval($data['port'] ?? 80);
        
        $df = "";
        if ($stack == 'php') {
            $df = "FROM php:8.2-apache\n\n# Enable Apache mod_rewrite\nRUN a2enmod rewrite\n\n# Install extensions\nRUN docker-php-ext-install pdo pdo_mysql\n\n# Copy source code\nCOPY . /var/www/html/\n\n# Set permissions\nRUN chown -R www-data:www-data /var/www/html\n\nEXPOSE $port\nCMD [\"apache2-foreground\"]";
        } elseif ($stack == 'node') {
            $df = "FROM node:18-alpine\n\n# Create app directory\nWORKDIR /usr/src/app\n\n# Install app dependencies\nCOPY package*.json ./\nRUN npm install --production\n\n# Bundle app source\nCOPY . .\n\nEXPOSE $port\nCMD [\"npm\", \"start\"]";
        } elseif ($stack == 'python') {
            $df = "FROM python:3.11-slim\n\nWORKDIR /app\n\nCOPY requirements.txt requirements.txt\nRUN pip3 install -r requirements.txt\n\nCOPY . .\n\nEXPOSE $port\nCMD [\"python3\", \"-m\", \"flask\", \"run\", \"--host=0.0.0.0\", \"--port=$port\"]";
        }
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px;'>
            <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;'>
                <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px;'>Generated Dockerfile</div>
                <button class='btn-outline btn-sm' onclick='navigator.clipboard.writeText(document.getElementById(\"df-out\").value); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
            </div>
            <textarea id='df-out' class='form-control' rows='12' readonly style='font-family:monospace; background:#1e293b; color:#cbd5e1; border:none;'>" . htmlspecialchars($df) . "</textarea>
        </div>";
    }

    public function htaccessGenerator($data) {
        $https = ($data['force_https'] ?? 'no') === 'yes';
        $www = ($data['force_www'] ?? 'no') === 'yes';
        $idx = ($data['prevent_indexing'] ?? 'no') === 'yes';
        
        $ht = "<IfModule mod_rewrite.c>\nRewriteEngine On\n";
        
        if ($https) {
            $ht .= "\n# Force HTTPS\nRewriteCond %{HTTPS} off\nRewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]\n";
        }
        
        if ($www) {
            $ht .= "\n# Force WWW\nRewriteCond %{HTTP_HOST} !^www\. [NC]\nRewriteRule ^(.*)$ http%{ENV:protossl}://www.%{HTTP_HOST}/$1 [L,R=301]\n";
        }
        
        $ht .= "</IfModule>\n";
        
        if ($idx) {
            $ht .= "\n# Prevent Directory Indexing\nOptions -Indexes\n";
        }
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px;'>
            <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;'>
                <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px;'>.htaccess Rules</div>
                <button class='btn-outline btn-sm' onclick='navigator.clipboard.writeText(document.getElementById(\"ht-out\").value); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
            </div>
            <textarea id='ht-out' class='form-control' rows='12' readonly style='font-family:monospace; background:#1e293b; color:#cbd5e1; border:none;'>" . htmlspecialchars($ht) . "</textarea>
        </div>";
    }

    public function xmlFormatter($data) {
        $xml = trim($data['xml'] ?? '');
        if (empty($xml)) return '';
        
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        
        $success = @$dom->loadXML($xml);
        if (!$success) return "<div style='color:red;'>Invalid XML Format.</div>";
        
        $out = $dom->saveXML();
        return "<textarea class='form-control' rows='15' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function yamlFormatter($data) {
        $yaml = trim($data['yaml'] ?? '');
        if (empty($yaml)) return '';
        
        if (!function_exists('yaml_parse')) {
            return "<div style='color:red;'>YAML PHP Extension not installed on server. Enable it or use JS.</div>";
        }
        
        $parsed = @yaml_parse($yaml);
        if ($parsed === false) return "<div style='color:red;'>Invalid YAML Format.</div>";
        
        $out = yaml_emit($parsed);
        return "<textarea class='form-control' rows='15' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function sqlFormatter($data) {
        $sql = trim($data['sql'] ?? '');
        if (empty($sql)) return '';
        
        // Basic regex based formatter since we don't have a giant AST parser library
        $sql = preg_replace('/\s+/', ' ', $sql);
        $reserved = ['SELECT', 'FROM', 'WHERE', 'AND', 'OR', 'ORDER BY', 'GROUP BY', 'HAVING', 'LIMIT', 'OFFSET', 'LEFT JOIN', 'RIGHT JOIN', 'INNER JOIN', 'OUTER JOIN', 'JOIN', 'ON', 'INSERT INTO', 'VALUES', 'UPDATE', 'SET', 'DELETE FROM', 'CREATE TABLE', 'ALTER TABLE', 'DROP TABLE'];
        
        foreach ($reserved as $r) {
            $sql = preg_replace("/\b(?i)($r)\b/", "\n$1", $sql);
        }
        
        $sql = trim(preg_replace('/\n+/', "\n", $sql));
        $sql = str_replace(',', ",\n    ", $sql);
        
        return "<textarea class='form-control' rows='15' readonly style='font-family:monospace; background:#f8fafc; color:#334155;'>" . htmlspecialchars($sql) . "</textarea>";
    }

    public function urlParser($data) {
        $url = trim($data['url'] ?? '');
        if (empty($url)) return '';
        
        // Add scheme if missing to help parse_url
        if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
            $url = "http://" . $url;
        }
        
        $parsed = parse_url($url);
        if ($parsed === false) return "<div style='color:red;'>Could not parse URL.</div>";
        
        $html = "<table style='width:100%; border-collapse:collapse; background:var(--bg); border:1px solid var(--border); border-radius:8px; overflow:hidden;'>
            <tr style='background:#f8fafc;'><th style='padding:1rem; text-align:left; width:30%;'>Component</th><th style='padding:1rem; text-align:left;'>Value</th></tr>";
            
        $keys = ['scheme' => 'Protocol', 'host' => 'Domain Name', 'port' => 'Port', 'user' => 'Username', 'pass' => 'Password', 'path' => 'Path', 'query' => 'Query String', 'fragment' => 'Hash / Fragment'];
        
        foreach ($keys as $k => $label) {
            if (isset($parsed[$k])) {
                $html .= "<tr style='border-top:1px solid var(--border);'><td style='padding:1rem; font-weight:bold; color:var(--text-muted);'>$label</td><td style='padding:1rem; font-family:monospace; color:var(--primary);'>" . htmlspecialchars($parsed[$k]) . "</td></tr>";
            }
        }
        $html .= "</table>";
        
        if (isset($parsed['query'])) {
            parse_str($parsed['query'], $params);
            if (!empty($params)) {
                $html .= "<h4 style='margin-top:2rem; margin-bottom:1rem;'>Query Parameters</h4>
                <table style='width:100%; border-collapse:collapse; border:1px solid var(--border); border-radius:8px; overflow:hidden;'>";
                foreach ($params as $pk => $pv) {
                    $html .= "<tr style='border-top:1px solid var(--border);'><td style='padding:0.75rem 1rem; width:30%; font-weight:bold;'>".htmlspecialchars($pk)."</td><td style='padding:0.75rem 1rem; font-family:monospace;'>".htmlspecialchars(is_array($pv)?json_encode($pv):$pv)."</td></tr>";
                }
                $html .= "</table>";
            }
        }
        
        return $html;
    }

    public function htmlEntityTool($data, $args) {
        $html = $data['html'] ?? '';
        $mode = $args['mode'] ?? 'encode';
        
        if ($mode == 'encode') {
            $out = htmlentities($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        } else {
            $out = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function hexStringTool($data, $args) {
        $str = trim($data['data'] ?? '');
        $mode = $args['mode'] ?? 'str2hex';
        
        if (empty($str)) return '';
        
        if ($mode == 'str2hex') {
            $hex = bin2hex($str);
            $out = chunk_split($hex, 2, ' ');
        } else {
            $str = preg_replace('/\s+/', '', $str); // remove spaces
            if (!preg_match('/^[0-9a-fA-F]+$/', $str)) return "<div style='color:red;'>Invalid Hex String. Only 0-9 and A-F allowed.</div>";
            $out = hex2bin($str);
            if ($out === false) return "<div style='color:red;'>Could not decode hex string. Ensure even number of characters.</div>";
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function binaryStringTool($data) {
        $str = trim($data['data'] ?? '');
        $mode = $data['mode'] ?? 'txt2bin';
        
        if (empty($str)) return '';
        
        if ($mode == 'txt2bin') {
            $out = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $out .= str_pad(decbin(ord($str[$i])), 8, '0', STR_PAD_LEFT) . ' ';
            }
        } else {
            $str = preg_replace('/[^01]/', '', $str); // Strip everything but 1s and 0s
            $out = '';
            $chunks = str_split($str, 8);
            foreach ($chunks as $chunk) {
                if (strlen($chunk) == 8) $out .= chr(bindec($chunk));
            }
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars(trim($out)) . "</textarea>";
    }

    public function asciiTextTool($data) {
        $str = trim($data['data'] ?? '');
        if (empty($str)) return '';
        
        // Mode is always ascii2txt here based on registry for this specific tool
        $parts = preg_split('/[\s,]+/', $str);
        $out = '';
        foreach ($parts as $p) {
            if (is_numeric($p) && $p >= 0 && $p <= 255) {
                $out .= chr($p);
            }
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function octalTextTool($data) {
        $str = trim($data['data'] ?? '');
        if (empty($str)) return '';
        
        $parts = preg_split('/[\s,]+/', $str);
        $out = '';
        foreach ($parts as $p) {
            if (preg_match('/^[0-7]+$/', $p)) {
                $out .= chr(octdec($p));
            }
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function unicodeTextTool($data) {
        $str = trim($data['data'] ?? '');
        $mode = $data['mode'] ?? 'txt2uni';
        if (empty($str)) return '';
        
        if ($mode == 'txt2uni') {
            $out = '';
            $str = mb_convert_encoding($str, 'UTF-16BE', 'UTF-8');
            for ($i = 0; $i < mb_strlen($str, '8bit'); $i += 2) {
                $out .= '\u' . str_pad(dechex(ord($str[$i]) << 8 | ord($str[$i + 1])), 4, '0', STR_PAD_LEFT);
            }
        } else {
            // uni2txt
            $out = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
            }, $str);
        }
        
        return "<textarea class='form-control' rows='10' readonly style='font-family:monospace;'>" . htmlspecialchars($out) . "</textarea>";
    }

    public function dataFormatConverter($data, $args) {
        $in = trim($data['data'] ?? '');
        $from = $args['from'] ?? '';
        $to = $args['to'] ?? '';
        
        if (empty($in)) return '';
        
        $arr = null;
        $error = "";
        
        // PARSE
        if ($from == 'json') {
            $arr = json_decode($in, true);
            if (json_last_error() !== JSON_ERROR_NONE) $error = "Invalid JSON input.";
        } elseif ($from == 'yaml') {
            if (!function_exists('yaml_parse')) return "<div style='color:red;'>YAML PHP extension missing.</div>";
            $arr = @yaml_parse($in);
            if ($arr === false) $error = "Invalid YAML input.";
        } elseif ($from == 'xml') {
            $xmlNode = @simplexml_load_string($in, 'SimpleXMLElement', LIBXML_NOCDATA);
            if ($xmlNode === false) $error = "Invalid XML input.";
            else $arr = json_decode(json_encode($xmlNode), true);
        } elseif ($from == 'csv') {
            $lines = explode("\n", str_replace("\r", "", $in));
            $headers = str_getcsv(array_shift($lines));
            $arr = [];
            foreach ($lines as $line) {
                if (empty(trim($line))) continue;
                $row = str_getcsv($line);
                if (count($headers) == count($row)) {
                    $arr[] = array_combine($headers, $row);
                }
            }
            if (empty($arr)) $error = "Invalid CSV or missing headers.";
        }
        
        if (!empty($error) || $arr === null) return "<div style='color:red;'>$error</div>";
        
        // EMIT
        $out = "";
        if ($to == 'json') {
            $out = json_encode($arr, JSON_PRETTY_PRINT);
        } elseif ($to == 'yaml') {
            if (!function_exists('yaml_emit')) return "<div style='color:red;'>YAML PHP extension missing.</div>";
            $out = yaml_emit($arr);
        } elseif ($to == 'xml') {
            // Very simple multidimensional array to XML recursive builder
            $xml = new SimpleXMLElement('<root/>');
            array_walk_recursive($arr, function($value, $key) use ($xml) {
                // If numeric keys, wrap in <item>
                $k = is_numeric($key) ? "item_$key" : preg_replace('/[^a-z0-9_-]/i', '', $key);
                if (empty($k)) $k = "item";
                $xml->addChild($k, htmlspecialchars((string)$value));
            });
            $dom = dom_import_simplexml($xml)->ownerDocument;
            $dom->formatOutput = true;
            $out = $dom->saveXML();
        }
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px;'>
            <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;'>
                <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px;'>Converted Result (" . strtoupper($to) . ")</div>
                <button class='btn-outline btn-sm' onclick='navigator.clipboard.writeText(document.getElementById(\"conv-out\").value); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
            </div>
            <textarea id='conv-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#f8fafc; border:none; color:#0f172a;'>" . htmlspecialchars($out) . "</textarea>
        </div>";
    }

    public function jsObfuscator($data) {
        $code = trim($data['code'] ?? '');
        if (empty($code)) return '';
        
        // A robust JavaScript obfuscator in PHP is impossible in ~100 lines.
        // We will do a basic minifier + hex string replacement as a "light" obfuscation demonstration.
        // Remove simple comments
        $code = preg_replace('!^[ \t]*/\*.*?\*/[ \t]*[\r\n]!s', '', $code);
        $code = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $code);
        // Remove newlines and tabs
        $code = str_replace(["\r\n", "\r", "\n", "\t"], " ", $code);
        // Replace multiple spaces
        $code = preg_replace('/ {2,}/', ' ', $code);
        
        // Simple hex string obscuring for literal strings (basic regex, breaks on complex nested strings, but works for simple demo scripts)
        $code = preg_replace_callback('/"(.*?)"|\'(.*?)\'/', function($m) {
            $str = !empty($m[1]) ? $m[1] : (!empty($m[2]) ? $m[2] : '');
            $hex = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $hex .= '\x' . dechex(ord($str[$i]));
            }
            return "'" . $hex . "'";
        }, $code);
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px;'>
            <div style='margin-bottom:1rem; color:#d97706; background:#fef3c7; padding:1rem; border-radius:8px;'>
                Note: This is a basic minifier/string-hex encoder. For production-grade AST logic obfuscation, use a dedicated client-side library like <code>javascript-obfuscator</code>.
            </div>
            <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;'>
                <div style='font-size:1.2rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px;'>Obfuscated Output</div>
                <button class='btn-primary btn-sm' onclick='navigator.clipboard.writeText(document.getElementById(\"js-out\").value); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Code\", 2000);'>Copy Code</button>
            </div>
            <textarea id='js-out' class='form-control' rows='12' readonly style='font-family:monospace; background:#1e293b; color:#10b981; border:none;'>" . htmlspecialchars($code) . "</textarea>
        </div>";
    }

}
