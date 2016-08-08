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
        $cmdSelect = "SELECT `id` FROM `activity` WHERE `id`= $active";
        
        for($i = 0; $i < count($name); $i++){
            $stmt->execute(array(':active'=>$active,
                                ':name'=>$name[$i],
                                ':number'=>$number[$i]));
        }
        $selectId = $mypdo->select($cmdSelect);
        $sid = $selectId[0]['id'];
        $url = $selectId[0]['id'].rand(1000,9999);
        
        $cmdUpdate = "UPDATE `activity` SET `url`= :url WHERE `id` = :id";
        $stmt = $pdo->prepare($cmdUpdate);
                $stmt->execute(array(':url'=>$url,
                                    ':id'=>$sid));
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
            $url = $row['url'];
        }
        $result = array('id'=>$id,
                        'title'=>$title,
                        'limit'=>$limitMax,
                        'flag'=>$flag,
                        'start'=>$start,
                        'end'=>$end,
                        'info'=>$info,
                        'count'=>$count,
                        'url'=>$url);
        return  $result;
    }
    
    function idUrl($url){
        $cmd = "SELECT * FROM  `activity` WHERE `url`=:url";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':url'=>$url));
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
            $url = $row['url'];
        }
        $result = array('id'=>$id,
                        'title'=>$title,
                        'limit'=>$limitMax,
                        'flag'=>$flag,
                        'start'=>$start,
                        'end'=>$end,
                        'info'=>$info,
                        'count'=>$count,
                        'url'=>$url);
        return  $result;
    }
    
    function insertPeople($count,$id){
        //鎖更新
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $cmd = "SELECT `count` FROM `activity` WHERE `id` = :id  FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //鎖count判斷當下有沒有足夠人數
        if( $count >= $row['count']){
            $cmd = "UPDATE `activity` SET `count`=:count WHERE `id` = :id";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute(array(':count'=>$count,
                                ':id'=>$id));
        }
                                
    }
    
}
?>