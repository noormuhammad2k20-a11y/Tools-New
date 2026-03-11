<?php
// app/controllers/ToolController.php
class ToolController extends Controller {
    public function show($slug) {
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $allTools = file_exists($registryPath) ? require $registryPath : [];

        if (!isset($allTools[$slug])) {
            http_response_code(404);
            echo "Tool not found: " . htmlspecialchars($slug);
            return;
        }

        $tool = $allTools[$slug];
        $tool['slug'] = $slug;

        // Get related tools (same category, excluding current)
        $relatedTools = [];
        $count = 0;
        foreach ($allTools as $rSlug => $rTool) {
            if ($rSlug !== $slug && ($rTool['category'] ?? '') === ($tool['category'] ?? '') && $count < 4) {
                $relatedTools[$rSlug] = $rTool;
                $count++;
            }
        }

        $pageTitle = $tool['title'];
        $pageDesc  = $tool['desc'] ?? '';

        $data = [
            'pageTitle'    => $pageTitle,
            'pageDesc'     => $pageDesc,
            'tool'         => $tool,
            'relatedTools' => $relatedTools,
        ];
        $this->view('tool', $data);
    }

    public function process($slug) {
        // POST processing - delegate to the existing DynamicToolController or handle inline
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $allTools = file_exists($registryPath) ? require $registryPath : [];

        if (!isset($allTools[$slug])) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Tool not found'], 404);
            return;
        }

        $tool = $allTools[$slug];
        $controllerName = $tool['controller'] ?? 'DynamicToolController';
        
        if (file_exists(APP . DS . 'controllers' . DS . $controllerName . '.php')) {
            require_once APP . DS . 'controllers' . DS . $controllerName . '.php';
            $_GET['tool_slug'] = $slug;
            $controller = new $controllerName();
            $controller->handle();
        } else {
            $this->jsonResponse(['status' => 'error', 'message' => 'Handler not found'], 500);
        }
    }

    /**
     * The core handler that connects the registry to the models
     */
    public function handle() {
        $slug = $_GET['tool_slug'] ?? '';
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $allTools = file_exists($registryPath) ? require $registryPath : [];

        if (!isset($allTools[$slug])) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Tool configuration missing'], 404);
        }

        $tool = $allTools[$slug];
        $handlerName = $tool['handler'] ?? '';
        $actionName = $tool['action'] ?? '';

        if (!$handlerName || !$actionName) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Tool logic not defined or missing action'], 500);
        }

        $handlerPath = APP . DS . 'models' . DS . $handlerName . '.php';
        if (!file_exists($handlerPath)) {
            $this->jsonResponse(['status' => 'error', 'message' => "Handler $handlerName not found"], 500);
        }

        require_once APP . DS . 'models' . DS . 'AiHandler.php'; // Some tools might need these
        require_once $handlerPath;
        
        if (!class_exists($handlerName)) {
            $this->jsonResponse(['status' => 'error', 'message' => "Class $handlerName not found"], 500);
        }

        $handler = new $handlerName();
        
        if ($actionName === 'noop' || !method_exists($handler, $actionName)) {
            $this->jsonResponse(['status' => 'error', 'message' => "Development in progress: Action '$actionName' is currently being implemented for $handlerName."], 200);
        }

        // Combine POST and FILES for the handler
        $data = array_merge($_POST, $_FILES);
        
        try {
            $result = $handler->$actionName($data);
            $this->jsonResponse([
                'status' => 'success',
                'result' => $result
            ]);
        } catch (Throwable $e) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Execution error: ' . $e->getMessage()], 500);
        }
    }
}
