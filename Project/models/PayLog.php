<?php
include "MyPDO.php";
class PayLog{
    function insertPayLog($id, $item, $firstName, $price, $count, $payMethod)
    {
        //寫入下單所有資訊
        $cmdUpdate = "INSERT INTO `payProducts` (item, name, price, count, payMethod, date) VALUES (:item, :firstName, 
                                                :price, :count, :payMethod , current_timestamp())";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmdUpdate);
        $stmt->execute(array(':item'=>$item,
                            ':firstName'=>$firstName,
                            ':price'=>$price,
                            ':count'=>$count,
                            ':payMethod'=>$payMethod));
        
        
        //以id username 刪除特定單筆注單
        $comDelete = "DELETE FROM `shoppingCar` WHERE `pId`= :id AND `mID` = :firstName";
        $stmt = $pdo->prepare($comDelete);
        $stmt->execute(array(':id'=>$id,':firstName'=>$firstName));
    }
}
?>