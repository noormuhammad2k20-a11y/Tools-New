<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'multitools');

// Assuming XAMPP root running on localhost:
// If "Tools New" is a subfolder:
define('URL_ROOT', 'http://localhost/Tools%20New'); 
define('SITE_TITLE', 'Professional Multi-Tools - 1000+ Free Online Tools');

/**
 * URL Helper Function
 * Generates absolute URLs for the application
 */
function url($path = '') {
    $path = ltrim($path, '/');
    return URL_ROOT . ($path ? '/' . $path : '');
}

