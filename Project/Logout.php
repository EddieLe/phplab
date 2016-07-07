<?php
class Logout{
    function logout()
    {
        setcookie("userName", $_POST["userName"],time()-60*60*24);
        header("location: loginpage.php");
    }
    function shoppingLogout()
    {
        setcookie("firstName", $_POST["firstName"],time()-60*60*24);
        header("location: products/Login.php");
    }
    
}
// $shoppingLogout = new Logout();
// $shoppingLogout->shoppingLogout();
?>