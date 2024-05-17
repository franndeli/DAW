<?php

// controllers/MisfotosController.php
require_once 'core/Controller.php';
require_once 'models/Foto.php';
require_once 'models/Usuario.php';

class MisfotosController extends Controller {
    private $fotoModel;
    private $usuarioModel;

    public function __construct() {
        $this->fotoModel = new Foto();
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $NomUsuario = $_SESSION['username'] ?? null;
        $usuario = $this->usuarioModel->obtenerPorNombre($NomUsuario);

        if ($usuario) {
            $fotos = $this->fotoModel->obtenerFotosPorUsuario($usuario['IdUsuario']);
        }

        $this->view('misfotos', ['fotos' => $fotos]);
    }
}

?>