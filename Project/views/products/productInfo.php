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
			<?php for($i = 0 ; $i < count($vauleData[0]) ; $i++){ ?>
			<img src=<?php echo "../".picture."/".$vauleData[1][$i]?>>

			<h3>標題 : <?php echo $vauleData[0][$i]?></h3>
			<p></p>
			
			<h3>原價 : <?php echo "$". $vauleData[2][$i]?></h3>
			<p></p>

			<h3>折扣 : <?php echo $vauleData[3][$i] ."%"?></h3>
			<p></p>
		
			<h3>折後價錢 : <?php echo "$". $vauleData[4][$i]?></h3>
			<p></p>
		
			<?php } ?>

		<br>
		<a href ="checkPage" name="back">Back</a>
	</div>
	</center>
</body>