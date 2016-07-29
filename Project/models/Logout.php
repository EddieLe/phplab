<?php
class Logout{
    function backStageLogout()
    {
        session_start();
        setcookie("userName", $_POST["userName"],time()-60*60*24);
        unset($_SESSION["userName"]);
        
    }
    function shoppingLogout()
    {
        session_start();
        setcookie("firstName", $_POST["firstName"],time()-60*60*24);
        unset($_SESSION["firstName"]);
        
    }
    
}

?>