<?php
$registry = include 'd:\Xamp\htdocs\Tools New\config\tools_registry.php';
$viewDir = 'd:\Xamp\htdocs\Tools New\app\views\tools\\';
$results = [];

foreach ($registry as $key => $tool) {
    if (isset($tool['category']) && $tool['category'] === 'text-tools') {
        $filePath = $viewDir . $key . ".php";
        $status = [
            'exists' => file_exists($filePath),
            'has_hero' => false,
            'has_content' => false,
            'is_modern' => false,
            'needs_upgrade' => true
        ];

        if ($status['exists']) {
            $content = file_get_contents($filePath);
            $status['has_hero'] = str_contains($content, 'tool-hero.php');
            $status['has_content'] = str_contains($content, 'tool-content.php');
            $status['is_modern'] = str_contains($content, 'max-w-4xl') && str_contains($content, 'rounded-2xl');
            
            if ($status['has_hero'] && $status['has_content'] && $status['is_modern']) {
                $status['needs_upgrade'] = false;
            }
        }
        $results[$key] = $status;
    }
}

ksort($results);
foreach ($results as $key => $s) {
    $indicator = $s['needs_upgrade'] ? " [!!] " : " [OK] ";
    echo "{$indicator} {$key}\n";
}
