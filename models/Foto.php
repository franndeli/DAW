<?php
// models/Foto.php

require_once 'core/Model.php';

class Foto extends Model {
    private $table_name = "Fotos";

    public function getFotos() {
        $query = "SELECT f.idFoto, f.titulo, f.fecha, p.NomPais, f.fichero, f.fregistro, a.Titulo as NombreAlbum FROM " . $this->table_name . " f JOIN Paises p ON f.Pais = p.IdPais JOIN Albumes a ON f.Album = a.IdAlbum LIMIT 5";
        $stmt = $this->conn->prepare($query);

        if (!$stmt->execute()) {
            // Imprimir error
            print_r($stmt->errorInfo());
        }
        
        return $stmt;
    }

    public function obtenerFotoPorId($idFoto) {
        $query = "SELECT f.IdFoto, f.Titulo, f.Descripcion, f.Fecha, f.Fichero, f.Alternativo, f.Album, f.FRegistro, 
                         a.Titulo AS NombreAlbum, 
                         p.NomPais,
                         u.NomUsuario
                  FROM fotos f
                  LEFT JOIN albumes a ON f.Album = a.IdAlbum
                  LEFT JOIN paises p ON f.Pais = p.IdPais
                  LEFT JOIN usuarios u ON a.Usuario = u.IdUsuario
                  WHERE f.IdFoto = :idFoto";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idFoto', $idFoto, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function obtenerFotosPorUsuario($idUsuario) {
        $query = "SELECT fotos.*, albumes.Titulo AS NombreAlbum 
                  FROM fotos 
                  JOIN albumes ON fotos.Album = albumes.IdAlbum 
                  WHERE albumes.Usuario = :idUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarFotos($titulo = '', $fechaInicio = '', $fechaFin = '', $pais = '') {
        $query = "SELECT f.idFoto, f.titulo, f.fecha, p.NomPais, f.fichero, f.fregistro, a.Titulo as NombreAlbum 
                  FROM " . $this->table_name . " f 
                  JOIN Paises p ON f.Pais = p.IdPais 
                  JOIN Albumes a ON f.Album = a.IdAlbum 
                  WHERE (:titulo = '' OR LOWER(f.titulo) LIKE LOWER(:titulo))
                  AND ((:fechaInicio = '' AND :fechaFin = '') OR (f.fecha BETWEEN :fechaInicio AND :fechaFin))
                  AND (:pais = '' OR p.IdPais = :pais)";

        $stmt = $this->conn->prepare($query);
        $titulo = '%' . $titulo . '%';
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
        $stmt->bindParam(':pais', $pais);

        $stmt->execute();
        return $stmt;
    }

    public function insertarFoto($titulo, $descripcion, $fecha, $pais, $album, $fichero, $textoAlternativo) {
        $query = "INSERT INTO fotos (Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo) VALUES (:Titulo, :Descripcion, :Fecha, :Pais, :Album, :Fichero, :Alternativo)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':Titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':Descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':Fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':Pais', $pais, PDO::PARAM_INT);
        $stmt->bindParam(':Album', $album, PDO::PARAM_INT);
        $stmt->bindParam(':Fichero', $fichero, PDO::PARAM_STR);
        $stmt->bindParam(':Alternativo', $textoAlternativo, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
?>
