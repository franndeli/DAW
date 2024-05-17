<?php
// core/View.php

class View {
    public function render($viewName, $data = []) {
        extract($data);
        include "views/$viewName.php";
    }
}
?>
