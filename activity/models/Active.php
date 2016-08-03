<?php
require_once "MyPDO.php";

class Active{
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
    }
    
     function search(){
        $cmd = "SELECT * FROM  `activity`";
        $mypdo = new MyPDO();
        $result = $mypdo->select($cmd);
        return  $result;
    }
    
    function idSearch($id){
        $cmd = "SELECT * FROM  `activity` WHERE `id`=:id";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $id = $row['id'];
            $title = $row['title'];
            $limitMax = $row['limitMax'];
            $flag = $row['flag'];
            $start = $row['startDate'];
            $end = $row['endDate'];
            $info = $row['info'];
            $count = $row['count'];
        }
        $result = array('id'=>$id,
                        'title'=>$title,
                        'limit'=>$limitMax,
                        'flag'=>$flag,
                        'start'=>$start,
                        'end'=>$end,
                        'info'=>$info,
                        'count'=>$count);
        return  $result;
    }
    
    function insertPeople($count,$id){
        $cmd = "UPDATE `activity` SET `count`=:count WHERE `id` = :id";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':count'=>$count,
                            ':id'=>$id));
    }
}
?>