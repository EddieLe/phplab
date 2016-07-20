<!DOCTYPE html>
<html>
<head>
<title>結帳</title>
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

<!-- /start menu -->
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
			</div>
		</div>
		<div class="col-md-9 cart-items">
			<h1></h1>
				
				<div class="cart-header">
					<div> </div>
					<div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								<img src=<?php echo "../".picture."/". $_POST["picture"]?> class="img-responsive" />
							</div>
						   <div class="">
							    <h3><a href="#"><?php echo  $_POST["item"];?></a><span></span></h3>
								<ul class="qty">
									<li><p>數量: <?php echo  $_POST["count"]?></p></li>
									<li><p></p></li>
								</ul>
								<ul class="qty">
									<li><p>價位: <?php echo  $_POST["price"]?></p></li>
								</ul>
								<div class="delivery">
									 <p><?php echo "總價 : ".  $_POST["price"]*$_POST["count"]?></p>
									 <div class="clearfix"></div>
								</div>	
                			<form action="pay" method="post"> 
                				<input type="hidden" name="item"value= "<?php echo  $_POST["item"]?>"/><p></p>
                				<input type="hidden" name="picture"value= "<?php echo  $_POST["picture"]?>"/><p></p>
                			    <input type="hidden" name="price"value="<?php echo  $_POST["price"]?>"/><p></p>
                			    <input type="hidden" name="count"value="<?php echo  $_POST["count"]?>"/><p></p>
                			    <input type="hidden" name="id" value="<?php echo  $_POST["id"]?>"/>
                	    			<ul>
                						<label class="radio-inline"><input type="radio" name="payMethod" checked="" value="ATM"><i></i>ATM</label></li>
                						<label class="radio-inline"><input type="radio" name="payMethod" value="Credit Card"><i></i>Credit Card</label></li>
                						<label class="radio-inline"><input type="radio" name="payMethod" value="ibon"><i></i>ibon</label></li>
                						<label class="radio-inline"><input type="submit" value="下單"/>
                					</ul>
		                   </form>
						   </div>
						   <div class="clearfix"></div>
												
					  </div>
				 </div>
				
			</form>
			
		
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