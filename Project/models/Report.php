<?php
include "MyPDO.php";
class Report{

    function report(){
        //搜尋已售出 以購買者分類 加總單品購買數量
        $cmd = "SELECT SUM(count) AS c, payProducts . * 
                FROM  `payProducts` 
                GROUP BY `name`, `item`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $stmt->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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