<?php

//mktime H,i,s,m,d,Y 給定換算秒數
  $d = mktime(13, 30, 0, 9, 10, 2012);
  echo $d;
  echo "<br>";
  echo date("Y-m-d H:i:s", $d);
?>
