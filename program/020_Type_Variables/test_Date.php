<?php

//gettyp 可找出參數型態
  $x = getdate();
  echo gettype($x), "<br>";
  
  //日期顯示
  $x = date('Y-m-d H:i:s');
  echo $x, "<br>";
  echo gettype($x), "<br>";
  
  //格林威式日期顯示
  $x = gmdate('Y-m-d H:i:s');
  echo $x, "<br>";
  
  //時間戳記 以秒鐘為單位int 形式顯示
  $x = strtotime(gmdate('Y-m-d H:i:s'));
  echo $x, "<br>";
  echo date('Y-m-d H:i:s',$x);
  echo gettype($x), "<br>";
  
?>