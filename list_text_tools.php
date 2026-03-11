<?php
$registry = include 'd:\Xamp\htdocs\Tools New\config\tools_registry.php';
$textTools = [];
foreach ($registry as $key => $tool) {
    if (isset($tool['category']) && $tool['category'] === 'text-tools') {
        $textTools[] = $key;
    }
}
echo implode("\n", $textTools);
