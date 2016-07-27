<?php
include "config.php";
class PayLog{
    function insertPayLog($id, $item, $firstName, $price, $count, $payMethod)
    {
        //寫入下單所有資訊
        $cmdUpdate = "INSERT INTO payProducts (item, name, price, count, payMethod, date) VALUES ('$item', '$firstName', 
                                                '$price', '$count', '$payMethod' , current_timestamp())";
        $cf = new Config();
        $result = $cf->config($cmdUpdate);
        
        //以id username 刪除特定單筆注單
        $comDelete = "DELETE FROM shoppingCar WHERE pId=$id AND mID='$firstName'";
        $result = $cf->config($comDelete);
        mysql_close($link);
        header("location: shoppingCarPage"); 
    }
}
?>