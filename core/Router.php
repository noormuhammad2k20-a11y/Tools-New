<?php
class Router {
    protected $routes = [];

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function route() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);

        $slug = isset($urlParts[0]) && $urlParts[0] !== '' ? $urlParts[0] : 'home';
        // Handle URLs with categories like /image-tools/image-resizer-pro
        $potentialToolSlug = isset($urlParts[1]) ? $urlParts[1] : null;

        // Check dynamic tools registry first
        $registryPath = CONFIG . DS . 'tools_registry.php';
        if (file_exists($registryPath)) {
            $toolsRegistry = require $registryPath;
            
            // Prefer the 2nd part as the slug if it exists in the registry natively
            if ($potentialToolSlug && isset($toolsRegistry[$potentialToolSlug])) {
                $slug = $potentialToolSlug;
            }

            if (isset($toolsRegistry[$slug])) {
                $tool = $toolsRegistry[$slug];
                $controllerName = $tool['controller'] ?? 'DynamicToolController';
                $methodName = 'handle';
                $_GET['tool_slug'] = $slug; // Pass slug to controller
                
                if (file_exists(APP . DS . 'controllers' . DS . $controllerName . '.php')) {
                    require_once APP . DS . 'controllers' . DS . $controllerName . '.php';
                    $controller = new $controllerName();
                } else {
                    require_once APP . DS . 'controllers' . DS . 'DynamicToolController.php';
                    $controller = new DynamicToolController();
                }
                $controller->$methodName();
                return;
            }
        }

        if (array_key_exists($slug, $this->routes)) {
            $controllerName = $this->routes[$slug]['controller'];
            $methodName = $this->routes[$slug]['method'];
        } else {
            $controllerName = 'HomeController';
            $methodName = 'notFound';
        }

        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                unset($urlParts[0]);
                call_user_func_array([$controller, $methodName], array_values($urlParts));
            } else {
                echo "Method $methodName not found in $controllerName";
            }
        } else {
            echo "Controller $controllerName not found";
        }
    }
}   