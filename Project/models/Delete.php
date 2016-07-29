<?php
include "MyPDO.php";
class Delete{
    
    function deleteProduct($id)
    {
        //get取直刪除資料
        $cmds = "SELECT `Picture` FROM `products` WHERE `id` = :id";
        //get取直刪除DB
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmds);
        $stmt->execute(array(':id'=>$id));
        
        
        $cmd = "DELETE FROM `products` WHERE `id` = :id";
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // echo $row["picture"];
            // exit;
            unlink("picture/".$row["picture"]);//將檔案刪除
        }
        
    }
    
    function deleteShoppingCar($id)
    {
        //刪除shoppingCar id
        $cmdupdate = "DELETE FROM `shoppingCar` WHERE `sId`=:id";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmdupdate);
        $stmt->execute(array(':id'=>$id));
        
    }
    
}    

?>
