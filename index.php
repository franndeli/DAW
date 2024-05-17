<?php
//index.php

define('ACCESS_ALLOWED', true);

//Requiere los archivos
require_once 'core/Controller.php';
require_once 'config/Config.php';
require_once 'router/Router.php';

// Maneja el inicio de sesión si se detecta un POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'controllers/LoginController.php';
    $login = new LoginController();

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $error_message = $login->login();
        $_SESSION['error_message'] = $error_message;
    }
}

//Instancia del enrutador y proceso de solicitud
$url = isset($_GET['url']) ? $_GET['url'] : '';
$router = new Router();
$router->route($url);

