<?php
session_start();
include('../base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	if(isset($_SESSION['site'])){
		$site=$_SESSION['site'];
		$temp1="site=$site";}
	$cat_forum=$_SESSION['forum_id'];
	$cat_name=mysql_real_escape_string($_POST['title']);
	$cat_description=mysql_real_escape_string($_POST['text']);
	if (isset($_POST['cat_create_btn'])){
		$query1=("INSERT INTO categories (cat_id,cat_name,cat_description,cat_forum) VALUES (NULL,'$cat_name', '$cat_description','$cat_forum')");
		mysql_query($query1);
		$query2=("SELECT * FROM categories WHERE cat_name='$cat_name' AND cat_description='$cat_description'");
		$result2=mysql_query($query2);
		if(mysql_num_rows($result2)!==0){
			$row2=mysql_fetch_assoc($result2);
		}
		$cat_id2=$row2['cat_id'];
		header("Location: ../show_cat.php?$temp1&cat_id=$cat_id2");
		die();
		}
	else{"nie dodano";}} 
else{
	header("Location: ../loginform.php?site=$site");
	die();}
?>