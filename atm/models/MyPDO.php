<?php

require_once 'config.php';

class MyPDO
{
    public $pdoConnect = null;

    function __construct()
    {
        $cf = new Config();
        try {
            $pdo = new PDO(
                "mysql:host=".$cf->getDbHost().";dbname=".$cf->getDbName(),
                $cf->getDbUser(),
                $cf->getDbPass(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch(PDOException $e) {
            echo "Connection Failed ! " . $e->getMessage();
        }
        $this->pdoConnect = $pdo;
        $pdo = null;
    }
}
