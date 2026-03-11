<?php

class SeoHandler extends Model {
    
    public function keywordDensity($data) {
        $text = trim($data['text'] ?? '');
        $keyword = strtolower(trim($data['keyword'] ?? ''));
        
        if (empty($text) || empty($keyword)) return "<div style='color:red;'>Text and Target Keyword are required.</div>";
        
        $textLower = strtolower($text);
        // Stripping punctuation for accurate counting
        $textClean = preg_replace('/[^\w\s-]/', '', $textLower);
        $words = str_word_count($textClean, 1);
        $totalWords = count($words);
        
        if ($totalWords == 0) return "<div style='color:red;'>No valid words found in text.</div>";
        
        // Count exact keyword matches
        $keywordCount = substr_count($textLower, $keyword);
        $density = ($keywordCount / $totalWords) * 100;
        
        // Warnings
        $warning = '';
        if ($density > 3.5) $warning = "<div style='color:#dc2626; font-size:0.875rem; margin-top:0.5rem;'>⚠️ Warning: Keyword stuffing detected (Density > 3.5%). Risk of search engine penalty.</div>";
        if ($density < 0.5 && $keywordCount > 0) $warning = "<div style='color:#f59e0b; font-size:0.875rem; margin-top:0.5rem;'>⚠️ Note: Keyword density is quite low (< 0.5%). Consider adding more mentions.</div>";
        
        return "
        <div style='display: grid; gap: 1rem;'>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Total Words: <strong style='font-size:1.25rem; color:var(--text-dark);'>$totalWords</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Keyword Occurrences: <strong style='font-size:1.25rem; color:var(--primary);'>$keywordCount</strong></div>
            <div style='padding:1rem; border:1px solid var(--border); border-radius:8px; background:var(--bg);'>Density Percentage: <strong style='font-size:1.5rem; color:var(--text-dark);'>" . number_format($density, 2) . "%</strong>$warning</div>
        </div>";
    }

    public function serpPreview($data) {
        $title = trim($data['title'] ?? 'Example Domain');
        $desc = trim($data['desc'] ?? 'Click here to read more about this topic.');
        $url = trim($data['url'] ?? 'https://example.com/page');
        
        // Shorten title/desc visually to mimic google
        $displayTitle = (strlen($title) > 60) ? substr($title, 0, 57) . '...' : $title;
        $displayDesc = (strlen($desc) > 160) ? substr($desc, 0, 157) . '...' : $desc;
        
        return "
        <div style='padding:1.5rem; border:1px solid #e5e7eb; border-radius:8px; background:#fff; font-family:arial, sans-serif; text-align:left; max-width:600px; margin:0 auto; box-shadow:0 1px 3px rgba(0,0,0,0.1);'>
            <div style='font-size:14px; color:#202124; margin-bottom:4px; display:flex; align-items:center;'>
                <span style='background:#f1f3f4; border-radius:50%; width:28px; height:28px; display:inline-block; margin-right:12px; text-align:center; line-height:28px;'>🌐</span>
                <div>
                   <span style='display:block; color:#202124;'>$url</span>
                </div>
            </div>
            <div style='color:#1a0dab; font-size:20px; line-height:1.3; margin-bottom:3px; font-weight:400; text-decoration:none; cursor:pointer;'>$displayTitle</div>
            <div style='color:#4d5156; font-size:14px; line-height:1.58;'>$displayDesc</div>
            <div style='margin-top:1rem; font-size:0.75rem; color:#9ca3af; border-top:1px solid #e5e7eb; padding-top:0.5rem;'>* Approximated Desktop SERP layout. Length truncations may vary slightly on actual Google results.</div>
        </div>";
    }

