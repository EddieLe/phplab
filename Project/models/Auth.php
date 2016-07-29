<?php
require_once "MyPDO.php";
class Auth{
    function authPeopleBackstage()
    {
        $cmd = "SELECT `userName`, `password` FROM `accounts`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $stmt->execute();
        
        //找出資料庫帳密放入陣列
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {   
            $arrayUserName[] = $row["userName"]." ".$row["password"];
        }
        return $arrayUserName;
        
    }
    function authPeopleShopping()
    {
        $cmd = "SELECT `firstName`, `password` FROM `clients`";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->query($cmd);
        $stmt->execute();
        
        //找出資料庫帳密
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {   
            $arrayUserName[] = $row["firstName"]." ".$row["password"];
        }
        return $arrayUserName;
        
    }
    
}
?>