<meta charset=utf-8>
<?php
class Upload{
    function backStageUpload()
    {
        if (file_exists("picture/" . $_FILES["myfile"]["name"]))
        {
        session_start();
        $_SESSION["error"] = "無檔案 或檔案已經存在請勿重覆上傳相同檔案，請更換新品名後上傳";
        
        header("location: uploadPage");
        }else{
        move_uploaded_file($_FILES["myfile"]["tmp_name"],"picture/".$_FILES["myfile"]["name"]);
        //取出圖片檔名
        $arrayPicture[] = $_FILES['myfile']['name'];
        
        require ("config.php");
        $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
        $result = mysql_query ( "set names utf8", $link );
        mysql_selectdb ( $dbname, $link );

        $cmd = "INSERT INTO products (item, picture, price, sale, date) VALUES ('$_POST[item]','$arrayPicture[0]','$_POST[price]','$_POST[sale]', current_timestamp())";
        mysql_query ($cmd, $link);
        mysql_close($link);
        header("location: homePage");   
        }
    }
}

?>