<?php
class Controller {
    public function view($view, $data = []) {
        if (file_exists(APP . DS . 'views' . DS . $view . '.php')) {
            extract($data);
            // Capture view content into $content variable
            ob_start();
            require APP . DS . 'views' . DS . $view . '.php';
            $content = ob_get_clean();
            // Render inside layout
            require APP . DS . 'views' . DS . 'layout.php';
        } else {
            die("View does not exist: $view");
        }
    }

    public function model($model) {
        if (file_exists(APP . DS . 'models' . DS . $model . '.php')) {
            return new $model();
        }
        return false;
    }

    public function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
