<?php

include'config.php'; 
$cmd = "select * from products order by id asc limit  
$startPage,$pageSize";

$cf = new Config();
$cf->config($cmd);

$page = intval($_POST['pageNum']); //当前页 
$result = mysql_query(); 
$total = mysql_num_rows($result);//总记录数 
$pageSize = 6; //每页显示数 
$totalPage = ceil($total/$pageSize); //总页数 
 
$startPage = $page*$pageSize; //开始记录 
//构造数组 
$arr['total'] = $total; 
$arr['pageSize'] = $pageSize; 
$arr['totalPage'] = $totalPage; 
$query = mysql_query("select id,title,pic from food order by id asc limit  
$startPage,$pageSize"); //查询分页数据 
while($row=mysql_fetch_array($query)){ 
     $arr['list'][] = array( 
         'id' => $row['id'], 
        'title' => $row['title'], 
        'pic' => $row['pic'], 
     ); 
} 
echo json_encode($arr); //输出JSON数据 

?>