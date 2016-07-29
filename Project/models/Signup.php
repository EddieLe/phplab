<?php
include "MyPDO.php";
class Signup{
    
    function signUpBackstage($userName, $password, $email)
    {
        //註冊帳密寫入資料庫
        $cmds = "SELECT `userName` FROM `accounts` WHERE `userName` = :userName";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmds);
        $stmt->execute(array(':userName'=>$userName));
        //判斷帳號有無重複
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['duble'] = "帳號重複";
            return "duble";
        }else{
            $cmd = "INSERT INTO `accounts` (`userName`, `password`, `email`, `date`) VALUES (:userName,:password,:email, current_timestamp())";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute(array(':userName'=>$userName,
                                ':password'=>$password,
                                ':email'=>$email));
            
            //註冊成功使他保持登入狀態
            session_start();
            setcookie("userName", $_POST["userName"]);
            $_SESSION["userName"] = $_POST["userName"];
            return "success";
        }

    }    
    

    function signUpShopping($firstName,$lastName,$email,$mobile,$sex,$password)
    {
        $cmds = "SELECT `firstName` FROM `clients` WHERE `firstName` = :firstName";
        $myPdo = new MyPDO();
        $pdo = $myPdo->pdoConnect;
        $stmt = $pdo->prepare($cmds);
        $stmt->execute(array(':firstName'=>$firstName));
        
        //判斷帳號有無重複給他旗標 duble
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['duble'] = "帳號重複";
            return "duble";
            
        }else{

            $cmd = "INSERT INTO `clients` (`firstName`, `lastName`, `email`, `mobile`, `sex`, `password`, `date`) 
            VALUES (:firstName,:lastName,:email,:mobile,:sex,:password, 
            current_timestamp())";
            $stmt = $pdo->prepare($cmd);
            $stmt->execute(array(':firstName'=>$firstName,
                                ':lastName'=>$lastName,
                                ':email'=>$email,
                                ':mobile'=>$mobile,
                                ':sex'=>$sex,
                                ':password'=>$password));
            
            //註冊成功使他保持登入狀態他旗標 success
            session_start();
            setcookie("firstName", $_POST["firstName"]);
            $_SESSION["firstName"] = $_POST["firstName"];
            return "success";
            
        }

    }

}

?>