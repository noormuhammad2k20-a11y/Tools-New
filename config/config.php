<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'multitools');

// Assuming XAMPP root running on localhost:
// Dynamically determine the URL_ROOT to handle spaces and environment variations
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
// Ensure we handle cases where scriptName is / or empty
$baseUrl = rtrim($scriptName, '/');
$urlRoot = $protocol . "://" . $host . $baseUrl;

define('URL_ROOT', $urlRoot); 
define('SITE_TITLE', 'Professional Multi-Tools - 1000+ Free Online Tools');

/**
 * URL Helper Function
 * Generates absolute URLs for the application
 */
function url($path = '') {
    $path = ltrim($path, '/');
    return URL_ROOT . ($path ? '/' . $path : '');
}

