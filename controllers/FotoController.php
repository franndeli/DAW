<?php
// controllers/FotoController.php

require_once 'core/Controller.php';
require_once 'models/Foto.php';
require_once 'models/Usuario.php';

class FotoController extends Controller {
    public function index() {
        $idFoto = $_GET['id'] ?? 0;

        $fotoModel = new Foto();
        $usuarioModel = new Usuario();
        $detallesFoto = $fotoModel->obtenerFotoPorId($idFoto);

        //print_r($detallesFoto['NomUsuario']);

        if ($detallesFoto) {
            $usuario = $usuarioModel->obtenerIdPorNombre($detallesFoto['NomUsuario']);
            $detallesFoto['usuario'] = $usuario;
        }

        $this->view('foto', ['detallesFoto' => $detallesFoto]);
    }
}

?>
