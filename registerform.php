<?php
session_start();
parse_str($_SERVER['QUERY_STRING'], $output);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Funfel">
		<title>Maciek Gejming - Gaming Community</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="loginstyle.css" media="screen" />
		 <script src="login.js"></script> 
	</head>
<body class="<? if($output['site']=="lol"){echo("bg2");}elseif($output['site']=="wot"){echo("bg3");}else{echo("bg2");}?>">
<div class="wrapper">
	<div class="login_cont">
		<div class="login_form">
			<img class="login_img" src="images/login.png" />
			<form method="post" action="register.php">
                   <?
                    if($_SESSION['register']=="pass"){
                        echo("Passwords must be the same.<br>");}
                    elseif($_SESSION['register']=="failed"){
                        echo("Registration failed. Check your input and try again.");}
					elseif($_SESSION['register']=="loginexist"){
                        echo("Login already in use.");}
					elseif($_SESSION['register']=="emailexist"){
                        echo("Email already in use.");}
                    ?><br>
				<input type="text" name="login" placeholder="Login"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="password" name="confirm_password" placeholder="Repeat Password"><br>
				<input type="email" name="email" placeholder="E-mail"><br>
				<input type="submit" value="Register"><br>
				Already have an account?  <a class="link" href="loginform.php<?echo"?site=".$output['site']?>">Log in</a><br><br>
			</form>
		</div>
	</div>
</div>
</body>
</html>