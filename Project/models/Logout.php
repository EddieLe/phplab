<?php
class Logout{
    function backStageLogout()
    {
        setcookie("userName", $_POST["userName"],time()-60*60*24);
        unset($_SESSION["userName"]);
        header("location: loginPage");
    }
    function shoppingLogout()
    {
        setcookie("firstName", $_POST["firstName"],time()-60*60*24);
        unset($_SESSION["firstName"]);
        header("location: loginPage");
    }
    
}

?>