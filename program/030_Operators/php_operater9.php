<?php
//$y = &$x  y為x分身使用
$x = 100;
$y = &$x;

$y = 200;
echo "x = $x </br>";

unset($x);
echo "y = $y </br>";

?>