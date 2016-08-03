<?php
require_once 'MyPDO.php';

class SelectActive{
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
        }
        $result = array('id'=>$id,
                        'title'=>$title,
                        'limit'=>$limitMax,
                        'flag'=>$flag,
                        'start'=>$start,
                        'end'=>$end,
                        'info'=>$info);
        return  $result;
    }
}
?>