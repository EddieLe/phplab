<?php
require_once "MyPDO.php";
class Delete{
    
    function deleteProduct($id)
    {
        //get取直刪除資料
        $cmds = "SELECT `picture` FROM `products` WHERE `id` = :id";
        //get取直刪除DB
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmds);
        $stmt->execute(array(':id'=>$id));
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            unlink("picture/".$row['picture']);//將檔案刪除
        }
        
        $cmd = "DELETE FROM `products` WHERE `id` = :id";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':id'=>$id));
        $row = $stmt->fetch();
        
        
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
