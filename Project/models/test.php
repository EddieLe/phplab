<?php
echo 123;
include'config.php'; 

// class Page{
//     function pageCut(){

        
        $cmd = "select * from products order by id asc limit  
        $_GET[p]*$pageSize,$pageSize";
        
        $page = intval($_GET["p"]); //當前頁
        $cf = new Config();
        $result = $cf->config($cmd);
        $total = mysql_num_rows($result);
        $pageSize = 4; //每頁顯示數量 
        
        if(!isset($_GET["p"])){
            
        }
        
        
        $totalPage = ceil($total/$pageSize); //分幾頁
        

        while($row = mysql_fetch_array($result)){ 
             $arr[] = array( 
                'id' => $row['id'], 
                'title' => $row['title'], 
                'pic' => $row['price'], 
             ); 
        } 
        return $arr;
        //echo json_encode($arr); //输出JSON 
//     }
// }
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <?php for ($i=0;$i<$totalpages;$i++) {?>
        <?php $arr[0][$i] ."<br>"?>
        <?php $arr[1][$i] ."<br>"?>
        <?php $arr[2][$i] ."<br>"?>
        <a href=test.php?p=<? echo $i ?>>第<?php echo $i+1 ?>頁</a>
        <?php } ?>
    </body>
</html>