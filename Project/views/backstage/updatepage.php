<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>修改頁面</title>
</head>
<body>
	<center>
	<div>
		<br>
		<form action="update" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  

   			<input type="file" name="myfile" placeholder="上傳圖片" value=""><br>
   			<?php echo $_SESSION["error"]; ?>
   			
			<h1>修改標題</h1>
			<p></p>
			<input type="TEXT", name="item" value="">
			<h1>修改價位</h1>
			<p></p>
			<input type="TEXT", name="price" value="">
			<p></p>
			<input type="hidden" name="update" value="<?php echo $_POST["update"] ?>">
			<button>修改</button>
		</form>
		<br>
		<a href ="homePage" name="back">Back</a>
	</div>
	</center>
</body>