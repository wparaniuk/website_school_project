<?php
session_start();
include('../base.php');
include('../session.php');
if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){
	$id=$_SESSION['login_id'];
	$login=$_SESSION['login'];
	parse_str($_SERVER['QUERY_STRING'], $output);
	if(isset($output['site'])){
		$temp1="&site=$site";}
	$site=$output['site'];
	if (isset($_POST['datebtn'])){
		$date="".$_POST['day']."-".$_POST['month']."-".$_POST['year']."";
		mysql_query($query="UPDATE users SET birth='$date' WHERE id='$id'");
		header("Location: ../edit_profile.php?site=$site&name=$login");
		die();}
	elseif (isset($_POST['sexbtn'])){
		$sex=$_POST['sex'];
		mysql_query($query="UPDATE users SET sex='$sex' WHERE id='$id'");
		echo$temp1;
		die();}
	elseif (isset($_POST['emailbtn'])){
		$email=$_POST['email'];
		$confirm_email=$_POST['confirm_email'];
		if(empty($email)||empty($confirm_email)){
			$_SESSION['empty']="email";
			header("Location: ../edit_profile.php?site=$site&name=$login");
			die();}
		else{
			if($email==$confirm_email){
				mysql_query($query="UPDATE users SET email='$email' WHERE id='$id'");
				header("Location: ../edit_profile.php?site=$site&name=$login");
				die();}}}
	elseif (isset($_POST['avatarbtn'])) {
		$fileName = $_FILES['avatarfile']['name'];
		$fileTmpName = $_FILES['avatarfile']['tmp_name'];
		$fileSize = $_FILES['avatarfile']['size'];
		$fileError = $_FILES['avatarfile']['error'];
		$fileType = $_FILES['avatarfile']['type'];
		
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 102400) {
					$fileNameNew = $id."-".$login.".".$fileActualExt;
					$fileDestination = '../images/avatars/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					mysql_query($sql = "UPDATE users SET status='$fileActualExt' WHERE id='$id'");
					header("Location: ../edit_profile.php?name=$login");
					die();
				} else {
					echo "Plik jest za duży.";
				}
			} else {
				echo "Błąd przy wrzucaniu pliku na serwer.";
			}
		} else {
			echo "Rozszerzenie tego typu jest niedozolone";
		}
	}
	else{
		echo mysql_error();}} 
else{
	$_SESSION['logged']="not";
	header("Location: ../loginform.php");
	die();}
?>