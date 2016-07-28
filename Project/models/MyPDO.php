<?php
include 'config.php';
class MyPDO{
    public $pdoConnect = NULL;
    
    function __construct() {
        //singleton 要去研究一下~~~~~
        $cf = new Config();
        //PDO 物件實作
        $pdo = new PDO("mysql:host=".$cf->getdbhost().";
                dbname=".$cf->getdbname(), $cf->getdbuser(), $cf->getdbpass(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->pdoConnect = $pdo;
        $pdo = NULL;
    }
    function closePdo(){
        $this->pdoConnect = NULL;
    }
    
}
?>