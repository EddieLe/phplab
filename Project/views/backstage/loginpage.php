<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Backstage Login Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="/eddie/Project/views/backstage/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="/eddie/Project/views/backstage/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/eddie/Project/views/backstage/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="">
                    <strong>&laquo; 購物網後台: </strong>登入頁
                </a>
                <span class="right">
                    
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Backstage Login Page</h1>
				<nav class="codrops-demos">

            </header>
            <section>				
                <div id="container_demo" >

                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="auth" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > 帳號 </label>
                                    <!--改變的地方-->
                                    <input type="text" name="userName" id="txtUserName" />  
                                
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> 密碼 </label>
                                    <!-- 改變的地方-->
                                    <input type="password" name="password" id="txtPassword" />
                                    
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <!-- 改變的地方-->
                                    <input type="submit" name="btnOK" id="btnOK" value="登入" /> 
                                    
								</p>
        <!--                        <p class="change_link">-->
								<!--	Not a member yet ?-->
								<!--	<a href="#toregister" class="to_register">註冊</a>-->
								<!--</p>-->
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form method="post" action="signUp" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <?php session_start();?>
                                <h4><span style="color:red;font-weight:bold"><?php echo $_SESSION["duble"]; ?></span></h4>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">申請帳號</label>
                                    <input id="usernamesignup" name="userName" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" >信箱</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">輸入密碼</label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">重複密碼</label>
                                    <input id="passwordsignup_confirm" name="password_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="signOK" value="註冊"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> 回登入頁</a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>