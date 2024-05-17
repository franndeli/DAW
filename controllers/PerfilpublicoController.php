<?php
// controllers/PerfilPublicoController.php

require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Album.php';

class PerfilPublicoController extends Controller {
    private $usuarioModel;
    private $albumModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->albumModel = new Album();
    }

    public function index() {
        $idUsuario = $_GET['id'] ?? 0;

        $usuario = $this->usuarioModel->obtenerPorId($idUsuario);
        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($idUsuario);

        $data = [
            'usuario' => $usuario,
            'albumes' => $albumes
        ];

        $this->view('perfilpublico', $data);
    }
}


?>
