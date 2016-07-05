<?php
require("../config.php");
    $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
    $result = mysql_query("set name utf8", $link);
    mysql_selectdb ( $dbname, $link );
    $cmd = "SELECT * FROM products";
    $result = mysql_query($cmd, $link);
    mysql_close($link);
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>


<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->
</head>
<body>
<!-- header -->
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="index.html">Lighting</a></h1>					
				</div>
			
			 <div class="cart box_1">
				 <a href="checkout.html">
					<div class="total">
					<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div>
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				</a>
				<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
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
			<a class="continue" href="product.html">Continue to basket</a>
			<div class="price-details">
				<h3>Price Details</h3>
				<span>Total</span>
				<span class="total1"></span>
				<span>Discount</span>
				<span class="total1">10%(Festival Offer)</span>
				<span>Delivery Charges</span>
				<span class="total1">150.00</span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php echo $rw["count"] * $rw["price"];?></span></li>	
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" href="#">Place Order</a>
			<div class="total-item">
				<h3>OPTIONS</h3>
				<h4>COUPONS</h4>
				<a class="cpns" href="#">Apply Coupons</a>
			</div>
		</div>
		<div class="col-md-9 cart-items">
			<h1>My Shopping Bag</h1>
			<script>
				// $(document).ready(function(c) {
				// 	$('.close1').on('click', function(c){
				// 		$('.cart-header').fadeOut('slow', function(c){
				// 			$('.cart-header').remove();
				// 		});
				// 		});	  
				// 	});
			</script>
			   
			<?php while($row = mysql_fetch_assoc($result)){ ?>
			<form action="" , method="post">
				
				<div class="cart-header">
					<div class="close1"> </div>
					<div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								<img src=<?php echo "../".picture."/".$row["picture"]?> class="img-responsive" alt=""/>
							</div>
						   <div class="cart-item-info">
							    <h3><a href="#"><?php echo $row["item"];?></a><span></span></h3>
								<ul class="qty">
									<li><p>數量: <?php echo $row["count"]?></p></li>
									<li><p></p></li>
								</ul>
								<div class="delivery">
									 <p><?php echo $row["price"]?></p>
									 <span></span>
									 <input type="hidden" name="deletecar" value="<?php echo $row["id"]?>"/>
									 <input type="submit" class="close1" value=""/>
									 <div class="clearfix"></div>
								</div>								
						   </div>
						   <div class="clearfix"></div>
												
					  </div>
				 </div>
				
			</form>
			<?php } ?>
		
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