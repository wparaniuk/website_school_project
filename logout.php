<? 
session_start(); 
unset($_SESSION['login']);
unset($_SESSION['password']);
header("Location: index.php");
	die();;
?>