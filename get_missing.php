<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', 'd:\\Xamp\\htdocs\\Tools New');
define('APP', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('CONFIG', ROOT . DS . 'config');
require_once CORE . DS . 'Model.php';
$registry = require CONFIG . DS . 'tools_registry.php';
$results = ['missing_actions' => []];
$loadedHandlers = [];
foreach ($registry as $slug => $tool) {
    $handlerName = $tool['handler'] ?? '';
    $actionName = $tool['action'] ?? '';
    if (!$handlerName || !$actionName) continue;
    $handlerPath = APP . DS . 'models' . DS . $handlerName . '.php';
    if (!file_exists($handlerPath)) continue;
    if (!isset($loadedHandlers[$handlerName])) {
        require_once $handlerPath;
        $loadedHandlers[$handlerName] = true;
    }
    if (!class_exists($handlerName)) continue;
    $handlerInstance = new $handlerName();
    if ($actionName === 'noop' || !method_exists($handlerInstance, $actionName)) {
        $results['missing_actions'][] = ['slug' => $slug, 'handler' => $handlerName, 'action' => $actionName, 'title' => $tool['title']];
    }
}
$output = "SLUG | HANDLER | ACTION | TITLE\n";
foreach ($results['missing_actions'] as $m) {
    $output .= "{$m['slug']} | {$m['handler']} | {$m['action']} | {$m['title']}\n";
}
file_put_contents(ROOT . DS . 'missing_logic.txt', $output);
echo count($results['missing_actions']) . " missing actions found.\n";
