<?php
// core/Controller.php

require_once 'core/View.php';
require_once 'core/Model.php';

class Controller {
    public function model($model) {
        require_once "models/$model.php";
        return new $model();
    }

    public function view($view, $data = []) {
        $viewObj = new View();
        $viewObj -> render($view, $data);
    }
}
?>