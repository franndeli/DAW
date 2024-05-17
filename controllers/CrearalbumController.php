<?php
// controllers/CrearalbumController.php

require_once 'models/Album.php';

class CrearalbumController extends Controller {
    private $albumModel;

    public function __construct() {
        $this->albumModel = new Album();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo_a'] ?? '';
            $descripcion = $_POST['descripcion_a'] ?? '';
            $usuarioId = $_SESSION['IdUsuario']; // Asegúrate de que el ID del usuario está en la sesión
            $idAlbumCreado = $this->albumModel->crearAlbum($titulo, $descripcion, $usuarioId);

            if ($idAlbumCreado) {
                // Redirigir a una página de éxito o perfil
                header("Location: anadirfoto?id=$idAlbumCreado");
                exit;
            } else {
                // Manejar error, título vacío, etc.
                $error = "El título del álbum es obligatorio.";
            }
        }

        $data = [
            'title' => 'Crear Álbum',
            'error' => $error ?? null
        ];
        $this->view('crearalbum', $data);
    }
}

?>