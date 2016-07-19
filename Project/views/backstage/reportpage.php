<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>BackStage</title>
	<link rel="stylesheet" href="cssb/style.css" type="text/css" media="all" />
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
				<a href="#">Help</a>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
					<a href="logout">Logout</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul class="clearfix">
			    <li><a href="homepage"><span>Products</span></a></li>
			    <li><a href="#" class="active"><span>Report Form</span></a></li>
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
			<a href="#">Report Form</a>
			<span>&gt;</span>
			Current Articles
		</div>
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Current Articles</h2>
						<div class="right">
							<label>search articles</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						    
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Buyer</th>
								<th>Itme</th>
								<th>Price</th>
								<th>Total</th>
								<th>Total Price</th>
								<th>Date</th>
								<!--<th width="110" class="ac">Content Control</th>-->
							</tr>
							<!--<?php $vauleData = $data[0] ?>-->
			            	<?php for ($i = 0; $i < count($data); $i++) { ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><?php echo $data[$i][0]?></td>
								<td><h3><a href="#"><?php echo $data[$i][1] ?></a></h3></td>
								<td><?php echo "$".$data[$i][3] ?></td>
								<td><a href="#"><?php echo $data[$i][2]?></a></td>
								<td><?php echo "$".$data[$i][2] * $data[$i][3]?></td>
								<td><?php echo $data[$i][4]?></td>
								<td>
								</td>
							</tr>
							<?php }?>
						</table>
						<!-- Pagging -->
						<!--<div class="pagging">-->
						<!--	<div class="left">Showing 1-12 of 44</div>-->
						<!--	<div class="right">-->
						<!--		<a href="#">Previous</a>-->
						<!--		<a href="#">1</a>-->
						<!--		<a href="#">2</a>-->
						<!--		<a href="#">3</a>-->
						<!--		<a href="#">4</a>-->
						<!--		<a href="#">245</a>-->
						<!--		<span>...</span>-->
						<!--		<a href="#">Next</a>-->
						<!--		<a href="#">View all</a>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
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