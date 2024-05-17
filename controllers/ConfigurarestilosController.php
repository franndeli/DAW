<?php
// controllers/ConfigurarEstilosController.php
require_once 'core/Controller.php';
require_once 'models/Estilo.php';
require_once 'models/Usuario.php';

class ConfigurarEstilosController extends Controller {
    private $estiloModel;
    private $usuarioModel; // Asegúrate de que Usuario es un modelo existente

    public function __construct() {
        $this->estiloModel = new Estilo();
        $this->usuarioModel = new Usuario(); // Instancia el modelo Usuario
    }

    public function index() {
        $estilos = $this->estiloModel->obtenerEstilos();
        $this->view('configurarestilos', ['estilos' => $estilos]);
    }

    public function mostrarEstilo() {
        $estiloId = $_POST['estiloId'] ?? null;
    
        if ($estiloId) {
            $estilo = $this->estiloModel->obtenerEstiloPorId($estiloId);
            if ($estilo) {
                $_SESSION['previsualizacionEstilo'] = $estilo['Fichero']; // Guardar ruta del CSS en sesión
                $this->view('mostrarEstilo', ['estiloId' => $estiloId]);
            } else {
                header('Location: /DAW/configurarestilos');
                exit;
            }
        } else {
            header('Location: /DAW/configurarestilos');
            exit;
        }
    }
    

    public function confirmarEstilo() {
        $estiloId = $_GET['estiloId'] ?? null;
        $usuarioId = $_SESSION['IdUsuario']; // Asegúrate de que el ID del usuario esté en la sesión

        if ($estiloId && $usuarioId) {
            $this->usuarioModel->actualizarEstilo($usuarioId, $estiloId);
            $_SESSION['style'] = $_SESSION['previsualizacionEstilo'];
            unset($_SESSION['previsualizacionEstilo']);
            header('Location: /DAW/home'); // Asegúrate de que la ruta 'perfil' es válida
            exit;
        } else {
            header('Location: configurarestilos');
            exit;
        }
    }
}
?>
