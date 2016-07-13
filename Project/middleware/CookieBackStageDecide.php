<?php 
class CookieBackStageDecide{
    
    function cookieBackStageDecide()
    {

        if(!isset($_COOKIE["userName"])){
            header("location: loginPage");
        }
    }
}

?>