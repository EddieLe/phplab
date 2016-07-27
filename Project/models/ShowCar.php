<?php
include "config.php";
class ShowCar{
    
    function selectProducts($firstName){

        $cmdshpooing = "SELECT mId, pId FROM shoppingCar";
        $cf = new Config();
        $result = $cf->config($cmdshpooing);

        //JOIN 商品 購物車 找出該會員加入購物車的商品與數量 加總數量
        $cmd = "SELECT COUNT( shoppingCar.sId ) AS c, shoppingCar.mId, shoppingCar.sId, products. * 
                FROM shoppingCar
                JOIN products ON shoppingCar.pId = products.id
                WHERE mId =  '$firstName'
                GROUP BY products.id";

        $result = $cf->config($cmd);
        //選擇需要資訊
        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] = $row['picture'] ;   
            $priceArray[] = $row['price'];
            $countArray[] = $row['c'];
            $idArray[] = $row['id'];
            $shoppingCarIdArray[] = $row['sId'];
            $computtingArray[] = round($row['price'] * ((100-$row['sale'])/100));
        }
        //將商品資料結果裝置商品陣列中 為了在controller 給view使用
        $productsArray = array('item'=>$itemArray,
                                'picture'=>$pictureArray,
                                'price'=>$priceArray,
                                'count'=>$countArray,
                                'id'=>$idArray,
                                'shoppingCar'=>$shoppingCarIdArray,
                                'computting'=>$computtingArray);
        return $productsArray;
        
    }
}    
?>