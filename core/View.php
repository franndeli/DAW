<?php
// core/View.php

class View {
    public function render($viewName, $data = []) {
        extract($data);
        //var_dump(get_defined_vars());
        include "views/$viewName.php";
    }
}
?>
