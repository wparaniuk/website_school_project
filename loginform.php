<?php
session_start();
parse_str($_SERVER['QUERY_STRING'], $output);
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	header("Location: logged.php?site=".$output['site']);
	die();}
else{
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
	</head>
<body class="<? if($output['site']=="lol"){echo("bg2");}elseif($output['site']=="wot"){echo("bg3");}else{echo("bg2");}?>">
<div class="wrapper">
	<div class="login_cont">
		<div class="login_form">
			<img class="login_img" src="images/login.png" />
			<form method="post" action="login.php<?echo"?site=".$output['site']?>">
                    <?
                       if($_SESSION['register']=="succed"){
                          echo("Account created. Log in to proceed.<br>");}
                       elseif($_SESSION['logged']=="failed"){
                          echo("Wrong login or password.");}
					   elseif($_SESSION['logged']=="not"){
					   echo("Plese log in to continue.");}
                    ?><br>
				<input type="text" name="login" placeholder="Login"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="submit" value="Login"><br>
				Don't have an account?  <a class="link" href="registerform.php<?echo"?site=".$output['site']?>">Sign up</a><br><br>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?
}
?>