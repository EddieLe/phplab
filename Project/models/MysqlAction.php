<?php
class MysqlAction{
    
    function selectProducts(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmd = "SELECT * FROM products";
        $result = mysql_query($cmd, $link);
        mysql_close($link);
        
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] =  $row['picture'] ;   
            $priceArray[] = $row['price'];
            $countArray[] = $row['count'];
            $idArray[] = $row['id'];
            $dateArray[] = $row['date'];
            $saleArray[] = $row['sale'];
            $computtingArray[] = round($row['price'] * ((100-$row['sale'])/100));
        }
        //將商品結果資訊裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray,$dateArray,$saleArray,$computtingArray);
        return $productsArray;
        
    }
    
    function payProducts(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmd = "SELECT * FROM payProducts Where name='$_COOKIE[firstName]' ";
        $result = mysql_query($cmd, $link);
        mysql_close($link);
        
        //撈出已訂購商品項目
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $nameArray[] = $row['name'];
            $priceArray[] = $row['price'];
            $countArray[] = $row['count'];
            $idArray[] = $row['id'];
            $dateArray[] = $row['date'];
        }
        //將商品結果裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $nameArray, $priceArray, $countArray, $idArray,$dateArray);
        return $productsArray;
        
    }
    function editProduct(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmd = "SELECT * FROM products Where id=$_GET[id] ";
        $result = mysql_query($cmd, $link);
        mysql_close($link);

        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] =  $row['picture'];
            $priceArray[] =  $row['price'];
            $saleArray[] =  $row['sale'];
        }    
        
        $productsArray[] = array($itemArray,$pictureArray,$priceArray,$saleArray);
        return $productsArray;
    }
    
}    
?>
