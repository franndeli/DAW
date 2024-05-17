<?php
// models/Album.php
require_once 'core/Model.php';

class Album extends Model {
    public function obtenerAlbumesPorUsuario($idUsuario) {
        $query = "SELECT * FROM albumes WHERE Usuario = :idUsuario";
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


}
?>
