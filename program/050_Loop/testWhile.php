<?php
$iSum = 0;
$i = 1;
//while內若等於ture 會一直跑內部循環直到為false
while ($i <= 10)
{
	$iSum += $i;
	$i += 1;
}
echo $iSum;

echo "<hr>";

$iSum = 0;
$i = 0;
while ($i < 10)
{
	$i++;
	$iSum += $i;	
}
echo $iSum
?>