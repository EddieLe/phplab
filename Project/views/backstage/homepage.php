<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>BackStage</title>
	<link rel="stylesheet" href="cssb/style.css" type="text/css" media="all" />
</head>
<script type="text/javascript" src="jquery.min.js">
$(function(){
    var $li = $('ul.clearfix li');
    
        // 進入時預設點擊第一個頁籤，除了第一個 content 其他 content 隱藏
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.content').hide();
    
        $li.click(function(){
            $($(this).find('a'). attr ('href')).show().siblings ('.content').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });
    });
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
			    <li><a href="#toProdusts" class="active"><span>Products</span></a></li>
			    <li><a href="reportPage"><span>Report Form</span></a></li>
			    <!--<li><a href="#"><span>User Management</span></a></li>-->
			    <!--<li><a href="#"><span>Photo Gallery</span></a></li>-->
			    <!--<li><a href="#"><span>Dashboard</span></a></li>-->
			    <!--<li><a href="#"><span>Services Control</span></a></li>-->
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
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Current Articles
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<!--<div class="msg msg-ok">-->
		<!--	<p><strong>Your file was uploaded succesifully!</strong></p>-->
		<!--	<a href="#" class="close">close</a>-->
		<!--</div>-->
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<!--<div class="msg msg-error">-->
		<!--	<p><strong>You must select a file to upload first!</strong></p>-->
		<!--	<a href="#" class="close">close</a>-->
		<!--</div>-->
		<!-- End Message Error -->
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
								<th>Picture</th>
								<th>Title</th>
								<th>Date</th>
								<th>Added by</th>
								<th>Price</th>
								<th>sale</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php $vauleData = $data[0] ?>
			            	<?php for ($i = 0; $i < count($vauleData[4]); $i++) { ?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><img src=<?php echo "../".picture."/".$vauleData[1][$i]?>></td>
								<td><h3><a href="#"><?php echo $vauleData[0][$i] ?></a></h3></td>
								<td><?php echo $vauleData[5][$i] ?></td>
								<td><a href="#"><?php echo $_COOKIE["userName"]?></a></td>
								<td><?php echo "$".$vauleData[2][$i]?></td>
								<td><a href="#"><?php echo $vauleData[6][$i]."%"?></a></td>
								<td>
    								<!--<form action="remove", method="post">-->
    					   <!--     	<input name="delete" type="hidden" value="<?php echo $vauleData[4][$i] ?>">-->
    					   <!--     	<button class="ico del">Delete</button>-->
    						  <!--      </form>-->
    						  		<a href="remove?id=<?php echo $vauleData[4][$i] ?>" class="ico del">delete</a>
								    <a href="editPage?id=<?php echo $vauleData[4][$i] ?>" class="ico edit">Edit</a>
								</td>
							</tr>
							<?php }?>
						</table>
						<!-- Pagging -->
						<div class="pagging">
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
								<a href="#">Previous</a>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">245</a>
								<span>...</span>
								<a href="#">Next</a>
								<a href="#">View all</a>
							</div>
						</div>
						<!-- End Pagging -->
						
					</div>
					<!-- Table -->
					
				</div>
</div>
				<!-- End Box -->
				
				<!-- Box -->
				<!--<div class="box">-->
					<!-- Box Head -->
				<!--	<div class="box-head">-->
				<!--	    	<h2>Add New Article</h2>-->
				<!--	</div>-->
					<!-- End Box Head -->
					
				<!--	<form action="" method="post">-->
						
						<!-- Form -->
				<!--		<div class="form">-->
				<!--				<p>-->
				<!--					<span class="req">max 100 symbols</span>-->
				<!--					<label>Article Title <span>(Required Field)</span></label>-->
				<!--					<input type="text" class="field size1" />-->
				<!--				</p>	-->
				<!--				<p class="inline-field">-->
				<!--					<label>Date</label>-->
				<!--					<select class="field size2">-->
				<!--						<option value="">23</option>-->
				<!--					</select>-->
				<!--					<select class="field size3">-->
				<!--						<option value="">July</option>-->
				<!--					</select>-->
				<!--					<select class="field size3">-->
				<!--						<option value="">2009</option>-->
				<!--					</select>-->
				<!--				</p>-->
								
				<!--				<p>-->
				<!--					<span class="req">max 100 symbols</span>-->
				<!--					<label>Content <span>(Required Field)</span></label>-->
				<!--					<textarea class="field size1" rows="10" cols="30"></textarea>-->
				<!--				</p>	-->
							
				<!--		</div>-->
						<!-- End Form -->
						
						<!-- Form Buttons -->
				<!--		<div class="buttons">-->
				<!--			<input type="button" class="button" value="preview" />-->
				<!--			<input type="submit" class="button" value="submit" />-->
				<!--		</div>-->
						<!-- End Form Buttons -->
				<!--	</form>-->
				<!--</div>-->
				<!-- End Box -->

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
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
						<!--<div class="sort">-->
						<!--	<label>Sort by</label>-->
						<!--	<select class="field">-->
						<!--		<option value="">Title</option>-->
						<!--	</select>-->
						<!--	<select class="field">-->
						<!--		<option value="">Date</option>-->
						<!--	</select>-->
						<!--	<select class="field">-->
						<!--		<option value="">Author</option>-->
						<!--	</select>-->
						<!--</div>-->
						<!-- End Sort -->
						
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