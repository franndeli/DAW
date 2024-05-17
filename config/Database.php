<?php
class Database {
    function ConexionBD() {
        $host = 'localhost';
        $db_name = 'pibd';
        $username = 'root';
        $password = 'hola';
        $conn = null;

        try {
            $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Se conectó correctamente";

        } catch (PDOException $exp) {
            echo "No se logró conectar con $db_name, error: " . $exp->getMessage();
        }
        return $conn;
    }
}


?>
