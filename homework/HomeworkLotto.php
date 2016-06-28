<?php
        
    for($i = 1 ; $i < 50; $i ++)
    {
        $arrayRandom[] = $i;
    }
    shuffle($arrayRandom);
    
    //print_r($arrayRandom);
      
    for($i = 0; $i < 6; $i++)
    {
        echo " $arrayRandom[$i] ,";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>樂透開獎號碼</title>
    </head>
    <body>
        
    </body>
</html>