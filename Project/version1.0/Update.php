<?php
    move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
    //取出圖片檔名
    //$arrayPicture = mb_split("\.",$_FILES['myfile']['name']);
    $arrayPicture[] = $_FILES['myfile']['name'];
    require ("config.php");
    $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die(mysql_error ());
    $result = mysql_query ( "set names utf8", $link );
    mysql_selectdb ( $dbname, $link );
    $cmd = "UPDATE products SET item='$_POST[item]', picture='$arrayPicture[0]', price='$_POST[price]', date=current_timestamp() WHERE id=$_POST[update]";
    mysql_query ($cmd, $link);
    mysql_close($link);
    header("location: homepage.php");  

?>