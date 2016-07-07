<?php

class CookieDecide{
    function  cookieDecide()
    {
        if(isset($_COOKIE["userName"]))
        {
            header("location: homepage.php");
        }
    }
    
    
}

?>