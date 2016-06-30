<?php
class Logout{
    function logout()
    {
        setcookie("userName", $_POST["txtUserName"],time()-60*60*24);
    }
    
}
?>