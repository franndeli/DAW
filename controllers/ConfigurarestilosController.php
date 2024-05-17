<?php
// controllers/ConfigurarEstilosController.php
require_once 'core/Controller.php';
require_once 'models/Estilo.php';

class ConfigurarEstilosController extends Controller {
    private $estiloModel;

    public function __construct() {
        $this->estiloModel = new Estilo();
    }

    public function index() {
        $estilos = $this->estiloModel->obtenerEstilos();
        $this->view('configurarestilos', ['estilos' => $estilos]);
    }
}
?>
