<?php
class Add{
    function addShoppingCar(){
        require("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        
        //向checkPage要id資料找尋資料
        $cmdselect = "SELECT count FROM products where id=$_POST[id]";
        $result = mysql_query($cmdselect, $link);
        $row = mysql_fetch_assoc($result);
        
        
        //將資料count撈出加上新輸入值
        $count = $_POST["count"] + $row["count"];
        $cmdupdate = "UPDATE products SET count='$count' Where id=$_POST[id]";
        $result = mysql_query($cmdupdate, $link);
        mysql_close($link);
        
        header("location: checkPage");
    }
}
?>