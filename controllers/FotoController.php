<?php
// controllers/FotoController.php

require_once 'core/Controller.php';

class FotoController extends Controller {
    public function index() {
        $idFoto = $_GET['id'] ?? 0;
        $esPar = $idFoto % 2 == 0;

        $detallesFoto = $esPar ? [
            'titulo' => 'Prado',
            'imagen' => 'campo.jpg',
            'fecha' => '23/04/2006',
            'pais' => 'España',
            'album' => 'Naturaleza Viva',
            'usuario' => 'usuario123'
        ] : [
            'titulo' => 'Acampada',
            'imagen' => 'acampar.jpg',
            'fecha' => '28/10/2022',
            'pais' => 'España',
            'album' => 'Aventuras al Aire Libre',
            'usuario' => 'admin'
        ];

        $this->view('foto', ['detallesFoto' => $detallesFoto]);
    }
}

?>