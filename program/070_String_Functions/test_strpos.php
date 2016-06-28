<?php

$s = "ABC1234ABC";

$iPos = strpos($s, "1234");  // 3

if ($iPos !== false) {
    echo "found";
}
else {
    echo "not found";
}


?>
