<?php
//require("config.php");
//    function authPeople()
//    {
        //收尋資料庫
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb($dbname, $link);
        $cmd = "SELECT userName, password FROM accounts";
        $result = mysql_query($cmd, $link);
        
        //找出資料庫帳密
        while ($row = mysql_fetch_assoc($result))
        {   
            $arrayUserName[] = $row["userName"]." ".$row["password"];
        }
        //判斷帳密是否一致
        if(in_array($_POST["userName"]." ".$_POST["password"], $arrayUserName))
        {
            setcookie("userName",$_POST["userName"]);
            header("location: homepage.php");
        }else
            header("location: loginpage.php");
//    }
?>