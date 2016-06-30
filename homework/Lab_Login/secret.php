<?php
  if(!isset($_COOKIE["userName"])){
    setcookie("lastPage", "secret.php");
    header("location: login.php");
  }
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
body{
	padding: 0;
	margin: 0;
}
.style1{
	display: block;
	color: black;
	font-size: 12pt;
	font-style: normal;
	text-align: center;
}
.style2{
	text-align: center;
	margin: auto;
	width: 1241px
}
.style3{
	width:100px;
	height: 20px;
	float:right;
	text-align: center;
	margin: auto;
	color: red;
	font-family: Arial;
	font-size: 16px;
}
.sitebody{
	width: 600xp;
	margin: 0auto;
	font-size:13px;
}
#container{
	padding: 0;
	margin: 0;
	width: 100%;
}
#Header{
width: 100%;
height:15%;
padding: 80px;
background-color:#DCB5FF;
float: left;
}
#Body{
width:100%;
height:70%;
background-color:#fffaf3;
float: left;
}
#Footer{
width:100%;
height:15%;
padding: 20px;
background-color:#A6FFA6;
float: left;
}
.picture {
	width: 290px; 
	height: 330px; 
	overflow: hidden;
	float: left;
	margin:0 10px 10px 0;
}
.product{
	width: 300px;
	height: 450px;
	overflow: hidden;
	float: left;
	margin: 0 10px 10px 0;
}
#menu {
	height: 33px;
	line-height: 33px;
	display: block;
	padding: 0px 15px;
	color: #fff;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lag - Member Page</title>
</head>
<body>
<div id="container">
<div id="Header"><div align="center"><font color="red", size="14", face="monospace"><b>會員系統 － 會員專用</b></font></div></div>
<div id="meun">
	<ul>
	</ul>
</div>	
	<div id="Body">
	<div class=style2>	
		<div class="product">
			<div class="picture">
				
				
			</div>
		<div class=style1><span style="background-color:green"> </span></div>
		<div> </div>
		
		<p></p>
		</div>

	</div>
	</div>		
	<div id="Footer">
	  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#A6FFA6">
      <tr>
        <td align="center" bgcolor="#A6FFA6"><a href="index.php">回首頁</a></td>
      </tr>
    </table>
	</div>	
	</div>	

</body>
</html>