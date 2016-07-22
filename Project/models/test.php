<?php
include'config.php'; 

// class Page{
//     function pageCut(){
        
        $cmd = "select * from products order by id";
        $cf = new Config();
        $result = $cf->config($cmd);
        $total = mysql_num_rows($result);
        //撈出所有商品資訊
        // $pageSize = 4; //每頁顯示數量
        // $totalPage = ceil($total/$pageSize); //分幾頁
        //$page = intval($_GET["p"]); //當前頁
        $cmd = "select * from products order by id limit 0,4";
        $result = $cf->config($cmd);
         

        while($row = mysql_fetch_assoc($result))
        {
            $itemArray[] = $row['item'];
            $pictureArray[] =  $row['picture'] ;   
            $priceArray[] = $row['price'];
            $countArray[] = $row['count'];
            $idArray[] = $row['id'];
            $dateArray[] = $row['date'];
            $saleArray[] = $row['sale'];
            $computtingArray[] = round($row['price'] * ((100-$row['sale'])/100));
            $ownerArray[] = $row['owner'];
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