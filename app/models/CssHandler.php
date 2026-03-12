<?php

class CssHandler extends Model {

    public function gradientGen($data) {
        $color1 = trim($data['color1'] ?? '#ff7a59');
        $color2 = trim($data['color2'] ?? '#3b82f6');
        $angle = intval($data['angle'] ?? 135);
        
        $css = "background: linear-gradient({$angle}deg, {$color1}, {$color2});";
        return $this->formatCssPreview($css, "width:100%; height:150px; border-radius:12px; $css");
    }

    public function triangleGen($data) {
        $dir = $data['direction'] ?? 'top';
        $color = trim($data['color'] ?? '#ff7a59');
        $size = intval($data['size'] ?? 50);
        $half = $size / 2;
        
        $css = "width: 0; height: 0;\n";
        if ($dir == 'top') $css .= "border-left: {$half}px solid transparent;\nborder-right: {$half}px solid transparent;\nborder-bottom: {$size}px solid {$color};";
        elseif ($dir == 'bottom') $css .= "border-left: {$half}px solid transparent;\nborder-right: {$half}px solid transparent;\nborder-top: {$size}px solid {$color};";
        elseif ($dir == 'left') $css .= "border-top: {$half}px solid transparent;\nborder-bottom: {$half}px solid transparent;\nborder-right: {$size}px solid {$color};";
        elseif ($dir == 'right') $css .= "border-top: {$half}px solid transparent;\nborder-bottom: {$half}px solid transparent;\nborder-left: {$size}px solid {$color};";
        
        return $this->formatCssPreview($css, "display:inline-block; $css");
    }

    public function ribbonGen($data) {
        $text = htmlspecialchars(trim($data['text'] ?? 'Ribbon'));
        $color = trim($data['color'] ?? '#dc2626');
        
        $css = "position: relative;\ndisplay: inline-block;\npadding: 0.5rem 1.5rem;\nbackground: $color;\ncolor: white;\nfont-weight: bold;\nbox-shadow: 0 4px 6px rgba(0,0,0,0.1);";
        $previewHtml = "<div style='padding:2rem; background:#f8fafc; text-align:center;'>
            <div style='$css'>
                $text
                <div style='position:absolute; top:100%; left:0; width:0; height:0; border-top: 10px solid #991b1b; border-left: 10px solid transparent;'></div>
                <div style='position:absolute; top:100%; right:0; width:0; height:0; border-top: 10px solid #991b1b; border-right: 10px solid transparent;'></div>
            </div>
        </div>";
        
        return $this->formatCodeResult($css, $previewHtml);
    }

    public function blobGen($data) {
        $color = trim($data['color'] ?? '#ff7a59');
        // Random organic percentages
        $tl = rand(30, 70); $tr = rand(30, 70);
        $bl = rand(30, 70); $br = rand(30, 70);
        $t2 = rand(30, 70); $r2 = rand(30, 70);
        $b2 = rand(30, 70); $l2 = rand(30, 70);
        
        $radius = "{$tl}% {$tr}% {$bl}% {$br}% / {$t2}% {$r2}% {$b2}% {$l2}%";
        $css = "width: 200px;\nheight: 200px;\nbackground: $color;\nborder-radius: $radius;\ntransition: all 0.5s ease;";
        
        return $this->formatCssPreview($css, "margin:0 auto; $css");
    }

    public function textShadow($data) {
        $x = intval($data['offset_x'] ?? 2);
        $y = intval($data['offset_y'] ?? 2);
        $b = intval($data['blur'] ?? 4);
        $c = trim($data['color'] ?? 'rgba(0,0,0,0.5)');
        
        $css = "text-shadow: {$x}px {$y}px {$b}px {$c};";
        return $this->formatCssPreview($css, "font-size:3rem; font-weight:900; color:var(--text-dark); text-align:center; $css", "LOREM IPSUM");
    }

