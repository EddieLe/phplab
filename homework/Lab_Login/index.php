<?php 
  setcookie("lastPage", "lastPage" ,time()-60*60*24);
  $userName = "guest";
  if(isset($_COOKIE["userName"])){
    $userName = $_COOKIE["userName"];
  }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lab - index</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<style>
  * {
    padding: 0;
    margin: 0;
} 

body {
background: #fff url(images/bg.jpg) repeat-x;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
line-height: 18px;
color: #333333;;
}

img { border: none; }
a { color: #2E4A55; text-decoration: none; }
a:hover { text-decoration: underline; color : #000; }

#wrap {
margin: 0 auto;
width: 800px;
}

#header { 
height: 150px;
}
#header h1 {
font-size: 30px;
font-weight: 100;
letter-spacing: -3px;
padding: 55px 0 5px 0;
}
#header h1 a {
color: #334436;
text-decoration: none;
}
#header h1 a:hover {
color: #555;
text-decoration: none;
}
#header h2 {
color: #555;
font-size: 19px;
font-weight: 100;
padding: 0 0 0 0;
letter-spacing: -1px;
line-height: 12px;
}

#content {
padding: 10px 0;
}

.left {
width: 568px;
float: left;
text-align: justify;
}
.left h2 {
color: #FF4800;
font-size: 22px;
letter-spacing: -1px;
font-weight: 100;
padding : 15px 0 15px 0;
}

.right {
width: 160px;
float: right;
padding: 10px;
border-left: 1px solid #bbb;
font-size: 14px;
font-weight: 600;
}
.right ul {
list-style-type: none;
padding: 5px 10px 10px 10px;
}
.right h2 {
height: 30px;
font-size: 15px;
color: #666;
line-height: 30px;
}
.right a { text-decoration: none }

#footer {
border-top: 1px solid #bbb;
text-align: center;
color: #333;
font-size: 11px;
padding: 0 0 10px 0;
margin-top: 10px;
}
</style>
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#"></a>Hello <?php echo $userName?></h1>
<h2>會員系統 - 首頁</h2>
</div>

<div id="content">
<div class="left"> 

<h2><a href="#">License and terms of use</a></h2>
<div class="articles">
Big Space Love Rounded is a CSS template that is free and fully standards compliant. <a href="http://www.free-css-templates.com/">Free CSS templates</a> designed this template.
This template is allowed for all uses, including commercial use, as it is released under the <strong>Creative Commons Attributions 2.5</strong> license. The only stipulation to the use of this free template is that the links appearing in the footer remain intact. Beyond that, simply enjoy and have fun with it!	 
<br /><br />
Eddie_Lee test
<br /><br />
Donec nulla. Aenean eu augue ac nisl tincidunt rutrum. Proin erat justo, pharetra eget, posuere at, malesuada 
et, nulla. Donec pretium nibh sed est faucibus suscipit. Nunc nisi. Nullam vehicula. In ipsum lorem, bibendum sed, 
consectetuer et, gravida id, erat. Ut imperdiet, leo vel condimentum faucibus, risus justo feugiat purus, vitae 
congue nulla diam non urna.
</div>
<h2><a href="#">link</a></h2>
<div class="articles">

</div>
</div>

<div class="right"> 

<h2>Categories :</h2>
<ul>
<li><a href="#">World Politics</a></li> 
<li><a href="#">Europe Sport</a></li> 
<li><a href="#">Networking</a></li> 
<li><a href="#">Nature - Africa</a></li>
<li><a href="#">SuperCool</a></li> 
<li><a href="#">Last Category</a></li>
</ul>

<h2>Archives</h2>
<ul>
<li><a href="#">January 2007</a></li> 
<li><a href="#">February 2007</a></li> 
<li><a href="#">March 2007</a></li> 
<li><a href="#">April 2007</a></li>
<li><a href="#">May 2007</a></li> 
<li><a href="#">June 2007</a></li> 
<li><a href="#">July 2007</a></li> 
<li><a href="#">August 2007</a></li> 
<li><a href="#">September 2007</a></li>
<li><a href="#">October 2007</a></li>
<li><a href="#">November 2007</a></li>
<li><a href="#">December 2007</a></li>
</ul>

</div>
<div style="clear: both;"> </div>
</div>

<div id="footer">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  
    <td align="center" valign="baseline">
    <?php if(!isset($_COOKIE["userName"])){ ?>
    <a href="login.php">登入</a> 
    <?php }else {?>
    <a href="login.php?logout=1">登出</a>
    <?php }?>
    | <a href="secret.php">會員專用頁</a></td>
  </tr>
  
</table>
</div>
</div>

</body>
</html>