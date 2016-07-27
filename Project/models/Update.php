<?php
include "config.php";
class Update{
    function updateBackStageProducts($item, $price, $sale, $id)
    {
        move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
        //取出圖片檔名
        $arrayPicture[] = $_FILES['myfile']['name'];
        $cmd = "UPDATE products SET item='$item', picture='$arrayPicture[0]', price='$price', sale='$sale', date=current_timestamp() WHERE id=$id";
        $cf = new Config();
        $result = $cf->config($cmd);
        mysql_close($link);
        header("location: homePage");  
    }
}


?>