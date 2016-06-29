<?php
function lotto()
{
    for($i = 1 ; $i < 50; $i ++)
    {
        $arrayRandom[] = $i;
    }
    shuffle($arrayRandom);
    
    //print_r($arrayRandom);
      
    for($i = 0; $i < 6; $i++)
    {
        $arrayResult[] = $arrayRandom[$i];
        echo " $arrayRandom[$i] ,";
    }
}    
lotto();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>樂透開獎號碼</title>
    </head>
    <body>
        <input type="text" , size="5", name="one"/>
        <input type="text" , size="5", name="two"/>
        <input type="text" , size="5", name="three"/>
        <input type="text" , size="5", name="four"/>
        <input type="text" , size="5", name="five"/>
        <input type="text" , size="5", name="six"/> <br>
        <input type="submit" , size="15"/>
    </body>
</html>