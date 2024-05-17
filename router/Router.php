<?php
// router/Router.php

class Router {
    public function route($url) {
        $url_segments = explode('/', $url);
        $controller_name = 'Home'; // Controlador por defecto
        $method_name = 'index'; // Método por defecto

        if (!empty($url_segments[0])) {
            $controller_name = ucfirst($url_segments[0]);
        }
        if (!empty($url_segments[1])) {
            $method_name = $url_segments[1];
        }

        $controller_file = 'controllers/' . $controller_name . 'Controller.php';

        if (file_exists($controller_file)) {
            require_once $controller_file;
            $controller_class = $controller_name . 'Controller';
            $controller = new $controller_class();

            if (method_exists($controller, $method_name)) {
                call_user_func_array([$controller, $method_name], []);
            } else {
                // Método no encontrado
                header('HTTP/1.0 404 Not Found');
                echo "404 Not Found: Method not found";
                exit;
            }
        } else {
            // Controlador no encontrado
            header('HTTP/1.0 404 Not Found');
            echo "404 Not Found: Controller not found";
            exit;
        }
    }
}

?>