<?php
// controllers/Intermediate_registroController.php

require_once 'core/Controller.php';

class Intermediate_registroController extends Controller {
    public function index() {
        $data = [
            'title' => 'Buscar',
        ];
        $this->view('buscar', $data);
    }
}
?>