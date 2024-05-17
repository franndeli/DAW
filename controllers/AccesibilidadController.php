<?php
// controllers/AccesibilidadController.php

require_once 'core/Controller.php';

class AccesibilidadController extends Controller {
    public function index() {
        $data = [
            'title' => 'Accesibilidad',
        ];
        $this->view('accesibilidad', $data);
    }
}
?>