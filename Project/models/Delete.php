<?php
include "config.php";
class Delete{
    
    function deleteProduct($id)
    {
        //get取直刪除資料
        $cmds = "SELECT Picture FROM products WHERE id = $id";
        //get取直刪除DB
        $cmd = "DELETE FROM products WHERE id = $id";
        $cf = new Config();
        $result = $cf->config($cmds);
        
        while($row = mysql_fetch_assoc($result)){
            unlink("picture/".$row["Picture"]);//將檔案刪除
        }
        $result = $cf->config($cmd);
        header("location: homePage");
    }
    
    function deleteShoppingCar($id)
    {
        //刪除shoppingCar id
        $cmdupdate = "DELETE FROM shoppingCar WHERE sId=$id";
        $cf = new Config();
        $result = $cf->config($cmdupdate);
        header("location: shoppingCarPage");
    }
    
}    

?>
