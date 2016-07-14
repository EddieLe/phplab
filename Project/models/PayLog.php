<?php
class PayLog{
    function insertPayLog()
    {

        require ("config.php");
        $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die(mysql_error ());
        $result = mysql_query ( "set names utf8", $link );
        mysql_selectdb ( $dbname, $link );
        
        $cmdUpdate = "INSERT INTO payProducts (item, name, price, count, date) VALUES ('$_POST[item]', '$_COOKIE[firstName]', '$_POST[price]', '$_POST[count]' , current_timestamp())";
        mysql_query ($cmdUpdate, $link);
        
        $comDelete = "DELETE FROM shoppingCar WHERE sId=$_POST[sId] AND mID='$_COOKIE[firstName]'";
        mysql_query ($comDelete, $link);
        mysql_close($link);
        header("location: shoppingCarPage"); 
    }
}
?>