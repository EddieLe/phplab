<?php

require_once "MyPDO.php";

class Record
{
    public function takeMoney($total, $account, $after, $take)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        //鎖定tables
        $cmd = "LOCK TABLES `money` WRITE, `detail` WRITE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute();

        $cmd = "UPDATE `money` SET `total`= :total WHERE `account` = :account";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([
            ':total' => $after,
            ':account' => $account
        ]);

        $cmd = "INSERT INTO `detail`(`take`, `total`, `account`, `result`) VALUES (:take, :total, :account, :result)";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([
            ':take' => $after,
            ':total' => $total,
            ':account' => $account,
            ':result' => $after
        ]);

        //將所有資料庫解鎖
        $cmd = "UNLOCK TABLES";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute();
        $pdo->commit();
    }

    public function saveMoney($total, $account, $result, $save)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        //鎖定輸入
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([':account' => $account]);

        //取出當下total
        $row = $stmt->fetchall(PDO::FETCH_ASSOC);
        $newTotal = $row[0]['total'];

        $cmd = "UPDATE `money` SET `total`= `total` + :save WHERE `account` = :account";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([':save' => $save, ':account' => $account]);

        $cmd = "INSERT INTO `detail`(`save`, `total`, `account`, `result`) VALUES (:save, :total, :account, :result)";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([
            ':save' => $save,
            ':total' => $newTotal,
            ':account' => $account,
            ':result' => $newTotal + $save
            ]);

        //確認執行sql
        $pdo->commit();
    }

    public function selectDetail($account)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $cmd = "SELECT * FROM `detail` WHERE `account` = :account";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute([':account'=>$account]);
        $row = $stmt->fetchall(PDO::FETCH_ASSOC);

        return $row;
    }
}
