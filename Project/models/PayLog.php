<?php
include "config.php";
class PayLog{
    function insertPayLog()
    {
        //寫入下單所有資訊
        $cmdUpdate = "INSERT INTO payProducts (item, name, price, count, payMethod, date) VALUES ('$_POST[item]', '$_COOKIE[firstName]', '$_POST[price]', '$_POST[count]', '$_POST[payMethod]' , current_timestamp())";
        $cf = new Config();
        $result = $cf->config($cmdUpdate);
        
        //以id username 刪除特定單筆注單
        $comDelete = "DELETE FROM shoppingCar WHERE pId=$_POST[id] AND mID='$_COOKIE[firstName]'";
        $result = $cf->config($comDelete);
        mysql_close($link);
        header("location: shoppingCarPage"); 
    }
}
?>