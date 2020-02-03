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
				<form action="forum/create_forum.php<?$_SESSION['site']=$output['site'];?>" method="post">
					<div class="email w4">
						<input class="orange left titilium" style="width:700px;" name="title" type="text" placeholder="Tytuł forum"/>
						<input class="popupsave orange titilium left" style="margin-bottom:50px" type="submit" name="forum_create_btn" value="Stwórz" />
						<br><br>
					</div>
						
				</form>
			</div>
		</div>
		
		<div class="rightcont">
			<div class="profile">
				<div class="avatar">
					<img class="av" src="<?$ext=$_SESSION['ext'];if($row['status']!==0){echo'images/avatars/'.$id.'-'.$login.'.'.$row['status'].'';}elseif($row['status']==0){echo'images/avatars/profiledefault.png';}?>"/>
				</div>
				<?include('panel.php');?><!--avatar-->
			</div>
			<div class="clock">
				<!-- clock widget start -->
				<script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-150x100t.css"); document.getElementsByTagName("head")[0].appendChild(css_file); </script> <div id="tw_8_1709811332"><div style="width:150px; height:100px; margin: 0 auto;"><a href="http://booked.com.pl/time/wroclaw-33154">Wrocław</a><br/></div></div> <script type="text/javascript"> function setWidgetData_1709811332(data){ if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = ''; var params = data.results[i]; objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id); if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; } } } var clock_timer_1709811332 = -1; </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=594&type=8&id=1709811332&scode=124&city_id=33154&wlangid=18&mode=1&details=0&background=rgba(0,0,0,0.5)&color=ff9900&add_background=ffffff&add_color=ffffff&head_color=ffffff&border=0&transparent=1"></script>
				<!-- clock widget end -->
			</div>
		</div>
		
		<?include('footer.php');?><!--stopa-->
	</div>
	


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