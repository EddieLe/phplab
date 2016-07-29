<?php
include "MyPDO.php";
class Update{
    function updateBackStageProducts($item, $price, $sale, $id)
    {
        
        move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
        //取出圖片檔名
        $arrayPicture[] = $_FILES['myfile']['name'];
        $cmd = "UPDATE `products` SET `item` = :item, picture = '$arrayPicture[0]', 
                                            price = :price, sale = :sale, date = current_timestamp() WHERE `id` = :id";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':item'=>$item,
                            ':price'=>$price,
                            ':sale'=>$sale,
                            ':id'=>$id));
          
    }
}


?>