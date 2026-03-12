<?php

class ConverterHandler extends Model {

    public function hexToAscii($data) {
        $hex = str_replace(' ', '', trim($data['text'] ?? ''));
        if (empty($hex)) return "<div style='color:red;'>Hex string required.</div>";
        if (!ctype_xdigit($hex)) return "<div style='color:red;'>Invalid Hex characters.</div>";
        
        $ascii = '';
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $ascii .= chr(hexdec(substr($hex, $i, 2)));
        }
        return $this->formatResult($ascii);
    }

    public function asciiToHex($data) {
        $text = $data['text'] ?? '';
        if ($text === '') return "<div style='color:red;'>ASCII text required.</div>";
        
        $hex = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $hex .= str_pad(dechex(ord($text[$i])), 2, '0', STR_PAD_LEFT) . ' ';
        }
        return $this->formatResult(trim(strtoupper($hex)));
    }

    public function rgbToHex($data) {
        $r = intval($data['r'] ?? 0);
        $g = intval($data['g'] ?? 0);
        $b = intval($data['b'] ?? 0);
        
        $r = max(0, min(255, $r));
        $g = max(0, min(255, $g));
        $b = max(0, min(255, $b));
        
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $this->formatColorResult(strtoupper($hex), $hex);
    }

    public function hexToRgb($data) {
        $hex = ltrim(trim($data['hex'] ?? ''), '#');
        if (strlen($hex) == 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }
        if (strlen($hex) != 6 || !ctype_xdigit($hex)) return "<div style='color:red;'>Invalid HEX color code.</div>";
        
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        $rgb = "rgb($r, $g, $b)";
        return $this->formatColorResult($rgb, "#$hex");
    }

    public function rgbToHsl($data) {
        $r = intval($data['r'] ?? 0) / 255;
        $g = intval($data['g'] ?? 0) / 255;
        $b = intval($data['b'] ?? 0) / 255;
        
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $l = ($max + $min) / 2;
        
        $h = 0; $s = 0;
        if ($max != $min) {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch ($max) {
                case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break;
                case $g: $h = ($b - $r) / $d + 2; break;
                case $b: $h = ($r - $g) / $d + 4; break;
            }
            $h /= 6;
        }
        
        $h = round($h * 360);
        $s = round($s * 100);
        $l = round($l * 100);
        
        $hsl = "hsl($h, $s%, $l%)";
        $hex = sprintf("#%02x%02x%02x", $r*255, $g*255, $b*255);
        
        return $this->formatColorResult($hsl, $hex);
    }

    public function hslToRgb($data) {
        $h = floatval($data['h'] ?? 0) / 360;
        $s = floatval($data['s'] ?? 0) / 100;
        $l = floatval($data['l'] ?? 0) / 100;
        
        if ($s == 0) {
            $r = $g = $b = $l;
        } else {
            $hue2rgb = function($p, $q, $t) {
                if($t < 0) $t += 1;
                if($t > 1) $t -= 1;
                if($t < 1/6) return $p + ($q - $p) * 6 * $t;
                if($t < 1/2) return $q;
                if($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;
                return $p;
            };
            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
            $p = 2 * $l - $q;
            $r = $hue2rgb($p, $q, $h + 1/3);
            $g = $hue2rgb($p, $q, $h);
            $b = $hue2rgb($p, $q, $h - 1/3);
        }
        
        $r = round($r * 255);
        $g = round($g * 255);
        $b = round($b * 255);
        
        $rgb = "rgb($r, $g, $b)";
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $this->formatColorResult($rgb, $hex);
    }

    public function unixToDate($data) {
        $ts = intval($data['text'] ?? 0);
        if ($ts <= 0) return "<div style='color:red;'>Valid Unix Timestamp required.</div>";
        
        $dateGmt = gmdate('Y-m-d H:i:s \G\M\T', $ts);
        $dateLocal = date('Y-m-d H:i:s \L\o\c\a\l', $ts);
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>GMT/UTC Time: <strong style='font-size:1.25rem; color:var(--text-dark);'>$dateGmt</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Your Server Local: <strong style='font-size:1.25rem; color:var(--text-dark);'>$dateLocal</strong></div>
        </div>";
    }

    public function dateToUnix($data) {
        $val = trim($data['date'] ?? '');
        if ($val === '') return "<div style='color:red;'>Date/Time string required.</div>";
        
        $ts = strtotime($val);
        if ($ts === false) return "<div style='color:red;'>Invalid Date/Time format. Try YYYY-MM-DD HH:MM:SS format.</div>";
        
        return $this->formatResult($ts);
    }

    public function jsonToXml($data) {
        $json = trim($data['text'] ?? '');
        $arr = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) return "<div style='color:red;'>Invalid JSON string.</div>";
        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>');
        $this->arrayToXml($arr, $xml);
        return $this->formatResult($xml->asXML());
    }
    
    private function arrayToXml($data, &$xml) {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xml->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    public function xmlToJson($data) {
        $xmlstr = trim($data['text'] ?? '');
        if ($xmlstr === '') return "<div style='color:red;'>XML string required.</div>";
        
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlstr);
        if ($xml === false) return "<div style='color:red;'>Invalid XML Format.</div>";
        
        $json = json_encode($xml, JSON_PRETTY_PRINT);
        return $this->formatResult($json);
    }

    public function yamlToJson($data) {
        $yaml = trim($data['text'] ?? '');
        if (!function_exists('yaml_parse')) {
            return "<div style='color:#f59e0b;'>Warning: <b>yaml_parse</b> extension is not installed on your server. We will try a naive fallback.</div>" . $this->naiveYamlToJson($yaml);
        }
        
        $parsed = @yaml_parse($yaml);
        if ($parsed === false) return "<div style='color:red;'>Invalid YAML format.</div>";
        return $this->formatResult(json_encode($parsed, JSON_PRETTY_PRINT));
    }

    public function jsonToYaml($data) {
        $json = trim($data['text'] ?? '');
        $arr = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) return "<div style='color:red;'>Invalid JSON.</div>";
        
        if (!function_exists('yaml_emit')) {
            return "<div style='color:#f59e0b;'>Warning: <b>yaml_emit</b> extension is not installed on your server. Falling back to basic representation.</div>" . $this->formatResult(print_r($arr, true));
        }
        
        return $this->formatResult(yaml_emit($arr));
    }

    private function naiveYamlToJson($yaml) {
        // Very basic mock if YAML extension isn't loaded - real YAML parsing requires the extension or Symfony Yaml package
        return "<div style='color:red;'>Server lacks YAML extension. Unable to reliably parse complex YAML natively without library.</div>";
    }

    public function binaryToText($data) {
        $bin = str_replace(' ', '', trim($data['text'] ?? ''));
        if (preg_match('/[^01]/', $bin)) return "<div style='color:red;'>Input must contain only 0s and 1s.</div>";
        
        $text = '';
        foreach(str_split($bin, 8) as $chunk) {
            $text .= chr(bindec($chunk));
        }
        return $this->formatResult($text);
    }

    public function decToBinary($data) {
        $dec = intval($data['text'] ?? 0);
        return $this->formatResult(decbin($dec));
    }

    public function binaryToDec($data) {
        $bin = trim($data['text'] ?? '');
        if (preg_match('/[^01]/', $bin)) return "<div style='color:red;'>Invalid Binary String.</div>";
        return $this->formatResult(bindec($bin));
    }

    public function romanToNum($data) {
        $romans = [
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];
        $roman = strtoupper(trim($data['text'] ?? ''));
        $result = 0;
        
        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        
        return $this->formatResult($result);
    }

    public function numToRoman($data) {
        $num = intval($data['text'] ?? 0);
        if ($num < 1 || $num > 3999) return "<div style='color:red;'>Number must be between 1 and 3999.</div>";
        
        $n = intval($num);
        $res = '';
        $romanNumberArray = array(
            'M'  => 1000, 'CM' => 900, 'D'  => 500, 'CD' => 400,
            'C'  => 100, 'XC' => 90, 'L'  => 50, 'XL' => 40,
            'X'  => 10, 'IX' => 9, 'V'  => 5, 'IV' => 4, 'I'  => 1
        );
        foreach ($romanNumberArray as $roman => $number) {
            $matches = intval($n / $number);
            $res .= str_repeat($roman, $matches);
            $n = $n % $number;
        }
        return $this->formatResult($res);
    }

    public function celToFah($data) {
        $c = floatval($data['num'] ?? 0);
        $f = ($c * 9/5) + 32;
        return $this->formatResult(number_format($f, 2) . ' °F');
    }

    public function fahToCel($data) {
        $f = floatval($data['num'] ?? 0);
        $c = ($f - 32) * 5/9;
        return $this->formatResult(number_format($c, 2) . ' °C');
    }

    public function lbsToKg($data) {
        $lbs = floatval($data['num'] ?? 0);
        $kg = $lbs * 0.45359237;
        return $this->formatResult(number_format($kg, 4) . ' kg');
    }

    public function kgToLbs($data) {
        $kg = floatval($data['num'] ?? 0);
        $lbs = $kg * 2.20462262;
        return $this->formatResult(number_format($lbs, 4) . ' lbs');
    }

    private function formatResult($string) {
        return "<textarea class='form-control' rows='4' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars($string) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Value</button>";
    }
    
    private function formatColorResult($value, $hex) {
        return "
        <div style='display:flex; align-items:center; gap:1.5rem; background:var(--bg); padding:1.5rem; border:1px solid var(--border); border-radius:8px;'>
            <div style='width:64px; height:64px; border-radius:50%; background-color:$hex; border:2px solid #e2e8f0; flex-shrink:0;'></div>
            <div style='flex:1;'>
                <div style='font-size:1.5rem; font-weight:700; color:var(--text-dark); margin-bottom:0.5rem;'>$value</div>
                <div style='color:var(--text-muted);'>Preview: $hex</div>
            </div>
            <button onclick='navigator.clipboard.writeText(\"$value\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);' class='btn-outline'>Copy</button>
        </div>";
    }
}
