<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>上傳頁面</title>
</head>
<body>
	<center>
	<div>
		<br>
		<form action="upload" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  

   			<input type="file" name="myfile" placeholder="上傳圖片" value=""><br>

   			<h6> <span style="color:red;font-weight:bold"> <?php echo $data["error"]; ?></span></h6>
   			
			<h3>上傳標題</h3>
			<p></p>
			<input type="TEXT", name="item" value="">
			<h3>上傳價位</h3>
			<p></p>
			<input type="TEXT", name="price" value="">
			<h3>上傳折扣(%)</h3>
			<p></p>
			<input type="TEXT", name="sale" value="">
			<p></p>
			<button>上傳</button>
		</form>
		<br>
		<a href ="homePage" name="back">Back</a>
	</div>
	</center>
</body>