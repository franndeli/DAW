<?php
// controllers/CrearalbumController.php

require_once 'core/Controller.php';

class CrearalbumController extends Controller {
    public function index() {
        $data = [
            'title' => 'Crear album',
        ];
        $this->view('crearalbum', $data);
    }
}
?>