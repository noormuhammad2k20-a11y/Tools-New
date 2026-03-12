<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS . '..');
define('APP', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('CONFIG', ROOT . DS . 'config');

require_once CONFIG . DS . 'config.php';
require_once CORE . DS . 'Router.php';

$_GET['url'] = 'image-tools/image-resizer-pro';
$url = $_GET['url'];
$urlParts = explode('/', $url);

$slug = isset($urlParts[0]) && $urlParts[0] !== '' ? $urlParts[0] : 'home';
$potentialToolSlug = isset($urlParts[1]) ? $urlParts[1] : null;

$registryPath = CONFIG . DS . 'tools_registry.php';
$toolsRegistry = require $registryPath;

echo "URL: $url\n";
echo "Parts: " . print_r($urlParts, true) . "\n";
echo "Initial Slug: $slug\n";
echo "Potential Slug: $potentialToolSlug\n";

if ($potentialToolSlug && isset($toolsRegistry[$potentialToolSlug])) {
    $slug = $potentialToolSlug;
    echo "Slug updated to potential: $slug\n";
}

echo "Final Slug: $slug\n";
echo "Exists in registry? " . (isset($toolsRegistry[$slug]) ? 'Yes' : 'No') . "\n";
