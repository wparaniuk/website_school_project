<?php
session_start();
include('../base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	$written_by=$_SESSION['login'];
	if(isset($_SESSION['site'])){
		$site=$_SESSION['site'];
		$temp1="site=$site";
		}
	if(isset($_SESSION['topic_id'])){
		$topic_id=$_SESSION['topic_id'];
		}
	$post_date=date("d-m-Y  H:i:s");
	$post_content=mysql_real_escape_string($_POST['text']);
	if (isset($_POST['post_create_btn'])){
		mysql_query($query1=("INSERT INTO posts (post_id,post_content,post_date,post_topic,post_by) VALUES (NULL,'$post_content','$post_date','$topic_id','$written_by')"));
		mysql_query($query2=("UPDATE users SET postcount=postcount+1 WHERE login='$written_by'"));
		header("Location: ../show_topic.php?site=$site&topic_id=$topic_id");
		die();
		}
	} 
else{
	header("Location: ../loginform.php?site=$site");
	die();}
?>