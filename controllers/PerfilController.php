<?php
// controllers/PerfilController.php

require_once 'core/Controller.php';

class PerfilController extends Controller {
    public function index() {
        $data = [
            'title' => 'Perfil',
        ];
        $this->view('perfil', $data);
    }
}
?>