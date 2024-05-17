<?php
// controllers/SolicitudalbumController.php

require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Usuario.php';

class SolicitudalbumController extends Controller {
    private $albumModel;
    private $usuarioModel;

    public function __construct() {
        $this->albumModel = new Album();
        $this->usuarioModel = new Usuario();
    }

    private function calcularCostes($numPaginas, $numFotos) {
        $costePaginas = 0;
        if ($numPaginas <= 4) {
            $costePaginas = $numPaginas * 0.10;
        } else if ($numPaginas <= 11) {
            $costePaginas = (4 * 0.10) + (($numPaginas - 4) * 0.08);
        } else {
            $costePaginas = (4 * 0.10) + (7 * 0.08) + (($numPaginas - 11) * 0.07);
        }
    
        $costeBNLowDpi = $costePaginas;
        $costeBNHighDpi = number_format(($costePaginas + ($numFotos * 0.02)), 2);
        $costeColorLowDpi = number_format(($costePaginas + (0.05 * $numFotos)), 2);
        $costeColorHighDpi = number_format(($costePaginas + (0.05 * $numFotos) + (0.02 * $numFotos)), 2);
    
        return [
            'costeBNLowDpi' => $costeBNLowDpi,
            'costeBNHighDpi' => $costeBNHighDpi,
            'costeColorLowDpi' => $costeColorLowDpi,
            'costeColorHighDpi' => $costeColorHighDpi
        ];
    }

    private function crearTabla() {
        $tablaHtml = '<table>';
        
        // Encabezado de la tabla
        $headers = ['', '', 'Blanco y negro', 'Color'];
        $tablaHtml .= '<thead><tr>';
        foreach ($headers as $index => $header) {
            $colspan = ($index > 1) ? ' colspan="2"' : '';
            $tablaHtml .= "<th{$colspan}>{$header}</th>";
        }
        $tablaHtml .= '</tr></thead>';
        
        // Subencabezado de la tabla
        $subHeaders = ['Número de páginas', 'Número de fotos', '150-300 dpi', '450-900 dpi', '150-300 dpi', '450-900 dpi'];
        $tablaHtml .= '<tr>';
        foreach ($subHeaders as $subHeader) {
            $tablaHtml .= "<th>{$subHeader}</th>";
        }
        $tablaHtml .= '</tr>';
        
        // Cuerpo de la tabla
        $tablaHtml .= '<tbody>';
        for ($i = 1; $i <= 15; $i++) {
            $numPaginas = $i;
            $numFotos = $i * 3;
            $costes = $this->calcularCostes($numPaginas, $numFotos);
            $tablaHtml .= '<tr>';
            $tablaHtml .= "<td>{$numPaginas}</td>";
            $tablaHtml .= "<td>{$numFotos}</td>";
            foreach ($costes as $coste) {
                $tablaHtml .= '<td>' . number_format($coste, 2) . '</td>';
            }
            $tablaHtml .= '</tr>';
        }
        $tablaHtml .= '</tbody>';
        $tablaHtml .= '</table>';
        
        return $tablaHtml;
    }

    public function index() {
        $tablaHtml = $this->crearTabla();

        $nombreUsuario = $_SESSION['username'] ?? (isset($_COOKIE['username']) ? $_COOKIE['username'] : null);
        $idUsuarioActual = $this->usuarioModel->obtenerIdPorNombre($nombreUsuario);

        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($idUsuarioActual);

        $data = [
            'title' => 'Impresión del álbum',
            'tablaHtml' => $tablaHtml,
            'albumes' => $albumes
        ];
        
        $this->view('solicitudalbum', $data);
    }
}
?>
