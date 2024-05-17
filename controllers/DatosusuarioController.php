<?php
// controllers/DatosusuarioController.php

require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Paises.php';

class DatosusuarioController extends Controller {
    private $usuarioModel;
    
    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);
        $datosUsuario = $this->usuarioModel->obtenerPorNombre($_SESSION['username']);

        $data = [
            'datosUsuario' => $datosUsuario, 
            'paises' => $paises,
            'errors' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Tus validaciones aquí

            if (empty($data['errors'])) {
                $data['validated_data'] = $_POST;
                $this->view('intermediate_modificardatos', $data);
                exit;
            } else {
                // Re-mostrar la vista de datosusuario con errores y datos actuales
                $this->view('datosusuario', $data);
            }
        } else {
            $this->view('datosusuario', $data);
        }
    }
}


?>