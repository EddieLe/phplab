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
    function action(){
        
        for($j = 0 ; $j < 10; $j++){
            for($i = 0 ; $i < 10; $i++){
                if($this->origin[$j][$i] == 1){
                    echo $j."/".$i;
                    $this->read($j, $i);
                    // $this->index ++;
                }
            }    
        }
        // var_dump($this->position);
        print_r($this->position);
    }
    
    function read($j, $i){
        
        $this->origin[$j][$i] =0;
        // $this->position = array($j,$i);
        array_push($this->position,array($j,$i));
        
        if($this->origin[$j][$i+1] == 1){
            $this->read($j,$i+1);
        }
        if($this->origin[$j+1][$i] == 1){
            $this->read($j+1,$i);
        }
        if($this->origin[$j][$i-1] == 1){
            $this->read($j,$i-1);
        }
        if($this->origin[$j-1][$i] == 1){
            $this->read($j-1,$i);
        }
    }   
    
    function drawing(){
        for($j = 0 ; $j < 10; $j++){
            echo "<tr>"; 
            for($i = 0 ; $i < 10; $i++){
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
