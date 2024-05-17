<?php
// controllers/LoginController.php

require_once 'core/Controller.php';

class LoginController extends Controller {
    private $users = [
        'usuario1' => 'contraseña1',
        'usuario2' => 'contraseña2',
        'usuario3' => 'contraseña3',
        'usuario4' => 'contraseña4',
    ];

    public function index() {
        if (!empty($_COOKIE['logged_in'])) {
            exit;
        }
        
        $this->view('login', ['error_message' => '']);
    }

    // Acción de inicio de sesión
    public function login() {
        $username = $_POST['nombre'] ?? '';
        $password = $_POST['contraseña'] ?? '';

        if (isset($this->users[$username]) && $this->users[$username] === $password) {
            setcookie('logged_in', '1', time() + 600);
            header('Location: perfil');
        } else {
            $currentUrlWithoutParams = strtok($_SERVER["REQUEST_URI"], '?');
            header("Location: " . $currentUrlWithoutParams . "?error=invalid_credentials");
            exit;
        }
    }
}

?>