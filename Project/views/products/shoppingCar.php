<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link href="/eddie/Project/views/products/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<!--theme style-->
<link href="/eddie/Project/views/products/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>


<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="/eddie/Project/views/products/js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="/eddie/Project/views/products/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->

<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<!-- header -->
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="products">Eddie Home</a></h1>					
				</div>
			
			 <div class="cart box_1">
				 <a href="payPage">
					<!--<div class="total">-->
					<span>歡迎:<?php echo $_COOKIE['firstName']?></span></div>
				</a>
			 	<div class="clearfix"> </div>
			 </div>
			 <div class="clearfix"> </div>
			 <!---->			 
			 </div>
			<div class="clearfix"> </div>
</div>
<!-- check out -->
<div class="container">
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="checkPage">回購物頁</a>
			<div class="price-details">

				<?php $vauleData = $data; ?> 
				<?php for($i = 0 ; $i < count($vauleData['id']) ; $i++){ ?>
				<?php $priceSale += (($vauleData['count'][$i] * $vauleData['price'][$i])-($vauleData['count'][$i] * $vauleData['computting'][$i])); ?>
				<?php $beforeSale += $vauleData['count'][$i] * $vauleData['price'][$i]; ?>
				<?php $afterSale += $vauleData['count'][$i] * $vauleData['computting'][$i]; ?>
				<?php }?>
				<h3>Price Details</h3>
				<span>折扣前金額</span>
				<span class="total1"></span>
				<span><?php echo "$". $beforeSale?> </span>
				<span>折扣後金額</span>
				<span class="total1"></span>
				<span><?php  echo "$". $afterSale?></span>
				<span class="total1"></span>
				<span>現折</span>
				<span style=color:red><?php echo "$". $priceSale?></span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   <li class="last_price"> <span style="color:blue;"><h4><?php echo $_COOKIE['firstName'] ."購物車";?></h4></span></li>	
			   <li class="last_price"><span></span></li>	
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" href="products">回商品頁</a>
			<div class="total-item">
				<h3></h3>
				<h4></h4>
				<!--<a class="cpns" href="#">Apply Coupons</a>-->
			</div>
		</div>
		<div class="col-md-9 cart-items">
			<h1>My Shopping Bag</h1>
			  				
			<?php for($i = 0 ; $i < count($vauleData['id']) ; $i++){ ?>
			<form action="removeCar" , method="post">
				
				<div class="cart-header">
					<div class="close1"> </div>
					<div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								<img src=<?php echo "../".picture."/".$vauleData['picture'][$i]?> class="img-responsive" alt=""/>
							</div>
						   <div class="cart-item-info">
							    <h3><a href="#"><?php echo $vauleData['item'][$i];?></a><span></span></h3>
								<ul class="qty">
									<li><p>數量: <?php echo $vauleData['count'][$i]?></p></li>
									<li><p></p></li>
								</ul>
								<div class="delivery">
									 <p><?php echo "價位 : ". $vauleData['computting'][$i]?></p>
									 <span></span>
									 	<input type="hidden" name="sId" value="<?php echo $vauleData['shoppingCar'][$i]?>"/>
									 	<input type="submit" class="close1" value=""/>
									 	
									 <div class="clearfix"></div>
								</div>								
						   </div>
						   <div class="clearfix"></div>
												
					  </div>
				 </div>
				
			</form>
			<!--計算總金額-->
			<?php $allPrice += ($vauleData['count'][$i] * $vauleData['computting'][$i]);?>
			<?php } ?>

			<ul align = "center" class="">
			<!--下單所需要資訊-->
			<div class="table-responsive">
			   <table class="table">
			      <caption>下單列表</caption>
			      <thead>
			         <tr>
			            <th>產品</th>
			            <th>金額</th>
			            <th>數量</th>
			            <th>狀態</th>
			         </tr>
			      </thead>
			      <tbody>
			    	<?php for($i = 0 ; $i < count($vauleData['id']) ; $i++){ ?>
					<form action="payMethod" method="post">
			         <tr>
			            <td><?php echo $vauleData['item'][$i]?></td>
			            <td>$<?php echo $vauleData['computting'][$i]?></td>
			            <td><?php echo $vauleData['count'][$i]?></td>
			            <td><input type="hidden" name="item"value= "<?php echo $vauleData['item'][$i]?>"/><p></p>
							<input type="hidden" name="picture"value= "<?php echo $vauleData['picture'][$i]?>"/><p></p>
					    	<input type="hidden" name="price"value="<?php echo $vauleData['computting'][$i]?>"/><p></p>
					   	 	<input type="hidden" name="count"value="<?php echo $vauleData['count'][$i]?>"/><p></p>
					    	<input type="hidden" name="id" value="<?php echo $vauleData['id'][$i]?>"/>
			            	<input class="order" type="submit" value="下單"/>
			            </td>
			         </tr>
			         </form>
			        <?php }?>
			      </tbody>
			   </table>
			</div>  	

		    <br>
			   <span style=color:red><h3><?php echo'TOTAL 總金額 : ' . $allPrice;?></h3></span> 
			   <br>
			   <a href=payPage>結帳頁面</a>
			</ul>
			</div>	
			
		
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->
<!---->
<div class="subscribe">
	 <div class="container">
		 <h3>Newsletter</h3>
		 <form>
			 <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
			 <input type="submit" value="Subscribe">
		 </form>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-3 about-us">
				 <h3>About Us</h3>
				 <p>Maecenas nec auctor sem. Vivamus porttitor tincidunt elementum nisi a, euismod rhoncus urna. Curabitur scelerisque vulputate arcu eu pulvinar. Fusce vel neque diam</p>
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Information</h3>
					<ul class="nav-bottom">
						<li><a href="#">Track Order</a></li>
						<li><a href="#">New Products</a></li>
						<li><a href="#">Location</a></li>
						<li><a href="#">Our Stores</a></li>
						<li><a href="#">Best Sellers</a></li>	
					</ul>					
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>More Info</h3>
					<ul class="nav-bottom">
						<li><a href="login.html">Login</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Membership</a></li>	
					</ul>					
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Categories</h3>
					<ul class="nav-bottom">
						<li><a href="#">Car Lights</a></li>
						<li><a href="#">LED Lights</a></li>
						<li><a href="#">Decorates</a></li>
						<li><a href="#">Wall Lights</a></li>
						<li><a href="#">Protectors</a></li>	
					</ul>					
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="copywrite">
	 <div class="container">
		 <div class="copy">
			 <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
		 </div>
		 <div class="social">							
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>	
				<a href="#"><i class="google"></i></a>	
				<a href="#"><i class="youtube"></i></a>	
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
</body>
</html>