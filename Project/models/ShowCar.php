<?php
class ShowCar{
    
    function selectProducts(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmdshpooing = "SELECT mId, pId FROM shoppingCar";
        $result = mysql_query($cmdshpooing, $link);

        //DISTINCT
        //JOIN找出該會員的商品與數量

        $cmd = "SELECT COUNT( shoppingCar.sId ) AS c, shoppingCar.mId, shoppingCar.sId, products. * 
                FROM shoppingCar
                JOIN products ON shoppingCar.pId = products.id
                WHERE mId =  '$_COOKIE[firstName]'
                GROUP BY products.id";
        
        $result = mysql_query($cmd, $link);
        
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] = $row['picture'] ;   
            $priceArray[] = $row['price'];
            //$countArray[] = $row['count'];
            //$countArray[] = $count[$row['item']];
            $countArray[] = $row['c'];
            $idArray[] = $row['id'];
            $shoppingCarIdArray[] = $row['sId'];
        }
        //將商品結果裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray,$shoppingCarIdArray);
        return $productsArray;
        
    }
}    
?>