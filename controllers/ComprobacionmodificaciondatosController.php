<?php
// controllers/ComprobacionmodificaciondatosController.php
require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Paises.php';

class ComprobacionmodificaciondatosController extends Controller {
    private $usuarioModel;
    private $paisesModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->paisesModel = new Paises();
    }

    public function index() {
        $paises = $this->paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);
        $data['paises'] = $paises;
        print_r($_SESSION['validated_data']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
            // Crear usuario
            $usuarioActualizado = $this->usuarioModel->actualizarUsuario($_SESSION['validated_data'], $_SESSION['IdUsuario']);
            $_SESSION['username'] = $_SESSION['validated_data']['nombre_r'];
            if ($usuarioActualizado) {
                // Usuario creado con éxito
                unset($_SESSION['validated_data']); // Limpiar datos de sesión
                header('Location: home'); // Limpiar datos de sesión
                exit;
            } else {
                // Error al crear el usuario
                // Manejar el error
            }
        } else {
            $data += $_SESSION['validated_data'] ?? [];
            $this->view('comprobacionmodificaciondatos', $data);
        }
    }
}

?>