<?php 
class Session
{
    public function sessionErrorAction($info)
    {
        if ($info == "error") {
            $_SESSION['Error'] = "餘額不足";
        }
    }
}
?>