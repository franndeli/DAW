<?php
// controllers/HomeController.php

require_once 'core/Controller.php';
require_once 'models/Foto.php';

class HomeController extends Controller {
    public function index() {
        $fotoModel = $this->model('Foto');
        $fotos = $fotoModel->getFotos()->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'title' => 'Página Principal',
            'fotos' => $fotos // Añade las fotos al array de datos
        ];
        $this->view('home', $data);
    }
}

?>