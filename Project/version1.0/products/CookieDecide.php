<?php
class CookieDecide{
    
    function cookieDecide()
    {
        if(!isset($_COOKIE["firstName"])){
            header("location: Login.php");
        }
    } 
}
?>