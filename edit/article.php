<?php
session_start();
include('../base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	parse_str($_SERVER['QUERY_STRING'], $output);
	if(isset($_SESSION['site'])){
		$site=$_SESSION['site'];
		$temp1="site=$site";}
	$id=$_SESSION['login_id'];
	$login=$_SESSION['login'];
	$title=mysql_real_escape_string($_POST['title']);
	$text=mysql_real_escape_string($_POST['text']);
	$date=date("d-m-Y H:i:s");
	if (isset($_POST['articlebtn'])){
		$query1=("INSERT INTO articles (id,title,date,text,author) VALUES (NULL,'$title','$date','$text','$login')");
		mysql_query($query1);
		header("Location: ../logged.php?$temp1");
		die();}
	else{"nie dodano";}} 
else{
	$_SESSION['logged']="not";
	header("Location: ../loginform.php?site=$site");
	die();}
?>