<?
$connect=mysql_connect("localhost","www817_baza","tiachoway123");
mysql_select_db("www817_baza");
mysql_query("set names utf8;");
 if(! $connect ) {
      die('Could not connect: ' . mysql_error());
   }
?>