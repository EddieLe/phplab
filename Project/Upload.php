<meta charset=utf-8>
<?php

if (file_exists("picture/" . $_FILES["myfile"]["name"]))
{
    $_SESSION["error"] = "檔案已經存在，請勿重覆上傳相同檔案";
    //echo $_SESSION["error"];
    header("location: editpage.php");
    //echo "檔案已經存在，請勿重覆上傳相同檔案";
}else{
    
    move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
    //取出圖片檔名
    $arrayPicture = mb_split("\.",$_FILES['myfile']['name']);
    
    require ("config.php");
    $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
    $result = mysql_query ( "set names utf8", $link );
    mysql_selectdb ( $dbname, $link );
    $cmd = "INSERT INTO products (item, picture, price, date) VALUES ('$_POST[item]','$arrayPicture[0]','$_POST[price]', current_timestamp())";
    mysql_query ($cmd, $link);
    mysql_close($link);
    header("location: homepage.php");   
}
?>