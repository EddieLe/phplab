<?php

class Controller {
    public function model($model) {
     require_once "../Project/models/$model.php";
     return new $model ();
    }
    public function view($view, $data) {
     require_once "../Project/views/$view.php";
    }
}

?>