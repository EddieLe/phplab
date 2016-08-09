<?php

class Controller
{
    public function model($model)
    {
        require_once "../atm/models/$model.php";
        return new $model();
    }
    public function view($view, $data = array())
    {
        require_once "../atm/views/$view.php";
    }
}
