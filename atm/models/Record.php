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

        $cmdup = "UPDATE `money` SET `total`= :total WHERE `account` = :account";
        $stmt = $pdo->prepare($cmdup);
        $stmt->execute(array(
            ':total' => $after,
            ':account' => $account
        ));

        $cmd = "INSERT INTO `detail`(`take`, `total`, `account`, `result`) VALUES (:take, :total, :account, :result)";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(
            ':take' => $after,
            ':total' => $total,
            ':account' => $account,
            ':result' => $after
        ));

        //將所有資料庫解鎖
        $cmd = "UNLOCK TABLES";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute();
        $pdo->commit();
    }

    public function saveMoney($account, $after)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        //鎖定輸入
        $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account' => $account));

        $cmdup = "UPDATE `money` SET `total`=:total WHERE `account` = :account";
        $stmt = $pdo->prepare($cmdup);
        $stmt->execute(array(':total' => $after, ':account' => $account));

        //確認執行sql
        $pdo->commit();
    }

    public function insertDetail($total, $account, $after, $save)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;

        $cmd = "INSERT INTO `detail`(`save`, `total`, `account`, `result`) VALUES (:save, :total, :account, :result)";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(
            ':save' => $save,
            ':total' => $total,
            ':account' => $account,
            ':result' => $after
            ));
        $lastId = $pdo->lastInsertId();

        $cmd ="SELECT `result` FROM `detail` WHERE `id` = :lastId ";
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':lastId' => $lastId));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $row['result'];

        return $total;
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
        $detailArray = array(
            'id' => $idArray,
            'take' => $takeArray,
            'save' => $saveArray,
            'total' => $totleArray,
            'result' => $resultArray
        );

        return $detailArray;
    }
}
