<?php
include "config.php";
class Auth{
    function authPeopleBackstage()
    {
        
        $cmd = "SELECT userName, password FROM accounts";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //找出資料庫帳密放入陣列
        while ($row = mysql_fetch_assoc($result))
        {   
            $arrayUserName[] = $row["userName"]." ".$row["password"];
        }
        //判斷帳密是否一致
        if(in_array($_POST["userName"]." ".$_POST["password"], $arrayUserName))
        {
            setcookie("userName",$_POST["userName"]);
            $_SESSION['userName'] = $_POST["userName"];
            header("location: homePage");
        }else
            header("location: loginPage");
    }
    function authPeopleShopping(){
        
        //require("config.php");
        $cmd = "SELECT firstName, password FROM clients";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //找出資料庫帳密
        while ($row = mysql_fetch_assoc($result))
        {   
            $arrayUserName[] = $row["firstName"]." ".$row["password"];
        }

        //判斷帳密是否一致
        if(in_array($_POST["firstName"]." ".$_POST["password"], $arrayUserName))
        {
            setcookie("firstName",$_POST["firstName"]);
            $_SESSION["firstName"] = $_POST["firstName"];
            //重倒回ShoppingController function products
            header("location: products");
            
        }else
            //重倒回ShoppingController function loginPage
            header("location: loginPage");
    }
    
}
?>