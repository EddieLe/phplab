<?php
include "config.php";
class Update{
    function updateBackStageProducts()
    {
        move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
        //取出圖片檔名
        $arrayPicture[] = $_FILES['myfile']['name'];
        $cmd = "UPDATE products SET item='$_POST[item]', picture='$arrayPicture[0]', price='$_POST[price]', sale='$_POST[sale]', date=current_timestamp() WHERE id=$_POST[id]";
        $cf = new Config();
        $result = $cf->config($cmd);
        mysql_close($link);
        header("location: homePage");  
    }
}


?>