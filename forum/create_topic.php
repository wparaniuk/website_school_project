<?php
session_start();
include('../base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	$written_by=$_SESSION['login'];
	if(isset($_SESSION['site'])){
		$site=$_SESSION['site'];
		$temp1="site=$site";
		}
	if(isset($_SESSION['forum_id'])){
		$topic_forum=$_SESSION['forum_id'];
		$topic_cat="0";
		$temp2="forum_id=$forum_id";
		}
	elseif(isset($_SESSION['cat_id'])){
		$topic_cat=$_SESSION['cat_id'];
		$topic_forum="0";
		$temp2="cat_id=$cat_id";
		}
	$topic_date=date("d-m-Y  H:i:s");
	$topic_subject=mysql_real_escape_string($_POST['title']);
	$post_content=mysql_real_escape_string($_POST['text']);
	if (isset($_POST['topic_create_btn'])){
		mysql_query($query1=("INSERT INTO topics (topic_id,topic_subject,topic_date,topic_cat,topic_forum,topic_by) VALUES (NULL,'$topic_subject','$topic_date','$topic_cat','$topic_forum','$written_by')"));
		mysql_query($query2=("UPDATE users SET postcount=postcount+1 WHERE login='$written_by'"));
		mysql_query($query3=("SELECT * FROM topics WHERE topic_subject='$topic_subject' AND topic_date='$topic_date'"));
		$result2=mysql_query($query3);
		if(mysql_num_rows($result2)!==0){
			$row2=mysql_fetch_assoc($result2);
		}
		$topic_id2=$row2['topic_id'];
		$query2=("INSERT INTO posts (post_id,post_content,post_date,post_topic,post_by) VALUES (NULL,'$post_content','$topic_date','$topic_id2','$written_by')");
		mysql_query($query2);
		header("Location: ../show_topic.php?site=$site&topic_id=$topic_id2");
		die();
		}
	else{"nie dodano";}} 
else{
	header("Location: ../loginform.php?site=$site");
	die();}
?>