<?php
include "config.php";
class Report{

    function report(){
        //搜尋已售出 以購買者分類 加總單品購買數量
        $cmd = "SELECT SUM(count) AS c, payProducts . * 
                FROM  `payProducts` 
                GROUP BY name, item";
        $cf = new Config();
        $result = $cf->config($cmd);
        while($row = mysql_fetch_assoc($result))
        {
            $nameArray[] = $row['name'];
            $itemArray[] = $row['item'];
            $countArray[] = $row['c'];
            $priceArray[] = $row['price'];
            $dateArray[] = $row['date'];
            
        }
        $reportArray = array($nameArray,$itemArray,$countArray,$priceArray,$dateArray);

        //以購買者分類 加總單品購買數量 放入陣列
        for($i = 0; $i < count($reportArray[0]); $i++)
        {
            $reportSelfArray[] = array('name'=>$nameArray[$i],
                                    'item'=>$itemArray[$i],
                                    'count'=>$countArray[$i],
                                    'price'=>$priceArray[$i],
                                    'date'=>$dateArray[$i]);
        }
        return $reportSelfArray;
    }
    
}    
?>