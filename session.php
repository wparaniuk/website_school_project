<?php
	$id=$_SESSION['login_id'];
	$login=$_SESSION['login'];
	parse_str($_SERVER['QUERY_STRING'], $output);
	$name=$output['name'];
	$site=$output['site'];
	if(isset($output['name'])){
		$temp1="&name=$name";}
	if(isset($output['site'])){
		$temp2="site=$site";}
	$query="SELECT * FROM users WHERE login='$login' AND id='$id'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		$row=mysql_fetch_assoc($result);}
	else{
		echo"nie ma uzytkownika";}
	if(empty($name)){
		$row_temp['login']=$login;}
	else{	
		$query_temp="SELECT * FROM users WHERE login='$name'";
		$result_temp=mysql_query($query_temp);
		if(mysql_num_rows($result_temp)>0){
			$row_temp=mysql_fetch_assoc($result_temp);}
		else{
			$row_temp['login']="Użytkownik nie istnieje.";}}
if($login==$name){
	$my_profile=TRUE;}
else{
	$my_profile=FALSE;}
?>