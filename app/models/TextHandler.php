<?php

class TextHandler extends Model {
    
    public function wordCount($data) {
        $text = $data['text'] ?? '';
        $wordCount = str_word_count($text);
        $charCount = mb_strlen($text, 'UTF-8');
        $charNoSpacesCount = mb_strlen(str_replace(' ', '', $text), 'UTF-8');
        $sentenceCount = preg_match_all('/[^\s](\b[^.!?]*[.!?])/', $text, $matches) ?: 0;
        if ($sentenceCount == 0 && $charCount > 0) $sentenceCount = 1;

        $readingTime = ceil($wordCount / 225); // 225 wpm average reading
        $speakingTime = ceil($wordCount / 130); // 130 wpm average speaking
        
        $words = str_word_count($text, 1);
        $longestWord = '';
        foreach($words as $w) {
            if (mb_strlen($w) > mb_strlen($longestWord)) {
                $longestWord = $w;
            }
        }
        $longestWordHtml = $longestWord !== '' ? htmlspecialchars($longestWord) : '-';

        return "
            <div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 0.5rem; margin-top:0.25rem; font-family: inherit;'>
                <div style='background: var(--white); padding: 0.65rem 0.85rem; border-radius: 10px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;'>Words</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>{$wordCount}</span>
                </div>
                <div style='background: var(--white); padding: 0.65rem 0.85rem; border-radius: 10px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;'>Characters</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>{$charCount}</span>
                </div>
                <div style='background: var(--white); padding: 0.65rem 0.85rem; border-radius: 10px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;'>No Spaces</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>{$charNoSpacesCount}</span>
                </div>
                <div style='background: var(--white); padding: 0.65rem 0.85rem; border-radius: 10px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); display: flex; justify-content: space-between; align-items: center;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;'>Sentences</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>{$sentenceCount}</span>
                </div>
            </div>
            <div style='display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; margin-top:0.5rem; font-family: inherit;'>
                <div style='background: var(--white); padding: 0.65rem; border-radius: 10px; border: 1px dashed var(--border); text-align: center;'>
                    <div style='font-size:1rem; font-weight:800; color:var(--text-dark);'>~{$readingTime}m</div>
                    <div style='font-size:0.65rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase;'>Read Time</div>
                </div>
                <div style='background: var(--white); padding: 0.65rem; border-radius: 10px; border: 1px dashed var(--border); text-align: center;'>
                    <div style='font-size:1rem; font-weight:800; color:var(--text-dark);'>~{$speakingTime}m</div>
                    <div style='font-size:0.65rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase;'>Speak Time</div>
                </div>
                <div style='background: var(--white); padding: 0.65rem; border-radius: 10px; border: 1px dashed var(--border); overflow:hidden; text-align: center;'>
                    <div style='font-size:0.9rem; font-weight:800; color:var(--primary); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>{$longestWordHtml}</div>
                    <div style='font-size:0.65rem; color:var(--text-muted); font-weight: 700; text-transform: uppercase;'>Longest</div>
                </div>
            </div>
        ";
    }

    public function uppercase($data) {
        $text = $data['text'] ?? '';
        return $this->formatTextResult(mb_strtoupper($text, 'UTF-8'));
    }

    public function lowercase($data) {
        $text = $data['text'] ?? '';
        return $this->formatTextResult(mb_strtolower($text, 'UTF-8'));
    }

    public function reverse($data) {
        $text = $data['text'] ?? '';
        // handle multibyte reverse
        preg_match_all('/./us', $text, $ar);
        $rev = join('', array_reverse($ar[0]));
        return $this->formatTextResult($rev);
    }

    public function removeSpaces($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        return $this->formatTextResult($text);
    }

    public function lineCounter($data) {
        $text = $data['text'] ?? '';
        $count = $text === '' ? 0 : substr_count($text, "\n") + 1;
        return "<div style='background:white; border:1px solid var(--border); border-radius:8px; padding:0.65rem 1rem; display:flex; justify-content:space-between; align-items:center; max-width:250px; margin:0.25rem auto;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight:700; text-transform:uppercase;'>Lines</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>$count</span>
                </div>";
    }

    public function vowelCounter($data) {
        $text = $data['text'] ?? '';
        $count = preg_match_all('/[aeiouAEIOU]/i', $text);
        return "<div style='background:white; border:1px solid var(--border); border-radius:8px; padding:0.65rem 1rem; display:flex; justify-content:space-between; align-items:center; max-width:250px; margin:0.25rem auto;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight:700; text-transform:uppercase;'>Vowels</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>$count</span>
                </div>";
    }

    public function consonantCounter($data) {
        $text = $data['text'] ?? '';
        $count = preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/i', $text);
        return "<div style='background:white; border:1px solid var(--border); border-radius:8px; padding:0.65rem 1rem; display:flex; justify-content:space-between; align-items:center; max-width:250px; margin:0.25rem auto;'>
                    <span style='font-size:0.75rem; color:var(--text-muted); font-weight:700; text-transform:uppercase;'>Consonants</span>
                    <span style='font-size:1.25rem; font-weight:800; color:var(--primary);'>$count</span>
                </div>";
    }

