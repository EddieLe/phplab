<?php

//php 微弱型別不需宣告int or string 但在使用上 . 會將兩數結合 若是用 + 號會將數字部分相加
//例如 $a = 1A $b = "34" $result = $a + $b; 會省去A $result = 35 $a = A1 $result = 34
$a = 12;
$b = "34";

$result = $a + $b; // 46
// $result = $a . $b; // 1234
// $result = $a + intval($b);  // 46

echo $result;

?>