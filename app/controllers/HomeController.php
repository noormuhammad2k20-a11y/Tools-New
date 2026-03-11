<?php
// app/controllers/HomeController.php
class HomeController extends Controller {
    public function index() {
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $tools = file_exists($registryPath) ? require $registryPath : [];
        
        $data = [
            'meta_title' => 'Home - Professional Multi-Tools',
            'tools' => $tools
        ];
        $this->view('home', $data);
    }

    public function categories() {
        $registryPath = CONFIG . DS . 'tools_registry.php';
        $tools = file_exists($registryPath) ? require $registryPath : [];
        
        // Group by category
        $categories = [];
        foreach ($tools as $slug => $tool) {
            $cat = $tool['category'];
            if (!isset($categories[$cat])) {
                $categories[$cat] = [];
            }
            $tool['slug'] = $slug;
            $categories[$cat][] = $tool;
        }

        $data = [
            'meta_title' => 'Categories - Multi-Tools',
            'categories' => $categories
        ];
        $this->view('categories', $data);
    }

    public function notFound() {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
