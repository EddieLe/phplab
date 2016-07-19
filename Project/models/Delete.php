<?php
include "config.php";
class Delete{
    
    function deleteProduct()
    {
        //get取直刪除
        $cmd = "DELETE FROM products WHERE id = $_GET[id]";
        $cf = new Config();
        $result = $cf->config($cmd);
        header("location: homePage");
    }
    
    function deleteShoppingCar()
    {
        //刪除shoppingCar id
        $cmdupdate = "DELETE FROM shoppingCar WHERE sId=$_POST[sId]";
        $cf = new Config();
        $result = $cf->config($cmdupdate);
        header("location: shoppingCarPage");
    }
    
}    

?>
