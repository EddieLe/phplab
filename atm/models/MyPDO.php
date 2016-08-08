<?php
require_once 'config.php';

class MyPDO
{
    public $pdoConnect = null;
    function __construct() 
    {
        $cf = new Config();
        //PDO 物件實作
        try { 
            $pdo = new PDO("mysql:host=".$cf->getdbhost().";dbname=".$cf->getdbname(),
                $cf->getdbuser(), 
                $cf->getdbpass(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch(PDOException $e) { 
            echo "Connection Failed ! " . $e->getMessage();
        }
        $this->pdoConnect = $pdo;
        $pdo = null;
    }
}
    
?>