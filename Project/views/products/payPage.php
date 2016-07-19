<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>下單頁面</title>
</head>
	<body>
		<div style="text-align: center;">
			<h3>購買紀錄</h3>
		</div>
		<table width="800px" align="center" border="1" bgcolor="#E6E6F2">
				<tr>
				    <th>下單者</th>
					
					<th>商品名稱</th>
					<th>商品單價</th>
					<th>數量</th>
					<th>單筆消費金額</th>
					<th>付費方式</th>
					<th>下單時間</th>
					<th>結果</th>
						
				</tr>
				<?php $vauleData = $data[0] ?>
				<?php for ($i = 0; $i < count($vauleData[4]); $i++) { ?>
				<tr>
                  	
                    <td><?php echo $_COOKIE["firstName"] ?></td>
					<!--<td><img src=<?php echo "../".picture."/".$vauleData[1][$i]?>></td>-->
					<td><?php echo $vauleData[0][$i] ?></td>
					<td>＄<?php echo $vauleData[2][$i] ?></td>
					<td><?php echo $vauleData[3][$i] ?></td>
					<td>＄<?php echo $vauleData[2][$i] * $vauleData[3][$i] ?></td>
					<td><?php echo $vauleData[6][$i] ?></td>
					<td><?php echo $vauleData[5][$i] ?></td>
					<td>done</td>
					
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