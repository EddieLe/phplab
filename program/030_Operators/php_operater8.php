<?php
    //require 相當於include 但使用require 若檔案有錯誤會跳出
    echo "flag 1<br>";
    @require("MyLibrary.php");
    echo "flag 2<br>";

?>