<?php

// controllers/MisAlbumesController.php
require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Usuario.php';

class MisalbumesController extends Controller {
    private $albumModel;
    private $usuarioModel;

    public function __construct() {
        $this->albumModel = new Album();
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $NomUsuario = $_SESSION['username'] ?? null;
        $usuario = $this->usuarioModel->obtenerPorNombre($NomUsuario);

        //print_r($usuario);

        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($usuario['IdUsuario']);
        $this->view('misalbumes', ['albumes' => $albumes]);
    }
}

?>
