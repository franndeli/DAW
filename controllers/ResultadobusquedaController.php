<?php
// controllers/ResultadobusquedaController.php

require_once 'core/Controller.php';

class ResultadobusquedaController extends Controller {
    public function index() {
        $titulo = htmlspecialchars($_GET['titulo'] ?? 'Sin título');
        $pais = htmlspecialchars($_GET['pais'] ?? 'Sin país');
        $fechaInicio = htmlspecialchars($_GET['fechaInicio'] ?? 'Sin fecha de inicio');
        $fechaFin = htmlspecialchars($_GET['fechaFin'] ?? 'Sin fecha fin');

        // Construyes el texto con los datos obtenidos
        $textoBusqueda = "Resultados de la búsqueda: \"$titulo, $pais, $fechaInicio a $fechaFin\"";

        $this->view('resultadobusqueda', ['textoBusqueda' => $textoBusqueda]);
    }
}

?>