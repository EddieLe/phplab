<?php
class CookieDecide{
    
    function cookieDecide()
    {
        if(!isset($_COOKIE["firstName"])){
            header("location: loginPage");
           
        }
    }
    function sessionBackStageDecide()
    {

        if(!isset($_SESSION["firstName"])){
            header("location: loginPage");
        }
    }
}
?>