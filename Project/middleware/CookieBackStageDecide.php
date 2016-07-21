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

        if(!isset($_SESSION["userName"])){
            header("location: loginPage");
        }
    }
}

?>