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

// Initialize the Router and route the request
// No more React SPA serving — all routes are handled by PHP
$router = new Router($routes);
$router->route();
