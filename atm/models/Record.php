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
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
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
            //確認Sql
            $pdo->commit();
        } else {
            //更新失敗回上一步
            $pdo->rollback();
        }
    }

    public function saveMoney($total, $account, $after, $save)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        //鎖定輸入
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account'=>$account));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //判斷即時有沒有更動總金額
        if ($total == $row['total']) {
            $cmdup = "UPDATE `money` SET `total`=:total WHERE `account` = :account";
            $stmt = $pdo->prepare($cmdup);
            $stmt->execute(array(':total'=>$after, ':account'=>$account));

            $cmd = "INSERT INTO `detail`(`save`, `total`, `account`, `result`) VALUES (:save, :total, :account, :result)";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute(array(':save'=>$save, ':total'=>$total, ':account'=>$account, ':result'=>$after));

            //確認執行sql
            $pdo->commit();
        } else {
            //更新失敗回上一步
            $pdo->rollback();
        }
    }

    public function selectDetail($account)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $cmd = "SELECT * FROM `detail` WHERE `account` = :account";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account'=>$account));

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idArray[] = $row['id'];
            $takeArray[] = $row['take'];
            $saveArray[] = $row['save'];
            $totleArray[] = $row['total'];
            $resultArray[] = $row['result'];
        }
        $detailArray = array('id'=>$idArray, 'take'=>$takeArray, 'save'=>$saveArray, 'total'=>$totleArray, 'result'=>$resultArray);
        return $detailArray;
    }
}
