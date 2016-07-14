<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>下單頁面</title>
</head>
	<body>
		 
		
		<table width="600px" align="center" border="1" bgcolor="#E6E6F2">
				<tr>
				    <th>下單者</th>
					
					<th>Item</th>
					<th>Price</th>
					<th colspan="2">數量</th>
						
				</tr>
				<?php $vauleData = $data[0] ?>
				<?php for ($i = 0; $i < count($vauleData[4]); $i++) { ?>
				<tr>
                  	
                    <td><?php echo $_COOKIE["firstName"] ?></td>
					<!--<td><img src=<?php echo "../".picture."/".$vauleData[1][$i]?>></td>-->
					<td><?php echo $vauleData[0][$i] ?></td>
					<td>＄<?php echo $vauleData[2][$i] ?></td>
					<td><?php echo $vauleData[3][$i] ?></td>
					<td></td>
					
				</tr>
				<?php }?>

		</table>	

				<div style="text-align: center;">	
				    <br>
				    <form method="post" action=logout>
						<input type="submit" name="logout" id="btnHome" value="登出" />
					</form>
					<br>
					<a href=shoppingCarPage>回購物車</a>
				</div>    
		
	</body>
</html>