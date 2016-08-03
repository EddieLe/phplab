<?php
require_once "MyPDO.php";

class Member{
    function auth(){
        $cmd = "SELECT * FROM `member`";
        $mypdo = new MyPDO();
        $result = $mypdo->select($cmd);
        return $result;
    }
    
}
?>