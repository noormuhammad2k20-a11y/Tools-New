<?php
/**
 * Migration script PASS 2
 */

$dir = __DIR__ . '/app/views/tools';
$files = scandir($dir);

$successCount = 0;
$failCount = 0;

foreach ($files as $file) {
    if ($file === '.' || $file === '..' || is_dir("$dir/$file") || $file === 'dynamic-tool.php') continue;
    
    $content = file_get_contents("$dir/$file");
    
    // Skip if already migrated
    if (strpos($content, 'id="tool-interface"') !== false) {
        continue;
    }
    
    preg_match_all('/<script.*?>.*?<\/script>/is', $content, $scripts);
    $customScripts = '';
    $jsonLd = '';
    foreach ($scripts[0] as $script) {
        if (strpos($script, 'application/ld+json') !== false) {
            $jsonLd = $script;
        } else {
            $customScripts .= $script . "\n";
        }
    }
    
    $htmlContent = preg_replace('/<script.*?>.*?<\/script>/is', '', $content);
    
    preg_match_all('/<style>.*?<\/style>/is', $htmlContent, $styles);
    $customStyles = '';
    foreach ($styles[0] as $style) {
        $customStyles .= $style . "\n";
    }
    $htmlContent = preg_replace('/<style>.*?<\/style>/is', '', $htmlContent);
    
    // 1. Extract Main
    if (!preg_match('/<main[^>]*>(.*?)<\/main>/is', $htmlContent, $mainMatch)) {
        echo "[Skip] No <main> found in $file\n";
        $failCount++;
        continue;
    }
    
    $mainInner = $mainMatch[1];
    
    // 2. Remove the hero header. The hero header is the block that contains <h1>.
    // It's usually the first major block. Let's just strip out the first block containing <h1...</h1>
    // Actually, we can use regex to remove everything from the start of $mainInner until the end of the div that encapsulates the h1.
    // In ai-image.generator.php, the hero is `<div style="display: flex..."><div class="tool-icon-circle...">...</div><div><h1...>...</h1><p>...</p></div></div>`
    // Wait, since the structure varies, what if we just strip the `<h1...</h1>` and the `<p...` below it?
    // And strip the icon div? That's messy.
    
    // What if we just use DOMDocument on $mainInner?
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    // wrap with a temporary root node
    $safeHtml = preg_replace('/<\?php.*?\?>/s', '', $mainInner);
    $dom->loadHTML('<?xml encoding="UTF-8"><body>' . $safeHtml . '</body>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $xpath = new DOMXPath($dom);
    
    $h1s = $xpath->query('//h1');
    if ($h1s->length > 0) {
        $h1 = $h1s->item(0);
        // Find the container for the hero.
        // Usually, the container is the first direct child of <div class="pro-card"> or <main>
        // But let's just trace up to find the closest div that contains the h1 and its adjacent text, but NOT the form.
        // Wait, if it's `ai-image-generator.php`: `<div class="pro-card"><div style="flex..."><h1>...</h1></div> <div class="row">...</div></div>`
        // We want to delete `<div style="flex...">`.
        $parent = $h1->parentNode;
        while ($parent && $parent->nodeName !== 'body') {
            $class = $parent->getAttribute('class');
            // Check if this parent has siblings that contain the actual form
            $hasFormSibling = false;
            foreach ($parent->childNodes as $child) {
                 if (strpos($parent->ownerDocument->saveHTML($child), '<input') !== false ||
                     strpos($parent->ownerDocument->saveHTML($child), '<textarea') !== false ||
                     strpos($parent->ownerDocument->saveHTML($child), '<select') !== false ||
                     strpos($parent->ownerDocument->saveHTML($child), '<button') !== false) {
                     $hasFormSibling = true;
                     break;
                 }
            }
            if ($parent->parentNode && $parent->parentNode->nodeName !== 'body') {
                $siblingHasForm = false;
                foreach ($parent->parentNode->childNodes as $sibling) {
                    if ($sibling !== $parent && $sibling->nodeType === XML_ELEMENT_NODE) {
                        $sibHtml = $parent->ownerDocument->saveHTML($sibling);
                        if (strpos($sibHtml, '<input') !== false || strpos($sibHtml, '<textarea') !== false || strpos($sibHtml, '<button') !== false) {
                            $siblingHasForm = true; break;
                        }
                    }
                }
                if ($siblingHasForm) {
                    // This parent is the hero container! Delete it!
                    $parent->parentNode->removeChild($parent);
                    break;
                }
            }
            $parent = $parent->parentNode;
        }
    }
    
    // Extract the remaining body
    $body = $dom->getElementsByTagName('body')->item(0);
    $toolFormInner = '';
    foreach ($body->childNodes as $child) {
        $toolFormInner .= $dom->saveHTML($child);
    }
    
    // Fallback if empty
    if (trim($toolFormInner) === '') {
        $toolFormInner = $mainInner; 
    }
    
    // Remove the `<div class="pro-app-main-full...">` wrapper if it exists (we just want the inner tool)
    // Actually, keeping old wrappers is fine, but they might double-pad.
    
    // 3. Extract SEO Content
    $seoContent = '';
    $seoStart = strpos($content, '<section class="pro-seo-content');
    if ($seoStart !== false) {
        $depth = 0;
        $endPos = -1;
        for ($i = $seoStart; $i < strlen($content); $i++) {
            if (substr($content, $i, 8) === '<section') $depth++;
            elseif (substr($content, $i, 10) === '</section>') {
                $depth--;
                if ($depth === 0) {
                    $endPos = $i;
                    break;
                }
            }
        }
        if ($endPos !== -1) {
             $seoSectionOuter = substr($content, $seoStart, $endPos - $seoStart + 10);
             if (preg_match('/<div class="pro-card[^>]*style="background: white;">(.*?)<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<\/section>/is', $seoSectionOuter, $m)) {
                 $seoContent = trim($m[1]);
             } else if (preg_match('/<div class="pro-card[^>]*>(.*?)<\/div>\s*<\/div>\s*<\/div>\s*<\/div>\s*<\/section>/is', $seoSectionOuter, $m)) {
                 $seoContent = trim($m[1]);
             } else if (preg_match('/<div class="pro-card[^>]*>(.*?)<\/div>\s*<\/div>\s*<\/section>/is', $seoSectionOuter, $m)) {
                 $seoContent = trim($m[1]);
             } else {
                 $seoContent = preg_replace('/^.*?class="pro-card[^>]*>/s', '', $seoSectionOuter);
                 $seoContent = preg_replace('/<\/div>\s*<\/div>\s*<\/section>$/s', '', $seoContent);
                 $seoContent = preg_replace('/<\/div>\s*<\/div>\s*<\/div>\s*<\/section>$/s', '', $seoContent);
             }
        }
    }
    
    $featuresHtml = '
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>';

    $partsPos = strpos($seoContent, '</p>');
    if ($partsPos !== false) {
        $seoContent = substr($seoContent, 0, $partsPos + 4) . $featuresHtml . substr($seoContent, $partsPos + 4);
    } else {
        $seoContent = $featuresHtml . $seoContent;
    }
    
    $seoContent = str_replace('display-6 fw-bold mb-4 text-gradient-primary', 'text-2xl font-bold text-gray-900 mb-4 tracking-tight', $seoContent);
    $seoContent = str_replace('display-5 fw-bold mb-4 text-gradient-primary', 'text-2xl font-bold text-gray-900 mb-4 tracking-tight', $seoContent);
    $seoContent = str_replace('fw-bold h4', 'text-xl font-bold text-gray-900', $seoContent);
    $seoContent = str_replace('fw-bold h3', 'text-xl font-bold text-gray-900', $seoContent);
    $seoContent = preg_replace('/<div class="accordion-item[^>]*>/', '<div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">', $seoContent);
    $seoContent = preg_replace('/<h2 class="accordion-header"[^>]*>.*?<button class="accordion-button[^>]*>(.*?)<\/button>.*?<\/h2>/is', '<summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">$1<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>', $seoContent);
    $seoContent = preg_replace('/<div id="faq[^"]*" class="accordion-collapse[^>]*>.*?<div class="accordion-body[^>]*>(.*?)<\/div>.*?<\/div>/is', '<div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">$1</div>', $seoContent);

    $templateHTML = <<<'HTML'
<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        {{TOOL_FORM}}
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            {{SEO_CONTENT}}
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

{{JSON_LD}}
{{CUSTOM_STYLES}}
{{CUSTOM_SCRIPTS}}

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
HTML;

    $newTemplate = str_replace(
        ['{{TOOL_FORM}}', '{{SEO_CONTENT}}', '{{JSON_LD}}', '{{CUSTOM_STYLES}}', '{{CUSTOM_SCRIPTS}}'],
        [$toolFormInner, $seoContent, $jsonLd, $customStyles, $customScripts],
        $templateHTML
    );

    file_put_contents("$dir/$file", $newTemplate);
    $successCount++;
}

echo "Pass 2 Migration Complete. Success: $successCount, Fail: $failCount\n";
