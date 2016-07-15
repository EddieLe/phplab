<?php
class Computting{
    function saleComputting()
    {
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmd = "SELECT price, sale FROM products";
        $result = mysql_query($cmd, $link);
        mysql_close($link);
        
        while($row = mysql_fetch_assoc($result))
        {
            $priceArray[] = $row["price"];
            $saleArray[] = $row["sale"];
        }
        $salePrice[] = array($priceArray, $saleArray);
        for($i = 0; $i < count($salePrice[0][0]); $i++)
        {
        $resultPrice[] = round($salePrice[0][0][$i] * ((100-$salePrice[0][1][$i])/100));
        }
        var_dump($resultPrice);
    }
}

?>