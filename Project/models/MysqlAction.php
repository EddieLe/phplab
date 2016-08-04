<?php
// include "config.php";
require_once "MyPDO.php";
//所有有關產品資料資料庫操作
class MysqlAction{

    function selectProducts(){
        $cmd = "SELECT * FROM `products`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $stmt->execute();
        
        //撈出所有商品資訊
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
    function selectProductsPage($page){
        $cmd = "SELECT * FROM `products` ORDER BY `id`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $rowCount = $stmt->rowCount();
        $stmt->execute();
        
        //找所有東西有多少
        $total = $rowCount;
        
        //撈出所有商品資訊AJAX方式
        $start = 0; //給初始值
        $end = 8; //給初始值
        $pageSize = 8; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        if(isset($page)){
            
	       $start = ($page-1)*$pageSize ;
	       $end = $page*$pageSize;
        
	    }
        $cmd = "SELECT * FROM `products` ORDER BY `id` LIMIT $start,$end";
        $stmt = $pdo->query($cmd);
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
    function selectBackStageProducts($page){
        $cmd = "SELECT * FROM `products` ORDER BY `id`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $rowCount = $stmt->rowCount();
        $stmt->execute();
        
        $total = $rowCount;
        //撈出所有商品資訊PHP方式
        $start = 0;
        $end = 3;
        $pageSize = 3; //每頁顯示數量
        $totalPage = ceil($total/$pageSize); //分幾頁
        
        //如果載入動作給他值1
        if(!isset($page)){
            $page = 1 ;
        }
        //判斷頁數的分頁數量與區間
        if($total%$pageSize != 0 && $page == $totalPage ){
	       $start = ($page-1)*$pageSize ;
	       $end = $start + ($total%$pageSize);
           $dif = $end-$start;
	    }else{
	       $start = ($page-1)*$pageSize ;
	       $end = $page*$pageSize;
	       $dif = $end-$start;
	    }
        
        $cmd = "SELECT * FROM `products` ORDER BY `id` LIMIT $start,$end";
        $stmt = $pdo->query($cmd);
        $stmt->execute();
        
        //撈出所有商品資訊
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
        $cmd = "SELECT * FROM `payProducts` WHERE `name`=:firstName ";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':firstName'=>$firstName));
        
        
        //撈出已訂購商品項目
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
        $cmd = "SELECT * FROM `products` WHERE `id`= :id ";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        
        //編輯商品放入陣列
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
        $cmd = "SELECT * FROM `products` WHERE `id`=:id ";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        
        //單資訊商品放入陣列
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
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
