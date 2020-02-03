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
		$temp2="topic_id=$topic_id";
		}
	if(isset($_POST['topic_delete_btn'])){
		mysql_query($query1=("DELETE FROM topics WHERE topic_id='$topic_id'"));
		header("Location: ../forum.php?site=$site");
		die();
		}
	elseif(isset($_POST['topic_back_btn'])){
		header("Location: ../show_topic.php?site=$site&topic_id=$topic_id");
		die();
	}
} 
else{
	header("Location: ../loginform.php?site=$site");
	die();}
?>