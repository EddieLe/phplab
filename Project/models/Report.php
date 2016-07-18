<?php
class Report{

    function report(){
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        
        //搜尋已售出 以購買者分類 加總單品購買數量
        $cmd = "SELECT SUM(count) AS c, payProducts . * 
                FROM  `payProducts` 
                GROUP BY name, item";
        $result = mysql_query($cmd, $link);
        while($row = mysql_fetch_assoc($result))
        {
            $nameArray[] = $row['name'];
            $itemArray[] = $row['item'];
            $countArray[] = $row['c'];
            $priceArray[] = $row['price'];
            $dateArray[] = $row['date'];
            
        }
        $reportArray[] = array($nameArray,$itemArray,$countArray,$priceArray,$dateArray);
        
        //以購買者分類 加總單品購買數量 放入陣列
        for($i = 0; $i < count($reportArray[0][0]); $i++)
        {
            $reportSelfArray[] = array($nameArray[$i],$itemArray[$i],$countArray[$i],$priceArray[$i],$dateArray[$i]);
        }
        return $reportSelfArray;
        
    }
}    
?>