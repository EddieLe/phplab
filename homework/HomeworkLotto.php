<?php
function lotto()
{
    //建立1~49順序陣列
    for($i = 1 ; $i < 50; $i ++)
    {
        $arrayRandom[] = $i;
    }
    //將陣列洗牌
    shuffle($arrayRandom);
    
    //取出洗牌後前六個數組  
    for($i = 0; $i < 6; $i++)
    {
        $arrayResult[] = $arrayRandom[$i];

    }
    echo "本期壓注號碼為: ";
    foreach ($_GET as $value) {
        echo  "$value       ";
    }
    
    echo "本期中獎號碼為: ";
    foreach ($arrayResult as $value) {
        echo  "$value       ";
    }
    //將隨機產生數組 與 form 輸入數組升謐排列
    asort($arrayResult);
    asort($_GET);
   
    //比較升謐排列輸入與產生數組比對
    $result = array_diff($arrayResult,$_GET);
     "<br>" ;
    //判斷陣列是否有完全相同 得知有無中獎
    if($result){
        echo "<br> 沒中獎";
    }else
        echo "<br> 恭喜中獎";
    
}    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>樂透開獎號碼</title>
    </head>
    <body>
        <form action = "">
            <div>請輸入1~49 中任意6個數字</div>
            <input type="text" , size="5", name="one"/>
            <input type="text" , size="5", name="two"/>
            <input type="text" , size="5", name="three"/>
            <input type="text" , size="5", name="four"/>
            <input type="text" , size="5", name="five"/>
            <input type="text" , size="5", name="six"/> 
            <input type="submit" , size="15"/>
         </form>
        
         <?php lotto(); ?>
    </body>
</html>