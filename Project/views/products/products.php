<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<style type="text/css">
	
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/docs.min.css" rel="stylesheet">
<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>

<!--//theme style-->
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
<!--header-->	
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: false,
      });
    });
  </script>
  
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="#">Eddie Home</a></h1>					
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
			<div class="subscribe">
				<form action="checkPage" method="post">
					<input type="submit" value="購物頁面">
				</form>
				<form action="shoppingCarPage" method="post">
					<input type="submit" value="購物車">
				</form>
				<form action="payPage" method="post">
					<input type="submit" value="下單資訊">
				</form>
				<form action="logout" method="post">
					<input type="submit" value="Logout">
				</form>
			</div>

<!---->	
<div class="slider">
	  <div class="callbacks_container">
	     <ul class="rslides" id="slider">
	         <li>
				 <div class="banner1">				  
					  <div class="banner-info">
					  <h3>Morbi lacus hendrerit efficitur.</h3>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
					  </div>
				 </div>
	         </li>
	         <li>
				 <div class="banner2">
					 <div class="banner-info">
					 <h3>Phasellus elementum tincidunt.</h3>
					 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
					 </div>
				 </div>
			 </li>
	         <li>
	             <div class="banner3">
	        	 <div class="banner-info">
	        	 <h3>Maecenas interposuere volutpat.</h3>
	          	 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
				 </div>
				 </div>
	         </li>
	      </ul>
	  </div>
  </div>
<!---->
<script src="js/bootstrap.js"> </script>

<div class="items">
	 <div class="container">
	 	
	 	 <!--將三維陣列轉為二維陣列-->
	     <?php $viewData = $data[0]; ?>
	     <!--取id欄位數量做for迴圈-->
	 <!--    <?php for($i = 0; $i < count($viewData[4]); $i++):?>-->
	    
		<!-- <div class="items-sec">-->
		<!--	 <div class="col-md-3 feature-grid">-->
			     
		<!--			 <div class="arrival-info" data-info=<?php echo $i;?>>-->
		<!--				 <h4>商品名稱 : <span class="itemName"><?php echo $viewData[0][$i]?></span></h4>-->
		<!--				 <p><img class="imgSrc" src=<?php echo "../picture/".$viewData[1][$i]?>></p>-->
		<!--				 <p>價位 : <span class="price"><?php echo $viewData[7][$i]?></span></p>-->
		<!--				 <span class="pric1"><del><?php echo $viewData[2][$i]?></del></span>-->
		<!--				 <span class="disc">[<?php echo $viewData[6][$i]?>% Off]</span>-->
		<!--			 </div>-->
		<!--			 <div class="viw">-->
		<!--				<a href="checkPage"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>-->
		<!--			 </div>-->
		<!--		  </a>-->
				  
		<!--	 </div>-->
		<!--<?php endfor;?>-->
		<!--	 <div class="clearfix"></div>-->
		<!--	 <div class="test" style="text-align: center;">-->
		<!--	 	<?php for($i = 1; $i <= $viewData[9]; $i++){ ?>-->
		<!--		<a href="javascript: void(0);" class="ajax" data-value="<?php echo $i;?>"><?php echo $i;?></a>-->
		<!--		<?php } ?>-->
		 <?php for($i = 0; $i < count($data); $i++):?>
	    
		 <div class="items-sec">
			 <div class="col-md-3 feature-grid">
			     
					 <div class="arrival-info" data-info=<?php echo $i;?>>
						 <h4>商品名稱 : <span class="itemName"><?php echo $data[$i][0]?></span></h4>
						 <p><img class="imgSrc" src=<?php echo "../picture/".$data[$i][1]?>></p>
						 <p>價位 : <span class="price"><?php echo $data[$i][7]?></span></p>
						 <span class="pric1"><del><?php echo $data[$i][2]?></del></span>
						 <span class="disc">[<?php echo $data[$i][6]?>% Off]</span>
					 </div>
					 <div class="viw">
						<a href="checkPage"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>
					 </div>
				  </a>
				  
			 </div>
		<?php endfor;?>
			 <div class="clearfix"></div>
			 <div class="test" style="text-align: center;">
			 	<?php for($i = 1; $i <= $viewData[9]; $i++){ ?>
				<a href="javascript: void(0);" class="ajax" data-value="<?php echo $i;?>"><?php echo $i;?></a>
				<?php } ?>
			</div>
		 </div>
	 </div>
</div>
<script>
	$('.ajax').click(function() {
		var page = $(this).attr('data-value');
		$.ajax({
			data: {"page" : page},
			type: "POST",
			url: "products",
			success: function(res) {
				var res = JSON.parse(res);
				//debug
				// console.log(res);
				$.each( res, function( subKey, value ) {
					console.log(value);
						//假如陣列為null移除div
						if(value[0]==null){
							alert(0);
							$(".arrival-info[data-info="+subKey+"]").hide();
						}
						//itemName
						$('.arrival-info[data-info='+subKey+'] .itemName').text(value[0]);
						//img
						$('.arrival-info[data-info='+subKey+'] .imgSrc').attr('src', "../picture/"+value[1]);
						//price
						$('.arrival-info[data-info='+subKey+'] .price').text(value[7]);
						//pric1
						$('.arrival-info[data-info='+subKey+'] .pric1').html("<del>"+value[2]+"</del>");
						//disc
						$('.arrival-info[data-info='+subKey+'] .disc').html("["+value[6]+"% Off]");
				});
			}
		});
	});
	
</script>
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
