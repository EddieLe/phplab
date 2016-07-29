<?php
class Decide{
    function loginDecide(){
        unset($_SESSION["duble"]);
        session_start();
        if(isset($_COOKIE["userName"]) && isset($_SESSION["userName"])){
            return true;
        }else
            return false;
    }
    function loginDecideShopping(){
        unset($_SESSION["duble"]);
        session_start();
        if(isset($_COOKIE["firstName"]) && isset($_SESSION["firstName"])){
            return true;
        }else
            return false;
    }
    
    function cookieBackStageDecide()
    {
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
            // header("location: loginPage");
           
        }else
            return false;
    }
    function sessionDecide()
    {
        session_start();
        if(!isset($_SESSION["firstName"])){
            return true;
            // header("location: loginPage");
        }else
            return false;
    }
    
    function setAuth(){
        session_start();
        setcookie("firstName",$_POST["firstName"]);
        $_SESSION["firstName"] = $_POST["firstName"];
    }
}
?>