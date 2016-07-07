<?php
class Delete{
    
    // function deleteProduct()
    // {
    //     require ("config.php");
    //     $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error ());
    //     $result = mysql_query ( "set names utf8", $link );
    //     mysql_selectdb ( $dbname, $link );
    //     $cmd = "DELETE FROM products WHERE id = $_POST[delete]";
    //     mysql_query($cmd, $link);
    //     mysql_close($link);
    //     header("location: homepage.php");
    // }
    
    function deleteCar()
    {
    
        require ("config.php");
        $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
        $result = mysql_query("set name utf8", $link);
        mysql_selectdb ( $dbname, $link );
        
        $cmdselect = "SELECT count FROM products where id='$_POST[id]'";
        $result = mysql_query($cmdselect, $link);
        $row = mysql_fetch_assoc($result);
        
        $count -=$row['id'];
    
        $cmdupdate = "UPDATE products SET count='$count' Where id=$_POST[id]";
        mysql_query($cmdupdate, $link);
        mysql_close($link);
        //header("location: homepage.php");
    }
    
}    

    $d = new Delete();
    $d->deleteCar();
?>
