<?php

    require("config.php");
    $link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
    $result = mysql_query("set name utf8", $link);
    mysql_selectdb ( $dbname, $link );
    $cmd = "SELECT * FROM products";
    $result = mysql_query($cmd, $link);
    mysql_close($link);
   
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>編輯</title>
</head>
	<body>
		<table width="600px" align="center" border="1" bgcolor="#CCFF99">
				<tr>
				    <th>編號</th>
					<th>Picture</th>
					<th>Item</th>
					<th>Price</th>
					<th colspan="2">Comtroll</th>
						
				</tr>

				<?php while ($row = mysql_fetch_assoc($result)) : ?>
				<tr>
                  	
                    <td><?php echo $row["id"] ?></td>
					<td><img src=<?php echo picture."/".$row["picture"].".".jpg ?>></td>
					<td><?php echo $row["item"] ?>}</td>
					<td>＄<?php echo $row["price"] ?></td>
					<td>
						<form action="updatepage.php", method="post">
						<input name="update" type="hidden" value="<?php echo $row["id"] ?>">
						<button>修改</button>
						</form>				
					<td>
						<form action="Delete.php", method="post">
						<input name="delete" type="hidden" value="<?php echo $row["id"] ?>">
						<button>刪除</button>
						</form>
					</td>
				</tr>
				<?php endwhile; ?>

		</table>	

				<div style="text-align: center;">	
					<form action="editpage.php", method="get">
						<button>新增</button>
				    </form>
				    <br>
				    <form method="post" action=loginpage.php>
						<input type="submit" name="logout" id="btnHome" value="登出" />
					</form>
				</div>    
		
	</body>
</html>