    public function syllableCounter($data) {
        $text = strtolower($data['text'] ?? '');
        // Rough estimation
        preg_match_all('/[aeiouy]+/', $text, $matches);
        $count = count($matches[0]);
        // Adjust for common silent 'e' at the end of words
        $silentE = preg_match_all('/[^aeiou]e\b/', $text);
        $count -= $silentE;
        $count = max(0, $count);
        if ($text !== '' && $count === 0) $count = 1;
        return "<div style='font-size:2rem; font-weight:800; color:var(--primary); text-align:center;'>$count</div><div style='text-align:center; font-size:0.875rem; color:var(--text-muted); font-weight:600; text-transform:uppercase;'>Syllables (Est.)</div>";
    }

    public function sentenceCounter($data) {
        $text = $data['text'] ?? '';
        $count = preg_match_all('/[^\s](\b[^.!?]*[.!?])/', $text) ?: 0;
        if ($count == 0 && strlen(trim($text)) > 0) $count = 1;
        return "<div style='font-size:2rem; font-weight:800; color:var(--primary); text-align:center;'>$count</div><div style='text-align:center; font-size:0.875rem; color:var(--text-muted); font-weight:600; text-transform:uppercase;'>Sentences</div>";
    }

    public function paragraphCounter($data) {
        $text = trim($data['text'] ?? '');
        if ($text === '') {
            $count = 0;
        } else {
            $paragraphs = preg_split('/\n\s*\n/', $text);
            $count = count($paragraphs);
        }
        return "<div style='font-size:2rem; font-weight:800; color:var(--primary); text-align:center;'>$count</div><div style='text-align:center; font-size:0.875rem; color:var(--text-muted); font-weight:600; text-transform:uppercase;'>Paragraphs</div>";
    }

    public function spaceCounter($data) {
        $text = $data['text'] ?? '';
        $count = substr_count($text, ' ');
        return "<div style='font-size:2rem; font-weight:800; color:var(--primary); text-align:center;'>$count</div><div style='text-align:center; font-size:0.875rem; color:var(--text-muted); font-weight:600; text-transform:uppercase;'>Spaces</div>";
    }

    public function titleCase($data) {
        $text = mb_convert_case($data['text'] ?? '', MB_CASE_TITLE, "UTF-8");
        return $this->formatTextResult($text);
    }

    public function camelCase($data) {
        $text = $data['text'] ?? '';
        $text = ucwords(str_replace(['-', '_'], ' ', $text));
        $text = lcfirst(str_replace(' ', '', $text));
        return $this->formatTextResult($text);
    }

