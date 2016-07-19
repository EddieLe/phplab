<?php
include "config.php";
class Add{
    function addShoppingCar(){
        //向checkPage要id資料找尋資料
        $cmdselect = "SELECT count FROM products where id=$_POST[id]";
        $cf = new Config();
        $result = $cf->config($cmdselect);

        //將資料count撈出加上新輸入值
        $count = $_POST["count"] + $row["count"];
        $cmdupdate = "UPDATE products SET count='$count' Where id=$_POST[id]";
        $result = $cf->config($cmdupdate);
        //$result = mysql_query($cmdupdate, $link);
        
        //新增購物清單
        $cmdinsert = "INSERT INTO shoppingCar (mId, pId, date) VALUES ('$_COOKIE[firstName]','$_POST[id]', current_timestamp())";
        $result = $cf->config($cmdinsert);

        
        mysql_close($link);
        
        header("location: checkPage");
    }
}
?>