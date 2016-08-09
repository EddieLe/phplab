<?php
class Practice{
    var $total = array();
    var $position = array();
    var $index = 0;
    var $origin = array(
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
    var $origin1 = array(
                        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0)
                        );
    //取得區塊各點座標 放置total array                    
    function action(){
        $index = 0;
        $max = array();
        for ($j = 0 ; $j < 10; $j++) {
            for ($i = 0 ; $i < 10; $i++) {
                if ($this->origin[$j][$i] == 1) {
                    $this->read($j, $i);
                    echo $index ."<hr>";
                    $this->total[$index] = $this->position;
                    //將為一區塊座標清空
                    $this->position = array();
                    $index++;
                }
            }    
        }
        //找出最大區塊者
        for ($i = 0 ; $i < count($this->total) ; $i++) {
            
            $max[$i] = count($this->total[$i]);
            echo count($this->total[$i]);
            echo "<hr>";
        }
        $maxPosition = max($max);
        for ($i = 0 ; $i < count($this->total) ; $i++) {
            if (count($this->total[$i]) == $maxPosition) {
                $result = $this->total[$i];
            }
        }
        // return $result;



        print_r($result[0]);
    }
    //遞迴右下左上找值
    function read($j, $i){
        
        $this->origin[$j][$i] =0;
        // $this->position = array($j,$i);
        array_push($this->position,array($j,$i));
        
        if ($this->origin[$j][$i+1] == 1) {
            $this->read($j,$i+1);
        }
        if ($this->origin[$j+1][$i] == 1) {
            $this->read($j+1,$i);
        }
        if ($this->origin[$j][$i-1] == 1) {
            $this->read($j,$i-1);
        }
        if ($this->origin[$j-1][$i] == 1) {
            $this->read($j-1,$i);
        }
        
        
    }   
    
    function drawing(){
        for ($j = 0 ; $j < 10; $j++) {
            echo "<tr>"; 
            for ($i = 0 ; $i < 10; $i++) {
                echo "<td>".$this->origin[$j][$i]."</td>";
            }
            echo "</tr>";
        }
    }
    
}
$p = new Practice();
echo ' <table width="300" border="1"> ';
$p->drawing();
echo ' </table> ';
$p->action();
?>