<?php
session_start();
parse_str($_SERVER['QUERY_STRING'], $output);
$postid=$output['postid'];
include('session.php');
$url=$_SESSION['url'];
$url_end = explode("?", $url);
if(isset($output['name'])){
$temp1="&name=$name";}
if(isset($output['postid'])){
$temp3="&postid=$postid";}
if($output['site']=="lol"){
	header("Location: $url_end[0]?site=wot$temp1$temp3");
	die();}
elseif($output['site']=="wot"){
	header("Location: $url_end[0]?site=lol$temp1$temp3");
	die();}
?>