    public function buttonGen($data) {
        $text = htmlspecialchars(trim($data['text'] ?? 'Button'));
        $bg = trim($data['bg'] ?? '#ff7a59');
        $rad = intval($data['radius'] ?? 8);
        
        $css = "display: inline-block;\npadding: 0.75rem 1.75rem;\nbackground-color: $bg;\ncolor: #fff;\nfont-size: 1rem;\nfont-weight: 600;\ntext-decoration: none;\nborder: none;\nborder-radius: {$rad}px;\ncursor: pointer;\ntransition: all 0.2s;\nbox-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);\n/* Add active/hover states physically */";
        return $this->formatCodeResult($css, "<div style='text-align:center; padding:1.5rem;'><button style='".str_replace("\n", " ", $css)."'>$text</button></div>");
    }

    public function neumorphismGen($data) {
        $color = trim($data['color'] ?? '#e0e5ec');
        // Parse hex to rgb to create light/dark shadows
        $hex = ltrim($color, '#');
        if (strlen($hex) == 3) $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        if (strlen($hex) != 6) $hex = 'e0e5ec';
        
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        $dist = intval($data['distance'] ?? 9);
        $blur = $dist * 2;
        
        // Calculate darker and lighter shades dynamically
        $darkR = max(0, $r - 30); $darkG = max(0, $g - 30); $darkB = max(0, $b - 30);
        $lightR = min(255, $r + 30); $lightG = min(255, $g + 30); $lightB = min(255, $b + 30);
        
        $shadow = "{$dist}px {$dist}px {$blur}px rgb($darkR, $darkG, $darkB), \n-{$dist}px -{$dist}px {$blur}px rgb($lightR, $lightG, $lightB)";
        
        $css = "border-radius: 20px;\nbackground: $color;\nbox-shadow: $shadow;";
        return $this->formatCssPreview($css, "width:150px; height:150px; margin:0 auto; $css", "", $color);
    }

    public function glassmorphismGen($data) {
        $blur = intval($data['blur'] ?? 10);
        $trans = floatval($data['transparency'] ?? 0.2);
        
        $css = "background: rgba(255, 255, 255, $trans);\nborder-radius: 16px;\nbox-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);\nbackdrop-filter: blur({$blur}px);\n-webkit-backdrop-filter: blur({$blur}px);\nborder: 1px solid rgba(255, 255, 255, 0.3);";
        
        $previewHtml = "
        <div style='background: linear-gradient(45deg, #ff7a59, #3b82f6); padding: 3rem; border-radius:12px; display:flex; justify-content:center;'>
            <div style='width: 250px; height: 150px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:bold; font-size:1.2rem; $css'>
                Glass Node
            </div>
        </div>";
        return $this->formatCodeResult($css, $previewHtml);
    }

    public function gridGen($data) {
        $col = intval($data['col'] ?? 3);
        $row = intval($data['row'] ?? 3);
        $gap = intval($data['gap'] ?? 20);
        
        $css = "display: grid;\ngrid-template-columns: repeat($col, 1fr);\ngrid-template-rows: repeat($row, 1fr);\ngap: {$gap}px;";
        
        $boxes = '';
        for ($i=1; $i<=($col*$row); $i++) {
            $boxes .= "<div style='background:var(--primary); color:#fff; padding:1rem; text-align:center; border-radius:4px;'>$i</div>";
        }
        
        return $this->formatCodeResult($css, "<div style='background:#f8fafc; padding:1rem; border-radius:8px;'><div style='".str_replace("\n", " ", $css)."'>$boxes</div></div>");
    }

    public function flexGen($data) {
        $dir = $data['direction'] ?? 'row';
        $justify = $data['justify'] ?? 'center';
        $align = $data['align'] ?? 'center';
        
        $css = "display: flex;\nflex-direction: $dir;\njustify-content: $justify;\nalign-items: $align;";
        
        $boxes = "<div style='background:#3b82f6; color:#fff; padding:1rem; border-radius:4px;'>Box 1</div>
                  <div style='background:#10b981; color:#fff; padding:1rem; border-radius:4px;'>Box 2</div>
                  <div style='background:#f59e0b; color:#fff; padding:1rem; border-radius:4px;'>Box 3</div>";
                  
        return $this->formatCodeResult($css, "<div style='background:#f8fafc; padding:1rem; border-radius:8px; min-height:150px; ".str_replace("\n", " ", $css)."'>$boxes</div>");
    }

