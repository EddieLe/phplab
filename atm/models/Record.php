<?php
require_once "MyPDO.php";

class Record 
{
    public function takeMoney($total, $account, $after, $take)
    {
        $mypod = new MyPDO();        
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();
        //先收尋後者鎖定資料庫
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account  FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account'=>$account));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //判斷即時有沒有更動總金額
        if ($total == $row['total']) {
            $cmdup = "UPDATE `money` SET `total`=:total WHERE `account` = :account";
            $stmt = $pdo->prepare($cmdup);
            $stmt->execute(array(':total'=>$after, ':account'=>$account));
            $cmd = "INSERT INTO `detail`(`take`, `total`, `account`, `result`) VALUES (:take, :total, :account, :result)";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute(array(':take'=>$take, ':total'=>$total, ':account'=>$account, ':result'=>$after));
            //確認執行ＳＱＬ
            $pdo->commit();
        } else {
            //更新失敗回上一步
            $pdo->rollback();
        }
    } 
     public function saveMoney()
    {
        
    }
}
?>