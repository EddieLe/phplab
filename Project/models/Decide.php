<?php
class Decide{
    function loginDecide(){
        session_start();
        if(isset($_COOKIE["userName"]) && isset($_SESSION["userName"])){
            return true;
        }else
            return false;
    }
    function loginDecideShopping(){
        session_start();
        if(isset($_COOKIE["firstName"]) && isset($_SESSION["firstName"])){
            return true;
        }else
            return false;
    }
    
    function cookieBackStageDecide()
    {
        session_start();
        if(!isset($_COOKIE["userName"])){
            return true;
        }else
            return false;
    }
    function sessionBackStageDecide()
    {
        session_start();
        if(!isset($_SESSION["userName"])){
            return true;
        }else
            return false;
    }
    function cookieDecide()
    {
        if(!isset($_COOKIE["firstName"])){
            return true;
        }else
            return false;
    }
    function sessionDecide()
    {
        unset($_SESSION["duble"]);
        session_start();
        if(!isset($_SESSION["firstName"])){
            return true;
        }else
            return false;
    }
    
    function setAuth(){
        session_start();
        setcookie("userName",$_POST["userName"]);
        $_SESSION["userName"] = $_POST["userName"];
        
    }
    function setAuthShopping(){
        session_start();
        setcookie("firstName",$_POST["firstName"]);
        $_SESSION["firstName"] = $_POST["firstName"];
    }
}
?>