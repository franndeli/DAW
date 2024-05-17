<?php
// controllers/HomeController.php

require_once 'core/Controller.php';

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Página Principal',
        ];
        $this->view('home', $data);
    }
}
?>