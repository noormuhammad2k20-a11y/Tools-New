<?php
$lines = file('d:\Xamp\htdocs\Tools New\config\tools_registry.php');
$slugsFound = [];
foreach ($lines as $index => $line) {
    if (preg_match("/^\\s*'([a-zA-Z0-9-]+)'\\s*=>\\s*\\[/", $line, $matches)) {
        $slug = $matches[1];
        if ($slug === 'inputs') continue; // Skip inputs arrays
        $slugsFound[$slug][] = $index + 1;
    }
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
        echo $slug . "\n";
    }
}
