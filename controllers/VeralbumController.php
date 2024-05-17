<?php
// controllers/VeralbumController.php

require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Foto.php';

class VeralbumController extends Controller {
    private $albumModel;
    private $fotoModel;

    public function __construct() {
        $this->albumModel = new Album();
        $this->fotoModel = new Foto();
    }

    public function index() {
        $idAlbum = $_GET['id'] ?? 0;
        $fotos = $this->albumModel->obtenerFotosPorAlbum($idAlbum);
        $album = $this->albumModel->obtenerAlbum($idAlbum);
        $paises = $this->albumModel->obtenerPaisesPorAlbum($idAlbum);
        $intervaloTiempo = $this->albumModel->obtenerIntervaloTiempoPorAlbum($idAlbum);

        $this->view('veralbum', ['fotos' => $fotos, 'album' => $album, 'paises' => $paises, 'intervaloTiempo' => $intervaloTiempo]);
    }
}


?>