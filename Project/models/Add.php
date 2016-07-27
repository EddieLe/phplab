<?php
include "config.php";
class Add{
    function addShoppingCar($id, $firstName){
        //向checkPage要id資料找尋資料
        $cmdselect = "SELECT count FROM products where id=$id";
        $cf = new Config();
        $result = $cf->config($cmdselect);
        
        //新增購物清單
        $cmdinsert = "INSERT INTO shoppingCar (mId, pId, date) VALUES ('$firstName','$id', current_timestamp())";
        $result = $cf->config($cmdinsert);
        
    }
}
?>