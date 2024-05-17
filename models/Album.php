<?php
// models/Album.php
require_once 'core/Model.php';

class Album extends Model {
    public function obtenerAlbumesPorUsuario($idUsuario) {
        $query = "SELECT a.*, 
                (SELECT COUNT(*) FROM fotos WHERE Album = a.IdAlbum) as cantidadFotos 
                FROM albumes a 
                WHERE a.Usuario = :idUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerFotosPorAlbum($idAlbum) {
        $query = "SELECT f.*, p.NomPais 
                  FROM fotos f 
                  LEFT JOIN paises p ON f.Pais = p.IdPais 
                  WHERE f.Album = :idAlbum";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idAlbum', $idAlbum, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAlbum($idAlbum) {
        $query = "SELECT * FROM albumes WHERE IdAlbum = :idAlbum";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idAlbum', $idAlbum, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPaisesPorAlbum($idAlbum) {
        $query = "SELECT DISTINCT p.NomPais 
                  FROM fotos f 
                  JOIN paises p ON f.Pais = p.IdPais 
                  WHERE f.Album = :idAlbum";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idAlbum', $idAlbum, PDO::PARAM_INT);
        $stmt->execute();

        $paises = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $paises;
    }

    public function obtenerIntervaloTiempoPorAlbum($idAlbum) {
        $query = "SELECT MIN(f.Fecha) AS fechaInicio, MAX(f.Fecha) AS fechaFin 
                  FROM fotos f 
                  WHERE f.Album = :idAlbum";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idAlbum', $idAlbum, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado; 
    }

    public function crearAlbum($titulo, $descripcion, $usuarioId) {
        if (empty($titulo)) {
            // El título es obligatorio
            return false;
        }
    
        $query = "INSERT INTO albumes (Titulo, Descripcion, Usuario) VALUES (:Titulo, :Descripcion, :Usuario)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':Descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':Usuario', $usuarioId, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();  // Devuelve el ID del álbum creado
        } else {
            return false;
        }
    }
}
?>
