<?php
$registry = include 'd:\Xamp\htdocs\Tools New\config\tools_registry.php';
$textTools = [];
foreach ($registry as $key => $tool) {
    if (isset($tool['category']) && $tool['category'] === 'text-tools') {
        $textTools[] = $key;
    }
}
file_put_contents('d:\Xamp\htdocs\Tools New\text_tools_list.json', json_encode($textTools));
echo "Total text tools: " . count($textTools) . "\n";
