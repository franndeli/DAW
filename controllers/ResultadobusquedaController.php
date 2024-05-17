<?php
// controllers/ResultadobusquedaController.php

require_once 'core/Controller.php';
require_once 'models/Foto.php';
require_once 'models/Paises.php';

class ResultadobusquedaController extends Controller {
    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);

        $fotoModel = new Foto();
        $titulo = htmlspecialchars($_GET['titulo'] ?? '');
        $pais = htmlspecialchars($_GET['pais'] ?? '');
        $fechaInicio = htmlspecialchars($_GET['fechaInicio'] ?? '');
        $fechaFin = htmlspecialchars($_GET['fechaFin'] ?? '');

        $paisInfo = $paisesModel->obtenerPaisporId($pais);
        $nombrePais = $paisInfo['NomPais'] ?? 'Sin país';

        // Realizar la búsqueda
        $resultados = $fotoModel->buscarFotos($titulo, $fechaInicio, $fechaFin, $pais)->fetchAll(PDO::FETCH_ASSOC);

        // Construir texto de búsqueda para la vista
        $textoBusqueda = "Resultados de la búsqueda: \"$titulo, $nombrePais, $fechaInicio a $fechaFin\"";

        $this->view('resultadobusqueda', ['textoBusqueda' => $textoBusqueda, 'resultados' => $resultados, 'paises' => $paises]);
    }
}
?>
