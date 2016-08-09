<?php
require_once "MyPDO.php";

class Pay
{
    public function takeAccount($account)
    {
        $cmd = "SELECT * FROM `money` WHERE `account` = :account";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;
        $stmt = $pdo->prepare($cmd);
        $stmt->execute(array(':account' => $account));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
