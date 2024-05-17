<?php
// controllers/RegistroController.php

require_once 'core/Controller.php';
require_once 'models/Usuario.php';
require_once 'models/Paises.php';

class RegistroController extends Controller {
    private $usuarioModel;
    
    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);

        $data = [
            'title' => 'Registro',
            'errors' => [],
            'paises' => $paises,
            'textoBoton' => 'Registro'
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

            // Nombre de usuario
            if (!preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $nombre)) {
                $data['errors']['nombre_r'] = 'El nombre de usuario debe empezar con una letra y tener entre 3 y 15 caracteres alfanuméricos.';
            }

            // Contraseña
            $tieneMayuscula = false;
            $tieneMinuscula = false;
            $tieneNumero = false;
            $longitudValida = strlen($contraseña) >= 6 && strlen($contraseña) <= 15;

            foreach (str_split($contraseña) as $char) {
                if (ctype_upper($char)) {
                    $tieneMayuscula = true;
                } elseif (ctype_lower($char)) {
                    $tieneMinuscula = true;
                } elseif (ctype_digit($char)) {
                    $tieneNumero = true;
                }
            }

            if (!$tieneMayuscula || !$tieneMinuscula || !$tieneNumero || !$longitudValida) {
                $data['errors']['contraseña_r'] = 'La contraseña debe tener entre 6 y 15 caracteres, incluyendo al menos una letra mayúscula, una minúscula y un número.';
            }

            // Email
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $data['errors']['email'] = 'El formato del correo electrónico es inválido.';
            }

            // Sexo
            if (!isset($_POST['sexo']) || $_POST['sexo'] === '') {
                $data['errors']['sexo'] = 'Debes seleccionar un sexo.';
            }

            // Fecha de nacimiento
            $fechaNacimiento = $_POST['fechaNacimiento'] ?? '';
            $edadMinima = 18;
            if (!$fechaNacimiento || (strtotime($fechaNacimiento) > strtotime("-$edadMinima years"))) {
                $data['errors']['fechaNacimiento'] = "Debes tener al menos $edadMinima años.";
            }



            // Si no hay errores, redirigir a la página de comprobación
            if (empty($data['errors'])) {
                $_SESSION['validated_data'] = $_POST; // Guardar los datos validados en la sesión
                $this->view('intermediate_registro', $data); // Redirigir a la página de comprobación
                exit;
            }
        }

        // Mostrar la vista con errores si los hay
        $this->view('registro', $data);
    }
}
?>
