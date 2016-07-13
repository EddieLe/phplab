<?php
class ShowCar{
    
    function selectProducts(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        //$cmd = "SELECT * FROM shoppingCar where mId = $_COOKIE[firstName]";
        $cmd = "SELECT shoppingCar.mId, products.* FROM shoppingCar JOIN products ON shoppingCar.pId = '' AND shoppingCar.mId = products.id";
        $result = mysql_query($cmd, $link);
        mysql_close($link);
        
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] =  $row['picture'] ;   
            $priceArray[] = $row['price'];
            $countArray[] = $row['count'];
            $idArray[] = $row['id'];
        }
        //將商品結果裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray);
        return $productsArray;
        
    }
}    
?>