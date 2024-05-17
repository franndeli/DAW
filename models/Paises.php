<?php
// models/Paises.php

require_once 'core/Model.php';

class Paises extends Model {
    private $table_name = "Paises";

    public function obtenerPaises() {
        $query = "SELECT IdPais, NomPais FROM Paises ORDER BY NomPais";
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt->execute()) {
            // Imprimir error
            print_r($stmt->errorInfo());
        }

        return $stmt;
    }

    // En models/Paises.php

    public function obtenerPaisporId($idPais) {
        $query = "SELECT NomPais FROM Paises WHERE IdPais = :idPais";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idPais', $idPais);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>