    private function formatCssPreview($css, $inlineStyle, $innerText = '', $wrapperBg = 'transparent') {
        $html = "<div style='background: $wrapperBg; padding: 2rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--border); overflow: hidden;'>
            <div style='$inlineStyle'>$innerText</div>
        </div>";
        return $this->formatCodeResult($css, $html);
    }

    private function formatCodeResult($css, $previewHtml) {
        return "
        $previewHtml
        <div style='margin-top:1.5rem;'>
            <label class='form-label'>Generated CSS Code</label>
            <textarea class='form-control' rows='6' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars($css) . "</textarea>
            <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:0.5rem;'>Copy CSS</button>
        </div>";
    }

    public function hexToRgb($data) {
        $hex = ltrim($data['hex'] ?? '#3b82f6', '#');
        if (strlen($hex) == 3) $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return $this->formatCssPreview("rgb($r, $g, $b)", "width:100px; height:100px; background:rgb($r, $g, $b); margin:0 auto; border-radius:12px;");
    }

    public function rgbToHex($data) {
        $r = intval($data['r'] ?? 59);
        $g = intval($data['g'] ?? 130);
        $b = intval($data['b'] ?? 246);
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $this->formatCssPreview(strtoupper($hex), "width:100px; height:100px; background:$hex; margin:0 auto; border-radius:12px;");
    }

    public function hexToCmyk($data) {
        $hex = ltrim($data['hex'] ?? '#3b82f6', '#');
        $r = hexdec(substr($hex, 0, 2)) / 255;
        $g = hexdec(substr($hex, 2, 2)) / 255;
        $b = hexdec(substr($hex, 4, 2)) / 255;
        
        $k = 1 - max($r, $g, $b);
        if ($k == 1) { $c = $m = $y = 0; }
        else {
            $c = (1 - $r - $k) / (1 - $k);
            $m = (1 - $g - $k) / (1 - $k);
            $y = (1 - $b - $k) / (1 - $k);
        }
        $c = round($c * 100); $m = round($m * 100); $y = round($y * 100); $k = round($k * 100);
        return $this->formatCodeResult("cmyk($c%, $m%, $y%, $k%)", "<div style='width:100px; height:100px; background:#$hex; margin:0 auto; border-radius:12px;'></div>");
    }

    public function cmykToHex($data) {
        $c = intval($data['c'] ?? 76) / 100;
        $m = intval($data['m'] ?? 47) / 100;
        $y = intval($data['y'] ?? 0) / 100;
        $k = intval($data['k'] ?? 3) / 100;
        
        $r = round(255 * (1 - $c) * (1 - $k));
        $g = round(255 * (1 - $m) * (1 - $k));
        $b = round(255 * (1 - $y) * (1 - $k));
        
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        return $this->formatCssPreview(strtoupper($hex), "width:100px; height:100px; background:$hex; margin:0 auto; border-radius:12px;");
    }

