<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>產品資訊</title>
</head>
<body>
	<center>
	<div>
		<br>
			<?php $vauleData = $data[0]; ?>   
			<?php for($i = 0 ; $i < count($vauleData['item']) ; $i++){ ?>
			<img src=<?php echo "../".picture."/".$vauleData['picture'][$i]?>>

			<h3>標題 : <?php echo $vauleData['item'][$i]?></h3>
			<p></p>
			
			<h3>原價 : <?php echo "$". $vauleData['price'][$i]?></h3>
			<p></p>

			<h3>折扣 : <?php echo $vauleData['sale'][$i] ."%"?></h3>
			<p></p>
		
			<h3>折後價錢 : <?php echo "$". $vauleData['totle'][$i]?></h3>
			<p></p>
		
			<?php } ?>

		<br>
		<a href ="checkPage" name="back">Back</a>
	</div>
	</center>
</body>