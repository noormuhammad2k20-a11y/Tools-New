<?php
class Router {
    protected $routes = [];

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function route() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);

        $firstSegment = isset($urlParts[0]) && $urlParts[0] !== '' ? $urlParts[0] : '';
        $secondSegment = isset($urlParts[1]) ? $urlParts[1] : null;

        // Route: /tool/{slug} — Tool page
        if ($firstSegment === 'tool' && $secondSegment) {
            require_once APP . DS . 'controllers' . DS . 'ToolController.php';
            $controller = new ToolController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->process($secondSegment);
            } else {
                $controller->show($secondSegment);
            }
            return;
        }

        // Route: /category/{catId} — Home with category filter
        if ($firstSegment === 'category' && $secondSegment) {
            $controller = new HomeController();
            $controller->index($secondSegment);
            return;
        }

        // Route: / or /home — Homepage
        if ($firstSegment === '' || $firstSegment === 'home') {
            $controller = new HomeController();
            $controller->index();
            return;
        }

        // API routes handled by existing logic
        if ($firstSegment === 'api') {
            return; // Let PHP serve API directly (handled before this)
        }

        // Check tools registry for legacy direct-slug URLs (e.g., /word-counter)
        $registryPath = CONFIG . DS . 'tools_registry.php';
        if (file_exists($registryPath)) {
            $toolsRegistry = require $registryPath;
            
            // Check if first segment OR second segment is a tool slug
            $toolSlug = null;
            if ($secondSegment && isset($toolsRegistry[$secondSegment])) {
                $toolSlug = $secondSegment;
            } elseif (isset($toolsRegistry[$firstSegment])) {
                $toolSlug = $firstSegment;
            }

            if ($toolSlug) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $tool = $toolsRegistry[$toolSlug];
                    $controllerName = $tool['controller'] ?? 'DynamicToolController';
                    $_GET['tool_slug'] = $toolSlug;
                    if (file_exists(APP . DS . 'controllers' . DS . $controllerName . '.php')) {
                        require_once APP . DS . 'controllers' . DS . $controllerName . '.php';
                        $c = new $controllerName();
                        $c->handle();
                    }
                } else {
                    // Redirect to new URL format
                    header('Location: ' . url('tool/' . $toolSlug), true, 301);
                    exit;
                }
                return;
            }
        }

        // Check static routes
        if (array_key_exists($firstSegment, $this->routes)) {
            $controllerName = $this->routes[$firstSegment]['controller'];
            $methodName = $this->routes[$firstSegment]['method'];
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $methodName)) {
                    unset($urlParts[0]);
                    call_user_func_array([$controller, $methodName], array_values($urlParts));
                    return;
                }
            }
        }

        // 404 fallback
        $controller = new HomeController();
        $controller->notFound();
    }
}