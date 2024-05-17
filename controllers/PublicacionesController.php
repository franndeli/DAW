<?php
// controllers/PublicacionesController.php

require_once 'core/Controller.php';

class PublicacionesController extends Controller {
    public function index() {
        $data = [
            'title' => 'Publicaciones',
        ];
        $this->view('publicaciones', $data);
    }
}
?>