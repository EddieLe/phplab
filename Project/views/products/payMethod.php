<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>繳費方式</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<center>
	<div>
		<br>

			<img src=<?php echo "../".picture."/". $_POST["picture"];?>>

			<h3>標題 : <?php echo $_POST["item"];?></h3>
			<p></p>
			
			<h3>單品價錢 : <?php echo "$". $_POST["price"];?></h3>
			<p></p>

			<h3>數量 : <?php echo $_POST["count"];?></h3>
			<p></p>
		
			<h3>總價錢 : <?php echo "$". $_POST["count"] * $_POST["price"];?></h3>
			<p></p>

		
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
					</ul>
			    <input class="order" type="submit" value="下單"/>
		</form>
		<br>
		<a href ="shoppingCarPage" name="back">回購物車</a>
	</div>
	</center>
</body>