<?php
// controllers/LoginController.php

require_once 'core/Controller.php';
require_once 'models/Usuario.php';

class LoginController extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            exit;
        }
        
        $this->view('login', ['error_message' => '']);
    }

    // Acción de inicio de sesión
    public function login() {
        $username = $_POST['nombre'] ?? '';
        $password = $_POST['contraseña'] ?? '';
        $rememberMe = isset($_POST['remember_me']);

        $usuario = $this->usuarioModel->obtenerPorNombre($username);

        if ($usuario && $usuario['Clave'] === $password) {
            // Inicia la sesión
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['IdUsuario'] = $usuario['IdUsuario'];

            if ($rememberMe) {
                // Establece cookies para recordar al usuario
                setcookie('username', $username, time() + (90 * 24 * 60 * 60));
                setcookie('password', $password, time() + (90 * 24 * 60 * 60));

                $currentDateTime = date('d/m/Y H:i:s');
                setcookie('last_visit', $currentDateTime, time() + (90 * 24 * 60 * 60));

                setcookie('style', $this->users[$username]['style'], time() + (90 * 24 * 60 * 60));
            }

            header('Location: perfil');
        } else {
            $currentUrlWithoutParams = strtok($_SERVER["REQUEST_URI"], '?');
            header("Location: " . $currentUrlWithoutParams . "?error=invalid_credentials");
            exit;
        }
    }

    // Método para verificar si las cookies son válidas
    public function checkRememberedLogin() {
        if (isset($_COOKIE['username'], $_COOKIE['password'])) {
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
        
            if (isset($this->users[$username]) && $this->users[$username]['password'] === $password) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
        
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                // Restaurar otros detalles de la sesión según sea necesario
            }
        }
    }
    
    public function logout() {
        // Asegúrate de iniciar la sesión si no ha sido iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Elimina todas las variables de sesión
        $_SESSION = array();
    
        // Elimina la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        // Destruye la sesión
        session_destroy();
    
        // Tiempo para eliminar las cookies, ajustado al tiempo de vida original (90 días)
        $cookieExpireTime = time() - (90 * 24 * 60 * 60);
    
        // Elimina las otras cookies
        setcookie('username', '', $cookieExpireTime, '/');
        setcookie('password', '', $cookieExpireTime, '/');
        setcookie('last_visit', '', $cookieExpireTime, '/');
        setcookie('style', '', $cookieExpireTime, '/');
    
        // Redirige al inicio
        header('Location: /DAW/home');
        exit;
    }
    
}

?>