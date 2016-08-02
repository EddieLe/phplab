<?php
require_once 'MyPDO.php';

class SelectActive{
    function search(){
        $cmd = "SELECT * FROM `activity`";
        $mypdo = new MyPDO();
        $row = $mypdo->select($cmd);
        while($row){
            $titleArray[] = $row["title"];
            $limitArray[] = $row["limitMax"];
            $flag[] = $row["flag"];
            $count[] = $row["count"];
            $start[] = $row["startDate"];
            $end[] = $row["endDate"];
            $date[] = $row["date"];
        }
        $resultArrat = array('title'=>$titleArray,
                            'limit'=>$limitArray,
                            'flag'=>$flag,
                            'count'=>$count,
                            'start'=>$start,
                            'end'=>$end,
                            'date'=>$date);
        return $resultArrat;
    }
}
?>