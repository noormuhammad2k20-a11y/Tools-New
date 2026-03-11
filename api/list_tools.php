<?php
// api/tools.php - Serve tool registry for React frontend

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Define primary directory separators and roots
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('CONFIG', ROOT . DS . 'config');

$registry_path = CONFIG . DS . 'tools_registry.php';

if (!file_exists($registry_path)) {
    echo json_encode(['status' => 'error', 'message' => 'Registry not found']);
    exit;
}

$registry = require $registry_path;

// For the frontend, we might want to simplify the names or filter sensitive info
// But for now, returning the full registry is efficient for 600 tools (small JSON size)
echo json_encode([
    'status' => 'success',
    'tools' => $registry
]);
