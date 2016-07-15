<?php
class Signup{
    

    function signUpBackstage()
    {
        //確保都有輸入資料
        if(isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
            //註冊帳密寫入資料庫
            require ("config.php");
            $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
            $result = mysql_query ( "set names utf8", $link );
            mysql_selectdb ( $dbname, $link );
            $cmds = "SELECT userName FROM accounts WHERE userName='$_POST[userName]'";
            $result = mysql_query ($cmds, $link);
            //判斷帳號有無重複
            if($row = mysql_fetch_assoc($result)){
                header("location: loginPage");
            }else{
                $cmd = "INSERT INTO accounts (userName, password, email, date) VALUES ('$_POST[userName]','$_POST[password]','$_POST[email]', current_timestamp())";
                mysql_query ($cmd, $link);
                mysql_close($link);
                
                //註冊成功使他保持登入狀態
                setcookie("userName", $_POST["userName"]);
                header("location: homePage");
            }
            // $cmd = "INSERT INTO accounts (userName, password, email, date) VALUES ('$_POST[userName]','$_POST[password]','$_POST[email]', current_timestamp())";
            // mysql_query ($cmd, $link);
            // mysql_close($link);
            
            // //註冊成功使他保持登入狀態
            // setcookie("userName", $_POST["userName"]);
            // header("location: homePage");
        }else
            header("location: loginPage");
    }    
    

    function signUpShopping()
    {
        
        if(isset($_POST["firstName"]) && isset($_POST["password"]) && isset($_POST["email"])){
            //註冊帳密寫入資料庫
            require ("config.php");
            $link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
            $result = mysql_query ( "set names utf8", $link );
            mysql_selectdb ( $dbname, $link );
            $cmds = "SELECT firstName FROM clients WHERE firstName='$_POST[firstName]'";
            $result = mysql_query ($cmds, $link);
            //判斷帳號有無重複
            if($row = mysql_fetch_assoc($result)){
                session_start();
                $_SESSION['duble'] = "帳號重複";
                header("location: accountPage");
            }else{

                $cmd = "INSERT INTO clients (firstName, lastName, email, mobile, sex, password, date) VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[mobile]','$_POST[sex]','$_POST[password]', current_timestamp())";
                mysql_query ($cmd, $link);
                mysql_close($link);
                //註冊成功使他保持登入狀態
                setcookie("firstName", $_POST["firstName"]);
                header("location: products");
            }

        }else
            header("location: accountPage");
    }

}

?>