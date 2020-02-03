<?php
session_start();
include('base.php');

$registerdate=date("d-m-Y");
$login=$_POST['login'];
$password=sha1($_POST['password']);
$confirm_password=sha1($_POST['confirm_password']);
$email=$_POST['email'];
$logincheck=mysql_query("SELECT login FROM users WHERE login='$login'");
$loginchecker=mysql_fetch_assoc($logincheck);
$emailcheck=mysql_query("SELECT email FROM users WHERE email='$email'");
$emailchecker=mysql_fetch_assoc($emailcheck);
if($password==$confirm_password){
	if($_POST['login']==$loginchecker['login']){
		$_SESSION['register']="loginexist";
		header("Location: registerform.php");
		die();}
	elseif($_POST['email']==$emailchecker['email']){
		$_SESSION['register']="emailexist";
		header("Location: registerform.php");
		die();}
	else{
		$query = "INSERT INTO users (id,login,password,email,registerdate) VALUES (NULL,'$login','$password','$email','$registerdate')";}}
else{
	$_SESSION['register']="pass";
	header("Location: registerform.php");
	die();}
$result=mysql_query($query);
if($result){
	$_SESSION['register']="succed";
	header("Location: loginform.php");
	die();} 
else{
	echo(mysql_error());}
?>