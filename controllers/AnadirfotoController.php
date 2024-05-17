<?php

// controllers/AnadirfotoController.php

require_once 'core/Controller.php';
require_once 'models/Album.php';
require_once 'models/Paises.php';
require_once 'models/Foto.php';

class AnadirfotoController extends Controller {
    private $albumModel;
    private $fotoModel;

    public function __construct() {
        $this->albumModel = new Album();
        $this->fotoModel = new Foto();
    }

    public function index() {
        $paisesModel = new Paises();
        $paises = $paisesModel->obtenerPaises()->fetchAll(PDO::FETCH_ASSOC);

        $idAlbum = $_GET['id'] ?? null;
        $albumes = $this->albumModel->obtenerAlbumesPorUsuario($_SESSION['IdUsuario']);
        $albumPreseleccionado = null;

        $errors = [];

        if ($idAlbum) {
            $albumPreseleccionado = $this->albumModel->obtenerAlbum($idAlbum);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $fecha = $_POST['fecha'] ?? '';
            $pais = $_POST['pais'] ?? '';
            $album = $_POST['album'] ?? '';
            $textoAlternativo = $_POST['textoAlternativo'] ?? '';

            // Validar el título (no puede estar vacío)
            if (empty($titulo)) {
                $errors['titulo'] = "El título de la foto es obligatorio.";
            }

            // Validar el texto alternativo
            if (strlen($textoAlternativo) < 10 || preg_match('/^(foto|imagen)/i', $textoAlternativo)) {
                $errors['textoAlternativo'] = "El texto alternativo debe tener al menos 10 caracteres y no empezar con 'foto' o 'imagen'.";
            }

            if (empty($pais)) {
                $pais = null; // O un valor predeterminado si es necesario
            }

            if (count($errors) == 0) {
                // Si pasa todas las validaciones, intenta insertar la foto
                $fichero = null;
                if ($this->fotoModel->insertarFoto($titulo, $descripcion, $fecha, $pais, $album, $fichero, $textoAlternativo)) {
                    // Redirigir a alguna página de éxito o al álbum
                    header('Location: veralbum?id=' . $album);
                    exit;
                } else {
                    $errors['noInsercion'] = "Hubo un error al insertar la foto.";
                    // Manejar el error, mostrar el mensaje en la vista
                }
            }
        }
        
        $this->view('anadirfoto', ['albumes' => $albumes, 'albumPreseleccionado' => $albumPreseleccionado, 'paises' => $paises, 'errors' => $errors ]);
    }
}
?>