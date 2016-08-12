<?php
require_once "myProject/MyPDO.php";

class Record
{
    public function takeMoney($total, $account, $take)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        try {

            if (!isset($account)) {
                throw new Exception("帳號不能為空");
            }
            //鎖定輸入
            $cmd = "SELECT `total` FROM `money` WHERE `account` = :account FOR UPDATE";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute([':account' => $account]);

            //取出當下total
            $row = $stmt->fetchall(PDO::FETCH_ASSOC);
            $newTotal = $row[0]['total'];

            if ($newTotal == $total) {
                $cmd = "UPDATE `money` SET `total` = `total` - :take WHERE `account` = :account";
                $stmt = $pdo->prepare($cmd);
                $stmt->execute([':take' => $take, ':account' => $account]);

                $cmd = "INSERT INTO `detail`(`take`, `total`, `account`, `result`) VALUES (:take, :total, :account, :result)";
                $stmt = $pdo->prepare($cmd);
                $stmt->execute([
                    ':take' => $take,
                    ':total' => $newTotal,
                    ':account' => $account,
                    ':result' => $newTotal - $take
                    ]);

                return true;
            }
        return false;
        } catch(Exception $e) {
            $pdo->rollback();

            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function saveMoney($total, $account, $result, $save)
    {
        $mypod = new MyPDO();
        $pdo = $mypod->pdoConnect;
        $pdo->beginTransaction();

        try {

            if (!isset($account)) {
                throw new Exception("帳號不能為空");
            }
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

            return true;
        } catch(Exception $e) {
            $pdo->rollback();

            return 'Caught exception: ' . $e->getMessage();
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
