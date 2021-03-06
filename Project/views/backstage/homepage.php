<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>BackStage</title>
	<link rel="stylesheet" href="/eddie/Project/views/backstage/cssb/style.css" type="text/css" media="all" />
</head>
<script type="text/javascript" src="jquery.min.js">

</script>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">BackStage</a></h1>
			<div id="top-navigation">
				Welcome <a href="#"><strong><?php echo $_COOKIE["userName"]?></strong></a>
				<span>|</span>
					<a href="logout">Logout</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul class="clearfix">
			    <li><a href="#toProdusts" class="active"><span>Products</span></a></li>
			    <li><a href="reportPage"><span>Report Form</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Products</a>
			<span>&gt;</span>
			商品
		</div>
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
<div id="toProdusts">
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">商品</h2>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						    
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Picture</th>
								<th>Title</th>
								<th>Date</th>
								<th>Added by</th>
								<th>Price</th>
								<th>sale</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php $vauleData = $data[0] ?>
			            	<?php for ($i = 0; $i < $vauleData['dif']; $i++) { ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><img src=<?php echo "../".picture."/".$vauleData['picture'][$i]?>></td>
								<td><h3><a href="#"><?php echo $vauleData['item'][$i] ?></a></h3></td>
								<td><?php echo $vauleData['date'][$i] ?></td>
								<td><?php echo  $vauleData['owner'][$i]?></td>
								<td><?php echo "$".$vauleData['price'][$i]?></td>
								<td><?php echo $vauleData['sale'][$i]."%"?></td>
								<td>
    						  		<a href="remove?id=<?php echo $vauleData['id'][$i] ?>" class="ico del">delete</a>
								    <a href="editPage?id=<?php echo $vauleData['id'][$i] ?>" class="ico edit">Edit</a>
								</td>
							</tr>
							<?php }?>
						</table>
						
					</div>
					<!-- Table -->
					<div class="pagging">
							<div class="left">Page</div>
							<div class="right">
								
								<?php for ($i = 1; $i <= $vauleData['totle']; $i++) { ?>
								<a href="homepage?page=<?php echo $i;?>"><?php echo $i;?></a>
								<?php }?>
							</div>
						</div>
					<div id="pagecount"></div>
					
				</div>
</div>

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
					    <!--<form action="editPage", method="get">-->
						<a href="uploadPage" class="add-button"><span>Add new Product</span></a>
						<div class="cl">&nbsp;</div>
						<!--<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>-->
						<!--<p><a href="#">Delete Selected</a></p>-->
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2010 - CompanyName</span>
		<span class="right">
			Design by <a href="#" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>