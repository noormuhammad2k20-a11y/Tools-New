<?php

$dir = __DIR__ . '/app/views/tools';
$files = ['url-encoder.php', 'word-counter.php', 'ai-image-generator.php'];

foreach ($files as $file) {
    if (!file_exists("$dir/$file")) continue;
    $content = file_get_contents("$dir/$file");
    
    // We want to extract:
    // 1. The main tool interface (Everything between the hero div and the SEO section).
    // Specifically, look for the second <div class="pro-card shadow-lg border-0 rounded-4 p-4"> 
    // OR just use regex to find the content between the Hero and the SEO/Footer.
    
    // Let's try splitting by sections.
    // The Hero section usually starts with `<div class="pro-card shadow-lg border-0 rounded-4 p-4 mb-4">`
    // The Tool section usually starts with `<div class="pro-card shadow-lg border-0 rounded-4 p-4">` (Notice no mb-4)
    // The SEO section usually starts with `<section class="pro-seo-content py-5 bg-light">` or `<section class="pro-seo-content">`
    
    // Approach: Regex magic
    $toolHtml = '';
    
    // 1. Extract Scripts and Styles
    preg_match_all('/<script.*?>.*?<\/script>/is', $content, $scripts);
    preg_match_all('/<style>.*?<\/style>/is', $content, $styles);
    
    // We only want scripts that are NOT JSON-LD (skip application/ld+json)
    $cleanScripts = [];
    foreach ($scripts[0] as $script) {
        if (strpos($script, 'application/ld+json') === false) {
            $cleanScripts[] = $script;
        }
    }
    
    // 2. Extract Tool Interface
    // Let's try to match from the tool container to the SEO section
    // Most tools have `<main class="container py-5">` <div class="pro-app-main-full ...">... hero ...</div> ... tool ...</div> </div> 
    
    // A simpler way: we want to keep everything inside `<main...>` EXCEPT the hero section.
    preg_match('/<main[^>]*>(.*?)<\/main>/is', $content, $mainMatch);
    if (!empty($mainMatch[1])) {
        $mainContent = $mainMatch[1];
        // Remove the hero section
        // Hero section is a div with class containing mb-4, usually right at the top
        $mainContent = preg_replace('/<div class="pro-card[^"]*mb-4[^"]*">.*?<\/div>\s*<!-- Tool Interface -->/is', '', $mainContent);
        // Also just try simple regex for the hero div
        $mainContent = preg_replace('/<div class="pro-card[^"]*mb-4[^"]*">.*?(?:<\/div>\s*<\/div>|<\/div>\s*<div class="pro-card|<div class="pro-card shadow-lg border-0 rounded-4 p-4">)/is', '<div class="pro-card shadow-lg border-0 rounded-4 p-4">', $mainContent, 1);
        
        // Let's be safer.
        // We know the tool form is usually the second pro-card, or we can just extract:
        // Everything from `<div class="pro-card shadow-lg border-0 rounded-4 p-4">` (without mb-4) up to the end of <main>
        preg_match('/<div class="pro-card shadow-lg border-0 rounded-4 p-4">(.*)/is', $mainMatch[1], $toolMatch);
        if (!empty($toolMatch[0])) {
            // we have from the tool card to the end of main.
            // But we might capture the closing tags of <main>.
            // Let's just grab the tool card. Since it's HTML, regex matching balanced tags is hard in PHP.
        }
    }
    
    // Better Approach: DOM Document
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    // Wrap in a root tag to make it valid XML/HTML
    $safeContent = preg_replace('/<\?php.*?\?>/s', '', $content);
    $dom->loadHTML('<?xml encoding="UTF-8">' . $safeContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);
    
    // Find all pro-cards
    $cards = $xpath->query('//div[contains(@class, "pro-card")]');
    $toolInterface = '';
    
    foreach ($cards as $card) {
        $class = $card->getAttribute('class');
        // The hero has mb-4, the main tool interface does not usually (or is the second one)
        if (strpos($class, 'mb-4') === false) {
            // This is likely the tool interface!
            // Wait, SEO section might also have pro-card.
            // But SEO section is usually inside <section class="pro-seo-content...">
            $parent = $card->parentNode;
            $inMain = false;
            while ($parent) {
                if ($parent->nodeName === 'main') { $inMain = true; break; }
                if ($parent->nodeName === 'section') break;
                $parent = $parent->parentNode;
            }
            if ($inMain) {
                $toolInterface = $dom->saveHTML($card);
                break; // Got the main tool interface
            }
        }
    }
    
    echo "=== $file ===\n";
    echo "Tool Interface length: " . strlen($toolInterface) . "\n";
    echo "Scripts: " . count($cleanScripts) . "\n";
    echo "Styles: " . count($styles[0]) . "\n\n";
}
