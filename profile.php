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
			<div class="text left">
				<div class="left">
					<?include('avatar.php');?><!--avatar-->
				</div>
				<div>
					<span class="gray left">Nazwa użytkownika: <span class="orange"><?echo $row_temp['login'];?></span></span>
					<?if($my_profile==TRUE){echo"<a class='orange right' href='edit_profile.php?site=$site&name=$login'>Edycja profilu</a>";}?>
					<br><span class="gray left">Email: <span class="orange"><?echo $row_temp['email'];?></span></span>
					<?if($my_profile==TRUE){echo"<a class='orange right' href='logout.php'>Wyloguj</a>";}?>
					<br><span class="gray left">Data urodzenia: <span class="orange"><?if($row_temp['birth']==0){echo('Nie podano.');}else{echo $row_temp['birth'];}?></span></span><br>
					<span class="gray left">Płeć: <span class="orange"><?if($row_temp['sex']==Mężczyzna){echo'Mężczyzna';}elseif($row_temp['sex']==Kobieta){echo'Kobieta';}else{echo'Nie podano';}?></span></span><br>
					<span class="gray left">Data rejestracji: <span class="orange"><?echo ($row_temp['registerdate']);?></span></span><br>
					<span class="gray left">Ranga: <span class="orange"><?if($row_temp['rank']==0)echo('Użytkownik');elseif($row_temp['rank']==1)echo('Moderator');elseif($row_temp['rank']==2)echo('Administrator');?></span></span><br>
					<span class="gray left">Liczba postów: <span class="orange"><?echo $row_temp['postcount'];?></span></span><br>
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