<?php

class Controller {
    public function model($model) {
     require_once "../project/models/$model.php";
     return new $model ();
    }
    public function view($view, $data = Array()) {
     require_once "../project/views/$view.php";
    }
}

?>