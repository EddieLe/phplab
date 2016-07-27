<?php
include 'config.php';
class MyPDO{
    function __construct() {
        //singleton 要去研究一下~~~~~
        $cf = new Config();
        //PDO 物件實作
        $pdo = new PDO("mysql:host=".$cf->getdbhost().";
                dbname=".$cf->getdbname(), $cf->getdbuser(), $cf->getdbpass(),
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // var_dump($pdo);
        $cmd = "SELECT * FROM products Where id = :id";
        $rs = $pdo->query($cmd);
        $rs->execute(array(':id'=>$_POST['id']));
        // $rs-＞setFetchMode(PDO::FETCH_ASSOC);
        $result_arr = $rs->fetchAll();
        print_r($result_arr);
    }
    
}
?>