<?php
// models/Estilo.php
require_once 'core/Model.php';

class Estilo extends Model {
    public function obtenerEstilos() {
        $query = "SELECT * FROM estilos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEstiloPorId($id) {
        $query = "SELECT * FROM estilos WHERE IdEstilo = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
