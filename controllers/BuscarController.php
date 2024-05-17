<?php
// controllers/BuscarController.php

require_once 'core/Controller.php';
require_once 'models/Paises.php';
require_once 'models/Foto.php';

class BuscarController extends Controller {
    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'title' => 'Registro',
            'errors' => [],
            'paises' => $paises
        ];
        $this->view('buscar', $data);
    }
}
?>