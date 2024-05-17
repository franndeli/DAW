<?php
// index.php

define('ACCESS_ALLOWED', true);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Requiere los archivos
require_once 'core/Controller.php';
require_once 'config/Config.php';
require_once 'router/Router.php';
require_once 'controllers/LoginController.php';

// Instancia el controlador de login y verifica las cookies
$loginController = new LoginController();
$loginController->checkRememberedLogin();

// Maneja el inicio de sesión si se detecta un POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new LoginController();

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $error_message = $login->login();
        $_SESSION['error_message'] = $error_message;
    }
}

// Instancia del enrutador y proceso de solicitud
$url = isset($_GET['url']) ? $_GET['url'] : '';
$router = new Router();
$router->route($url);
