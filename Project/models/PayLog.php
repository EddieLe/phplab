<?php
class PayLog{
    function insertPayLog()
    {
        require ("config.php");
        $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die(mysql_error ());
        $result = mysql_query ( "set names utf8", $link );
        mysql_selectdb ( $dbname, $link );
        
        echo $_POST["item"] ."<br>";
        echo $_COOKIE["firstName"]."<br>";
        echo $_POST["price"]."<br>";
        echo $_POST["count"];
        exit();
        
        $cmd = "UPDATE payProducts SET item='$_POST[item]', name='$_COOKIE[firstName]', price='$_POST[price]', count='$_POST[count]' ,date=current_timestamp() WHERE id=$_POST[update]";
        mysql_query ($cmd, $link);
        mysql_close($link);
        header("location: payPage"); 
    }
}
?>