<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>編輯</title>
</head>
	<body>
		<table width="600px" align="center" border="1" bgcolor="#CCFF99">
				<tr>
				    <th>下單者</th>
					<th>Picture</th>
					<th>Item</th>
					<th>Price</th>
					<th colspan="2">Comtroll</th>
						
				</tr>
				<?php $vauleData = $data[0] ?>
				<?php for ($i = 0; $i < count($vauleData[4]); $i++) { ?>
				<tr>
                  	
                    <td><?php echo $vauleData[4][$i] ?></td>
					<td><img src=<?php echo "../".picture."/".$vauleData[1][$i]?>></td>
					<td><?php echo $vauleData[0][$i] ?></td>
					<td>＄<?php echo $vauleData[2][$i] ?></td>
					<!--<td>-->
					<!--	<form action="updatePage", method="post">-->
					<!--	<input name="update" type="hidden" value="<?php echo $vauleData[4][$i] ?>">-->
					<!--	<button>修改</button>-->
					<!--	</form>				-->
					<!--<td>-->
					<!--	<form action="remove", method="post">-->
					<!--	<input name="delete" type="hidden" value="<?php echo $vauleData[4][$i] ?>">-->
					<!--	<button>刪除</button>-->
					<!--	</form>-->
					<!--</td>-->
				</tr>
				<?php }?>

		</table>	

				<div style="text-align: center;">	
					<form action="editPage", method="get">
						<button>新增</button>
				    </form>
				    <br>
				    <form method="post" action=logout>
						<input type="submit" name="logout" id="btnHome" value="登出" />
					</form>
				</div>    
		
	</body>
</html>