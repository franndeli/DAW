<?php
// models/Solicitud.php

require_once 'core/Model.php';

class Solicitud extends Model {
    public function insertarSolicitud($datos) {
        $query = "INSERT INTO solicitudes (Album, Nombre, Titulo, Descripcion, Email, Direccion, Color, Copias, Resolucion, Fecha, IColor, Coste) 
                  VALUES (:Album, :Nombre, :Titulo, :Descripcion, :Email, :Direccion, :Color, :Copias, :Resolucion, :Fecha, :IColor, :Coste)";

        $stmt = $this->conn->prepare($query);

        $direccionFormateada = implode(", ", [
            $datos['direccion']['calle'],
            $datos['direccion']['numero'],
            $datos['direccion']['codigopostal'],
            $datos['direccion']['localidad'],
            $datos['direccion']['provincia']
        ]);

        // Vincula los valores a los parámetros de la consulta
        $stmt->bindParam(':Album', $datos['album_usuario']);
        $stmt->bindParam(':Nombre', $datos['nombre_persona_album']);
        $stmt->bindParam(':Titulo', $datos['titulo_album']);
        $stmt->bindParam(':Descripcion', $datos['texto_adicional']);
        $stmt->bindParam(':Email', $datos['email']);
        $stmt->bindParam(':Direccion', $direccionFormateada);
        $stmt->bindParam(':Color', $datos['color_portada']);
        $stmt->bindParam(':Copias', $datos['num_copias'], PDO::PARAM_INT);
        $stmt->bindParam(':Resolucion', $datos['resolucion'], PDO::PARAM_INT);
        $stmt->bindParam(':Fecha', $datos['fecha_recepcion']);
        $stmt->bindParam(':IColor', $datos['impresion_color'], PDO::PARAM_INT);
        $stmt->bindParam(':Coste', $datos['costeTotal']);

        // Ejecuta la consulta y retorna true si fue exitosa, false en caso contrario
        return $stmt->execute();
    }
}
?>