<?php
require_once "MyPDO.php";

class Member{
    function auth($name,$number,$id){
        $cmd = "SELECT * FROM `member` WHERE `active`=:active AND `name`=:name AND `number`=:number";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':active'=>$id,
                             ':name'=>$name,
                             ':number'=>$number));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function insertFlag($id,$name,$number,$flag){
        
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $cmd = "UPDATE `member` SET `flag`=:flag WHERE `active`=:active AND `name`=:name AND `number`=:number";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':active'=>$id,
                             ':name'=>$name,
                             ':number'=>$number,
                             ':flag'=>$flag));
    }
}
?>