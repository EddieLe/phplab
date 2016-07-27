<?php
include "config.php";
class Signup{
    
    function signUpBackstage()
    {
        //確保都有輸入資料
        if(isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
            //註冊帳密寫入資料庫
            $cmds = "SELECT userName FROM accounts WHERE userName='$_POST[userName]'";
            $cf = new Config();
            $result = $cf->config($cmds);
            //判斷帳號有無重複
            if($row = mysql_fetch_assoc($result)){
                session_start();
                $_SESSION['duble'] = "帳號重複";
                header("location: loginPage#toregister");
            }else{
                $cmd = "INSERT INTO accounts (userName, password, email, date) VALUES ('$_POST[userName]','$_POST[password]','$_POST[email]', current_timestamp())";
                $result = $cf->config($cmd);
                mysql_close($link);
                
                //註冊成功使他保持登入狀態
                session_start();
                setcookie("userName", $_POST["userName"]);
                $_SESSION["userName"] = $_POST["userName"];
                header("location: homePage");
            }

        }else
            header("location: loginPage");
    }    
    

    function signUpShopping()
    {
        
        if(isset($_POST["firstName"]) && isset($_POST["password"]) && isset($_POST["email"])){
            //註冊帳密寫入資料庫
            $cmds = "SELECT firstName FROM clients WHERE firstName='$_POST[firstName]'";
            $cf = new Config();
            $result = $cf->config($cmds);
            //判斷帳號有無重複
            if($row = mysql_fetch_assoc($result)){
                session_start();
                $_SESSION['duble'] = "帳號重複";
                header("location: accountPage");
            }else{

                $cmd = "INSERT INTO clients (firstName, lastName, email, mobile, sex, password, date) 
                VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[mobile]','$_POST[sex]','$_POST[password]', 
                current_timestamp())";
                $result = $cf->config($cmd);
                mysql_close($link);
                //註冊成功使他保持登入狀態
                session_start();
                setcookie("firstName", $_POST["firstName"]);
                $_SESSION["firstName"] = $_POST["firstName"];
                header("location: products");
            }

        }else
            header("location: accountPage");
    }

}

?>