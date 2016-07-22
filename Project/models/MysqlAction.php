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
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray,$dateArray,$saleArray,$computtingArray,$ownerArray,$totalPage);
        return $productsArray;
        
    }
    function selectProductsPage(){
        $cmd = "select * from products order by id";
        $cf = new Config();
        $result = $cf->config($cmd);
        $total = mysql_num_rows($result);
        //撈出所有商品資訊
        $start = 0;
        $end = 8;
        $pageSize = 8; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        if(isset($_POST["page"])){
            
	       $start = ($_POST["page"]-1)*$pageSize ;
	       $end = $_POST["page"]*$pageSize;
        
	    }
        $cmd = "select * from products order by id limit $start,$end";
        $result = $cf->config($cmd);
        
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
        $remainder = $total%$pageSize;
        if($_POST["page"] == $totalPage){
            for($i = 0; $i < $remainder; $i++){
                $productsArray[] = array($itemArray[$i], $pictureArray[$i], $priceArray[$i], $countArray[$i], $idArray[$i],$dateArray[$i],$saleArray[$i],$computtingArray[$i],$ownerArray[$i],$totalPage);
            }
        }else{    
            for($i = 0; $i < $pageSize; $i++){
                $productsArray[] = array($itemArray[$i], $pictureArray[$i], $priceArray[$i], $countArray[$i], $idArray[$i],$dateArray[$i],$saleArray[$i],$computtingArray[$i],$ownerArray[$i],$totalPage);
            }
        }
        return $productsArray;
     
    }
    function selectBackStageProducts(){
        $cmd = "select * from products order by id";
        $cf = new Config();
        $result = $cf->config($cmd);
        $total = mysql_num_rows($result);
        //撈出所有商品資訊
        $start = 0;
        $end = 3;
        $pageSize = 3; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        //如果載入動作給他值
        if(!isset($_GET["page"])){
            $_GET["page"] = 1 ;
        }
        //判斷頁數的分頁數量與區間
        if($total%$pageSize != 0 && $_GET["page"] == $totalPage ){
	       $start = ($_GET["page"]-1)*$pageSize ;
	       $end = $start + ($total%$pageSize);
           $dif = $end-$start;
	    }else{
	       $start = ($_GET["page"]-1)*$pageSize ;
	       $end = $_GET["page"]*$pageSize;
	       $dif = $end-$start;
	    }
        
        $cmd = "select * from products order by id limit $start,$end";
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
        $productsArray[] = array($itemArray, $pictureArray, $priceArray, $countArray, $idArray,$dateArray,$saleArray,$computtingArray,$ownerArray,$totalPage,$dif);
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
