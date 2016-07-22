<?php
include "config.php";
class Delete{
    
    function deleteProduct()
    {
        //get取直刪除資料
        $cmds = "SELECT Picture FROM products WHERE id = $_GET[id]";
        //get取直刪除DB
        $cmd = "DELETE FROM products WHERE id = $_GET[id]";
        $cf = new Config();
        $result = $cf->config($cmds);
        
        while($row = mysql_fetch_assoc($result)){
            unlink("picture/".$row["Picture"]);//將檔案刪除
        }
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
