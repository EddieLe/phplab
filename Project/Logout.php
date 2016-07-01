<?php
class Logout{
    function logout()
    {
        setcookie("userName", $_POST["usssserName"],time()-60*60*24);
    }
    
}
?>