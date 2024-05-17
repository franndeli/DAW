<?php
// controllers/ComprobacionalbumController.php

require_once 'core/Controller.php';
require_once 'models/Solicitud.php';
require_once 'models/Album.php';

class ComprobacionalbumController extends Controller {
    private $albumModel;

    public function __construct() {
        $this->albumModel = new Album();
    }

    public function index() {
        $numPaginas = 10; // Valor inventado
        $numFotos = 30; // Valor inventado

        //Valores enviados desde el formulario
        $color = $_POST['impresion_color'] ?? 'no'; // Verifica si se marcó la impresión a color
        $dpi = $_POST['resolucion'] ?? '150'; // Obtiene la resolución
        $num_copias = $_POST['num_copias'] ?? '1'; // Obtiene el número de copias

        // Calcula los costes
        $costeTotal = $this->calcularCostes($numPaginas, $numFotos, $color, $dpi, $num_copias);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['confirmar'])) {

            $_SESSION['datos_solicitud'] = $_POST;
            // Procesar los datos del formulario
            $datos = [
                'nombre_persona_album' => $_POST['nombre_persona_album'] ?? '',
                'titulo_album' => $_POST['titulo_album'] ?? '',
                'texto_adicional' => $_POST['texto_adicional'] ?? '',
                'email' => $_POST['email'] ?? 'ejemplo@gmail.com',
                'direccion' => [
                    'calle' => $_POST['direccion']['calle'] ?? '',
                    'numero' => $_POST['direccion']['numero'] ?? '',
                    'codigopostal' => $_POST['direccion']['codigopostal'] ?? '',
                    'localidad' => $_POST['direccion']['localidad'] ?? '',
                    'provincia' => $_POST['direccion']['provincia'] ?? '',
                ],
                'telefono' => $_POST['telefono'] ?? '',
                'color_portada' => $_POST['color_portada'] ?? '#000000',
                'num_copias' => $_POST['num_copias'] ?? 1,
                'resolucion' => $_POST['resolucion'] ?? 150,
                'album_usuario' => $_POST['album_usuario'] ?? '',
                'fecha_recepcion' => $_POST['fecha_recepcion'] ?? '',
                'impresion_color' => $_POST['impresion_color'] ?? null,
                'costeTotal' => $costeTotal,
            ];

            $datos['direccion_completa'] = $datos['direccion']['calle'] . " " . 
                               $datos['direccion']['numero'] . ", " . 
                               $datos['direccion']['codigopostal'] . " " . 
                               $datos['direccion']['localidad'] . ", " . 
                               $datos['direccion']['provincia'];

            
            // Convertir impresión a color a valor entero (1: Sí, 0: No)
            $datos['impresion_color'] = (isset($datos['impresion_color']) && $datos['impresion_color'] === 'on') ? 1 : 0;
            $albumSeleccionado = $this->albumModel->obtenerAlbum($_POST['album_usuario']);
            $datos['nombre_album'] = $albumSeleccionado['Titulo'];

            $this->view('comprobacionalbum', ['datos' => $datos]);

        } elseif (isset($_POST['confirmar'])) {
            // Confirmar la solicitud
            $datos = $_SESSION['datos_solicitud']; 
            
            // Recuperar los datos de la sesión
            $solicitudModel = new Solicitud();
    
            // Convertir la impresión a color a valor entero (1: Sí, 0: No)
            $datos['impresion_color'] = ($datos['impresion_color'] === 'on') ? 1 : 0;
    
            // Insertar la solicitud
            if ($solicitudModel->insertarSolicitud($datos)) {
                unset($_SESSION['datos_solicitud']); // Limpiar los datos de la sesión
                header('Location: home'); // Redirigir al inicio o a la página de éxito
                exit;
            } else {
                $error = "Error al insertar la solicitud."; // Manejar el error de inserción aquí
                $this->view('comprobacionalbum', ['datos' => $datos, 'error' => $error]);
            }
        } else {
            // Redirigir al formulario si se accede a esta página sin enviar el formulario
            header('Location: solicitudalbum');
            exit;
        }
    }

    private function calcularCostes($numPaginas, $numFotos, $color, $dpi, $num_copias) {
        if ($numPaginas <= 4) {
            $costePaginas = $numPaginas * 0.10;
        } elseif ($numPaginas <= 11) {
            $costePaginas = (4 * 0.10) + (($numPaginas - 4) * 0.08);
        } else {
            $costePaginas = (4 * 0.10) + (7 * 0.08) + (($numPaginas - 11) * 0.07);
        }
    
        // Coste adicional por foto si el álbum es a color
        if($color =='no'){
            $costeColor = 0;
        } 

        if($color =='on') {
            $costeColor = ($numFotos * 0.05);
        }
        
        // Costo adicional por resolución 
        if($dpi>300){
            $costeResolucion = $numFotos * 0.02;
        } else {
            $costeResolucion = 0;
        }
    
        // Sumar costes multiplicado por el número de copias
        $costeTotal = $num_copias*($costePaginas + $costeColor + $costeResolucion);
    
        // Devolver coste total
        return $costeTotal;
    }
}
?>
