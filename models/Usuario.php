<?php
// models/Usuario.php
require_once 'core/Model.php';

class Usuario extends Model {
    public function obtenerPorNombre($nombreUsuario) {
        $query = "SELECT u.*, p.NomPais, e.Fichero AS EstiloFichero
                FROM usuarios u 
                LEFT JOIN paises p ON u.Pais = p.IdPais
                LEFT JOIN estilos e ON u.Estilo = e.IdEstilo
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

    public function crearUsuario($datosUsuario) {
        $query = "INSERT INTO usuarios (NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto) VALUES (:NomUsuario, :Clave, :Email, :Sexo, :FNacimiento, :Ciudad, :Pais, :Foto)";
        $stmt = $this->conn->prepare($query);
    
        // Vincula los valores a los parámetros de la consulta
        $stmt->bindParam(':NomUsuario', $datosUsuario['nombre_r'], PDO::PARAM_STR);
        $stmt->bindParam(':Clave', $datosUsuario['contraseña_r'], PDO::PARAM_STR);
        $stmt->bindParam(':Email', $datosUsuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(':Sexo', $datosUsuario['sexo'], PDO::PARAM_STR);
        $stmt->bindParam(':FNacimiento', $datosUsuario['fechaNacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(':Ciudad', $datosUsuario['ciudad'], PDO::PARAM_STR);
        $stmt->bindParam(':Pais', $datosUsuario['pais'], PDO::PARAM_INT);
        $stmt->bindParam(':Foto', $datosUsuario['foto_perfil'], PDO::PARAM_STR);
    
        // Ejecuta la consulta y retorna true si fue exitosa, false en caso contrario
        return $stmt->execute();
    }

    public function actualizarEstilo($usuarioId, $estiloId) {
        $query = "UPDATE usuarios SET Estilo = :estiloId WHERE IdUsuario = :usuarioId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);
        $stmt->bindParam(':estiloId', $estiloId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function actualizarUsuario($datos, $idUsuario) {
        $query = "UPDATE usuarios SET 
            NomUsuario = :NomUsuario, 
            Clave = IF(:Clave != '', :Clave, Clave), 
            Email = :Email, 
            Sexo = :Sexo, 
            FNacimiento = :FNacimiento, 
            Ciudad = :Ciudad, 
            Pais = :Pais 
            WHERE IdUsuario = :IdUsuario";
    
        $stmt = $this->conn->prepare($query);
    
        // Asignar valores a los parámetros
        $stmt->bindParam(':NomUsuario', $datos['nombre_r'], PDO::PARAM_STR);
        $contraseñaHasheada = (!empty($datos['contraseña_r'])) ? password_hash($datos['contraseña_r'], PASSWORD_DEFAULT) : '';
        $stmt->bindParam(':Clave', $contraseñaHasheada, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(':Sexo', $datos['sexo'], PDO::PARAM_STR);
        $stmt->bindParam(':FNacimiento', $datos['fechaNacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(':Ciudad', $datos['ciudad'], PDO::PARAM_STR);
        $stmt->bindParam(':Pais', $datos['pais'], PDO::PARAM_INT);
        $stmt->bindParam(':IdUsuario', $idUsuario, PDO::PARAM_INT);
    
        return $stmt->execute();
    }

    public function eliminarUsuario($idUsuario) {
        // Eliminar solicitudes asociadas a los álbumes del usuario
        $stmt = $this->conn->prepare("DELETE FROM solicitudes WHERE Album IN (SELECT IdAlbum FROM albumes WHERE Usuario = :idUsuario)");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
    
        // Eliminar fotos y álbumes asociados
        $stmt = $this->conn->prepare("DELETE FROM fotos WHERE Album IN (SELECT IdAlbum FROM albumes WHERE Usuario = :idUsuario)");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
    
        $stmt = $this->conn->prepare("DELETE FROM albumes WHERE Usuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
    
        // Eliminar el usuario
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE IdUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}

?>
