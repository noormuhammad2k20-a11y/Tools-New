<?php
$routes = [
    'home' => ['controller' => 'HomeController', 'method' => 'index'],
    'categories' => ['controller' => 'HomeController', 'method' => 'categories'],
    
    // Legacy hardcoded routes are still valid for backward compatibility if needed, 
    // but the dynamic engine will overtake most of them.
];
