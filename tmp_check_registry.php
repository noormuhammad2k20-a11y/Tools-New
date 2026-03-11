<?php
$registry = require 'd:\Xamp\htdocs\Tools New\config\tools_registry.php';
$lines = file('d:\Xamp\htdocs\Tools New\config\tools_registry.php');
$startEndBlock = 4803; // Approximate line of beginning of Batch 6-9
// We need to find which tools in the LAST section are NOT in the FIRST section.
// Or more safely, which tools in the entire registry are defined multiple times.
$allSlugs = array_keys($registry);
// This only gives the final overrides.
// I'll parse the file manually to find ALL slug definitions.
$slugsFound = [];
foreach ($lines as $index => $line) {
    if (preg_match("/^\\s*'([a-zA-Z0-9-]+)'\\s*=>\\s*\\[/", $line, $matches)) {
        $slug = $matches[1];
        $slugsFound[$slug][] = $index + 1;
    }
}
$duplicates = array_filter($slugsFound, function($indices) {
    return count($indices) > 1;
});
foreach ($duplicates as $slug => $indices) {
    echo "$slug: " . implode(', ', $indices) . "\n";
}
echo "--- UNIQUE SLUGS IN END BLOCK (>= 4803) ---\n";
foreach ($slugsFound as $slug => $indices) {
    $inEnd = false;
    $inStart = false;
    foreach ($indices as $idx) {
        if ($idx >= 4803) $inEnd = true;
        else $inStart = true;
    }
    if ($inEnd && !$inStart) {
        echo "$slug (Line " . $indices[0] . ")\n";
    }
}
