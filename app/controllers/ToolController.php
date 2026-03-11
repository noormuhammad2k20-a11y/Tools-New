<?php
class ToolController extends Controller {
    
    public function handle() {
        $slug = $_GET['tool_slug'] ?? null;
        if (!$slug) {
            $this->notFound();
            return;
        }

        $registry = require CONFIG . DS . 'tools_registry.php';
        if (!isset($registry[$slug])) {
            $this->notFound();
            return;
        }

        $tool = $registry[$slug];
        $tool['slug'] = $slug;

        // If AJAX POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If the tool is frontend-only, we skip backend logic
            if (isset($tool['is_frontend_only']) && $tool['is_frontend_only']) {
                echo "<div style='color:var(--primary); font-weight:bold;'>Frontend tool - No server-side processing required.</div>";
                exit;
            }

            ob_start();
            try {
                $handlerClass = $tool['handler'];
                $action = $tool['action'];
                
                $handlerPath = APP . DS . 'models' . DS . $handlerClass . '.php';
                if (file_exists($handlerPath)) {
                    require_once $handlerPath;
                    $handler = new $handlerClass();
                    
                    if (method_exists($handler, $action)) {
                        $result = $handler->$action($_POST, $_FILES);
                        ob_end_clean(); // Discard any accidental output
                        
                        if (is_array($result)) {
                            $this->jsonResponse($result);
                        } else {
                            echo $result;
                        }
                    } else {
                        throw new Exception("Handler action not found: $action");
                    }
                } else {
                    throw new Exception("Handler file not found: $handlerClass");
                }
            } catch (Throwable $e) {
                ob_end_clean();
                $this->jsonResponse([
                    'status' => 'error',
                    'message' => 'Server Error: ' . $e->getMessage()
                ]);
            }
            exit;
        }

        // Render Page
        $meta_title = $tool['title'] . ' - Free Online Tool';
        $meta_description = !empty($tool['desc']) ? $tool['desc'] : "Use our free online {$tool['title']} tool.";
        
        $data = [
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'canonical_url' => URL_ROOT . '/' . $slug,
            'tool' => $tool
        ];

        // Specific view check or dynamic fallback
        if (file_exists(APP . DS . 'views' . DS . 'tools' . DS . $slug . '.php')) {
            $this->view('tools/' . $slug, $data);
        } else {
            $this->view('tools/dynamic-tool', $data);
        }
    }

    public function notFound() {
        http_response_code(404);
        echo "404 - Tool Not Found";
        exit;
    }
}
