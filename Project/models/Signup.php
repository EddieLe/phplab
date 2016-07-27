<?php
include "config.php";
class Signup{
    
    function signUpBackstage($userName, $password, $email)
    {
        //註冊帳密寫入資料庫
        $cmds = "SELECT userName FROM accounts WHERE userName='$userName'";
        $cf = new Config();
        $result = $cf->config($cmds);
        //判斷帳號有無重複
        if($row = mysql_fetch_assoc($result)){
            session_start();
            $_SESSION['duble'] = "帳號重複";
            return "duble";
        }else{
            $cmd = "INSERT INTO accounts (userName, password, email, date) VALUES ('$userName','$password','$email', current_timestamp())";
            $result = $cf->config($cmd);
            
            //註冊成功使他保持登入狀態
            session_start();
            setcookie("userName", $_POST["userName"]);
            $_SESSION["userName"] = $_POST["userName"];
            return "success";
        }

    }    
    

    function signUpShopping($firstName,$lastName,$email,$mobile,$sex,$password)
    {
        $cmds = "SELECT firstName FROM clients WHERE firstName='$firstName'";
        $cf = new Config();
        $result = $cf->config($cmds);
        //判斷帳號有無重複給他旗標 duble
        if($row = mysql_fetch_assoc($result)){
            session_start();
            $_SESSION['duble'] = "帳號重複";
            return "duble";
            
        }else{

            $cmd = "INSERT INTO clients (firstName, lastName, email, mobile, sex, password, date) 
            VALUES ('$firstName','$lastName','$email','$mobile','$sex','$password', 
            current_timestamp())";
            $result = $cf->config($cmd);
            
            //註冊成功使他保持登入狀態他旗標 success
            session_start();
            setcookie("firstName", $_POST["firstName"]);
            $_SESSION["firstName"] = $_POST["firstName"];
            return "success";
            
        }

    }

}

?>