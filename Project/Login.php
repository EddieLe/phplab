<?php 
class Login{
    function login()
    {   
        if($_POST["txtUserName"] != "")
        {
        setcookie("userName",$_POST["txtUserName"]);
        }
        
    }
}

?>