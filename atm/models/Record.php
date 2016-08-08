<?php
require_once "MyPDO.php";

class Record 
{
    public function takeMoney($total, $account)
    {
        $mypod = new MyPDO();        
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();
        //鎖定輸入
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account  FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account'=>$account));
    }
    
     public function saveMoney()
    {
        
    }
}
?>