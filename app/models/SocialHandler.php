<?php

class SocialHandler extends Model {

    public function ytThumbnail($data) {
        $url = trim($data['url'] ?? '');
        if (empty($url)) return "<div style='color:red;'>YouTube URL is required.</div>";
        
        // Extract Video ID
        $vid = '';
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $url, $match)) {
            $vid = $match[1];
        }
        
        if (empty($vid)) return "<div style='color:red;'>Invalid YouTube URL. Could not extract video ID.</div>";
        
        $resolutions = [
            'Max Resolution (1080p)' => "https://img.youtube.com/vi/$vid/maxresdefault.jpg",
            'Standard Quality' => "https://img.youtube.com/vi/$vid/sddefault.jpg",
            'High Quality' => "https://img.youtube.com/vi/$vid/hqdefault.jpg",
            'Medium Quality' => "https://img.youtube.com/vi/$vid/mqdefault.jpg",
            'Default' => "https://img.youtube.com/vi/$vid/default.jpg"
        ];
        
        $html = "<div style='display:grid; gap:1.5rem;'>";
        foreach ($resolutions as $label => $imgUrl) {
            $html .= "
            <div style='border:1px solid var(--border); border-radius:12px; overflow:hidden; background:var(--bg);'>
                <div style='padding:1rem; border-bottom:1px solid var(--border); font-weight:bold; background:#f8fafc; display:flex; justify-content:space-between; align-items:center;'>
                    <span>$label</span>
                    <a href='$imgUrl' download='yt_thumbnail_$vid.jpg' target='_blank' style='font-size:0.875rem; color:var(--primary); text-decoration:none;'>Open Image ↗</a>
                </div>
                <img src='$imgUrl' style='width:100%; height:auto; display:block;' onerror=\"this.parentElement.style.display='none';\" alt='Thumbnail'>
            </div>";
        }
        $html .= "</div>";
        
        return $html;
    }

    public function fancyFonts($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $normal = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        
        $fonts = [
            'Math Script' => "𝓪𝓫𝓬𝓭𝓮𝓯𝓰𝓱𝓲𝓳𝓴𝓵𝓶𝓷𝓸𝓹𝓺𝓻𝓼𝓽𝓾𝓿𝔀𝔁𝔂𝔃𝓐𝓑𝓒𝓓𝓔𝓕𝓖𝓗𝓘𝓙𝓚𝓛𝓜𝓝𝓞𝓟𝓠𝓡𝓢𝓣𝓤𝓥𝓦𝓧𝓨𝓩0123456789",
            'Math Bold'   => "𝗮𝗯𝗰𝗱𝗲𝗳𝗴𝗵𝗶𝗷𝗸𝗹𝗺𝗻𝗼𝗽𝗾𝗿𝘀𝘁𝘂𝘃𝘄𝘅𝘆𝘇𝗔𝗕𝗖𝗗𝗘𝗙𝗚𝗛𝗜𝗝𝗞𝗟𝗠𝗡𝗢𝗣𝗤𝗥𝗦𝗧𝗨𝗩𝗪𝗫𝗬𝗭𝟬𝟭𝟮𝟯𝟰𝟱𝟲𝟳𝟴𝟵",
            'Math Italic' => "𝘢𝘣𝘤𝘥𝘦𝘧𝘨𝘩𝘪𝘫𝘬𝘭𝘮𝘯𝘰𝘱𝘲𝘳𝘴𝘵𝘶𝘷𝘸𝘹𝘺𝘻𝘈𝘉𝘊𝘋𝘌𝘍𝘎𝘏𝘐𝘑𝘒𝘓𝘔𝘕𝘖𝘗𝘘𝘙𝘚𝘛𝘜𝘝𝘞𝘟𝘠𝘡0123456789",
            'Monospace'   => "𝚊𝚋𝚌𝚍𝚎𝚏𝚐𝚑𝚒𝚓𝚔𝚕𝚖𝚗𝚘𝚙𝚚𝚛𝚜𝚝𝚞𝚟𝚠𝚡𝚢𝚣𝙰𝙱𝙲𝙳𝙴𝙵𝙶𝙷𝙸𝙹𝙺𝙻𝙼𝙽𝙾𝙿𝚀𝚁𝚂𝚃𝚄𝚅𝚆𝚇𝚈𝚉𝟶𝟷𝟸𝟹𝟺𝟻𝟼𝟽𝟾𝟿",
            'Double Struck'=> "𝕒𝕓𝕔𝕕𝕖𝕗𝕘𝕙𝕚𝕛𝕜𝕝𝕞𝕟𝕠𝕡𝕢𝕣𝕤𝕥𝕦𝕧𝕨𝕩𝕪𝕫𝔸𝔹ℂ𝔻𝔼𝔽𝔾ℍ𝕀𝕁𝕂𝕃𝕄ℕ𝕆ℙℚℝ𝕊𝕋𝕌𝕍𝕎𝕏𝕐ℤ𝟘𝟙𝟚𝟛𝟜𝟝𝟞𝟟𝟠𝟡",
            'Squares'     => "🄰𝄃🄲🄳🄴🄵🄶🄷🄸🄹🄺🄻🄼🄽🄾🄿🅀🅁🅂🅃🅄🅅🅆🅇🅈🅉🄰🄃🄲🄳🄴🄵🄶🄷🄸🄹🄺🄻🄼🄽🄾🄿🅀🅁🅂🅃🅄🅅🅆🅇🅈🅉0123456789"
        ];
        
        $html = "<div style='display:grid; gap:1rem;'>";
        foreach ($fonts as $name => $chars) {
            $mapped = '';
            for ($i=0; $i<strlen($text); $i++) {
                $char = $text[$i];
                $pos = strpos($normal, $char);
                if ($pos !== false) {
                    $mapped .= mb_substr($chars, $pos, 1, 'UTF-8');
                } else {
                    $mapped .= $char;
                }
            }
            $html .= "<div style='border:1px solid var(--border); border-radius:8px; padding:1rem; background:var(--bg);'>
                <div style='font-size:0.75rem; color:var(--text-muted); margin-bottom:0.5rem; text-transform:uppercase;'>$name</div>
                <div style='display:flex; justify-content:space-between; align-items:center; gap:1rem;'>
                    <div style='font-size:1.25rem; word-break:break-all;'>$mapped</div>
                    <button class='btn-outline btn-sm' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($mapped))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
                </div>
            </div>";
        }
        $html .= "</div>";
        
        return $html;
    }

    public function invisibleText($data) {
        // Hangul Filler (U+3164) is commonly used as a completely empty character online
        $char = "ㅤ"; 
        
        return "
        <div style='text-align:center; padding:3rem; border:2px dashed var(--border); border-radius:12px; background:var(--bg);'>
            <div style='font-size:4rem; margin-bottom:1rem;'>👻</div>
            <h3 style='margin-bottom:1rem;'>Invisible Character Ready</h3>
            <p style='color:var(--text-muted); margin-bottom:1.5rem;'>Click the button below to copy the Hangul Filler character to your clipboard. You can paste it in names, bios, and messages to create blank spaces.</p>
            <input type='text' id='invis-char' value='ㅤ' style='position:absolute; left:-9999px;' readonly>
            <button class='btn-primary' onclick='document.getElementById(\"invis-char\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied to Clipboard!\"; setTimeout(()=>this.innerText=\"Copy Invisible Text\", 3000);'>Copy Invisible Text</button>
        </div>";
    }

    public function kaomoji($data) {
        $cats = [
            'Happy' => ['(ᵔᴥᵔ)', '(^人^)', '( ˘ ³˘)♥', '(*^▽^*)', '٩(◕‿◕｡)۶', '(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧'],
            'Shrug / Confused' => ['¯\_(ツ)_/¯', '┐( ˘_˘)┌', '¯\(°_o)/¯', '╮(︶▽︶)╭'],
            'Angry / Flip Table' => ['(╯°□°）╯︵ ┻━┻', '(ಠ_ಠ)', 'ಠ_ಠ', '(ノಠ益ಠ)ノ彡┻━┻', 'ᕙ(⇀‸↼‶)ᕗ'],
            'Sad / Crying' => ['(╥﹏╥)', '( T_T)＼(^-^ )', '(ಥ﹏ಥ)', '(ノ_<。)'],
            'Animals' => ['(=^･ｪ･^=)', 'ʕ•ᴥ•ʔ', 'Ƹ̵̡Ӝ̵̨̄Ʒ', 'V●ᴥ●V', '／(=∵=)＼'],
            'Misc' => ['( ͡° ͜ʖ ͡°)', '(☞ﾟ∀ﾟ)☞', '༼ つ ◕_◕ ༽つ', '(⌐■_■)', '[̲̅$̲̅(̲̅5̲̅)̲̅$̲̅]']
        ];
        
        $html = "<div style='display:grid; gap:2rem;'>";
        foreach ($cats as $name => $list) {
            $html .= "<div><h4 style='margin-bottom:1rem; color:var(--text-dark); border-bottom:1px solid var(--border); padding-bottom:0.5rem;'>$name</h4>
            <div style='display:flex; flex-wrap:wrap; gap:0.75rem;'>";
            foreach ($list as $k) {
                $html .= "<button class='btn-outline' style='font-size:1.1rem; padding:0.5rem 1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($k))."\"); alert(\"Copied: \" + \"".htmlspecialchars(addslashes($k))."\");'>".htmlspecialchars($k)."</button>";
            }
            $html .= "</div></div>";
        }
        $html .= "</div>";
        
        return $html;
    }

    public function braille($data) {
        $text = strtolower(trim($data['text'] ?? ''));
        if (empty($text)) return '';
        
        $map = [
            'a'=>'⠁', 'b'=>'⠃', 'c'=>'⠉', 'd'=>'⠙', 'e'=>'⠑', 'f'=>'⠋', 'g'=>'⠛', 'h'=>'⠓', 'i'=>'⠊', 'j'=>'⠚',
            'k'=>'⠅', 'l'=>'⠇', 'm'=>'⠍', 'n'=>'⠝', 'o'=>'╟', 'p'=>'⠏', 'q'=>'⠟', 'r'=>'⠗', 's'=>'⠎', 't'=>'⠞',
            'u'=>'⠥', 'v'=>'⠧', 'w'=>'⠺', 'x'=>'⠭', 'y'=>'⠽', 'z'=>'⠵',
            '1'=>'⠼⠁', '2'=>'⠼⠃', '3'=>'⠼⠉', '4'=>'⠼⠙', '5'=>'⠼⠑', '6'=>'⠼⠋', '7'=>'⠼⠛', '8'=>'⠼⠓', '9'=>'⠼⠊', '0'=>'⠼⠚',
            ' '=>' ', ','=>'⠂', ';'=>'⠆', ':'=>'⠒', '.'=>'⠲', '!'=>'⠖', '?'=>'⠦'
        ];
        
        $out = '';
        for ($i=0; $i<strlen($text); $i++) {
            $char = $text[$i];
            $out .= $map[$char] ?? $char;
        }
        
        return "
        <div style='padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:2rem; letter-spacing:0.1rem; line-height:1.5; color:var(--text-dark); word-break:break-word;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Braille\", 2000);'>Copy Braille</button>";
    }

    public function vaporwave($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $out = '';
        for ($i=0; $i<mb_strlen($text, 'UTF-8'); $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            $code = mb_ord($char, 'UTF-8');
            
            if ($code >= 0x21 && $code <= 0x7E) {
                // Shift to fullwidth block (U+FF01 to U+FF5E)
                $out .= mb_chr($code + 0xFEE0, 'UTF-8');
            } elseif ($code == 0x20) {
                // Ideographic space
                $out .= mb_chr(0x3000, 'UTF-8');
            } else {
                $out .= $char;
            }
        }
        
        return "
        <div style='padding:2rem; background:linear-gradient(to right, #ff71ce, #01cdfe); border-radius:12px;'>
            <div style='font-family:monospace; font-size:1.5rem; text-shadow:2px 2px 0px rgba(0,0,0,0.5); color:#fff; word-break:break-all; text-align:center;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Vaporwave\", 2000);'>Copy Vaporwave</button>";
    }

    public function zalgo($data) {
        $text = trim($data['text'] ?? '');
        $level = $data['level'] ?? 'mid';
        
        if (empty($text)) return '';
        
        $up = ["\xCC\x8D","\xCC\x8E","\xCC\x84","\xCC\x85","\xCC\x86","\xCC\x91","\xCC\x9A","\xCC\x9C","\xCC\x8B","\xCC\x8F"];
        $mid = ["\xCC\x95","\xCC\x9C","\xCC\x9D","\xCC\x9E","\xCC\xA0","\xCC\xA4","\xCC\xA8","\xCC\xAA","\xCC\xAD"];
        $down = ["\xCC\x96","\xCC\x97","\xCC\x98","\xCC\x99","\xCC\x9C","\xCC\x9D","\xCC\x9E","\xCC\xA0","\xCC\xA4","\xCC\xA5","\xCC\xA6","\xCC\xA7","\xCC\xA8"];
        
        $count = ['min'=>1, 'mid'=>4, 'max'=>12][$level];
        
        $out = '';
        for ($i=0; $i<mb_strlen($text, 'UTF-8'); $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            $out .= $char;
            
            for ($k=0; $k<$count; $k++) {
                $out .= $up[array_rand($up)];
                $out .= $mid[array_rand($mid)];
                $out .= $down[array_rand($down)];
            }
        }
        
        return "
        <div style='padding:2rem; background:#000; border-radius:12px;'>
            <div style='font-family:times; font-size:2rem; color:#dc2626; word-break:break-all; text-align:center; min-height:100px;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Zalgo\", 2000);'>Copy Zalgo</button>";
    }

    public function extractTags($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        preg_match_all('/#\w+/u', $text, $matches);
        $tags = array_unique($matches[0]);
        
        if (empty($tags)) return "<div style='color:var(--text-muted); padding:1rem;'>No hashtags found in the text.</div>";
        
        $count = count($tags);
        $block = implode(' ', $tags);
        $list = implode("\n", $tags);
        
        return "
        <div style='display:grid; gap:1.5rem;'>
            <div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; padding:1.5rem;'>
                <div style='font-size:1.25rem; font-weight:bold; margin-bottom:1rem; color:var(--primary);'>$count Hashtags Found</div>
                
                <h5 style='margin-bottom:0.5rem;'>Space Separated (Ready for Instagram/TikTok)</h5>
                <textarea class='form-control' rows='4' readonly style='margin-bottom:0.5rem;'>".htmlspecialchars($block)."</textarea>
                <button class='btn-outline btn-sm' onclick='this.previousElementSibling.select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Block\", 2000);'>Copy Block</button>
                
                <h5 style='margin-top:1.5rem; margin-bottom:0.5rem;'>List Format</h5>
                <textarea class='form-control' rows='6' readonly style='margin-bottom:0.5rem;'>".htmlspecialchars($list)."</textarea>
                <button class='btn-outline btn-sm' onclick='this.previousElementSibling.select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy List\", 2000);'>Copy List</button>
            </div>
        </div>";
    }

    public function tweetLink($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $encoded = urlencode($text);
        $url = "https://twitter.com/intent/tweet?text=$encoded";
        $html = "<a href=\"$url\">Click to Tweet</a>";
        
        return "
        <div style='display:grid; gap:1rem;'>
            <div>
                <label class='form-label'>Direct Share URL</label>
                <div style='display:flex; gap:0.5rem;'>
                    <input type='text' class='form-control' value='$url' readonly id='tweet-url'>
                    <button class='btn-primary' onclick='document.getElementById(\"tweet-url\").select(); document.execCommand(\"copy\"); this.innerText=\"✓\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
                </div>
            </div>
            <div>
                <label class='form-label'>HTML Embed Code</label>
                <div style='display:flex; gap:0.5rem;'>
                    <input type='text' class='form-control' value='".htmlspecialchars($html)."' readonly id='tweet-html'>
                    <button class='btn-primary' onclick='document.getElementById(\"tweet-html\").select(); document.execCommand(\"copy\"); this.innerText=\"✓\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>
                </div>
            </div>
            <div style='margin-top:1rem;'>
                <a href='$url' target='_blank' class='btn-primary' style='display:inline-flex; align-items:center; gap:0.5rem; background:#1DA1F2; color:#fff; text-decoration:none;'>
                    <span style='font-size:1.2rem;'>🐦</span> Test Link
                </a>
            </div>
        </div>";
    }

    public function socialInfo($data) {
        $plat = $data['platform'] ?? 'twitter';
        $names = ['twitter'=>'X / Twitter', 'facebook'=>'Facebook', 'tiktok'=>'TikTok'];
        $name = $names[$plat];
        
        return "
        <div style='padding:2rem; background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px;'>
            <h3 style='margin-bottom:1rem; color:#1e293b;'>$name Video Downloading API Note</h3>
            <p style='color:#475569; margin-bottom:1rem; line-height:1.6;'>Native direct video downloading from platforms like $name usually requires complex, constantly-updating backend screen scrapers or official API access with privileged read capabilities (which are heavily rate-limited and often restricted from downloading media directly).<br><br>
            To implement a fully working $name downloader in production, you would typically use a verified 3rd Party API provider like RapidAPI (e.g., 'Social Video Downloader API') completely handled server-side to proxy the media bytes to the end user.</p>
            <div style='background:#e0e7ff; color:#3730a3; padding:1rem; border-radius:8px;'>
                <strong>Developer Next Step:</strong> Connect an external API service here inside <code>SocialHandler::$action</code> to fetch the .mp4 streams.
            </div>
        </div>";
    }

    public function emojiTranslate($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $dict = [
            'love'=>'❤️', 'pizza'=>'🍕', 'cats'=>'🐈', 'cat'=>'🐈', 'dog'=>'🐕', 'dogs'=>'🐕',
            'happy'=>'😊', 'sad'=>'😢', 'fire'=>'🔥', 'hot'=>'🔥', 'cool'=>'😎', 'sun'=>'☀️',
            'moon'=>'🌙', 'star'=>'⭐', 'car'=>'🚗', 'house'=>'🏠', 'money'=>'💰', 'heart'=>'❤️',
            'baby'=>'👶', 'magic'=>'✨', 'poop'=>'💩', 'ghost'=>'👻', 'alien'=>'👽', 'robot'=>'🤖'
        ];
        
        $words = preg_split('/(\b|\s+)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $out = '';
        foreach ($words as $w) {
            $lw = strtolower($w);
            if (isset($dict[$lw])) {
                $out .= $dict[$lw];
            } else {
                $out .= $w;
            }
        }
        
        return "
        <div style='padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px; font-size:1.5rem; line-height:1.6;'>
            ".htmlspecialchars($out)."
        </div>";
    }

    public function strike($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $out = '';
        for ($i=0; $i<mb_strlen($text, 'UTF-8'); $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            $out .= $char . "\xCC\xB6"; // U+0336 Combining Long Stroke Overlay
        }
        
        return "
        <div style='padding:1.5rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.5rem; word-break:break-all;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Text\", 2000);'>Copy Text</button>";
    }

    public function upsideDown($data) {
        $text = trim($data['text'] ?? '');
        if (empty($text)) return '';
        
        $normal = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?.,'\"()[]{}<>&_";
        $upside = "ɐqɔpǝɟƃɥıɾʞlɯuodbɹsʇnʌʍxʎz∀qƆPƎℲפHIſʞ˥WNOԀQᴚS⊥∩ΛMX⅄Z0ƖᄅƐㄣϛ9ㄥ86¡¿˙',,)(][}{><‾";
        
        $out = '';
        for ($i=mb_strlen($text, 'UTF-8')-1; $i>=0; $i--) {
            $char = mb_substr($text, $i, 1, 'UTF-8');
            $pos = mb_strpos($normal, $char, 0, 'UTF-8');
            if ($pos !== false) {
                $out .= mb_substr($upside, $pos, 1, 'UTF-8');
            } else {
                $out .= $char;
            }
        }
        
        return "
        <div style='padding:1.5rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.5rem; word-break:break-all;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Text\", 2000);'>Copy Text</button>";
    }

    public function morse($data) {
        $text = strtoupper(trim($data['text'] ?? ''));
        $mode = $data['mode'] ?? 'encode';
        if (empty($text)) return '';
        
        $map = [
            'A'=>'.-', 'B'=>'-...', 'C'=>'-.-.', 'D'=>'-..', 'E'=>'.', 'F'=>'..-.', 'G'=>'--.', 'H'=>'....',
            'I'=>'..', 'J'=>'.---', 'K'=>'-.-', 'L'=>'.-..', 'M'=>'--', 'N'=>'-.', 'O'=>'---', 'P'=>'.--.',
            'Q'=>'--.-', 'R'=>'.-.', 'S'=>'...', 'T'=>'-', 'U'=>'..-', 'V'=>'...-', 'W'=>'.--', 'X'=>'-..-',
            'Y'=>'-.--', 'Z'=>'--..', '0'=>'-----', '1'=>'.----', '2'=>'..---', '3'=>'...--', '4'=>'....-',
            '5'=>'.....', '6'=>'-....', '7'=>'--...', '8'=>'---..', '9'=>'----.', '.'=>'.-.-.-', ','=>'--..--',
            '?'=>'..--..', "'"=>'.----.', '!'=>'-.-.--', '/'=>'-..-.', '('=>'-.--.', ')'=>'-.--.-', '&'=>'.-...',
            ':'=>'---...', ';'=>'-.-.-.', '='=>'-...-', '+'=>'.-.-.', '-'=>'-....-', '_'=>'..--.-', '"'=>'.-..-.',
            '$'=>'...-..-', '@'=>'.--.-.'
        ];
        
        $out = '';
        if ($mode == 'encode') {
            for ($i=0; $i<strlen($text); $i++) {
                $c = $text[$i];
                if ($c == ' ') $out .= ' / ';
                elseif (isset($map[$c])) $out .= $map[$c] . ' ';
            }
        } else {
            $rev = array_flip($map);
            $words = explode(' / ', $text);
            foreach ($words as $w) {
                $chars = explode(' ', trim($w));
                foreach ($chars as $c) {
                    if (isset($rev[$c])) $out .= $rev[$c];
                }
                $out .= ' ';
            }
        }
        $out = trim($out);
        
        return "
        <div style='padding:1.5rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:1.5rem; font-family:monospace; word-break:break-all;'>".htmlspecialchars($out)."</div>
        </div>
        <button class='btn-primary' style='margin-top:1rem;' onclick='navigator.clipboard.writeText(\"".htmlspecialchars(addslashes($out))."\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy\", 2000);'>Copy</button>";
    }

}
