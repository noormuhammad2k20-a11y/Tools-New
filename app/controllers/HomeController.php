<?php
// app/controllers/HomeController.php
class HomeController extends Controller {
    public function index($categoryId = null) {
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $allTools = file_exists($registryPath) ? require $registryPath : [];
        
        $activeCategory = $categoryId ?: 'all';
        
        // Filter by category if specified
        $tools = $allTools;
        if ($activeCategory !== 'all') {
            $tools = array_filter($allTools, function($tool) use ($activeCategory) {
                return ($tool['category'] ?? '') === $activeCategory;
            });
        }

        $pageTitle = $activeCategory !== 'all' 
            ? ucwords(str_replace('-', ' ', $activeCategory)) . ' Tools'
            : 'Professional Web Tools';
        $pageDesc = 'Professional digital utilities for software engineers and creators.';
        
        $data = [
            'pageTitle' => $pageTitle,
            'pageDesc'  => $pageDesc,
            'tools'     => $tools,
            'activeCategory' => $activeCategory,
        ];
        $this->view('home', $data);
    }

    public function notFound() {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
