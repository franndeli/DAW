<?php
// controllers/RegistroController.php

require_once 'core/Controller.php';

class RegistroController extends Controller {
    public function index() {
        $data = [
            'title' => 'Registro',
            'errors' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre_r'] ?? '');
            $contraseña = $_POST['contraseña_r'] ?? '';
            $repetirContraseña = $_POST['repetir_contraseña'] ?? '';

            // Realizar las validaciones aquí
            if (empty($nombre)) {
                $data['errors']['nombre_r'] = 'Debes introducir un nombre de usuario.';
            }
            if (empty($contraseña)) {
                $data['errors']['contraseña_r'] = 'Debes introducir una contraseña.';
            }
            if (empty($repetirContraseña)) {
                $data['errors']['repetir_contraseña'] = 'Debes repetir la contraseña.';
            }
            if ($contraseña !== $repetirContraseña) {
                $data['errors']['repetir_contraseña'] = 'Las contraseñas no coinciden.';
            }

            // Si no hay errores, redirigir a la página de comprobación
            if (empty($data['errors'])) {
                $data['validated_data'] = $_POST;
                $this->view('intermediate_registro', $data); // Una vista intermedia para enviar los datos
                exit;
            }
        }

        // Mostrar la vista con errores si los hay
        $this->view('registro', $data);
    }
}
?>
