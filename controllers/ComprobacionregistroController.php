<?php
// controllers/ComprobacionregistroController.php
require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Paises.php';

class ComprobacionregistroController extends Controller {
    private $usuarioModel;
    private $paisesModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->paisesModel = new Paises();
    }

    public function index() {
        $paises = $this->paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);
        $data['paises'] = $paises;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
            // Crear usuario
            $usuarioCreado = $this->usuarioModel->crearUsuario($_SESSION['validated_data']);
            if ($usuarioCreado) {
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
            $this->view('comprobacionregistro', $data);
        }
    }
}

?>
