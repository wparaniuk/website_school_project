
<? session_start(); if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){ ?>

<center><? include('menu.php'); ?></center>

<? } else { echo "Nie jestes zalogowany"; }?>