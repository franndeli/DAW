<?php
// models/User.php

class User extends Model {
    public function getUserData($userId) {
        // Retornar datos del usuario (sin base de datos en esta etapa)
        return [
            'id' => $userId,
            'name' => 'John Doe'
        ];
    }
}

?>
