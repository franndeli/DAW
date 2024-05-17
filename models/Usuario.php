<?php
// models/Usuario.php
require_once 'core/Model.php';

class Usuario extends Model {
    public function obtenerPorNombre($nombreUsuario) {
        $query = "SELECT u.*, p.NomPais 
                  FROM usuarios u 
                  LEFT JOIN paises p ON u.Pais = p.IdPais 
                  WHERE u.NomUsuario = :nombreUsuario";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerIdPorNombre($nombreUsuario) {
        $query = "SELECT IdUsuario FROM usuarios WHERE NomUsuario = :nombreUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $resultado ? $resultado['IdUsuario'] : null;
    }

    public function obtenerPorId($idUsuario) {
        $query = "SELECT * FROM usuarios WHERE IdUsuario = :idUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
