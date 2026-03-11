<?php
session_start();

// Define primary directory separators and roots
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('APP', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('CONFIG', ROOT . DS . 'config');
define('ASSETS', ROOT . DS . 'assets');
define('VENDOR', ROOT . DS . 'vendor');
define('HELPERS', ROOT . DS . 'helpers');
define('PUBLIC_ROOT', ROOT . DS . 'public');

// Load configurations
require_once CONFIG . DS . 'config.php';
require_once CONFIG . DS . 'routes.php';

// Load vendor autoloader
if (file_exists(VENDOR . DS . 'autoload.php')) {
    require_once VENDOR . DS . 'autoload.php';
}

// Autoload core and app classes
spl_autoload_register(function($className){
    if(file_exists(CORE . DS . $className . '.php')){
        require_once CORE . DS . $className . '.php';
    } else if(file_exists(APP . DS . 'controllers' . DS . $className . '.php')){
        require_once APP . DS . 'controllers' . DS . $className . '.php';
    } else if(file_exists(APP . DS . 'models' . DS . $className . '.php')){
        require_once APP . DS . 'models' . DS . $className . '.php';
    }
});

// Load helpers
require_once HELPERS . DS . 'tool_helper.php';

// Initialize the Router
$router = new Router($routes);

// Serve React Frontend by default for UI routes
// This allows the React app to handle the UI while keeping the PHP backend accessible for processing
$request_uri = $_SERVER['REQUEST_URI'];
$is_api = (strpos($request_uri, '/api/') !== false);
$is_post = ($_SERVER['REQUEST_METHOD'] === 'POST');

// If it's a GET request and not an API call, serve the React app
if (!$is_api && !$is_post) {
    $react_index = ROOT . DS . 'index.html';
    if (file_exists($react_index)) {
        require_once $react_index;
        exit;
    }
}

// Fallback to PHP routing for API calls, POST processing, or if React app isn't built
$router->route();
