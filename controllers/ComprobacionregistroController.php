<?php
// controllers/ComprobacionregistroController.php

require_once 'core/Controller.php';

class ComprobacionregistroController extends Controller {
    public function index() {
        $data = [
            'nombre' => $_POST['nombre_r'] ?? '',
            'email' => $_POST['email'] ?? '',
            'sexo' => $_POST['sexo'] ?? '',
            'fechaNacimiento' => $_POST['fechaNacimiento'] ?? '',
            'ciudad' => $_POST['ciudad'] ?? '',
            'pais' => $_POST['pais'] ?? '',
            // 'contraseña'
        ];
        
        $this->view('comprobacionregistro', $data);
    }
}
?>