    public function snakeCase($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace('/[A-Z]/', '_$0', $text);
        $text = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '_', trim($text)));
        $text = trim($text, '_');
        return $this->formatTextResult($text);
    }

    public function pascalCase($data) {
        $text = $data['text'] ?? '';
        $text = str_replace(' ', '', ucwords(preg_replace('/[^a-zA-Z0-9]+/', ' ', $text)));
        return $this->formatTextResult($text);
    }

    public function kebabCase($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace('/[A-Z]/', '-$0', $text);
        $text = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim($text)));
        $text = trim($text, '-');
        return $this->formatTextResult($text);
    }

    public function textSorter($data) {
        $lines = explode("\n", str_replace("\r", "", $data['text'] ?? ''));
        $lines = array_filter(array_map('trim', $lines));
        natcasesort($lines);
        return $this->formatTextResult(implode("\n", $lines));
    }

    public function reverseWords($data) {
        $text = $data['text'] ?? '';
        $words = preg_split('/(\s+)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
        $reversed = '';
        foreach ($words as $word) {
            $reversed .= preg_match('/^\s+$/', $word) ? $word : join('', array_reverse(preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY)));
        }
        return $this->formatTextResult($reversed);
    }

    public function removeEmptyLines($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace("/(^[\r\n]*|[\r\n]+)[\s]\t*[\r\n]+/", "\n", $text);
        $text = preg_replace("/\n\n+/", "\n", $text);
        return $this->formatTextResult(trim($text));
    }

    public function removeDuplicateWords($data) {
        $text = $data['text'] ?? '';
        $words = preg_split('/\s+/', $text);
        $words = array_unique($words);
        return $this->formatTextResult(implode(' ', $words));
    }

    public function extractEmails($data) {
        $text = $data['text'] ?? '';
        preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $text, $matches);
        $emails = array_unique($matches[0]);
        if (empty($emails)) return "<div style='color:red;'>No emails found.</div>";
        return $this->formatTextResult(implode("\n", $emails));
    }

    public function findAndReplace($data) {
        $text = $data['text'] ?? '';
        $find = $data['find'] ?? '';
        $replace = $data['replace'] ?? '';
        if ($find === '') return $this->formatTextResult($text);
        $result = str_replace($find, $replace, $text);
        return $this->formatTextResult($result);
    }

    public function stringToSlug($data) {
        $text = $data['text'] ?? '';
        $text = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
        $text = trim($text, '-');
        return $this->formatTextResult($text);
    }

    public function markdownToHtml($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
        $text = preg_replace('/^# (.*?)$/m', '<h1>$1</h1>', $text);
        $text = preg_replace('/^## (.*?)$/m', '<h2>$1</h2>', $text);
        $text = preg_replace('/^### (.*?)$/m', '<h3>$1</h3>', $text);
        $text = nl2br($text);
        return $this->formatTextResult($text);
    }

    public function htmlToMarkdown($data) {
        $text = $data['text'] ?? '';
        $text = preg_replace('/<h1[^>]*>(.*?)<\/h1>/i', "# $1\n", $text);
        $text = preg_replace('/<h2[^>]*>(.*?)<\/h2>/i', "## $1\n", $text);
        $text = preg_replace('/<h3[^>]*>(.*?)<\/h3>/i', "### $1\n", $text);
        $text = preg_replace('/<(strong|b)[^>]*>(.*?)<\/(strong|b)>/i', "**$2**", $text);
        $text = preg_replace('/<(em|i)[^>]*>(.*?)<\/(em|i)>/i', "*$2*", $text);
        $text = strip_tags($text);
        return $this->formatTextResult(trim($text));
    }

    public function textToBinary($data) {
        $text = $data['text'] ?? '';
        $binary = '';
        foreach (str_split($text) as $char) {
            $binary .= str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT) . ' ';
        }
        return $this->formatTextResult(trim($binary));
    }

    public function binaryToText($data) {
        $text = $data['text'] ?? '';
        $bins = explode(' ', $text);
        $str = '';
        foreach ($bins as $bin) {
            if ($bin !== '') $str .= chr(bindec($bin));
        }
        return $this->formatTextResult($str);
    }

    public function textToHex($data) {
        $text = $data['text'] ?? '';
        $hex = '';
        foreach (str_split($text) as $char) {
            $hex .= str_pad(dechex(ord($char)), 2, '0', STR_PAD_LEFT) . ' ';
        }
        return $this->formatTextResult(trim(strtoupper($hex)));
    }

    public function hexToText($data) {
        $text = str_replace(' ', '', $data['text'] ?? '');
        $str = '';
        for ($i = 0; $i < strlen($text) - 1; $i += 2) {
            $str .= chr(hexdec($text[$i] . $text[$i + 1]));
        }
        return $this->formatTextResult($str);
    }

    public function textToAscii($data) {
        $text = $data['text'] ?? '';
        $ascii = [];
        foreach (str_split($text) as $char) {
            $ascii[] = ord($char);
        }
        return $this->formatTextResult(implode(' ', $ascii));
    }

    public function asciiToText($data) {
        $text = $data['text'] ?? '';
        $vals = explode(' ', $text);
        $str = '';
        foreach ($vals as $val) {
            if (is_numeric($val)) $str .= chr((int)$val);
        }
        return $this->formatTextResult($str);
    }

    public function textToMorse($data) {
        $text = strtoupper($data['text'] ?? '');
        $morseDict = [
            'A'=>'.-', 'B'=>'-...', 'C'=>'-.-.', 'D'=>'-..', 'E'=>'.', 'F'=>'..-.', 'G'=>'--.', 'H'=>'....', 'I'=>'..', 'J'=>'.---',
            'K'=>'-.-', 'L'=>'.-..', 'M'=>'--', 'N'=>'-.', 'O'=>'---', 'P'=>'.--.', 'Q'=>'--.-', 'R'=>'.-.', 'S'=>'...', 'T'=>'-',
            'U'=>'..-', 'V'=>'...-', 'W'=>'.--', 'X'=>'-..-', 'Y'=>'-.--', 'Z'=>'--..',
            '0'=>'-----', '1'=>'.----', '2'=>'..---', '3'=>'...--', '4'=>'....-', '5'=>'.....', '6'=>'-....', '7'=>'--...', '8'=>'---..', '9'=>'----.',
            ' '=>'/'
        ];
        $morse = [];
        foreach (str_split($text) as $char) {
            if (isset($morseDict[$char])) $morse[] = $morseDict[$char];
        }
        return $this->formatTextResult(implode(' ', $morse));
    }

    public function morseToText($data) {
        $text = trim($data['text'] ?? '');
        $morseDict = [
            '.-'=>'A', '-...'=>'B', '-.-.'=>'C', '-..'=>'D', '.'=>'E', '..-.'=>'F', '--.'=>'G', '....'=>'H', '..'=>'I', '.---'=>'J',
            '-.-'=>'K', '.-..'=>'L', '--'=>'M', '-.'=>'N', '---'=>'O', '.--.'=>'P', '--.-'=>'Q', '.-.'=>'R', '...'=>'S', '-'=>'T',
            '..-'=>'U', '...-'=>'V', '.--'=>'W', '-..-'=>'X', '-.--'=>'Y', '--..'=>'Z',
            '-----'=>'0', '.----'=>'1', '..---'=>'2', '...--'=>'3', '....-'=>'4', '.....'=>'5', '-....'=>'6', '--...'=>'7', '---..'=>'8', '----.'=>'9',
            '/'=>' '
        ];
        $words = explode('/', $text);
        $str = '';
        foreach ($words as $word) {
            $chars = explode(' ', trim($word));
            foreach ($chars as $char) {
                if (isset($morseDict[$char])) $str .= $morseDict[$char];
            }
            $str .= ' ';
        }
        return $this->formatTextResult(trim($str));
    }

    public function zalgoText($data) {
        $text = $data['text'] ?? '';
        $zalgo_up = [
            "\xcc\x8d", "\xcc\x8e", "\xcc\x84", "\xcc\x85", "\xcc\x88", "\xcc\x8a", "\xcc\x8b", "\xcc\x8c",
            "\xcc\x86", "\xcc\x87", "\xcc\x89", "\xcc\x90", "\xcc\x91", "\xcc\x92", "\xcc\x93", "\xcc\x94",
        ];
        $zalgo_down = [
            "\xcc\x96", "\xcc\x97", "\xcc\x98", "\xcc\x99", "\xcc\x9a", "\xcc\x9b", "\xcc\x9c", "\xcc\x9d",
            "\xcc\x9e", "\xcc\x9f", "\xcc\xa0", "\xcc\xa1", "\xcc\xa2", "\xcc\xa3", "\xcc\xa4", "\xcc\xa5",
        ];
        $zalgo_mid = [
            "\xcc\x95", "\xcc\x9b", "\xcc\xa0", "\xcc\xa4", "\xcc\xa7", "\xcc\xa8", "\xcd\xa2"
        ];
        $str = '';
        foreach (str_split($text) as $char) {
            $str .= $char;
            $num_up = random_int(1, 4);
            $num_mid = random_int(0, 2);
            $num_down = random_int(1, 4);
            for ($i=0; $i<$num_up; $i++) $str .= $zalgo_up[array_rand($zalgo_up)];
            for ($i=0; $i<$num_mid; $i++) $str .= $zalgo_mid[array_rand($zalgo_mid)];
            for ($i=0; $i<$num_down; $i++) $str .= $zalgo_down[array_rand($zalgo_down)];
        }
        return $this->formatTextResult($str);
    }

    public function leetSpeak($data) {
        $text = strtoupper($data['text'] ?? '');
        $leet = [
            'A'=>'4', 'B'=>'8', 'C'=>'<', 'E'=>'3', 'G'=>'6', 'H'=>'#', 'I'=>'1', 'L'=>'1', 'O'=>'0', 'S'=>'5', 'T'=>'7', 'Z'=>'2'
        ];
        $str = strtr($text, $leet);
        return $this->formatTextResult(strtolower($str));
    }

    public function textRepeater($data) {
        $text = $data['text'] ?? '';
        $times = isset($data['times']) ? intval($data['times']) : 10;
        if ($times > 10000) $times = 10000;
        if ($times < 1) $times = 1;
        $str = str_repeat($text . ' ', $times);
        return $this->formatTextResult(trim($str));
    }

    public function upsideDownText($data) {
        $text = mb_strtolower($data['text'] ?? '', 'UTF-8');
        $normal = "abcdefghijklmnopqrstuvwxyz,.? 0123456789";
        $upside = "ɐqɔpǝɟƃɥıɾʞlɯuodbɹsʇnʌʍxʎz'˙¿ 0ƖᄅƐㄣϛ9ㄥ86";
        $str = '';
        for ($i = mb_strlen($text) - 1; $i >= 0; $i--) {
            $char = mb_substr($text, $i, 1);
            $pos = mb_strpos($normal, $char);
            if ($pos !== false) {
                $str .= mb_substr($upside, $pos, 1);
            } else {
                $str .= $char;
            }
        }
        return $this->formatTextResult($str);
    }

    public function textToOctal($data) {
        $text = $data['text'] ?? '';
        $octal = '';
        foreach (str_split($text) as $char) {
            $octal .= decoct(ord($char)) . ' ';
        }
        return $this->formatTextResult(trim($octal));
    }

    public function octalToText($data) {
        $text = trim($data['text'] ?? '');
        $octals = explode(' ', $text);
        $str = '';
        foreach ($octals as $oct) {
            if ($oct !== '') $str .= chr(octdec($oct));
        }
        return $this->formatTextResult($str);
    }

    public function rot13($data) {
        $text = $data['text'] ?? '';
        return $this->formatTextResult(str_rot13($text));
    }

    public function wordScrambler($data) {
        $text = $data['text'] ?? '';
        $words = explode(' ', $text);
        $scrambled = [];
        foreach ($words as $word) {
            if (strlen($word) > 3) {
                $first = $word[0];
                $last = $word[strlen($word) - 1];
                $middle = substr($word, 1, -1);
                $midArr = str_split($middle);
                shuffle($midArr);
                $scrambled[] = $first . implode('', $midArr) . $last;
            } else {
                $scrambled[] = $word;
            }
        }
        return $this->formatTextResult(implode(' ', $scrambled));
    }

    public function bionicReading($data) {
        $text = $data['text'] ?? '';
        $words = explode(' ', $text);
        $bionic = [];
        foreach ($words as $word) {
            $len = strlen($word);
            if ($len > 0) {
                $half = ceil($len / 2);
                if ($len == 1) $half = 1;
                $bionic[] = '<b>' . substr($word, 0, $half) . '</b>' . substr($word, $half);
            } else {
                $bionic[] = '';
            }
        }
        return "<div style='background:#f8fafc; border:1px solid var(--border); border-radius:var(--radius); padding:1.5rem; text-align:left; font-size:1.1rem; line-height:1.6; color:var(--text-dark);'>" . implode(' ', $bionic) . "</div>";
    }

    public function grammarCheck($data) {
        return $this->grammarChecker($data);
    }

    public function grammarChecker($data) {
        $text = $data['text'] ?? '';
        if (empty($text)) return "<div style='color:red;'>Please enter text to check.</div>";

        $checks = [
            'Passive Voice' => '/\b(am|is|are|was|were|be|been|being)\b\s+([a-z]+ed|taken|given|made|done|seen|known)\b/i',
            'Wordiness' => '/\b(actually|really|basically|literally|simply|just|fairly|pretty|somewhat)\b/i',
            'Common Clichés' => '/\b(at the end of the day|think outside the box|win-win|par for the course)\b/i',
            'Repetitive Start' => '/^(\w+)\b.*?\n\1\b/m',
            'Double Spaces' => '/  +/',
            'Complex Words' => '/\b(utlize|facilitate|implementation|advantageous|termination)\b/i'
        ];

        $results = [];
        foreach ($checks as $category => $regex) {
            $count = preg_match_all($regex, $text, $matches);
            if ($count > 0) {
                $results[] = [
                    'category' => $category,
                    'count' => $count,
                    'examples' => array_unique(array_slice($matches[0], 0, 3))
                ];
            }
        }

        $html = "<div style='display:grid; gap:1.5rem;'>";
        $html .= "<div style='background:var(--primary); color:white; padding:1.5rem; border-radius:12px;'>
                    <h4 style='margin:0;'>Grammar & Style Analysis</h4>
                    <p style='margin:0.5rem 0 0 0; opacity:0.9;'>Detected " . count($results) . " areas for improvement.</p>
                  </div>";

        if (empty($results)) {
            $html .= "<div style='text-align:center; padding:2rem; color:#22c55e;'>✨ No major issues detected. Your writing is clear!</div>";
        } else {
            foreach ($results as $res) {
                $html .= "<div style='background:white; border:1px solid var(--border); padding:1rem; border-radius:8px;'>
                            <div style='display:flex; justify-content:space-between; align-items:center;'>
                                <strong style='color:var(--text-dark);'>{$res['category']}</strong>
                                <span style='background:#fee2e2; color:#ef4444; padding:2px 8px; border-radius:4px; font-size:0.8rem;'>{$res['count']} found</span>
                            </div>
                            <div style='margin-top:0.5rem; color:var(--text-muted); font-size:0.9rem;'>
                                Suggestion: " . ($res['category'] === 'Passive Voice' ? 'Try using active verbs.' : 'Consider simplifying or removing these.') . "
                                <br>Examples: <i>" . implode(', ', array_map('htmlspecialchars', $res['examples'])) . "</i>
                            </div>
                          </div>";
            }
        }
        $html .= "</div>";
        return $html;
    }

    public function advancedSentiment($data) {
        $text = strtolower($data['text'] ?? '');
        
        $lexicon = [
            'positive' => ['excellent', 'amazing', 'brilliant', 'wonderful', 'perfect', 'love', 'happy', 'great', 'success', 'win', 'useful', 'fast', 'secure', 'easy', 'elegant', 'professional', 'premium', 'best'],
            'negative' => ['bad', 'terrible', 'awful', 'sad', 'angry', 'hate', 'poor', 'worst', 'useless', 'fail', 'broken', 'error', 'wrong', 'slow', 'ugly', 'cluttered', 'expensive', 'difficult'],
            'intensity' => ['very', 'extremely', 'incredibly', 'totally', 'completely', 'absolutely', 'highly']
        ];

        $pCount = 0; $nCount = 0;
        foreach($lexicon['positive'] as $w) $pCount += substr_count($text, $w);
        foreach($lexicon['negative'] as $w) $nCount += substr_count($text, $w);
        
        // Intensity booster
        foreach($lexicon['intensity'] as $i) {
            if (strpos($text, $i) !== false) {
                $pCount *= 1.2;
                $nCount *= 1.2;
            }
        }

        $total = $pCount + $nCount;
        $score = ($total > 0) ? ($pCount - $nCount) / $total : 0;
        
        $sentiment = "Neutral"; $color = "#64748b"; $emoji = "😐";
        if ($score > 0.3) { $sentiment = "Positive"; $color = "#22c55e"; $emoji = "😊"; }
        elseif ($score < -0.3) { $sentiment = "Negative"; $color = "#ef4444"; $emoji = "😠"; }
        
        return "
        <div style='background:white; border:1px solid var(--border); border-radius:12px; overflow:hidden; font-family:inherit; max-width:500px; margin:0 auto;'>
            <div style='background:$color; color:white; padding:0.85rem; text-align:center; display:flex; items-center justify-content:center; gap:1.5rem;'>
                <div style='font-size:2rem;'>$emoji</div>
                <div style='text-align:left;'>
                    <h4 style='margin:0; font-size:1.1rem;'>$sentiment Sentiment</h4>
                    <div style='opacity:0.8; font-size:0.7rem;'>Intensity: " . round($score * 100) . "%</div>
                </div>
            </div>
            <div style='padding:0.75rem; display:grid; grid-template-columns:1fr 1fr; gap:0.5rem; text-align:center;'>
                <div style='border-right:1px solid var(--border); padding:0.25rem;'>
                    <div style='font-size:1.15rem; font-weight:700; color:#22c55e;'>$pCount</div>
                    <div style='font-size:0.65rem; color:var(--text-muted); font-weight:700; text-transform:uppercase;'>Positive</div>
                </div>
                <div style='padding:0.25rem;'>
                    <div style='font-size:1.15rem; font-weight:700; color:#ef4444;'>$nCount</div>
                    <div style='font-size:0.65rem; color:var(--text-muted); font-weight:700; text-transform:uppercase;'>Negative</div>
                </div>
            </div>
        </div>";
    }

    public function advancedKeywordDensity($data) {
        $text = strtolower($data['text'] ?? '');
        $words = preg_split('/\W+/', $text, -1, PREG_SPLIT_NO_EMPTY);
        $total = count($words);
        if ($total < 5) return "<div style='color:red;'>Text too short for keyword mapping.</div>";

        $ngrams = [1 => [], 2 => [], 3 => []];
        
        for ($i = 0; $i < $total; $i++) {
            $ngrams[1][] = $words[$i];
            if (isset($words[$i+1])) $ngrams[2][] = $words[$i] . ' ' . $words[$i+1];
            if (isset($words[$i+2])) $ngrams[3][] = $words[$i] . ' ' . $words[$i+1] . ' ' . $words[$i+2];
        }

        $html = "<div style='display:grid; gap:2rem;'>";
        foreach ([1, 2, 3] as $n) {
            $counts = array_count_values($ngrams[$n]);
            arsort($counts);
            $top = array_slice($counts, 0, 5);
            
            $html .= "<div>
                        <h4 style='margin-bottom:1rem; color:var(--text-dark); border-bottom:2px solid var(--primary); display:inline-block;'>$n-Word Phrases</h4>
                        <div style='display:grid; gap:0.5rem;'>";
            foreach ($top as $phrase => $count) {
                $pct = round(($count / ($total - $n + 1)) * 100, 1);
                $html .= "<div style='background:white; border:1px solid var(--border); padding:0.75rem 1rem; border-radius:8px; display:flex; justify-content:space-between; align-items:center;'>
                            <span style='font-weight:600;'>$phrase</span>
                            <span style='background:var(--bg-body); padding:2px 8px; border-radius:4px; font-size:0.8rem;'>$count matches ($pct%)</span>
                          </div>";
            }
            $html .= "</div></div>";
        }
        $html .= "</div>";
        return $html;
    }

    public function readabilityScore($data) {
        return $this->readabilityHub($data);
    }

    public function readabilityHub($data) {
        $text = $data['text'] ?? '';
        if (strlen($text) < 100) return "<div style='color:red;'>At least 100 characters required for readability indexing.</div>";

        $words = str_word_count($text);
        $sentences = preg_match_all('/[.!?]+/', $text) ?: 1;
        $chars = strlen(preg_replace('/\s+/', '', $text));
        preg_match_all('/[aeiouy]{1,3}/i', $text, $sMatches);
        $syllables = count($sMatches[0]);

        // Flesch Reading Ease
        $flesch = 206.835 - 1.015 * ($words / $sentences) - 84.6 * ($syllables / $words);
        
        // Gunning Fog Index: 0.4 * [ (words/sentences) + 100 * (complex_words/words) ]
        // Complex words = 3+ syllables
        $complex = 0;
        $wordsArr = str_word_count($text, 1);
        foreach($wordsArr as $w) {
            preg_match_all('/[aeiouy]{1,3}/i', $w, $m);
            if (count($m[0]) >= 3) $complex++;
        }
        $fog = 0.4 * (($words / $sentences) + 100 * ($complex / $words));

        $grade = "Standard";
        if ($flesch > 90) $grade = "Very Easy (5th Grade)";
        elseif ($flesch > 60) $grade = "Standard (8th Grade)";
        elseif ($flesch > 30) $grade = "Difficult (College)";
        else $grade = "Professional (Post-Grad)";

        return "
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:0.5rem; font-family:inherit; max-width:600px; margin:0 auto;'>
            <div style='background:#f0f9ff; border:1px solid #bae6fd; padding:0.75rem; border-radius:10px; display:flex; justify-content:space-between; align-items:center;'>
                <div style='font-size:0.65rem; color:#0369a1; text-transform:uppercase; font-weight:700;'>Flesch Ease</div>
                <div style='text-align:right;'>
                    <div style='font-size:1.15rem; font-weight:900; color:#0c4a6e;'>" . round($flesch) . "</div>
                    <div style='color:#0e7490; font-weight:700; font-size:0.65rem;'>$grade</div>
                </div>
            </div>
            <div style='background:#fefce8; border:1px solid #fef08a; padding:0.75rem; border-radius:10px; display:flex; justify-content:space-between; align-items:center;'>
                <div style='font-size:0.65rem; color:#854d0e; text-transform:uppercase; font-weight:700;'>Gunning Fog</div>
                <div style='text-align:right;'>
                    <div style='font-size:1.15rem; font-weight:900; color:#713f12;'>" . round($fog, 1) . "</div>
                    <div style='color:#a16207; font-weight:700; font-size:0.65rem;'>Grade Level</div>
                </div>
            </div>
        </div>
        <div style='margin-top:0.5rem; font-size:0.75rem; color:var(--text-muted); text-align:center; font-style: italic;'>
            Analysis of $words words across $sentences sentences.
        </div>";
    }

    public function caseConverterPro($data) {
        $text = $data['text'] ?? '';
        $type = $data['type'] ?? 'sentence';
        
        switch($type) {
            case 'camel':
                $text = lcfirst(str_replace(' ', '', ucwords(strtolower(preg_replace('/[^a-zA-Z0-9]+/', ' ', $text)))));
                break;
            case 'snake':
                $text = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '_', trim($text)));
                break;
            case 'pascal':
                $text = str_replace(' ', '', ucwords(strtolower(preg_replace('/[^a-zA-Z0-9]+/', ' ', $text))));
                break;
            case 'kebab':
                $text = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim($text)));
                break;
            case 'sentence':
                $text = ucfirst(strtolower($text));
                break;
            case 'title':
                $text = mb_convert_case($text, MB_CASE_TITLE, "UTF-8");
                break;
        }
        return $this->formatTextResult($text);
    }

    public function textSummarizer($data) {
        $text = $data['text'] ?? '';
        $count = intval($data['sentences'] ?? 3);
        $sentences = preg_split('/(?<=[.!?])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
        if (count($sentences) <= $count) return $this->formatTextResult($text);
        
        // Simple ranking: choose first sentence + N middle sentences
        $summary = [$sentences[0]];
        $step = floor(count($sentences) / ($count - 1));
        for($i = 1; $i < $count - 1; $i++) {
            $idx = $i * $step;
            if (isset($sentences[$idx])) $summary[] = $sentences[$idx];
        }
        $summary[] = end($sentences);
        
        return $this->formatTextResult(implode(' ', array_unique($summary)));
    }

    public function emojiRemover($data) {
        $text = $data['text'] ?? '';
        $clean = preg_replace('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{1F1E0}-\x{1F1FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', '', $text);
        return $this->formatTextResult($clean);
    }

    public function invisibleCharRemover($data) {
        $text = $data['text'] ?? '';
        // Remove ZWS, LRM, RLM, etc.
        $clean = preg_replace('/[\x{200B}-\x{200D}\x{FEFF}]/u', '', $text);
        return $this->formatTextResult($clean);
    }

    public function loremIpsum($data) {
        $paras = intval($data['paragraphs'] ?? 3);
        $type = $data['type'] ?? 'std';
        
        $base = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $html = '';
        for($i=0; $i<$paras; $i++) {
            $html .= $base . "\n\n";
        }
        return $this->formatTextResult(trim($html));
    }

    public function randomSentence($data) {
        $count = intval($data['count'] ?? 5);
        $subjects = ['The cat', 'A developer', 'Success', 'The goal', 'Innovation', 'Technology'];
        $verbs = ['is', 'running', 'creates', 'needs', 'drives', 'improves'];
        $objects = ['new ideas.', 'fast.', 'the future.', 'problems.', 'results.', 'everyone.'];
        
        $res = [];
        for($i=0; $i<$count; $i++) {
            $res[] = $subjects[array_rand($subjects)] . " " . $verbs[array_rand($verbs)] . " " . $objects[array_rand($objects)];
        }
        return $this->formatTextResult(implode("\n", $res));
    }

    public function readingTimeCalc($data) {
        $text = $data['text'] ?? '';
        $wordCount = str_word_count($text);
        $time = ceil($wordCount / 225);
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
             <div style='font-size:4rem;'>⏱️</div>
             <div style='font-size:2.5rem; font-weight:900; color:var(--primary);'>$time Minutes</div>
             <div style='color:var(--text-muted);'>Estimated reading time (225 WPM)</div>
        </div>";
    }

    public function speakingTimeCalc($data) {
        $text = $data['text'] ?? '';
        $wordCount = str_word_count($text);
        $time = ceil($wordCount / 130);
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:2rem; border-radius:12px; text-align:center;'>
             <div style='font-size:4rem;'>🎙️</div>
             <div style='font-size:2.5rem; font-weight:900; color:var(--primary);'>$time Minutes</div>
             <div style='color:var(--text-muted);'>Estimated speaking time (130 WPM)</div>
        </div>";
    }

    public function textToBase64($data) {
        $text = $data['text'] ?? '';
        return $this->formatTextResult(base64_encode($text));
    }

    public function textDiff($data) {
        $t1 = explode("\n", $data['text1'] ?? '');
        $t2 = explode("\n", $data['text2'] ?? '');
        
        $html = "<div style='font-family:monospace; font-size:0.9rem; background:#fff; border:1px solid var(--border); border-radius:8px; overflow:hidden;'>";
        $max = max(count($t1), count($t2));
        for($i=0; $i<$max; $i++) {
            $l1 = $t1[$i] ?? null;
            $l2 = $t2[$i] ?? null;
            if ($l1 === $l2) {
                $html .= "<div style='padding:0.25rem 1rem; color:#64748b;'>  " . htmlspecialchars($l1) . "</div>";
            } else {
                if ($l1 !== null) $html .= "<div style='padding:0.25rem 1rem; background:#fee2e2; color:#b91c1c;'>- " . htmlspecialchars($l1) . "</div>";
                if ($l2 !== null) $html .= "<div style='padding:0.25rem 1rem; background:#dcfce7; color:#15803d;'>+ " . htmlspecialchars($l2) . "</div>";
            }
        }
        $html .= "</div>";
        return $html;
    }

    public function vowelConsonantCount($data) {
        $text = $data['text'] ?? '';
        $vowels = preg_match_all('/[aeiou]/i', $text);
        $cons = preg_match_all('/[bcdfghjklmnpqrstvwxyz]/i', $text);
        $digits = preg_match_all('/[0-9]/', $text);
        
        return "
        <div style='display:grid; grid-template-columns:repeat(3, 1fr); gap:1rem; text-align:center;'>
            <div style='background:#fdf2f8; border:1px solid #fbcfe8; padding:1.5rem; border-radius:12px;'>
                <div style='font-size:2rem; font-weight:bold; color:#be185d;'>$vowels</div>
                <div style='color:#9d174d;'>Vowels</div>
            </div>
            <div style='background:#f0fdf4; border:1px solid #bbf7d0; padding:1.5rem; border-radius:12px;'>
                <div style='font-size:2rem; font-weight:bold; color:#15803d;'>$cons</div>
                <div style='color:#166534;'>Consonants</div>
            </div>
            <div style='background:#fefce8; border:1px solid #fef08a; padding:1.5rem; border-radius:12px;'>
                <div style='font-size:2rem; font-weight:bold; color:#a16207;'>$digits</div>
                <div style='color:#854d0e;'>Numbers</div>
            </div>
        </div>";
    }

    public function wordCountSEO($data) {
        $text = $data['text'] ?? '';
        $wc = str_word_count($text);
        $cc = strlen($text);
        
        $status = ($wc >= 1000) ? "Excellent" : (($wc >= 600) ? "Good" : "Needs More Content");
        $color = ($wc >= 600) ? "#22c55e" : "#ef4444";
        
        return "
        <div style='background:var(--bg); border:1px solid var(--border); padding:0.85rem; border-radius:12px; margin-bottom:0.5rem; display:flex; justify-content:space-between; align-items:center; font-family:inherit; max-width:500px; margin-left:auto; margin-right:auto;'>
            <div style='text-align:left;'>
                <div style='font-size:0.65rem; color:var(--text-muted); text-transform:uppercase; font-weight:800;'>SEO Content Length</div>
                <div style='font-size:1.5rem; font-weight:900; color:var(--primary);'>" . number_format($wc) . " <span style='font-size:0.75rem;'>words</span></div>
            </div>
            <div style='text-align:right;'>
                <div style='font-weight:800; color:$color; font-size:0.75rem; background: " . $color . "15; padding:4px 10px; border-radius:20px;'>$status</div>
            </div>
        </div>
        <div style='display:grid; grid-template-columns:1fr 1fr; gap:0.5rem; font-family:inherit; max-width:500px; margin:0 auto;'>
            <div style='background:var(--bg); border:1px solid var(--border); padding:0.65rem 1rem; border-radius:8px; display:flex; justify-content:space-between; align-items:center;'>
                <span style='font-size:0.65rem; color:var(--text-muted); text-transform:uppercase; font-weight:700;'>Chars</span>
                <span style='font-size:1.1rem; font-weight:800;'>" . number_format($cc) . "</span>
            </div>
            <div style='background:var(--bg); border:1px solid var(--border); padding:0.65rem 1rem; border-radius:8px; display:flex; justify-content:space-between; align-items:center;'>
                <span style='font-size:0.65rem; color:var(--text-muted); text-transform:uppercase; font-weight:700;'>Grade</span>
                <span style='font-size:1.1rem; font-weight:800;'>Standard</span>
            </div>
        </div>";
    }

    public function keywordDensity($data) {
        $text = $data['text'] ?? '';
        $words = str_word_count(strtolower($text), 1);
        $total = count($words);
        if ($total == 0) return "<div style='color:red;'>No text provided for analysis.</div>";
        
        $counts = array_count_values($words);
        arsort($counts);
        $top = array_slice($counts, 0, 10);
        
        $html = "<div style='text-align:center;'><h4>Keyword Density Analysis</h4><table style='width:100%; max-width:400px; margin:1rem auto; border-collapse:collapse;'>";
        $html .= "<tr style='background:#f8fafc; border-bottom:1px solid var(--border);'><th style='padding:0.5rem;'>Keyword</th><th style='padding:0.5rem;'>Count</th><th style='padding:0.5rem;'>Density</th></tr>";
        foreach ($top as $word => $count) {
            $pct = round(($count / $total) * 100, 2);
            $html .= "<tr style='border-bottom:1px solid var(--border);'><td style='padding:0.5rem;'>$word</td><td style='padding:0.5rem;'>$count</td><td style='padding:0.5rem;'>$pct%</td></tr>";
        }
        $html .= "</table></div>";
        return $html;
    }

    private function formatTextResult($string) {
        return "<textarea class='form-control' rows='6' readonly style='background:#f8fafc; cursor:text;'>" . htmlspecialchars($string) . "</textarea>";
    }
}