    public function hexToHsl($data) {
        $hex = ltrim($data['hex'] ?? '#3b82f6', '#');
        $r = hexdec(substr($hex, 0, 2)) / 255;
        $g = hexdec(substr($hex, 2, 2)) / 255;
        $b = hexdec(substr($hex, 4, 2)) / 255;
        
        $max = max($r, $g, $b); $min = min($r, $g, $b);
        $l = ($max + $min) / 2;
        if ($max == $min) { $h = $s = 0; }
        else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch ($max) {
                case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break;
                case $g: $h = ($b - $r) / $d + 2; break;
                case $b: $h = ($r - $g) / $d + 4; break;
            }
            $h /= 6;
        }
        $h = round($h * 360); $s = round($s * 100); $l = round($l * 100);
        return $this->formatCodeResult("hsl($h, $s%, $l%)", "<div style='width:100px; height:100px; background:#$hex; margin:0 auto; border-radius:12px;'></div>");
    }

    public function hslToHex($data) {
        $h = intval($data['h'] ?? 217) / 360;
        $s = intval($data['s'] ?? 91) / 100;
        $l = intval($data['l'] ?? 60) / 100;
        
        if ($s == 0) { $r = $g = $b = $l; }
        else {
            $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
            $p = 2 * $l - $q;
            $r = $this->hueToRgb($p, $q, $h + 1/3);
            $g = $this->hueToRgb($p, $q, $h);
            $b = $this->hueToRgb($p, $q, $h - 1/3);
        }
        $hex = sprintf("#%02x%02x%02x", round($r * 255), round($g * 255), round($b * 255));
        return $this->formatCssPreview(strtoupper($hex), "width:100px; height:100px; background:$hex; margin:0 auto; border-radius:12px;");
    }

    private function hueToRgb($p, $q, $t) {
        if ($t < 0) $t += 1;
        if ($t > 1) $t -= 1;
        if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
        if ($t < 1/2) return $q;
        if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;
        return $p;
    }

    public function transformGen($data) {
        $rotate = intval($data['rotate'] ?? 45);
        $scale = floatval($data['scale'] ?? 1.5);
        
        $css = "transform: rotate({$rotate}deg) scale({$scale});\ntransition: transform 0.3s ease-in-out;";
        return $this->formatCssPreview($css, "width:100px; height:100px; background:#3b82f6; margin:0 auto; $css");
    }

    public function keyframeGen($data) {
        $name = trim($data['name'] ?? 'bounce');
        $dur = trim($data['dur'] ?? '2s');
        
        $css = "animation: $name $dur infinite ease-in-out;\n\n@keyframes $name {\n  0%, 100% { transform: translateY(0); }\n  50% { transform: translateY(-20px); }\n}";
        return $this->formatCodeResult($css, "<div style='text-align:center; padding:2rem;'><div style='width:50px; height:50px; background:#ff7a59; border-radius:50%; margin:0 auto; animation: custom_bounce 2s infinite ease-in-out;'></div><style>@keyframes custom_bounce { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }</style></div>");
    }

    public function svgWaveGen($data) {
        $color = urlencode(trim($data['color'] ?? '#ff7a59'));
        
        $svg = "<svg viewBox=\"0 0 1440 320\" xmlns=\"http://www.w3.org/2000/svg\">\n  <path fill=\"$color\" fill-opacity=\"1\" d=\"M0,160L48,170.7C96,181,192,203,288,181.3C384,160,480,96,576,90.7C672,85,768,139,864,154.7C960,171,1056,149,1152,117.3C1248,85,1344,43,1392,21.3L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z\"></path>\n</svg>";
        
        // Data URI for CSS
        $dataUri = "data:image/svg+xml;utf8," . str_replace("\"", "'", $svg);
        $css = "background-image: url(\"$dataUri\");\nbackground-size: cover;\nbackground-repeat: no-repeat;";
        
        return $this->formatCodeResult($css, "<div style='width:100%; height:150px; border-radius:12px; $css'></div>");
    }

    public function svgPattern($data) {
        $type = $data['type'] ?? 'dots';
        $svg = '';
        
        if ($type === 'dots') {
            $svg = "<svg width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\"><circle cx=\"2\" cy=\"2\" r=\"2\" fill=\"#e2e8f0\"/></svg>";
        } elseif ($type === 'grid') {
            $svg = "<svg width=\"40\" height=\"40\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M0 0h40v40H0V0zm20 20h20v20H20V20z\" fill=\"#e2e8f0\" fill-rule=\"evenodd\"/></svg>";
        } else {
            // diagonal
            $svg = "<svg width=\"10\" height=\"10\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M-1 1l2-2M0 10l10-10M9 11l2-2\" stroke=\"#e2e8f0\" stroke-width=\"2\"/></svg>";
        }
        
        $dataUri = "data:image/svg+xml;base64," . base64_encode($svg);
        $css = "background-color: #ffffff;\nbackground-image: url(\"$dataUri\");";
        
        return $this->formatCodeResult($css, "<div style='width:100%; height:150px; border-radius:12px; border:1px solid var(--border); $css'></div>");
    }

    public function tailwindPalette($data) {
        $hex = ltrim(trim($data['color'] ?? '#3b82f6'), '#');
        if (strlen($hex) == 3) $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        if (strlen($hex) != 6) $hex = '3b82f6';
        
        // Very basic mock algorithm to simulate Tailwind 50-900 scale based on a primary 500 color.
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        
        $html = "<div style='display:grid; gap:0.5rem;'>";
        $css = "/* Tailwind Mock Palette based on #$hex */\n:root {\n";
        
        $levels = [
            '50' => 0.95, '100' => 0.8, '200' => 0.6, '300' => 0.4, '400' => 0.2,
            '500' => 0, // base
            '600' => -0.2, '700' => -0.4, '800' => -0.6, '900' => -0.8
        ];
        
        foreach ($levels as $weight => $factor) {
            if ($factor > 0) {
                // Lighten: mix with white
                $nr = round($r + (255 - $r) * $factor);
                $ng = round($g + (255 - $g) * $factor);
                $nb = round($b + (255 - $b) * $factor);
            } else {
                // Darken: mix with black
                $factor = abs($factor);
                $nr = round($r * (1 - $factor));
                $ng = round($g * (1 - $factor));
                $nb = round($b * (1 - $factor));
            }
            $colorHex = sprintf("#%02x%02x%02x", $nr, $ng, $nb);
            $css     .= "  --color-brand-$weight: $colorHex;\n";
            $textCol  = ($weight < 500) ? '#000' : '#fff';
            
            $html .= "<div style='background:$colorHex; color:$textCol; padding:0.75rem 1rem; border-radius:4px; display:flex; justify-content:space-between; font-family:monospace; font-weight:bold;'>
                <span>$weight</span>
                <span>$colorHex</span>
            </div>";
        }
        
        $css .= "}";
        $html .= "</div>";
        return $this->formatCodeResult($css, $html);
    }

    public function materialPalette($data) {
        $hue = $data['hue'] ?? 'blue';
        
        $palettes = [
            'red' => ['50'=>'#FFEBEE','100'=>'#FFCDD2','200'=>'#EF9A9A','300'=>'#E57373','400'=>'#EF5350','500'=>'#F44336','600'=>'#E53935','700'=>'#D32F2F','800'=>'#C62828','900'=>'#B71C1C'],
            'blue' => ['50'=>'#E3F2FD','100'=>'#BBDEFB','200'=>'#90CAF9','300'=>'#64B5F6','400'=>'#42A5F5','500'=>'#2196F3','600'=>'#1E88E5','700'=>'#1976D2','800'=>'#1565C0','900'=>'#0D47A1'],
            'green' => ['50'=>'#E8F5E9','100'=>'#C8E6C9','200'=>'#A5D6A7','300'=>'#81C784','400'=>'#66BB6A','500'=>'#4CAF50','600'=>'#43A047','700'=>'#388E3C','800'=>'#2E7D32','900'=>'#1B5E20'],
            'orange' => ['50'=>'#FFF3E0','100'=>'#FFE0B2','200'=>'#FFCC80','300'=>'#FFB74D','400'=>'#FFA726','500'=>'#FF9800','600'=>'#FB8C00','700'=>'#F57C00','800'=>'#EF6C00','900'=>'#E65100'],
            'purple' => ['50'=>'#F3E5F5','100'=>'#E1BEE7','200'=>'#CE93D8','300'=>'#BA68C8','400'=>'#AB47BC','500'=>'#9C27B0','600'=>'#8E24AA','700'=>'#7B1FA2','800'=>'#6A1B9A','900'=>'#4A148C']
        ];
        
        $colors = $palettes[$hue] ?? $palettes['blue'];
        
        $html = "<div style='display:grid; gap:0.5rem;'>";
        $css = "/* Material Design $hue */\n:root {\n";
        foreach ($colors as $w => $c) {
            $css .= "  --md-$hue-$w: $c;\n";
            $textCol  = ($w < 500) ? '#000' : '#fff';
            $html .= "<div style='background:$c; color:$textCol; padding:0.75rem 1rem; border-radius:4px; display:flex; justify-content:space-between; font-family:monospace; font-weight:bold;'>
                <span>$w</span>
                <span>$c</span>
            </div>";
        }
        $css .= "}";
        $html .= "</div>";
        return $this->formatCodeResult($css, $html);
    }

    public function colorBlind($data) {
        $color = trim($data['color'] ?? '#ff7a59');
        // Very rough mockup simulation. Real simulation is complex matrix multiplication.
        // We will just dim the reds/greens slightly to simulate the visual effect safely.
        
        return "
        <div style='display:grid; gap:1rem; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); text-align:center;'>
            <div>
                <div style='width:100%; height:100px; border-radius:8px; background:$color; margin-bottom:0.5rem; border:1px solid #e2e8f0;'></div>
                <strong>Normal Vision</strong>
            </div>
            <div>
                <div style='width:100%; height:100px; border-radius:8px; background:$color; filter:grayscale(30%) sepia(20%) hue-rotate(10deg); margin-bottom:0.5rem; border:1px solid #e2e8f0;'></div>
                <strong>Protanopia (Red-Blind)</strong>
            </div>
            <div>
                <div style='width:100%; height:100px; border-radius:8px; background:$color; filter:grayscale(30%) sepia(20%) hue-rotate(-10deg); margin-bottom:0.5rem; border:1px solid #e2e8f0;'></div>
                <strong>Deuteranopia (Green-Blind)</strong>
            </div>
            <div>
                <div style='width:100%; height:100px; border-radius:8px; background:$color; filter:grayscale(30%) sepia(40%) hue-rotate(180deg); margin-bottom:0.5rem; border:1px solid #e2e8f0;'></div>
                <strong>Tritanopia (Blue-Blind)</strong>
            </div>
            <div>
                <div style='width:100%; height:100px; border-radius:8px; background:$color; filter:grayscale(100%); margin-bottom:0.5rem; border:1px solid #e2e8f0;'></div>
                <strong>Achromatopsia (Monochromacy)</strong>
            </div>
        </div>
        <div style='margin-top:1.5rem; font-size:0.875rem; color:var(--text-muted);'>* This is a CSS filter approximation. True visual perception varies.</div>";
    }

    public function imageColor($data) {
        return "
        <div style='text-align:center; padding:3rem; background:#f8fafc; border-radius:12px; border:2px dashed #cbd5e1;'>
            <div style='font-size:3rem; margin-bottom:1rem;'>ℹ️</div>
            <h3 style='margin-bottom:0.5rem;'>Client-Side Feature</h3>
            <p style='color:var(--text-muted);'>True precise image color picking is best performed safely via an HTML5 Canvas script directly in the browser.<br>Server-side uploading for a simple color value is inefficient.</p>
        </div>";
    }

    public function base64Pattern($data) {
        $b64 = trim($data['b64'] ?? '');
        if (empty($b64)) return "<div style='color:red;'>Valid base64 string required.</div>";
        
        // Ensure data URI prefix exists
        if (!preg_match('#^data:image/\w+;base64,#i', $b64)) {
            $b64 = "data:image/png;base64," . $b64;
        }
        
        $css = "background-image: url(\"$b64\");\nbackground-repeat: repeat;\nbackground-size: auto;";
        return $this->formatCodeResult($css, "<div style='width:100%; height:200px; border-radius:12px; border:1px solid var(--border); $css'></div>");
    }

    public function webFonts($data) {
        $text = htmlspecialchars(trim($data['text'] ?? 'The quick brown fox jumps over the lazy dog.'));
        if (empty($text)) $text = 'The quick brown fox jumps over the lazy dog.';
        
        $fonts = [
            'System Standard' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
            'Arial' => 'Arial, Helvetica, sans-serif',
            'Verdana' => 'Verdana, Geneva, Tahoma, sans-serif',
            'Trebuchet MS' => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'Times New Roman' => '"Times New Roman", Times, serif',
            'Georgia' => 'Georgia, serif',
            'Garamond' => 'Garamond, serif',
            'Courier New' => '"Courier New", Courier, monospace',
            'Brush Script MT' => '"Brush Script MT", cursive'
        ];
        
        $html = "<div style='display:grid; gap:1.5rem;'>";
        foreach ($fonts as $name => $stack) {
            $html .= "<div style='padding:1.5rem; border:1px solid var(--border); border-radius:8px; background:#fff;'>
                <div style='font-size:0.875rem; color:var(--text-muted); margin-bottom:0.5rem; font-family:monospace;'>$name | font-family: $stack;</div>
                <div style='font-size:1.5rem; color:var(--text-dark); font-family: $stack;'>$text</div>
            </div>";
        }
        $html .= "</div>";
        
        return $html;
    }
}
