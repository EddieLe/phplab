<?php
//&&會判斷前一個判斷式 &會判斷兩個判斷式 function 回傳值有判定為ture否則為false
  $x = 3;
  if ($x >=10 && foo())
    echo "yes";
  else
    echo "no";
    
  echo "<hr>";

  $x = 3;
  if ($x >= 10 & foo())
    echo "yes";
  else
    echo "no";
    
function foo()
{
   echo "foo() is running.<br>";
   return;
}

?>