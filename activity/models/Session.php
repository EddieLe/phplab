<?php 
class Session{
    function sessionError($info){
        
        if($info == "early"){
            $_SESSION['Error'] = "活動尚未開始";
        }elseif($info == "late"){
            $_SESSION['Error'] = "活動結束";
        }elseif($info == "full"){
            $_SESSION['Error'] = "人數已滿";
        }elseif($info == "has"){
            $_SESSION['Error'] = "已經報名";
        }elseif($info == "ready"){
            $_SESSION['Error'] = "報名成功";
        }elseif($info == "fail"){
            $_SESSION['Error'] = "資料錯誤";
        }           
        
    }
    function sessionErrorActive($info){
        
        if($info == "error"){
            $_SESSION['ErrorTime'] = "時間輸入有誤";
        }
    }
}
?>