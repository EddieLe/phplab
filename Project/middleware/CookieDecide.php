<?php
class CookieDecide{
    
    function cookieDecide()
    {
        if(!isset($_COOKIE["firstName"])){
            header("location: loginPage");
           
        }
    }
    
    function cookieBackStageDecide()
    {
        if(!isset($_COOKIE["userName"])){
            //header("location: loginPage");
           
        }
    }
}
?>