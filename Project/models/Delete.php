<?php
class Delete{
    
    function deleteProduct()
    {
        require ("config.php");
        $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error ());
        $result = mysql_query ( "set names utf8", $link );
        mysql_selectdb ( $dbname, $link );
        $cmd = "DELETE FROM products WHERE id = $_POST[delete]";
        mysql_query($cmd, $link);
        mysql_close($link);
        header("location: homePage");
    }
    
    function deleteShoppingCar()
    {
    
        require ("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        
        //由ID取count值
        // $cmdselect = "SELECT count FROM products where id='$_POST[id]'";
        // $result = mysql_query($cmdselect, $link);
        // $row = mysql_fetch_assoc($result);
        
        // //取出值減一放回資料庫
        // $count = $row['count'];
        // $count --;
        // if($count < 0){
        //     $count = 0;
        // }
    
        // $cmdupdate = "UPDATE products SET count='$count' Where id=$_POST[id]";
        // mysql_query($cmdupdate, $link);
        // mysql_close($link);
        // header("location: shoppingCarPage");
        
        // $cmdselect = "SELECT sId FROM shoppingCar where id='$_POST[sId]'";
        // mysql_query($cmd, $link);
        // mysql_close($link);
        
        
        //刪除shoppingCar id
        $cmdupdate = "DELETE FROM shoppingCar WHERE sId=$_POST[sId]";
        mysql_query($cmdupdate, $link);
        mysql_close($link);
        header("location: shoppingCarPage");
    }
    
}    

?>