    public function faqSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => []
        ];
        
        for ($i=1; $i<=3; $i++) {
            $q = trim($data["q$i"] ?? '');
            $a = trim($data["a$i"] ?? '');
            if (!empty($q) && !empty($a)) {
                $schema['mainEntity'][] = [
                    '@type' => 'Question',
                    'name' => $q,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $a
                    ]
                ];
            }
        }
        
        if (empty($schema['mainEntity'])) return "<div style='color:red;'>At least one Question/Answer pair is required.</div>";
        return $this->formatJsonLd($schema);
    }

    public function howtoSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'HowTo',
            'name' => trim($data['name'] ?? ''),
            'description' => trim($data['desc'] ?? ''),
            'step' => []
        ];
        
        $time = trim($data['time'] ?? '');
        if (!empty($time)) $schema['totalTime'] = $time;
        
        for ($i=1; $i<=3; $i++) {
            $step = trim($data["step$i"] ?? '');
            if (!empty($step)) {
                $schema['step'][] = [
                    '@type' => 'HowToStep',
                    'text' => $step
                ];
            }
        }
        
        return $this->formatJsonLd($schema);
    }

    public function articleSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => trim($data['headline'] ?? ''),
            'author' => [
                '@type' => 'Person',
                'name' => trim($data['author'] ?? '')
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => trim($data['publisher'] ?? ''),
                'logo' => ['@type' => 'ImageObject', 'url' => '']
            ],
            'datePublished' => trim($data['date'] ?? '')
        ];
        
        $img = trim($data['image'] ?? '');
        if (!empty($img)) $schema['image'] = [$img];
        
        return $this->formatJsonLd($schema);
    }

    public function productSchema($data) {
        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => trim($data['name'] ?? ''),
            'description' => trim($data['desc'] ?? ''),
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => strtoupper(trim($data['currency'] ?? 'USD')),
                'price' => trim($data['price'] ?? '0.00'),
                'availability' => 'https://schema.org/InStock'
            ]
        ];
        
        $brand = trim($data['brand'] ?? '');
        if (!empty($brand)) {
            $schema['brand'] = ['@type' => 'Brand', 'name' => $brand];
        }
        
        return $this->formatJsonLd($schema);
    }

    public function recipeSchema($data) {
        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => 'Recipe',
            'name' => trim($data['name'] ?? ''),
            'recipeIngredient' => array_filter(array_map('trim', explode("\n", $data['ingredients'] ?? '')))
        ];
        
        $author = trim($data['author'] ?? '');
        if (!empty($author)) $schema['author'] = ['@type' => 'Person', 'name' => $author];
        
        $time = trim($data['time'] ?? '');
        if (!empty($time)) $schema['prepTime'] = $time;
        
        $yield = trim($data['yield'] ?? '');
        if (!empty($yield)) $schema['recipeYield'] = $yield;
        
        return $this->formatJsonLd($schema);
    }

    public function jobSchema($data) {
        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => 'JobPosting',
            'title' => trim($data['title'] ?? ''),
            'employmentType' => $data['type'] ?? 'FULL_TIME',
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name' => trim($data['company'] ?? '')
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => trim($data['location'] ?? '')
                ]
            ],
            'datePosted' => date('Y-m-d')
        ];
        
        $date = trim($data['date'] ?? '');
        if (!empty($date)) $schema['validThrough'] = $date;
        
        return $this->formatJsonLd($schema);
    }

    public function eventSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Event',
            'name' => trim($data['name'] ?? ''),
            'startDate' => trim($data['start'] ?? ''),
            'location' => [
                '@type' => 'Place',
                'name' => trim($data['location'] ?? ''),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => trim($data['address'] ?? '')
                ]
            ]
        ];
        return $this->formatJsonLd($schema);
    }

    public function videoSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'VideoObject',
            'name' => trim($data['name'] ?? ''),
            'description' => trim($data['desc'] ?? ''),
            'thumbnailUrl' => [trim($data['thumb'] ?? '')],
            'uploadDate' => trim($data['date'] ?? ''),
            'contentUrl' => trim($data['content'] ?? '')
        ];
        return $this->formatJsonLd($schema);
    }

    private function formatJsonLd($array) {
        $json = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $html = "<script type=\"application/ld+json\">\n$json\n</script>";
        return "
        <textarea class='form-control' rows='12' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars($html) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy JSON-LD Code</button>";
    }

    public function breadcrumbSchema($data) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];
        
        $pos = 1;
        for ($i=1; $i<=3; $i++) {
            $name = trim($data["n$i"] ?? '');
            $url = trim($data["u$i"] ?? '');
            if (!empty($name) && !empty($url)) {
                $schema['itemListElement'][] = [
                    '@type' => 'ListItem',
                    'position' => $pos++,
                    'name' => $name,
                    'item' => $url
                ];
            }
        }
        
        if (empty($schema['itemListElement'])) return "<div style='color:red;'>At least one Breadcrumb level is required.</div>";
        return $this->formatJsonLd($schema);
    }

    public function hreflangGen($data) {
        $def = trim($data['default'] ?? '');
        $l1 = trim($data['lang1'] ?? '');
        $u1 = trim($data['url1'] ?? '');
        $l2 = trim($data['lang2'] ?? '');
        $u2 = trim($data['url2'] ?? '');
        
        $html = "<!-- Add these to the <head> of your pages -->\n";
        if (!empty($def)) $html .= "<link rel=\"alternate\" hreflang=\"x-default\" href=\"$def\" />\n";
        if (!empty($l1) && !empty($u1)) $html .= "<link rel=\"alternate\" hreflang=\"$l1\" href=\"$u1\" />\n";
        if (!empty($l2) && !empty($u2)) $html .= "<link rel=\"alternate\" hreflang=\"$l2\" href=\"$u2\" />";
        
        return "
        <textarea class='form-control' rows='5' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars(trim($html)) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Hreflang Tags</button>";
    }

    public function canonicalGen($data) {
        $url = trim($data['url'] ?? '');
        if (empty($url)) return "<div style='color:red;'>URL required.</div>";
        $html = "<link rel=\"canonical\" href=\"$url\" />";
        return "
        <input type='text' class='form-control' readonly value='" . htmlspecialchars($html) . "' style='background:#f8fafc; font-family:monospace;' />
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Tag</button>";
    }

    public function disavowGen($data) {
        $text = trim($data['text'] ?? '');
        $lines = explode("\n", $text);
        
        $out = "# Google Disavow File\n# Generated automatically\n\n";
        foreach ($lines as $line) {
            $domain = trim($line);
            if (!empty($domain)) {
                $domain = preg_replace('#^https?://#', '', $domain);
                $domain = preg_replace('#^www\.#', '', $domain);
                $domain = rtrim($domain, '/');
                $out .= "domain:$domain\n";
            }
        }
        
        return "
        <textarea class='form-control' rows='10' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars(trim($out)) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Disavow Rules</button>";
    }

    public function sitemapValidator($data) {
        $xml = trim($data['text'] ?? '');
        if (empty($xml)) return "<div style='color:red;'>XML required.</div>";
        
        libxml_use_internal_errors(true);
        $doc = simplexml_load_string($xml);
        $errors = libxml_get_errors();
        libxml_clear_errors();
        
        if (empty($errors)) {
            return "
            <div style='background:#dcfce7; color:#166534; padding:1.5rem; border-radius:8px; border:1px solid #bbf7d0;'>
                <div style='font-weight:bold; font-size:1.25rem; margin-bottom:0.5rem;'>✅ Valid XML Sitemap</div>
                <div>Your XML structure is perfectly formed. Ensure you submit it via Google Search Console.</div>
            </div>";
        } else {
            $errHtml = "<ul style='margin-top:1rem; padding-left:1.5rem;'>";
            foreach ($errors as $error) {
                $errHtml .= "<li>Line {$error->line}: {$error->message}</li>";
            }
            $errHtml .= "</ul>";
            return "
            <div style='background:#fee2e2; color:#991b1b; padding:1.5rem; border-radius:8px; border:1px solid #fecaca;'>
                <div style='font-weight:bold; font-size:1.25rem;'>❌ Invalid XML Syntax</div>
                $errHtml
            </div>";
        }
    }

    public function keywordMerger($data) {
        $l1 = array_filter(array_map('trim', explode("\n", $data['list1'] ?? '')));
        $l2 = array_filter(array_map('trim', explode("\n", $data['list2'] ?? '')));
        $l3 = array_filter(array_map('trim', explode("\n", $data['list3'] ?? '')));
        
        if (empty($l1) || empty($l2)) return "<div style='color:red;'>Lists 1 and 2 are required.</div>";
        if (empty($l3)) $l3 = ['']; // Dummy empty array to simplify loops
        
        $results = [];
        foreach ($l1 as $w1) {
            foreach ($l2 as $w2) {
                foreach ($l3 as $w3) {
                    $combo = trim("$w1 $w2 $w3");
                    if (!empty($combo)) $results[] = $combo;
                }
            }
        }
        
        return "
        <div style='margin-bottom:1rem; font-weight:bold;'>" . count($results) . " Combinations Generated</div>
        <textarea class='form-control' rows='10' readonly style='background:#f8fafc;'>" . htmlspecialchars(implode("\n", $results)) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy List</button>";
    }

    public function longTailHelper($data) {
        $seeds = array_filter(array_map('trim', explode("\n", $data['text'] ?? '')));
        $strat = $data['strategy'] ?? 'buyer';
        
        $modifiers = [];
        if ($strat === 'buyer') $modifiers = ['buy', 'cheap', 'best', 'review', 'discount', 'for sale'];
        if ($strat === 'local') $modifiers = ['near me', 'in my area', 'local', 'company', 'agency'];
        if ($strat === 'question') $modifiers = ['how to', 'what is', 'where to find', 'why is'];
        
        $results = [];
        foreach ($seeds as $seed) {
            foreach ($modifiers as $mod) {
                if ($strat === 'question') $results[] = "$mod $seed";
                else $results[] = "$seed $mod";
            }
        }
        
        return "
        <div style='margin-bottom:1rem; font-weight:bold;'>" . count($results) . " Long Tail Keywords Generated</div>
        <textarea class='form-control' rows='10' readonly style='background:#f8fafc;'>" . htmlspecialchars(implode("\n", $results)) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy List</button>";
    }

    public function urlChecker($data) {
        $url = trim($data['url'] ?? '');
        if (empty($url)) return "<div style='color:red;'>URL required.</div>";
        
        $errors = [];
        $warnings = [];
        $success = [];
        
        // Protocol
        if (!preg_match('#^https://#i', $url)) {
            if (preg_match('#^http://#i', $url)) $errors[] = "Not secure. Missing HTTPS protocol.";
            else $errors[] = "Invalid protocol. URL must start with https://";
        } else {
            $success[] = "Uses secure HTTPS protocol.";
        }
        
        // Length
        $len = strlen($url);
        if ($len > 115) $errors[] = "URL is too long ($len characters). Under 100 characters is ideal for SEO.";
        elseif ($len > 75) $warnings[] = "URL is getting long ($len characters). Try keeping it concise.";
        else $success[] = "URL length is optimal ($len characters).";
        
        // Characters
        if (preg_match('/[A-Z]/', $url)) $warnings[] = "Contains uppercase letters. URLs should ideally be lowercase.";
        if (strpos($url, '_') !== false) $errors[] = "Contains underscores (_). Use hyphens (-) to separate words.";
        else $success[] = "Uses hyphens for word separation (or no separation needed).";
        
        if (strpos($url, '?') !== false || strpos($url, '&') !== false) {
            $warnings[] = "Contains dynamic parameters (?, &). Static, descriptive URLs rank better.";
        }
        
        $html = "<div style='display:grid; gap:1rem;'>";
        if (!empty($errors)) {
            $html .= "<div style='background:#fee2e2; color:#991b1b; padding:1rem; border-radius:8px;'>
                <ul style='margin:0; padding-left:1.5rem;'>" . implode('', array_map(function($e){return "<li>$e</li>";}, $errors)) . "</ul>
            </div>";
        }
        if (!empty($warnings)) {
            $html .= "<div style='background:#fef3c7; color:#92400e; padding:1rem; border-radius:8px;'>
                <ul style='margin:0; padding-left:1.5rem;'>" . implode('', array_map(function($w){return "<li>$w</li>";}, $warnings)) . "</ul>
            </div>";
        }
        if (!empty($success)) {
            $html .= "<div style='background:#dcfce7; color:#166534; padding:1rem; border-radius:8px;'>
                <ul style='margin:0; padding-left:1.5rem;'>" . implode('', array_map(function($s){return "<li>$s</li>";}, $success)) . "</ul>
            </div>";
        }
        $html .= "</div>";
        
        return $html;
    }

    public function metaRefresh($data) {
        $url = trim($data['url'] ?? '');
        $time = intval($data['time'] ?? 0);
        if (empty($url)) return "<div style='color:red;'>URL required.</div>";
        
        $html = "<meta http-equiv=\"refresh\" content=\"$time; url=$url\">";
        return "
        <input type='text' class='form-control' readonly value='" . htmlspecialchars($html) . "' style='background:#f8fafc; font-family:monospace;' />
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy Tag</button>";
    }

    public function indexingApi($data) {
        $url = trim($data['url'] ?? '');
        $type = $data['type'] ?? 'URL_UPDATED';
        if (empty($url)) return "<div style='color:red;'>URL required.</div>";
        
        $json = json_encode([
            'url' => $url,
            'type' => $type
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        return "
        <div style='margin-bottom:1rem; color:var(--text-muted); font-size:0.875rem;'>Use this JSON body to POST to: <code>https://indexing.googleapis.com/v3/urlNotifications:publish</code></div>
        <textarea class='form-control' rows='5' readonly style='background:#f8fafc; font-family:monospace;'>" . htmlspecialchars($json) . "</textarea>
        <button onclick='this.previousElementSibling.select(); document.execCommand(\"copy\");' class='btn-outline' style='margin-top:1rem;'>Copy JSON Payload</button>";
    }

}
