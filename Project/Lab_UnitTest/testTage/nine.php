<?php
class Nine {
    function nine()
    {
        for($i = 1; $i < 10; $i++ )
        {
            for($j = 1; $j < 10; $j++)
            {
                echo $i ."*". $j ."=". $i*$j ."<br>";
            }
        }
    }
}
$a = new Nine();
//$a->nine();
?>