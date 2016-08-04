<!DOCTYPE html>
<html>
	<head>
		<title>Table</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="/eddie/activity/views/Back/assets/table.css">
		<script type="text/javascript" src="/eddie/activity/views/Back/js/jquery-1.10.2.min.js"></script>
		<!-- HTML5 shim 和 Respond.js 讓IE8支援HTML5元素和媒體查詢 -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-6">
					<table class="rwd-table">
					  <tr>
					    <th>活動名稱</th>
					    <th>報名日期</th>
					    <th>攜伴選項</th>
					    <th>可報名人數</th>
					    <th>即時人數</th>
					    <th>報名網址</th>
					  </tr>
					  <?php for($i = 0; $i < count($data); $i++) {?>
					  <tr>
					    <td data-th="活動名稱"><?php echo $data[$i]['title']?></td>
					    <td data-th="報名日"><?php echo $data[$i]['startDate'] ."~". $data[$i]['endDate']?></td>
					    <td data-th="攜伴選項"><?php echo $data[$i]['flag']?></td>
					    <td data-th="可報名人數"><?php echo $data[$i]['limitMax']?></td>
					    <td class="arrival-info" data-info=<?php echo $i;?> data-th="即時人數"><?php echo $data[$i]['count']?></td>
					    <td data-th="報名網址"><a href=<?php echo "https://eddie-eddie-lee.c9users.io/eddie/activity/Active/activePage?id=".$data[$i]['id']?>><?php echo "https://eddie-eddie-lee.c9users.io/eddie/activity/Active/activePage?id=".$data[$i]['id']?></a></td>
					  </tr>
					  <?php } ?>
					</table>
				</div>
			</div>
		</div>
		<script>
			// function poll(){
			$(document).ready(function(){
				setInterval(function(){
					$.ajax({
			            url: "/eddie/activity/Home/ajax",
			            type: "GET",
			            success: function(data){
			            	data = JSON.parse(data);
			            	alert(data[0]['id']);
			            	$.each( data[0], function( Key, value ){
			            		alert(value);
			            		$('.arrival-info[data-info='+Key+']').text(value[0]);
			            	});
			            	// alert(data[1]);
			            console.log(data[0]['id']);
			            },
					})
		        },5000);
			});
		</script>
		<hr>
	</body>
	</html>