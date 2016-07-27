<?php
include "config.php";
class Auth{
    function authPeopleBackstage()
    {
        
        $cmd = "SELECT userName, password FROM accounts";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //找出資料庫帳密放入陣列
        while ($row = mysql_fetch_assoc($result))
        {   
            $arrayUserName[] = $row["userName"]." ".$row["password"];
        }
        return $arrayUserName;
        
    }
    function authPeopleShopping(){
        
        $cmd = "SELECT firstName, password FROM clients";
        $cf = new Config();
        $result = $cf->config($cmd);
        
        //找出資料庫帳密
        while ($row = mysql_fetch_assoc($result))
        {   
            $arrayUserName[] = $row["firstName"]." ".$row["password"];
        }
        return $arrayUserName;
        
    }
    
}
?>