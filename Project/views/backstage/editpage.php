<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>更新頁面</title>
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
		<form action="update" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  

   			<input type="file" name="myfile" placeholder="上傳圖片" value=""><br>
   			
			<h3>更新標題</h3>
			<p></p>
			<input type="TEXT", name="item" value="">
			<h3>更新價位</h3>
			<p></p>
			<input type="TEXT", name="price" value="">
			<h3>更新折扣(%)</h3>
			<p></p>
			<input type="TEXT", name="sale" value="">
			<p></p>
			<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
			<p></p>
			<button>更新</button>
		</form>
		<br>
		<a href ="homePage" name="back">Back</a>
	</div>
	</center>
</body>