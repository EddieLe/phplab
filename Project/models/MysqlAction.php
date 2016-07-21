<?php
include "config.php";
//所有有關產品資料資料庫操作
class MysqlAction{

    function selectProducts(){
        $cmd = "SELECT * FROM products";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //撈出所有商品資訊
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
            $ownerArray[] = $row['owner'];
        }
        //將商品結果資訊裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray,$dateArray,$saleArray,$computtingArray,$ownerArray);
        return $productsArray;
        
    }
    
    function payProducts(){
        $cmd = "SELECT * FROM payProducts Where name='$_COOKIE[firstName]' ";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //撈出已訂購商品項目
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $nameArray[] = $row['name'];
            $priceArray[] = $row['price'];
            $countArray[] = $row['count'];
            $idArray[] = $row['id'];
            $dateArray[] = $row['date'];
            $payMethodArray[] = $row['payMethod'];
        }
        //將商品結果裝置商品陣列中 為了在controller 給view使用
        $productsArray[] = array($itemArray, $nameArray, $priceArray, $countArray, $idArray,$dateArray,$payMethodArray);
        return $productsArray;
        
    }
    
    function editProduct(){
        $cmd = "SELECT * FROM products Where id=$_GET[id] ";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //編輯商品放入陣列
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
    
    function productInfo(){
        $cmd = "SELECT * FROM products Where id=$_GET[id] ";
        $cf = new Config();
        $result = $cf->config($cmd);
        //單資訊商品放入陣列
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] =  $row['picture'];
            $priceArray[] =  $row['price'];
            $saleArray[] =  $row['sale'];
            $totleArray[] = round($row['price'] * ((100-$row['sale'])/100));
        }    
        
        $productsArray[] = array($itemArray,$pictureArray,$priceArray,$saleArray,$totleArray);
        return $productsArray;
    }
    
}    
?>
