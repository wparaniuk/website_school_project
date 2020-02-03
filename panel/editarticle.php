<? session_start(); if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){ ?>

<center><? include('menu.php'); ?>
<? include('../base.php');?>
<table width=900 border="0"><tr bgcolor=#b9de2e><td width="400"><b>ID - TYTUŁ</b></td><td><b>Edytuj</b></td><td><b>Kasuj</b></td></tr>
<?
 $edit = mysql_query("SELECT * FROM articles ORDER BY id");
  while($show = mysql_fetch_array($edit)) {
   echo '<tr><td>'.$show[id].' - '.$show[title].' </td>';
   echo '<td width="40"><a href=editart.php?id='.$show[id].'>Edytuj</a></td>';
   ?>
   <td width="40"><a OnClick="return confirm('Czy napewno chcesz usunąć?');" href=deleteart.php?id=<? echo $show[id];?>>Kasuj</a></td>
   <? echo '</tr>';}?>
</table>
</center>

<? } else { echo "Nie jestes zalogowany"; }?>