<?php 
class CookieBackStageDecide{
    
    function cookieBackStageDecide()
    {

        if(!isset($_COOKIE["userName"])){
            header("location: loginPage");
        }
    }
    function sessionBackStageDecide()
    {
        session_start();
        if(!isset($_SESSION["userName"])){
            header("location: loginPage");
        }
    }
}

?>