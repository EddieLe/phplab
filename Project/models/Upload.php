<meta charset=utf-8>
<?php
require_once "MyPDO.php";
class Upload{
    function backStageUpload($item, $price, $sale, $userName)
    {
        if (file_exists("picture/" . $_FILES["myfile"]["name"]))
        {
        session_start();
        $_SESSION["error"] = "無檔案 或檔案已經存在請勿重覆上傳相同檔案，請更換新品名後上傳";
        
        return true;
        }else{
        move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
        //取出圖片檔名
        $arrayPicture[] = $_FILES['myfile']['name'];
        
        $cmd = "INSERT INTO `products` (item, picture, price, sale, owner, date) VALUES (:item,'$arrayPicture[0]',
                                                :price,:sale,:userName ,current_timestamp())";
        
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':item'=>$item,
                            ':price'=>$price,
                            ':sale'=>$sale,
                            ':userName'=>$userName));  
        }
    }
}

?>