<?php
    //function practice(){
        $origin = array(
                        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
                        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
                        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
                        array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
                        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
                        );
        //echo $origin[0][0];
        for($j = 0 ; $j < 10; $j++){
            for($i = 0 ; $i < 10; $i++){
                
                if($origin[$j][$i] == 1){
                    $position[] = array($j,$i);
                    
                    //$origin[$j][$i-1] ."<br>"; //左
                    
                    $origin[$j+1][$i] ."<br>"; //下
                    $origin[$j][$i+1] == 1 ."<br>"; //右
                    // $origin[$j-1][$i] ."<br>"; //上
                }
                // $a = $origin[$j+1][$i] + $origin[$j-1][$i] + $origin[$j][$i+1] + $origin[$j][$i-1];
                // $countArray[] = $a ;
                
                // echo $a;
               
            }    
        }
        var_dump($position);
        // var_dump($countArray);
        function read($num)
        {
        echo $num . "<Br>";
        if ($num>100) //設定遞迴條件
          {
           return; //結束遞迴
          }
        read($num+1); //呼叫函數自己  
        }
        //read(10);
   
?>
