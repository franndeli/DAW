<?php
// controllers/PerfilController.php

require_once 'core/Controller.php';

class PerfilController extends Controller {
    public function index() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $hour = date("H");

        // Determinar el mensaje de saludo basado en la hora
        if ($hour >= 6 && $hour < 12) {
            $greeting = "Buenos días";
        } elseif ($hour >= 12 && $hour < 16) {
            $greeting = "Hola";
        } elseif ($hour >= 16 && $hour < 20) {
            $greeting = "Buenas tardes";
        } else {
            $greeting = "Buenas noches";
        }

        $data = [
            'title' => 'Perfil',
            'greeting' => $greeting
        ];
        $this->view('perfil', $data);
    }
}
?>