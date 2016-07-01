<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>新增頁面</title>
</head>
<body>
	<center>
	<div>
			<!-- <img src="{{asset('image/0.560.jpg?v='.time())}}", alt=""> -->
			
		<br>

		<form action="Upload.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">  
			<!--<input name="_token" type="hidden" value="{{ csrf_token() }}">-->
			<!--<input name="_method" type="hidden" value="put">-->
   			<input type="file" name="myfile" placeholder="上傳圖片" value=""><br>
   			
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
		<a href ="homepage.php" name="back">Back</a>
	</div>
	</center>
</body>