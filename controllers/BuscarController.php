<?php
// controllers/BuscarController.php

require_once 'core/Controller.php';

class BuscarController extends Controller {
    public function index() {
        $data = [
            'title' => 'Buscar',
        ];
        $this->view('buscar', $data);
    }
}
?>