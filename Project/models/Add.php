<?php
include "MyPDO.php";
class Add {
    function addShoppingCar($id, $firstName){

        //向checkPage要id資料找尋資料
        $cmdselect = "SELECT `count` FROM `products` WHERE `id`= :id";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmdselect);
        $stmt->execute(array(':id'=>$id));
        
        //新增購物清單
        $cmdinsert = "INSERT INTO `shoppingCar` (mId, pId, date) VALUES (:firstName,:id, current_timestamp())";
        $stmt = $pdo->prepare($cmdinsert);
        $stmt->execute(array(':id'=>$id,':firstName'=>$firstName));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>