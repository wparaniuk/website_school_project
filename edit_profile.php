<?php
session_start();
include('base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
include('session.php');
?>
<html>
<head>
<?include('title.php');?><!--tytul-->
<?include('favicon.php');?><!--ikonka-->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link rel="stylesheet" type="text/css" href="logged.css" media="screen" />
<link rel="stylesheet" type="text/css" href="fonts.css" media="screen" />
</head>
<body class="<? if($output['site']=="lol"){echo("bg2");}elseif($output['site']=="wot"){echo("bg3");}else{echo("bg2");}?>">
<div class="wrapper">
	<div class="content">
		<div class="nav">
			<div class="logo">
				<?include('logo.php');?><!--logo-->
			</div>
		</div>
		<?include('belka.php');?><!--przyciski pod logiem-->
		<div class="articles left">
			<div class="text">
				<div class="left">
					<?include('avatar.php');?><!--avatar-->
				</div>
				<div>
					<?if($row['login']!==$row_temp['login']){header("Location: profile.php?site=$site&name=$name");die();}?>
					<span class="gray left">Nazwa użytkownika: <span class="orange"><?echo $row['login'];?></span></span>
					<a class="orange right" href="profile.php<?echo"?site=$site&name=$login";?>">Powrót do profilu</a><br>
					<?include('edit/edit_avatar.php');?><!--zmiana avatara modal box-->
					<a class="orange left" href="#popup_avatar">Edytuj avatar</a>
					<a class="orange right" href="logout.php">Wyloguj</a><br>
					<?include('edit/edit_email.php');?><!--zmiana emaila modal box.-->
					<a class="orange left" href="#popup_email">Zmień adres email</a><br>
					<?include('edit/edit_date.php');?><!--zmiana daty modal box-->
					<a class="orange left" href="#popup_date">Zmień datę urodzenia</a><br>
					<?include('edit/edit_sex.php');?><!--zmiana plci modal box-->
					<a class="orange left" href="#popup_sex">Wybierz płeć</a><br>
					 
				</div>
			</div>			
		</div>
		
		<div class="rightcont">
			<?include('news_right.php');?><!--newsy tytuly tylko prawwa strona-->
		</div>
		
		<?include('footer.php');?><!--stopa-->
</div>
</body>
</html>
<? 
} 
else{
	$_SESSION['logged']="not";
	header("Location: loginform.php");
	die();}
?>