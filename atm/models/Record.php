<?php

require_once "MyPDO.php";

class Record
{
    public function takeMoney($version, $account, $take)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        try {
            //使用樂觀鎖方法
            $cmd = "SELECT * FROM `money` WHERE `account` = :account";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute([':account' => $account]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $newTotal = $row['total'];

            $cmd = "UPDATE `money` SET `total` = `total` - :take, `version` = `version` + 1 WHERE `account` = :account AND `version` = :version";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute([':take' => $take, ':version' => $version, ':account' => $account]);
            if ($stmt->rowCount() ==0) {
                throw new Exception("update fail");
            }
            $cmd = "INSERT INTO `detail`(`take`, `total`, `account`, `result`) VALUES (:take, :total, :account, :result)";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute([
                ':take' => $take,
                ':total' => $newTotal,
                ':account' => $account,
                ':result' => $newTotal - $take
                ]);

            //確認執行sql
            $pdo->commit();
        } catch(Exception $e) {
            $pdo->rollback();
            echo 'Caught exception: ',  $e->getMessage();
        }
    }

    public function saveMoney($total, $account, $result, $save)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        try {
            //鎖定輸入
            $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute([':account' => $account]);

            //取出當下total
            $row = $stmt->fetchall(PDO::FETCH_ASSOC);
            $newTotal = $row[0]['total'];

            $cmd = "UPDATE `money` SET `total` = `total` + :save WHERE `account` = :account";
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
        } catch(Exception $e) {
            $pdo->rollback();
            echo 'Caught exception: ',  $e->getMessage();
        }
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
