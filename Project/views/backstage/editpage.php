<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>新增頁面</title>
</head>
<body>
	<center>
	<div>
			
		<br>
			<?php $vauleData = $data[0]; ?>   
			<?php for($i = 0 ; $i < count($vauleData[0]) ; $i++){ ?>
			<img src=<?php echo "../".picture."/".$vauleData[1][$i]?>>
			<h3><?php echo "商品名稱 : ".$vauleData[0][$i]?></h3>
			<?php } ?>
		<form action="upload" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  

   			<input type="file" name="myfile" placeholder="上傳圖片" value=""><br>
   			
   			
   			<h3> <span style="color:red;font-weight:bold"> <?php echo $_SESSION["error"]; ?></span></h3>
			<h1>標題</h1>
			<p></p>
			<input type="TEXT", name="item" value="">
			<h1>價位</h1>
			<p></p>
			<input type="TEXT", name="price" value="">
			<p></p>
			<button>上傳</button>
		</form>
		<br>
		<a href ="homePage" name="back">Back</a>
	</div>
	</center>
</body>