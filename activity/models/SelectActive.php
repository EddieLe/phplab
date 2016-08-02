<?php
require_once 'MyPDO.php';

class SelectActive{
    function search(){
        $cmd = "SELECT * FROM  `activity`";
        $mypdo = new MyPDO();
        $result = $mypdo->select($cmd);
        return  $result;
    }
}
?>