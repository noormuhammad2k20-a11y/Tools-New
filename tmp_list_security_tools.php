<?php
define('DS', DIRECTORY_SEPARATOR);
define('CONFIG', 'd:\Xamp\htdocs\Tools New\config');
$registry = require CONFIG . DS . 'tools_registry.php';
$securityTools = [];
foreach ($registry as $slug => $tool) {
    if ($tool['category'] === 'security-tools') {
        $securityTools[] = [
            'slug' => $slug,
            'title' => $tool['title'],
            'handler' => $tool['handler'],
            'action' => $tool['action']
        ];
    }
}
echo json_encode($securityTools, JSON_PRETTY_PRINT);
