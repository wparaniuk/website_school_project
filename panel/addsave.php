<?php
include('menu.php');
include('../base.php');

$title=$_POST['title'];
$title_menu=$_POST['title_menu'];
$name=$_POST['name'];
$content=$_POST['content'];   
$query = "INSERT INTO articles (id,title,title_menu,content,name) VALUES (NULL,'$title','$title_menu','$content','$name')";
$result = mysql_query($query);
if($result){
    echo("<br><center>Dane zostały wprowadzone</center>");
} else{
    echo("<br><center>Dane nie zostały wprowadzone </center>". mysql_error());
}
?>