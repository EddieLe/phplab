<?php
require_once 'MyPDO.php';

class NewActive{
    function create($title,$limit,$flag,$start,$end,$name,$number,$info){
        $cmd = "INSERT INTO `activity` (`title`, `limitMax`, `flag`, `startDate`, `endDate`, `date`, `info`)
                VALUES (:title,:limitMax,:flag,:startDate,:endDate ,current_timestamp(),:info)"; 
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':title'=>$title,
                            ':limitMax'=>$limit,
                            ':flag'=>$flag,
                            ':startDate'=>$start,
                            ':endDate'=>$end,
                            ':info'=>$info));
        $active = $mypdo->lastInsertId();
        
        $cmdMember = "INSERT INTO `member` (`active`, `name`, `number`, `date`)
                        VALUES (:active,:name,:number,current_timestamp())";
        $stmt = $pdo->prepare($cmdMember);
        for($i = 0; $i < count($name); $i++){
            $stmt->execute(array(':active'=>$active,
                                ':name'=>$name[$i],
                                ':number'=>$number[$i]));
        }
        // $result = $mypdo->insert($cmd);
        // return $result;
    }
}    

?>