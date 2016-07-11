<?php
class MysqlAction{
    
    function selectProducts(){
        
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        $cmd = "SELECT * FROM products";
        $result = mysql_query($cmd, $link);
        mysql_close($link);
        return $result;
    }
}    
?>
