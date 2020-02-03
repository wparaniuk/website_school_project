<?php
session_start();
include('base.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	$id=$_SESSION['login_id'];
	$login=$_SESSION['login'];
	parse_str($_SERVER['QUERY_STRING'], $output);
	$name=$output['name'];
	$query="SELECT * FROM users WHERE login='$login' AND id='$id'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		$row=mysql_fetch_assoc($result);}
	else{echo"nie ma";}
	if(empty($name)){echo"empty";}else{	
		$query_temp="SELECT * FROM users WHERE login='$name'";
		$result_temp=mysql_query($query_temp);
		if(mysql_num_rows($result_temp)>0){
			$row_temp=mysql_fetch_assoc($result_temp);}
		else{echo"nie istnieje";}}
		
}
else{
	$_SESSION['logged']="not";
	include('loginform.php');}
?>