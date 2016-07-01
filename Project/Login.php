<?php 
class Login{
    function login()
    {   
        if($_POST["userName"] != "")
        {
        setcookie("userName",$_POST["userName"]);
        }
        
    }
}

?>