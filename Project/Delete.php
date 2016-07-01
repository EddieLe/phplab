<?php
    require ("config.php");
    $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error ());
    $result = mysql_query ( "set names utf8", $link );
    mysql_selectdb ( $dbname, $link );
    $cmd = "DELETE FROM products WHERE id = $_POST[delete]";
    mysql_query($cmd, $link);
    mysql_close($link);
    header("location: homepage.php");
?>
