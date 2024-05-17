<?php
// core/Model.php

require_once 'config/Database.php';

class Model {
    protected $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->ConexionBD();
    }
}

