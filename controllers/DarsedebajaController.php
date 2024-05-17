<?php
// controllers/DarsedebajaController.php

require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Usuario.php';
require_once 'controllers/LoginController.php'; // Asegúrate de que Album es un modelo existente

class DarsedebajaController extends Controller {
    private $albumModel;
    private $usuarioModel;

    public function __construct() {
        $this->albumModel = new Album();
        $this->usuarioModel = new Usuario(); // Instancia el modelo Album
    }

    public function index() {
        $usuarioId = $_SESSION['IdUsuario']; // Asegúrate de que el ID del usuario está en la sesión
        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($usuarioId);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmarbaja'])) {
            $contrasena = $_POST['contrasena'] ?? '';
            $usuarioId = $_SESSION['IdUsuario'];
            $errores[];

            // Verificar la contraseña
            $usuario = $this->usuarioModel->obtenerPorId($usuarioId);
            if ($contrasena === $usuario['Clave']) {
                // Crear una instancia de LoginController y llamar a logout
                $loginController = new LoginController();

                // Luego eliminar el usuario
                $this->usuarioModel->eliminarUsuario($usuarioId);

                $loginController->logout();

                header('Location: home');
                exit;
            } else {
                $errores['primoponlacotnraseña'] = 'La contraseña no es correcta';
            }
        }

        // Aquí podrías calcular el número total de fotos, etc.
        $this->view('darsedebaja', ['albumes' => $albumes, 'errores' => $errores]);
    }
}
?>