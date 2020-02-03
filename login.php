<?php
session_start();
parse_str($_SERVER['QUERY_STRING'], $output);
$site=$output['site'];
if (isset($_POST['login']) and isset($_POST['password']) ){
   require('base.php');
   $login=mysql_real_escape_string(trim($_POST['login']));
   $password=mysql_real_escape_string(trim($_POST['password']));
   if ($login!="" and $password!=""){
      $password = sha1($password);
      $sqlrequest="SELECT id FROM users WHERE login='$login' and password='$password'";
      $temp=mysql_query($sqlrequest) or die("ERROR");
      $count=mysql_num_rows($temp);
      $temp=mysql_fetch_array($temp);
      $id=$temp['id'];
        if ($count==1){
            $_SESSION['login_id']=$id; $_SESSION['login']=$login;
            header("Location: logged.php?site=$site");
			die();}
          else { 
            $_SESSION['logged']="failed";
            header("Location: loginform.php?site=$site");
			die();}}}
else {
    header("Location: loginform.php?site=$site");
	die();}
?>