<?php

// controllers/AnadirfotoController.php

require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Paises.php';

class AnadirfotoController extends Controller {
    private $albumModel;

    public function __construct() {
        $this->albumModel = new Album();
    }

    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);

        $idAlbum = $_GET['id'] ?? null;
        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($_SESSION['IdUsuario']);
        $albumPreseleccionado = null;

        if ($idAlbum) {
            $albumPreseleccionado = $this->albumModel->obtenerAlbum($idAlbum);
        }
        
        $this->view('anadirfoto', ['albumes' => $albumes, 'albumPreseleccionado' => $albumPreseleccionado, 'paises' => $paises]);
    }
}
?>