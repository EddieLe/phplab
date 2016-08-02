<?php
require_once 'MyPDO.php';

class NewActive{
    function create($title,$limit,$flag,$start,$end){
        $cmd = "INSERT INTO `activity` (`title`, `limitMax`, `flag`, `startDate`, `endDate`, `date`)
                VALUES (:title,:limitMax,:flag,:startDate,:endDate ,current_timestamp())"; 
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        // var_dump($stmt);
        // exit;
        $stmt->execute(array(':title'=>$title,
                            ':limitMax'=>$limit,
                            ':flag'=>$flag,
                            ':startDate'=>$start,
                            ':endDate'=>$end));
        // $result = $mypdo->insert($cmd);
        // return $result;
    }
}    

?>