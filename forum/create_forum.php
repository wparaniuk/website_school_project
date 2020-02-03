<?php
session_start();
include('../base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	parse_str($_SERVER['QUERY_STRING'], $output);
	if(isset($_SESSION['site'])){
		$site=$_SESSION['site'];
		$temp1="site=$site";}
	$forum_name=mysql_real_escape_string($_POST['title']);
	if (isset($_POST['forum_create_btn'])){
		$query1=("INSERT INTO forums (forum_id,forum_name) VALUES (NULL,'$forum_name')");
		mysql_query($query1);
		header("Location: ../forum.php?$temp1");
		die();}
	else{"nie dodano";}} 
else{
	header("Location: ../loginform.php?site=$site");
	die();}
?>