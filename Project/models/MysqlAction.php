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
        $productsArray = array('item'=>$itemArray, 
                                'picture'=>$pictureArray, 
                                'price'=>$priceArray, 
                                'count'=>$countArray, 
                                'id'=>$idArray, 'date'=>$dateArray,
                                'sale'=>$saleArray,
                                'computting'=>$computtingArray,
                                'owner'=>$ownerArray);
        return $productsArray;
        
    }
    function selectProductsPage(){
        $cmd = "SELECT * FROM products ORDER BY id";
        $cf = new Config();
        $result = $cf->config($cmd);
        //找所有東西有多少
        $total = mysql_num_rows($result);
        
        //撈出所有商品資訊AJAX方式
        $start = 0; //給初始值
        $end = 8; //給初始值
        $pageSize = 8; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        if(isset($_POST["page"])){
            
	       $start = ($_POST["page"]-1)*$pageSize ;
	       $end = $_POST["page"]*$pageSize;
        
	    }
        $cmd = "SELECT * FROM products ORDER BY id limit $start,$end";
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

        for($i = 0; $i < $pageSize; $i++){
            $productsArray[] = array('item'=>$itemArray[$i], 
                                    'picture'=>$pictureArray[$i], 
                                    'price'=>$priceArray[$i], 
                                    'count'=>$countArray[$i], 
                                    'id'=>$idArray[$i],
                                    'date'=>$dateArray[$i],
                                    'sale'=>$saleArray[$i],
                                    'computting'=>$computtingArray[$i],
                                    'owner'=>$ownerArray[$i],
                                    'total'=>$totalPage);
        }
        return $productsArray;
    }
    function selectBackStageProducts(){
        $cmd = "select * from products order by id";
        $cf = new Config();
        $result = $cf->config($cmd);
        $total = mysql_num_rows($result);
        //撈出所有商品資訊PHP方式
        $start = 0;
        $end = 3;
        $pageSize = 3; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        //如果載入動作給他值1
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
        $productsArray[] = array('item'=>$itemArray, 
                                'picture'=>$pictureArray,
                                'price'=>$priceArray, 
                                'count'=>$countArray, 
                                'id'=>$idArray,
                                'date'=>$dateArray,
                                'sale'=>$saleArray,
                                'computting'=>$computtingArray,
                                'owner'=>$ownerArray,
                                'totle'=>$totalPage,
                                'dif'=>$dif);
        return $productsArray;
        
    }
    
    function payProducts($firstName){
        $cmd = "SELECT * FROM payProducts Where name='$firstName' ";
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
        $productsArray = array('item'=>$itemArray,
                                'name'=>$nameArray,
                                'price'=>$priceArray,
                                'count'=>$countArray,
                                'id'=>$idArray,
                                'date'=>$dateArray,
                                'payMethod'=>$payMethodArray);
        return $productsArray;
        
    }
    
    function editProduct($id){
        $cmd = "SELECT * FROM products Where id=$id ";
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
        
        $productsArray = array('item'=>$itemArray,
                                'picture'=>$pictureArray,
                                'price'=>$priceArray,
                                'sale'=>$saleArray);
        return $productsArray;
    }
    
    function productInfo($id){
        $cmd = "SELECT * FROM products Where id=$id ";
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
        
        $productsArray = array('item'=>$itemArray,
                                'picture'=>$pictureArray,
                                'price'=>$priceArray,
                                'sale'=>$saleArray,
                                'totle'=>$totleArray);
        return $productsArray;
    }
    
}    
?>
