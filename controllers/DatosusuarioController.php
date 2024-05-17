<?php
// controllers/DatosusuarioController.php

require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Paises.php';

class DatosusuarioController extends Controller {

    public function index() {
        $paisesModel = new Paises();
        $usuarioModel = new Usuario();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);
        $usuario = $usuarioModel->obtenerPorNombre($_SESSION['username']);

        print_r($usuario);
        print_r($_SESSION['username']);

        $data = [
            'datosUsuario' => $usuario, 
            'paises' => $paises,
            'errors' => [],
            'textoBoton' => 'Actualizar Datos' // Texto del botón para actualizar
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Valida nombre de usuario si no está vacío
            if (!empty($_POST['nombre_r']) && !preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $_POST['nombre_r'])) {
                $data['errors']['nombre_r'] = 'El nombre de usuario debe empezar con una letra y tener entre 3 y 15 caracteres alfanuméricos.';
            }

            // Valida contraseña si no está vacía
            if (!empty($_POST['contraseña_r'])) {
                $tieneMayuscula = false;
                $tieneMinuscula = false;
                $tieneNumero = false;
                $longitudValida = strlen($_POST['contraseña_r']) >= 6 && strlen($_POST['contraseña_r']) <= 15;

                foreach (str_split($_POST['contraseña_r']) as $char) {
                    if (ctype_upper($char)) $tieneMayuscula = true;
                    if (ctype_lower($char)) $tieneMinuscula = true;
                    if (ctype_digit($char)) $tieneNumero = true;
                }

                if (!$tieneMayuscula || !$tieneMinuscula || !$tieneNumero || !$longitudValida) {
                    $data['errors']['contraseña_r'] = 'La contraseña debe tener entre 6 y 15 caracteres, incluyendo al menos una letra mayúscula, una minúscula y un número.';
                }
            }

            if($_POST['contraseña_r'] !== $_POST['repetir_contraseña']){
                $data['errors']['repetir_contraseña'] = 'La contraseña debe coincidir';
            }

            // Valida email si no está vacío
            if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['errors']['email'] = 'El formato del correo electrónico es inválido.';
            }

            // Valida fecha de nacimiento si no está vacía
            if (!empty($_POST['fechaNacimiento'])) {
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $edadMinima = 18;
                if (strtotime($fechaNacimiento) > strtotime("-$edadMinima years")) {
                    $data['errors']['fechaNacimiento'] = "Debes tener al menos $edadMinima años.";
                }
            }

            if (empty($data['errors'])) {
                $_SESSION['validated_data'] = $_POST; // Asigna $_POST a $_SESSION['validated_data']
                $this->view('intermediate_modificardatos', $data);
                exit;
            } else {
                // Importante: Actualiza los datos del usuario cada vez que se accede a la página
                $this->view('datosusuario', $data);
            }
        }
        //Mostrar la vista con errores
        $this->view('datosusuario', $data);
    }
}


?>