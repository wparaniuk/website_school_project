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
<link rel="stylesheet" type="text/css" href="forum.css" media="screen" />
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
			<?include('forum/show_topic.php');?><!--forum categorie(glowna forum)-->
		</div>
				
		<?include('footer.php');?><!--stopa-->
	</div>
	


</div>
</body>
</html>
<? 
} 
else{
	header("Location: loginform.php?site=".$output['site']);
	die();}
?>