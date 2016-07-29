<?php
class CookieDecide{
    
    function cookieDecide()
    {
        if(!isset($_COOKIE["firstName"])){
            header("location: loginPage");
           
        }
    }
    function sessionDecide()
    {
        session_start();
        if(!isset($_SESSION["firstName"])){
            header("location: loginPage");
        }
    }
}
?>